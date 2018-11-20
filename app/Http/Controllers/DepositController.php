<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Deposit as Deposit;
use App\PaymentMethod as PaymentMethod;
use Carbon\Carbon;
use PDF;

class DepositController extends Controller
{
    private $data;

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['getCallback']]);

        // $this->middleware(function ($request, $next) {
        //     $this->data['balance'] = Auth::user()->balance;

        //     return $next($request);
        // }, ['except' => ['getCallback']]);
    }
    
    public function index()
    {
        $this->data['depositData'] = Deposit::where(['user_id' => Auth::user()->id])->paginate(10);
        return view('admin.pages.deposit.riwayat')->with($this->data);
    }

    public function add(){
        $this->data['payment'] = PaymentMethod::all();

        return view('admin.pages.deposit.add')->with($this->data);
    }

    public function store(Request $request){
        $this->validate($request, [
            'payment' => 'required|exists:payment_methods,id',
            'sender' => 'required|string|max:191',
            'amount' => 'required|integer|min:50000'
        ]);

        $now = Carbon::now();
        $expired_date = $now->addHours(6);
        $unique_code = rand(0, 999);
        $data = [
            'user_id' => Auth::user()->id,
            'payment_method_id' => $request->payment,
            'amount' => $request->amount,
            'balance' => 0,
            'sender_name' => $request->sender,
            'status' => 'WAITING',
            'unique_code' => $unique_code,
            'total' => $request->amount + $unique_code,
            'expired_date' => $expired_date
        ];

        $deposit = Deposit::create($data);
        return redirect()->route('deposit-invoice', ['id' => $deposit->id]);
    }

    public function invoice($id){
        $deposit = Deposit::findOrFail($id);

        $this->data['newDeposit'] = $deposit;
        return view('admin.pages.deposit.invoice')->with($this->data);
    }

    public function cancel($id){
        $deposit = Deposit::findOrFail($id);
        $deposit->status = "CANCELED";
        $status = $deposit->save();
        return redirect()->route('deposit-invoice', ['id' => $id]);
    }

    public function print($id){
        $deposit = Deposit::findOrFail($id);

        $this->data['newDeposit'] = $deposit;
        $pdf = PDF::loadView('admin.pages.deposit.invoice-print', $this->data);
        return $pdf->download('invoice.pdf');
    }

    public function getCallback(Request $request){
        $result = $request->all();
        // print_r($result);
        if( $result['action'] == "payment_report" )
        {
            foreach( $result['content']['data'] as $data )
            {
                # Waktu transaksi dalam format unix timestamp
                $time = $data['unix_timestamp'];
                $date = date('Y-m-d h:i:s', $time);
                // echo "<br><h1>$date</h1>";

                # Tipe transaksi : credit / debit
                $type = $data['type'];

                # Jumlah (2 desimal) : 50000.00
                $amount = $data['amount'];
                $unique_code = \substr($amount, strlen($amount)-3);

                # Berita transfer
                $description = $data['description'];

                # Saldo rekening (2 desimal) : 1500000.00
                $balance = $data['balance'];
                
                if( $type == "credit" )
                {
                    $deposit = Deposit::where(['total' => $amount])->orderBy('id', 'desc')->firstOrFail();
                    if($deposit != null){
                        DB::transaction(function()
                        {
                            $deposit->status = 'ACCEPTED';
                            $deposit->balance = $amount;
                            $user = $deposit->users;
                            $user->balance = $user->balance + $amount;
                            
                            $depositStatus = $deposit->save();
                            $userStatus = $user->save();

                            if(!$depositStatus || !$userStatus){
                                return response()->json(['status' => false, 'msg' => 'Gagal mengubah deposit']);
                            } else {
                                return response()->json(['status' => false, 'msg' => 'Berhasil mengubah deposit']);
                            }
                        });
                    }
                }
            }
        }
    }

    public function confirmation(Request $request, $id){
        $deposit = Deposit::findOrFail($id);
        $yesterday = Carbon::yesterday();
        $now = Carbon::now();
        $data = array(
            "search"  => array(
                "date"    => array(
                    "from"    => $yesterday,
                    "to"      => $now
                ),
                "service_code"    => \strtolower($deposit->payment_methods->account_vendor),
                "amount"          => $deposit->total
            )
        );

        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL             => "https://api.cekmutasi.co.id/v1/bank/search",
            CURLOPT_POST            => true,
            CURLOPT_POSTFIELDS      => http_build_query($data),
            CURLOPT_HTTPHEADER      => ["API-KEY: (APIKEY-ANDA)"],
            CURLOPT_SSL_VERIFYHOST  => 0,
            CURLOPT_SSL_VERIFYPEER  => 0,
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_HEADER          => false
        ));
        $result = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($result);
        if($result->success){
            $deposit->status = "ACCEPTED";
            $user = $deposit->users;
            $user->balance = $user->balance + $deposit->total;
            DB::transaction(function(){
                $depositStat = $deposit->save();
                $userStat = $user->save();

                if((!$depositStat) || (!$userStat)){
                    //berhasil
                    echo "berhasil";
                } else {
                    //gagal
                    echo "berhasil";
                }
            });
        } else{
            echo "gagal";
            //gagal
        }
    }
}

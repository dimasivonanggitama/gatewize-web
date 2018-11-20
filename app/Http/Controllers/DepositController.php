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

        // dd($data);


        $deposit = Deposit::create($data);
        return redirect()->route('deposit-invoice', ['id' => $deposit->id]);
    }

    public function invoice($id){
        $deposit = Deposit::findOrFail($id);

        $this->data['newDeposit'] = $deposit;
        return view('admin.pages.deposit.invoice')->with($this->data);
    }

    public function cancel($id){

    }

    public function print($id){
        $deposit = Deposit::findOrFail($id);

        $this->data['newDeposit'] = $deposit;
        $pdf = PDF::loadView('admin.pages.deposit.invoice-print', $this->data);
        return $pdf->download('invoice.pdf');
    }

    public function getCallback(Request $request){
        $result = $request->all();
        print_r($result);
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
                        $deposit->status = 'ACCEPTED';
                        $deposit->balance = $amount;
                        $user = $deposit->users;
                        $user->balance = $user->balance + $amount;
                        $deposit->save();
                        $user->save();
                    }
                }
            }
        }
    }
}

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
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            $this->data['deposit'] = Deposit::where(['user_id' => Auth::user()->id])->first();

            return $next($request);
        });
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

        $data = [
            'user_id' => Auth::user()->id,
            'payment_method_id' => $request->payment,
            'amount' => $request->amount,
            'balance' => 0,
            'sender_name' => $request->sender,
            'status' => 'WAITING',
            'unique_code' => rand(0, 999),
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

    }

    public function print($id){
        $deposit = Deposit::findOrFail($id);

        $this->data['newDeposit'] = $deposit;
        $pdf = PDF::loadView('admin.pages.deposit.invoice-print', $this->data);
        return $pdf->download('invoice.pdf');
    }
}

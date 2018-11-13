<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Deposit as Deposit;

class ReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $deposit = Deposit::where(['user_id' => Auth::user()->id])->first();
        return view('admin.pages.report.index', compact('deposit'));
    }
}

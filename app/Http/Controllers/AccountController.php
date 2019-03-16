<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Deposit as Deposit;

class AccountController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        // $this->data['balance'] = Auth::user()->balance;
        return view('admin.pages.account.index');
    }

    public function edit($id = 0)
    {
        return view('admin.pages.account.edit');
    }

    public function update($id = 0)
    {
        
    }

    public function destroy($id = 0)
    {
        
    }
}

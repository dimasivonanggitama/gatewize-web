<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use GuzzleHttp\Client;

class AccountController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index($services = "")
    {
        $client = new Client();
        $response = $client->get("https://api.gatewize.com/devel-gopay/group/" . Auth::user()->license_key . "/3/list");

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

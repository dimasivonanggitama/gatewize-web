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
    
    public function index($service = "")
    {
        $client = new Client();
        $account = array();
        // if service not listed, then response null
        if($service == "gojek"){
            $responseGroup = $client->get("https://api.gatewize.com/devel-gopay/group/" . Auth::user()->license_key . "/list");
        } else {
            $responseGroup = null;
        }
        
        if($responseGroup != null && $responseGroup->getStatusCode() == 200){
            $groups = json_decode($responseGroup->getBody());
            // $group = $groups[0]->id;
            dd($groups);
        } else {
            $groups = array();
        }

        // check is user subscribed
        if(isset($groups->status)){
            $groups = array();
        }

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

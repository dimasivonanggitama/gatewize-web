<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class AccountController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index($service = "")
    {
        try {
            $client = new Client();
            $account = array();
            // if service not listed, then response null
            if($service == "gojek"){
                $response = $client->get("https://api.gatewize.com/devel-gopay/user/" . Auth::user()->license_key . "/list");
            } else {
                $response = null;
            }
            
            if($response != null && $response->getStatusCode() == 200){
                $accounts = json_decode($response->getBody());
            } else {
                $accounts = array();
            }

            // check is user subscribed
            if(isset($accounts->status)){
                $accounts = array();
            }
        

            $data = [
                'accounts' => $accounts,
                'service' => $service,
            ];
        } catch (ClientException $e) {
            $data = [
                'accounts' => [],
                'service' => $service,
            ];
        } 
        // catch (RequestException $e) { 
        //     return redirect()->route('groups', 'gojek');
        // }

        return view('admin.pages.account.index')->with($data);
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

    public function group($groupId = 0, $service = "")
    {
        try {
            $client = new Client();

            // if service not listed, then response null
            if($service == "gojek"){
                $response = $client->get("https://api.gatewize.com/devel-gopay/group/" . Auth::user()->license_key . "/$groupId/list");
            } else {
                $response = null;
            }
            
            if($response != null && $response->getStatusCode() == 200){
                $accounts = json_decode($response->getBody());
            } else {
                $accounts = array();
            }

            // check is user subscribed
            if(isset($groups->status)){
                $accounts = array();
            }

            $data = [
                'accounts' => $accounts,
                'service' => $service,
            ];
        } catch (ClientException $e) {
            $data = [
                'accounts' => [],
                'service' => $service,
            ];
        } 
        // catch (RequestException $e) { 
        //     return redirect()->route('groups', 'gojek');
        // }

        return view('admin.pages.account.index')->with($data);
    }

    public function move(Request $request, $service = "")
    {
        
    }
}

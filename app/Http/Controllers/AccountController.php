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
                $responseGroup = $client->get("https://api.gatewize.com/devel-gopay/group/" . Auth::user()->license_key . "/list", ['User-Agent' => null]);
            } else {
                $response = null;
                $responseGroup = null;
            }
            
            if($response != null && $response->getStatusCode() == 200){
                $accounts = json_decode($response->getBody());
            } else {
                $accounts = array();
            }

            if($responseGroup != null && $responseGroup->getStatusCode() == 200){
                $groups = json_decode($responseGroup->getBody());
            } else {
                $groups = array();
            }

            // check is user subscribed
            if(isset($accounts->status)){
                $accounts = array();
            }

            // check is user subscribed
            if(isset($responseGroup->status)){
                $groups = array();
            }
        
            $data = [
                'accounts' => $accounts,
                'groups' => $groups,
                'service' => $service,
            ];
        } catch (ClientException $e) {
            $data = [
                'accounts' => [],
                'groups' => [],
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
                $responseGroup = $client->get("https://api.gatewize.com/devel-gopay/group/" . Auth::user()->license_key . "/list", ['User-Agent' => null]);
            } else {
                $response = null;
                $responseGroup = null;
            }
            
            if($response != null && $response->getStatusCode() == 200){
                $accounts = json_decode($response->getBody());
            } else {
                $accounts = array();
            }
            
            if($responseGroup != null && $responseGroup->getStatusCode() == 200){
                $groups = json_decode($responseGroup->getBody());
            } else {
                $groups = array();
            }

            // check is user subscribed
            if(isset($accounts->status)){
                $accounts = array();
            }

            if(isset($responseGroup->status)){
                $groups = array();
            }
        
            $data = [
                'accounts' => $accounts,
                'groups' => $groups,
                'service' => $service,
            ];
        } catch (ClientException $e) {
            $data = [
                'accounts' => [],
                'groups' => [],
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
        $this->validate($request, [
            'phone' => 'required|string|max:191',
            'oldGroup' => 'required|integer|min:0',
            'newGroup' => 'required|integer|min:0'
        ]);
        $client = new Client();
        if($service == "gojek") {
            // {{ api_url  }}/account/{{ license  }}/9/085893539852/move/7
            $response = $client->post("https://api.gatewize.com/devel-gopay/account/" . Auth::user()->license_key . "/$request->oldGroup/$request->phone/move/$request->newGroup");
            $response = json_decode($response->getBody(),TRUE);
        } else {
            $response = ['status' => false, 'message' => 'Account move failed'];
        }
        
        if($response['status']) {
            flash($response['message'])->success();
        } else {
            flash($response['message'])->error();
        }

        return redirect()->route('accounts.group', ['group_id' => $request->newGroup, 'service' => $service]);
    }
}

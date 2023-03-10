<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use App\GojekClient;
use App\DigiposClient;
use App\OvoClient;

class AccountController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($service = "")
    {
        $license = auth()->user()->license_key;

        if($service == "gojek"){
            $gojekClient = new GojekClient();

            $accounts = $gojekClient->getAccounts($license);
            $groups = $gojekClient->getGroups($license);
        } else if($service == "digipos"){
            $digiposClient = new DigiposClient();
            $accounts = $digiposClient->getAccounts($license);
            $groups = $digiposClient->getGroups($license);
        } else if($service == "ovo") {
            $ovoClient = new OvoClient();

            $accounts = $ovoClient->getAccounts($license);
            $groups = $ovoClient->getGroups($license);
        } else {

        }

        // jika belum subscribe service
        if(isset($accounts['status']) && $accounts['status'] == false) {
            $accounts = [];
        }


        $data = [
            'accounts' => $accounts,
            'groups' => $groups,
            'service' => $service,
            'filterBy' => 'All Account'
        ];

        return view("backend.member.pages.account.$service")->with($data);
    }

    public function store(Request $request, $service)
    {
        $this->validate($request, [
            'phone' => 'required|string|max:191'
        ]);

        $license = auth()->user()->license_key;

        if($service == "gojek") {
            $client = new GojekClient();

            $groups = $client->getGroups($license);

            // search default group
            $defaultGroup = 0;
            foreach ($groups as $group) {
                if($group['is_default'])
                    $defaultGroup = $group['id'];
            }

            $response = $client->addAccount($license, $defaultGroup, $request->phone);
        } else if($service == "digipos"){
            $client = new DigiposClient();

            $response = $client->addAccount($license, $request->phone);
        } else if($service == "ovo"){
            $client = new OvoClient();

            $groups = $client->getGroups($license);

            // search default group
            $defaultGroup = 0;
            foreach ($groups as $group) {
                if($group['is_default'])
                    $defaultGroup = $group['id'];
            }

            $response = $client->addAccount($license, $defaultGroup, $request->phone);
        } else {
            $response = ['status' => false, 'message' => 'Failed to add account to default group'];
        }

        if($response['status']) {
            activity("account")->log("Create new account in service : $service");
            flash($response['message'])->success();
        } else {
            flash($response['message'])->error();
        }

        return redirect()->route('accounts', $service);
    }

    public function group($groupId = 0, $service = "")
    {
        $license = auth()->user()->license_key;

        if($service == "gojek"){
            $gojekClient = new GojekClient();

            $groups = $gojekClient->getGroups($license);
            $accounts = $gojekClient->getAccountByGroup($license, $groupId);
        } else if($service == "digipos"){
            $digiposClient = new DigiposClient();
            $accounts = $digiposClient->getAccounts($license);
            $groups = $digiposClient->getGroups($license);
        } else if($service == "ovo"){
            $ovoClient = new OvoClient();

            $groups = $ovoClient->getGroups($license);
            $accounts = $ovoClient->getAccountByGroup($license, $groupId);
        } else {
            $groups = [];
            $accounts = [];
        }
        
        // jika belum subscribe service
        if(isset($accounts['status']) && $accounts['status'] == false) {
            $accounts = [];
        }

        $data = [
            'accounts' => $accounts,
            'groups' => $groups,
            'service' => $service,
            'filterBy' => 'Group'
        ];

        return view("backend.member.pages.account.$service")->with($data);
    }

    public function move(Request $request, $service = "")
    {
        $this->validate($request, [
            'phone' => 'required|string|max:191',
            'oldGroup' => 'required|integer|min:0',
            'newGroup' => 'required|integer|min:0'
        ]);

        if($service == "gojek") {
            $gojekClient = new GojekClient();

            $response = $gojekClient->moveAccount(Auth::user()->license_key, $request->oldGroup, $request->phone, $request->newGroup);
        } else if($service == "digipos"){
            $digiposClient = new DigiposClient();
        } else if($service == "ovo") {
            $ovoClient = new OvoClient();

            $response = $ovoClient->moveAccount(Auth::user()->license_key, $request->oldGroup, $request->phone, $request->newGroup);
        } else {
            $response = ['status' => false, 'message' => 'Account move failed'];
        }

        if($response['status']) {
            activity("account")->log("Move account in service : $service");
            flash($response['message'])->success();
        } else {
            flash($response['message'])->error();
        }

        return redirect()->route('accounts.group', ['group_id' => $request->newGroup, 'service' => $service]);
    }
}

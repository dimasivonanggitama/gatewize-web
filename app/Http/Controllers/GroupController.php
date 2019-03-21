<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;

class GroupController extends Controller
{
    private $_client;
    public function __construct()
    {
        $this->middleware('auth');
        $this->_client = new Client();
    }
    
    public function index($service = "")
    {
        $client = new Client();
        try{
            if($service == "gojek"){
                $response = $client->get("https://api.gatewize.com/devel-gopay/group/" . Auth::user()->license_key . "/list", ['User-Agent' => null]);
            } else {
                $response = null;
            }
            
            if($response != null && $response->getStatusCode() == 200){
                $groups = json_decode($response->getBody());
            } else {
                $groups = [];
            }
            if(isset($groups->status)){
                $groups = [];
            }
            $data = [
                'groups' => $groups,
                'service' => $service,
            ];
        } catch (ClientException $e) {
            $data = [
                'groups' => [],
                'service' => $service,
            ];
            // echo Psr7\str($e->getRequest());
            // echo Psr7\str($e->getResponse());
        } 
        // catch (RequestException $e) { 
        //     return redirect()->route('groups', 'gojek');
        // }

        return view('admin.pages.group.index')->with($data);
    }

    public function show($service = "", $id = 0)
    {
        
    }

    public function create($service = "")
    {
        return view('admin.pages.group.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'limit' => 'required|integer|min:0'
        ]);
        
        if($request->service == "gojek"){
            $response = $this->_client->post("https://api.gatewize.com/devel-gopay/group/" . Auth::user()->license_key . "/add", 
                [
                    'json' => [
                        'name' => $request->name,
                        'limit' => (int)$request->limit
                    ]
                ]);
            $response = json_decode($response->getBody());
        } else {
            $response = ['status' => false];
        }
        
        if($response->status){
            flash($response->message)->success();
        } else {
            flash($response->message)->error();
        }

        return redirect()->route('groups', 'gojek');
    }

    public function edit($service = "", $id = 0)
    {
        return view('admin.pages.group.edit');
    }

    public function update(Request $request, $service = "", $id = 0)
    {
        
    }

    public function destroy(Request $request, $service = "")
    {
        $this->validate($request, [
            'id' => 'required|integer|min:0'
        ]);
        
        if($request->service == "gojek"){
            $response = $this->_client->get("https://api.gatewize.com/devel-gopay/group/" . Auth::user()->license_key . "/$request->id/delete");
            $response = json_decode($response->getBody());
        } else {
            $response = ['status' => false];
        }

        if($response->status){
            flash($response->message)->success();
        } else {
            flash($response->message)->error();
        }
        $this->_client = null;

        return redirect()->route('groups', $service);
    }
}

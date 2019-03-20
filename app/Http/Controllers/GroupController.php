<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use GuzzleHttp\Client;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index($service = "")
    {
        $client = new Client();
        if($service == "gojek"){
            $response = $client->get("https://api.gatewize.com/devel-gopay/group/" . Auth::user()->license_key . "/list");
        } else {
            $response = null;
        }
        
        if($response != null && $response->getStatusCode() == 200){
            $groups = json_decode($response->getBody());
        } else {
            $groups = array();
        }
        if(isset($groups->status)){
            $groups = array();
        }
        $data = [
            'groups' => $groups,
            'service' => $service,
        ];

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
        
    }

    public function edit($service = "", $id = 0)
    {
        return view('admin.pages.group.edit');
    }

    public function update(Request $request, $service = "", $id = 0)
    {
        
    }

    public function destroy($service = "", $id = 0)
    {
        
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use GuzzleHttp\Client;

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
        if($service == "gojek"){
            $response = $this->_client->get("https://api.gatewize.com/devel-gopay/group/" . Auth::user()->license_key . "/list");
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
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'limit' => 'required|integer|min:0'
        ]);
        
        if($request->service == "gojek"){
            $response = $this->_client->post("https://api.gatewize.com/devel-gopay/group/" . Auth::user()->license_key . "/add", 
                [
                    'form_params' => [ 
                        'name' => $request->name,
                        'limit' => $request->limit
                    ]
                ]);
            $response = json_decode($response->getBody());
        } else {
            $response = ['status' => false];
        }

        if($response->status){
            flash('Berhasil menambahkan grup')->success();
        } else {
            flash('Gagal menambahkan grup')->error();
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

    public function destroy($service = "", $id = 0)
    {
        
    }
}

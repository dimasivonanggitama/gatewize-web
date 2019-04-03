<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use App\GojekClient;
use App\DigiposClient;
use App\OvoClient;

class GroupController extends Controller
{
    private $_client;
    public function __construct()
    {
        $this->middleware('auth');
        $this->_client = new Client();
    }

    public function gojek()
    {
        $client = new GojekClient();
        $license = auth()->user()->license_key;
        $groups = $client->getGroups($license);

        return view('admin.pages.group.gojek', compact('groups'));
    }

    public function digipos()
    {
        $client = new DigiposClient();
        $license = auth()->user()->license_key;
        $groups = $client->getGroups($license);

        return view('admin.pages.group.digipos', compact('groups'));
    }

    public function ovo()
    {
        $client = new OvoClient();
        $license = auth()->user()->license_key;
        $groups = $client->getGroups($license);

        return view('admin.pages.group.ovo', compact('groups'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'limit' => 'required|integer|min:0'
        ]);

        $gojekClient = new GojekClient();
        $ovoClient = new OvoClient();

        if($request->service == "gojek"){
            $response = $gojekClient->addGroup(auth()->user()->license_key, $request->name, $request->limit);
        } else if($request->service == "ovo"){
            $response = $ovoClient->addGroup(auth()->user()->license_key, $request->name, $request->limit);
        } else {
            $response = ['status' => false];
        }

        if($response['status']){
            flash($response["message"])->success();
        } else {
            flash($response["message"])->error();
        }

        return redirect()->route("groups.$request->service");
    }

    public function update(Request $request, $service = "")
    {
        $this->validate($request, [
            'id' => 'required|integer|min:0',
            'name' => 'required|string|max:191',
            'limit' => 'required|integer|min:0'
        ]);

        $gojekClient = new GojekClient();
        $license = auth()->user()->license_key;

        if($request->service == "gojek"){
            $response = $gojekClient->updateGroup($license, $request->id, $request->name, $request->limit);
        } else if($request->service == "ovo") {
            $response = $ovoClient->updateGroup($license, $request->id, $request->name, $request->limit);
        } else {
            $response = ['status' => false];
        }

        if($response['status']){
            flash($response["message"])->success();
        } else {
            flash($response["message"])->error();
        }

        return redirect()->route("groups.$request->service");
    }

    public function destroy(Request $request, $service = "")
    {
        $this->validate($request, [
            'id' => 'required|integer|min:0'
        ]);

        $gojekClient = new GojekClient();
        $ovoClient = new OvoClient();

        if($request->service == "gojek"){
            $response = $gojekClient->deleteGroup(auth()->user()->license_key, $request->id);
        } else if($request->service == "ovo"){
            $response = $ovoClient->deleteGroup(auth()->user()->license_key, $request->id);
        } else {
            $response = ['status' => false];
        }

        if($response['status']){
            flash($response['message'])->success();
        } else {
            flash($response['message'])->error();
        }

        return redirect()->route("groups.$service");
    }

    public function refresh($service = "", $id = "")
    {
        if($service == "gojek"){
            $response = $this->_client->get("https://api.gatewize.com/devel-gopay/refresh/" . Auth::user()->license_key . "/$id/data");
            $response = json_decode($response->getBody());
        } else if($service == "ovo"){
            $response = $this->_client->get("https://api.gatewize.com/devel-ovo/refresh/" . Auth::user()->license_key . "/$id/data");
            $response = json_decode($response->getBody());
        } else {
            $response = ['status' => false];
        }



        if($response != null){
            flash("Berhasil merefresh status")->success();
        } else {
            flash("Gagal merefresh status")->error();
        }
        $this->_client = null;

        return redirect()->route('groups.refresh', $service);
    }
}

<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Deposit as Deposit;
use App\GojekClient;
use App\DigiposClient;
use App\OvoClient;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $license = auth()->user()->license_key;

        $gojekClient = new GojekClient();
        $digiposClient = new DigiposClient();
        $ovoClient = new OvoClient();

        $statsGojek = $gojekClient->getStats($license);
        $statsDigipos = $digiposClient->getStats($license);
        $statsOvo = $ovoClient->getStats($license);
        $dataStats = [
            "month" => date("n"),
            "totalAccount" => $statsGojek['totalAccount'] + $statsDigipos['totalAccount'] + $statsOvo['totalAccount'],
            "services" => [
                "digipos" => $statsDigipos,
                "gojek" => $statsGojek,
                "ovo" => $statsOvo
            ]
        ];
        return view('backend.member.pages.dashboard')->with($dataStats);
    }
}
<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Deposit as Deposit;
use App\GojekClient;
use App\DigiposClient;
use App\OvoClient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('backend.member.pages.report.index');
    }

    public function gojek()
    {
        $client = new GojekClient();
        $license = auth()->user()->license_key;
        $groups = $client->getGroups($license);
        return view('backend.member.pages.report.gojek', compact('groups'));
    }

    public function digipos()
    {
        $client = new DigiposClient();
        $license = auth()->user()->license_key;
        $groups = $client->getGroups($license);
        return view('backend.member.pages.report.digipos', compact('groups'));
    }

    public function ovo()
    {
        $client = new OvoClient();
        $license = auth()->user()->license_key;
        $groups = $client->getGroups($license);
        return view('backend.member.pages.report.ovo', compact('groups'));
    }
}

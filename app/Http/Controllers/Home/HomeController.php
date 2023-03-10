<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.pages.main');
    }

    public function terms()
    {
        return view('home.pages.tos');
    }

    public function privacy()
    {
        return view('home.pages.privacy');
    }

    public function contact()
    {
        return view('home.pages.contact');
    }
}

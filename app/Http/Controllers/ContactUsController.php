<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactUsController extends Controller {
    public function index() {
		return view('layouts.pages.contact-us');
	}
}
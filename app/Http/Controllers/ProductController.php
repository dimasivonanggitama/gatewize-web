<?php

namespace App\Http\Controllers;

use App\GojekClient;
use Illuminate\Http\Request;

class ProductController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function gojekPulsa()
    {
    	$client = new GojekClient();
    	$license = auth()->user()->license_key;
    	$pulsaProducts = $client->pulsaProducts($license, '082268888859');
    	$tokenProducts = $client->tokenProducts($license);
    	return view('admin.pages.product.gojek', compact('pulsaProducts', 'tokenProducts'));	
    }
}

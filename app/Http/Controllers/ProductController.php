<?php

namespace App\Http\Controllers;

use App\GojekClient;
use App\DigiposClient;
use Illuminate\Http\Request;

class ProductController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function gojek()
    {
    	$client = new GojekClient();
    	$license = auth()->user()->license_key;
    	$pulsaProducts = $client->pulsaProducts($license, '082268888859');
    	$tokenProducts = $client->tokenProducts($license);
    	return view('admin.pages.product.gojek', compact('pulsaProducts', 'tokenProducts'));	
	}
	
	public function digipos()
	{
		$client = new DigiposClient();
		$license = auth()->user()->license_key;

		$voucherProducts = $client->voucherProducts($license);
		$digitalProducts = $client->digitalProducts($license);
		$smsProducts = $client->smsProducts($license);
		$bulkProducts = $client->bulkProducts($license);
		$voiceProducts = $client->voiceProducts($license);

    	return view('admin.pages.product.digipos', compact('voucherProducts', 'digitalProducts', 'smsProducts', 'bulkProducts', 'voiceProducts'));
	}
}

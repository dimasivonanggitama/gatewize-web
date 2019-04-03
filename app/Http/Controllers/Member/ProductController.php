<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\DigiposClient;
use App\GojekClient;
use App\OvoClient;
use App\Product;
use App\Service;
use Illuminate\Http\Request;

class ProductController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		//must redirect to dashboard or default product
		$products = Product::all();
		return view('backend.member.pages.product.store', compact('products'));
	}

	public function gojek()
	{
		$client = new GojekClient();
		$license = auth()->user()->license_key;
		$tsProducts = $client->pulsaProducts($license, '082268888859');
		$xlProducts = $client->pulsaProducts($license, '087880892109');
		$axProducts = $client->pulsaProducts($license, '083808921095');
		$thProducts = $client->pulsaProducts($license, '08973502424');
		$idProducts = $client->pulsaProducts($license, '085746089296');
		$smProducts = $client->pulsaProducts($license, '08812345678');
		$pulsaProducts = array_merge($tsProducts, $xlProducts, $axProducts, $thProducts, $smProducts, $idProducts);
		$tokenProducts = $client->tokenProducts($license);
		return view('backend.member.pages.product.gojek', compact('pulsaProducts', 'tokenProducts'));
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

		return view('backend.member.pages.product.digipos', compact('voucherProducts', 'digitalProducts', 'smsProducts', 'bulkProducts', 'voiceProducts'));
	}

	public function ovo()
	{
		$client = new OvoClient();
		$license = auth()->user()->license_key;
		$tsProducts = $client->pulsaProducts($license, 'TELKOMSEL');
		$xlProducts = $client->pulsaProducts($license, 'XL');
		$axProducts = $client->pulsaProducts($license, 'AXIS');
		$thProducts = $client->pulsaProducts($license, 'TRI');
		$idProducts = $client->pulsaProducts($license, 'INDOSAT');
		$smProducts = $client->pulsaProducts($license, 'SMARTFREN');
		$pulsaProducts = array_merge($tsProducts, $xlProducts, $axProducts, $thProducts, $smProducts, $idProducts);
		$bankProducts = $client->bankProducts($license);

		return view('backend.member.pages.product.ovo', compact('pulsaProducts', 'bankProducts'));
	}
}

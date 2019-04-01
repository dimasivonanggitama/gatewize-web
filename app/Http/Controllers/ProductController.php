<?php

namespace App\Http\Controllers;

use App\DigiposClient;
use App\GojekClient;
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
		$products = Product::all();
		$services = Service::all();
		return view('admin.pages.product.index', compact('products', 'services'));
	}

	public function create()
	{
		$services = Service::all();
		return view('admin.pages.product.create', compact('services'));
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'service_id' => 'required|exists:services,id',
			'code' => 'required',
			'name' => 'required',
			'description' => 'required',
			'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg',
			'price' => 'required|integer',
			'termin' => 'required|in:days,months,years',
			'slot' => 'required|integer'
		]);

		if($request->hasFile('image')){
			$path = $request->image->store('images/product', 'public');
		}

		Product::create([
			'service_id' => $request->service_id,
			'code' => $request->code,
			'name' => $request->name,
			'description' => $request->description,
			'image' => $path,
			'price' => $request->price,
			'termin' => $request->termin,
			'slot' => $request->slot
		]);

		return redirect('/admin/products')->with('flash', 'New Product has been created.');
	}

	public function update(Request $request, $productId)
	{
		$product = Product::find($productId);
		if ($product != null) {
			$this->validate($request, [
				'service_id' => 'required|exists:services,id',
				'code' => 'required',
				'name' => 'required',
				'description' => 'required',
				'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg',
				'price' => 'required|integer',
				'termin' => 'required|in:days,months,years',
				'slot' => 'required|integer'
			]);

			if($request->hasFile('image')){
				$path = $request->image->store('images/product', 'public');
			}

			$product->update([
				'service_id' => $request->service_id,
				'code' => $request->code,
				'name' => $request->name,
				'description' => $request->description,
				'image' => $path,
				'price' => $request->price,
				'termin' => $request->termin,
				'slot' => $request->slot
			]);
		}
		return redirect('/admin/products')->with('flash', 'Product has been updated.');
	}

	public function destroy($productId)
	{
		$product = Product::find($productId);

		if ($product != null) {
			$product->delete();
		}

		return back()->with('flash', 'Product has been deleted.');
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

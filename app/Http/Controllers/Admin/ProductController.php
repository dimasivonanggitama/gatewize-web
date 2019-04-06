<?php

namespace App\Http\Controllers\Admin;

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
		$products = Product::all();
		$services = Service::all();
		return view('backend.admin.pages.product.index', compact('products', 'services'));
	}

	public function create()
	{
		$services = Service::all();
		return view('backend.admin.pages.product.create', compact('services'));
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'service_id' => 'required|exists:services,id',
			'code' => 'required',
			'name' => 'required',
			'description' => 'required',
			// 'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg',
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
			// 'image' => $path,
			'price' => $request->price,
			'termin' => $request->termin,
			'slot' => $request->slot
		]);
		flash('New Product has been created.')->success();
		return redirect('/admin/products');
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
			flash('Product has been updated.')->success();
			return back();
		}
		flash('Product not found.')->error();
		return back();
	}

	public function destroy($productId)
	{
		$product = Product::find($productId);

		if ($product != null) {
			$product->delete();
		}
		flash('Product has been deleted')->success();
		return back();
	}
}

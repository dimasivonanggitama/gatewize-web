<?php

namespace App\Http\Controllers\Member;

use App\DigiposClient;
use App\GojekClient;
use App\Http\Controllers\Controller;
use App\OvoClient;
use App\Product;
use App\Service;
use App\Transaction;
use Illuminate\Http\Request;

class StoreController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$products = Product::all();
		return view('backend.member.pages.store.index', compact('products'));
	}

	public function subscribe(Request $request)
	{
		$this->validate($request, [
			'product_id' => 'required|exists:products,id'
		]);
		$product = Product::find($request->product_id);
		$user = auth()->user();
		if ($product != null) {
			$balanceLeft = $user->balance - $product->price;
			if ($balanceLeft > 0) {
				$user->balanceHistories()->create([
					'type' => 'credit',
					'description' => 'Pembelian produk '. $product->name,
					'last_balance' => $user->balance,
					'update_balance' => $balanceLeft
				]);
				$user->update([
					'balance' => $balanceLeft
				]);
				Transaction::create([
					'user_id' => $user->id,
					'product_id' => $product->id
				]);

				activity("store")->log("Buy new product: $product->name");
				flash('Product subscribe succeed.')->success();
				return back();
			}else{
				flash('Your balance doesn\'t enough')->error();
				return back();
			}
		}else{
			flash('Product not found')->error();
			return back();
		}
	}
}

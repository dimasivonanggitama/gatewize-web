<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\DigiposClient;
use App\GojekClient;
use App\OvoClient;
use App\Product;
use App\Service;
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
				// $client;
				// switch (strtolower($product->service->name)) {
				// 	case 'gojek':
				// 	$client = new GojekClient();
				// 	break;
				// 	case 'digipos':
				// 	$client = new DigiposClient();
				// 	break;
				// 	case 'ovo':
				// 	$client = new OvoClient();
				// 	break;
				// }
				// $response = $client->subscribe($user->id, $user->license_key, $product->slot, $product->service->settings);
				// if ($response['status']) {
					$user->balanceHistories()->create([
						'type' => 'credit',
						'description' => 'Pembelian produk '. $product->name,
						'last_balance' => $user->balance,
						'update_balance' => $balanceLeft
					]);
					$user->update([
						'balance' => $balanceLeft
					]);
					flash('Product subscribe succeed.')->success();
					return back();
				// }
				// flash('There\'s something wrong with server')->error();
				// return back();
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

<?php

namespace App\Http\Controllers\Admin;

use App\DigiposClient;
use App\GojekClient;
use App\Http\Controllers\Controller;
use App\OvoClient;
use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
    	$transactions = Transaction::all();
    	return view('backend.admin.pages.transaction.index', compact('transactions'));
    }

    public function approve(Request $request, $transactionId)
    {
        $transaction = Transaction::find($transactionId);
        $user = $transaction->user;
        $product = $transaction->product;
        $client;
        switch (strtolower($product->service->name)) {
            case 'gojek':
            $client = new GojekClient();
            break;
            case 'digipos':
            $client = new DigiposClient();
            break;
            case 'ovo':
            $client = new OvoClient();
            break;
        }
        $response = $client->subscribe($user->id, $user->license_key, $product->slot, $product->service->settings);
        if ($response['status']) {
            $transaction->update('status', 'approved');
            flash('Transaction has been approved.')->success();
            return back();
        }
        flash('There\'s something wrong with server')->error();
        return back();	
    }

    public function destroy($transactionId)
    {
        $transaction = Transaction::find($transactionId);
        if ($transaction != null) {
            $transaction->delete();
        }	
        flash('Transaction has been deleted.')->success();
        return back();
    }
}

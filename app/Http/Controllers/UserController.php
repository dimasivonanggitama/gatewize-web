<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
    	$users = User::all();
    	return view('admin.pages.user.index', compact('users'));
    }

    public function store(Request $request)
    {
    	
    }

    public function destroy($userId)
    {
    	$user = User::find($userId);
    	if ($user != null) {
    		$user->delete();
    	}
    	flash('User has been deleted.')->success();
    	return back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as User;
use Auth; 
use Mail;
use App\Mail\UpdatePassword;

class ProfileController extends Controller
{
    public function index() {
		return view('admin.pages.profile.profile');
	}

	public function update(Request $request)
	{
		$this->validate($request, [
			'fullname' => 'required|string|max:191',
			'username' => 'required|string|max:191',
			'email' => 'required|string|max:191',
			'address' => 'required|string|max:191',
			'telegram' => 'required|string|max:191',
		]);

		$user = Auth::user();

		$user->fullname = $request->fullname;
		$user->username = $request->username;
		$user->email = $request->email;
		$user->address = $request->address;
		$user->telegram = $request->telegram;

		if($request->password != null){
			$this->validate($request, [
				'password' => 'required|string|max:191'
			]);

			$user->password = bcrypt($request->password);
		}

		$user->save();

		if($request->password != null)
		    Mail::to(Auth::user()->email)->send(new UpdatePassword);		

		flash("Success update user")->success();
		
		return redirect()->route('profile');
	}
}

<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User as User;
use Auth; 
use Mail;
use App\Mail\UpdatePassword;
use Spatie\Activitylog\Models\Activity;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function index() {
		$activityLog = Activity::where('causer_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
		return view('backend.member.pages.profile.profile', compact('activityLog'));
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
		activity("profile")->log("Update profile");
		
		return redirect()->route('profile');
	}
}

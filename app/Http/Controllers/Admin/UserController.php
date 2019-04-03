<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $users = User::where('deleted_at', null)->get();
        return view('backend.admin.pages.user.index', compact('users', 'roles'));
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'telegram' => 'required',
            'address' => 'required',
            'balance' => 'required|integer',
            'role_id' => 'required|exists:roles,id'
        ]);	
        $user = User::create([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'balance' => $request->balance,
            'telegram' => $request->telegram,
            'address' => $request->address,
            'license_key' => md5($request->email . rand(0,1000)),
            'role_id' => $request->role_id
        ]);

        flash('User has been created.')->success();
        return back();
    }

    public function update(Request $request, $userId)
    {
        $user = User::find($userId);
        if ($user != null) {
            $user->update([
            'username' => $request->username ?: $user->username,
            'fullname' => $request->fullname ?: $user->fullname,
            'email' => $request->email ?: $user->email,
            'password' => Hash::make($request->password) ?: $user->password,
            'balance' => $request->balance ?: $user->balance,
            'telegram' => $request->telegram ?: $user->telegram,
            'address' => $request->address ?: $user->address,
            'role_id' => $request->role_id ?: $user->role_id
            ]);

        flash('User has been updated.')->success();
        return back();
        }

        flash('User not found.')->error();
        return back();
    }

    public function destroy($userId)
    {
    	$user = User::find($userId);
    	if ($user != null) {
    		$user->update([
                'deleted_at' => now(),
            ]);
    	}
    	flash('User has been deleted.')->success();
    	return back();
    }
}

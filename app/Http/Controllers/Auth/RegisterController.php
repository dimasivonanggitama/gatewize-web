<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Deposit;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Carbon\Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'username' => ['required', 'string', 'unique:users'],
            'address' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'username' => $data['username'],
            'fullname' => $data['fullname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'balance' => 10000,
            'telegram' => $data['telegram'],
            'address' => $data['address']
        ]);

        // $now = Carbon::now();
        // $expired_date = $now->addHours(6);

        // $data = [
        //     'user_id' => $user->id,
        //     'payment_method_id' => "1",
        //     'amount' => 10000,
        //     'balance' => 10000,
        //     'sender_name' => $user->fullname,
        //     'status' => 'ACCEPTED',
        //     'unique_code' => 0,
        //     'total' => 10000,
        //     'expired_date' => $expired_date
        // ];


        // $deposit = Deposit::create($data);

        return $user;
    }
}

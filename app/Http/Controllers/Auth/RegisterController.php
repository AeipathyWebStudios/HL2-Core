<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/dashboard';

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
            'name' => 'required|string|max:255',
            'avatar_url' => 'required|string',
            'character_first' => 'required|string|max:20',
            'character_last' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
		$strength = "";
		$int = "";
	
        return User::create([
            'name' => $data['name'],
            'avatar_url' => $data['avatar_url'],
            'character_first' => $data['character_first'],
            'character_last' => $data['character_last'],
            'character_class' => $data['character_class'],
			'permission_level' => 1,
            'level' => 1,
            'money' => 50,
			'strength' => 1,
			'intelligence' => 1,
			'agility' => 1,
			'luck' => 1,
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}

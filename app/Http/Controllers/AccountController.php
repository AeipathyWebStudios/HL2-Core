<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class AccountController extends Controller
{
	
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    /**
     * Show the account dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }
	
	/**
     * Show the account settings.
     *
     * @return \Illuminate\Http\Response
     */
	public function auth_settings()
	{
		return view('auth.settings');
	}
	
	/**
     * Show the account edit the profile bio form.
     *
     * @return \Illuminate\Http\Response
     */
	public function profile_edit_bio()
	{
		return view('profile.edit_bio');
	}
	
   /**
    * Show the account edit the profile bio form.
	* @returns null
    * @arguments Request - $request
    */
	public function store(Request $request)
    {
		// TODO : Figure out how to do this with the Auth class & User model
    }
	
	
}

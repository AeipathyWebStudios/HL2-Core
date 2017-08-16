<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
	
    public function index()
    {
        return view('splash');
    }
	
	/**
     * Show the application about page
     */
    public function about()
    {
		return view('about');
    }

}

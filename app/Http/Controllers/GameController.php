<?php

namespace App\Http\Controllers;

use App\Game;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


class GameController extends Controller
{
	private $_game;

	
    function __construct()
	{	
		$this->_game = new Game;
		$this->middleware('auth');
	}

	public function index()
	{
		$richest = $this->_game->getRichestPlayers(5);
		$most_exp = $this->_game->getMostExperienced(5);
		return view('game.main', compact('richest', 'most_exp')); 
	}
	
}

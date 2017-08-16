<?php

namespace App;

use Auth;

// All game models
use App\User;
use App\Item;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Game extends Model
{
	private $_user, $_item;
	
	public function __construct()
	{
		$this->_user = new User;
		$this->_item = new Item;
	}
	
	// Returns the richest players in the game
    public function getRichestPlayers($limit)
	{
		$richest_players = $this->_user->orderby('money', 'desc')
		->take($limit)
		->get();
		
		return $richest_players;
	}
	
	// Returns highest level players in the game
	public function getMostExperienced($limit)
	{
		$highest_levels = $this->_user->orderby('level', 'desc')
		->take($limit)
		->get();	

		return $highest_levels;
	}	
	
	// Handles the item purchase transaction
	public function buyItem($item_id = null, $user_id)
	{
		$user = $this->_user->where('id', $user_id);			 
		$itemCost = $this->_item->getMarketPrice($item_id);
		$transaction = $user->money - $itemCost;
	
		return $transaction;
	}
	
	
}

<?php

namespace App\Http\Controllers;

use Auth;

use App\Game;
use App\Item;
use App\User;

use Illuminate\Http\Request;

class ItemController extends Controller
{
	private $_item, $_user, $_game;
	
	/**
     * Construct this class & instantiate needed classes
     */
	function __construct()
	{
		$this->_item = new Item;
		$this->_game = new Game;
		$this->_user = new User;
		$this->middleware('auth');
	}
	
	/**
     * Show item index
     */
    public function index()
	{
		$items = $this->_item->getAll();
		return view('game.items.index', compact('items'));
	}
	
	public function create()
	{
		return view('game.admin.items.create');
	}
	
	/**
     * Create a new item instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
		$this->validate($request, [
			'img_path' => 'required',
			'name' => 'required',
			'short_desc' => 'required',
			'type' => 'required',
			'atk_pts' => 'required',
			'def_pts' => 'required',
			'market_price' => 'required',
			'weight' => 'required'
		]);
		
		$input = $request->all();

		Item::create($input);
		Session::flash('flash_message', $request->name.' successfully added to Database');

		return redirect()->back();
	}
	
	public function view($item_id = null)
	{
		$item = $this->_item->findOrFail($item_id); 
		return view('game.items.view', compact('item'));
	}	
	
	public function buy($item_id = null)
	{
		$transaction = $this->_game->buyItem($item_id, Auth::User()->id);
		return view('game.items.buy', compact('transaction'));
	}
	
	
}

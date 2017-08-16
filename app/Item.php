<?php

namespace App;

use App\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
	
    protected $fillable = ['img_path', 'short_desc', 'type', 'name', 'market_price', 'atk_pts', 'def_pts', 'weight'];
	
	// Timestamp Constants
	const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
	
	public function find($id)
	{
		$item = DB::table($this->table)->find($id);
		return $item;
	}
	
	public function getAll()
	{
		$items = DB::table($this->table)->get();
		return $items;
	}
	
	public function getImgPath($id)
	{
		$item = $this->find($id);
		return $item->img_path;
	}
	
	public function getMarketPrice($id)
	{
		$item = $this->findOrFail($id);
		return $item->market_price;
	}
	

}

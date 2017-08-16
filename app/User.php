<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
	
	protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
		'email', 
		'avatar_url', 
		'character_first', 
		'character_last', 
		'character_class', 
		'permission_level', 
		'level', 
		'money', 
		'strength', 
		'intelligence', 
		'agility', 
		'luck', 
		'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	public function find($id)
	{
		Log::info('Finding user with the ID: '.$id);
		$findUser = DB::table($this->table)->find($id);
		return $findUser;
	}
	
	
	public function getAll()
	{
		Log::info('Getting all users from the DB');
		$getAll = DB::table($this->table)->get();
		return $getAll;
	}
}

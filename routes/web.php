<?php

/*
|--------------------------------------------------------------------------
| Web Routes - Aeipathy Web Solutions :: HL2 Core
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth & Password Hash Routes
Auth::routes();


// Resourced Routes
Route::resource("item", "ItemController");
Route::resource("user", "AccountController");


// Admin Routes
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin/items/create', 'ItemController@create')->name('item_create');

// Page Routes 
Route::get('/', 'PagesController@index')->name('home');
Route::get('/tutorial', 'PagesController@tutorial')->name('tutorial');
Route::get('/about', 'PagesController@about')->name('about');

// Account Routes


Route::get('/account', 'AccountController@index')->name('dashboard');
Route::get('/account/profile/edit_bio', 'AccountController@profile_edit_bio')->name('edit_bio');
Route::get('/account/settings', 'AccountController@auth_settings')->name('settings');
Route::get('/account/settings/characters', 'AccountController@characters')->name('characters');

// Public Game Routes
Route::get('/game', 'GameController@index')->name('game');
Route::get('/game/intro', 'GameController@introduction');
Route::get('/game/missions', 'GameController@missions');

Route::get('/items', 'ItemController@index')->name('items');

Route::get('/item/view/{id}', 'ItemController@view')->name('view_item');
Route::get('/item/buy/{id}', 'ItemController@buy')->name('buy_item');


// 'Secret' Routes WIP Wating for Faction functionality
// Route::get('/game/faction-choice', 'GameController@faction_choice');




<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@index');

Route::get('/about', 'PagesController@about');

Route::get('members/{member}/isbanned', 'MembersController@isBanned');
Route::put('members/{member}/ban', 'MembersController@ban');
Route::put('members/{member}/unban', 'MembersController@unban');
Route::put('members/{member}/payback', 'MembersController@payback');
Route::get('members/{member}/rent', 'RentalsController@create');
Route::put('rentals/{rental}/extend', 'RentalsController@extend');
Route::put('rentals/{rental}/return', 'RentalsController@returnGame');
Route::get('games/search', 'GamesController@search');

Route::get('users', 'UsersController@index');
Route::delete('users/{user}', 'UsersController@destroy');
Route::put('users/{user}/promote', 'UsersController@promote');

Route::resource('games', 'GamesController');

Route::resource('members', 'MembersController');

Route::resource('rentals', 'RentalsController');

Route::resource('society_rules', 'SocietyRulesController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

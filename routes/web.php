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

Route::put('members/{member}/ban', 'MembersController@ban');

Route::put('members/{member}/unban', 'MembersController@unban');

Route::resource('games', 'GamesController');

Route::resource('members', 'MembersController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

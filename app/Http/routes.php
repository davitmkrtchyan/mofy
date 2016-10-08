<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',function(){
    return view('welcome');
});
Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('login', function(){
    return redirect('/');
});
Route::get('/game/{p1}-{p2}', 'HomeController@game');
Route::get('/serie/{s1}', 'HomeController@serie');
Route::get('/today/{t1}', 'HomeController@today');
Route::get('/bookmaker/{b1}', 'HomeController@bookmaker');

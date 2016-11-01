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

Route::get('/', 'HomeController@index');
Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/home/loadByEventID/{id}', 'HomeController@loadByEventID');
Route::get('/home/loadGamesByGroupAndCountry/{sport}/{country}/{group}', 'HomeController@loadGamesByGroupAndCountry');
Route::get('/home/loadCountForGroups', 'HomeController@loadCountForGroups');
Route::get('login', function () {
    return redirect('/');
});
Route::get('/game/{p1}-{p2}', 'HomeController@game');
Route::get('/serie/{s1}', 'HomeController@serie');
Route::get('/today/{t1}', 'HomeController@today');
Route::get('/bookmaker/{b1}', 'HomeController@bookmaker');


Route::get('/faq',function(){
    return view('pages.faq');
});
Route::get('/terms-of-use',function(){
    return view('pages.termsofuse');
});
Route::get('/privacy-policy',function(){
    return view('pages.privacypolicy');
});
Route::get('/cookie-policy',function(){
    return view('pages.cookiepolicy');
});
Route::get('/contact-us',function(){
    return view('pages.contactus');
});
Route::get('/site-notice',function(){
    return view('pages.sitenotice');
});
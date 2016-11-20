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

Route::group(['middleware' => 'throttle:5,1'], function(){
    Route::auth();
});
//Route::get('/sendmail', function(){
//    return view('emails.greeting');
//});



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
//Route::get('/bookmaker/{b1}', 'HomeController@bookmaker');

Route::get('/bookmakers', 'HomeController@bookmakers');
Route::get('/bookmakers/sortby', 'HomeController@bookmakersSort');
Route::get('/bookmakers/sortby', 'HomeController@bookmakersSort');
Route::post('/bookmakers/vote', 'HomeController@bookmakersVote');
Route::get('/bookmakers/{id}', 'HomeController@bookmakersDetails');


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

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function()
{
    Route::get('/', function(){
        return view('admin.dashboard');
    } );
    Route::get('/bookmakers', 'AdminController@bookmakers' );
    Route::post('/bookmakers/edit/{id}', 'AdminController@bookmakersEdit' );
    Route::post('/bookmakers/add', 'AdminController@bookmakersAdd' );
    Route::delete('/bookmakers/delete/{id}', 'AdminController@bookmakersDelete' );

    Route::get('/slider', 'AdminController@slider' );
    Route::post('/slider/add', 'AdminController@sliderAdd' );
    Route::delete('/slider/delete/{id}', 'AdminController@sliderDelete' );
});
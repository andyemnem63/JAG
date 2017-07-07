<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('/discovery', function () {
    return view('pages.discovery');
});

Route::POST('/discovery', function () {
    return view('pages.discovery');
});

Auth::routes();

//Home
Route::get('/home', 'HomeController@index')->name('home');

//Itinerary Page
Route::get('/itinerary', 'ItineraryController@index');

//Invite
Route::resource('/invite', 'InvitesController');

//Trips
Route::resource('/account', 'AccountController');

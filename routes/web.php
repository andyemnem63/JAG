<?php


Route::get('/', function () {
    return view('welcome');
});

//Discovery
Route::get('/discovery', function () {
    return view('pages.discovery');
});
Route::POST('/discovery', function () {
    return view('pages.discovery');
});

Auth::routes();

//Home
Route::get('/home', 'HomeController@index')->name('home');

//Invite
Route::resource('/invite', 'InvitesController');

//Trips
Route::resource('/account', 'AccountController');

//Testing Dashboard
Route::get('/dash', function () {
    return view('pages.dash');
});

//Testing Dashboard
Route::get('/discover', function () {
    return view('pages.discover');
});

//Days
Route::resource('/days', 'DaysController');


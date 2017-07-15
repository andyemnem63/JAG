<?php


Route::get('/', function () {
    return view('welcome');
});

// Discovery
Route::get('/discovery', function () {
    return view('pages.discovery');
});
Route::POST('/discovery', function () {
    return view('pages.discovery');
});
// Twilio
Route::get('/twilio', function () {
    return view('pages.twilio');
});

Auth::routes();

// Home
Route::get('/home', 'HomeController@index')->name('home');

// Invite
Route::resource('/invite', 'InvitesController');

// Trips
Route::resource('/account', 'AccountController');

// Discover
Route::get('/discover', function () {
    return view('pages.discover');
});

// Days
Route::resource('/days', 'DaysController');

//Polls
Route::POST('/days/{id}/polls', 'PollsController@store');
Route::get('/days/{tripId}/{pollId}/pollChoice', 'PollsController@index');


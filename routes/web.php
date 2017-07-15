<?php

Auth::routes();

// Handles rendering the welcome view.
Route::get('/', function () { return view('welcome'); });

// Handles rendering the home view.
Route::get('/home', 'HomeController@index')->name('home');

// Handles rendering the discover view containing form.
Route::get('/discover', function () { return view('pages.discover'); });

// Handles rendering discovery view to display YELP results.
Route::get('/discovery', function () { return view('pages.discovery'); });

// Handles discover form post submission to conduct YELP API request.
Route::post('/discovery', 'DiscoveryController@retrieveYelpResults');

// Handles rendering twilio view.
Route::get('/twilio', function () { return view('pages.twilio'); });

// Invite
Route::resource('/invite', 'InvitesController');

// Trips
Route::resource('/account', 'AccountController');

// Days
Route::resource('/days', 'DaysController');

//Polls
Route::POST('/days/{id}/polls', 'PollsController@store');
Route::get('/days/{tripId}/{pollId}/pollChoice', 'PollsController@index');


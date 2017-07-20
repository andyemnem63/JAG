<?php

Auth::routes();

// Handles rendering the welcome view.
Route::get('/', function () { return view('welcome'); });

// Handles rendering the home view.
Route::get('/home', 'HomeController@index')->name('home');

// Handles rendering the discover view containing form.
Route::get('/discover/{id}', 'DiscoveryController@index');

// Handles rendering discovery view to display YELP results.
Route::get('/discovery/{id}', 'DiscoveryController@show');

// Handles discover form post submission to conduct YELP API request.
Route::post('/discovery/{id}', 'DiscoveryController@retrieveYelpResults');

// Handles rendering twilio view.
Route::get('/twilio', function () { return view('pages.twilio'); });

// Invite
Route::resource('/invite', 'InvitesController');

// Trips
Route::resource('/account', 'AccountController');

// Days
Route::resource('/days', 'DaysController');

//facebook login
Route::get('/login/facebook', 'Auth\LoginController@redirectToProvider');
//Polls
Route::POST('/days/{id}/polls', 'PollsController@store');
Route::POST('/days/{tripId}/{pollId}/results', 'PollsController@resultsPost');
Route::get('/days/{tripId}/{pollId}/pollChoice', 'PollsController@index');


//facebook login
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');
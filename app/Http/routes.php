<?php

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

// User
Route::get('/request', 'HomeController@index');
Route::post('/request', 'ServiceRequestController@store');
Route::get('/requirements', 'HomeController@requirements');
Route::post('/confirm', 'ServiceRequestController@confirm');

// Provider
Route::get('/apply', 'ProviderController@getApply');
Route::post('/apply', 'ProviderController@postApply');
Route::get('/applications', 'ProviderController@applications');

// Admin routes
Route::get('/providers', 'AdminController@index');
Route::get('/providers/new', 'AdminController@create');
Route::post('/providers', 'AdminController@store');

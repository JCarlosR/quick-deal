<?php

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::post('/request', 'ServiceRequestController@store');
Route::get('/requirements', 'HomeController@requirements');

// Admin routes
Route::get('/providers', 'AdminController@index');
Route::get('/providers/new', 'AdminController@create');
Route::post('/providers', 'AdminController@store');

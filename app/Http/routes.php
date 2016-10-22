<?php

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::post('/request', 'ServiceRequestController@store');
Route::get('/requirements', 'HomeController@requirements');

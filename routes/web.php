<?php

Route::get('/', function () {
    return view('main');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('experience', 'ExperienceController');
Route::get('/experience', 'ExperienceController@index');
Route::post('/experience/store', 'ExperienceController@store');

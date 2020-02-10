<?php

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes(['verify' => true]);

Route::get('lang/{lang}','LangController@changeLang')->name('lang');
Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'verified'], function () {
        Route::get('home', 'HomeController@index')->name('home');
    });
});


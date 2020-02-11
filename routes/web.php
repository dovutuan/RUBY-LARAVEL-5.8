<?php

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes(['verify' => true]);

Route::get('lang/{lang}', 'LangController@changeLang')->name('lang');
Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'verified'], function () {

//        Route::any('/ckfinder/examples/{example?}', 'CKSource\CKFinderBridge\Controller\CKFinderController@examplesAction')->name('ckfinder_examples');

        //admin
        Route::group(['namespace' => 'Admin'], function () {
            Route::group(['prefix' => 'admin'], function () {
                Route::group(['prefix' => 'user'], function () {
                    Route::get('', 'UserController@index')->name('list.user');
                    Route::get('status/{id}', 'UserController@changeStatus')->name('change.status.user');
                    Route::get('export/', 'UserController@export')->name('export.user');
                    Route::get('delete/{id}', 'UserController@destroy')->name('destroy.user');
                });
            });
        });

        //home
        Route::group(['namespace' => 'Home'], function () {
            Route::get('home', 'HomeController@index')->name('home');
        });

        //account
        Route::group(['namespace' => 'Account'], function () {
            Route::group(['prefix' => 'account'], function () {
                Route::get('', 'AccountController@index')->name('information');
                Route::get('change-information', 'AccountController@editChangeInformation')->name('change-information');
                Route::post('change-information', 'AccountController@updateChangeInformation');
                Route::get('change-password', 'AccountController@editChangePassword')->name('change-password');
                Route::post('change-password', 'AccountController@updateChangePassword');
            });
        });
    });
});


<?php

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes(['verify' => true]);

Route::get('lang/{lang}', 'LangController@changeLang')->name('lang');
Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'verified'], function () {

//        Route::any('/ckfinder/examples/{example?}', 'CKSource\CKFinderBridge\Controller\CKFinderController@examplesAction')->name('ckfinder_examples');

        //home
        Route::group(['namespace' => 'Home'], function (){
            Route::get('home', 'HomeController@index')->name('home');
        });

        //account
        Route::group(['namespace' => 'Account'], function (){

            Route::group(['prefix' => 'account'], function (){
                Route::get('', 'AccountController@index')->name('account');

                Route::get('change-information', 'AccountController@editChangeInformation')->name('change-information');
                Route::post('change-information', 'AccountController@updateChangeInformation');

                Route::get('change-password', 'AccountController@editChangePassword')->name('change-password');
                Route::post('change-password', 'AccountController@updateChangePassword');
            });
        });
    });
});


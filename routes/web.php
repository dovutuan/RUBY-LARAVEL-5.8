<?php

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes(['verify' => true]);

Route::get('lang/{lang}', 'LangController@changeLang')->name('lang');
Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'verified'], function () {

        Route::any('/ckfinder/examples/{example?}', 'CKSource\CKFinderBridge\Controller\CKFinderController@examplesAction')->name('ckfinder_examples');

        //admin
        Route::group(['namespace' => 'Admin'], function () {
            Route::group(['prefix' => 'admin'], function () {
                Route::group(['prefix' => 'user'], function () {
                    Route::get('', 'UserController@index')->name('list.user');
                    Route::post('', 'UserController@store')->name('store.user');
                    Route::get('edit/{id}', 'UserController@edit')->name('edit.user');
                    Route::post('edit/{id}', 'UserController@update');
                    Route::get('refresh-password/{id}', 'UserController@refreshPassword')->name('refresh.password.user');
                    Route::get('status/{id}', 'UserController@changeStatus')->name('change.status.user');
                    Route::get('export/', 'UserController@export')->name('export.user');
                    Route::get('delete/{id}', 'UserController@destroy')->name('destroy.user');
                });

                Route::group(['prefix' => 'product'], function () {
                    Route::get('', 'ProductController@index')->name('list.product');
                    Route::post('', 'ProductController@store')->name('store.product');
                    Route::get('edit/{id}', 'ProductController@edit')->name('edit.product');
                    Route::post('edit/{id}', 'ProductController@update');
                    Route::get('delete/{id}', 'ProductController@destroy')->name('destroy.product');
                });

                Route::group(['prefix' => 'supplier'], function () {
                    Route::get('', 'SupplierController@index')->name('list.supplier');
                    Route::post('', 'SupplierController@store')->name('store.supplier');
                    Route::get('edit/{id}', 'SupplierController@edit')->name('edit.supplier');
                    Route::post('edit/{id}', 'SupplierController@update');
                    Route::get('delete/{id}', 'SupplierController@destroy')->name('destroy.supplier');
                });

                Route::group(['prefix' => 'role'], function () {
                    Route::get('', 'RoleController@index')->name('list.role');
                    Route::post('', 'RoleController@store')->name('store.role');
                    Route::get('edit/{id}', 'RoleController@edit')->name('edit.role');
                    Route::post('edit/{id}', 'RoleController@update');
                    Route::get('delete/{id}', 'RoleController@destroy')->name('destroy.role');
                });

                Route::group(['prefix' => 'permission'], function () {
                    Route::get('', 'PermissionController@index')->name('list.permission');
                    Route::post('', 'PermissionController@store')->name('store.permission');
                    Route::get('edit/{id}', 'PermissionController@edit')->name('edit.permission');
                    Route::post('edit/{id}', 'PermissionController@update');
                    Route::get('delete/{id}', 'PermissionController@destroy')->name('destroy.permission');
                });

                Route::group(['prefix' => 'category'], function () {
                    Route::get('', 'CategoryController@index')->name('list.category');
                    Route::post('', 'CategoryController@store')->name('store.category');
                    Route::get('edit/{id}', 'CategoryController@edit')->name('edit.category');
                    Route::post('edit/{id}', 'CategoryController@update');
                    Route::get('delete/{id}', 'CategoryController@destroy')->name('destroy.category');
                });

                Route::group(['prefix' => 'size'], function () {
                    Route::get('', 'SizeController@index')->name('list.size');
                    Route::post('', 'SizeController@store')->name('store.size');
                    Route::get('edit/{id}', 'SizeController@edit')->name('edit.size');
                    Route::post('edit/{id}', 'SizeController@update');
                    Route::get('delete/{id}', 'SizeController@destroy')->name('destroy.size');
                });

                Route::group(['prefix' => 'color'], function () {
                    Route::get('', 'ColorController@index')->name('list.color');
                    Route::post('', 'ColorController@store')->name('store.color');
                    Route::get('edit/{id}', 'ColorController@edit')->name('edit.color');
                    Route::post('edit/{id}', 'ColorController@update');
                    Route::get('delete/{id}', 'ColorController@destroy')->name('destroy.color');
                });

                Route::group(['prefix' => 'discount'], function () {
                    Route::get('', 'DiscountController@index')->name('list.discount');
                    Route::post('', 'DiscountController@store')->name('store.discount');
                    Route::get('edit/{id}', 'DiscountController@edit')->name('edit.discount');
                    Route::post('edit/{id}', 'DiscountController@update');
                    Route::get('delete/{id}', 'DiscountController@destroy')->name('destroy.discount');
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


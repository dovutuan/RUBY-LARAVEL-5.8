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
                    Route::get('detail/{id}', 'ProductController@show')->name('show.product');
                    Route::get('edit/{id}', 'ProductController@edit')->name('edit.product');
                    Route::post('edit/{id}', 'ProductController@update');
                    Route::get('export/', 'ProductController@export')->name('export.product');
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

                Route::group(['prefix' => 'species'], function () {
                    Route::get('', 'SpeciesController@index')->name('list.species');
                    Route::post('', 'SpeciesController@store')->name('store.species');
                    Route::get('edit/{id}', 'SpeciesController@edit')->name('edit.species');
                    Route::post('edit/{id}', 'SpeciesController@update');
                    Route::get('delete/{id}', 'SpeciesController@destroy')->name('destroy.species');
                });

                Route::group(['prefix' => 'discount'], function () {
                    Route::get('', 'DiscountController@index')->name('list.discount');
                    Route::post('', 'DiscountController@store')->name('store.discount');
                    Route::get('edit/{id}', 'DiscountController@edit')->name('edit.discount');
                    Route::post('edit/{id}', 'DiscountController@update');
                    Route::get('delete/{id}', 'DiscountController@destroy')->name('destroy.discount');
                });

                Route::group(['prefix' => 'bill'], function () {
                    Route::get('', 'BillController@index')->name('list.bill');
                    Route::get('detail/{id}', 'BillController@detail')->name('detail.bill');
                    Route::get('change-status/{id}', 'BillController@changeStatus')->name('change.status.bill');
                });
            });
        });

        //home
        Route::group(['namespace' => 'Home'], function () {
            Route::get('home', 'HomeController@index')->name('home');
            Route::get('detail/{id}', 'HomeController@detailProduct')->name('detail-product');
            Route::post('detail/{id}', 'HomeController@reviewProduct');
            Route::post('review/{id}', 'HomeController@reviewProduct')->name('review-product');
            Route::get('heart/{id}', 'HomeController@heart')->name('heart-product');
            Route::get('search', 'HomeController@search')->name('search');
            Route::get('pay', 'CheckoutController@checkOut')->name('checkout');
            Route::post('pay', 'CheckoutController@pay');
        });

        //shopping
        Route::group(['namespace' => 'Home'], function () {
            Route::group(['prefix' => 'shopping'], function () {
                Route::get('add/{id}', 'ShoppingController@addCart')->name('add-shopping-cart');
            });
        });

        //cart
        Route::group(['namespace' => 'Home'], function () {
            Route::group(['prefix' => 'cart'], function () {
                Route::get('', 'CartController@index')->name('cart');
                Route::get('update-cart/{key}', 'CartController@update')->name('update-cart');
                Route::get('delete/{key}', 'CartController@destroy')->name('delete-cart');
                Route::get('delete-all', 'CartController@destroyAll')->name('delete-all-cart');
                Route::post('check-discount', 'CartController@checkDiscount')->name('check-discount');
            });
        });

        //checkOut
        Route::group(['namespace' => 'Home'], function () {
            Route::get('checkout-payment', 'PaymentController@index')->name('checkout-payment');
            Route::post('/checkout', 'PaymentController@createPayment')->name('create-payment');
            Route::get('/confirm', 'PaymentController@confirmPayment')->name('confirm-payment');
        });

        //contact
        Route::group(['namespace' => 'Home'], function () {
            Route::get('contact', 'HomeController@contact')->name('contact');
        });

        //account
        Route::group(['namespace' => 'Account'], function () {
            Route::group(['prefix' => 'account'], function () {
                Route::get('', 'AccountController@index')->name('information');
                Route::get('change-information', 'AccountController@editChangeInformation')->name('change-information');
                Route::post('change-information', 'AccountController@updateChangeInformation');
                Route::get('change-password', 'AccountController@editChangePassword')->name('change-password');
                Route::post('change-password', 'AccountController@updateChangePassword');
                Route::get('create-mini-shop', 'AccountController@CreateMiniShop')->name('create-mini-shop');
                Route::post('create-mini-shop', 'AccountController@SeedMailCreateMiniShop');
            });
        });

        //mail
        Route::group(['namespace' => 'Mails'], function () {
            Route::get('send-mail-bill', 'MailController@sendMailBill')->name('send-mail-bill');
            Route::post('send-mail-contact', 'MailController@sendMessageContact')->name('send-mail-contact');
        });
    });
});


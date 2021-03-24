<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;
use GrahamCampbell\Throttle\Facades\Throttle;

/////////////////////////////Front-end 
    
    //Cart

    Route::post('/save_cart', 'CartController@saveCart')->name('save_cart');

    Route::get('/show_cart', 'CartController@showCart')->name('show_cart');

    Route::post('/save_cart_direct', 'CartController@saveCartDirect')->name('save_cart_direct');

    Route::get('/delete_cart/{rowId}', 'CartController@deleteCart')->name('delete_cart');

    Route::get('/delete_all_cart', 'CartController@deleteAllCart')->name('delete_all_cart');

    Route::post('/update_cart', 'CartController@updateCart')->name('update_cart');

    //Register, Login, Logout

    Route::get('/get_login', 'UserController@getLogin')->name('get_login');

    Route::get('/get_register', 'UserController@getRegister')->name('get_register');

    Route::post('/post_register', 'UserController@postRegister')->name('post_register');

    Route::post('/post_login', 'UserController@postLogin')->name('post_login')->middleware('throttle:3,1');

    Route::get('/register_success', 'UserController@registerSuccess')->name('register_success');

    Route::get('/logout', 'UserController@logout')->name('user_logout');

    //Search

    Route::post('/search_by_keywords', 'HomeController@searchByKeywords')->name('search_by_keywords');

    //Orders

    Route::get('/checkout_login', 'CheckOutController@checkOutLogin')->name('checkout_login');

    Route::get('/checkout_form', 'CheckOutController@checkOutForm')->name('checkout_form');

    Route::post('/add_orders', 'CheckOutController@addOrders')->name('add_orders')->middleware('CheckLoginUser');

    Route::get('/orders_success', 'CheckOutController@ordersSuccess')->name('orders_success')->middleware('CheckLoginUser');

    //News

    Route::get('/news/show', ['as' => 'show_news', 'uses' => 'UserController@showNews']);

    Route::get('/news/details/{news_id}', ['as' => 'show_news_details', 'uses' => 'UserController@showNewsDetails' ]);

    Route::post('/news/comments/add', 'UserController@addComments')->name('add_comments')->middleware('CheckLoginUser');

    //User

    Route::get('/profile', ['as' => 'user_profile', 'uses' => 'UserController@userProfile']);


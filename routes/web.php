<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;
use GrahamCampbell\Throttle\Facades\Throttle;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


///Dieu huong 404 cho tat ca URL khong hop le
Route::fallback('PageController@notFound');

/////Trang chu
Route::get('', ['as' => 'home_page', 'uses' => 'HomeController@index']);

//Login and Logout


Route::get('/admin/logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);

Route::get('/admin/login', 'LoginController@getLogin')->name('getLogin')->middleware('CheckLogout');

Route::post('/login', 'LoginController@postLogin')->name('postLogin')->middleware('throttle:3,1');


Route::group(['prefix'=>'admin','middleware' => 'CheckLogin'], function(){

    //dashboard

    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard'); 

    //Category

    Route::get('/add_category', 'CategoryController@addCategory')->name('add_category');

    Route::get('/list_category', 'CategoryController@listCategory')->name('list_category');

    Route::post('/save_category', 'CategoryController@saveCategory')->name('save_category');

    Route::get('/unhide_category/{cat_id}', 'CategoryController@unhideCategory')->name('unhide_category');

    Route::get('/hide_category/{cat_id}', 'CategoryController@hideCategory')->name('hide_category');

    Route::get('/delete_category/{cat_id}', 'CategoryController@deleteCategory')->name('delete_category');

    Route::get('/edit_category/{cat_id}', 'CategoryController@editCategory')->name('edit_category');

    Route::post('/update_category/{cat_id}', 'CategoryController@updateCategory')->name('update_category');


    //Brand

    Route::get('/add_brand', 'BrandController@addBrand')->name('add_brand');

    Route::get('/list_brand', 'BrandController@listBrand')->name('list_brand');

    Route::post('/save_brand', 'BrandController@saveBrand')->name('save_brand');

    Route::get('/unhide_brand/{brand_id}', 'BrandController@unhideBrand')->name('unhide_brand');

    Route::get('/hide_brand/{brand_id}', 'BrandController@hideBrand')->name('hide_brand');

    Route::get('/delete_brand/{brand_id}', 'BrandController@deleteBrand')->name('delete_brand');

    Route::get('/edit_brand/{brand_id}', 'BrandController@editBrand')->name('edit_brand');

    Route::post('/update_brand/{brand_id}', 'BrandController@updateBrand')->name('update_brand');


    //Product

    Route::get('/add_product', 'ProductController@addProduct')->name('add_product');

    Route::get('/list_product', 'ProductController@listProduct')->name('list_product');

    Route::post('/save_product', 'ProductController@saveProduct')->name('save_product');

    Route::get('/unhide_product/{product_id}', 'ProductController@unhideProduct')->name('unhide_product');

    Route::get('/hide_product/{product_id}', 'ProductController@hideProduct')->name('hide_product');

    Route::get('/delete_product/{product_id}/{product_image}', 'ProductController@deleteProduct')->name('delete_product');

    Route::get('/edit_product/{product_id}', 'ProductController@editProduct')->name('edit_product');

    Route::post('/update_product/{product_id}/{product_image}', 'ProductController@updateProduct')->name('update_product');

    //Orders
    Route::get('/orders/{status}', 'AdminController@showOrders')->name('show_orders');

    Route::get('/orders', 'AdminController@showAllOrders')->name('show_all_orders');

    Route::get('/details/{orders_id}', ['as' => 'show_details', 'uses' => 'AdminController@showDetails']);

});


/////////////////////////////Front-end 

//show products

Route::get('/category/{cat_id}','CategoryController@showCatProduct')->name('show_cat_product');
 
Route::get('/brand/{brand_id}','BrandController@showBrandProduct')->name('show_brand_product');

Route::get('/product_details/{product_id}/{brand_id}/{cat_id}','ProductController@showProductDetails')->name('product_details');

//Cart

Route::post('/save_cart', 'CartController@saveCart')->name('save_cart');

Route::get('/show_cart', 'CartController@showCart')->name('show_cart');

Route::post('/save_cart_direct', 'CartController@saveCartDirect')->name('save_cart_direct');

Route::get('/delete_cart/{rowId}', 'CartController@deleteCart')->name('delete_cart');

Route::get('/delete_all_cart', 'CartController@deleteAllCart')->name('delete_all_cart');

Route::post('/update_cart', 'CartController@updateCart')->name('update_cart');

//Register, Login, Logout

Route::get('/user_get_login', 'UserController@getLogin')->name('get_login');

Route::get('/user_get_register', 'UserController@getRegister')->name('get_register');

Route::post('/user_post_register', 'UserController@postRegister')->name('post_register');

Route::post('/user_post_login', 'UserController@postLogin')->name('post_login')->middleware('throttle:3,1');

Route::get('/register_success', 'UserController@registerSuccess')->name('register_success');

Route::get('/user_logout', 'UserController@logout')->name('user_logout');

//Search

Route::post('/search_by_keywords', 'HomeController@searchByKeywords')->name('search_by_keywords');

//Orders

Route::get('/checkout_login', 'CheckOutController@checkOutLogin')->name('checkout_login');

Route::get('/checkout_form', 'CheckOutController@checkOutForm')->name('checkout_form');

Route::post('/add_orders', 'CheckOutController@addOrders')->name('add_orders')->middleware('CheckLoginUser');

Route::get('/orders_success', 'CheckOutController@ordersSuccess')->name('orders_success')->middleware('CheckLoginUser');



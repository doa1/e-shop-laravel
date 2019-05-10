<?php

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
//Route::model('product','Product');
Route::get('/','HomeController@index')->name('home');
Route::get('/about','HomeController@about')->name('about');
Route::get('/contact','HomeController@contact')->name('contact');
Route::post('/contact-create','ContactsController@store')->name('add-contact');
Route::get('/checkout','OrderController@create')->name('checkout');
Route::post('/save_order','OrderController@store')->name('save-order');
Route::get('/add_product','ProductController@add_products');
Route::get('/product/{id}','ProductController@show')->name('product-details');
Route::get('/edit_product/{product}','ProductController@edit')->name('edit-product');
Route::put('/save_edit/{product}','ProductController@update')->name('save-product');
Route::delete('/delete_product/{product}','ProductController@destroy')->name('delete-product');
Route::post('/save_product','ProductController@create');
Route::get('category/{category}','CategoryController@show')->name('category');

//Admin routes
Route::get('show_login/','AdminController@loginForm')->name('show-login');
Route::post('do_login/','AdminController@performLogin')->name('perform-login');
Route::post('do_logout/','AdminController@doLogout')->name('do-logout');
Route::get('panel/','AdminController@index')->name('admin');
Route::get('orders/','OrderController@index')->name('orders');
Route::get('see-orders/','OrderController@getOrders')->name('getOrders');
Auth::routes();


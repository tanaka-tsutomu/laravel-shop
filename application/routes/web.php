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

Route::get('/home', 'HomeController@index')->name('home');

Route::redirect('/', '/home');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => 'guest:admin'], function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login')->name('login');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => 'auth:admin'], function () {
    Route::post('logout', 'LoginController@logout')->name('logout');
    Route::get('home', 'HomeController@index')->name('home');

    Route::resource('products', 'ProductsController');
    Route::resource('product_categories', 'ProductCategoriesController');
    Route::resource('users', 'UsersController' );
    Route::resource('admin_users', 'AdminUsersController');
});

Route::redirect('/admin', '/admin/home');



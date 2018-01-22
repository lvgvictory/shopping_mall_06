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

Route::get('home', function () {
    return view('welcome');
});

Route::get('home', [
    'as' => 'home-page', 
    'uses' => 'HomePageController@getIndex'
]);

Route::get('mens/{id}', [
    'as' => 'mens', 
    'uses' => 'MensController@getIndex'
]);

Route::get('single/{id}', [
    'as' => 'single', 
    'uses' => 'SingleController@getIndex'
]);

Route::get('show-cart', [
    'as' => 'showcart', 
    'uses' => 'CartController@showCart'
]);

Route::get('get-cart', [
    'as' => 'getcart', 
    'uses' => 'HomePageController@getCart'
]);


Route::get('del-cart', [
    'as' => 'delcart', 
    'uses' => 'CartController@delCart'
]);

Route::get('add-cart', [
    'as' => 'addcart', 
    'uses' => 'HomePageController@addCart'
]);

Route::get('update-cart', [
    'as' => 'updatecart', 
    'uses' => 'CartController@updateCart'
]);

Auth::routes();

Route::get('logout', 'Admin\AdminController@logout')->name('admin.logout');
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
Route::get('dashbroad', 'Admin\AdminController@index')->name('dashbroad')
;
Route::get('user', 'Admin\UserController@getUser')->name('user');

Route::resource('category', 'Admin\CategoryController');
});

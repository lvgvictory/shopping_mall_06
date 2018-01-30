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

Route::get('/', function () {
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

Route::get('search-product', [
    'as' => 'searchproduct', 
    'uses' => 'AjaxController@searchProduct'
]);

Route::get('bill-customer/{id}', [
    'as' => 'billcustomer', 
    'uses' => 'BillCustomerController@getIndex'
]);

Route::get('bill-detail-customer/{id}', [
    'as' => 'billdetailcustomer', 
    'uses' => 'BillCustomerController@getBillDetail'
]);

Route::get('del-bill/{id}', [
    'as' => 'delbill',
    'uses' => 'BillCustomerController@getDeleteBill'
]);

//Thêm vào CSDL
Route::post('check-out', [
    'as' => 'checkout', 
    'uses' => 'CheckOutController@postCheckout'
]);

Route::get('check-email', [
    'as' => 'checkemail', 
    'uses' => 'CheckOutController@getCheckEmail'
]);

Auth::routes();

Route::get('logout', 'Admin\AdminController@logout')->name('admin.logout');
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
Route::get('dashbroad', 'Admin\AdminController@index')->name('dashbroad')
;
Route::get('user', 'Admin\UserController@getUser')->name('user');
Route::get('errors', 'Admin\UserController@getUser')->name('user');

Route::resource('category', 'Admin\CategoryController');
Route::resource('sub-category', 'Admin\SubCategoryController');

Route::get('list-bill', [
    'as' => 'listbill',
    'uses' => 'Admin\BillController@getListBill'
]);

Route::get('list-bill-detail/{id}', [
    'as' => 'listbilldetail',
    'uses' => 'Admin\BillController@getListBillDetail'
]);
//Ajax
Route::get('filter-bill', [
    'as' => 'filterbill',
    'uses' => 'Admin\BillController@ajaxFillterBill'
]);

Route::get('update-status-bill', [
    'as' => 'updatestatusbill',
    'uses' => 'Admin\BillController@ajaxUpdateStatusBill'
]);

Route::get('delete-bill/{id}', [
    'as' => 'deletebill',
    'uses' => 'Admin\BillController@getDelBill'
]);
});

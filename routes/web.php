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

// Route::get('/web/test', function () {
//     return view('master');
// });

/** -----------------------------------------------------------
 * ADMIN : Routes
 * --------------------------------------------------------- */

// Route::get('/test/admin/login', 'AuthsGaf\AdminController@login')->name('admin.login');
// Route::get('/test/admin/login', 'AuthsGaf\AdminController@login')->name('user.login');


Route::post('checkout/order/save', 'IndexController@order_checkout')->name('order.checkout');
Route::post('/apply-voucher', 'IndexController@applyVoucher')->name('apply.voucher');
Route::get('/', '\Web\App\Controllers\IndexController@index');
Route::get('/{page}', '\Web\App\Controllers\IndexController@index')->where('page', '^(?!store|category|cart|checkout).*$');
Route::get('/{page}/{sub?}', '\Web\App\Controllers\IndexController@index')->where('page', '^(?!store|category|cart|checkout).*$');
Route::get('/{page}/{sub?}/{extra?}', '\Web\App\Controllers\IndexController@index')->where('page', '^(?!store|category|cart|checkout).*$');

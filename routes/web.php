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

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


	Route::get('/', 'TransactionController@index')->name('mutation');
	Route::get('/deposit', 'TransactionController@createdeposit')->name('deposit');
	Route::get('/withdraw', 'TransactionController@createwithdraw')->name('withdraw');
	Route::get('/transfer', 'TransactionController@createtransfer')->name('transfer');	

	Route::post('/deposit/store', 'TransactionController@storedeposit')->name('deposit_store');
	Route::post('/withdraw/store', 'TransactionController@storewithdraw')->name('withdraw_store');
	Route::post('/transfer/store', 'TransactionController@storetransfer')->name('transfer_store');

	Route::get('/admin', 'AdminController@index')->name('admin');
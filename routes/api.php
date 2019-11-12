<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// // Route::get('members', 'MembersController@index');

// Route::post('group', 'GroupsController@store');

Route::post('register', 'MembersController@register');
Route::post('login', 'MembersController@login');
Route::post('logout', 'MembersController@logout');

Route::group(['middleware' => 'auth:api'], function() {

	Route::get('/user', function (Request $request) {
    	return $request->user();
    });

	Route::get('members', 'MembersController@index');
	Route::get('member/{member}', 'MembersController@show');
	Route::post('member', 'MembersController@store');
	Route::put('member/{member}', 'MembersController@update');
	Route::delete('member/{member}', 'MembersController@delete');

	Route::get('contacts', 'ContactsController@index');
	Route::get('contact/{contact}', 'ContactsController@show');
	Route::post('contact', 'ContactsController@store');
	Route::put('contact/{contact}', 'ContactsController@update');
	Route::delete('contact/{contact}', 'ContactsController@delete');

	Route::get('accounts', 'AccountsController@index');
	Route::get('account/{account}', 'AccountsController@show');
	Route::post('account', 'AccountsController@store');
	Route::put('account/{account}', 'AccountsController@update');
	Route::delete('account/{account}', 'AccountsController@delete');

	Route::get('transactions', 'TransactionsController@index');
	Route::get('transaction/{transaction}', 'TransactionsController@show');
	Route::post('transaction', 'TransactionsController@store');
	Route::put('transaction/{transaction}', 'TransactionsController@update');
	Route::delete('transaction/{transaction}', 'TransactionsController@delete');

	Route::get('fines', 'FinesController@index');
	Route::get('fine/{fine}', 'FinesController@show');
	Route::post('fine', 'FinesController@store');
	Route::put('fine/{fine}', 'FinesController@update');
	Route::delete('fine/{fine}', 'FinesController@delete');

	Route::get('loans', 'LoansController@index');
	Route::get('loan/{loan}', 'LoansController@show');
	Route::post('loan', 'LoansController@store');
	Route::put('loan/{loan}', 'LoansController@update');
	Route::delete('loan/{loan}', 'LoansController@delete');

	Route::get('groups', 'GroupsController@index');
	Route::get('group/{group}', 'GroupsController@show');
	Route::post('group', 'GroupsController@store');
	Route::put('group/{group}', 'GroupsController@update');
	Route::delete('group/{group}', 'GroupsController@delete');
    
});


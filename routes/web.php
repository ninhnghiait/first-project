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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::namespace('Admin')->prefix('admin')->middleware('auth')->group(function() {
	Route::resource('adusers', 'UserController');
	Route::resource('adroles', 'RoleController');
	Route::resource('adpermissions', 'PermissionController');
	Route::resource('adposts', 'PostController');
	// FULL TEXT SEARCH
	Route::get('adfts/search', 'FullTextSearchController@search')->name('adfts.search');
	Route::resource('adfts', 'FullTextSearchController');
	// LARAVEL QUEUE - Contact
	Route::get('adcontacts', 'ContactController@index')->name('adcontacts.index');
	Route::get('adcontacts/create', 'ContactController@create')->name('adcontacts.create');
	Route::post('adcontacts/store', 'ContactController@store')->name('adcontacts.store');
	Route::delete('adcontacts/{id}/destroy', 'ContactController@destroy')->name('adcontacts.destroy');
});

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
Route::resource('/posts', 'PostsController');
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'localization', 'prefix' => Session::get('locale')], function() {
	Route::namespace('Admin')->prefix('admin')->middleware('auth')->group(function() {
		// LARAVEL ACTIVITY LOG
		Route::get('aduser-activitied', 'UserActivityController@index')->name('aduser-activitied.index');

		Route::resource('adusers', 'UserController');
		// LARAVEL LOG
		Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

		Route::prefix('adprofiles')->as('adprofiles.')->group(function() {
			Route::get('index', 'ProfileController@index')->name('index');
			Route::post('update', 'ProfileController@update')->name('update');
			Route::post('reset-password', 'ProfileController@resetPassword')->name('resetPassword');
		});

		Route::resource('adroles', 'RoleController');

		Route::resource('adpermissions', 'PermissionController');

		Route::resource('adposts', 'PostController');
		// SET LANGGUAGE
		Route::get('set-language', 'LanguageController@setlanguage');
		    
		// FULL TEXT SEARCH
		Route::get('adfts/search', 'FullTextSearchController@search')->name('adfts.search');
		Route::resource('adfts', 'FullTextSearchController');

		// LARAVEL QUEUE - Contact
		Route::get('adcontacts', 'ContactController@index')->name('adcontacts.index');
		Route::get('adcontacts/create', 'ContactController@create')->name('adcontacts.create');
		Route::post('adcontacts/store', 'ContactController@store')->name('adcontacts.store');
		Route::delete('adcontacts/{id}/destroy', 'ContactController@destroy')->name('adcontacts.destroy');



	});
});

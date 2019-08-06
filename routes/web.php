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

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::group(['prefix' => 'backend', 'middleware' => 'auth'], function () {
	Route::resource('category', 'CategoryController');
	Route::resource('business', 'BusinessController');
	Route::get('trash', 'BusinessController@trash')->name('trash');
	Route::get('restore/{id}', 'BusinessController@restore')->name('restore');
	Route::delete('business/destroy/{id}', 'BusinessController@harddelete')->name('business.harddelete');

	Route::get('location', 'LocationController@index')->name('location.index');
	Route::post('location/zone', 'LocationController@storeZone')->name('zone.store');
	Route::post('location/city', 'LocationController@storeCity')->name('city.store');
	Route::put('location/zone', 'LocationController@updateZone')->name('zone.update');
	Route::delete('location/zone/{zone}', 'LocationController@destroyZone')->name('zone.destroy');
	Route::delete('location/city/{city}', 'LocationController@destroyCity')->name('city.destroy');
});

// Themes route
Route::get('/premium', function() {
	return view('themes.premium-sample');
});
Route::get('/free', function() {
	return view('themes.free-sample');
});


// Frontend

Route::get('list', 'Frontend\BusinessController@index')->name('list');
Route::get('business/view/{business}', 'Frontend\BusinessController@show')->name('business.view');
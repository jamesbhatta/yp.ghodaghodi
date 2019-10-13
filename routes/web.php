<?php

Route::get('/', 'FrontendController@index')->name('home');

Auth::routes(['verify' => true]);

Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware(['auth', 'verified']);

Route::group(['prefix' => 'backend', 'middleware' => ['auth', 'verified']], function () {
	Route::resource('category', 'CategoryController');
	Route::resource('business', 'BusinessController');
	Route::get('trash', 'BusinessController@trash')->name('trash');
	Route::get('restore/{id}', 'BusinessController@restore')->name('restore');
	Route::delete('business/destroy/{id}', 'BusinessController@harddelete')->name('business.harddelete');

	// Location Routes
	Route::get('location', 'LocationController@index')->name('location.index');

	Route::post('location/zone', 'LocationController@storeZone')->name('zone.store');
	Route::put('location/zone', 'LocationController@updateZone')->name('zone.update');
	Route::delete('location/zone/{zone}', 'LocationController@destroyZone')->name('zone.destroy');

	Route::post('location/city', 'LocationController@storeCity')->name('city.store');
	Route::put('location/city/{city?}', 'LocationController@updateCity')->name('city.update');
	Route::delete('location/city/{city}', 'LocationController@destroyCity')->name('city.destroy');

	Route::get('popular-categories', 'PopularCatController@index')->name('popularcat.index');
	Route::post('popular-categories', 'PopularCatController@store')->name('popularcat.store');
	Route::put('popular-categories/{popularCat}', 'PopularCatController@update')->name('popularcat.update');
	Route::delete('popular-categories/{popularCat}', 'PopularCatController@destroy')->name('popularcat.destroy');

	// Events Route
	Route::get('events', 'EventController@index')->name('event.index');
	Route::get('events/create', 'EventController@create')->name('event.create');
	Route::post('events', 'EventController@store')->name('event.store');
	Route::get('events/{event}/edit', 'EventController@edit')->name('event.edit');
	Route::put('events/{event}', 'EventController@update')->name('event.update');
	Route::delete('events/{event}', 'EventController@destroy')->name('event.destroy');
});

// Themes route
Route::get('/premium', function() {
	return view('themes.premium-sample');
});
Route::get('/free', function() {
	return view('themes.free-sample');
});


// Frontend test
// Route::get('list', 'Frontend\BusinessController@index')->name('list');
// Route::get('business/view/{business}', 'Frontend\BusinessController@show')->name('business.view');

// Frontend
Route::get('/search/{keyword?}/{city?}/{category?}', 'FrontendController@search')->name('search');
Route::get('/business/{slug}', 'FrontendController@viewBusiness')->name('business.view');
Route::get('events', 'Frontend\EventController@index')->name('event.list');
Route::get('events/{slug}', 'Frontend\EventController@show')->name('event.view');



Route::get('/pricing', function() {
	return view('extra.pricing');
})->name('pricing');

Route::get('/features', function() {
	return view('extra.features');
})->name('features');

Route::get('/listing', function() {
	return view('extra.listing');
})->name('listing');
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
\Debugbar::disable();

Auth::routes();
Route::group(['middleware' => ['auth']], function(){
	Route::get('/', function () {
	    return view('home');
	});
	Route::get('/regis', function(){
	    return view('regis');
	})->name('regis');
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/activity/create','ActivityController@create');
	Route::post('/activity/create','ActivityController@store');
        Route::get('/activity/approve','ActivityController@showapprove');
	Route::post('/activity/update/{id}','ActivityController@update');
	Route::post('/activity/delete/{id}','ActivityController@destroy');
	Route::get('logout', 'Auth\LoginController@logout');
});

Route::get('/show', function(){
	return view('studentInfo');
});

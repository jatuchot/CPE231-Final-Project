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
\Debugbar::enable();

Auth::routes();

Route::group(['middleware' => ['auth']], function(){
	Route::get('/', function () {
	    return view('home');
	});
        Route::get('/enroll/viewall', function () {
            return view('enroll.view');
        });
        Route::get('/enroll/regis', function () {
            return view('enroll.regis');
        });
	Route::post('/enroll/regis/{id}','EnrollmentController@store');
	Route::get('/regis', function(){
	    return view('regis');
	})->name('regis');
	Route::get('/showInfo', function(){
            return view('showUser');
        });
        Route::get('/showActivity', function(){
            return view('showAllact');
        });
	Route::get('img/profile/{img_name}', 'ImageController@profilePicture');
	Route::get('download/pdf/{pdf_filename}', 'PDFcontroller@download');
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/activity/create','ActivityController@create');
	Route::post('/activity/store','ActivityController@store');
        Route::get('/activity/approve','ActivityController@showapprove');
	Route::post('/activity/update/{id}','ActivityController@update');
	Route::post('/activity/delete/{id}','ActivityController@destroy');
	Route::get('logout', 'Auth\LoginController@logout');
	Route::get('/upload/imageprofile', 'StudentInfoController@show');
	Route::get('/upload/done', function() {
		return view('done');
	});
        Route::get('tools/data-importer', 'DataimportController@show');
        Route::post('tools/data-importer/validation', 'DataimportController@upload');
        Route::post('tools/data-importer/insert', 'DataimportController@insert');
        Route::get('tools/data-importer/finish', 'DataimportController@finish');
});

Route::group(['prefix' => 'api/v1' , 'middleware' => ['api-special', 'auth']], function (){
	Route::post('/upload/profile/{id}', 'Api\v1\StudentInfoController@uploadPicture');
});


Route::get('/show', function(){
	return view('studentInfo');
});


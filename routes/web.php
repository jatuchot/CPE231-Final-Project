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
Route::get('download/pdf/{pdf_filename}', 'PDFcontroller@download');

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
	Route::get('/activity/list','HourController@list');
	Route::get('tools/activity','ActivityController@showGive');
	Route::get('tools/activity/{id}', 'ActivityController@showGive1');
        Route::post('tools/activity/{id}', 'ActivityController@give');
	Route::get('/grade/viewResult', 'GradeResultController@show');
        Route::get('/grade/viewResult/byterm', 'GradeResultController@showTerm');
	Route::post('/enroll/regis/{id}','EnrollmentController@store');
	Route::get('/edit', 'EditProfileController@show');
	Route::post('/edit/{id}','EditProfileController@update');
	Route::get('/edit/instructor', 'EditProfileController@showI');
        Route::post('/edit/instructor/{id}','EditProfileController@updateI');
	Route::get('/regis', 'FirstRegisController@show')->name('regis');
	Route::post('/regis','FirstRegisController@regis');
	Route::get('/showInfo', function(){
            return view('showUser');
        });
        Route::get('/showActivity', function(){
            return view('showAllact');
        });

	Route::get('img/profile/{img_name}', 'ImageController@profilePicture');
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
	Route::get('/school/info','SchoolInfoController@show');
	Route::post('/school/info/{id}','SchoolInfoController@store');
	Route::get('/school/view',function(){
		return view('school.showschoolinfo');
	});
	Route::get('/school/academic/history','AcademicController@showHis');
	Route::get('/school/academic/','AcademicController@show');
	Route::post('/school/academic/{id}','AcademicController@store');
	Route::get('/analysis','AnalysisController@show');
	Route::get('/analysis/1','AnalysisController@get1');
	Route::get('/analysis/2','AnalysisController@get2');
	Route::get('/analysis/3','AnalysisController@get3');
	Route::get('/analysis/4','AnalysisController@get4');
	Route::get('/analysis/5','AnalysisController@get5');
	Route::get('/analysis/7','AnalysisController@get6');
	Route::get('/analysis/8','AnalysisController@get7');
	Route::get('/analysis/9','AnalysisController@get8');
	Route::get('/analysis/6','AnalysisController@get9');
	Route::get('/analysis/10','AnalysisController@get10');
	Route::get('grade/gradeassign', 'GradeAssignController@show');
        Route::post('grade/gradeassign/validation', 'GradeAssignController@upload');
        Route::post('grade/gradeassign/insert', 'GradeAssignController@insert');
        Route::get('grade/gradeassign/finish', 'GradeAssignController@finish');
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


<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['middleware' => ['web']], function () {
	Route::get('/', 'LabController@getIndex');
	Route::get('/logout', function () {
		\Auth::logout();
		return redirect('/');
	});

	Route::post('/', 'LabController@prepareTestingSession');
    Route::get('/run/{pid?}', 'LabController@getRunProject')->where('pid', '[0-9]+');
    Route::post('/proceed/{pid?}', 'LabController@postProceedProject')->where('pid', '[0-9]+');

    Route::get('/export/{pid?}/{ext?}', 'LabController@getExport')->where('pid', '[0-9]+');
});


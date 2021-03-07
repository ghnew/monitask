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

Route::get('/', 'LoginController@check');
Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@handle');
Route::get('/logout', 'LoginController@logout');

// admin routes
Route::group(['middleware' => ['auth', 'checkadmin'], 'prefix' => 'admin'], function () {
	Route::get('/dashboard', 'AdminDashController@dashboard');

	// user page related routes
	Route::get('/users', 'AdminUsersController@users');
	Route::post('/register', 'AdminUsersController@register');
	Route::delete('/users/remove', 'AdminUsersController@remove');
});

// normal user routes
Route::group(['middleware' => ['auth', 'checkuser'], 'prefix' => 'user'], function () {
	// time sheet page related routes
    Route::get('/timesheet', 'UserDashController@timesheet');
    Route::post('/project', 'UserDashController@storeproject');
    Route::post('/task', 'UserDashController@storetask');
    Route::post('/entry', 'UserDashController@storeentry');

    // reports related routes
    Route::get('/reports', 'UserReportController@index');
});
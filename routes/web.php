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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);

	Route::prefix('profile')->group(function() {
        Route::get('','ProfileController@edit')->name('profile.edit');
        Route::put('', 'ProfileController@update')->name('profile.update');
        Route::put('/password', 'ProfileController@password')->name('profile.password');
    });

	Route::prefix('reviews')->group(function() {
	   Route::get('', 'ReviewsController@index')->name('reviews.index');
	   Route::any('/create/{user}', 'ReviewsController@create')->name('reviews.create');
    });

	Route::group(['middleware' => 'role'], function() {

        Route::prefix('reports')->group(function() {
            Route::any('', 'ReportsController@index')->name('reports.index');
        });

        Route::prefix('questions')->group(function() {
            Route::get('', 'QuestionsController@index')->name('questions.index');
            Route::any('/create', 'QuestionsController@create')->name('questions.create');
            Route::any('/edit/{question}', 'QuestionsController@update')->name('questions.edit');
            Route::delete('/destroy/{question}', 'QuestionsController@destroy')->name('questions.destroy');
        });
    });
});


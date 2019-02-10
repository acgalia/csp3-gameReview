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
    return view('/auth.login');
});


/*MIDDLEWARES*/
//only loggers can access
Route::middleware("auth")->group(function(){
	Route::get('/menu', 'UserController@showMenu');
	Route::get('/menu/{id}', "UserController@showGame");

	//review route
	Route::post('/submitReview/{gameid}', 'UserController@reviewGame');
	Route::get('/comments', 'UserController@showComment');
	Route::delete('/review/{id}/delete', "UserController@deleteReview"); //not yet done
	Route::get('/review/{id}/edit', 'UserController@editReview');
	Route::patch('/review/{id}/edit', "UserController@updateReview");
});

//only admins can access
Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::get('/admindashboard', 'AdminController@showDashboard');
	Route::post('/addgame', 'AdminController@saveGame');
	Route::delete('/menu/{id}/delete', "AdminController@deleteGame");
	Route::get('/menu/{id}/edit', 'AdminController@editGame');
	Route::patch('/menu/{id}/edit', "AdminController@updateGame");
});
/*MIDDLEWARES*/


	
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

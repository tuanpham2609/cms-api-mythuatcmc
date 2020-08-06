<?php

use Illuminate\Support\Facades\Route;

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
Route::group(['prefix' => 'admin' , 'middleware' => 'auth'],function(){
	Route::resource('about','AboutController');
	Route::resource('category','CategoryController');
	Route::resource('post','PostController');
	Route::resource('user','UserController');
	Route::resource('upload-img','ImageControllerController');
	Route::resource('home','HomeController');
	//custom-api
	Route::get('category-all','CustomController@getallcategory');
});
Route::group(['prefix' => 'web' ],function(){
	Route::get('header','WebController@getHeader');
	Route::get('post/{id}','WebController@getDetail');
	Route::get('category/{id}','WebController@getCategory');
	Route::post('comment','WebController@postcomment');
	Route::get('comment/{id}','WebController@getComment');
	Route::post('comment/{id}','WebController@updateComment');
});


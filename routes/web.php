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



Route::get('/login','UserController@login');
Route::get('/register','UserController@create');
Route::post('/user','UserController@store');
Route::get('/event/create','EventController@create');
Route::post('/event','EventController@store');
Route::get('/event','EventController@show');
Route::put('/event/valide/{id}','EventController@accept');
Route::put('/event/annule/{id}','EventController@annule');
Route::put('/event/delete/{id}','EventController@delete');



Route::post('/login',"UserController@processlogin");


Route::get('/test',function(){return view('test');});

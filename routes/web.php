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
    $events = App\event::orderBy('date')->get();
    return view('welcome',compact('events'));
});


//Routes pour les utilisateurs
Route::get('/login','UserController@login');
Route::get('/register','UserController@create');
Route::post('/login',"UserController@processlogin");
Route::post('/user','UserController@store');
Route::get('/user/{user}','UserController@show');
Route::get('/logout','UserController@logout');


//routes pour les events
Route::get('/event/create','EventController@create');
Route::post('/event','EventController@store');
Route::get('/event','EventController@index');
Route::get('/event/idea','EventController@idea');
Route::get('/event/{event}','EventController@show');
Route::get('/event/{event}/edit','EventController@edit');
Route::put('/event/{event}','EventController@update');
Route::post('/event/{event}/vote','EventController@vote');
Route::post('/event/{event}/subscribe','EventController@subscribe');




Route::put('/event/valide/{event}','EventController@accept');
Route::put('/event/annule/{event}','EventController@annule');
Route::delete('/event/{event}','EventController@delete');

Route::get('/event/{event}/pdf', 'pdfController@print');







//routes pour les products
Route::get('/product','ProductController@index');
Route::get('/product/create','ProductController@create');
Route::get('/order','ProductController@order');
Route::get('/product/{product}','ProductController@show');
Route::post('/product','ProductController@store');
Route::delete('/product/{product}','ProductController@delete');
Route::get('/product/{product}/edit','ProductController@edit');
Route::put('/product/{product}','ProductController@update');



Route::put('/order/{order}','OrderController@update');
Route::delete('/order/{product}','OrderController@deletefromcart');




Route::get('/picture/download','PictureController@download');
Route::get('/picture','PictureController@index');
Route::get('/picture/{picture}','PictureController@show');





Route::post('/comment','CommentController@store');

Route::get('/admin','AdminController@show');




//Route pour pour les mentions légales
Route::get('/legal_mention', function() {
    return view('others.mentions');
});
Route::get('/gcs', function() {
    return view('others.gcs');
});




Route::get('/test',function(){return view('test');});

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

Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/index', 'PracticeController@indexAction');

Route::get('/messages', 'MessagesController@read');
Route::post('/message/create', 'MessagesController@create');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
Route::resource('listings', 'ListingsController');

Route::resource('albums', 'AlbumsController');
Route::resource('photos', 'PhotosController');
Route::get('/photos/create/{id}', 'PhotosController@create');

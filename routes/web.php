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
    return 'This is Home';
});

Route::get('/about', function () {
    return 'This is about';
});

Route::get('/contact', function () {
    return 'This is contact';
});

Route::get('/index', 'PracticeController@indexAction');



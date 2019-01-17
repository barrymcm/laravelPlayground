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
})->name('welcome');

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');

Route::get('/about', function () {
    return view('about');
})->middleware('auth');

Route::get('/contact', function () {
    return view('contact');
})->middleware('auth');

Route::get('/social/login', 'SocialLoginController@login')->name('social_login');
Route::get('/provider/callback', 'SocialLoginController@handleCallback')->name('provider_callback');

Route::get('/index', 'PracticeController@indexAction');

// Messages
Route::get('/messages', 'MessagesController@read');
Route::post('/message/create', 'MessagesController@create');

// Authentication
Auth::routes();

Route::get('/view_user/{id}', function ($id) {
    return App\User::find($id)->profile;
});

Route::resource('users', 'UsersController');

//Listings
Route::resource('listings', 'ListingsController');
Route::delete('/dashboard/{id}', 'DashboardController@trash')->name('dashboard.trash');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

// Photo Album
Route::resource('albums', 'AlbumsController');
Route::resource('photos', 'PhotosController')->except(['create']);
Route::get('/photos/create/{id}', 'PhotosController@create')->name('photos.create');

// Blog
Route::group(['prefix' => 'blog'], function () {
    Route::resource('categories', 'CategoriesController');
    Route::resource('posts', 'PostsController')->except(['create']);
    Route::get('/posts/create/{category_id}', 'PostsController@create')->name('posts.create');
});


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
//For Front End
Route::get('/', function () {
    return view('homePage');
});
Auth::routes();
//For Changing Password
Route::get('/change_password','Auth\ChangePasswordController@index')->name('password.change');
Route::patch('/update_password','Auth\ChangePasswordController@update')->name('password.update');

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function() {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('tag','TagController');
    Route::resource('category','CategoryController');
    Route::resource('post','PostController');
    Route::get('/pending_posts','PostController@pending_posts');
    Route::patch('/post/{id}/approve','PostController@approve');
});
Route::group(['as' => 'author.', 'prefix' => 'author', 'namespace' => 'Author', 'middleware' => ['auth', 'author']], function() {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('post','PostController');
});

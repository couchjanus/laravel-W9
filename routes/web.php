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

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/about', 'AboutController');
Route::get('blog', ['uses' => 'BlogController@index', 'as' => 'blog']);
Route::get('blog/{slug}', ['uses' => 'BlogController@showBySlug', 'as' => 'blog.show']);
Route::get('blog/{id}', ['uses' => 'BlogController@show', 'as' => 'show']);
Route::get('admin', 'Admin\DashboardController');

Route::resource('posts', 'Admin\PostController');
Route::resource('categories', 'Admin\CategoryController');
Route::resource('tags', 'Admin\TagController');
Route::resource('users', 'Admin\UserController');

Route::get('/trashed', 'Admin\UserController@indexTrashed')->name('users.trashed');

Route::post('/restore/{id}', 'Admin\UserController@restore')->name('users.restore');


Route::get('/test', 'TestController@index');

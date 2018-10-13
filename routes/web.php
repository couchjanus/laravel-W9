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

// Можно использовать метод middleware для назначения посредника на маршрут:
// Route::get('admin', 'Admin\DashboardController')->middleware('auth');

// Для назначения нескольких посредников для маршрута:
Route::get('admin', 'Admin\DashboardController')->middleware('auth', 'admin');

// Можно использовать ключ middleware в массиве параметров маршрута:
// Route::get(
//     'admin', [
//         'uses' => 'Admin\DashboardController', 'as' => 'admin', 'middleware' => 'auth'
//         ]
// );

// Использование массива для назначения нескольких посредников для маршрута:

// Route::get(
//     'admin', [
//         'uses' => 'Admin\DashboardController', 'as' => 'admin', 'middleware' => ['auth', 'admin']
//         ]
// );

// Вместо использования массива можно использовать цепочку вызова метода middleware() с определением маршрута:

// Route::get('admin', 'Admin\DashboardController')->middleware(['auth', 'admin']);


// Route::get('admin', 'Admin\DashboardController');

Route::resource('posts', 'Admin\PostController');
Route::resource('categories', 'Admin\CategoryController');
Route::resource('tags', 'Admin\TagController');
Route::resource('users', 'Admin\UserController');

Route::get('/trashed', 'Admin\UserController@indexTrashed')->name('users.trashed');

Route::post('/restore/{id}', 'Admin\UserController@restore')->name('users.restore');


Route::get('/test', 'TestController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@store')->name('contact');


// Socialite Register Routes

Route::get('social/{provider}', 'Auth\SocialController@redirect')->name('social.redirect');

Route::get('social/{provider}/callback', 'Auth\SocialController@handle')->name('social.handle');

Route::get('/gate', 'BlogController@gate');
Route::get('/private', 'HomeController@private')->name('private');

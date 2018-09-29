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

Route::get('/test', 'TestController@index');


Route::get('blog', ['uses' => 'BlogController@index', 'as' => 'blog']);

// Route::get('blog/create', ['uses' => 'PostsController@create', 'as' => 'create']);
// Route::post('blog/store', ['uses' => 'PostsController@store', 'as' => 'store']);

Route::get('blog/{id}', ['uses' => 'BlogController@show', 'as' => 'show']);

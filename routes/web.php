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

// Route::get('blog/{slug}', ['uses' => 'BlogController@show', 'as' => 'blog.show']);

Route::get('blog/{slug}', ['uses' => 'PostController@show', 'as' => 'blog.show']);


// Для назначения нескольких посредников для маршрута:
Route::get('admin', 'Admin\DashboardController')->middleware('auth', 'admin');

Route::resource('posts', 'Admin\PostController');
Route::resource('categories', 'Admin\CategoryController');
Route::resource('tags', 'Admin\TagController');
Route::resource('users', 'Admin\UserController');

Route::get('/trashed', 'Admin\UserController@indexTrashed')->name('users.trashed');

Route::post('/restore/{id}', 'Admin\UserController@restore')->name('users.restore');


Route::get('/test', 'TestController@index');

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact', 'ContactController@index')->name('contact');
Route::post('/contact', 'ContactController@store')->name('contact.store');


// Socialite Register Routes
Route::get('social/{provider}', 'Auth\SocialController@redirect')->name('social.redirect');
Route::get('social/{provider}/callback', 'Auth\SocialController@handle')->name('social.handle');

Route::get('/private', 'HomeController@private')->name('private');


Route::get('/email', function () {
    return new App\Mail\ContactEmail();
});


use \App\Repositories\ArticlesRepository;

Route::get('/search', function (ArticlesRepository $repository) {
   $articles = $repository->search((string) request('q'));
   return view('articles.index', [
       'articles' => $articles,
   ]);
});

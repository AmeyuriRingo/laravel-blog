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

Route::get('/', 'ViewBlogController@show')->middleware('verified');

Route::get('/create_user', 'CreateUserController@show')->middleware(\App\Http\Middleware\CheckIfAdmin::class);
Route::post('/create_user', 'CreateUserController@create')->name('create.user');
Route::get('/create_user/{id}', 'CreateUserController@showEdit')->middleware(\App\Http\Middleware\CheckIfAdmin::class);
Route::post('/create_user/{id}', 'CreateUserController@edit')->name('edit.user');

Route::get('/admin', 'AdminPanelController@show')->middleware(\App\Http\Middleware\CheckIfAdmin::class);
Route::get('/admin/{id}', 'AdminPanelController@delete')->name('delete.user');

Route::get('/create_article', 'CreateArticleController@show')->middleware(\App\Http\Middleware\CheckIfModerator::class);
Route::post('/create_article', 'CreateArticleController@create')->name('create.article');
Route::get('/create_article/{id}', 'CreateArticleController@showEdit')->middleware(\App\Http\Middleware\CheckIfModerator::class);
Route::post('/create_article/{id}', 'CreateArticleController@edit')->name('edit.article');

Route::get('/articles', 'ArticlesPanelController@show')->middleware(\App\Http\Middleware\CheckIfModerator::class);
Route::get('/articles/{id}', 'ArticlesPanelController@delete')->name('delete.article');

Route::get('/category/{category}', 'CategoryController@show');

Route::get('/category/{category}/{id}', 'ArticlesController@show');
Route::post('/category/{category}/{id}', 'ArticlesController@addComment')->name('add.comment');

Route::get('/profile/{id}', 'ProfilesController@show');
Route::post('/profile/{id}', 'ProfilesController@edit')->name('edit.profile');
Route::post('/profile/update/{id}', 'ProfilesController@updateImage')->name('update.image');

Route::get('comment/{id}', 'ArticlesController@showComment');
Route::post('comment/{id}', 'ArticlesController@confirmComment')->name('confirm.comment');


Auth::routes();
Auth::routes(['verify' => true]);





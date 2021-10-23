<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => Localization::getPrefix(), 'middleware' => 'languageManager'], function () {

    Route::get('/search', 'User\BookController@search')->name('search');
    Route::get('/search/{search}', 'User\BookController@searchShow')->name('search_show');
    Route::get('index/{time?}', 'User\BookController@index')->name('index_time');
    Route::get('/', 'User\BookController@index')->name('index');
    Route::get('/category/{category}', 'User\BookController@category')->name('category');
    Route::get('/books', 'User\BookController@books')->name('user_books');
    Route::get('/authors', 'User\BookController@authors')->name('user_authors');
    Route::get('/author/{author}', 'User\BookController@author')->name('author');
    Route::get('/book/{book}', 'User\BookController@show')->name('book');
    Route::get('/author_biography/{author}', 'User\BookController@author')->name('biography');
});

Route::group(['prefix' => config('admin.prefix'), 'middleware' => 'IsAdmin', 'name'=> 'admin.'], function () {

    Route::get('/dashboard', 'Admin\AdminController@index')->name('admin_panel');
    Route::get('/profile', 'Admin\UserController@profile')->name('profile');
    Route::post('/profile/update', 'Admin\UserController@update')->name('profile_update');

    Route::prefix('/authors')->group(function () {
        Route::get('/', 'Admin\AuthorController@index')->name('authors');
        Route::get('/create', 'Admin\AuthorController@create')->name('create_author');
        Route::post('/store', 'Admin\AuthorController@store')->name('store_author');
        Route::get('/edit/{id}', 'Admin\AuthorController@edit')->name('edit_author');
        Route::post('/update/{id}', 'Admin\AuthorController@update')->name('update_author');
        Route::get('/show/{id}', 'Admin\AuthorController@show')->name('show_author');
        Route::delete('/destroy/{id}', 'Admin\AuthorController@destroy')->name('destroy_author');

    });

    Route::prefix('/categories')->group(function () {
        Route::get('/', 'Admin\CategoryController@index')->name('categories');
        Route::get('/create', 'Admin\CategoryController@create')->name('create_category');
        Route::post('/store', 'Admin\CategoryController@store')->name('store_category');
        Route::get('/edit/{id}', 'Admin\CategoryController@edit')->name('edit_category');
        Route::post('/update/{id}', 'Admin\CategoryController@update')->name('update_category');
        Route::get('/show/{id}', 'Admin\CategoryController@show')->name('show_category');
        Route::delete('/destroy/{id}', 'Admin\CategoryController@destroy')->name('destroy_category');

    });

    Route::prefix('/books')->group(function () {
        Route::get('/', 'Admin\BookController@index')->name('books');
        Route::get('/create', 'Admin\BookController@create')->name('create_book');
        Route::post('/store', 'Admin\BookController@store')->name('store_book');
        Route::get('/edit/{id}', 'Admin\BookController@edit')->name('edit_book');
        Route::post('/update/{id}', 'Admin\BookController@update')->name('update_book');
        Route::get('/show/{id}', 'Admin\BookController@show')->name('show_book');
        Route::delete('/destroy/{id}', 'Admin\BookController@destroy')->name('destroy_book');

    });
});

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

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin/books', 'BooksController@index');
    Route::get('/admin/books/create', 'BooksController@create');
    Route::post('/admin/books/create', 'BooksController@store');

    Route::get('/admin/duebooks', 'BooksController@duebooks_admin');
    Route::get('/admin/returnbook/{id}/', 'BooksController@returnbook');

    Route::get('/admin/users', function () {
        return view('admin.users');
    });

    Route::get('/admin', function () {
        return view('admin.index');
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/user/books', 'BooksController@search');
    Route::get('/user/rentbook/{id}', 'BooksController@rentbook');

    Route::get('/user/duebooks', 'BooksController@duebooks_user');

    Route::get('user', 'HomeController@user_index')->name('user');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout');




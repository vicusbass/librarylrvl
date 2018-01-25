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

Route::get('/admin/books', 'BooksController@index');
Route::get('/admin/books/create', 'BooksController@create');
Route::post('/admin/books/create', 'BooksController@store');

Route::get('/admin/duebooks', function () {
    return view('admin.duebooks');
});

Route::get('/admin/users', function () {
    return view('admin.users');
});

Route::get('/admin', function () {
    return view('admin.index');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

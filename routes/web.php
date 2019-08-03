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

Route::get('/book', 'BookController@index')->name('book.home');

Route::get('/book/new', 'BookController@addForm')->name('book.form.add');
Route::get('/book/{id}', 'BookController@editForm')->name('book.form.edit');

Route::post('/book/new', 'BookController@addBook')->name('book.add');
Route::get('/book/update/{id}/{action}', 'BookController@updateBook')->name('book.update');
Route::post('/book/update/{id}', 'BookController@updateBookById')->name('book.update.byid');

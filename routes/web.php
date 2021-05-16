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

Route::get('/',  'HomeController@index')->name('home');
Route::get('/books/create_form',  'Order\BooksController@create_form')->name('books.create_form');
Route::post('/books/create',  'Order\BooksController@create')->name('books.create');
Route::get('/books',  'Order\BooksController@index')->name('books.index');
Route::get('/books/{slug}',  'Order\BooksController@view')->name('books.view');

Route::post('/purchase', 'HomeController@purchase')->name('purchase');
Route::get('/transactions',  'Transactions@view')->name('transactions');

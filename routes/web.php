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

Route::get('/', 'PagesController@index')->name('welcome');

Route::get('/about/{sub}', 'PagesController@about')->name('about');
Route::get('/laden/{sub}', 'PagesController@laden')->name('laden');
Route::get('/kontakt/{sub}', 'PagesController@kontakt')->name('kontakt');

Route::resource('posts', 'PostController');

Route::redirect('/kontakt', '/kontakt/info');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

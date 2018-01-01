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

Route::get('/about', 'PagesController@about')->name('about');
Route::get('/about/{sub}', 'PagesController@about')->name('about');
Route::post('/about/{sub}', 'PagesController@about')->name('about');
//Route::get('/about/fair-trade', 'PagesController@about')->name('about.fair-trade');
//Route::get('/about/vereinsleben', 'PagesController@about')->name('about.vereinsleben');
//Route::get('/about/veranstaltungen', 'PagesController@about')->name('about.veranstaltungen');
//Route::get('/about/bildungsarbeit', 'PagesController@about')->name('about.bildungsarbeit');
//Route::get('/about/beteiligen', 'PagesController@about')->name('about.beteiligen');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

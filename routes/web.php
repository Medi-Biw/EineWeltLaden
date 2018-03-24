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

Route::get('/', 'PageController@index')->name('welcome');

Route::prefix('about')->group(function () {
	Route::resource('/veranstaltungen', 'EventController',
		['names' => [
			'index' => 'events.index',
			'create' => 'events.create',
			'edit' => 'events.edit',
			'update' => 'events.update',
			'destroy' => 'events.destroy',
		]]);
	Route::get('/{sub}', 'PageController@about')->name('about');
});

Route::get('/laden/öffnungszeiten/', 'PageController@laden')->name('laden');
Route::get('/laden/{sub}', 'PageController@laden')->name('laden');
Route::get('/kontakt/{sub}', 'PageController@kontakt')->name('kontakt');

Route::resource('posts', 'PostController');

Route::redirect('/kontakt', '/kontakt/info');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

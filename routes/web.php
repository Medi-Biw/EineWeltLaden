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

Route::get('/testmail', 'EmailController@test')->middleware(['auth']);

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

Route::prefix('panel')->middleware(['auth'])->group(function () {
	Route::get('/oeffnungszeiten', 'OpeningsController@edit')->name('openings.edit');
	Route::put('/oeffnungszeiten', 'OpeningsController@update');
	Route::get('/profil', 'ProfileController@index')->name('profile');
	Route::put('/profil', 'ProfileController@update');
	Route::put('/profil/password', 'ProfileController@password');
});

Route::get('/laden/{sub}', 'PageController@laden')->name('laden');
Route::get('/kontakt/{sub}', 'PageController@kontakt')->name('kontakt');
Route::post('/kontakt/formular', 'EmailController@contact');

Route::resource('posts', 'PostController');

Route::redirect('/kontakt', '/kontakt/info');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//Route::get('/home', 'HomeController@index')->name('home');

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

Route::get('/', 'RootController@index')->name('root');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/submit', 'LinksController@index')->name('getLink');

Route::post('/submit', 'LinksController@post')->name('postLink');

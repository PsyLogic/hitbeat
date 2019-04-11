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

// Main route (Home)
Route::get('/', 'HomeController');

// Album routes
Route::resource('album','AlbumController');

// Song routes
Route::get('song/random','SongController@random')->name('song.random');
Route::get('song/{song}/play','SongController@play')->name('song.play');
Route::resource('song','SongController');


// Auth Routes
Auth::routes();
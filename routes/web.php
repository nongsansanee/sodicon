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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login','Auth\LoginController@showLoginForm');

Route::get('login/google', 'Auth\LoginController@redirectToGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

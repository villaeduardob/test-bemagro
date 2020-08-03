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

Route::get('/', 'LoginController@index')->name('login');
Route::post('authenticate', 'LoginController@authenticate')->name('authenticate');

Route::get('create', 'CreateController@index')->name('create');
Route::post('store', 'CreateController@store')->name('store');

Route::get('home', 'HomeController@index')->name('home');
Route::get('details/{username}', 'HomeController@details')->name('details');
Route::get('edit/{id}', 'CreateController@edit')->name('edit');
Route::put('edit/{id}', 'CreateController@update')->name('update');
Route::get('trash/{id}', 'CreateController@trash')->name('trash');

Route::get('logout', 'LoginController@logout')->name('logout');

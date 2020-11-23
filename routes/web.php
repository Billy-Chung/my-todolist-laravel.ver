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

Route::get('/', 'Backend\HomeController@todo')->name('home');

Route::post('/edit/{id}', 'Backend\HomeController@editPost')->name('edit.post');

Route::post('/delete/{id}', 'Backend\HomeController@delete')->name('delete');


Route::post('/create', 'Backend\HomeController@createPost')->name('create.post');

Route::post('/complete/{id}', 'Backend\HomeController@complete')->name('complete');

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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/upload', 'UploadController@show')->name('upload.show');
Route::post('/upload', 'UploadController@store')->name('upload.store');

// Patches
Route::get('/patch/{patch}', 'PatchController@show')->name('patch.show');
Route::get('/patch/{patch}/download', 'PatchController@download')->name('patch.download');

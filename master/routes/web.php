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

Route::get('/', 'App\Http\Controllers\CompanyController@index');
Route::get('/company/create', 'App\Http\Controllers\CompanyController@create');
Route::post('/company', 'App\Http\Controllers\CompanyController@store');
Route::get('/company/{id}/edit', 'App\Http\Controllers\CompanyController@edit');
Route::patch('/company/{id}', 'App\Http\Controllers\CompanyController@update');
Route::delete('/company/{id}', 'App\Http\Controllers\CompanyController@destroy')->name('hapus');
Route::get('company/{id}', 'App\Http\Controllers\CompanyController@show');

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

/*route utk home page awal*/
Route::get('/','App\Http\Controllers\CompanyController@home');

/*route untuk master company*/
Route::get('/company', 'App\Http\Controllers\CompanyController@index');
Route::get('/company/create', 'App\Http\Controllers\CompanyController@create');
Route::post('/company', 'App\Http\Controllers\CompanyController@store');
Route::get('/company/{id}/edit', 'App\Http\Controllers\CompanyController@edit');
Route::patch('/company/{id}', 'App\Http\Controllers\CompanyController@update')->name('company.update');
Route::delete('/company/{id}', 'App\Http\Controllers\CompanyController@destroy')->name('hapus');
Route::get('company/{id}', 'App\Http\Controllers\CompanyController@show');

/*route untuk master employee*/
Route::get('/employee','App\Http\Controllers\EmployeeController@index');
Route::post('/employee','App\Http\Controllers\EmployeeController@store');
Route::get('/employee/{id}/edit','App\Http\Controllers\EmployeeController@edit');
Route::patch('/employee/{id}','App\Http\Controllers\EmployeeController@update');
Route::delete('/employee/{id}', 'App\Http\Controllers\EmployeeController@destroy')->name('hapus');
Route::get('employee/{id}','App\Http\Controllers\EmployeeController@show');

/*route untuk master role*/
Route::get('/role','App\Http\Controllers\RoleController@index');
Route::post('/role','App\Http\Controllers\RoleController@store');
Route::get('/role/{id}/edit','App\Http\Controllers\RoleController@edit');
Route::patch('/role/{id}','App\Http\Controllers\RoleController@update');
Route::get('role/{id}','App\Http\Controllers\RoleController@show');
Route::delete('/role/{id}', 'App\Http\Controllers\RoleController@destroy')->name('hapus');
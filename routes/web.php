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

Route::resource('/jobs', 'JobController');
Route::get('/company/{company}', 'CompanyController@index')->name('company.index');
Route::get('user/profile', 'UserController@index')->name('profile.index');
Route::post('user/profile/create', 'UserController@store')->name('profile.create');
Route::post('user/coverletter', 'UserController@coverletter')->name('profile.coverletter');
Route::post('user/resume', 'UserController@resume')->name('profile.resume');
Route::post('user/avatar', 'UserController@avatar')->name('profile.avatar');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

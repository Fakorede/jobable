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

// job
Route::resource('/jobs', 'JobController');
Route::get('/my-jobs', 'JobController@myjobs')->name('myjobs');

// company
Route::get('company/show', 'CompanyController@show')->name('company.show');
Route::get('company/{company}', 'CompanyController@index')->name('company.index');
Route::post('company/store', 'CompanyController@store')->name('company.store');
Route::post('company/coverphoto', 'CompanyController@coverphoto')->name('company.coverphoto');
Route::post('company/logo', 'CompanyController@logo')->name('company.logo');

// user
Route::get('user/profile', 'UserController@index')->name('profile.index');
Route::post('user/profile/create', 'UserController@store')->name('profile.create');
Route::post('user/coverletter', 'UserController@coverletter')->name('profile.coverletter');
Route::post('user/resume', 'UserController@resume')->name('profile.resume');
Route::post('user/avatar', 'UserController@avatar')->name('profile.avatar');

// employer
Route::view('employer/register', 'auth.employer-register')->name('employer');
Route::post('employer/register', 'EmployerRegistrationController@register')->name('employer.register');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

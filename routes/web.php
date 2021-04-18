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
// main index blog page routes

Route::get('/','IndexController@viewIndex');


// main index blog page routes


//admin routes
Route::get('admin.login','AdminLoginController@viewLogin')->name('admin.login');
Route::get('admin.dashboard','AdminController@viewAdminDashboard')->name('admin.dashboard');


//admin routes end

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

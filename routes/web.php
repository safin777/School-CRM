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
Route::get('register.student.add','AdminController@registerView')->name('register.student.add');
Route::post('register/student','RegistrationController@addStudent');
Route::post('register/teacher','RegistrationController@addTeacher');
//registration controller route
Route::get('notice.add','NoticeController@noticeAddView')->name('notice.add');
Route::post('notice/add','NoticeController@addNotice');
Route::get('notice.all','NoticeController@allNotice')->name('notice.all');




//registration controller route end


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

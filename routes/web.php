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

Route::get('view.student.list','AdminController@viewStudentList')->name('view.student.list');
Route::get('view.teacher.list','AdminController@viewTeacherList')->name('view.teacher.list');

Route::get('student/details/{sid}', 'AdminController@studentDetails');
Route::post('student/details/edit/post/{sid}','AdminController@editStudentDetails');

Route::get('teacher/details/{t_id}', 'AdminController@teacherDetails');




//registration controller route
Route::get('notice.add','NoticeController@noticeAddView')->name('notice.add');
Route::post('notice/add','NoticeController@addNotice');
Route::get('notice.all','NoticeController@allNotice')->name('notice.all');

//registration controller route end

// search controller

Route::get('notice.search','SearchController@searchNotice')->name('notice.search');
Route::get('notice/edit/{nid}', 'NoticeController@editNotice');
Route::post('notice/edit/post/{nid}','NoticeController@editNoticePost');

//pdf controller

Route::get('studentlist.pdf','PdfController@studentListPdf');
Route::get('students.pdf','PdfController@allStudentPdf');

//payment/fees/transaction controller

Route::get('add.registration.fees','TransactionController@addRegistrationFeesView')->name('add.registration.fees');
Route::get('add.monthly.fees','TransactionController@addMonthlyFeesView')->name('add.monthly.fees');
Route::get('add.examination.fees','TransactionController@addExaminationFeesView')->name('add.examination.fees');




// Student end route
//student dashboard
Route::get('student.dashboard','StudentController@viewDashboard')->name('student.dashboard');
Route::get('student.notice','StudentController@allNotice')->name('student.notice');





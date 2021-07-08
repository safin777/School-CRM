<?php

use Illuminate\Support\Facades\Route;



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

//student login
Route::get('student.login','StudentController@viewlogin')->name('student.login');
Route::post('post/student/login','StudentController@verifyLogin');


//student dashboard

//result Section
//Route::get('view/student/classTestResult/{s_id}','StudentController@viewClassTestResult');

Route::group(['middleware'=>['CustomAuth']],function(){
    Route::get('student.dashboard','StudentController@viewDashboard')->name('student.dashboard');
    Route::get('student.notice','StudentController@allNotice')->name('student.notice');
    Route::get('view.student.classTestResult','StudentController@viewClassTestResult')->name('view.student.classTestResult');
    Route::get('view.student.termResult','StudentController@viewTermResult')->name('view.student.termResult');

    //SEARCH TEST AND TERM RESULT

    Route::post('search/test/result','StudentController@searchTest');
    Route::post('search/term/result','StudentController@searchTerm');

    //
    Route::get('student.upload.assignment','StudentController@viewUploadAssignment')->name('student.upload.assignment');
    Route::post('student/upload/assignment','StudentController@uploadAssignment');




});


// Logout Controller

Route::get('student.logout','StudentController@studentLogOut')->name('student.logout');




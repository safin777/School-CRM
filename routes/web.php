<?php

use Illuminate\Support\Facades\Route;


Route::get('/','IndexController@viewIndex');

Route::get('admin.login','AdminLoginController@viewLogin')->name('admin.login');
Route::get('teacher.login.view','TeacherController@viewLogin')->name('teacher.login.view');
Route::get('student.login','StudentController@viewlogin')->name('student.login');
Route::post('post/admin/login','AdminLoginController@verifyLogin');

//ADMIN PAGE ROUTES

Route::group(['middleware'=>['AdminAuth']],function(){
Route::get('admin.dashboard','AdminController@viewAdminDashboard')->name('admin.dashboard');
Route::get('register.student.add','AdminController@registerView')->name('register.student.add');
Route::post('register/student','RegistrationController@addStudent');
Route::post('register/teacher','RegistrationController@addTeacher');

Route::get('view.student.list','AdminController@viewStudentList')->name('view.student.list');
Route::get('view.teacher.list','AdminController@viewTeacherList')->name('view.teacher.list');

Route::get('student/details/{sid}', 'AdminController@studentDetails');
Route::get('student/delete/{sid}', 'AdminController@deleteStudent'); //delete
Route::post('student/details/edit/post/{sid}','AdminController@editStudentDetails');

Route::get('teacher/details/{t_id}', 'AdminController@teacherDetails');
Route::get('teacher/delete/{t_id}', 'AdminController@deleteTeacher'); //delete
Route::post('teacher/details/edit/post/{t_id}','AdminController@editTeacherDetails');


//registration controller route

Route::get('notice.add','NoticeController@noticeAddView')->name('notice.add');
Route::post('notice/add','NoticeController@addNotice');
Route::get('notice.all','NoticeController@allNotice')->name('notice.all');

//registration controller route end

// search controller

Route::get('notice.search','SearchController@searchNotice')->name('notice.search');
Route::get('notice/edit/{nid}', 'NoticeController@editNotice');
Route::post('notice/edit/post/{nid}','NoticeController@editNoticePost');

Route::get('notice/delete/{nid}', 'NoticeController@deleteNotice');

//pdf controller

Route::get('studentlist.pdf','PdfController@studentListPdf');
Route::get('students.pdf','PdfController@allStudentPdf');

//payment/fees/transaction controller

Route::get('add.registration.fees','TransactionController@addRegistrationFeesView')->name('add.registration.fees');
Route::get('add.monthly.fees','TransactionController@addMonthlyFeesView')->name('add.monthly.fees');
Route::get('add.examination.fees','TransactionController@addExaminationFeesView')->name('add.examination.fees');

//PAYMENT CONTROLLER
Route::post('admission/fee/add','PaymentController@postRegistrationFee');
Route::post('examination/fee/add','PaymentController@postExaminationFee');
Route::post('monthly/fee/add','PaymentController@postMonthlyFee');

//TRANSACTION LIST
Route::get('transaction.list','TransactionController@viewTransactionList');
Route::get('transaction/edit/{trans_id}', 'TransactionController@editTransactionGet');


Route::post('transaction/edit/post/{trans_id}','TransactionController@editTransactionPost');
Route::get('transaction/delete/{trans_id}','TransactionController@deleteTransaction');


//ADD SUBJECT

Route::get('admin.addSubject','AdminController@addSubject');
Route::post('add/subject','AdminController@addSubjectPost');




});



// STUDENT CONTROLLER ROUTE

Route::post('post/student/login','StudentController@verifyLogin');


Route::group(['middleware'=>['CustomAuth']],function(){
    Route::get('student.dashboard','StudentController@viewDashboard')->name('student.dashboard');
    Route::get('student.notice','StudentController@allNotice')->name('student.notice');
    Route::get('view.student.classTestResult','StudentController@viewClassTestResult')->name('view.student.classTestResult');
    Route::get('view.student.termResult','StudentController@viewTermResult')->name('view.student.termResult');

    //SEARCH TEST AND TERM RESULT

    Route::post('search/test/result','StudentController@searchTest');
    Route::post('search/term/result','StudentController@searchTerm');

    //ASSIGNMENT

    Route::get('student.upload.assignment','StudentController@viewUploadAssignment')->name('student.upload.assignment');
    Route::post('student/upload/assignment','StudentController@uploadAssignment');
    Route::get('student/download/assignment','StudentController@viewDownloadAssignment');



});


// TEACHER CONTROLLER

Route::post('post/teacher/login','TeacherController@verifyLogin');

Route::group(['middleware'=>['TeacherAuth']],function(){
Route::get('teacher.teacherDashboard','TeacherController@viewDashboard')->name('teacher.teacherDashboard');

//NOTICE SECTION OF TEACHER

Route::get('teacher.view.uploadNotice','TeacherController@viewUploadNotice')->name('teacher.view.uploadNotice');
Route::post('teacher/notice/add','TeacherController@uploadNotice');
Route::get('teacher.view.allNotice','TeacherController@viewAllNotice')->name('teacher.view.allNotice');
Route::get('teacher/notice/edit/{nid}', 'TeacherController@editNotice');
Route::post('teacher/notice/edit/post/{nid}','TeacherController@editNoticePost');

//RESULT SECTION OF TEACHER

Route::get('view.uploadResult','TeacherController@viewUploadResult')->name('view.uploadResult');
Route::post('teacher/upload/result','TeacherController@postUploadResult');
Route::get('view.search.result','TeacherController@viewSearchResult')->name('view.search.result');
Route::post('teacher/search/result','TeacherController@searchResult');
Route::get('teacher/result/edit/{result_id}','TeacherController@viewEditResult');
Route::post('teacher/upload/result/{result_id}','TeacherController@postEditResult');

Route::get('teacher/result/delete/{result_id}','TeacherController@deleteResult');





//ASSIGNMENT SECTION

Route::get('teacher/view/upload/assignment',"TeacherController@viewUpAssignment")->name('teacher/view/upload/assignment');
Route::post('teacher/upload/assignment','TeacherController@postUpAssignment');
Route::get('teacher/view/search/assignment','TeacherController@viewSearchAssignment')->name('teacher/view/search/assignment');
Route::post('teacher/search/assignment','TeacherController@postSearchAssignment');
Route::get('teacher/assignment/edit/{d_assign_id}','TeacherController@viewEditAssignment');
Route::post('teacher/assignment/edit/post/{d_assign_id}','TeacherController@postEditAssignment');
Route::get('teacher/download/assignment','TeacherController@viewDownloadAssignment');
Route::post('teacher/download/assignment/post','TeacherController@postDownloadAssignment');
Route::get('teacher/assignment/download/{asign_id}','TeacherController@downloadAssignment');

Route::get('teacher/assignment/delete/{d_asign_id}','TeacherController@deleteAssignment');


//UPLOAD APPLICATION

Route::get('teacher/upload/application','TeacherController@viewUploadApplication');
Route::post('teacher/upload/application','TeacherController@postUploadApplication');



});


// Logout Controller

Route::get('student.logout','StudentController@studentLogOut')->name('student.logout');
Route::get('admin.logout','AdminLoginController@adminLogOut')->name('admin.logout');






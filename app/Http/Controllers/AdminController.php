<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    public function viewAdminDashboard ()
    {
        return view('admin.adminDashboard');
    }

    public function registerView()
    {
        return view ('admin.registerStudent');

    }


    public function viewStudentList(){
        $all_student = DB::table('students')
                     ->get();

        return view('admin.studentList',['all_student'=>$all_student]);
    }


    public function viewTeacherList(){
        $all_teacher = DB::table('teachers')
                     ->get();

        return view('admin.teacherList',['all_teacher'=>$all_teacher]);



    }


    public function studentDetails($sid){
        $s_id = base64_decode($sid);

        $s_details=DB::table('students')
                  ->where('sid',$s_id)
                  ->first();
                 // return response()->json($s_details);
                 return view('admin.viewStudentDetails',['s_details'=>$s_details]);

    }


    


}



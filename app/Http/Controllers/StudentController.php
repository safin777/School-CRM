<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Validator;
use DB;

class StudentController extends Controller
{
    public function viewDashboard(){
        return view('student.studentDashboard');

    }

    public function allNotice()
    {
        $all_notice=DB::table('notices')->get();
        return view('student.studentNotice',['all_notice'=>$all_notice]);
    }

}

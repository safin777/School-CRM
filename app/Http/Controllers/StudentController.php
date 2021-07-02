<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function viewDashboard(){
        return view('student.studentDashboard');

    }

    public function allNotice()
    {
        $all_notice=DB::table('notices')->get();
        return view('student.viewAllNotice',['all_notice'=>$all_notice]);
    }
}

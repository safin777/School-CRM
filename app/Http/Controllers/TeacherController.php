<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class TeacherController extends Controller
{
    public function viewLogin()
    {
        return view('teacher.teacherLogin');
    }

    public function verifyLogin(Request $req)
    {
        $validatedData = $req->validate([
            'email' => 'required|email',
            'password' => 'required|max:25|min:2',
        ]);

        $email = $req ->email;
        $password = $req ->password;
        //DB::enableQueryLog();
        $user = DB::table('teachers')
                ->where('t_email',$email)
                ->where('t_password',$password)
                ->first();
               // dd(DB::getQueryLog());
        $status = $user->t_status;
        $t_id=$user->t_id;


        if ($user != null ){

            if ($status != 1){
                echo "Please Verify Your Email first";
            }

           else {
                $notification=array(
                    'messege'=>'Successfully Logged in',
                    'alert-type'=>'success'
                     );
                $req->session()->put('t_id',$t_id);
                return redirect('teacher.teacherDashboard');
                    }

        }
        else{
            $notification=array(
                'messege'=>'Something went wrong !',
                'alert-type'=>'error'
                 );
             return Redirect()->back()->with($notification);
        }
    }
}

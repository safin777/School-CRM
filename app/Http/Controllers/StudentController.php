<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Validator;
use DB;

class StudentController extends Controller
{
    public function viewLogin(){
        return view('student.studentLogin');
    }

                                                 // verifyLogin

    public function verifyLogin (Request $req){

        $validatedData = $req->validate([
            'email' => 'required|email',
            'password' => 'required|max:25|min:2',
        ]);

        $email = $req ->email;
        $password = $req ->password;
        //DB::enableQueryLog();
        $user = DB::table('students')
                ->where('s_email',$email)
                ->where('s_password',$password)
                ->first();
               // dd(DB::getQueryLog());
        $status = $user->s_status;
        $sid=$user->sid;


        if ($user != null ){

            if ($status != 1){
                echo "Please Verify Your Email first";
            }

           else {
                $notification=array(
                    'messege'=>'Successfully Logged in',
                    'alert-type'=>'success'
                     );
                $req->session()->put('sid' , $sid);
                return redirect('student.dashboard');
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

                                                 // studentLogOut
    public function studentLogOut(){

        session()->forget('sid');
       return redirect('student.login');
    }

    public function viewDashboard(){
        return view('student.studentDashboard');

    }

    public function allNotice()
    {
        $all_notice=DB::table('notices')
        ->orderBy('n_id', 'desc')
        ->get();
        return view('student.studentNotice',['all_notice'=>$all_notice]);
    }

                                            //   class test result
   public function viewClassTestResult(Request $req){

    $sid=session()->get('sid');

    $user_info=DB::table('students')
    ->where('sid',$sid)
    ->first();

   $userClass=$user_info->s_class;

   $test_result=DB::table('results')
   ->





   }

}

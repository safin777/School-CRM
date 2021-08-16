<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Redirect;

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


    public function viewStudentList()
    {
        $all_student = DB::table('students')
                     ->get();

        return view('admin.studentList',['all_student'=>$all_student]);
    }


    public function viewTeacherList()
    {
        $all_teacher = DB::table('teachers')
                     ->get();

        return view('admin.teacherList',['all_teacher'=>$all_teacher]);

    }


    public function studentDetails($sid)
    {
        $s_id = base64_decode($sid);

        $s_details=DB::table('students')
                  ->where('sid',$s_id)
                  ->first();
                 // return response()->json($s_details);
                 return view('admin.viewStudentDetails',['s_details'=>$s_details]);

    }



            public function editStudentDetails(Request $request ,$sid)
            {
                        $validatedData=Validator::make($request->all(),[
                            's_name' => 'required|max:100',
                            's_email' => 'required|email|max:60',
                            's_address' => 'required|max:255',
                            's_class' => 'required',
                            's_status' => 'required',
                            's_father_name' => 'required|max:50',
                            's_mother_name' => 'required|max:50',
                            's_birth_certificate_no' => 'required|max:255',
                            's_gender' => 'required',
                            's_gurdian'=> 'required|max:30',
                            's_gurdian_phone' => 'required|max:12',
                            's_dob' => 'required',
                            's_religion' => 'required',
                            's_phone'=>'max:20',
                            's_password'=>'max:30'
                    ],

                    [
                        'required' => 'This field can not be blank.',
                        'max' => 'Enter less than max value.',
                        's_email.email'=>'Enter a valid email address',
                    //'mimes'=>'File type does not match',
                        //'s_image.max'=>'File size is too much bigger',

                    ]);

                            if($validatedData->fails())
                            {
                                $s_details=DB::table('students')
                                    ->where('sid',$sid)
                                    ->first();
                                return view('admin.viewStudentDetails',['s_details'=>$s_details])->withErrors($validatedData);
                            }

                            else
                            {

                                $data =array();

                                $data['s_name']=$request->s_name;
                                $data['s_email']=$request->s_email;
                                $data['s_address']=$request->s_address;
                                $data['s_class']=$request->s_class;
                                $data['s_status']=$request->s_status;
                                $data['s_father_name']=$request->s_father_name;
                                $data['s_mother_name']=$request->s_mother_name;
                                $data['s_birth_certificate_no']=$request->s_birth_certificate_no;
                                $data['s_gender']=$request->s_gender;
                                $data['s_gurdian']=$request->s_gurdian;
                                $data['s_gurdian_phone']=$request->s_gurdian_phone;
                                $data['s_dob']=$request->s_dob;
                                $data['s_religion']=$request->s_religion;
                                $data['timestamp']=date('Y-m-d H:i:s');
                                $data['s_phone']=$request->s_phone;
                                $data['s_password']=$request->s_password;


                                    $user="Student's details updated  successfully";
                                    DB::table('students')
                                    ->where('sid',$sid)
                                    ->update($data);


                                    $s_details=DB::table('students')
                                    ->where('sid',$sid)
                                    ->first();

                                    return view('admin.viewStudentDetails',['s_details'=>$s_details])->withErrors($user);
                            }
                 }


                public function deleteStudent($sid)
                {

                    $s_id = base64_decode($sid);

                    DB::table('students')
                    ->where('sid',$s_id)
                    ->delete();


                    $not="Row deleted successfully";
                    return redirect('view.student.list')->withErrors($not);

                }


                public function teacherDetails($t_id)
                {

                    $tid = base64_decode($t_id);

                    $t_details=DB::table('teachers')
                            ->where('t_id',$tid)
                            ->first();

                    return view('admin.viewTeacherDetails',['t_details'=>$t_details]);

                }


                public function deleteTeacher($t_id)
                {

                    $tid = base64_decode($t_id);

                    DB::table('teachers')
                    ->where('t_id',$tid)
                    ->delete();

                    $not="Row deleted successfully";
                    return redirect('view.teacher.list')->withErrors($not);

                }



                public function editTeacherDetails(Request $request , $t_id)
                {
                    $validatedData=Validator::make($request->all(),
                    [
                        't_name' => 'required|',
                        't_email' => 'required|email',
                        't_address' => 'required|',
                        't_status' => 'required',
                        't_national_id' => 'required|max:25',
                        't_gender' => 'required',
                        't_dob' => 'required',
                        't_religion' =>'required',
                        't_phone'=>'max:12',
                        't_password'=>'max:20'

                    ],

                    [


                        't_name.required' => 'Teacher name can not be blank.',
                        't_email.email'=>'Enter a valid email address',
                        't_email.required' => 'Email field  can not be blank.',
                        't_address.required' => ' Please enter an address',
                        't_national_id.required' => ' Please enter National ID No.',
                        't_national_id.max' => ' National ID NO exced 25 digit.',
                        't_dob.required' =>'Select a date of birth',
                        't_religion.required' => 'Select a religion',
                        't_phone.max' => 'Teacher Phone NO must have 12 digit.',
                        't_password.max' => 'Teacher password exced 25 digit.',


                    ]);



                    if($validatedData->fails())
                    {
                        $tid = $request->t_id;

                            $t_details=DB::table('teachers')
                            ->where('t_id',$tid)
                            ->first();
                            return view('admin.viewTeacherDetails',['t_details'=>$t_details])->withErrors($validatedData);
                    }

                    else
                    {
                        $data=array();
                        $data['t_name']=$request->t_name;
                        $data['t_email']=$request->t_email;
                        $data['t_address']=$request->t_address;
                        $data['t_status']=$request->t_status;
                        $data['t_national_id']=$request->t_national_id;
                        $data['t_gender']=$request->t_gender;
                        $data['t_dob']=$request->t_dob;
                        $data['t_religion']=$request->t_religion;
                        $data['timestamp']=date('Y-m-d H:i:s');
                        $data['t_phone']=$request->t_phone;
                        $data['t_password']=$request->t_password;

                        $notice="Teacher Info updated successfully";
                        DB::table('teachers')->update($data);

                        $tid = $request->t_id;
                        $t_details=DB::table('teachers')
                        ->where('t_id',$tid)
                        ->first();
                    
                        return view('admin.viewTeacherDetails',['t_details'=>$t_details])->withErrors($notice);

                    }
                }



}



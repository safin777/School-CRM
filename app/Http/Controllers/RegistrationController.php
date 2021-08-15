<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;
use DB;
use PDF;
use Session;
use Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class RegistrationController extends Controller
{
   public function addStudent(Request $request)
   {

        $validatedData=Validator::make($request->all(),[
                                    's_name' => 'required|max:100',
                                    's_email' => 'required|email|max:60',
                                    's_address' => 'required',
                                    's_class' => 'required',
                                    's_status' => 'required',
                                    's_father_name' => 'required',
                                    's_mother_name' => 'required',
                                    's_birth_certificate_no' =>'required|max:25',
                                    's_gender' => 'required',
                                    's_gurdian'=> 'required',
                                    's_gurdian_phone' => 'required|max:12',
                                    's_dob' => 'required',
                                    's_religion' => 'required',
                                    //'s_image' => 'max:2000'|'mimes:jpg,png',
                                    's_phone'=>'max:12',
                                    's_password'=>'max:30',
                            ],

                            [
                                's_name.required' => 'Student name can not be blank.',
                                's_email.required' => 'Email field  can not be blank.',
                                's_address.required' => ' Please enter an address',
                                's_class.required' => 'Choose at least a Class.',
                                's_status.required' => 'Choose status of the student.',
                                's_father_name.required' => 'Father name can not be blank.',
                                's_mother_name.required' => 'Mother name can not be blank.',
                                's_birth_certificate_no.required' => 'Enter birth certificate NO .',
                                's_birth_certificate_no.max' => 'birth certificate NO exced 25 digit.',
                                's_gender.required' =>'Select a gender',
                                's_gurdian.required' => 'Gurdian name can not be blank.',
                                's_gurdian_phone.required' => 'Gurdian Phone No must have to insert.',
                                's_gurdian_phone.max' => 'Gurdian Phone NO must have 12 digit.',
                                's_phone.max' => 'Student Phone NO must have 12 digit.',
                                's_dob.required' =>'Select a date of birth',
                                's_religion.required' => 'Select a religion',
                                's_email.email'=>'Enter a valid email address',
                                // 's_email.unique' => 'This email is already used',
                                //'s_image.mimes'=>'File type does not match',
                                //'s_image.max'=>'File size is greater than 2(megabyte)',
                                's_password.max' => 'Password 30 exced  digit.',


                            ]);

                                    if($validatedData->fails())
                                    {
                                        return Redirect::back()->withErrors($validatedData);
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

                                            if ($request->hasFile('s_image'))
                                                {
                                                    $filename =  $request->file('s_image')->getClientOriginalName();
                                                    $request->file('s_image')->move(public_path('../public/user Image/'), $filename);
                                                    $data['s_image']=$filename;

                                                    $user="User added successfully";
                                                    DB::table('students')->insert($data);
                                                    return redirect('register.student.add')->withErrors($user);
                                                }

                                            else{

                                                $notice="User added successfully";
                                                DB::table('students')->insert($data);
                                                return redirect('register.student.add')->withErrors( $notice);

                                                }
                                    }

   }


   public function addTeacher(Request $request)
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


                    if($validatedData->fails())
                    {
                        return Redirect::back()->withErrors($validatedData);
                    }

                    else
                    {
                        if ($request->hasFile('t_file'))
                        {
                            $attachment=$request->file('t_file');
                            foreach($attachment as $file)
                            {
                               $att=$file->getClientOriginalName();
                               $file->move(public_path('../public/user File/'), $att);
                               $data['t_files']=$att;
                            }

                                if ($request->hasFile('t_image'))
                                {
                                    $filename =  $request->file('t_image')->getClientOriginalName();
                                    $request->file('t_image')->move(public_path('../public/user Image/'), $filename);
                                    $data['t_image']=$filename;

                                    $notice="Teacher Info added successfully";
                                    DB::table('teachers')->insert($data);
                                    return redirect('register.student.add')->withErrors($notice);
                                }


                                else
                                {
                                    $notice="Teacher Info added successfully";

                                    DB::table('teachers')->insert($data);
                                    return redirect('register.student.add')->withErrors($notice);
                                }

                        }

                        else
                        {
                            $notice="No CV added in the attachment.";
                            return redirect('register.student.add')->withErrors($notice);
                        }
                    }


   }
}

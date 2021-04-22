<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
//use Illuminate\Support\Facades\Validator;
use Validator;
//use App\Models\Permissions;
use DB;
use PDF;
use Session;
use Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class RegistrationController extends Controller
{
   public function addStudent(Request $request){
    $validatedData=Validator::make($request->all(),[
                                's_name' => 'required|max:100',
                                's_email' => 'required|email|unique:students,s_email|max:60',
                                's_address' => 'required|max:255',
                                's_class' => 'required',
                                's_status' => 'required',
                                's_father_name' => 'required|max:50',
                                's_mother_name' => 'required|max:50',
                                's_birth_certificate_no' => 'required|max:25',
                                's_gender' => 'required',
                                's_gurdian'=> 'required|max:30',
                                's_gurdian_phone' => 'required|max:12',
                                's_dob' => 'required',
                                's_religion' => 'required',
                                's_image' => 'mimes:jpeg,jpg,png,gif|required|max:50000',
                                's_phone'=>'max:20'
                        ],

                        [
                            'required' => 'This field can not be blank.',
                            's_email.unique' => 'This email has been used',
                            'max' => 'Enter less than max value.',
                            's_email.email'=>'Enter a valid email address',
                            's_image.mimes'=>'File type does not match',
                            's_image.max'=>'File size is too much bigger',

                        ]);

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
                           // $data['s_image']=$request->p_image;
                            $data['timestamp']=date('Y-m-d H:i:s');
                            $data['s_phone']=$request->s_phone;


                             //return response()->json($data);


                            //$image=$request->file('s_image');
                            // $slider=$request->file('s_image');
                            // $filename = rand(111111, 999999);
                            // $extension = $slider->extension();
                            // $getFileExt = $filename + '.' +$extension;
                            // $slider->move(public_path('public/user Image/'), $getFileExt);
                            // $data['s_image'] = $getFileExt;



                            $filename =  $request->file('s_image')->getClientOriginalName();
                            $request->file('s_image')->move(public_path('public/user Image/'), $filename);
                            $data['s-image']=$filename;



                                if($validatedData->fails())
                                {
                                   return Redirect::back()->withErrors($validatedData);
                                }

                                else
                               {
                                   DB::table('students')->insert($data);
                                     return redirect('register.student.add');
                               }

                            // DB::table('stock_product_picture')->insert($stock_product_picture);



   }
}

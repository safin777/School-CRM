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

                        $data =array()[
                            's_name'=>$request->s_name,
                            's_email'=>$request->s_email,
                            's_address'=>$request->s_address,
                            's_class'=>$request->s_class,
                            's_status'=>$request->s_status,
                            's_father_name'=>$request->s_father_name,
                            's_mother_name'=>$request->s_mother_name,
                            's_birth_certificate_no'=>$request->s_birth_certificate_no,
                            's_gender'=>$request->s_gend'),
                            's_gurdian'=>$request->s_gurdn'),
                            's_gurdian_phone'=>$request->s_gurdn_phone'),
                            's_dob'=>$request->s_dob'
                            's_religion'=>$request->s_relion'),
                            's_image'=>$request->p_imag,
                            'timestamp'=>date('Y-m-d H:i:s'),
                            's_phone'=>$request->s_phon),

                                 ];


                     if($request->hasfile('s_image'))
                        {  //confused
                            foreach($request->file('s_file') as $image)
                            {
                                $info = getimagesize($image);

                                if ($info['mime'] == 'image/jpeg')
                                    $image_n = imagecreatefromjpeg($image);

                                elseif ($info['mime'] == 'image/gif')
                                    $image_n = imagecreatefromgif($image);

                                elseif ($info['mime'] == 'image/png')
                                    $image_n = imagecreatefrompng($image);

                                    $image_name=hexdec(uniqid());
                                imagejpeg($image_n, "public/user Image/".$image_name.".jpeg",1000); //change the path of the image folder

                                $p_image = $image_name.".jpeg";

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




   }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
   public function addStudent(Request $request){
    $rules =
    [
        's_name' => 'required|max:100',
        's_email' => 'required|email|unique:s_email|max:60',
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
    ];

    $customMessages =
    [
        'required' => 'This field can not be blank.',
        'unique' => 'This email has been used',
        'max' => 'Enter less than max value.',
        'email'=>'Enter a valid email address',
        'mimes'=>'File type does not match',

    ];

      $this->validate($request, $rules, $customMessages);
      return back()->with("status", "Sucessfully added");


   }
}

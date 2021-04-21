<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
   public function addStudent(Request $request){
    $validated = $request->validate([
        's_name' => 'required|max:100',
        's_email' => 'required|email|unique:s_email|max:60',
        's_address' => 'required|max:255',
        's_class' => 'required',
        's_status' => 'required',
        's_father_name' => 'required|max:50',
        's_mother_name' => 'required|max:50',
        's_birth_certificate_no' => 'required|max:255',




    ]);
   }
}

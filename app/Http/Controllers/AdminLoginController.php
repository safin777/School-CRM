<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;


class AdminLoginController extends Controller
{
  public function viewLogin()
  {
      return view('admin.login');
  }


  public function verifyLogin(Request $req)
    {

        $validatedData=Validator::make($req->all(),[
            'email' => 'required|email',
            'password' => 'required|max:25|min:2',
        ],

        [
            'email.required' => 'This email field can not be blank.',
            'max' =>'maximum 25 character can be insert.',
            'email'=>'Do not match with email type',
            'min'=>'Minimum 2 character to insert. ',
            'password.required'=>'Enter a password'


        ]);

        $email = $req->email;
        $password = $req->password;

        if($validatedData->fails())
        {
        return redirect('admin.login')->withErrors($validatedData);
        }

        else
        {
            $user = DB::table('admins')
                ->where('a_email',$email)
                ->first();
                if($user != null){
                    if($user->a_email != $email || $user->a_password != $password )
                    {
                    $Notice ="Please Enter valid Email or Password";
                    return redirect('admin.login')->withErrors($Notice);
                    }

                    else
                    {
                        $req->session()->put('a_id',$user->a_id);
                        return redirect('admin.dashboard');

                    }
                }

                else{
                    $Notice ="No Registered Admin Found!";
                    return redirect('admin.login')->withErrors($Notice);
                }

        }
    }

    public function adminLogOut(){

       session()->forget('a_id');
       return redirect('admin.login');
    }


}



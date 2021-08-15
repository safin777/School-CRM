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
        return redirect('teacher.login.view')->withErrors($validatedData);
        }

        else
        {
            $user = DB::table('teachers')
                ->where('t_email',$email)
                ->where('t_password',$password)
                ->first();


            if ($user != null )
            {

                if($user->t_status != 1)
                {

                $Notice = "Your status is not verified by the Admin";
                return redirect('teacher.login.view')->withErrors($Notice);

                }

                else
                {

                    if($email != $user->t_email  || $password != $user->t_password )
                    {
                    $Notice = "Please Enter valid Email or Password";
                    return redirect('teacher.login.view')->withErrors($Notice);
                    }

                    else
                    {
                        $req->session()->put('t_id',$user->t_id);
                        return redirect('teacher.teacherDashboard');

                    }
                }

            }

            else

            {
                $Notice = "You are not a registered teacher of this school";
                    return redirect('teacher.login.view')->withErrors($Notice);
            }

        }
    }




    public function viewDashboard(){
        return view('teacher.teacherDashboard');
    }


    public function viewUploadNotice (){
        return view ('teacher.uploadNotice');
    }


    public function uploadNotice (Request $request){

        $t_id=session()->get('t_id');


        $validatedData=Validator::make($request->all(),[

            'n_title' => 'required|max:100',
            'n_type_id' => 'required',
            'n_description' => 'required|max:1000',

            'n_title' => 'required|max:100',
            'n_type_id' => 'required',
            'n_description' => 'required|max:1000',


    ],

    [
        'required' => 'This field can not be blank.',
        'max' => 'Enter less than max value.'



    ]);

          $data =array();


        $filename =  $request->file('n_image')->getClientOriginalName();
        $request->file('n_image')->move(public_path('../public/notice Image/'), $filename);

        $data['n_image']=$filename;
        $data['n_title']=$request->n_title;
        $data['n_description']=$request->n_description;
        $data['n_type_id']=$request->n_type_id;
        $data['n_added_by']=$t_id;
        $data['timestamp']=date('Y-m-d H:i:s');



            if($validatedData->fails())
            {
               return Redirect::back()->withErrors($validatedData);
            }

            else
           {
                 $Notice="Notice added successfully";
                 DB::table('notices')->insert($data);
                 return redirect('teacher.view.uploadNotice')->withErrors($Notice);
           }

    }


    public function viewAllNotice(){
        $t_id=session()->get('t_id');

        $all_notice=DB::table('notices')
        ->where('n_added_by','=',$t_id)

        ->get();

        return view('teacher.viewAllNotice',['all_notice'=>$all_notice]);

    }


    public function editNotice($nid)
    {
        $nid = base64_decode($nid);

        $data = DB::table('notices')
                                ->where('n_id',$nid)
                                ->first();
                              //  return response()->json($data);
        return view('teacher.editNotice',['data'=>$data]);

    }



    public function editNoticePost(Request $request ,$n_id)
    {
        $validatedData=Validator::make($request->all(),[

            'n_title' => 'required|max:100',
            'n_type_id' => 'required',
            'n_description' => 'required|max:1000',

            'n_title' => 'required|max:100',
            'n_type_id' => 'required',
            'n_description' => 'required|max:1000',


    ],

    [
        'required' => 'This field can not be blank.',
        'max' => 'Enter less than max value.'



    ]);
    
    $t_id=session()->get('t_id');
    $data =array();

    $emp=DB::table('notices')
                ->select('n_image')
                ->where('n_id',$n_id)
                ->first();


        if ($request->hasFile('n_image')){

            $path = public_path('../public/notice Image/');
            $old_image=$path.$emp->n_image;
            unlink($old_image);
            $filename =  $request->file('n_image')->getClientOriginalName();
            $request->file('n_image')->move(public_path('../public/notice Image/'), $filename);

            $data['n_image']=$filename;
            $data['n_title']=$request->n_title;
            $data['n_description']=$request->n_description;
            $data['n_type_id']=$request->n_type_id;
            $data['n_added_by']=$t_id;
            $data['timestamp']=date('Y-m-d H:i:s');

                if($validatedData->fails())
                {
                   return Redirect::back()->withErrors($validatedData);
                }

                else
               {
                     $Notice="Notice Updated  successfully";
                     DB::table('notices')
                     ->where('n_id',$n_id)
                     ->update($data);
                     return redirect('teacher.view.allNotice')->withErrors($Notice);
               }
        }

        else{
            $data['n_image']=$emp->n_image;
            $data['n_title']=$request->n_title;
            $data['n_description']=$request->n_description;
            $data['n_type_id']=$request->n_type_id;
            $data['n_added_by']=$t_id;
            $data['timestamp']=date('Y-m-d H:i:s');

                if($validatedData->fails())
                {
                   return Redirect::back()->withErrors($validatedData);
                }
                else
               {
                     $Notice="Notice Updated  successfully";
                     DB::table('notices')
                     ->where('n_id',$n_id)
                     ->update($data);
                     return redirect('teacher.view.allNotice')->withErrors($Notice);
               }
        }

    }

public function viewUploadResult(){
        return view('teacher.uploadResult');
    }

public function postUploadResult(Request $request){
        $t_id=session()->get('t_id');
        $validatedData=Validator::make($request->all(),[
            'exam_type_id' => 'required',
            'subject_id' => 'required',
            'sid' => 'required',
            'slug' => 'required',
            'marks' => 'required|max:10',
    ],
    [
        'required' => 'This field can not be blank.',
        'max' => 'Enter less than max value.'
    ]);

    $data =array();
    $data['exam_type_id']=$request->exam_type_id;
    $data['subject_id']=$request->subject_id;
    $data['sid']=$request->sid;
    $data['slug']=$request->slug;
    $data['marks']=$request->marks;
    $data['t_id']=$t_id;
    $data['timestamp']=date('Y-m-d H:i:s');


    if($validatedData->fails())
    {
       return Redirect::back()->withErrors($validatedData);
    }

    else
   {
         $Result="Result Uploaded successfully";
         DB::table('results')
         ->insert($data);
         return redirect('view.uploadResult')->withErrors($Result);
   }
    }

public function viewSearchResult(){

        return view('teacher.searchResult');
    }


    public function searchResult(Request $request){

        $t_id=session()->get('t_id');


        $validatedData=Validator::make($request->all(),[

            // 'exam_type_id' => 'required',
            // 'subject_id' => 'required',
            'sid' => 'required',

    ],

    [
        'required' => 'This field can not be blank.',

    ]);



    $sid=$request->sid;


    if($validatedData->fails())
    {
       return Redirect::back()->withErrors($validatedData);
    }

    else
   {

    $results = DB::table('results')
    ->join('subject_list','subject_list.subject_id','=','results.subject_id')
    ->join('students','students.sid','=','results.sid')
    ->join('exam_type','exam_type.exam_type_id','=','results.exam_type_id')
    ->select('results.*','subject_list.subject_name','subject_list.subject_code','students.*','exam_type.*')
    ->where('results.sid','=',$sid)
    ->get();

    return view('teacher.showSearchResult',['results'=>$results]);

    }
   }

   public function viewEditResult($rid)
   {
       $r_id = base64_decode($rid);

       $data = DB::table('results')
                               ->where('result_id',$r_id)
                               ->first();
                             // return response()->json($data);
       return view('teacher.editResult',['data'=>$data]);

   }

 public function postEditResult(Request $request, $result_id){

            $t_id = session()->get('t_id');
            $result_id = $request->result_id;

            $validatedData=Validator::make($request->all(),[

                'exam_type_id' => 'required',
                'subject_id' => 'required',
                'sid' => 'required',
                'slug' => 'required',
                'marks' => 'required|max:10',
            ],

            [
                'required' => 'This field can not be blank.',
                'max' => 'Enter less than max value.'
            ]);


            $data = array();
            $data['exam_type_id']=$request->exam_type_id;
            $data['subject_id']=$request->subject_id;
            $data['sid']=$request->sid;
            $data['slug']=$request->slug;
            $data['marks']=$request->marks;
            $data['t_id']=$t_id;

            $data['timestamp']=date('Y-m-d H:i:s');

            if($validatedData->fails())
            {
            return view('teacher.searchResult')->withErrors($validatedData);
            }
            else
            {
                $Result="Result Updated successfully";
                $s= DB::table('results')
                ->where('result_id',$result_id)
                ->update($data);

                //return response()->json($s);

                return view('teacher.searchResult')->withErrors($Result);
            }
   }


   public function viewUpAssignment(){
       return view ('teacher.uploadAssignment');
   }


public function postUpAssignment(Request $req){

    $req->validate([
        'file' => 'required|mimes:csv,txt,xlx,xls,pdf,zip,rar,doc|max:2048',
        'subject_id'=>'required',
        's_class' =>'required'
        ]);

        $subject_id=$req->subject_id;
        $s_class = $req->s_class;
        $t_id = session()->get('t_id');

        $data=array();
        $data['t_id']=$t_id;
        $data['subject_id']=$subject_id;
        $data['s_class'] = $s_class;
        $data['timestamp']=date('Y-m-d H:i:s');

        if($req->file()){
             $filename =  $req->file('file')->getClientOriginalName();
             $req->file('file')->move(public_path('../public/D Assignment/'), $filename);
             $data['file_path'] = $filename;
            DB::table('down_assignment')->insert($data);
            return back()->with('success','File has been uploaded.');
        }
   }

   public function viewSearchAssignment(){
       return view('teacher.searchAssignment');
   }
   public function postSearchAssignment(Request $req){
                     $t_id=session()->get('t_id');
                     $subject_id = $req->subject_id;
                     $s_class = $req->s_class;
                     $validatedData=Validator::make($req->all(),[

                            's_class' => 'required',
                            'subject_id' => 'required',
                    ],

                    [
                        'required' => 'Select an option first.',
                    ]);

                    if($validatedData->fails())
                    {
                    return Redirect::back()->withErrors($validatedData);
                    }
                    else{
                    $assignment = DB::table('down_assignment')
                    ->join('subject_list','subject_list.subject_id','=','down_assignment.subject_id')
                    ->select('down_assignment.*','subject_list.subject_name','subject_list.subject_code')
                    ->where('down_assignment.t_id','=',$t_id)
                    ->where('down_assignment.subject_id','=',$subject_id)
                    ->where('down_assignment.s_class','=',$s_class)
                    ->get();

                    return view('teacher.showSearchAssignment',['assignment'=>$assignment]);
                       }

   }


      public function viewEditAssignment($d_assign_id)
      {
        $d_id = base64_decode($d_assign_id);
        $data = DB::table('down_assignment')
                                ->where('d_assign_id',$d_id)
                                ->first();
                               //return response()->json($data);
        return view('teacher.editAssignment',['data'=>$data]);
      }
      public function postEditAssignment(Request $request)
    {
        $validatedData=Validator::make($request->all(),[
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,zip,rar,doc|max:2048',
            'subject_id'=>'required',
            's_class' =>'required',
    ],

    [
        'required' => 'This field can not be blank.',
        'mimes' =>'Document type does not match'
    ]);

            $subject_id=$request->subject_id;
            $s_class = $request->s_class;
            $t_id = session()->get('t_id');
            $d_id=$request->d_assign_id;

            if($validatedData->fails())
            {
            return Redirect::back('teacher/search/assignment')->withErrors($validatedData);
            }
            else
            {
            $d_id=$request->d_assign_id;
            $existing_file = DB::table('down_assignment')
            ->select()
            ->where('d_assign_id',$d_id)
            ->first();

                if ($request->hasFile('file'))
                {
                    //return response()->json($existing_file);
                    $path = public_path('../public/D Assignment/');
                    $old_file=$path.$existing_file->file_path;
                    //return response()->json($existing_file);

                    $filename =  $request->file('file')->getClientOriginalName();
                    $request->file('file')->move(public_path('../public/D Assignment/'), $filename);

                    $data =array();
                    $data['t_id']=$t_id;
                    $data['subject_id']=$subject_id;
                    $data['s_class'] = $s_class;
                    $data['file_path'] = $filename;
                    $data['timestamp']=date('Y-m-d H:i:s');

                    $Notice="Assignment Updated  successfully";
                    DB::table('down_assignment')
                    ->where('d_assign_id',$d_id)
                    ->update($data);
                    unlink($old_file);
                    return redirect('teacher/view/search/assignment')->withErrors($Notice);
                }
                else
                {
                    $data =array();
                    $data['t_id']=$t_id;
                    $data['subject_id']=$subject_id;
                    $data['s_class'] = $s_class;
                    $data['file_path'] = $request->file;
                    $data['timestamp']= date('Y-m-d H:i:s');

                    $Notice="Assignment Updated  successfully";
                    DB::table('down_assignment')
                    ->where('$d_assign_id',$d_id)
                    ->update($data);
                    return redirect('teacher/view/search/assignment')->withErrors($Notice);
                }
            }
    }

    public function viewDownloadAssignment(){
        return view('teacher.downloadAssignment');
    }

    public function postDownloadAssignment(Request $req){
        $t_id=session()->get('t_id');
        $subject_id = $req->subject_id;
        $s_class = $req->s_class;
        $validatedData=Validator::make($req->all(),[

               's_class' => 'required',
               'subject_id' => 'required',
       ],

       [
           'required' => 'Select an option first.',
       ]);

       if($validatedData->fails())
       {
       return Redirect::back()->withErrors($validatedData);
       }
       else{
       $assignment = DB::table('up_assignment')
       ->join('subject_list','subject_list.subject_id','=','up_assignment.subject_id')
       ->join('students','students.sid','=','up_assignment.sid')
       ->select('up_assignment.*','subject_list.subject_name','subject_list.subject_code','students.*')
       ->where('up_assignment.t_id','=',$t_id)
       ->where('up_assignment.subject_id','=',$subject_id)
       ->where('up_assignment.s_class','=',$s_class)
       ->get();

       return view('teacher.showDownloadAssignment',['assignment'=>$assignment]);
    }

}

public function downloadAssignment($asign_id){
           $file= DB::table('up_assignment')
           ->where('asign_id',$asign_id)
           ->first();

        $url=$file->asign_file_path;
        //return response()->json($url);

        return response()->download(storage_path("../public/S Assignment/{$url}"));
}


public function viewUploadApplication(){
    return view ('teacher.uploadApplication');
}


public function postUploadApplication(Request $req){

        $validatedData=Validator::make($req->all(),[
            'file' => 'required|mimes:pdf,doc|max:2048',
            'app_name'=>'required',
            'app_details' =>'required',
            'app_category'=>'required',
        ],

        [
            'required' => 'This field can not be blank.',
            'mimes' =>'Document type does not match'
        ]);

        $t_id=session()->get('t_id');
        $app_name = $req->app_name;
        $app_details =$req->app_details;
        $app_category = $req->app_category;

        $data=array();

        $data['t_id']=$t_id;
        $data['app_name']=$app_name;
        $data['app_details']=$app_details;
        $data['app_catagory'] = $app_category;
        $data['timestamp']= date('Y-m-d H:i:s');

        if($validatedData->fails())
            {
            return Redirect::back('teacher/upload/application')->withErrors($validatedData);
            }

        else{
            if($req->file()){

                $filename =  $req->file('file')->getClientOriginalName();
                $req->file('file')->move(public_path('../public/applications/'), $filename);
                $data['app_file_path'] = $filename;

                DB::table('applications')->insert($data);
                $not="Application Uploaded successfully";
                return redirect('teacher/upload/application')->withErrors($not);

           }
        }

    }

    public function deleteAssignment($d_assign_id){
             $d_id = base64_decode($d_assign_id);

             DB::table('down_assignment')
             ->where('d_assign_id',$d_id)
             ->delete();


            $not="Row deleted successfully";
            return redirect('teacher/view/search/assignment')->withErrors($not);


    }


    public function deleteResult($result_id){
        $rid = base64_decode($result_id);

        DB::table('results')
        ->where('result_id',$rid)
        ->delete();

       $not="Row deleted successfully";
       return redirect('teacher/search/result')->withErrors($not);


}

}

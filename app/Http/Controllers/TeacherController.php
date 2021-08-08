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

        $email = $req->email;
        $password = $req->password;


        $user = DB::table('teachers')
                ->where('t_email',$email)
                ->where('t_password',$password)
                ->first();

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

            return back()
            ->with('success','File has been uploaded.');

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

                            // 'exam_type_id' => 'required',
                            // 'subject_id' => 'required',
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


      public function viewEditAssignment($d_assign_id){
        $d_id = base64_decode($d_assign_id);
        $data = DB::table('down_assignment')
                                ->where('d_assign_id',$d_id)
                                ->first();
                               //return response()->json($data);
        return view('teacher.editAssignment',['data'=>$data]);
      }


}

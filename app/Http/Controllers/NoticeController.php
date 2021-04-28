<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class NoticeController extends Controller
{
    public function noticeAddView()
    {
        return view('admin.addNotice');
    }


    public function addNotice(Request $request)
    {
        $validatedData=Validator::make($request->all(),[
<<<<<<< HEAD
            'n_title' => 'required|max:100',
            'n_type_id' => 'required',
            'n_description' => 'required|max:1000',

=======
            'n_title' => 'required|max:100', 
            'n_type_id' => 'required',
            'n_description' => 'required|max:1000',
            
>>>>>>> 87d3313ea87eace1a9f4ffe728aea7ae221b79b5
    ],

    [
        'required' => 'This field can not be blank.',
        'max' => 'Enter less than max value.'
<<<<<<< HEAD

=======
    
>>>>>>> 87d3313ea87eace1a9f4ffe728aea7ae221b79b5

    ]);

    $data =array();

<<<<<<< HEAD


=======
        
 
>>>>>>> 87d3313ea87eace1a9f4ffe728aea7ae221b79b5
        $filename =  $request->file('n_image')->getClientOriginalName();
        $request->file('n_image')->move(public_path('../public/notice Image/'), $filename);

        $data['n_image']=$filename;
        $data['n_title']=$request->n_title;
        $data['n_description']=$request->n_description;
        $data['n_type_id']=$request->n_type_id;
        $data['n_added_by']=1;
        $data['timestamp']=date('Y-m-d H:i:s');



            if($validatedData->fails())
            {
               return Redirect::back()->withErrors($validatedData);
            }

            else
           {
                 $Notice="Notice added successfully";
                 DB::table('notices')->insert($data);
                 return redirect('notice.add')->withErrors($Notice);
           }

        // DB::table('stock_product_picture')->insert($stock_product_picture);



    }
<<<<<<< HEAD

    public function allNotice()
    {
        $all_notice=DB::table('notices')->get();
        return view('admin.viewAllNotice',['all_notice'=>$all_notice]);
    }
=======
>>>>>>> 87d3313ea87eace1a9f4ffe728aea7ae221b79b5
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class PaymentController extends Controller
{
    public function postRegistrationFee(Request $request){



        $validatedData=Validator::make($request->all(),
        [
            'sid' => 'required',
            's_class' => 'required',
            'admission_fee' => 'required',
            'total_amount' => 'required',
            'paid_amount' => 'required',
        ],

        [


            'sid.required' => 'Required student ID',
            's_class.required' => 'Select a class',
            'admission_fee.required' => ' Please enter admission fee',
            'total_amount.required' => ' Please enter total amount',
            'paid_amount.max' => ' Please enter paid amount',

        ]);


        if($validatedData->fails())
            {
                    return view('admin.addRegistrationFees')->withErrors($validatedData);
            }

        else{

               $sid = $request->sid;
               $sid_checking = DB::table('students')
               ->where('sid',$sid)
               ->first();

               if($sid_checking == null)
                {
                    $not = "The student ID you entered is not registred by admin";
                    return view('admin.addRegistrationFees')->withErrors($not);
                }

                else
                {
                   $a_id=session()->get('a_id');

                   $data = array();
                   $data['a_id']=$a_id;
                   $data['sid']=$request->sid;
                   $data['s_class']=$request->s_class;
                   $data['admission_fee'] = $request->admission_fee;
                   $data['development_fee'] = $request->development_fee;
                   $data['miscelenious_fee'] = $request->miscelenious_fee;
                   $data['activity_fee'] = $request->activity_fee;
                   $data['total_amount'] = $request->total_amount;
                   $data['paid_amount'] = $request->paid_amount;
                   $data['due_amount'] = $request->due_amount;
                   $data['timestamp']= date('Y-m-d H:i:s');

                   $transaction_array = array();
                   $transaction_array['a_id']=$a_id;
                   $transaction_array['sid']=$request->sid;
                   $transaction_array['total_amount'] = $request->total_amount;
                   $transaction_array['paid_amount'] = $request->paid_amount;
                   $transaction_array['due_amount'] = $request->due_amount;
                   $transaction_array['trans_type'] ="registration fee";
                   $transaction_array['timestamp']= date('Y-m-d H:i:s');


                    DB::table('registration_fees')->insert($data);
                    DB::table('transactions')->insert($transaction_array);

                    $not=" Registration fee inserted successfully";
                    return redirect('add.registration.fees')->withErrors($not);
                }

            }

    }


    public function postExaminationFee(Request $request){

        $validatedData=Validator::make($request->all(),
        [
            'sid' => 'required',
            'exam_type_id' => 'required',
            'total_amount' => 'required',
            'paid_amount' => 'required',
        ],

        [


            'sid.required' => 'Required student ID',
            'exam_type_id.required' => 'Select a exam type',
            'total_amount.required' => ' Please enter total amount',
            'paid_amount.max' => ' Please enter paid amount',

        ]);


        if($validatedData->fails())
            {
                    return view('admin.addExaminationFees')->withErrors($validatedData);
            }

        else{

               $sid = $request->sid;
               $sid_checking = DB::table('students')
               ->where('sid',$sid)
               ->first();

               if($sid_checking == null)
                {
                    $not = "The student ID you entered is not registred by admin";
                    return view('admin.addExaminationFees')->withErrors($not);
                }

                else
                {
                    $pay_status = DB::table('examination_fees')
                    ->select()
                    ->where('sid',$request->sid)
                    ->where('exam_type_id',$request->exam_type_id)
                    ->first();

                   if( $pay_status != null){
                    $not = "The student already paid examiation fees";
                    return view('admin.addExaminationFees')->withErrors($not);
                   }

                   else
                   {
                    $a_id=session()->get('a_id');

                    $data = array();
                    $data['a_id']=$a_id;
                    $data['sid']=$request->sid;
                    $data['exam_type_id']=$request->exam_type_id;
                    $data['total_amount'] = $request->total_amount;
                    $data['paid_amount'] = $request->paid_amount;
                    $data['due_amount'] = $request->due_amount;
                    $data['timestamp']= date('Y-m-d H:i:s');

                    $transaction_array = array();
                    $transaction_array['a_id']=$a_id;
                    $transaction_array['sid']=$request->sid;
                    $transaction_array['total_amount'] = $request->total_amount;
                    $transaction_array['paid_amount'] = $request->paid_amount;
                    $transaction_array['due_amount'] = $request->due_amount;
                    $transaction_array['trans_type'] ="examination fee";
                    $transaction_array['timestamp']= date('Y-m-d H:i:s');


                     DB::table('examination_fees')->insert($data);
                     DB::table('transactions')->insert($transaction_array);

                     $not=" Examination fee inserted successfully";
                     return redirect('add.examination.fees')->withErrors($not);
                   }


                }

            }
    }



    public function postMonthlyFee(Request $request){

        $validatedData=Validator::make($request->all(),
        [
            'sid' => 'required',
            'month_id' => 'required',
            'total_amount' => 'required',
            'paid_amount' => 'required',
        ],

        [


            'sid.required' => 'Required student ID',
            'month_id.required' => 'Select a month',
            'total_amount.required' => ' Please enter total amount',
            'paid_amount.max' => ' Please enter paid amount',

        ]);


        if($validatedData->fails())
            {
                    return view('admin.addMonthlyFees')->withErrors($validatedData);
            }

        else{

               $sid = $request->sid;
               $sid_checking = DB::table('students')
               ->where('sid',$sid)
               ->first();

               if($sid_checking == null)
                {
                    $not = "The student ID you entered is not registred by admin";
                    return view('admin.addMonthlyFees')->withErrors($not);
                }

                else
                {

                    $a_id=session()->get('a_id');

                    $data = array();
                    $data['a_id']=$a_id;
                    $data['sid']=$request->sid;
                    $data['month_id']=$request->month_id;
                    $data['total_amount'] = $request->total_amount;
                    $data['paid_amount'] = $request->paid_amount;
                    $data['due_amount'] = $request->due_amount;
                    $data['timestamp']= date('Y-m-d H:i:s');

                    $transaction_array = array();
                    $transaction_array['a_id']=$a_id;
                    $transaction_array['sid']=$request->sid;
                    $transaction_array['total_amount'] = $request->total_amount;
                    $transaction_array['paid_amount'] = $request->paid_amount;
                    $transaction_array['due_amount'] = $request->due_amount;
                    $transaction_array['trans_type'] ="monthly fee";
                    $transaction_array['timestamp']= date('Y-m-d H:i:s');


                     DB::table('monthly_fees')->insert($data);
                     DB::table('transactions')->insert($transaction_array);

                     $not=" Monthly fee inserted successfully";
                     return redirect('add.monthly.fees')->withErrors($not);



                }

            }
    }

}

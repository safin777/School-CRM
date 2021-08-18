<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Validator;
use DB;
use PDF;
use Session;
use Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class TransactionController extends Controller
{
    public function addRegistrationFeesView()
    {
        return view('admin.addRegistrationFees');
    }

    public function addMonthlyFeesView()
    {
        return view('admin.addMonthlyFees');
    }

    public function addExaminationFeesView()
    {
        return view('admin.addExaminationFees');
    }

    public function viewTransactionList()
    {
        $transactions = DB::table('transactions')
        ->join('admins','admins.a_id','=','transactions.a_id')
        ->join('students','students.sid','=','transactions.sid')
        ->select('transactions.*','students.*','admins.*')
        ->get();

        return view('admin.transactionList',['transactions'=>$transactions]);


    }


    public function editTransactionGet($trans_id){
        $transaction = base64_decode($trans_id);
        $transactions = DB::table('transactions')
        ->where('trans_id',$transaction)
        ->first();

        return view('admin.transactionDetails',['transactions'=>$transactions]);
    }


    public function editTransactionPost(Request $request){
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

                     $not="Transaction details updated !";
                     return redirect('add.monthly.fees')->withErrors($not);



                }

            }
    }






}

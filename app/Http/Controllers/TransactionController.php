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


    public function editTransactionPost(Request $request , $trans_id){
        $validatedData=Validator::make($request->all(),
        [
            'sid' => 'required',
            'trans_type' => 'required',
            'total_amount' => 'required',
            'paid_amount' => 'required',
        ],

        [


            'sid.required' => 'Required student ID',
            'trans_type.required' => 'Select Transaction Type',
            'total_amount.required' => ' Please enter total amount',
            'paid_amount.max' => ' Please enter paid amount',

        ]);


        if($validatedData->fails())
            {

                $transactions = DB::table('transactions')
                ->where('trans_id',$request->trans_id)
                ->first();
                return view('admin.transactionDetails',['transactions'=>$transactions])->withErrors($validatedData);
            }

        else{

                    $a_id=session()->get('a_id');

                    $transaction_array = array();
                    $transaction_array['a_id']=$a_id;
                    $transaction_array['sid']=$request->sid;
                    $transaction_array['total_amount'] = $request->total_amount;
                    $transaction_array['paid_amount'] = $request->paid_amount;
                    $transaction_array['due_amount'] = $request->due_amount;
                    $transaction_array['trans_type'] =$request->trans_type;
                    $transaction_array['timestamp']= date('Y-m-d H:i:s');

                     DB::table('transactions')
                     ->where('trans_id',$request->trans_id)
                     ->update($transaction_array);

                     $transactions = DB::table('transactions')
                        ->where('trans_id',$request->trans_id)
                        ->first();
                     $not="Transaction details updated !";
                     return view('admin.transactionDetails',['transactions'=>$transactions])->withErrors($not);

            }
    }






}

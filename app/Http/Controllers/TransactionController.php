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




}

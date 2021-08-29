@extends('admin.layouts.adminSidebar')

@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
@endsection
@section('content')
 <div class="page-wrapper">
     <div class="content">
         <div class="row">
             <div class="col-sm-4 col-3">

                 <h1 class="page-title">Transaction List</h1>
             </div>
         </div>

         <div class="row">
             <div class="col-md-12">
                 <div class="table-responsive">
                     <table id="arafat2" class="table table-bordered table-hover">
                         <thead>
                             <tr>
                                <th>Transaction ID</th>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Transacted By</th>
                                <th>Total </th>
                                <th>Paid </th>
                                <th>Due </th>
                                <th>type</th>
                                <th>Time</th>
                                <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                            @foreach($transactions as $transaction)
                              <tr>
                                 <td>{{$transaction->trans_id}}</td>
                                  <td>{{$transaction->sid}}</td>
                                  <td>{{$transaction->s_name}}</td>
                                  <td>{{$transaction->a_fullname}}--[{{$transaction->a_id}}]</td>
                                  <td>{{$transaction->total_amount}}</td>
                                  <td>{{$transaction->paid_amount}}</td>
                                  <td>{{$transaction->due_amount}}</td>
                                  <td>{{$transaction->trans_type}}</td>
                                  <td>{{$transaction->timestamp}}</td>
                                 <td class="text-right">
                                    <a href="{{ URL::to('transaction/edit/'.base64_encode($transaction->trans_id)) }}" class="btn btn-sm btn-success"><i class="fa fa-check"></i>Details and Edit</a>
                                    <a href="{{ URL::to('transaction/delete/'.base64_encode($transaction->trans_id)) }}" class="btn btn-sm btn-danger" onclick=" return confirm('Are you sure to delete?')"><i class="fal fa-trash-alt"></i>Delete</a>
                                 </td>
                             </tr>
                            @endforeach
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
 </div>
 @endsection

 @section('javascript')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
     $('#arafat2').DataTable();
    } );
  </script>
@endsection


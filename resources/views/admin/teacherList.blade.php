@extends('admin.layouts.adminSidebar')

@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
@endsection

@section('content')

 <div class="page-wrapper">
     <div class="content">
         <div class="row">
             <div class="col-sm-4 col-3">
                 <h1 class="page-title">Teacher List</h1>
             </div>
             <div class="col-sm-8 col-9 text-right m-b-20">
                 <a href="{{ URL::to('register.student.add') }}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Add Teacher</a>
             </div>
         </div>

         <div class="row">
             <div class="col-md-12">
                 <div class="table-responsive">
                     <table id="arafat2" class="table table-bordered table-hover">
                         <thead>
                             <tr>
                                <th>Teacher ID</th>
                                <th>Teacher Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Phone</th>
                                <th>Image</th>
                                <th>NID</th>
                                <th>Action</th>

                             </tr>
                         </thead>
                         <tbody>

                            @foreach($all_teacher as $data)


                              <tr>

                                  <td>{{$data->t_id}}</td>
                                  <td>{{$data->t_name}}</td>
                                  <td>{{$data->t_email}}</td>
                                  <td>{{$data->t_address}}</td>

                                  @if($data->t_status==1)
                                      <td style="color: green"><b>Active</b></td>
                                  @elseif($data->t_status==0)
                                      <td style="color: red"><b>Inactive</b></td>

                                  @endif
                                  <td>{{$data->t_phone}}</td>
                                <td><img class="rounded-circle" style="width:100px;height:100px;"src="{{url('../user Image/'.$data->t_image)}}" alt="No Image"></td>
                                <td>{{$data->t_national_id}}</td>


                                 <td class="text-right">
                                    <a href="{{ URL::to('teacher/details/'.base64_encode($data->t_id)) }}" class="btn btn-sm btn-success"><i class="fa fa-check"></i>Details and Edit</a>
                                    <a href="{{ URL::to('teahcer/delete/'.base64_encode($data->t_id)) }}" class="btn btn-sm btn-danger" onclick=" return confirm('Are you sure to delete?')"><i class="fa fa-warning"></i>Delete</a>
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


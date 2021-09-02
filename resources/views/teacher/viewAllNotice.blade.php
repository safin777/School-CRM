@extends('teacher.teacherSideBar')
@section('content')

 <div class="page-wrapper">
     <div class="content">
         <div class="row">
             <div class="col-sm-4 col-3">
                 <h1 class="page-title">Notice List</h1>
             </div>
             <div class="col-sm-8 col-9 text-right m-b-20">
                 <a href="{{ url('teacher.view.uploadNotice') }}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Add Notice</a>
             </div>
         </div>
         
         </form>

         <div class="row">
             <div class="col-md-12">
                 <div class="table-responsive">
                     <table id="arafat2" class="table table-bordered table-hover">
                         <thead>
                             <tr>

                                <th>Notice ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Notice For</th>
                                <th>Image</th>
                                <th>Date</th>
                                <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>

                            @foreach($all_notice as $data)


                              <tr>

                                  <td>{{$data->n_id}}</td>
                                  <td>{{$data->n_title}}</td>
                                  <td>{{$data->n_description}}</td>
                                  @if($data->n_type_id==1)
                                      <td>For All</td>
                                  @elseif($data->n_type_id==2)
                                      <td>Students</td>
                                  @elseif($data->n_type_id==3)
                                      <td>Teachers</td>
                                  @endif
                                <td><img class="rounded-circle" style="width:100px;height:100px;"src="{{url('../notice Image/'.$data->n_image)}}" alt="No Image"></td>


                                  <td>{{$data->timestamp}}</td>



                                 <td class="text-right">
                                    <a href="{{URL::to('teacher/notice/edit/'.base64_encode($data->n_id))}}" class="btn btn-sm btn-success"><i class="fa fa-check"></i>Edit</a>

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

 @section('styles')
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
 @endsection

 @section('javascript')
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
  <script>
      $(document).ready( function () {
       $('#arafat2').DataTable();
      } );
    </script>
  @endsection


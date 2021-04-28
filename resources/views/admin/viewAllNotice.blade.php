@extends('admin.layouts.adminSidebar')
@section('content')

 <div class="page-wrapper">
     <div class="content">
         <div class="row">
             <div class="col-sm-4 col-3">
                 <h1 class="page-title">Notice List</h1>
             </div>
             <div class="col-sm-8 col-9 text-right m-b-20">
                 <a href="{{ url('notice.add') }}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Add Notice</a>
             </div>
         </div>
         <form action="" method="">
         <div class="row filter-row">

             <div class="col-sm-6 col-md-3">
                 <div class="form-group form-focus">
                     <label class="focus-label">Title /Notice ID</label>
                     <input type="text" class="form-control floating" name="search" id="search">
                 </div>
             </div>

             <div class="col-sm-6 col-md-3">
                <button formaction="" class="btn btn-success btn-block">Search</button>
             </div>
         </div>
         </form>

         <div class="row">
             <div class="col-md-12">
                 <div class="table-responsive">
                     <table class="table table-striped custom-table">
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
                                  @if($data->n_type_id=1)
                                      <td>For All</td>
                                          @elseif($data->n_type_id=2)
                                      <td>Students</td>
                                          @else
                                      <td>Teachers</td>
                                  @endif
                                <td><img class="rounded-circle" style="width:100px;height:100px;"src="{{url('../notice Image/'.$data->n_image)}}" alt="No Image"></td>


                                  <td>{{$data->timestamp}}</td>



                                 <td class="text-right">
                                     <div class="dropdown dropdown-action">
                                         <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                         <div class="dropdown-menu dropdown-menu-right">
                                             <a class="dropdown-item" href="#"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <form action="#" method="POST" id="del">
                                            @csrf
                                            @method('DELETE')
                                         <!--   <a class="dropdown-item" id=""><i class="fa fa-trash-o m-r-5"></i> Delete</a> !-->
                                         <button type="submit" class="dropdown-item" id=""><i class="fa fa-trash m-r-5"></i>Delete</button>


                                         </form>
                                         </div>
                                     </div>
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


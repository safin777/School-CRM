@extends('teacher.teacherSideBar')

@section('content')

<div class="page-wrapper">
    <div class="content">

      {{-- PROFILE VIEW WIDGET --}}



        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Search Assignment</h3>
                </div>
                </div>
            </div>
        </div>


        {{-- Class Test Result Serach --}}
        <?php
        $subject=DB::table('subject_list')
        ->select()
        ->get();
        ?>
        <div class="row">
            <div class="card-body text-sm">
                <form action="{{ URL::to('teacher/search/assignment')}}"  method="post" enctype="multipart/form-data">
                    @csrf
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <div class="row mx-auto">

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for=""> Select Subject :<span style="color:red;">*</span></label>
                                <select class="form-control" name="subject_id" aria-label="Default select example" >
                                    <option selected value="0">-- Select Subject --</option>
                                    @foreach ($subject as $data )
                                    <option value="{{$data->subject_id}}">{{$data->subject_name}}&nbsp;<?php echo("[$data->subject_code]"); ?></option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group ">
                                <label for="">Submitting to Class:<span style="color:red;">*</span></label>
                                <select class="form-control" name="s_class" aria-label="Default select example" >
                                    <option selected value="0">Nursery</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                    <option value="4">Four</option>
                                    <option value="5">Five</option>
                                    <option value="6">Six</option>
                                    <option value="7">Seven</option>
                                    <option value="8">Eight</option>
                                    <option value="9">Nine</option>
                                    <option value="10">Ten</option>
                                    <option value="11">11 th</option>
                                    <option value="12">12 th</option>
                                </select>
                            </div>
                        </div>


                    </div>



                    <div class="row mx-auto">


                        <div class="col-sm-2">
                            <div class="form-group">
                                <input type="submit" class="btn btn-success btn-block hover mt-5" value="Search" >
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Search Results</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                           <tr>
                              <th>Subject Name</th>
                              <th>Class</th>
                              <th>File</th>
                              <th>Time</th>
                              <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($assignment as $a )
                            <tr>


                                <td>{{$a->subject_name}} </td>
                                <td>{{$a->s_class}}</td>
                                <td>{{$a->file_path}}</td>
                                <td>{{$a->timestamp}}</td>
                                <td class="text-right">
                                    <a href="{{URL::to('teacher/assignment/edit/'.base64_encode($a->d_assign_id))}}" class="btn btn-sm btn-success"><i class="fa fa-check"></i>Edit</a>
                                    <a href="{{URL::to('teacher/assignment/delete/'.base64_encode($a->d_assign_id))}}" class="btn btn-sm btn-danger"><i class="fa fa-warning"></i>Delete</a>
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


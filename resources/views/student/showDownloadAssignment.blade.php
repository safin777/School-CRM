@extends('student.StudentSideBar')

@section('content')

<div class="page-wrapper">
    <div class="content">

      {{-- PROFILE VIEW WIDGET --}}



        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Search To Download Assignment</h3>
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
                <form action="{{ URL::to('student/download/assignment/post')}}"  method="post" enctype="multipart/form-data">
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

                        <?php
                        $teachers=DB::table('teachers')
                        ->select()
                        ->get();
                        ?>

                        <div class="col-sm-4">
                            <div class="form-group ">
                                <label for="">Teacher's Name<span style="color:red;">*</span></label>
                                <select class="form-control" name="t_id" aria-label="Default select example" >
                                    <option selected value="0">--Select Teacher--</option>
                                    @foreach ($teachers as $data )
                                    <option value="{{$data->t_id}}">{{$data->t_name}}</option>
                                    @endforeach
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


        <div class="row mx-auto">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Search Results</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                           <tr>
                              <th>Assignment ID</th>
                              <th>Teacher Name</th>
                              <th>Subject Name</th>
                              <th>File</th>
                              <th>Time</th>
                              <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($assignment as $a )
                            <tr>

                                <td>{{$a->d_assign_id}} </td>
                                <td>{{$a->t_name}}</td>
                                <td>{{$a->subject_name}} </td>
                                <td>{{$a->file_path}}</td>
                                <td>{{$a->timestamp}}</td>
                                <td class="text-right">
                                    <a href="{{URL::to('student/assignment/download/'.$a->d_assign_id)}}" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-download">download</i></a>

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


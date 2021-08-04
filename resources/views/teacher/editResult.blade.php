@extends('teacher.teacherSideBar')

@section('content')

<div class="page-wrapper">
    <div class="content">

      {{-- PROFILE VIEW WIDGET --}}



        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header bg-primary">
                        <h3 class="card-title">Update Results</h3>
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
                <form action="{{URL::to('teacher/upload/result/'.$data->result_id)}}" method="post">
                    @csrf
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

                        <div class="col-sm-2">
                            <div class="form-group ">
                                <label for="">Result ID:<span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="result_id" value="{{$data->result_id}}" readonly id="">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group ">
                                <label for="">Student ID:<span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="sid" value="{{$data->sid}}"  id="">
                            </div>
                        </div>


                        <?php
                            $subject_name=DB::table('subject_list')
                            ->get();
                          ?>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for=""> Select Subject :<span style="color:red;">*</span></label>
                                <select class="form-control" name="subject_id" aria-label="Default select example" >
                                    @foreach ($subject_name as $sub )
                                    @if ($data->subject_id == $sub->subject_id)
                                    <option selected value="{{$sub->subject_id}}">{{$sub->subject_name}}&nbsp;<?php echo("[$sub->subject_code]"); ?></option>
                                    @endif
                                    <option value="{{$sub->subject_id}}">{{$sub->subject_name}}&nbsp;<?php echo("[$sub->subject_code]"); ?></option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                   <?php
                    $exam = DB::table('exam_type')
                    ->get();
                   ?>

                    <div class="row mx-auto">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for=""> Exam Type :<span style="color:red;">*</span></label>
                                <select class="form-control" name="exam_type_id" aria-label="Default select example" >
                                    @foreach ($exam as $ex )
                                    @if ($ex->exam_type_id == $data->exam_type_id)
                                    <option selected value="{{$ex->exam_type_id}}">{{$ex->exam_type_name}}</option>
                                    @endif
                                    <option value="{{$ex->exam_type_id}}">{{$ex->exam_type_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for=""> Slug :<span style="color:red;">*</span></label>
                                <select class="form-control" name="slug" aria-label="Default select example" >

                                       @if ($data->slug == "term")
                                       <option selected value="term">Term</option>
                                       <option  value="test">Test</option>
                                       @else
                                       <option  value="term">Term</option>
                                       <option selected  value="test">Test</option>
                                       @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-auto">
                        <div class="col-sm-4">
                            <div class="form-group ">
                                <label for="">Obtained Marks:<span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="marks" value="{{$data->marks}}" id="">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <input type="submit" class="btn btn-success btn-block hover mt-5" value="Upload" >
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection


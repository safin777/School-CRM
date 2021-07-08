@extends('student.studentSidebar')

@section('content')

<div class="page-wrapper">
    <div class="content">

      {{-- PROFILE VIEW WIDGET --}}



        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Upload Assignment Here</h3>
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
                <form action="{{ URL::to('student/upload/assignment')}}"  method="post" enctype="multipart/form-data">
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
                        $teacher=DB::table('teachers')
                        ->select()
                        ->get();
                        ?>


                        <div class="col-sm-4">
                            <div class="form-group ">
                                <label for="">Submitting to Teacher:<span style="color:red;">*</span></label>
                                <select class="form-control" name="t_id" aria-label="Default select example" >
                                    <option selected value="0">-- Teacher Name --</option>
                                    @foreach ($teacher as $data )
                                    <option value="{{$data->t_id}}">{{$data->t_name}} <?php echo("[TID-$data->t_id]"); ?></option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                    </div>

                    <div class="row mx-auto">

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="formFileMultiple" class="form-label">Upload Your File Here</label>
                                <input class="file" type="file" name="file" />
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


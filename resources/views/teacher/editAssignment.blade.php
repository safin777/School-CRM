
@extends('teacher.teacherSideBar')
@section('content')
<div class="page-wrapper">
    <div class="content">
      {{-- PROFILE VIEW WIDGET --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Edit Assignment Here</h3>
                </div>
                </div>
            </div>
        </div>
        {{-- Class Test Result Serach --}}

        <div class="row">
            <div class="card-body text-sm">
                <form action="{{ URL::to('teacher/assignment/edit/post/'.$data->d_assign_id)}}"  method="post" enctype="multipart/form-data">
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

                    <?php
                    $subject=DB::table('subject_list')
                    ->select()
                    ->get();
                    ?>

                    <div class="row mx-auto">
                        <div class="col-sm-2">
                            <div class="form-group ">
                                <label for="">Assignment ID:<span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="d_assignment_id" value="{{$data->d_assign_id}}" readonly >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for=""> Select Subject :<span style="color:red;">*</span></label>
                                <select class="form-control" name="subject_id" aria-label="Default select example" >
                                    @foreach ($subject as $s )
                                        @if ($data->subject_id==$s->subject_id)
                                        <option selected value="{{$s->subject_id}}">{{$s->subject_name}}&nbsp;<?php echo("[$s->subject_code]");?></option>
                                        @endif
                                        <option value="{{$s->subject_id}}">{{$s->subject_name}}&nbsp;<?php echo("[$s->subject_code]"); ?></option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <?php
                        $class=DB::table('class')
                        ->select()
                        ->get();
                        ?>
                        <div class="col-sm-4">
                            <div class="form-group ">
                                <label for="">Submitting to Class:<span style="color:red;">*</span></label>
                                <select class="form-control" name="s_class" aria-label="Default select example" >
                                 @foreach ($class as $c )
                                    @if($data->s_class==$c->s_class)
                                    <option selected value="{{$c->s_class}}">{{$c->s_class_name}}</option>
                                    @endif
                                    <option value="{{$c->s_class}}">{{$c->s_class_name}}</option>
                                 @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-auto">

                        <div class="col-sm-4 mt-2">
                            <div class="form-group">
                                <label for="formFileMultiple" class="form-label">Previous File: &nbsp; &nbsp;{{$data->file_path}}</label>
                                <input class="file" type="file" name="file" value="{{$data->file_path}}" >
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <input type="submit" class="btn btn-success btn-block hover mt-5" value="Update" >
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>


</script>

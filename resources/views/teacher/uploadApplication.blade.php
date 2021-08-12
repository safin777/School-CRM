
@extends('teacher.teacherSideBar')
@section('content')
<div class="page-wrapper">
    <div class="content">
      {{-- PROFILE VIEW WIDGET --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Upload Applcation Here</h3>
                </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="card-body text-sm">
                <form action="{{ URL::to('teacher/upload/application')}}"  method="post" enctype="multipart/form-data">
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
                                


                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group ">
                                <label for="">Application Category:<span style="color:red;">*</span></label>
                                <select class="form-control" name="app_category" aria-label="Default select example" >
                                    <option selected value="0">Nursery</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-auto">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="formFileMultiple" class="form-label">Upload Your File Here</label>
                                <input class="file" type="file" name="file">
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

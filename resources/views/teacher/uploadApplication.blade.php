
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
                                    <div class="form-group ">
                                        <label for="">Application Name<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="app_name" value=""  id="">
                                    </div>
                                </div>


                        <div class="col-sm-4">
                            <div class="form-group ">
                                <label for="">Application Category:<span style="color:red;">*</span></label>
                                <select class="form-control" name="app_category" aria-label="Default select example" >

                                    <option selected value="Class">Class Materials Application</option>
                                    <option value="Fees">Payment related Application</option>
                                    <option value="Other">Optional Application</option>

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mx-auto">
                        <div class="col-sm-8">
                            <div class="form-group ">
                                <label for=""> Application Description :<span style="color:red;">*</span></label>
                                <textarea class="form-control" name="app_details" ></textarea>
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

@endsection

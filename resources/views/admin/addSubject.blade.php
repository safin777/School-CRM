@extends('admin.layouts.adminSidebar')

@section('content')

<div class="page-wrapper">
    <div class="container-fluid">

        <div class="row mx-auto">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Add Subject</h1>
            </div>

            <div class="col-sm-6 ">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Add Subject</li>
                </ol>
            </div>
        </div>                                         {{-- page top title header --}}

        <div class="row">
            <div class="card-body text-sm">

                <form action="{{ URL::to('add/subject')}}"  method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        @if ($errors->any())
                            <div class="alert alert-success">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div class="row mx-auto">
                        <div class="col-sm-4">
                            <div class="form-group ">
                                <label for="">Subject Name :<span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="subject_name" value="" id="">
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group ">
                                <label for="">Subject Code :<span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="subject_code" value="" id="">
                            </div>
                        </div>
                    </div>                               {{--Row 1--}}

                    <div class="row mx-auto">

                        <div class="col-md-4">
                            <div class="form-group">
                            <input type="submit" class="btn btn-success btn-block hover" value="Add" >
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>{{-- container for holding form--}}
</div> {{-- main container end --}}

@endsection

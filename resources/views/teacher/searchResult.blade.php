@extends('teacher.teacherSideBar')

@section('content')

<div class="page-wrapper">
    <div class="content">

      {{-- PROFILE VIEW WIDGET --}}



        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Search Results</h3>
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
                <form action="{{ URL::to('teacher/search/result')}}"  method="post" enctype="multipart/form-data">
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
                                <label for="">Student ID:<span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="sid" value="" placeholder="Enter Student ID" id="">
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
    </div>
</div>
@endsection


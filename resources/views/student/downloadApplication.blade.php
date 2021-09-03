
@extends('student.studentSidebar')

@section('content')

<div class="page-wrapper">
    <div class="content">
       <div class="container">
            <div class="row">
                @foreach ($applications as $application )
                <div class="col-sm-4">
                    <div class="card card2">
                        <div class="card-title card-title2">
                            <h4>{{$application->app_name}}</h4>
                        </div>
                        <div class="card-content">
                            <p>{{$application->app_details}}</p>
                        </div>
                        <div class="card-action mx-auto">

                            <a href="{{URL::to('student/application/download/'.$application->app_id)}}" class="btn btn-sm btn-info hover"><i class="fa fa-download" aria-hidden="true"></i> &nbsp;Download</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

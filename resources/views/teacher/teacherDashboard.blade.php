@extends('teacher.teacherSideBar')

@section('content')

<div class="page-wrapper">
    <div class="content">
            <div class="row">
                <div class="col-md-12 col-xs-11">

                    <div class="col-lg-2 col-xs-12 bg-success shadow menuContainer hover">
                        <a href="{{ url('teacher.view.uploadNotice') }}" class="menuLink text-decoration-none">Notices<br><i class="fas fa-comments-dollar fa-3x"></i></a> <br>

                    </div>


                    <div class="col-lg-2 col-xs-12 bg-warning shadow menuContainer hover">
                        <a href="{{ url('view.search.result') }}" class="menuLink text-decoration-none">Results <br><i class="fas fa-poll-people fa-3x"></i></a>
                    </div>

                    <div class="col-lg-2 col-xs-12 bg-secondary shadow menuContainer hover">
                        <a href="{{url('teacher/upload/application')}}" class="menuLink text-decoration-none">Upload Application<br><i class="fas fa-file-upload fa-3x"></i></a>
                    </div>

                    <div class="col-lg-2 col-xs-12 bg-info shadow menuContainer hover">
                        <a href="{{ url('teacher/view/upload/assignment') }}" class="menuLink text-decoration-none">Upload Assignment<br><i class="fas fa-poll fa-3x"></i></a>
                    </div>

                </div>
            </div>
    </div>
</div>
@endsection


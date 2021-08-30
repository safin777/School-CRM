@extends('admin.layouts.adminSidebar')

@section('content')

<div class="page-wrapper">
    <div class="content">
            <div class="row">
                <div class="col-md-12 col-xs-11">

                    <div class="col-lg-2 col-xs-12 col bg-primary shadow menuContainer hover">
                        <a href="{{ URL::to('register.student.add') }}" class="menuLink text-decoration-none">Register Student<br> <i class="fas fa-school fa-3x"></i> </a> <br>


                    </div>


                    <div class="col-lg-2 col-xs-12 bg-success shadow menuContainer hover">
                        <a href="{{ url('notice.all') }}" class="menuLink text-decoration-none">Notices List<br><i class="fas fa-comments-dollar fa-3x"></i></a> <br>

                    </div>


                    <div class="col-lg-2 col-xs-12 bg-warning shadow menuContainer hover">
                        <a href="{{ url('transaction.list') }}" class="menuLink text-decoration-none">Transaction List<br> <i class="fas fa-money-check-alt fa-3x"></i></a>
                    </div>

                    <div class="col-lg-2 col-xs-12 bg-secondary shadow menuContainer hover">
                        <a href="{{ url('view.student.list') }} " class="menuLink text-decoration-none">Student List <br> <i class="fas fa-users-class fa-3x"></i></a>
                    </div>

                    <div class="col-lg-2 col-xs-12 bg-info shadow menuContainer hover">
                        <a href="{{ url('view.teacher.list') }}" class="menuLink text-decoration-none">Teacher List <br> <i class="fas fa-chalkboard-teacher fa-3x"></i></a>
                    </div>

                </div>
            </div>
    </div>
</div>
@endsection

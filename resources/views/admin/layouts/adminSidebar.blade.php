<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.ico">
    <title>School Management</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="{{ asset ('/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('/assets/css/style2.css') }}">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
</head>
<body>
    <div class="main-wrapper">
        <div class="header">
			<div class="header-left">
				<a href="/home" class="logo">
					<img src="{{ asset('/assets/img/logo.png') }}" width="35" height="35" alt=""> <span>Online School</span>
				</a>
			</div>
			<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
							<img class="rounded-circle" src="/assets/img/user.jpg" width="24" alt="Admin">
							<span class="status online"></span>
						</span>
						<span>Admin</span>
                    </a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="/home/profile">My Profile</a>
						<a class="dropdown-item" href="/home/edit-profile">Edit Profile</a>

						<a class="dropdown-item" href="{{ url('admin.logout') }}">Logout</a>
					</div>
                </li>
            </ul>

            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="/home/profile">My Profile</a>
                    <a class="dropdown-item" href="/home/edit-profile">Edit Profile</a>

                    <a class="dropdown-item" href="{{ url('admin.logout') }}">Logout</a>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <li class="active">
                            <a href="{{ url('admin.dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
                        <li class="active">
                            <a href="{{ url('transaction.list') }}"><i class="fa fa-list"></i> <span>Transaction List</span></a>
                        </li>
                        <li>
                            <a href="{{ url('register.student.add') }}"><i class="fa fa-user-plus"></i> <span>Register User</span></a>
                        </li>
                        <li class="submenu">
							<a href="#"><i class="fa fa-users"></i> <span> User List </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="{{ url('view.student.list') }}">Students List</a></li>
                                <li><a href="{{ url('view.teacher.list') }}">Teacher List</a></li>
							</ul>
						</li>
                        <li class="submenu">
							<a href="#"><i class="fa fa-envelope-square"></i> <span> Notices</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="{{ url('notice.all') }}">View All Notice</a></li>
                                <li><a href="{{ url('notice.add') }}">Add Notice</a></li>
							</ul>
						</li>
                        <li class="submenu">
							<a href="#"><i class="far fa-comments-alt-dollar"></i> <span>Fees & Account </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
                                <li><a href="{{ url('add.registration.fees') }}">Registration Fee</a></li>
								<li><a href="{{ url('add.monthly.fees') }}">Monthly Fee</a></li>
                                <li><a href="{{ url('add.examination.fees') }}">Examination Fee</a></li>
							</ul>
						</li>
                    </ul>
                </div>
            </div>
        </div>
        @yield('content')
        @yield('styles')
        <script src="{{ asset ('/assets/js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset ('/assets/js/popper.min.js') }}"></script>
        <script src="{{ asset ('/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset ('/assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset ('/assets/js/Chart.bundle.js') }}"></script>
        <script src="{{ asset ('/assets/js/chart.js') }}"></script>
        <script src="{{ asset ('/assets/js/app.js') }}"></script>
        <script src="{{ asset ('/assets/js/bootstrap-datetimepicker.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <script  type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="{{asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
        <script>
            @if(Session::has('messege'))
              var type="{{Session::get('alert-type','info')}}"
              switch(type){
                  case 'info':
                       toastr.info("{{ Session::get('messege') }}");
                       break;
                  case 'success':
                      toastr.success("{{ Session::get('messege') }}");
                      break;
                  case 'warning':
                     toastr.warning("{{ Session::get('messege') }}");
                      break;
                  case 'error':
                      toastr.error("{{ Session::get('messege') }}");
                      break;
              }
            @endif
         </script>
         @yield('javascript')
    </body>
    </html>

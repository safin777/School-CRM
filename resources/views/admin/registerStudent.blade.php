@extends('admin.layouts.adminSidebar')

@section('content')
<div class="page-wrapper">
            <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                                <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Register User</h1>

                                </div><!-- /.col -->
                                <div class="col-sm-8">
                                                            <!--Error message generate here -->
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Register User</li>
                                </ol>
                                </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
            </div>
      <!-- /.content-header -->

      <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#add_student">Student</a></li>
                        <li><a data-toggle="tab" href="#add_teacher">Teacher</a></li>
                    </ul>
                           {{-- student tab started from here  --}}
                    <div class="tab-content">
                        <div id="add_student" class="tab-pane fade in active">
                            <div class="card-header bg-success shadow-lg">
                                <h5 class="card-title m-0">
                                    Add Student
                                </h5>
                            </div>

                            <div class="card-body text-sm">

                                <form action="{{ URL::to('register/student')}}"  method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="">Name :<span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" name="s_name" placeholder="Name" value="" id="">
                                        </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="">Email :<span style="color:red;">*</span></label>
                                            <input type="email" class="form-control" name="s_email" placeholder="Email" value="" id="" >
                                        </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Address :<span style="color:red;">*</span></label>
                                                <textarea class="form-control" name="s_address" ></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Birth Certificate No:<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" name="s_birth_certificate_no" placeholder="Enter Birth Certificate No" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for=""> Mother's Name:<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" name="s_mother_name" placeholder="Mother Name" value="" id="" >
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Father's Name :<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" name="s_father_name" placeholder="Father Name" value="" id="" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Class :<span style="color:red;">*</span></label>
                                                <select class="form-control" name="s_class" aria-label="Default select example" >
                                                    <option selected value="0">Nursery</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                    <option value="4">Four</option>
                                                    <option value="5">Five</option>
                                                    <option value="6">Six</option>
                                                    <option value="7">Seven</option>
                                                    <option value="8">Eight</option>
                                                    <option value="9">Nine</option>
                                                    <option value="10">Ten</option>
                                                    <option value="11">11 th</option>
                                                    <option value="12">12 th</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Gender :<span style="color:red;">*</span></label>
                                                <select class="form-control" name="s_gender" aria-label="Default select example" >
                                                    <option selected value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="others">Others</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Status :<span style="color:red;">*</span></label>
                                                <select class="form-control" name="s_status" aria-label="Default select example" >
                                                    <option selected value="1">Active</option>
                                                    <option value="2">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label for="">Date Of Birth:<span style="color:red;">*</span></label>
                                                <input type="date" class="form-control" name="s_dob" placeholder="Select Date of Birth" value="" id="">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Religion:<span style="color:red;">*</span></label>
                                                    <select class="form-control" name="s_religion" aria-label="Default select example">
                                                        <option selected value="islam">Islam</option>
                                                        <option value="hindu">Hindu</option>
                                                        <option value="buddish">Buddish</option>
                                                        <option value="cristian">Cristian</option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label for="">Student Phone :<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" name="s_phone" placeholder="Student Phone No" value="" id="">
                                            </div>
                                            </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                        <div class="form-group">
                                                <label for="">Gurdian Name:<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" name="s_gurdian" placeholder="Gurdian Name" value="" id="">
                                        </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Gurdian Phone No:<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" name="s_gurdian_phone" placeholder="Gurdian Phone No" value="" id="">
                                        </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Password:<span style="color:red;">*</span></label>
                                                <input type="password" class="form-control" name="s_password" placeholder="Enetr a Password" value="" id="">
                                        </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                            <input type="file" class="image" name="s_image" >
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <input type="submit" class="btn btn-success btn-block hover" value="Confirm" >
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <div id="add_teacher" class="tab-pane fade">

                            <div class="card-header bg-info shadow-lg text-light">
                                <h5 class="card-title m-0">
                                    Add Teacher
                                </h5>
                            </div>

                            <div class="card-body text-sm">

                                <form action="{{ URL::to('register/teacher')}}" method="post"  enctype="multipart/form-data" >
                                @csrf

                                    <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Name :<span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" name="t_name" placeholder=" Teacher's Name" value="" id="">
                                        </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="">Email :<span style="color:red;">*</span></label>
                                            <input type="email" class="form-control" name="t_email" placeholder="Email" value="" id="">
                                        </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Address :<span style="color:red;">*</span></label>
                                                <textarea class="form-control" name="t_address" ></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">National ID No No:<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" name="t_national_id" placeholder="Enter National id  No" value="" id="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Gender :<span style="color:red;">*</span></label>
                                                <select class="form-control" name="t_gender" aria-label="Default select example">
                                                    <option selected value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="others">Others</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Status :<span style="color:red;">*</span></label>
                                                <select class="form-control" name="t_status" aria-label="Default select example">
                                                    <option selected value="1">Active</option>
                                                    <option value="2">Inactive</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="">Date Of Birth:<span style="color:red;">*</span></label>
                                            <input type="date" class="form-control" name="t_dob" placeholder="Select Date of Birth" value="" id="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Religion:<span style="color:red;">*</span></label>
                                                    <select class="form-control" name="t_religion " aria-label="Default select example">
                                                        <option selected value="islam">Islam</option>
                                                        <option value="hindu">Hindu</option>
                                                        <option value="buddish">Buddish</option>
                                                        <option value="cristian">Cristian</option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label for="">Teachers's Phone No :<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" name="t_phone" placeholder="Teacher's Phone No" value="" id="">
                                            </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Password:<span style="color:red;">*</span></label>
                                                    <input type="password" class="form-control" name="t_password" placeholder="Enetr a Password" value="" id="">
                                            </div>
                                            </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="">Add a Profile Image:<span style="color:red;">*</span></label>
                                            <input type="file" class="image" name="t_image" >
                                            </div>
                                        </div>


                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="">Add Additional Attachment:<span style="color:red;">*</span></label>
                                            <input type="file" class="" name="t_file" >
                                            </div>
                                        </div>
                                        <div class="col-md-2 ">
                                            <div class="form-group">
                                            <input type="submit" class="btn btn-info btn-block" value="Confirm">
                                            </div>
                                        </div>

                                    </div>



                                </form>
                            </div>
                        </div>
                    </div>
                </div>  <!-- Card Body -->
            </div>
        </div>
    </section>


</div>  <!-- Page wrapper -->
@endsection

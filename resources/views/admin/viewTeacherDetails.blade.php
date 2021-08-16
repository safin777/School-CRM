@extends('admin.layouts.adminSidebar')

@section('content')

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="main">
            <div class="row">
                <div class="col-md-4">

                        <div class="card" style="background-color: #e1e5ea">
                            <img src="{{url('../user Image/'.$t_details->t_image)}}" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-title">Teacher Details</h5>
                            <h3>Name:{{$t_details->t_name}}</h3>
                            <h4>Email:{{$t_details->t_email}}</h4>
                            @if ($t_details->t_status == 1)
                            <h4 style="color: green";>Status:Active</h4>
                            @else
                            <h4 style="color: rgb(231, 16, 16)";>Status:Inactive</h4>
                            @endif

                            </div>
                        </div>

                </div>

                <div class="col-lg-8">

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
                    <div class="card" style="background-color: #e1e5ea">
                        <form action="{{URL::to('teacher/details/edit/post/'.$t_details->t_id)}}"  method="post" enctype="multipart/form-data">
                            @csrf
                            {{-- row1 --}}

                            <div class="row mx-auto">
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label for="">Teacher Name :<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="t_name" value="{{$t_details->t_name}}" id="">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label for="">Teacher Email :<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="t_email" value="{{$t_details->t_email}}" id="">
                                    </div>
                                </div>
                            </div>

                            {{-- row2 --}}

                            <div class="row mx-auto">
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label for="">Teacher Address:<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="t_address" value="{{$t_details->t_address}}" id="">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Status :<span style="color:red;">*</span></label>
                                        <select class="form-control" name="t_status" aria-label="Default select example" >
                                            @if ($t_details->t_status==1)
                                            <option selected value="1">Active</option>
                                            <option value="2">Inactive</option>
                                            @else
                                            <option selected value="2">Inactive</option>
                                            <option  value="1">Active</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>

                             {{-- row 3 --}}

                             <div class="row mx-auto">
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label for="">National ID No:<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="t_national_id" value="{{$t_details->t_national_id}}" id="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label for="">Date of Birth:<span style="color:red;">*</span></label>
                                        <input type="date" class="form-control" name="t_dob" value="{{$t_details->t_dob}}" id="">
                                    </div>
                                </div>
                            </div>


                             {{-- row 4 --}}

                             <div class="row mx-auto">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Gender :<span style="color:red;">*</span></label>
                                        <select class="form-control" name="t_gender" aria-label="Default select example" >
                                            @if ($t_details->t_gender=="male")
                                            <option selected value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="others">Others</option>
                                            @elseif ($t_details->t_gender=="female")
                                            <option  value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="others">Others</option>
                                            @else
                                            <option  value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option selected  value="others">Others</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label for="">Teacher's Contact:<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="t_phone" value="{{$t_details->t_phone}}" id="">
                                    </div>
                                </div>
                            </div>



                             {{-- row 5 --}}



                             {{-- row 6 --}}

                                <div class="row mx-auto">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Religion :<span style="color:red;">*</span></label>
                                            <select class="form-control" name="t_religion" aria-label="Default select example" >
                                                @if ($t_details->t_religion=="islam")
                                                <option selected value="islam">Muslim</option>
                                                <option value="hindu">Hindu</option>
                                                <option value="buddish">Busddish</option>
                                                <option value="cristian">Cristian</option>
                                                @elseif ($t_details->t_religion=="hindu")
                                                <option  value="islam">Muslim</option>
                                                <option selected value="hindu">Hindu</option>
                                                <option value="buddish">Busddish</option>
                                                <option value="cristian">Cristian</option>
                                                @elseif($t_details->t_religion=="buddish")
                                                <option  value="islam">Muslim</option>
                                                <option value="hindu">Hindu</option>
                                                <option  selected value="buddish">Busddish</option>
                                                <option value="cristian">Cristian</option>
                                                @else
                                                <option value="islam">Muslim</option>
                                                <option value="hindu">Hindu</option>
                                                <option value="buddish">Busddish</option>
                                                <option selected value="cristian">Cristian</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label for="">Teacher's Password:<span style="color:red;">*</span></label>
                                        <input type="password" class="form-control" name="t_password" value="{{$t_details->t_password}}" id="myInput">
                                        <input type="checkbox" onclick="show_password()">Show Password

                                    </div>
                                </div>
                            </div>

                            {{-- row 8 --}}



                            <div class="row mx-auto">
                                <div class="col-md-5 mx-auto">
                                    <div class="form-group ">
                                    <input type="submit" class="btn btn-success btn-block hover" value="Confirm" >
                                    </div>
                                </div>
                            </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>{{-- container for holding form--}}
</div> {{-- main container end --}}

<script>
    function show_password() {
      var x = document.getElementById("myInput");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
    </script>

@endsection

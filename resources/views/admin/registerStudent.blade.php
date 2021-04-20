@extends('admin.layouts.adminSidebar')

@section('content')
<div class="page-wrapper">
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Add Students</h1>
               @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <h6>{{ $error }}</h6>
                      @endforeach
                  </ul>
              </div>

              @endif

            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Add Student</li>
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
                <div class="col-md-10">
                    <div class="card card-primary  card-outline">
                        <div class="card-header">
                          <h5 class="card-title m-0">Add Student</h5>
                        </div>
                        <div class="card-body text-sm">

                            <form action="{{ URL::to('/office/addBranch')}}" method="post">
                              @csrf

                             <div class="row">
                                <div class="col-md-6">
                                   <div class="form-group">
                                      <label for="">Name :<span style="color:red;">*</span></label>
                                      <input type="text" class="form-control" name="name" placeholder="Name" value="" id="">
                                  </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="">Email :<span style="color:red;">*</span></label>
                                       <input type="text" class="form-control" name="email" placeholder="Email" value="" id="">
                                   </div>
                                 </div>
                             </div>


                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="">Address :<span style="color:red;">*</span></label>
                                  <textarea class="form-control" name="address" ></textarea>

                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                   <label for="">Birth Certificate No:<span style="color:red;">*</span></label>
                                   <input type="text" class="form-control" name="name" placeholder="Name" value="" id="">
                               </div>
                             </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                   <div class="form-group">
                                      <label for=""> Mother's Name:<span style="color:red;">*</span></label>
                                      <input type="text" class="form-control" name="name" placeholder="Name" value="" id="">
                                  </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="">Father's Name :<span style="color:red;">*</span></label>
                                       <input type="text" class="form-control" name="email" placeholder="Email" value="" id="">
                                   </div>
                                 </div>
                             </div>

                             <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Class :<span style="color:red;">*</span></label>
                                        <select class="form-control" name="status" aria-label="Default select example">
                                               <option selected value="1">One</option>
                                               <option value="2">Two</option>
                                        </select>
                                  </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Gender :<span style="color:red;">*</span></label>
                                        <select class="form-control" name="status" aria-label="Default select example">
                                               <option selected value="male">Male</option>
                                               <option value="female">Female</option>
                                               <option value="others">Others</option>
                                        </select>
                                    </div>
                                 </div>

                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Status :<span style="color:red;">*</span></label>
                                        <select class="form-control" name="status" aria-label="Default select example">
                                               <option selected value="1">Active</option>
                                               <option value="2">Inactive</option>
                                        </select>
                                    </div>
                                 </div>
                             </div>

                             <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                       <label for="">Father's Name :<span style="color:red;">*</span></label>
                                       <input type="text" class="form-control" name="email" placeholder="Email" value="" id="">
                                   </div>
                                 </div>

                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Religion:<span style="color:red;">*</span></label>
                                        <select class="form-control" name="status" aria-label="Default select example">
                                               <option selected value="1">Islam</option>
                                               <option value="2">Hindu</option>
                                               <option value="2">Buddish</option>
                                               <option value="2">Cristian</option>

                                        </select>
                                    </div>
                                 </div>
                             </div>




                              <div class="row">
                                <div class="col-md-9">
                                   <div class="form-group">
                                        <label for="">Status :<span style="color:red;">*</span></label>
                                        <select class="form-control" name="status" aria-label="Default select example">
                                               <option selected value="1">Active</option>
                                               <option value="2">Inactive</option>
                                        </select>
                                  </div>
                                </div>
                             </div>






                           <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <input type="submit" class="btn btn-primary btn-block" value="Confirm">
                                </div>
                              </div>
                          </div>






                            </form>
                      </div>
                  </div>
                </div>

</div>

@endsection

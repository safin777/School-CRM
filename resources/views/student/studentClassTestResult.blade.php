@extends('student.studentSidebar')

@section('content')

<div class="page-wrapper">
    <div class="content">

      {{-- PROFILE VIEW WIDGET --}}

        <div class="row">
            <div class="col-md-12 ">
                <div class="card card-widget widget-user">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header info bg-primary">
                    <h3 class="widget-user-username">Name:{{$user_info->s_name}}</h3>
                    <h4 class="widget-user-desc">Student ID:{{$user_info->sid}}</h5>
                    <h4 class="widget-user-desc">Status:Active</h5>
                  </div>

                  <div class="widget-user-image p_image">
                    <img class="rounded-circle profile_img" src="{{url('../user Image/'.$user_info->s_image)}}" alt="User Avatar">
                  </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Search Result</h3>
                </div>
                </div>
            </div>
        </div>


        {{-- Class Test Result Serach --}}
        <?php
        $test_list=DB::table('exam_type')
        ->where('slug',"test")
        ->select()
        ->get();
        ?>
        <div class="row">
            <div class="card-body text-sm">
                <form action="{{ URL::to('search/test/result')}}"  method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mx-auto">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for=""> Select Test Exam :<span style="color:red;">*</span></label>
                                <select class="form-control" name="exam_type_id" aria-label="Default select example" >
                                    <option selected value="0">-- Select Exam --</option>
                                    @foreach ($test_list as $data )
                                    <option value="{{$data->exam_type_id}}">{{$data->exam_type_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <input type="submit" class="btn btn-success btn-block hover mt-5" value="SEARCH" >
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- TABEL  --}}

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Results</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                           <tr>

                              <th>Subject Code</th>
                              <th>Subject Name</th>
                              <th>Exam Type</th>
                              <th>Assigned Teacher</th>
                              <th>Marks</th>
                              <th>Time</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($test_result as $result )
                            <tr>
                                <td>{{$result->subject_code}} </td>
                                <td>{{$result->subject_name}} </td>
                                @if ($result->exam_type_id==1)
                                <td>Class Test-1</td>
                               @elseif($result->exam_type_id==2)
                               <td>Class Test-2</td>
                              @endif
                                <td>{{$result->t_name}}</td>
                                <td>{{$result->marks}}</td>
                                <td>{{$result->timestamp}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection


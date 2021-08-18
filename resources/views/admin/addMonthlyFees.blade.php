@extends('admin.layouts.adminSidebar')

@section('content')

<div class="page-wrapper">
    <div class="container-fluid">

        <div class="row mx-auto">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Add Monthly Fees</h1>
            </div>

            <div class="col-sm-6 ">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Monthly Fee</li>
                </ol>
            </div>
        </div>                                         {{-- page top title header --}}

        <div class="row">
            <div class="card-body text-sm">

                <form action="{{ URL::to('monthly/fee/add')}}"  method="post" enctype="multipart/form-data">
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
                                <label for=""> Student ID:<span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="sid" value="" id="">
                            </div>
                        </div>

                        <div class="col-sm-4">

                            <div class="form-group">
                                <label for=""> Month :<span style="color:red;">*</span></label>
                                <select class="form-control" name="month_id" aria-label="Default select example" >
                                    <option selected value="0">--Select Month--</option>
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                        </div>
                    </div>                               {{--Row 1--}}


                    <div class="row mx-auto">
                        <div class="col-sm-9">
                                {{-- Reciept title section --}}

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group ">
                                            <label for="">Total Amount:<span style="color:red;">*</span></label>
                                            <input  type="text" class="form-control " name="total_amount" value="" id="total_amount">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group ">
                                            <label for="">Paid Amount:<span style="color:red;">*</span></label>
                                            <input onkeyup="dueAmount()" type="text" class="form-control" name="paid_amount" value="" id="paid_amount">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group ">
                                            <label for="">Due Amount:<span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" name="due_amount" value=""  id="due_amount">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="form-group ">

                                         <input type="submit" class="btn btn-success btn-block hover" value="Pay Fee" >
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group ">
                                            <a href="#" class="btn btn-md btn-danger hover"><i class="fa fa-backward" aria-hidden="true"></i> &nbsp; Cancel</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>    {{--Row 2--}}


                </form>
            </div>
        </div>
    </div>{{-- container for holding form--}}
</div> {{-- main container end --}}


<script type="text/javascript">
    function dueAmount(){
        var total = document.getElementById('total_amount').value;
        var paid = document.getElementById('paid_amount').value;
        var due = 0;
        due = total - paid;
        document.getElementById('due_amount').value = due;
    }
    </script>


@endsection

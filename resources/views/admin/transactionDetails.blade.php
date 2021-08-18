@extends('admin.layouts.adminSidebar')

@section('content')
<div class="page-wrapper">
    <div class="container-fluid">

        <div class="row mx-auto">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Update Transaction</h1>
            </div>

            <div class="col-sm-6 ">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Update Transaction</li>
                </ol>
            </div>
        </div>                                         {{-- page top title header --}}

        <div class="row">
            <div class="card-body text-sm">

                <form action="{{ URL::to('transaction/edit/post')}}"  method="post" enctype="multipart/form-data">
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
                                <input type="text" class="form-control" name="sid" value="{{$transactions->sid}}" id="">
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for=""> Transaction Type :<span style="color:red;">*</span></label>
                                <select class="form-control" name="trans_type" aria-label="Default select example" >
                                    @if($transactions->trans_type == "registration fee")
                                    <option selected value="registration fee">Registration Fee</option>
                                    <option value="examination fee">Examination Fee</option>
                                    <option value="monthly fee">Monthly Fee</option>
                                    @elseif ($transactions->trans_type == "examination fee")
                                    <option  value="registration fee">Registration Fee</option>
                                    <option selected value="examination fee">Examination Fee</option>
                                    <option value="monthly fee">Monthly Fee</option>
                                    @else
                                    <option  value="registration fee">Registration Fee</option>
                                    <option  value="examination fee">Examination Fee</option>
                                    <option selected value="monthly fee">Monthly Fee</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mx-auto">
                        <div class="col-sm-12">
                                {{-- Reciept title section --}}
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group ">
                                            <label for="">Total Amount:<span style="color:red;">*</span></label>
                                            <input  type="text" class="form-control " name="total_amount" value="{{$transactions->total_amount}}" id="total_amount">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group ">
                                            <label for="">Paid Amount:<span style="color:red;">*</span></label>
                                            <input onkeyup="dueAmount()" type="text" class="form-control" name="paid_amount" value="{{$transactions->paid_amount}}" id="paid_amount">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group ">
                                            <label for="">Due Amount:<span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" name="due_amount"  value="{{$transactions->due_amount}}"  id="due_amount">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group ">
                                            <label for="">Transaction ID:<span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" name="trans_id" value="{{$transactions->trans_id}}" readonly >
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="form-group ">

                                         <input type="submit" onclick="return confirm('Are you sure to update?')" class="btn btn-success btn-block hover" value="Update" >
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

@extends('admin.layouts.adminSidebar')
@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row mx-auto">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Add Registration Fees</h1>
            </div>
            <div class="col-sm-6 ">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Registration Fee</li>
                </ol>
            </div>
        </div>                                         {{-- page top title header --}}
        <div class="row">
            <div class="card-body text-sm">
                <form action="{{ URL::to('admission/fee/add')}}"  method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mx-auto">
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
                                <input type="number" class="form-control" name="sid" value="" id="">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for=""> Class :<span style="color:red;">*</span></label>
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
                                    <option value="11">Eleven</option>
                                    <option value="12">Twelve</option>
                                </select>
                            </div>
                        </div>
                    </div>                               {{--Row 1--}}
                    <div class="row mx-auto">
                        <div class="col-sm-9">
                            <div class="form-group ">
                                <label for=""> Fees Description :<span style="color:red;">*</span></label>
                                <div class="row feebox">
                                    {{-- Admission Fee: --}}
                                    <div class="col-sm-4">
                                        <div class="form-group  ">
                                            <label for=""> Admission Fee:<span style="color:red;">*</span></label>
                                            <input  onblur ="findTotal()" type="text"  class="form-control fees" name="admission_fee" value="" ">
                                        </div>
                                    </div>
                                     {{-- Activity Fee: --}}
                                    <div class="col-sm-4">
                                        <div class="form-group ">
                                            <label for=""> Activity Fee:<span style="color:red;">*</span></label>
                                            <input   onblur="findTotal()" type="text"  class="form-control fees" name="activity_fee" value=""  >
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group ">
                                            <label for=""> Development Fee:<span style="color:red;">*</span></label>
                                            <input  onblur="findTotal()" type="text" class="form-control fees" name="development_fee" value="" >
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group ">
                                            <label for="">Miscelenious Fee:<span style="color:red;">*</span></label>
                                            <input onblur="findTotal()" type="text"   class="form-control fees" name="miscelenious_fee" value="" >
                                        </div>
                                    </div>
                                </div>

                                {{-- Reciept title section --}}

                                <div class="row mx-auto rec_title">
                                    <label for=""> Reciept Section:<span style="color:red;">*</span></label>
                                </div>


                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group ">
                                            <label for="">Total Amount:<span style="color:red;">*</span></label>
                                            <input   type="text" class="form-control" name="total_amount" value=""  id="total_amount">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group ">
                                            <label for="">Paid Amount:<span style="color:red;">*</span></label>
                                            <input type="text" onblur="dueAmount()"  class="form-control " name="paid_amount" value=""  id="paid_amount">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group ">
                                            <label for="">Due Amount:<span style="color:red;">*</span></label>
                                            <input  type="text"  class="form-control" name="due_amount" value=""  id="due_amount">
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

                                    <script type="text/javascript">
                                        function findTotal(){
                                        var arr = document.getElementsByClassName('fees');
                                        var tot=0;
                                        for(var i=0;i<arr.length;i++){
                                            if(parseInt(arr[i].value))
                                                tot += parseInt(arr[i].value);
                                        }
                                        document.getElementById('total_amount').value = tot;
                                    }

                                    function dueAmount(){
                                        var total = document.getElementById('total_amount').value;
                                        var paid = document.getElementById('paid_amount').value;
                                        var due = 0;

                                        due = total - paid;
                                        document.getElementById('due_amount').value = due;
                                    }
                                     </script>
                                </div>
                            </div>
                        </div>
                    </div>    {{--Row 2--}}
                </form>
            </div>
        </div>
    </div>{{-- container for holding form--}}
</div> {{-- main container end --}}

@endsection

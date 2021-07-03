@extends('student.studentSidebar')

@section('content')

<div class="page-wrapper">
    @foreach ($all_notice as $data )

    <div class="content ">
        <div class="row">
            <div class="noticeBox">
                <h5>{{$data->timestamp}}</h5>
                <h3>{{$data->n_title}}</h3>
                <p> {{$data->n_description}}</p>
            </div>
        </div>
    </div>

    @endforeach
</div>

{{-- <script>
    function readMore(){
        var dots= document.getElementById("dots");
        var moreTxt= document.getElementById("more");
        var readMoreBtn= document.getElementById("readMorebtn");

        if(dots.style.display=="none"){
            dots.style.display = "inline";
            readMoreBtn.innerHTML ="Read more...";
            moreTxt.style.display="none";
        }else{
            dots.style.display="none";
            readMoreBtn.innerHTML ="Read less...";
            moreTxt.style.display="inline";

        }

    }


</script> --}}

@endsection

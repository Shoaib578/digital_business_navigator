@extends('main.layout.index')

@section('content')

<div style="display:flex;flex-direction:row;padding:20px;margin-left:20px;">
    <div style="width:80px;background-color:green;border:1px solid green;border-radius:10px;padding:10px;">
        <small style="color:white;">points</small>
     
        <p  style="font-weight:bold;color:white;">{{ $user_points}}</p>
        </div>

        <div style="width:80px;background-color:green;border:1px solid green;border-radius:10px;padding:10px;margin-left:10px;">
        <small style="color:white;">level</small>
           
            <p  style="font-weight:bold;color:white;">{{ auth()->user()->level}}</p>
            </div>
</div>

<div style="padding:10px;display:flex;flex-direction:row;flex-wrap:wrap;">

@foreach ($services as $service )
    
<div style="padding:10px;border:1px solid gray;border-radius:10px;margin-left:30px;width:300px;margin-top:20px">
    <img src="main/images/service.png" alt="" style="width:100%;height:150px">

<hr>
<h2>{{ $service->title }}</h2>
<a href="{{ route('main_view_service',$service->id) }}" class="btn btn-primary" style="width: 100%;">Start</a>
</div>
@endforeach

</div>





@endsection
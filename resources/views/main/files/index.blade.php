@extends('main.layout.index')

@section('content')

<br>
<br>
<div style="padding:20;display:flex;flex-direction:row;">

@foreach ($files as $file )
    
<div style="padding:70px;padding:10px;border:1px solid gray;border-radius:10px;margin-left:30px">
<img src="main/images/file.jpg" alt="" style="width:100%;height:150px">
<hr>
<h2>{{ $file->title }}</h2>
<a href="{{$host.'/files/'.$file->file_name}}" class="btn btn-primary" style="width: 100%;">Download</a>
</div>
@endforeach

</div>

@endsection

@extends('admin.layout.index')


@section('content')
<div class="modal-body">
    <form action="{{ route('create_news_events') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6 mb-2">
            <input class="form-control " name="title" type="text" style = "color:#2e7eed"placeholder="Title" required>
        </div>


        <div class="col-md-6 mb-2">
            <textarea class="form-control " name="description"  style = "color:#2e7eed"placeholder="Description..." required></textarea>
        </div>


        <div class="col-md-6 mb-2">
            <input class="form-control " name="image" type="file" style = "color:#2e7eed"placeholder="Title" required>
        </div>

        <button class="btn btn-primary" type="submit">Submit</button>
    </form>

</div>

@endsection
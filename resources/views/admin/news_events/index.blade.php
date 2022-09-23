
@extends('admin.layout.index')


@section('content')

<div class="container-fluid pt-4 px-4">

    <div class="bg-secondary text-center rounded p-4">
        <a href="{{ route('create_news_events') }}" class="btn btn-primary" style="float: right" >Add+</a>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                       
                        <th scope="col">Title</th>
                        <th scope="col">image</th>
                        
                       
                        
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($news_events as $news_event)
                        <tr>
                            <td>{{ $news_event->title }}</td>
                            <td>
                                <img src="{{ $host.'/images/'.$news_event->image }}" style="width: 130px;height: 100px;"/>
                            </td>

                            <td>
                               

                                <a href="{{ route('delete_news',$news_event->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</div>






    


@endsection


<!-- Recent Sales End -->
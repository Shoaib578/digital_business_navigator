@extends('admin.layout.index')

@section('content')

  <!-- Recent Sales Start -->
  <div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <a href="{{ route('create_service') }}" class="btn btn-primary" style="float: right">Create+</a>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th scope="col">Service ID</th>
                       
                        <th scope="col">Service</th>
                        
                       
                        
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($services as $service)
                        <tr>
                            <td>{{ $service->id }}</td>

                            <td>{{ $service->title }}</td>
                            
                            <td>
                                <a href="{{ route("view_service",$service->id) }}" class="btn btn-primary">View</a>

                                <a href="{{ route("delete_service",$service->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</div>



<!-- Recent Sales End -->
@endsection
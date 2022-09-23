@extends('admin.layout.index')

@section('content')

  <!-- Recent Sales Start -->
  <div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                       
                        <th scope="col">User ID</th>
                        
                        <th scope="col">Service ID</th>
                       
                        
                      
                    </tr>
                </thead>
                <tbody>

                    @foreach ($owned_services as $owned_service)
                        <tr>
                            <td>{{ $owned_service->user_id }}</td>
                            <td>{{ $owned_service->service_id }}</td>

                           
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</div>



<!-- Recent Sales End -->
@endsection
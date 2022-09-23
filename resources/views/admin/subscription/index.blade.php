@extends('admin.layout.index')

@section('content')

  <!-- Recent Sales Start -->
  <div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <a href="{{ route('admin_create_subscription') }}" class="btn btn-primary" style="float: right">Create+</a>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th scope="col">Subscription ID</th>
                       
                        <th scope="col">Price</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Title</th>
                       
                        
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($subscriptions as $subscription)
                  <tr>
                    <td>{{ $subscription->id }}</td>

                    <td>{{ $subscription->price }}</td>
                    <td>{{ $subscription->duration }}</td>
                    <td>{{ $subscription->title }}</td>
                    <td>

                        <a href="{{ route('delete_subscription',$subscription->id) }}" class="btn btn-danger">Delete</a>
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
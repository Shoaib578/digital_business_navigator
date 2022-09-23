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
                        
                        <th scope="col">Subscription ID</th>
                       
                        
                      
                    </tr>
                </thead>
                <tbody>

                    @foreach ($owned_subs as $owned_sub)
                        <tr>
                            <td>{{ $owned_sub->user_id }}</td>
                            <td>{{ $owned_sub->subscription_id }}</td>

                           
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</div>



<!-- Recent Sales End -->
@endsection
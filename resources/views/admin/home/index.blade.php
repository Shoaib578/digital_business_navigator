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
                       
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Level</th>
                        <th scope="col">Points</th>

                        <th scope="col">Status</th>
                        
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                    
                        <td>{{ $user->company_name }}</td>
                        <td>{{ $user->level }}</td>
                        <td>{{ $user->points }}</td>

                        @if($user->is_activated >0)
                        <td>Activated</td>
                        
                        @else
                        <td>Deactivated</td>

                        @endif

                        <td><a class="btn btn-sm btn-success" href="{{ route('activate_user',$user->id) }}">Activate</a>
                            <a class="btn btn-sm btn-danger" href="{{ route('deactivate_user',$user->id) }}">Deactivate</a>
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
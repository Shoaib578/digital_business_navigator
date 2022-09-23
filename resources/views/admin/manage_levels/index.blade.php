<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@extends('admin.layout.index')


@section('content')

  <!-- Recent Sales Start -->
  <div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary" style="float: right">Add+</a>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                       
                        <th scope="col">Level</th>
                        
                        <th scope="col">Required Points</th>
                       
                        
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($levels as $level)
                        <tr>
                            <td>{{ $level->level }}</td>
                            <td>{{ $level->required_points }}</td>
                            
                            <td>
                               

                                <a href="{{ route("delete_manage_levels",$level->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</div>




<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Level</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            <form action="{{ route('add_level') }}" method="POST">
            @csrf
           <input type="number" name="level" class="form-control" placeholder="Level">
           <br>
           <input type="number" name="required_points" class="form-control" placeholder="Required Points">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

        </form>
      </div>
    </div>
  </div>

<!-- Recent Sales End -->

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endsection
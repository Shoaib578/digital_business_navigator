


@extends('admin.layout.index')

@section('content')


  <!-- Recent Sales Start -->
  <div class="container-fluid pt-4 px-4">

    <div class="bg-secondary text-center rounded p-4">
       
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                       
                        <th scope="col">Answer</th>
                        
                       
                        
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($answers as $answer)
                        <tr>
                            <td> {{ $answer->answer }}</td>

                            <td>
                                <a href="{{ route('delete_answer',$answer->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</div>

@endsection
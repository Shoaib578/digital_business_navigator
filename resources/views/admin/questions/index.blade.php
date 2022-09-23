@extends('admin.layout.index')

@section('content')

  <!-- Recent Sales Start -->
  <div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <a href="{{ route('create_question') }}" class="btn btn-primary" style="float: right">Create+</a>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                       
                        <th scope="col">Question</th>
                        
                       
                        
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($questions as $question)
                        <tr>
                            <td> <a href="{{ route("view_question",$question->question_id) }}">{{ $question->question }}</a></td>
                            
                            <td>
                               

                                <a href="{{ route("delete_question",$question->question_id) }}" class="btn btn-danger">Delete</a>
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
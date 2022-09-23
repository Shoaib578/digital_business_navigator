@extends('admin.layout.index')

@section('content')

<section class="contact-form section">
	<div class="container">
		<div class="row">
            <br>
			<div class="col-12">
				<h2 class="mb-5 text-center" style="color:#2e7eed">Create Answer</h2>
			</div>
			<div class="col-12">
				<form action="{{ route('create_answer') }}" method="post">
                    @csrf
					<div class="row">
						<!-- Name -->
						<div class="col-md-6 mb-2">
							<input class="form-control " name="answer" type="text" style = "color:#2e7eed"placeholder="Answer...." required>
						</div>

						<div class="col-md-6 mb-2">
							<input class="form-control " name="points" type="number" style = "color:#2e7eed" placeholder="Points" required>
						</div>

						<div class="col-md-6 mb-2">
							<select class="form-control" style = "color:#2e7eed;background-color:black" name="question" required>
								<option value="">Select Questions</option>
								@foreach ($questions as $question )
									<option value="{{ $question->question_id }}">{{ $question->question }}</option>
								@endforeach
							</select>
						</div>
						
						<!-- Submit Button -->
						<div class="col-12 text-right">
							<button class="btn btn-primary" style="background-color:#2e7eed;border-color:#2e7eed">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection
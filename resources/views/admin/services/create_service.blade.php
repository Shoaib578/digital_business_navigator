@extends('admin.layout.index')

@section('content')

<section class="contact-form section">
	<div class="container">
		<div class="row">
            <br>
			<div class="col-12">
				<h2 class="mb-5 text-center" style="color:#2e7eed">Create Service</h2>
			</div>
			<div class="col-12">
				<form action="{{ route('create_service') }}" method="post">
                    @csrf
					<div class="row">
						<!-- Name -->
						<div class="col-md-6 mb-2">
							<input class="form-control " name="title" type="text" style = "color:#2e7eed" placeholder="Title" required>
						</div>

                        <div class="col-md-6 mb-2">
							<input class="form-control " name="level_required" type="number" style = "color:#2e7eed" placeholder="Level Required" required>
						</div>
                       
 						<div class="col-md-6 mb-2">
							<input class="form-control " name="price" type="number" style = "color:#2e7eed" placeholder="price in $...." required>
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
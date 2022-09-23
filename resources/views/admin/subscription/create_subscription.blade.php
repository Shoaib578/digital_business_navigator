@extends('admin.layout.index')

@section('content')

<section class="contact-form section">
	<div class="container">
		<div class="row">
            <br>
			<div class="col-12">
				<h2 class="mb-5 text-center" style="color:#2e7eed">Create Subscription</h2>
			</div>
			<div class="col-12">
				<form action="{{ route('admin_create_subscription') }}" method="post">
                    @csrf
					<div class="row">
						<!-- Name -->
						<div class="col-md-6 mb-2">
							<input class="form-control " name="title" type="text" style = "color:#2e7eed"placeholder="Title" required>
						</div>
						<!-- Email -->
						<div class="col-md-6 mb-2">
							<input class="form-control " type="number" name="price" style="color:#2e7eed" placeholder="Price in $" required>
						</div>
						<!-- subject -->
						<div class="col-md-12 mb-2">
							<input class="form-control " style="color:#2e7eed;" name="duration" type="number" placeholder="Duration in days" required>
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
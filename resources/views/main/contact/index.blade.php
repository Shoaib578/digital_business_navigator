@extends('main.layout.index')

@section('content')

<!--====  End of Address and Map  ====-->
<section class="contact-form section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="mb-5 text-center">Drop us a mail</h2>
			</div>
			<div class="col-12">
				<form action="{{ route('contact_us') }}" method="POST">
					
					@csrf
					
					<div class="row">
						<!-- Name -->
						
					
						<div class="col-md-12 mb-2">
							<input class="form-control main" name="name" type="text" style="color:#0096FF" placeholder="Name" required>
						</div>

						<div class="col-md-6 mb-2">
							<input class="form-control main" type="text" placeholder="Title" name="title"style="color:#0096FF" required>
						</div>
						<!-- Email -->
						<div class="col-md-6 mb-2">
							<input class="form-control main" type="email" name="email"style="color:#0096FF" placeholder="Your Email Address" required>
						</div>
						<!-- subject -->
						<div class="col-md-12 mb-2">
							<input class="form-control main" name="subject" type="text" style="color:#0096FF" placeholder="Subject" required>
						</div>

						
						<!-- Message -->
						<div class="col-md-12 mb-2">
							<textarea class="form-control main"  name="message" style="color:#0096FF" rows="10" placeholder="Your Message"></textarea>
						</div>
						<!-- Submit Button -->
						<div class="col-12 text-right">
							<button class="btn btn-main-md">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

@endsection
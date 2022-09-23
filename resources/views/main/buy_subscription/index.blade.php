@extends('main.layout.index')

@section('content')
<br>
<br>
<br>

<div class="container">
	<div class="card-deck mb-3 text-center">

        @foreach ($subscriptions as $sub )
            
		<div class="card mb-4 shadow-sm">
			<div class="card-header">
				<h4 class="my-0 font-weight-normal">{{ $sub->title }}</h4>
			</div>

			<div class="card-body">
				<h1 class="card-title pricing-card-title">${{ $sub->price }} <small class="text-muted">/ {{ $sub->duration }} Days</small></h1>
				
				<a href="{{ route('BuySubscriptioncheckout',[$sub->price,$sub->id]) }}" class="btn btn-primary lg btn-block btn-outline-primary" style="color:white">Buy Now</a>
			</div>
		</div>


        
        @endforeach
		
		
	</div>
</div>

@endsection
@extends('main.layout.index')

@section('content')


@foreach ($news_events as $news)
	
<section class="section featured-article">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<article class="featured">
					<!-- Image -->
					<div class="image">
						<img class="img-fluid" src="{{ $host.'/images/'.$news->image }}" alt="featured-article">
						
					</div>
					<!-- written-content -->
					<div class="content">
						<!-- Post Title -->
						<h2>{{ $news->title }}</h2>
						<!-- Tags -->
						<ul class="list-inline post-tag">
							<li class="list-inline-item">
								<img class="img-fluid" src="main/images/testimonial/feature-testimonial-thumb.jpg" alt="author-thumb">
							</li>
							<li class="list-inline-item">
								<a href="#">Admin</a>
							</li>
							<li class="list-inline-item">
								{{$news->created_at}}
							</li>
						</ul>
						<!-- Post Body -->
						<p>{{$news->description}}</p>
						
					</div>
				</article>
			</div>
		</div>
	</div>
</section>
@endforeach



@endsection
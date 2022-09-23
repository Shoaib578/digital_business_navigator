@extends('main.layout.index')

@section('content')


<!--====================================
=            Hero Section            =
=====================================-->
<section class="section gradient-banner">
	<div class="shapes-container">
		<div class="shape" data-aos="fade-down-left" data-aos-duration="1500" data-aos-delay="100"></div>
		<div class="shape" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="100"></div>
		<div class="shape" data-aos="fade-up-right" data-aos-duration="1000" data-aos-delay="200"></div>
		<div class="shape" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200"></div>
		<div class="shape" data-aos="fade-down-left" data-aos-duration="1000" data-aos-delay="100"></div>
		<div class="shape" data-aos="fade-down-left" data-aos-duration="1000" data-aos-delay="100"></div>
		<div class="shape" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="300"></div>
		<div class="shape" data-aos="fade-down-right" data-aos-duration="500" data-aos-delay="200"></div>
		<div class="shape" data-aos="fade-down-right" data-aos-duration="500" data-aos-delay="100"></div>
		<div class="shape" data-aos="zoom-out" data-aos-duration="2000" data-aos-delay="500"></div>
		<div class="shape" data-aos="fade-up-right" data-aos-duration="500" data-aos-delay="200"></div>
		<div class="shape" data-aos="fade-down-left" data-aos-duration="500" data-aos-delay="100"></div>
		<div class="shape" data-aos="fade-up" data-aos-duration="500" data-aos-delay="0"></div>
		<div class="shape" data-aos="fade-down" data-aos-duration="500" data-aos-delay="0"></div>
		<div class="shape" data-aos="fade-up-right" data-aos-duration="500" data-aos-delay="100"></div>
		<div class="shape" data-aos="fade-down-left" data-aos-duration="500" data-aos-delay="0"></div>
	</div>
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 order-2 order-md-1 text-center text-md-left">
				<h1 class="text-white font-weight-bold mb-4">Find out </h1>
				<p class="text-white mb-5">how digital ready your business is
					by taking a Digital business navigator Service!</p>
				<a href="{{ route('get_start') }}" class="btn btn-main-md">Get Start</a>
			</div>
			<div class="col-md-6 text-center order-1 order-md-2">
				<img class="img-fluid" src="main/images/mobile.png" alt="screenshot">
			</div>
		</div>
	</div>
</section>
<!--====  End of Hero Section  ====-->










<!--==================================
=            Feature Grid            =
===================================-->
<section class="feature section pt-0">
	<div class="container">
		<br>
		<br>
		<div class="row">
			<div class="col-lg-6 ml-auto justify-content-center">
				<!-- Feature Mockup -->
				<div class="image-content" data-aos="fade-right">
					<img class="img-fluid" src="main/images/levels.png" style="height:300px;" alt="iphone">
				</div>
			</div>

			<div class="col-lg-6 mr-auto align-self-center">
				<div class="feature-content">
					<!-- Feature Title -->
					<h2>Plan Your Journey to Digital Business Success</h2>
					<!-- Feature Description -->
					<p class="desc">Digital Readiness Level Tool (Digital business navigator) shares the same principles as Technology Readiness Level (TRL) and Manufacturing Readiness Level (MRL).

						Digital business navigator benchmarks your readiness to make the most of digital technologies, and helps you prioritise the steps along your journey to digital maturity. You can compare your digital readiness with other companies of similar size, sector and region, all in an anonymised way.
						
						Then Digital business navigator.org, the cross-industry not-for-profit company set up to govern the Digital business navigator, can help you find the right professional advice and support for your digital journey towards being a Digital Champion</p>
				</div>
				<!-- Testimonial Quote -->
				<div class="testimonial">
					<p>
						"InVision is a window into everything that's being designed at Twitter. It gets all of our best work in one
						place."
					</p>
					<ul class="list-inline meta">
						<li class="list-inline-item">
							<img src="main/images/testimonial/feature-testimonial-thumb.jpg" alt="">
						</li>
						<li class="list-inline-item">Jonathon Andrew , Themefisher.com</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="feature section pt-0">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 ml-auto align-self-center">
				<div class="feature-content">
					<!-- Feature Title -->
					<h2>How Digitally Ready is your business? </h2>
					<!-- Feature Description -->
					<p>Are you ready to find out more about your digital readiness and start planning your journey to being a Digital Champion? Create your own "My Digital business navigator" account now to take the Digital business navigator Questionnaire, benchmark your company against others and share results with your colleagues and partners.</p>
				</div>
				<!-- Testimonial Quote -->
				<a href="FAQ.html" class="btn btn-main-md">Register</a>
			</div>
			<div class="col-lg-6 mr-auto justify-content-center">
				<!-- Feature mockup -->
				<div class="image-content" data-aos="fade-left">
					<img class="img-fluid" src="main/images/bars.png" alt="ipad">
				</div>
			</div>
		</div>
	</div>
</section>
<!--====  End of Feature Grid  ====-->




<!--==============================
=            Services            =
===============================-->
<section class="service section bg-gray">
	<div class="container-fluid p-0">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title">
					<h2>Need to get in touch?</h2>
					<p>Want to know more about the Digital business navigator but not sure where to start? Please contact our team and we’ll be happy to answer your questions and assist your journey!</p>
		

					<br>
					<a href="{{ route('contact_us') }}" class="btn btn-main-md">Contact Now</a>
				
				</div>
			</div>
		</div>
		

	</div>
</section>
<!--====  End of Services  ====-->





<!--=================================
=            Testimonial            =
==================================-->
<section class="section testimonial" id="testimonial">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<!-- Testimonial Slider -->
				<div class="testimonial-slider owl-carousel owl-theme">
					<!-- Testimonial 01 -->
					<div class="item">
						<div class="block shadow">
							<!-- Speech -->
							<p>
								Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec sollicitudin molestie malesuada.
								Donec sollicitudin molestie malesuada. Pellentesque in ipsum id orci porta dapibus. Lorem ipsum dolor
								sit amet, consectetur adipiscing elit. Pellentesque in ipsum id orci porta dapibus. Quisque velit nisi,
								pretium ut lacinia in, elementum id enim.
							</p>
							<!-- Person Thumb -->
							<div class="image">
								<img src="main/images/testimonial/feature-testimonial-thumb.jpg" alt="image">
							</div>
							<!-- Name and Company -->
							<cite>Abraham Linkon , Themefisher.com</cite>
						</div>
					</div>
					<!-- Testimonial 01 -->
					<div class="item">
						<div class="block shadow">
							<!-- Speech -->
							<p>
								Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec sollicitudin molestie malesuada.
								Donec sollicitudin molestie malesuada. Pellentesque in ipsum id orci porta dapibus. Lorem ipsum dolor
								sit amet, consectetur adipiscing elit. Pellentesque in ipsum id orci porta dapibus. Quisque velit nisi,
								pretium ut lacinia in, elementum id enim.
							</p>
							<!-- Person Thumb -->
							<div class="image">
								<img src="main/images/testimonial/feature-testimonial-thumb.jpg" alt="image">
							</div>
							<!-- Name and Company -->
							<cite>Abraham Linkon , Themefisher.com</cite>
						</div>
					</div>
					<!-- Testimonial 01 -->
					<div class="item">
						<div class="block shadow">
							<!-- Speech -->
							<p>
								Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec sollicitudin molestie malesuada.
								Donec sollicitudin molestie malesuada. Pellentesque in ipsum id orci porta dapibus. Lorem ipsum dolor
								sit amet, consectetur adipiscing elit. Pellentesque in ipsum id orci porta dapibus. Quisque velit nisi,
								pretium ut lacinia in, elementum id enim.
							</p>
							<!-- Person Thumb -->
							<div class="image">
								<img src="main/images/testimonial/feature-testimonial-thumb.jpg" alt="image">
							</div>
							<!-- Name and Company -->
							<cite>Abraham Linkon , Themefisher.com</cite>
						</div>
					</div>
					<!-- Testimonial 01 -->
					<div class="item">
						<div class="block shadow">
							<!-- Speech -->
							<p>
								Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec sollicitudin molestie malesuada.
								Donec sollicitudin molestie malesuada. Pellentesque in ipsum id orci porta dapibus. Lorem ipsum dolor
								sit amet, consectetur adipiscing elit. Pellentesque in ipsum id orci porta dapibus. Quisque velit nisi,
								pretium ut lacinia in, elementum id enim.
							</p>
							<!-- Person Thumb -->
							<div class="image">
								<img src="main/images/testimonial/feature-testimonial-thumb.jpg" alt="image">
							</div>
							<!-- Name and Company -->
							<cite>Abraham Linkon , Themefisher.com</cite>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--====  End of Testimonial  ====-->



<!--============================
=            Footer            =
=============================-->
<footer>
    <div class="footer-main">
      <div class="container">
        <div class="row">
          
        
          <div class="col-lg-2 col-md-3 col-6 mt-5 mt-lg-0">
            <div class="block-2">
              <!-- heading -->
              <h6>Resources</h6>
              <!-- links -->
              <ul>
                <li><a href="{{ route('auth') }}">Singup</a></li>
                <li><a href="{{ route('auth') }}">Login</a></li>
                <li><a href="{{ route('news_events') }}">Blog</a></li>
              </ul>
            </div>
          </div>
          
          <div class="col-lg-2 col-md-3 col-6 mt-5 mt-lg-0">
            <div class="block-2">
              <!-- heading -->
              <h6>Company</h6>
              <!-- links -->
              <ul>
                <li><a href="{{ route('about')  }}">About</a></li>
                <li><a href="{{ route('contact_us') }}">Contact</a></li>
               
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="text-center bg-dark py-4">
      <small class="text-secondary">Copyright &copy; <script>document.write(new Date().getFullYear())</script>. Designed &amp; Developed by <a href="https://themefisher.com/">Themefisher</a></small class="text-secondary">
    </div>
  
     
  </footer>
  
@endsection
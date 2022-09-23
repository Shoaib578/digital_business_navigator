@extends('main.layout.index')

@section('content')
<section class="section page-title">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 m-auto">
				<!-- Page Title -->
				<h1>Terms and Conditions</h1>
				<!-- Page Description -->
				
			</div>
		</div>
	</div>
</section>

<section class="privacy section pt-0">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<nav class="privacy-nav">
					<ul>
						<li><a class="nav-link scrollTo" href="#userLicense" class="scrollTo">Privacy Policy</a></li>
						<li><a class="nav-link scrollTo" href="#disclaimer" class="scrollTo">Who are we?</a></li>
						<li><a class="nav-link scrollTo" href="#limitations" class="scrollTo">What type of information is collected from you?</a></li>
						<li><a class="nav-link scrollTo" href="#governigLaw" class="scrollTo">access to your information</a></li>
					</ul>
				</nav>
			</div>
			<div class="col-lg-9">
				<div class="block">
					<!-- User License -->
					<div id="userLicense" class="policy-item">
						<div class="title">
							<h3>Privacy Policy</h3>
						</div>
						<div class="policy-details">
							<p>At Digitalbusinessnavigator.org, we’re committed to protecting and respecting your privacy. This Policy explains when and why we collect personal information about people who engage with us, how we use it, the conditions under which we may disclose it to others and how we keep it secure.</p>
							<p>We may change this Policy from time to time so please check this page occasionally to ensure that you’re happy with any changes. If your information is on our records, we will alert you to any changes made, via email. By engaging with us, you’re agreeing to be bound by this Policy.</p>
							
						
                        </div>
					</div>
					<!-- Disclaimer -->
					<div id="disclaimer" class="policy-item">
						<div class="title">
							<h3>Who are we?</h3>
						</div>
						<div class="policy-details">
							<p>We’re Digitalbusinessnavigator.org, an independent community interest company dedicated to providing a digital readiness assessment.</p>
						</div>
					</div>
					<!-- Limitations -->
					<div id="limitations" class="policy-item">
						<div class="title">
							<h3>What type of information is collected from you?</h3>
						</div>
						<div class="policy-details">
							<p>The personal information we collect might include your name, address, email address, company name, IP address, and information regarding what pages are accessed via our website and when. We will collect and store your DRL responses to questions for use in future internal analysis. DRL-Tool.org will collect and retain information submitted for eventual use in the activities mentioned below.</p>
						</div>
					</div>
					<!-- Governing Law -->
					<div id="governigLaw" class="policy-item">
						<div class="title">
							<h3>Who has access to your information?</h3>
						</div>
						<div class="policy-details">
							<p>Without your express written permission, we will not:
                            </p>
							<p>Sell or rent your information to third parties
                            </p>

                            <p>Share your information with third parties for marketing purposes.
                            </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


@endsection
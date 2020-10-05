@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
	{{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.car-background')

<section id="about-sms">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title mb-3">
					<h2>About Ecarkhana</h2>
					<div class="separator"></div>
				</div>
			</div>
			<div class="col-md-12">
				<p class="text-justify">
					Ecarkhana.com is Bangladesh's leading car search venture that helps users buy cars that are right for them. Its website and app carry rich automotive content such as expert reviews, detailed specs and prices, comparisons as well as videos and pictures of all car brands and models available in Bangladesh. The company has tie-ups with many auto manufacturers, more than 4000 car dealers and numerous financial institutions to facilitate the purchase of vehicles.
				</p>
			</div>

			<div class="col-md-6">
				<p class="text-justify">
					Ecarkhana.com has launched many innovative features to ensure that users get an immersive experience of the car model before visiting a dealer showroom. These include a Feel The Car tool that gives 360-degree interior/exterior views with sounds of the car and explanations of features with videos; search and comparison by make, model, price, features; and live offers and promotions in all cities. The platform also has used car classifieds wherein users can upload their cars for sale, and find used cars for buying from individuals and used car dealers.
				</p>
			</div>

			<div class="col-md-6">
				<p class="text-justify">
					Besides the above consumer product features, Ecarkhana.com provides a rich array of tech-enabled tools to OE manufacturers and car dealers. These include apps for dealer sales executives to manage leads, cloud services for tracking sales performance, call tracker solution, digital marketing support, virtual online showroom and outsourced lead management operational process for taking consumers from enquiry to sale.
				</p>
			</div>

			<div class="row">
				<div class="col-md-6 sms-abt-img">
					<img src="http://ecarkhana/images/sms15.jpg" alt="">
				</div>

				<div class="col-md-6">
					<p class="text-justify">
						Our vision is to construct a complete ecosystem for consumers and car manufacturers, dealers and related businesses such that consumers have easy and complete access to not only buying and selling cars, but also manage their entire ownership experience, be it accessories, tyres, batteries, insurance or roadside assistance. The company has expanded to Southeast Asia with the launch of Zigwheels.ph, Zigwheels.my and Oto.com. It also has a presence in the UAE with Zigwheels.ae<br/>
						To diversify our product offerings we have ventured into car insurance business through ecarkhana.com
					</p>
					<h3>Investors and shareholders</h3>
					<p class="text-justify">Ecarkhana.com, which went live in 2008, was set up by a bunch of young, enthusiastic IIT graduates. Its investors include Google Capital, Tybourne Capital, Hillhouse Capital, Sequoia Capital, HDFC Bank, Ratan Tata and Times Internet.</p>
				</div>
			</div>

		</div>
	</div>
</section>

@endsection
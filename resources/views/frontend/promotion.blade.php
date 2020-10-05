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
                    <h2>Promotion</h2>
                    <div class="separator"></div>
                </div>
            </div>
            <div class="col-md-12">
                <p class="text-justify">Promote your vehicle or spare part in Bangladesh and make it more visible! Sell your car, motorbike, truck or spare part faster with our different advertising packages. Easy, fast and efficient!</p>
                <p class="text-justify">On average, sellers using our advertising packages sell 4 times faster and get 50 times more visibility on our different channels.</p>
                <p class="text-justify">On Ecarkhana, you can promote your listings with different advertising packages, and sell your vehicle or spare part faster:</p>
                <p class="text-justify">1) Promote your automotive listing on Ecarkhana</p>
                <p class="text-justify">Get on top of search results with "Bumped on Top" and "Stay on Top" from 5$ only per week! When someone will look for a specific make or model, your car will be on top of the search results on Ecarkhana!</p>
                <p class="text-justify">If you want even more visibility, you can choose the best option "Website Homepage", allowing your listing to be on the homepage from 20$ per week. Your listing will always be on the homepage of Ecarkhana during that week!</p>
                <p class="text-justify">2) Promote on our Facebook pages and groups</p>
                <p class="text-justify">Ecarkhana manages the biggest Facebook pages and groups in Bangladesh. We have tens of thousands of followers locally looking for the best prices and deals around for cars, motorbikes, trucks and spare parts.</p>
                <p class="text-justify">Ecarkhana allows you to boost your listing on Facebook and reach up to 100,000 people with one clic! We will advertise your listing to people located in your geographical area in Dili in Bangladesh. Just choose how many people you want to reach with the right advertising package.</p>
                <p class="text-justify">A simple and really efficient offer in Bangladesh to advertise on our local Facebook pages and groups. We have the biggest database of local people interested with automotive listings in Bangladesh.</p>
                <p class="text-justify">All our offers are simple and easy to use. We accept payments with credit and debit cards such as VISA, Mastercard and American Express, but also Paypal payments, and mobile payments with Tigo, Airtel, MTN, Safaricom, Vodafone, M-Pesa and more!</p>
                <p class="text-justify">All our payments are 100% secured with our local partners.</p>
            </div>

        </div>
    </div>
</section>

@endsection
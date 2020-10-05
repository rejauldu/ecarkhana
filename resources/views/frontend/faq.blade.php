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
                    <h2>Frequently Asked Questions</h2>
                    <div class="separator"></div>
                </div>
            </div>
            <div class="col-md-12">
                <h3>Q.1: What is Ecarkhana.com?</h3>
                <p class="text-justify">
                    <strong>Ans:</strong> Ecarkhana is an online service community that offers auto enthusiasts a friendly home where they can find their dream car, bike and bicyclcle.
                </p>
                <hr>
                <h3>Q.2: How do I access Ecarkhana.com?</h3>
                <p class="text-justify">
                    <strong>Ans:</strong> Searching for cars, bikes and bicyclcles on our website is easier and faster than ever. To begin, just go to our home page and decide how you would like to search. You can use the buttons ,you can specify several criteria at once, or you can search by keywords that you type in.
                </p>
                <hr>
                <h3>Q.3: How is Ecarkhana content organized?</h3>
                <p class="text-justify">
                    <strong>Ans:</strong> Ecarkhana.com consists of four sub-categories --New Vehicle Details, New Vehicle Search By Make, Vehicle Type and Price Range, Dealer Details and Latest Vehicle Details.
                </p>
                <hr>
                <h3>Q.4: What kind of topics can be found on Ecarkhana.com?</h3>
                <p class="text-justify">
                    <strong>Ans:</strong> Ecarkhana.com features latest car, bike and bicyclcle news, car, bike and bicyclcle photos, all car, bike and bicyclcle model detailed specification , photo galleries, classics, videos and more.
                </p>
                <hr>
                <h3>Q.5: How frequently is Ecarkhana updated?</h3>
                <p class="text-justify">
                    <strong>Ans:</strong> WCF is updated weekly !!
                </p>
                <hr>
                <h3>Q.6: what you do....Why do you do?</h3>
                <p class="text-justify">
                    <strong>Ans:</strong> Because we are crazy passionate about cars, bikes and bicyclcles and want to share that love with as many people as possible.
                </p>
            </div>

        </div>
    </div>
</section>

@endsection
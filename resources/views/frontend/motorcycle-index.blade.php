@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif    
<!--=================================bike slider -->
<section class="bike-slider">
    <div class="owl-carousel owl-theme" data-nav-arrow="true" data-nav-dots='false' data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-space="0">
        @foreach($home_sliders as $home_slider)
        <div class="item">
            <div class="car-item text-center">
                <div class="car-image">
                    <img class="img-fluid" src="{{ url('/') }}/assets/home-sliders/{{ $home_slider->image1 ?? 'not-found.jpg' }}" alt="">
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!--=================================Bike slider -->

@include('layouts.frontend.motorcycle-filter')


<!--=================================Start Service -->

<section class="service_wrap">
    <div class="container">
        <!--            <div class="row justify-content-md-center">-->
        <div class="row">

            <div class="col-md-12">
                <div class="section-title">
                    <span>What Our Happy Clients say about us</span>
                    <h2>Services For Your Bike </h2>
                </div>
                <ul class="service">
                    <li>
                        <a href="{{ route('motorcycle-listing') }}">
                            <div class="service_box">
                                <i class="flaticon-car"></i><br>
                                <p>Nearby bike</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="service_box">
                                <i class="flaticon-tag"></i><br>
                                <p>Buy bike</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dealer-list') }}">
                            <div class="service_box">
                                <i class="flaticon-friend"></i><br>
                                <p>Sell bike</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="service_box">
                                <i class="flaticon-tag"></i><br>
                                <p>Bike comparison </p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="service_box">
                                <i class="flaticon-money"></i><br>
                                <p>New bike</p>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <div class="service_box">
                                <i class="flaticon-car"></i><br>
                                <p>Used Bike</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('car-insurance') }}">
                            <div class="service_box">
                                <i class="flaticon-umbrella"></i><br>
                                <p>Eshowroom </p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('single-accessories') }}">
                            <div class="service_box">
                                <i class="flaticon-supermarket"></i><br>
                                <p>National distributor</p>
                            </div>
                        </a>
                    </li>

                    <div class="sms-service-more">View More</div>
                    <div class="sms-view-content" style="display:none;">

                        <li>
                            <a href="#">
                                <div class="service_box">
                                    <i class="flaticon-car"></i><br>
                                    <p>Loan comparison</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('compare-car') }}">
                                <div class="service_box">
                                    <i class="fa fa-wpforms" aria-hidden="true"></i><br>
                                    <p>Loan eligible </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="service_box">
                                    <i class="fa fa-hdd-o" aria-hidden="true"></i><br>
                                    <p>auction</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="service_box">
                                    <i class="fa fa-ravelry" aria-hidden="true"></i><br>
                                    <p>group buying</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="service_box">
                                    <i class="fa fa-bookmark-o" aria-hidden="true"></i><br>
                                    <p>Insurance </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('car-loan') }}">
                                <div class="service_box">
                                    <i class="flaticon-money"></i><br>
                                    <p>Brta services</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="service_box">
                                    <i class="flaticon-car"></i><br>
                                    <p>Nearby workshop</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="service_box">
                                    <i class="flaticon-friend"></i><br>
                                    <p>Offer </p>
                                </div>
                            </a>
                        </li>
                    </div>

                </ul>

            </div>
        </div>



    </div>

</section>

<!--=================================End Service -->



<!--=================================Start Used Cars In Your City And Budget -->

<section id="used-car-by-cat">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-blog-tab" data-toggle="tab" href="#nav-blog" role="tab" aria-controls="nav-blog" aria-selected="true">Blog</a>
                        <!--<a class="nav-item nav-link" id="nav-chat-tab" data-toggle="tab" href="#nav-chat" role="tab" aria-controls="nav-chat" aria-selected="false">Top Chats</a>-->
                    </div>
                </nav>
                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-blog" role="tabpanel" aria-labelledby="nav-blog-tab">
                        <h3 class="blog-title">know more to choose better</h3>
                        @foreach($posts as $post)
                        <div class="blog_wrap p-2 border">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="img_holder float-left">
                                        <img src="{{ url('/') }}/assets/blogs/{{ $post->thumbnail ?? 'not-found.jpg' }}" alt="" class="img-fluid">
                                        <div class="hover_icon">
                                            <a href="{{ route('blogs.show', $post->id) }}" class="hvr_btn"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="blog_info">
                                        <h6>{{ $post->title }}</h6>

                                        <div class="meta">
                                            <p>{{ $post->user->name }} <span>|</span>{{ $post->created_at->format('jS M Y') }}</p>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-sm-12">
                <div class="section-title">
                    <span>What Our Happy Clients say about us</span>
                    <h2>New Bikes</h2>
                    <div class="separator"></div>
                </div>
                <div class="owl-carousel owl-theme" data-nav-arrow="true" data-items="3" data-md-items="3" data-sm-items="2" data-xs-items="1" data-space="20">
                    @foreach($new_products as $new_product)
                    <div class="item">
                        <div class="car-item text-center">
                            <div class="car-image">
                                <img class="img-fluid" src="{{ url('/') }}/assets/products/motorcycles/{{ $new_product->motorcycle->image1  ?? 'not-found.jpg' }}" alt="">
                                <div class="car-overlay-banner">
                                    <ul>
                                        <li>
                                            <div class="compare_item">
                                                <div class="checkbox">
                                                    <input type="checkbox" class="compare-checkbox" product-id="{{ $new_product->id }}" id="compare2">
                                                    <label for="compare2">Compare</label>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="car-list">
                                <ul class="list-inline">
                                    <li><i class="fa fa-registered"></i> {{ $new_product->car->manufacturing_year ?? ''}}</li>
                                    <li><i class="fa fa-cog"></i> {{ $new_product->car->steering_gear_type ?? ''}}</li>
                                    <li><i class="fa fa-dashboard"></i> {{ $new_product->car->milage ?? ''}} mi</li>
                                </ul>
                            </div>
                            <div class="car-content">
                                <div class="star">
                                    <i class="fa @if($new_product->rating > 0) fa-star @else fa-star-o @endif orange-color"></i>
                                    <i class="fa @if($new_product->rating > 1) fa-star @else fa-star-o @endif orange-color"></i>
                                    <i class="fa @if($new_product->rating > 2) fa-star @else fa-star-o @endif orange-color"></i>
                                    <i class="fa @if($new_product->rating > 3) fa-star @else fa-star-o @endif orange-color"></i>
                                    <i class="fa @if($new_product->rating > 4) fa-star @else fa-star-o @endif orange-color"></i>
                                </div>
                                <a href="{{ route('single-motorcycle-product', $new_product->id) }}">{{ $new_product->name }}</a>
                                <div class="separator"></div>
                                <div class="price">
                                    <!--<span class="old-price">$35,568</span>-->
                                    <span class="new-price">৳ {{ $new_product->msrp }} </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!--=================================
End Used Cars In Your City And Budget -->

<!--=================================
Start Compare -->

<section class="tg-haslayout tg-vehicle-compare">
    <div class="tg-vstag">
        <div class="holder">
            <div class="tg-border-heading">
                <h3>vs</h3>
            </div>
            <a href="{{ route('compare-car') }}" target="_blank">view now</a>
        </div>
    </div>
    <div id="tg-compare-slider" class="tg-compare-slider tg-comparebox swiper-container-horizontal swiper-container-fade">
        <div class="swiper-wrapper" style="transition-duration: 0ms;">
            <div class="swiper-slide swiper-slide-prev" style="width: 1149px; opacity: 1; transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
                <div class="tg-compare tg-compare-left">
                    <figure class="tg-leftimginout">
                        <img src="images/bike/compare-bike2.png" alt="image description">
                    </figure>
                    <div class="tg-carfeatures">
                        <span class="tg-icon icon-krop-big-logo">SmS</span>
                        <div class="tg-border-heading">
                            <h3>vehicle title </h3>
                        </div>
                        <div class="tg-description">
                            <p>Sed do eiusmod tempoar inont ut labore agua enimad minim veniam nostrn amco laboris nisi ut aliquip commodo.</p>
                        </div>
                        <div class="tg-price-rating">
                            <span class="tg-price">$ 3.4m</span>
                        </div>
                    </div>
                </div>
                <div class="tg-compare tg-compare-right">
                    <div class="tg-carfeatures">
                        <span class="tg-icon icon-web">SmS</span>
                        <div class="tg-border-heading">
                            <h3>vehicle title </h3>
                        </div>
                        <div class="tg-description">
                            <p>Sed do eiusmod tempoar inont ut labore agua enimad minim veniam nostrn amco laboris nisi ut aliquip commodo.</p>
                        </div>
                        <div class="tg-price-rating">
                            <span class="tg-price">$ 3.4m</span>
                        </div>
                    </div>
                    <figure class="tg-rightimginout">
                        <img src="images/bike/compare-bike1.png" alt="image description">
                    </figure>
                </div>
            </div>
            <div class="swiper-slide swiper-slide-active" style="width: 1149px; opacity: 1; transform: translate3d(-1149px, 0px, 0px); transition-duration: 0ms;">
                <div class="tg-compare tg-compare-left">
                    <figure>
                        <img src="images/bike/compare-bike2.png" alt="image description">
                    </figure>
                    <div class="tg-carfeatures">
                        <span class="tg-icon icon-krop-big-logo">SmS</span>
                        <div class="tg-border-heading">
                            <h3>vehicle title </h3>
                        </div>
                        <div class="tg-description">
                            <p>Sed do eiusmod tempoar inont ut labore agua enimad minim veniam nostrn amco laboris nisi ut aliquip commodo.</p>
                        </div>
                        <div class="tg-price-rating">
                            <span class="tg-price">$ 3.4m</span>
                        </div>
                    </div>
                </div>
                <div class="tg-compare tg-compare-right">
                    <div class="tg-carfeatures">
                        <span class="tg-icon icon-web">SmS</span>
                        <div class="tg-border-heading">
                            <h3>vehicle title </h3>
                        </div>
                        <div class="tg-description">
                            <p>Sed do eiusmod tempoar inont ut labore agua enimad minim veniam nostrn amco laboris nisi ut aliquip commodo.</p>
                        </div>
                        <div class="tg-price-rating">
                            <span class="tg-price">$ 3.4m</span>
                        </div>
                    </div>
                    <figure>
                        <img src="images/bike/compare-bike1.png" alt="image description">
                    </figure>
                </div>
            </div>
            <div class="swiper-slide swiper-slide-next" style="width: 1149px; opacity: 0; transform: translate3d(-2298px, 0px, 0px); transition-duration: 0ms;">
                <div class="tg-compare tg-compare-left">
                    <figure>
                        <img src="images/bike/compare-bike2.png" alt="image description">
                    </figure>
                    <div class="tg-carfeatures">
                        <span class="tg-icon icon-krop-big-logo">SmS</span>
                        <div class="tg-border-heading">
                            <h3>vehicle title </h3>
                        </div>
                        <div class="tg-description">
                            <p>Sed do eiusmod tempoar inont ut labore agua enimad minim veniam nostrn amco laboris nisi ut aliquip commodo.</p>
                        </div>
                        <div class="tg-price-rating">
                            <span class="tg-price">$ 3.4m</span>
                        </div>
                    </div>
                </div>
                <div class="tg-compare tg-compare-right">
                    <div class="tg-carfeatures">
                        <span class="tg-icon icon-web">SmS</span>
                        <div class="tg-border-heading">
                            <h3>vehicle title </h3>
                        </div>
                        <div class="tg-description">
                            <p>Sed do eiusmod tempoar inont ut labore agua enimad minim veniam nostrn amco laboris nisi ut aliquip commodo.</p>
                        </div>
                        <div class="tg-price-rating">
                            <span class="tg-price">$ 3.4m</span>
                        </div>
                    </div>
                    <figure>
                        <img src="images/bike/compare-bike1.png" alt="image description">
                    </figure>
                </div>
            </div>
            <div class="swiper-slide" style="width: 1149px; opacity: 0; transform: translate3d(-3447px, 0px, 0px); transition-duration: 0ms;">
                <div class="tg-compare tg-compare-left">
                    <figure>
                        <img src="images/bike/compare-bike2.png" alt="image description">
                    </figure>
                    <div class="tg-carfeatures">
                        <span class="tg-icon icon-krop-big-logo">SmS</span>
                        <div class="tg-border-heading">
                            <h3>vehicle title </h3>
                        </div>
                        <div class="tg-description">
                            <p>Sed do eiusmod tempoar inont ut labore agua enimad minim veniam nostrn amco laboris nisi ut aliquip commodo.</p>
                        </div>
                        <div class="tg-price-rating">
                            <span class="tg-price">$ 3.4m</span>
                        </div>
                    </div>
                </div>
                <div class="tg-compare tg-compare-right">
                    <div class="tg-carfeatures">
                        <span class="tg-icon icon-web">SmS</span>
                        <div class="tg-border-heading">
                            <h3>vehicle title </h3>
                        </div>
                        <div class="tg-description">
                            <p>Sed do eiusmod tempoar inont ut labore agua enimad minim veniam nostrn amco laboris nisi ut aliquip commodo.</p>
                        </div>
                        <div class="tg-price-rating">
                            <span class="tg-price">$ 3.4m</span>
                        </div>
                    </div>
                    <figure>
                        <img src="images/bike/compare-bike1.png" alt="image description">
                    </figure>
                </div>
            </div>
        </div>
        <div class="tg-prev"><span class="fa fa-angle-left"></span></div>
        <div class="tg-next"><span class="fa fa-angle-right"></span></div>
        <div class="tg-pagination swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span></div>
    </div>
</section>

<!--=================================End Compare -->


<!--=================================start Featured Cars -->

<section class="upcoming">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <span>Used Bikes Special Offers</span>
                    <h2>Used Bikes </h2>
                    <div class="separator"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel" data-nav-arrow="true" data-items="3" data-md-items="3" data-sm-items="2" data-xs-items="1" data-space="20">
                    @foreach($used_products as $used_product)
                    <div class="item">
                        <div class="featured-car-list">
                            <div class="featured-car-img">
                                <a href=""><img src="{{ url('/') }}/assets/products/cars/{{ $used_product->motorcycle->image1 }}" class="img-responsive" alt="Image"></a>
                                <div class="label_icon">Used</div>
                                <div class="compare_item">
                                    <div class="checkbox">
                                        <input type="checkbox" class="compare-checkbox" product-id="{{ $used_product->id }}" id="compare3">
                                        <label for="compare3">Compare</label>
                                    </div>
                                </div>
                            </div>
                            <div class="featured-car-content">
                                <h6><a href="{{ route('single-motorcycle-product', $used_product->id) }}">{{ $used_product->motorcycle->brand->name ?? ''}}</a></h6>
                                <div class="price_info">
                                    <p class="featured-price">৳ {{ $used_product->msrp ?? ''}}</p>
                                    <div class="car-location"><span><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $used_product->supplier->region->name ?? ''}}, {{ $used_product->supplier->division->name ?? ''}}</span></div>
                                </div>
                                <ul>
                                    <li><i class="fa fa-road" aria-hidden="true"></i>{{ $used_product->motorcycle->maximum_power ?? ''}} kw</li>
                                    <li><i class="fa fa-tachometer" aria-hidden="true"></i>{{ $used_product->motorcycle->maximum_speed ?? ''}} km/h</li>
                                    <li><i class="fa fa-calendar" aria-hidden="true"></i>{{ $used_product->motorcycle->model->name ?? ''}}</li>
                                    <li><i class="fa fa-car" aria-hidden="true"></i>{{ $used_product->motorcycle->milage ?? ''}} km</li>
                                    <li><i class="fa fa-user" aria-hidden="true"></i>{{ $used_product->motorcycle->brand->name ?? ''}}</li>
                                    <li><i class="fa fa-superpowers" aria-hidden="true"></i>{{ $used_product->motorcycle->made_origin->name ?? ''}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <a href="car-listing" target="_blank" class="button red">View All<i
                    class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
        </div>
    </div>
</section>

<!--=================================End Featured Cars -->


<!--=================================Start Banner -->
<section class="sms-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="wpb_single_image">
                    <img src="images/bike/Bike-ad.jpg">
                </div>
            </div>
            <div class="col-md-6">
                <div class="wpb_single_image">
                    <img src="images/bike/Bike-ad-2.jpg">
                </div>
            </div>
        </div>
    </div>
</section>

<!--=================================End Banner -->



<!--=================================Start Popular bike -->
<section id="popular">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <span>Top 10 Popular bike in Dhaka</span>
                    <h2>Popular Bikes </h2>
                    <div class="separator"></div>
                </div>
                <div class="owl-carousel owl-theme" data-nav-arrow="true" data-items="4" data-md-items="4" data-sm-items="2" data-xs-items="1" data-space="20">
                    @foreach($popular_products as $popular_product)
                    <div class="item">
                        <div class="car-item text-center">
                            <div class="car-image">
                                <img class="img-fluid" src="{{ url('/') }}/assets/products/motorcycles/{{ $popular_product->motorcycle->image1 }}" alt="">
                                <div class="car-overlay-banner">
                                    <ul>
                                        <li>
                                            <div class="compare_item">
                                                <div class="checkbox">
                                                    <input type="checkbox" class="compare-checkbox" product-id="{{ $popular_product->id }}" id="compare2">
                                                    <label for="compare2">Compare</label>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="car-list">
                                <ul class="list-inline">
                                    <li><i class="fa fa-registered"></i> {{ $popular_product->motorcycle->manufacturing_year ?? ''}}</li>
                                    <li><i class="fa fa-cog"></i> {{ $popular_product->motorcycle->steering_gear_type ?? ''}}</li>
                                    <li><i class="fa fa-dashboard"></i> {{ $popular_product->motorcycle->milage ?? ''}} mi</li>
                                </ul>
                            </div>
                            <div class="car-content">
                                <div class="star">
                                    <i class="fa @if($popular_product->rating > 0) fa-star @else fa-star-o @endif orange-color"></i>
                                    <i class="fa @if($popular_product->rating > 1) fa-star @else fa-star-o @endif orange-color"></i>
                                    <i class="fa @if($popular_product->rating > 2) fa-star @else fa-star-o @endif orange-color"></i>
                                    <i class="fa @if($popular_product->rating > 3) fa-star @else fa-star-o @endif orange-color"></i>
                                    <i class="fa @if($popular_product->rating > 4) fa-star @else fa-star-o @endif orange-color"></i>
                                </div>
                                <a href="single-car-product/{{ $popular_product->id }}">{{ $popular_product->name }}</a>
                                <div class="separator"></div>
                                <div class="price">
                                    <!--<span class="old-price">$35,568</span>-->
                                    <span class="new-price">৳ {{ $popular_product->msrp }} </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <a href="{{ route('motorcycle-listing') }}" target="_blank" class="button red">View All<i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
        </div>
    </div>
</section>
<!--=================================End Popular car -->


<!--=================================Start business partner -->

<section id="partner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-loaded owl-drag" data-nav-dots="true" data-items="5" data-md-items="5" data-sm-items="3" data-xs-items="2" data-space="10">
                    <div class="owl-stage-outer">
                        <div class="owl-stage" style="transform: translate3d(-2530px, 0px, 0px); transition: all 0.25s ease 0s; width: 4140px;">
                            @foreach($suppliers as $supplier)
                            <div class="owl-item cloned" style="width: 220px; margin-right: 10px;">
                                <div class="item">
                                    <img class="img-fluid center-block" src="{{ url('/') }}/assets/profile/{{ $supplier->photo }}" alt="">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="owl-nav disabled">
                        <button type="button" role="presentation" class="owl-prev"><i class="fa fa-angle-left fa-2x"></i></button>
                        <button type="button" role="presentation" class="owl-next"><i class="fa fa-angle-right fa-2x"></i></button>
                    </div>
                    <div class="owl-dots">
                        <button role="button" class="owl-dot"><span></span></button>
                        <button role="button" class="owl-dot active"><span></span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!--=================================End business partner -->


@endsection
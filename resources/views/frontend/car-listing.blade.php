@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
	{{ session()->get('message') }}
</div>
@endif
@include('layouts.frontend.car-background')


    <!--=================================
product-listing  -->

    <section class="product-listing page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="listing-sidebar">
                        @include('layouts.frontend.car-left-filter')
                        <div class="widget-banner">
                            <img class="img-fluid center-block" src="images/productbanner.jpg" alt="">
                        </div>
                    </div>

                    <div class="sidebar_widget">
                        <div class="widget_heading">
                            <h5><i class="fa fa-car" aria-hidden="true"></i> Recently Listed Cars</h5>
                        </div>
                        <div class="recent_addedcars">
                            <ul>
                                <li class="gray-bg">
                                    <div class="recent_post_img">
                                        <a href="#"><img src="images/rc1.jpg" alt="image"></a>
                                    </div>
                                    <div class="recent_post_title"> <a href="#">Ford Shelby GT350</a>
                                        <p class="widget_price">$92,000</p>
                                    </div>
                                </li>
                                <li class="gray-bg">
                                    <div class="recent_post_img">
                                        <a href="#"><img src="images/rc2.jpg" alt="image"></a>
                                    </div>
                                    <div class="recent_post_title"> <a href="#">BMW 535i</a>
                                        <p class="widget_price">$92,000</p>
                                    </div>
                                </li>
                                <li class="gray-bg">
                                    <div class="recent_post_img">
                                        <a href="#"><img src="images/rc3.jpg" alt="image"></a>
                                    </div>
                                    <div class="recent_post_title"> <a href="#">Mazda CX-5 SX, V6, ABS, Sunroof </a>
                                        <p class="widget_price">$92,000</p>
                                    </div>
                                </li>
                                <li class="gray-bg">
                                    <div class="recent_post_img">
                                        <a href="#"><img src="images/rc4.jpg" alt="image"></a>
                                    </div>
                                    <div class="recent_post_title"> <a href="#">Ford Shelby GT350 </a>
                                        <p class="widget_price">$92,000</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                
                    <div class="row">
						@foreach($products as $product)
                        <div class="col-lg-4">
                            <div class="car-item gray-bg text-center">
                                <div class="car-image">
                                    <img class="img-fluid" src="assets/products/cars/{{ $product->car->image1 }}" alt="">
                                    <div class="car-overlay-banner">
                                        <ul>
                                            <li>
                                                <div class="compare_item">
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="compare2">
                                                        <label for="compare2">Compare</label>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="car-list">
                                    <ul class="list-inline">
                                        <li><i class="fa fa-registered"></i> {{ $product->car->manufacturing_year ?? ''}}</li>
                                        <li><i class="fa fa-cog"></i> {{ $product->car->steering_gear_type ?? ''}} </li>
                                        <li><i class="fa fa-shopping-cart"></i> {{ $nproduct->car->milage ?? ''}} mi</li>
                                    </ul>
                                </div>
                                <div class="car-content">
                                    <div class="star">
                                        <i class="fa fa-star orange-color"></i>
                                        <i class="fa fa-star orange-color"></i>
                                        <i class="fa fa-star orange-color"></i>
                                        <i class="fa fa-star orange-color"></i>
                                        <i class="fa fa-star-o orange-color"></i>
                                    </div>
                                    <a href="{{ route('single-car-product', $product->id) }}">{{ $product->name }}</a>
                                    <div class="separator"></div>
                                    <div class="price">
                                        <span class="new-price">৳ {{ $product->msrp }} </span>
                                    </div>
                                </div>
                            </div>
                        </div>
						@endforeach
                    </div>
                    <div class="pagination-nav d-flex justify-content-center">
					{{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================product-listing  -->


    <!--=================================Start business partner -->

    <section id="partner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-loaded owl-drag" data-nav-dots="true" data-items="5" data-md-items="5" data-sm-items="3" data-xs-items="1" data-space="10">
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
                        <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><i
                                    class="fa fa-angle-left fa-2x"></i></button><button type="button" role="presentation" class="owl-next"><i class="fa fa-angle-right fa-2x"></i></button>
                        </div>
                        <div class="owl-dots"><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot active"><span></span></button></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--=================================
End business partner -->


@endsection
@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif
<!--=================================
bike slider -->
<section class="bike-slider">
    <div class="owl-carousel owl-theme" data-nav-arrow="true" data-nav-dots='false' data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-space="0">
        @foreach($home_sliders as $home_slider)
            <div class="item">
                <div class="car-item text-center">
                    <div class="car-image">
                        <img class="img-fluid" src="assets/home-sliders/{{ $home_slider->image1 ?? 'not-found.jpg' }}" alt="">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@include('layouts.frontend.bicycle-filter')
<!--=================================
Bike slider -->





<!--=================================
Start Service -->

<section class="service_wrap">
    <div class="container px-0">
        <!--            <div class="row justify-content-md-center">-->
        <div class="row">

            <div class="col-md-12">
                <div class="section-title">
                    <h2>Services For Your Bicycle </h2>
                </div>
                <ul class="service pl-0">
                    <li>
                        <a href="#" onclick="getLocation()">
                            <div class="service_box">
                                <i class="flaticon-car"></i><br>
                                <p>Nearby bicycle</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('fit-calculator') }}">
                            <div class="service_box">
                                <i class="flaticon-tag"></i><br>
                                <p>Fit calculator</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('bicycles.index') }}">
                            <div class="service_box">
                                <i class="flaticon-friend"></i><br>
                                <p>Buy bicycle</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('sell-bicycle') }}">
                            <div class="service_box">
                                <i class="flaticon-tag"></i><br>
                                <p>Sell bicycle</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('compare-bicycle') }}">
                            <div class="service_box">
                                <i class="flaticon-money"></i><br>
                                <p>Comparision</p>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('bicycles.index') }}?conditions=new">
                            <div class="service_box">
                                <i class="flaticon-car"></i><br>
                                <p>New bicycle</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('bicycles.index') }}?conditions=used">
                            <div class="service_box">
                                <i class="flaticon-umbrella"></i><br>
                                <p>Used bicycle</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('national-distributors.index') }}">
                            <div class="service_box">
                                <i class="flaticon-supermarket"></i><br>
                                <p>Distributor</p>
                            </div>
                        </a>
                    </li>

                    @mobile
                    <div class="sms-service-more">View More</div>

                    <div class="sms-view-content" style="display:none;">
                       @endmobile

                        <li>
                            <a href="{{ route('banks.index') }}">
                                <div class="service_box">
                                    <i class="flaticon-car"></i><br>
                                    <p>Loan comparison</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="service_box">
                                    <i class="fa fa-wpforms" aria-hidden="true"></i><br>
                                    <p>Nearby workshop</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('auction-products') }}?categories=bicycle">
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
                            <a href="{{ route('blogs.index') }}">
                                <div class="service_box">
                                    <i class="fa fa-bookmark-o" aria-hidden="true"></i><br>
                                    <p>Blog</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('discount-products') }}?categories=bicycle">
                                <div class="service_box">
                                    <i class="flaticon-money"></i><br>
                                    <p>Offer</p>
                                </div>
                            </a>
                        </li>
                        @mobile
                    </div>
                    @endmobile
                </ul>

            </div>
        </div>
    </div>

</section>

<!--=================================
End Service -->



<!--=================================
Start Used Cars In Your City And Budget -->

<section id="used-car-by-cat">
    <div class="container px-0">
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

            <div class="col-lg-8 col-12 text-center">
                <div class="section-title mb-2">
                    <h2>New Bicycles</h2>
                    <div class="separator"></div>
                </div>
                <div class="owl-carousel owl-theme" data-nav-arrow="true" data-items="3" data-md-items="3" data-sm-items="2" data-xs-items="1" data-space="0">
                    @foreach($new_products as $new_product)
                    <div class="item">
                        <div class="bg-white product-hover-effect shadow-sm mx-1">
                            <div class="size-53">
                                <div class="size-child overflow-hidden">
                                    <a href="{{ route('products.show', $new_product->id) }}" class="w-100 h-100 d-inline-block">
                                        <img class="position-center h-auto w-100" src="{{ url('/') }}/assets/products/{{ $new_product->id }}/{{ $new_product->image1 ?? 'not-found.jpg' }}" alt="{{ $new_product->name }}">
                                    </a>
                                </div>
                                <div class="size-child product-hover-show">
                                    <a href="{{ route('products.show', $new_product->id) }}" class="w-100 h-100 d-inline-block">
                                        <div class="float-left form-control bg-dark text-white text-left border-0 d-inline-block w-auto position-relative py-1 height-30">
                                            <input type="checkbox" id="new-{{ $new_product->id }}" class="compare-checkbox" product-id="{{ $new_product->id }}">
                                            <label for="new-{{ $new_product->id }}">Compare</label>
                                        </div>
                                    </a>
                                </div>
                                <div class="bg-white product-hover-show2 position-absolute height-30 w-100 line-height-30 bottom-0">
                                    <ul class="list-inline">
                                        <li><i class="fa fa-registered"></i> {{ $new_product->bicycle->made_origin->name ?? ''}}</li>
                                        <li><i class="fa fa-cog"></i> {{ $new_product->bicycle->gear ?? ''}} gear</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="text-dark clearfix px-3 py-1">
                                <div class="text-left clearfix">
                                    <span><i class="fa fa-map-marker text-danger"></i> {{ $new_product->supplier->region->name ?? ''}}</span>
                                    <span class="float-right"><i class="fa fa-industry text-warning"></i> {{ $new_product->brand->name ?? ''}}</span>
                                </div>
                                <div class="display-6 my-0 owl-heading"><a href="{{ route('bicycles.show', $new_product->id) }}" class="">{{ $new_product->name }}</a></div>
                                <div class="separator"></div>
                                <div class="text-center font-16">BDT {{ $new_product->msrp }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('bicycles.index') }}?conditions=new" class="button red mt-3">View All<i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</section>

<!--=================================
End Used Cars In Your City And Budget -->

<!--=================================
Start Compare -->

<section class="tg-haslayout tg-vehicle-compare">
    <div id="tg-compare-slider" class="tg-compare-slider tg-comparebox swiper-container-horizontal swiper-container-fade">
        <div class="swiper-wrapper" style="transition-duration: 0ms;">
            @foreach($versus_sliders as $slider)
            <div class="swiper-slide swiper-slide-prev" style="width: 1149px; opacity: 1; transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
                <div class="tg-compare tg-compare-left">
                    <figure class="tg-leftimginout">
                        <img src="{{ url('assets/versus-sliders') }}/{{ $slider->product1_image }}" alt="{{ $slider->product1->name }}">
                    </figure>
                    <div class="tg-carfeatures">
                        <span class="tg-icon icon-krop-big-logo">{{ $slider->product1->brand->name ?? ''}}</span>
                        <div class="tg-border-heading">
                            <h3>{{ $slider->product1->name }}</h3>
                        </div>
                        <div class="tg-description">
                            <p class="text-justify">{{ $slider->product1->note }}</p>
                        </div>
                        <div class="tg-price-rating">
                            <span class="tg-price">BDT {{ $slider->product1->msrp }}</span>
                        </div>
                    </div>
                </div>
                <div class="tg-compare tg-compare-right">
                    <div class="tg-carfeatures">
                        <span class="tg-icon icon-web">{{ $slider->product2->brand->name ?? ''}}</span>
                        <div class="tg-border-heading">
                            <h3>{{ $slider->product2->name }}</h3>
                        </div>
                        <div class="tg-description">
                            <p class="text-justify">{{ $slider->product2->note }}</p>
                        </div>
                        <div class="tg-price-rating">
                            <span class="tg-price">BDT {{ $slider->product2->msrp }}</span>
                        </div>
                    </div>
                    <figure class="tg-rightimginout">
                        <img src="{{ url('assets/versus-sliders') }}/{{ $slider->product2_image }}" alt="{{ $slider->product2->brand->name ?? ''}}">
                    </figure>
                </div>
                <div class="tg-vstag d-none cursor-pointer" onclick="location.href=document.getElementById('vs-slider-button')">
                    <div class="holder">
                        <div class="tg-border-heading">
                            <h3>vs</h3>
                        </div>
                        <a id="vs-slider-button" href="{{ route('compare') }}/{{ $slider->product1->brand->name.'-'.$slider->product1->model->name.'-and-'.$slider->product2->brand->name.'-'.$slider->product2->model->name }}">view now</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="tg-prev"><span class="fa fa-angle-left"></span></div>
        <div class="tg-next"><span class="fa fa-angle-right"></span></div>
        <div class="tg-pagination swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span></div>
    </div>
</section>

<!--=================================
End Compare -->


<!--=================================
start Featured Cars -->

<section>
        <div class="container px-0">
            <div class="row">
                <div class="col-md-12 text-center">
                    <span>Used Bicycles Special Offers</span>
                    <h2>Used Bicycles</h2>
                    <div class="car-item">
                        <div class="separator"></div>
                    </div>
                    <div class="owl-carousel owl-theme" data-nav-arrow="true" data-items="3" data-md-items="3" data-sm-items="2" data-xs-items="1" data-space="0">
                        @foreach($used_products as $used_product)
                        <div class="item">
                            <div class="bg-white shadow-sm mx-2 mb-2 zoom-parent overflow-hidden shadow-hover-10">
                                <div class="size-53 clearfix">
                                    <div class="size-child overflow-hidden zoom-target-1">
                                        <img class="position-center h-auto" src="{{ url('/') }}/assets/products/{{ $used_product->id }}/{{ $used_product->image1 ?? 'not-found.jpg' }}" alt="{{ $used_product->name }}">
                                    </div>
                                    <div class="float-left form-control bg-dark text-white text-left border-0 d-inline-block w-auto position-relative height-30 py-1">
                                        <input type="checkbox" id="used-{{ $used_product->id }}" class="compare-checkbox" product-id="{{ $used_product->id }}">
                                        <label for="used-{{ $used_product->id }}">Compare</label>
                                    </div>
                                </div>
                                <div class="text-dark clearfix px-3 py-1">
                                    <div class="text-left clearfix">
                                        <span><i class="fa fa-map-marker text-danger"></i> {{ $used_product->supplier->region->name ?? ''}}, {{ $used_product->supplier->division->name ?? ''}}</span>
                                        <span class="float-right"><i class="fa fa-industry text-warning"></i> {{ $used_product->brand->name ?? ''}}</span>
                                    </div>
                                    <div class="display-6 my-0 owl-heading"><a href="{{ route('bicycles.show', $used_product->id) }}" class="">{{ $used_product->name }}</a></div>
                                    <div class="separator"></div>
                                    <div class="text-center font-16">BDT {{ $used_product->msrp }}</div>
                                    <div class="row text-left">
                                        <div class="col-6 my-1">
                                            <i class="fa fa-user"></i> {{ $used_product->model->name ?? ''}}
                                        </div>
                                        <div class="col-6 my-1">
                                            <i class="fa fa-calendar"></i> {{ $used_product->frame_size ?? ''}} cm
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a href="{{ route('bicycles.index') }}?conditions=used" class="button red mt-3">View All<i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </section>

<!--=================================
End Featured Cars -->


<!--=================================
Start Banner -->
<section class="sms-banner">
        <div class="container px-0">
            <div class="owl-carousel owl-theme" data-nav-arrow="true" data-items="2" data-md-items="2" data-sm-items="2" data-xs-items="1" data-space="20">
                @foreach($advertisements as $advertisement)
                <div class="item">
                    <div class="wpb_single_image">
                        <a href="{{ $advertisement->url }}"><img src="{{ asset('assets/advertisements') }}/{{ $advertisement->image }}"></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

<!--=================================
End Banner -->



<!--=================================
Start Popular car -->

<section id="popular">
        <div class="container px-0">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title mb-2">
                        <span>Top 10 Popular bicycle</span>
                        <h2>Popular Bicycles</h2>
                        <div class="separator"></div>
                    </div>
                    <div class="owl-carousel owl-theme" data-nav-arrow="true" data-items="4" data-md-items="4" data-sm-items="2" data-xs-items="1" data-space="0">
                        @foreach($popular_products as $new_product)
                        <div class="item">
                            <div class="bg-white product-hover-effect shadow-sm mx-1">
                                <div class="size-53">
                                    <div class="size-child overflow-hidden">
                                        <a href="{{ route('products.show', $new_product->id) }}" class="w-100 h-100 d-inline-block">
                                            <img class="position-center h-auto w-100" src="{{ url('/') }}/assets/products/{{ $new_product->id }}/{{ $new_product->image1 ?? 'not-found.jpg' }}" alt="{{ $new_product->name }}">
                                        </a>
                                    </div>
                                    <div class="size-child product-hover-show">
                                        <a href="{{ route('products.show', $new_product->id) }}" class="w-100 h-100 d-inline-block">
                                            <div class="float-left form-control bg-dark text-white text-left border-0 d-inline-block w-auto position-relative py-1 height-30">
                                                <input type="checkbox" id="new-{{ $new_product->id }}" class="compare-checkbox" product-id="{{ $new_product->id }}">
                                                <label for="new-{{ $new_product->id }}">Compare</label>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="bg-white product-hover-show2 position-absolute height-30 w-100 line-height-30 bottom-0">
                                        <ul class="list-inline">
                                            <li><i class="fa fa-registered"></i> {{ $new_product->bicycle->manufacturing_year ?? ''}}</li>
                                            <li><i class="fa fa-cog"></i> {{ $new_product->bicycle->steering_gear_type ?? ''}}</li>
                                            <li><i class="fa fa-dashboard"></i> {{ $new_product->bicycle->milage ?? ''}} mi</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="text-dark clearfix px-3 py-1">
                                    <div class="text-left clearfix">
                                        <span><i class="fa fa-map-marker text-danger"></i> {{ $new_product->supplier->region->name ?? ''}}</span>
                                        <span class="float-right"><i class="fa fa-industry text-warning"></i> {{ $new_product->brand->name ?? ''}}</span>
                                    </div>
                                    <div class="display-6 my-0 owl-heading"><a href="{{ route('products.show', $new_product->id) }}" class="">{{ $new_product->name }}</a></div>
                                    <div class="separator"></div>
                                    <div class="text-center font-16">Tk.{{ $new_product->msrp }}</div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a href="{{ route('popular-products') }}?categories=bicycle" class="button red mt-3">View All<i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </section>
<!--=================================
End Popular car -->


<!--=================================
Start business partner -->

<section id="partner">
    <div class="container px-0">
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


<!--=================================
End business partner -->


@endsection
@section('script')
<script>
    (function() {
        localStorage.category_id = 3;
    })();
</script>
@endsection
@section('style')
<style>
    .swiper-slide-active .tg-vstag {
        display: block !important;
    }
</style>
@endsection

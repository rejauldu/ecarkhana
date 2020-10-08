@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif


<!--=================================
    rev slider -->
    <section class="slider">
        <div id="rev_slider_2_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="car-dealer-03" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
            <!-- START REVOLUTION SLIDER 5.2.6 fullwidth mode -->
            <div id="rev_slider_2_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.2.6">
                <ul>
                    <!-- SLIDE  -->
                    @foreach($home_sliders as $home_slider)
                    @if($home_slider->number == 3)
                    <li data-index="rs-{{ $home_slider->id }}" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="revolution/assets/100x50_3176d-road-bg.jpg"
                        data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="assets/home-sliders/{{ $home_slider->image1 ?? 'not-found.jpg' }}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->

                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption   tp-resizeme" id="slide-{{ $home_slider->id }}-layer-6" data-x="center" data-hoffset="" data-y="270" data-width="['auto']" data-height="['auto']" data-transform_idle="o:1;" data-transform_in="y:[-100%];z:0;rZ:35deg;sX:1;sY:1;skX:0;skY:0;s:800;e:Power4.easeInOut;"
                           data-transform_out="opacity:0;s:300;" data-mask_in="x:0px;y:0px;" data-start="1400" data-splitin="chars" data-splitout="none" data-responsive_offset="on" data-elementdelay="0.05" style="z-index: 5; white-space: nowrap; font-size: 30px; line-height: 30px; font-weight: 400; color: rgba(255, 255, 255, 1.00);font-family:Roboto;text-align:center;text-transform:uppercase;">
                           {{ $home_slider->title }}</div>

                           <!-- LAYER NR. 2 -->
                           <div class="tp-caption   tp-resizeme" id="slide-{{ $home_slider->id }}-layer-7" data-x="center" data-hoffset="" data-y="center" data-voffset="-140" data-width="['auto']" data-height="['auto']" data-transform_idle="o:1;" data-transform_in="y:[-100%];z:0;rZ:35deg;sX:1;sY:1;skX:0;skY:0;s:800;e:Power4.easeInOut;"
                               data-transform_out="opacity:0;s:300;" data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-start="1700" data-splitin="chars" data-splitout="none" data-responsive_offset="on" data-elementdelay="0.05" style="z-index: 6; white-space: nowrap; font-size: 70px; line-height: 70px; font-weight: 700; color: rgba(255, 255, 255, 1.00);font-family:Roboto;text-align:center;text-transform:uppercase;">
                               {{ $home_slider->description }}</div>


                               <!-- LAYER NR. 4 -->
                               <div class="tp-caption   tp-resizeme" id="slide-{{ $home_slider->id }}-layer-12" data-x="right" data-hoffset="70" data-y="center" data-voffset="135" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-transform_idle="o:1;" data-transform_in="x:-50px;opacity:0;s:800;e:Power2.easeInOut;"
                                   data-transform_out="opacity:0;s:300;" data-start="620" data-responsive_offset="on" style="z-index: 8;"><img src="assets/home-sliders/{{ $home_slider->image2 ?? 'not-found.jpg' }}" alt="" data-ww="auto" data-hh="auto" data-no-retina> </div>

                                   <!-- LAYER NR. 5 -->
                                   <div class="tp-caption   tp-resizeme" id="slide-{{ $home_slider->id }}-layer-11" data-x="120" data-y="center" data-voffset="130" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-transform_idle="o:1;" data-transform_in="x:50px;opacity:0;s:800;e:Power2.easeInOut;"
                                       data-transform_out="opacity:0;s:300;" data-start="200" data-responsive_offset="on" style="z-index: 9;"><img src="assets/home-sliders/{{ $home_slider->image3 ?? 'not-found.jpg' }}" alt="" data-ww="auto" data-hh="auto" data-no-retina> </div>
                                   </li>
                                   @elseif($home_slider->number == 6)
                                   <li data-index="rs-{{ $home_slider->id }}" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="revolution/assets/100x50_3176d-road-bg.jpg"
                                    data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                    <!-- MAIN IMAGE -->
                                    <img src="assets/home-sliders/{{ $home_slider->image1 ?? 'not-found.jpg' }}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                    <!-- LAYERS -->
                                    <!-- LAYER NR. 1 -->
                                    <div class="tp-caption   tp-resizeme" id="slide-{{ $home_slider->id }}-layer-4" data-x="3" data-y="center" data-voffset="50" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-transform_idle="o:1;" data-transform_in="x:50px;opacity:0;s:1500;e:Power3.easeOut;"
                                       data-transform_out="opacity:0;s:300;" data-start="2060" data-responsive_offset="on" style="z-index: 5;"><img src="assets/home-sliders/{{ $home_slider->image2 ?? 'not-found.jpg' }}" alt="" data-ww="auto" data-hh="auto" data-no-retina> </div>

                                       <!-- LAYER NR. 2 -->
                                       <div class="tp-caption   tp-resizeme" id="slide-{{ $home_slider->id }}-layer-5" data-x="right" data-hoffset="-10" data-y="center" data-voffset="60" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-transform_idle="o:1;" data-transform_in="x:-50px;opacity:0;s:1500;e:Power3.easeOut;"
                                           data-transform_out="opacity:0;s:300;" data-start="2060" data-responsive_offset="on" style="z-index: 6;"><img src="assets/home-sliders/{{ $home_slider->image3 ?? 'not-found.jpg' }}" alt="" data-ww="auto" data-hh="auto" data-no-retina> </div>

                                           <!-- LAYER NR. 3 -->
                                           <div class="tp-caption   tp-resizeme" id="slide-{{ $home_slider->id }}-layer-6" data-x="center" data-hoffset="" data-y="270" data-width="['auto']" data-height="['auto']" data-transform_idle="o:1;" data-transform_in="y:[-100%];z:0;rZ:35deg;sX:1;sY:1;skX:0;skY:0;s:300;e:Power4.easeInOut;"
                                               data-transform_out="opacity:0;s:300;" data-mask_in="x:0px;y:0px;" data-start="3260" data-splitin="chars" data-splitout="none" data-responsive_offset="on" data-elementdelay="0.05" style="z-index: 7; white-space: nowrap; font-size: 30px; line-height: 30px; font-weight: 400; color: rgba(255, 255, 255, 1.00);font-family:Roboto;text-align:center;text-transform:uppercase;">
                                               {{ $home_slider->title }} </div>

                                               <!-- LAYER NR. 4 -->
                                               <div class="tp-caption   tp-resizeme" id="slide-{{ $home_slider->id }}-layer-7" data-x="center" data-hoffset="" data-y="center" data-voffset="-140" data-width="['auto']" data-height="['auto']" data-transform_idle="o:1;" data-transform_in="y:[-100%];z:0;rZ:35deg;sX:1;sY:1;skX:0;skY:0;s:300;e:Power4.easeInOut;"
                                                   data-transform_out="opacity:0;s:300;" data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-start="4290" data-splitin="chars" data-splitout="none" data-responsive_offset="on" data-elementdelay="0.05" style="z-index: 8; white-space: nowrap; font-size: 70px; line-height: 70px; font-weight: 700; color: rgba(255, 255, 255, 1.00);font-family:Roboto;text-align:center;text-transform:uppercase;">
                                                   {{ $home_slider->description }} </div>


                                                   <!-- LAYER NR. 6 -->
                                                   <div class="tp-caption   tp-resizeme" id="slide-{{ $home_slider->id }}-layer-3" data-x="right" data-hoffset="159" data-y="center" data-voffset="81" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-transform_idle="o:1;" data-transform_in="x:-50px;opacity:0;s:1500;e:Power3.easeOut;"
                                                       data-transform_out="opacity:0;s:300;" data-start="1220" data-responsive_offset="on" style="z-index: 10;"><img src="assets/home-sliders/{{ $home_slider->image4 ?? 'not-found.jpg' }}" alt="" data-ww="auto" data-hh="auto" data-no-retina> </div>

                                                       <!-- LAYER NR. 7 -->
                                                       <div class="tp-caption   tp-resizeme" id="slide-{{ $home_slider->id }}-layer-2" data-x="202" data-y="center" data-voffset="80" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-transform_idle="o:1;" data-transform_in="x:50px;opacity:0;s:1500;e:Power3.easeOut;"
                                                           data-transform_out="opacity:0;s:300;" data-start="1200" data-responsive_offset="on" style="z-index: 11;"><img src="assets/home-sliders/{{ $home_slider->image5 ?? 'not-found.jpg' }}" alt="" data-ww="auto" data-hh="auto" data-no-retina> </div>

                                                           <!-- LAYER NR. 8 -->
                                                           <div class="tp-caption   tp-resizeme" id="slide-{{ $home_slider->id }}-layer-1" data-x="center" data-hoffset="" data-y="center" data-voffset="100" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:670;e:Power3.easeInOut;"
                                                               data-transform_out="opacity:0;s:300;" data-start="500" data-responsive_offset="on" style="z-index: 12;"><img src="assets/home-sliders/{{ $home_slider->image6 ?? 'not-found.jpg' }}" alt="" data-ww="auto" data-hh="auto" data-no-retina> </div>
                                                               @endif
                                                           </li>
                                                           @endforeach
                                                       </ul>
                                                       <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
                                                   </div>
                                               </div>
                                           </section>

<!--=================================
    rev slider -->


    @include('layouts.frontend.car-filter')


<!--=================================
    Start Service -->

    <section class="service_wrap">
        <div class="container px-0">
            <!--            <div class="row justify-content-md-center">-->
                <div class="row">

                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>Services For Your Cars </h2>
                        </div>
                        <ul class="service pl-0">
                            <li>
                                <a href="#" onclick="return getLocation()">
                                    <div class="service_box">
                                        <i class="flaticon-car"></i><br>
                                        <p>Nearby by car</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('cars.index') }}">
                                    <div class="service_box">
                                        <i class="flaticon-tag"></i><br>
                                        <p>Buy Car</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('sell-car') }}">
                                    <div class="service_box">
                                        <i class="flaticon-friend"></i><br>
                                        <p> Sell Car</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('compare-car') }}">
                                    <div class="service_box">
                                        <i class="flaticon-tag"></i><br>
                                        <p>Car comparison</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('cars.index') }}?conditions=new">
                                    <div class="service_box">
                                        <i class="flaticon-money"></i><br>
                                        <p>New car</p>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="">
                                    <div class="service_box">
                                        <i class="flaticon-car"></i><br>
                                        <p>Recindition car</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('cars.index') }}?conditions=used">
                                    <div class="service_box">
                                        <i class="flaticon-umbrella"></i><br>
                                        <p>Used Car</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('dealers.index') }}">
                                    <div class="service_box">
                                        <i class="flaticon-supermarket"></i><br>
                                        <p>Eshowroom</p>
                                    </div>
                                </a>
                            </li>


                            @mobile
                            <div class="sms-service-more">View More</div>

                            <div class="sms-view-content" style="display:none;">
                               @endmobile
                               <li>
                                <a href="{{ route('national-distributors.index') }}">
                                    <div class="service_box">
                                        <i class="flaticon-car"></i><br>
                                        <p>Distributor</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('banks.index') }}">
                                    <div class="service_box">
                                        <i class="fa fa-wpforms" aria-hidden="true"></i><br>
                                        <p>Loan Comparision</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('insurance') }}">
                                    <div class="service_box">
                                        <i class="fa fa-hdd-o" aria-hidden="true"></i><br>
                                        <p>Insurance</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('auction-products') }}?categories=car">
                                    <div class="service_box">
                                        <i class="fa fa-ravelry" aria-hidden="true"></i><br>
                                        <p>Auction</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="service_box">
                                        <i class="fa fa-bookmark-o" aria-hidden="true"></i><br>
                                        <p>Group buying</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('loan-eligibility') }}">
                                    <div class="service_box">
                                        <i class="flaticon-money"></i><br>
                                        <p>Loan Eligible</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="service_box">
                                        <i class="flaticon-car"></i><br>
                                        <p>Brta Service</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('discount-products') }}?categories=car">
                                    <div class="service_box">
                                        <i class="flaticon-friend"></i><br>
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
                <div class="col-lg-4 col-12">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-blog-tab" data-toggle="tab" href="#nav-blog" role="tab" aria-controls="nav-blog" aria-selected="true">Blog</a>
                        </div>
                    </nav>
                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-blog" role="tabpanel" aria-labelledby="nav-blog-tab">
                            <h3 class="blog-title">know more to choose better</h3>
                            @foreach($posts as $post)
                            <div class="blog_wrap p-2 border">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="float-left size-11">
                                            <img src="{{ url('/') }}/assets/blogs/{{ $post->thumbnail ?? 'not-found.jpg' }}" alt="" class="img-fluid">
                                        </div>
                                        <div class="hover_icon">
                                            <a href="{{ route('blogs.show', $post->id) }}" class="hvr_btn"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="blog_info">
                                            <h6>{{ $post->title }}</h6>

                                            <div class="meta">
                                                <p>{{ $post->user->name }} <span>|</span> {{ $post->created_at->format('jS M Y') }}</p>
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
                    <div class="section-title mb-0">
                        <h2>New Cars</h2>
                        <div class="separator"></div>
                    </div>
                    <div class="owl-carousel owl-theme" data-nav-arrow="true" data-items="3" data-md-items="3" data-sm-items="2" data-xs-items="1" data-space="0">
                        @foreach($new_products as $new_product)
                        <div class="item">
                            <div class="bg-white product-hover-effect shadow-sm mx-1">
                                <div class="size-53">
                                    <div class="size-child overflow-hidden">
                                        <img class="position-center h-auto" src="{{ url('/') }}/assets/products/{{ $new_product->id }}/{{ $new_product->image1 ?? 'not-found.jpg' }}" alt="{{ $new_product->name }}">
                                    </div>
                                    <div class="size-child product-hover-show">
                                        <div class="float-left form-control bg-dark text-white text-left border-0 d-inline-block w-auto position-relative height-30 py-1">
                                            <input type="checkbox" id="new-{{ $new_product->id }}" class="compare-checkbox" product-id="{{ $new_product->id }}">
                                            <label for="new-{{ $new_product->id }}">Compare</label>
                                        </div>
                                    </div>
                                    <div class="bg-white product-hover-show2 position-absolute height-30 w-100 line-height-30 bottom-0">
                                        <ul class="list-inline">
                                            <li><i class="fa fa-registered"></i> {{ $new_product->car->manufacturing_year ?? ''}}</li>
                                            <li><i class="fa fa-cog"></i> {{ $new_product->car->steering_gear_type ?? ''}}</li>
                                            <li><i class="fa fa-dashboard"></i> {{ $new_product->car->milage ?? ''}} mi</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="text-dark clearfix px-3 py-1">
                                    <div>
                                        <i class="fa @if($new_product->rating > 0) fa-star @else fa-star-o @endif orange-color"></i>
                                        <i class="fa @if($new_product->rating > 1) fa-star @else fa-star-o @endif orange-color"></i>
                                        <i class="fa @if($new_product->rating > 2) fa-star @else fa-star-o @endif orange-color"></i>
                                        <i class="fa @if($new_product->rating > 3) fa-star @else fa-star-o @endif orange-color"></i>
                                        <i class="fa @if($new_product->rating > 4) fa-star @else fa-star-o @endif orange-color"></i>
                                    </div>
                                    <div class="text-left clearfix">
                                        <span><i class="fa fa-map-marker text-danger"></i> {{ $new_product->supplier->region->name ?? ''}}</span>
                                        <span class="float-right"><i class="fa fa-industry text-warning"></i> {{ $new_product->brand->name ?? ''}}</span>
                                    </div>
                                    <div class="display-6 my-2 owl-heading"><a href="{{ route('products.show', $new_product->id) }}" class="">{{ $new_product->name }}</a></div>
                                    <div class="separator"></div>
                                    <h3 class="owl-heading">Tk.{{ $new_product->msrp }}</h3>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a href="{{ route('cars.index') }}?conditions=new" class="button red mt-3">View All<i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
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
                <a href="{{ route('compare') }}">view now</a>
            </div>
        </div>
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
                </div>
                @endforeach
            </div>
            <div class="tg-prev"><span class="fa fa-angle-left"></span></div>
            <div class="tg-next"><span class="fa fa-angle-right"></span></div>
            <div class="tg-pagination swiper-pagination-clickable swiper-pagination-bullets">
                <span class="swiper-pagination-bullet"></span>
                <span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span>
                <span class="swiper-pagination-bullet"></span>
                <span class="swiper-pagination-bullet"></span>
            </div>
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
                    <span>Used Cars Special Offers</span>
                    <h2>Used Cars</h2>
                    <div class="car-item">
                        <div class="separator"></div>
                    </div>
                    <div class="owl-carousel owl-theme" data-nav-arrow="true" data-items="3" data-md-items="3" data-sm-items="2" data-xs-items="1" data-space="0">
                        @foreach($used_products as $used_product)
                        <div class="item">
                            <div class="bg-white shadow-sm mx-2 mb-3 zoom-parent overflow-hidden shadow-hover-10">
                                <div class="size-53 clearfix">
                                    <div class="size-child zoom-target-1">
                                        <img class="position-center w-100" src="{{ url('/') }}/assets/products/{{ $used_product->id }}/{{ $used_product->image1 ?? 'not-found.jpg' }}" alt="{{ $used_product->name }}">
                                    </div>
                                    <div class="float-left form-control bg-dark text-white text-left border-0 d-inline-block w-auto position-relative height-30 py-1">
                                        <input type="checkbox" id="used-{{ $used_product->id }}" class="compare-checkbox" product-id="{{ $used_product->id }}">
                                        <label for="used-{{ $used_product->id }}">Compare</label>
                                    </div>
                                </div>
                                <div class="text-dark clearfix px-3 py-1">
                                    <div>
                                        <i class="fa @if($used_product->rating > 0) fa-star @else fa-star-o @endif orange-color"></i>
                                        <i class="fa @if($used_product->rating > 1) fa-star @else fa-star-o @endif orange-color"></i>
                                        <i class="fa @if($used_product->rating > 2) fa-star @else fa-star-o @endif orange-color"></i>
                                        <i class="fa @if($used_product->rating > 3) fa-star @else fa-star-o @endif orange-color"></i>
                                        <i class="fa @if($used_product->rating > 4) fa-star @else fa-star-o @endif orange-color"></i>
                                    </div>
                                    <div class="text-left clearfix">
                                        <span><i class="fa fa-map-marker text-danger"></i> {{ $used_product->supplier->region->name ?? ''}}, {{ $used_product->supplier->division->name ?? ''}}</span>
                                        <span class="float-right"><i class="fa fa-industry text-warning"></i> {{ $used_product->brand->name ?? ''}}</span>
                                    </div>
                                    <div class="display-6 my-2 owl-heading"><a href="{{ route('products.show', $used_product->id) }}" class="">{{ $used_product->name }}</a></div>
                                    <div class="separator"></div>
                                    <h3 class="owl-heading">Tk.{{ $used_product->msrp }}</h3>
                                    <div class="row text-left">
                                        <div class="col-6 my-1">
                                            <i class="fa fa-road"></i> {{ $used_product->kms_driven ?? ''}} km driven
                                        </div>
                                        <div class="col-6 my-1">
                                            <i class="fa fa-calendar"></i> {{ $used_product->car->milage ?? ''}} km milage
                                        </div>
                                        <div class="col-6 my-1">
                                            <i class="fa fa-calendar"></i> {{ $used_product->model->name ?? ''}} model
                                        </div>
                                        <div class="col-6 my-1">
                                            <i class="fa fa-car"></i> {{ $used_product->car->fuel_type->name ?? ''}}
                                        </div>
                                        <div class="col-6 my-1">
                                            <i class="fa fa-hourglass-end"></i> {{ $used_product->brand->name ?? ''}} brand
                                        </div>
                                        <div class="col-6 my-1">
                                            <i class="fa fa-superpowers"></i> {{ $used_product->car->maximum_power ?? ''}} Watt
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a href="{{ route('cars.index') }}?conditions=used" class="button red mt-3">View All<i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
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
                    <div class="section-title mb-0">
                        <span>Top 10 Popular car</span>
                        <h2>Popular Cars</h2>
                        <div class="separator"></div>
                    </div>
                    <div class="owl-carousel owl-theme" data-nav-arrow="true" data-items="4" data-md-items="4" data-sm-items="2" data-xs-items="1" data-space="0">
                        @foreach($popular_products as $new_product)
                        <div class="item">
                            <div class="bg-white product-hover-effect shadow-sm mx-1">
                                <div class="size-53">
                                    <div class="size-child overflow-hidden">
                                        <img class="position-center h-auto" src="{{ url('/') }}/assets/products/{{ $new_product->id }}/{{ $new_product->image1 ?? 'not-found.jpg' }}" alt="{{ $new_product->name }}">
                                    </div>
                                    <div class="size-child product-hover-show">
                                        <div class="float-left form-control bg-dark text-white text-left border-0 d-inline-block w-auto position-relative height-30 py-1">
                                            <input type="checkbox" id="new-{{ $new_product->id }}" class="compare-checkbox" product-id="{{ $new_product->id }}">
                                            <label for="new-{{ $new_product->id }}">Compare</label>
                                        </div>
                                    </div>
                                    <div class="bg-white product-hover-show2 position-absolute height-30 w-100 line-height-30 bottom-0">
                                        <ul class="list-inline">
                                            <li><i class="fa fa-registered"></i> {{ $new_product->car->manufacturing_year ?? ''}}</li>
                                            <li><i class="fa fa-cog"></i> {{ $new_product->car->steering_gear_type ?? ''}}</li>
                                            <li><i class="fa fa-dashboard"></i> {{ $new_product->car->milage ?? ''}} mi</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="text-dark clearfix px-3 py-1">
                                    <div class="text-center">
                                        <i class="fa @if($new_product->rating > 0) fa-star @else fa-star-o @endif orange-color"></i>
                                        <i class="fa @if($new_product->rating > 1) fa-star @else fa-star-o @endif orange-color"></i>
                                        <i class="fa @if($new_product->rating > 2) fa-star @else fa-star-o @endif orange-color"></i>
                                        <i class="fa @if($new_product->rating > 3) fa-star @else fa-star-o @endif orange-color"></i>
                                        <i class="fa @if($new_product->rating > 4) fa-star @else fa-star-o @endif orange-color"></i>
                                    </div>
                                    <div class="text-left clearfix">
                                        <span><i class="fa fa-map-marker text-danger"></i> {{ $new_product->supplier->region->name ?? ''}}</span>
                                        <span class="float-right"><i class="fa fa-industry text-warning"></i> {{ $new_product->brand->name ?? ''}}</span>
                                    </div>
                                    <div class="display-6 my-2 owl-heading"><a href="{{ route('products.show', $new_product->id) }}" class="">{{ $new_product->name }}</a></div>
                                    <div class="separator"></div>
                                    <h3 class="owl-heading">Tk.{{ $new_product->msrp }}</h3>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a href="{{ route('popular-products') }}?categories=car" class="button red mt-3">View All<i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </section>
<!--=================================
    End Popular car -->

<section class="pt-0">
    <div class="container px-0">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="section-title mb-0">
                    <span>Top 10 Recondition cars</span>
                    <h2>Recondition Cars</h2>
                    <div class="separator"></div>
                </div>
                <div class="owl-carousel owl-theme" data-nav-arrow="true" data-items="3" data-md-items="3" data-sm-items="2" data-xs-items="1" data-space="0">
                    @foreach($recondition_products as $new_product)
                    <div class="item">
                        <div class="bg-white product-hover-effect shadow-sm mx-2">
                            <div class="size-53">
                                <div class="size-child overflow-hidden">
                                    <img class="position-center h-auto" src="{{ url('/') }}/assets/products/{{ $new_product->id }}/{{ $new_product->image1 ?? 'not-found.jpg' }}" alt="{{ $new_product->name }}">
                                </div>
                                <div class="size-child product-hover-show">
                                    <div class="float-left form-control bg-dark text-white text-left border-0 d-inline-block w-auto position-relative height-30 py-1">
                                        <input type="checkbox" id="new-{{ $new_product->id }}" class="compare-checkbox" product-id="{{ $new_product->id }}">
                                        <label for="new-{{ $new_product->id }}">Compare</label>
                                    </div>
                                </div>
                                <div class="bg-white product-hover-show2 position-absolute height-30 w-100 line-height-30 bottom-0">
                                    <ul class="list-inline">
                                        <li><i class="fa fa-registered"></i> {{ $new_product->car->manufacturing_year ?? ''}}</li>
                                        <li><i class="fa fa-cog"></i> {{ $new_product->car->steering_gear_type ?? ''}}</li>
                                        <li><i class="fa fa-dashboard"></i> {{ $new_product->car->milage ?? ''}} mi</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="text-dark clearfix px-3 py-1">
                                <div class="text-center">
                                    <i class="fa @if($new_product->rating > 0) fa-star @else fa-star-o @endif orange-color"></i>
                                    <i class="fa @if($new_product->rating > 1) fa-star @else fa-star-o @endif orange-color"></i>
                                    <i class="fa @if($new_product->rating > 2) fa-star @else fa-star-o @endif orange-color"></i>
                                    <i class="fa @if($new_product->rating > 3) fa-star @else fa-star-o @endif orange-color"></i>
                                    <i class="fa @if($new_product->rating > 4) fa-star @else fa-star-o @endif orange-color"></i>
                                </div>
                                <div class="text-left clearfix">
                                    <span><i class="fa fa-map-marker text-danger"></i> {{ $new_product->supplier->region->name ?? ''}}, {{ $new_product->supplier->division->name ?? ''}}</span>
                                    <span class="float-right"><i class="fa fa-industry text-warning"></i> {{ $new_product->brand->name ?? ''}}</span>
                                </div>
                                <div class="display-6 my-2 owl-heading"><a href="{{ route('products.show', $new_product->id) }}" class="">{{ $new_product->name }}</a></div>
                                <div class="separator"></div>
                                <h3 class="owl-heading">Tk.{{ $new_product->msrp }}</h3>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('cars.index') }}?conditions=reconditioned" class="button red mt-3">View All<i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</section>


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
                        <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><i
                            class="fa fa-angle-left fa-2x"></i></button><button type="button" role="presentation" class="owl-next"><i class="fa fa-angle-right fa-2x"></i></button>
                        </div>
                        <div class="owl-dots"><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot active"><span></span></button></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <form class="ajax-upload d-none" action="{{ route('cars.index') }}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="lat" id="lat" />
        <input type="hidden" name="lon" id="lon" />
        <button id="lat-lon-submit" class="btn btn-theme" type="submit">Update</button>
    </form>

<!--=================================
    End business partner -->

    @endsection
    @section('script')
    <script>
        (function ($) {
            "use strict";

            var tpj = jQuery;
            var revapi2;
            tpj(document).ready(function () {
                if (tpj("#rev_slider_2_1").revolution == undefined) {
                    revslider_showDoubleJqueryError("#rev_slider_2_1");
                } else {
                    revapi2 = tpj("#rev_slider_2_1").show().revolution({
                        sliderType: "standard",
                        sliderLayout: "fullwidth",
                        dottedOverlay: "none",
                        delay: 9000,
                        navigation: {
                            keyboardNavigation: "off",
                            keyboard_direction: "horizontal",
                            mouseScrollNavigation: "off",
                            mouseScrollReverse: "default",
                            onHoverStop: "off",
                            bullets: {
                                enable: true,
                                hide_onmobile: false,
                                style: "hermes",
                                hide_onleave: false,
                                direction: "vertical",
                                h_align: "right",
                                v_align: "center",
                                h_offset: 30,
                                v_offset: 50,
                                space: 10,
                                tmp: ''
                            }
                        },
                        visibilityLevels: [1240, 1024, 778, 480],
                        gridwidth: 1570,
                        gridheight: 1000,
                        lazyType: "none",
                        shadow: 0,
                        spinner: "spinner3",
                        stopLoop: "off",
                        stopAfterLoops: -1,
                        stopAtSlide: -1,
                        shuffle: "off",
                        autoHeight: "off",
                        disableProgressBar: "on",
                        hideThumbsOnMobile: "off",
                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        debugMode: false,
                        fallbacks: {
                            simplifyAll: "off",
                            nextSlideOnWindowFocus: "off",
                            disableFocusListener: false,
                        }
                    });
                }
            });
        })(jQuery);
    </script>
    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            }
            return false;
        }

        function showPosition(position) {
            window.location = "{{ route('cars.index') }}?lat="+position.coords.latitude+"&lon="+position.coords.longitude;
        }
        function addCoordinate(condition) {
            var container = '';
            if(condition == 'new') {
                container = document.getElementById('filter-new');
            } else if(condition == 'used') {
                container = document.getElementById('filter-used');
            } else if(condition == 'recondition') {
                container = document.getElementById('filter-recondition');
            }

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(p) {
                    var lat = container.querySelector('input[name="lat"]')
                    if(!lat) {
                        var input = document.createElement("input");
                        input.type = "hidden";
                        input.name = "lat";
                        input.value = p.coords.latitude;
                        container.appendChild(input);
                        var inp = document.createElement("input");
                        inp.type = "hidden";
                        inp.name = "lon";
                        inp.value = p.coords.longitude;
                        container.appendChild(inp);
                    }
                });
            }
        }
    </script>
    <script>
        (function() {
            var filter = new Vue({
                el: '#filter-form',
                data: {
                    input: '',
                    response: ''
                },
                methods: {
                    getCurrentLocation: function () {
                        var _this = this;
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(function(p) {
                                _this.regionByPosition(p);
                            });
                        }
                    },
                    regionByPosition: function(p) {
                        var _this = this;
                        $.ajax({
                            url: "{{ route('get-region') }}?lat="+p.coords.latitude+"&lon="+p.coords.longitude,
                            dataType: "json",
                            success: function(result){
                                _this.input = result.name;
                            }
                        });
                    }
                },
                mounted:function(){
                    this.getCurrentLocation();
                },
                watch: {
                    input: function(val) {
                        var _this = this;
                        $.ajax({
                            url: "{{ route('get-regions') }}?q="+val,
                            dataType: "json",
                            success: function(result){
                                if(val)
                                    _this.response = result;
                                else
                                    _this.response = '';
                            }
                        });
                    }
                }
            });
        })();

    </script>
    <script>
        (function() {
            localStorage.category_id = 1;
        })();
    </script>
    @endsection

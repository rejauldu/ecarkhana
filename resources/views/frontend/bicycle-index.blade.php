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

<!--=================================
Bike slider -->


@include('layouts.frontend.bicycle-filter')


<!--=================================
Start Service -->

<section class="service_wrap">
    <div class="container">
        <!--            <div class="row justify-content-md-center">-->
        <div class="row">

            <div class="col-md-12">
                <div class="section-title">
                    <span>What Our Happy Clients say about us</span>
                    <h2>Services For Your Bicycle </h2>
                </div>
                <ul class="service">
                    <li>
                        <a href="car-listing.html">
                            <div class="service_box">
                                <i class="flaticon-car"></i><br>
                                <p>Nearby bicycle </p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <div class="service_box">
                                <i class="flaticon-tag"></i><br>
                                <p>Fit calculator</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="dealer-list.html">
                            <div class="service_box">
                                <i class="flaticon-friend"></i><br>
                                <p> Buy bicycle </p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <div class="service_box">
                                <i class="flaticon-tag"></i><br>
                                <p>Sell bicycle </p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <div class="service_box">
                                <i class="flaticon-money"></i><br>
                                <p>Comparision </p>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="">
                            <div class="service_box">
                                <i class="flaticon-car"></i><br>
                                <p>New bicycle / bike</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="car-insurance.html">
                            <div class="service_box">
                                <i class="flaticon-umbrella"></i><br>
                                <p>Used bicycle </p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="single-accessories.html">
                            <div class="service_box">
                                <i class="flaticon-supermarket"></i><br>
                                <p>National distributor </p>
                            </div>
                        </a>
                    </li>

                    <div class="sms-service-more">View More</div>
                    <div class="sms-view-content" style="display:none;">

                        <li>
                            <a href="">
                                <div class="service_box">
                                    <i class="flaticon-car"></i><br>
                                    <p>Loan comparison</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="compare-car.html">
                                <div class="service_box">
                                    <i class="fa fa-wpforms" aria-hidden="true"></i><br>
                                    <p>Nearby workshop</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <div class="service_box">
                                    <i class="fa fa-hdd-o" aria-hidden="true"></i><br>
                                    <p>auction</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <div class="service_box">
                                    <i class="fa fa-ravelry" aria-hidden="true"></i><br>
                                    <p>group buying</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <div class="service_box">
                                    <i class="fa fa-bookmark-o" aria-hidden="true"></i><br>
                                    <p>Blog </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="car-loan.html">
                                <div class="service_box">
                                    <i class="flaticon-money"></i><br>
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

<!--=================================
End Service -->



<!--=================================
Start Used Cars In Your City And Budget -->

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
                        <div class="blog_wrap my-4 p-2 border">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="img_holder float-left">
                                        <img src="images/bicycle/new-Cycle-01.jpg" alt="" class="img-fluid">
                                        <div class="hover_icon">
                                            <a href="single-blog.html" class="hvr_btn"><i
                                                    class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="blog_info">
                                        <h6>New Maruti Suzuki Ertiga</h6>

                                        <div class="meta">
                                            <p>Merry Devas <span>|</span>On 15th november,2018</p>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="blog_wrap my-4 p-2 border">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="img_holder float-left">
                                        <img src="images/bicycle/new-Cycle-02.jpg" alt="" class="img-fluid">
                                        <div class="hover_icon">
                                            <a href="single-blog.html" class="hvr_btn"><i
                                                    class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="blog_info">
                                        <h6>Is It Worth Buying A Third Party Car?</h6>

                                        <div class="meta">
                                            <p>Merry Devas <span>|</span>On 15th november,2018</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="tab-pane fade" id="nav-chat" role="tabpanel" aria-labelledby="nav-chat-tab">-->
                    <!--    Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt-->
                    <!--    irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit-->
                    <!--    do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.-->
                    <!--</div>-->
                </div>
            </div>

            <div class="col-lg-8 col-sm-12">
                <div class="section-title">
                    <span>What Our Happy Clients say about us</span>
                    <h2>New Bicycles </h2>
                    <div class="separator"></div>
                </div>
                <div class="owl-carousel owl-theme" data-nav-arrow="true" data-items="3" data-md-items="3" data-sm-items="2" data-xs-items="1" data-space="20">
                    <div class="item">
                        <div class="car-item text-center">
                            <div class="car-image">
                                <img class="img-fluid" src="images/bicycle/new-Cycle-01.jpg" alt="">
                                <div class="car-overlay-banner">
                                    <ul>
                                        <li>
                                            <div class="compare_item">
                                                <div class="checkbox">
                                                    <input type="checkbox" class="compare-checkbox" id="compare2">
                                                    <label for="compare2">Compare</label>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="car-list">
                                <ul class="list-inline">
                                    <li><a href="" class="sms-wishlist" data-placement="top" tabindex="0" data-toggle="tooltip" title="Wishlist"><i
                                                class="fa fa-heart-o"></i>Wishlist</a></li>
                                    <li><a href="" class="sms-cart" data-placement="top" tabindex="0" data-toggle="tooltip" title="Cart"><i
                                                class="fa fa-cart-plus"></i>Cart</a></li>
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
                                <a href="single-bike-product.html">Acura Rsx</a>
                                <div class="separator"></div>
                                <div class="price">
                                    <span class="old-price">$35,568</span>
                                    <span class="new-price">$32,698 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="car-item text-center">
                            <div class="car-image">
                                <img class="img-fluid" src="images/bicycle/new-Cycle-02.jpg" alt="">
                                <div class="car-overlay-banner">
                                    <ul>
                                        <li>
                                            <div class="compare_item">
                                                <div class="checkbox">
                                                    <input type="checkbox" class="compare-checkbox" id="compare2">
                                                    <label for="compare2">Compare</label>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="car-list">
                                <ul class="list-inline">
                                    <li><a href="" class="sms-wishlist" data-placement="top" tabindex="0" data-toggle="tooltip" title="Wishlist"><i
                                                class="fa fa-heart-o"></i>Wishlist</a></li>
                                    <li><a href="" class="sms-cart" data-placement="top" tabindex="0" data-toggle="tooltip" title="Cart"><i
                                                class="fa fa-cart-plus"></i>Cart</a></li>
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
                                <a href="single-bike-product.html">Lexus GS 450h</a>
                                <div class="separator"></div>
                                <div class="price">
                                    <span class="old-price">$35,568</span>
                                    <span class="new-price">$32,698 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="car-item text-center">
                            <div class="car-image">
                                <img class="img-fluid" src="images/bicycle/new-Cycle-03.jpg" alt="">
                                <div class="car-overlay-banner">
                                    <ul>
                                        <li>
                                            <div class="compare_item">
                                                <div class="checkbox">
                                                    <input type="checkbox" class="compare-checkbox" id="compare2">
                                                    <label for="compare2">Compare</label>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="car-list">
                                <ul class="list-inline">
                                    <li><a href="" class="sms-wishlist" data-placement="top" tabindex="0" data-toggle="tooltip" title="Wishlist"><i
                                                class="fa fa-heart-o"></i>Wishlist</a></li>
                                    <li><a href="" class="sms-cart" data-placement="top" tabindex="0" data-toggle="tooltip" title="Cart"><i
                                                class="fa fa-cart-plus"></i>Cart</a></li>
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
                                <a href="single-bike-product.html">GTA 5 Lowriders DLC</a>
                                <div class="separator"></div>
                                <div class="price">
                                    <span class="old-price">$35,568</span>
                                    <span class="new-price">$32,698 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="car-item text-center">
                            <div class="car-image">
                                <img class="img-fluid" src="images/bicycle/new-Cycle-01.jpg" alt="">
                                <div class="car-overlay-banner">
                                    <ul>
                                        <li>
                                            <div class="compare_item">
                                                <div class="checkbox">
                                                    <input type="checkbox" class="compare-checkbox" id="compare2">
                                                    <label for="compare2">Compare</label>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="car-list">
                                <ul class="list-inline">
                                    <li><a href="" class="sms-wishlist" data-placement="top" tabindex="0" data-toggle="tooltip" title="Wishlist"><i
                                                class="fa fa-heart-o"></i>Wishlist</a></li>
                                    <li><a href="" class="sms-cart" data-placement="top" tabindex="0" data-toggle="tooltip" title="Cart"><i
                                                class="fa fa-cart-plus"></i>Cart</a></li>
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
                                <a href="single-bike-product.html">Toyota avalon hybrid </a>
                                <div class="separator"></div>
                                <div class="price">
                                    <span class="old-price">$35,568</span>
                                    <span class="new-price">$32,698 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="car-item text-center">
                            <div class="car-image">
                                <img class="img-fluid" src="images/bicycle/new-Cycle-02.jpg" alt="">
                                <div class="car-overlay-banner">
                                    <ul>
                                        <li>
                                            <div class="compare_item">
                                                <div class="checkbox">
                                                    <input type="checkbox" class="compare-checkbox" id="compare2">
                                                    <label for="compare2">Compare</label>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="car-list">
                                <ul class="list-inline">
                                    <li><a href="" class="sms-wishlist" data-placement="top" tabindex="0" data-toggle="tooltip" title="Wishlist"><i
                                                class="fa fa-heart-o"></i>Wishlist</a></li>
                                    <li><a href="" class="sms-cart" data-placement="top" tabindex="0" data-toggle="tooltip" title="Cart"><i
                                                class="fa fa-cart-plus"></i>Cart</a></li>
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
                                <a href="single-bike-product.html">Hyundai santa fe sport </a>
                                <div class="separator"></div>
                                <div class="price">
                                    <span class="old-price">$35,568</span>
                                    <span class="new-price">$32,698 </span>
                                </div>
                            </div>
                        </div>
                    </div>
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
            <a href="compare-car.html" target="_blank">view now</a>
        </div>
    </div>
    <div id="tg-compare-slider" class="tg-compare-slider tg-comparebox swiper-container-horizontal swiper-container-fade">
        <div class="swiper-wrapper" style="transition-duration: 0ms;">
            <div class="swiper-slide swiper-slide-prev" style="width: 1149px; opacity: 1; transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
                <div class="tg-compare tg-compare-left">
                    <figure class="tg-leftimginout">
                        <img src="images/bicycle/compare-cycle-02.png" alt="image description">
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
                        <img src="images/bicycle/compare-cycle.png" alt="image description">
                    </figure>
                </div>
            </div>
            <div class="swiper-slide swiper-slide-active" style="width: 1149px; opacity: 1; transform: translate3d(-1149px, 0px, 0px); transition-duration: 0ms;">
                <div class="tg-compare tg-compare-left">
                    <figure>
                        <img src="images/bicycle/compare-cycle-02.png" alt="image description">
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
                        <img src="images/bicycle/compare-cycle.png" alt="image description">
                    </figure>
                </div>
            </div>
            <div class="swiper-slide swiper-slide-next" style="width: 1149px; opacity: 0; transform: translate3d(-2298px, 0px, 0px); transition-duration: 0ms;">
                <div class="tg-compare tg-compare-left">
                    <figure>
                        <img src="images/bicycle/compare-cycle-02.png" alt="image description">
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
                        <img src="images/bicycle/compare-cycle.png" alt="image description">
                    </figure>
                </div>
            </div>
            <div class="swiper-slide" style="width: 1149px; opacity: 0; transform: translate3d(-3447px, 0px, 0px); transition-duration: 0ms;">
                <div class="tg-compare tg-compare-left">
                    <figure>
                        <img src="images/bicycle/compare-cycle-02.png" alt="image description">
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
                        <img src="images/bicycle/compare-cycle.png" alt="image description">
                    </figure>
                </div>
            </div>
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

<section class="upcoming">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <span>Upcoming Bike Special Offers</span>
                    <h2>Upcoming Bicycles </h2>
                    <div class="separator"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel" data-nav-arrow="true" data-items="3" data-md-items="3" data-sm-items="2" data-xs-items="1" data-space="20">
                    <div class="item">
                        <div class="featured-car-list">
                            <div class="featured-car-img">
                                <a href=""><img src="images/bicycle/upcoming-cycles-01.jpg" class="img-responsive" alt="Image"></a>
                                <div class="label_icon">New</div>
                                <div class="compare_item">
                                    <div class="checkbox">
                                        <input type="checkbox" class="compare-checkbox" id="compare">
                                        <label for="compare">Compare</label>
                                    </div>
                                </div>
                                <div class="sms-ecommerce-add">
                                    <li><a href="" class="sms-wishlist" data-placement="top" tabindex="0" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                    </li>
                                    <li><a href="" class="sms-cart" data-placement="top" tabindex="0" data-toggle="tooltip" title="Cart"><i class="fa fa-cart-plus"></i></a>
                                    </li>
                                </div>
                            </div>
                            <div class="featured-car-content">
                                <h6><a href="single-bike-product.html">Maserati QUATTROPORTE 1,6</a></h6>
                                <div class="price_info">
                                    <p class="featured-price">$90,000</p>
                                    <div class="car-location"><span><i class="fa fa-map-marker"
                                                                       aria-hidden="true"></i> Colorado, USA</span></div>
                                </div>
                                <ul>
                                    <li><i class="fa fa-road" aria-hidden="true"></i>0,000 km</li>
                                    <li><i class="fa fa-tachometer" aria-hidden="true"></i>30.000 miles</li>
                                    <li><i class="fa fa-calendar" aria-hidden="true"></i>2005 model</li>
                                    <li><i class="fa fa-superpowers" aria-hidden="true"></i>143 kW</li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="featured-car-list">
                            <div class="featured-car-img">
                                <a href=""><img src="images/bicycle/upcoming-cycles-02.jpg" class="img-responsive" alt="Image"></a>
                                <div class="label_icon">Used</div>
                                <div class="compare_item">
                                    <div class="checkbox">
                                        <input type="checkbox" class="compare-checkbox" id="compare2">
                                        <label for="compare2">Compare</label>
                                    </div>
                                </div>
                                <div class="sms-ecommerce-add">
                                    <li><a href="" class="sms-wishlist" data-placement="top" tabindex="0" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                    </li>
                                    <li><a href="" class="sms-cart" data-placement="top" tabindex="0" data-toggle="tooltip" title="Cart"><i class="fa fa-cart-plus"></i></a>
                                    </li>
                                </div>
                            </div>
                            <div class="featured-car-content">
                                <h6><a href="single-bike-product.html">Mazda CX-5 SX, V6, ABS, Sunroof</a></h6>
                                <div class="price_info">
                                    <p class="featured-price">$90,000</p>
                                    <div class="car-location"><span><i class="fa fa-map-marker"
                                                                       aria-hidden="true"></i> Colorado, USA</span></div>
                                </div>
                                <ul>
                                    <li><i class="fa fa-road" aria-hidden="true"></i>0,000 km</li>
                                    <li><i class="fa fa-tachometer" aria-hidden="true"></i>30.000 miles</li>
                                    <li><i class="fa fa-calendar" aria-hidden="true"></i>2005 model</li>
                                    <li><i class="fa fa-superpowers" aria-hidden="true"></i>143 kW</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="featured-car-list">
                            <div class="featured-car-img">
                                <a href=""><img src="images/bicycle/upcoming-cycles-03.jpg" class="img-responsive" alt="Image"></a>
                                <div class="label_icon">Used</div>
                                <div class="compare_item">
                                    <div class="checkbox">
                                        <input type="checkbox" class="compare-checkbox" id="compare3">
                                        <label for="compare3">Compare</label>
                                    </div>
                                </div>
                                <div class="sms-ecommerce-add">
                                    <li><a href="" class="sms-wishlist" data-placement="top" tabindex="0" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                    </li>
                                    <li><a href="" class="sms-cart" data-placement="top" tabindex="0" data-toggle="tooltip" title="Cart"><i class="fa fa-cart-plus"></i></a>
                                    </li>
                                </div>
                            </div>
                            <div class="featured-car-content">
                                <h6><a href="single-bike-product.html">BMW 535i</a></h6>
                                <div class="price_info">
                                    <p class="featured-price">$90,000</p>
                                    <div class="car-location"><span><i class="fa fa-map-marker"
                                                                       aria-hidden="true"></i> Colorado, USA</span></div>
                                </div>
                                <ul>
                                    <li><i class="fa fa-road" aria-hidden="true"></i>0,000 km</li>
                                    <li><i class="fa fa-tachometer" aria-hidden="true"></i>30.000 miles</li>
                                    <li><i class="fa fa-calendar" aria-hidden="true"></i>2005 model</li>
                                    <li><i class="fa fa-superpowers" aria-hidden="true"></i>143 kW</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="featured-car-list">
                            <div class="featured-car-img">
                                <a href=""><img src="images/bicycle/upcoming-cycles-01.jpg" class="img-responsive" alt="Image"></a>
                                <div class="label_icon">Used</div>
                                <div class="compare_item">
                                    <div class="checkbox">
                                        <input type="checkbox" class="compare-checkbox" id="compare3">
                                        <label for="compare3">Compare</label>
                                    </div>
                                </div>
                                <div class="sms-ecommerce-add">
                                    <li><a href="" class="sms-wishlist" data-placement="top" tabindex="0" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                    </li>
                                    <li><a href="" class="sms-cart" data-placement="top" tabindex="0" data-toggle="tooltip" title="Cart"><i class="fa fa-cart-plus"></i></a>
                                    </li>
                                </div>
                            </div>
                            <div class="featured-car-content">
                                <h6><a href="single-bike-product.html">BMW 535i</a></h6>
                                <div class="price_info">
                                    <p class="featured-price">$90,000</p>
                                    <div class="car-location"><span><i class="fa fa-map-marker"
                                                                       aria-hidden="true"></i> Colorado, USA</span></div>
                                </div>
                                <ul>
                                    <li><i class="fa fa-road" aria-hidden="true"></i>0,000 km</li>
                                    <li><i class="fa fa-tachometer" aria-hidden="true"></i>30.000 miles</li>
                                    <li><i class="fa fa-calendar" aria-hidden="true"></i>2005 model</li>
                                    <li><i class="fa fa-superpowers" aria-hidden="true"></i>143 kW</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="featured-car-list">
                            <div class="featured-car-img">
                                <a href=""><img src="images/bicycle/upcoming-cycles-02.jpg" class="img-responsive" alt="Image"></a>
                                <div class="label_icon">Used</div>
                                <div class="compare_item">
                                    <div class="checkbox">
                                        <input type="checkbox" class="compare-checkbox" id="compare2">
                                        <label for="compare2">Compare</label>
                                    </div>
                                </div>
                                <div class="sms-ecommerce-add">
                                    <li><a href="" class="sms-wishlist" data-placement="top" tabindex="0" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                    </li>
                                    <li><a href="" class="sms-cart" data-placement="top" tabindex="0" data-toggle="tooltip" title="Cart"><i class="fa fa-cart-plus"></i></a>
                                    </li>
                                </div>
                            </div>
                            <div class="featured-car-content">
                                <h6><a href="single-bike-product.html">Mazda CX-5 SX, V6, ABS, Sunroof</a></h6>
                                <div class="price_info">
                                    <p class="featured-price">$90,000</p>
                                    <div class="car-location"><span><i class="fa fa-map-marker"
                                                                       aria-hidden="true"></i> Colorado, USA</span></div>
                                </div>
                                <ul>
                                    <li><i class="fa fa-road" aria-hidden="true"></i>0,000 km</li>
                                    <li><i class="fa fa-tachometer" aria-hidden="true"></i>30.000 miles</li>
                                    <li><i class="fa fa-calendar" aria-hidden="true"></i>2005 model</li>
                                    <li><i class="fa fa-superpowers" aria-hidden="true"></i>143 kW</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="featured-car-list">
                            <div class="featured-car-img">
                                <a href=""><img src="images/bicycle/upcoming-cycles-03.jpg" class="img-responsive" alt="Image"></a>
                                <div class="label_icon">Used</div>
                                <div class="compare_item">
                                    <div class="checkbox">
                                        <input type="checkbox" class="compare-checkbox" id="compare3">
                                        <label for="compare3">Compare</label>
                                    </div>
                                </div>
                                <div class="sms-ecommerce-add">
                                    <li><a href="" class="sms-wishlist" data-placement="top" tabindex="0" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                    </li>
                                    <li><a href="" class="sms-cart" data-placement="top" tabindex="0" data-toggle="tooltip" title="Cart"><i class="fa fa-cart-plus"></i></a>
                                    </li>
                                </div>
                            </div>
                            <div class="featured-car-content">
                                <h6><a href="single-bike-product.html">BMW 535i</a></h6>
                                <div class="price_info">
                                    <p class="featured-price">$90,000</p>
                                    <div class="car-location"><span><i class="fa fa-map-marker"
                                                                       aria-hidden="true"></i> Colorado, USA</span></div>
                                </div>
                                <ul>
                                    <li><i class="fa fa-road" aria-hidden="true"></i>0,000 km</li>
                                    <li><i class="fa fa-tachometer" aria-hidden="true"></i>30.000 miles</li>
                                    <li><i class="fa fa-calendar" aria-hidden="true"></i>2005 model</li>
                                    <li><i class="fa fa-superpowers" aria-hidden="true"></i>143 kW</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="car-listing.html" target="_blank" class="button red">View All<i
                    class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
        </div>
    </div>
</section>

<!--=================================
End Featured Cars -->


<!--=================================
Start Banner -->
<section class="sms-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="wpb_single_image">
                    <img src="images/bicycle/Cycle-ad-01.jpg">
                </div>
            </div>
            <div class="col-md-6">
                <div class="wpb_single_image">
                    <img src="images/bicycle/Cycle-ad-02.jpg">
                </div>
            </div>
        </div>
    </div>
</section>

<!--=================================
End Banner -->



<!--=================================
Start Popular car -->

<section id="popular">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <span>Top 10 Popular bike in Dhaka</span>
                    <h2>Popular Bicycles </h2>
                    <div class="separator"></div>
                </div>
                <div class="owl-carousel owl-theme" data-nav-arrow="true" data-items="4" data-md-items="4" data-sm-items="2" data-xs-items="1" data-space="20">
                    <div class="item">
                        <div class="car-item text-center">
                            <div class="car-image">
                                <img class="img-fluid" src="images/bicycle/new-Cycle-01.jpg" alt="">
                                <div class="car-overlay-banner">
                                    <ul>
                                        <li>
                                            <div class="compare_item">
                                                <div class="checkbox">
                                                    <input type="checkbox" class="compare-checkbox" id="compare2">
                                                    <label for="compare2">Compare</label>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="car-list">
                                <ul class="list-inline">
                                    <li><a href="" class="sms-wishlist" data-toggle="tooltip" data-placement="bottom" title="Wishlist"><i
                                                class="fa fa-heart-o"></i>Wishlist</a>
                                    </li>
                                    <li><a href="" class="sms-cart" data-toggle="tooltip" data-placement="bottom" title="Cart"><i
                                                class="fa fa-cart-plus"></i>Cart</a>
                                    </li>
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
                                <a href="single-bike-product.html">Acura Rsx</a>
                                <div class="separator"></div>
                                <div class="price">
                                    <span class="old-price">$35,568</span>
                                    <span class="new-price">$32,698 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="car-item text-center">
                            <div class="car-image">
                                <img class="img-fluid" src="images/bicycle/new-Cycle-02.jpg" alt="">
                                <div class="car-overlay-banner">
                                    <ul>
                                        <li>
                                            <div class="compare_item">
                                                <div class="checkbox">
                                                    <input type="checkbox" class="compare-checkbox" id="compare2">
                                                    <label for="compare2">Compare</label>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="car-list">
                                <ul class="list-inline">
                                    <li><a href="" class="sms-wishlist" data-toggle="tooltip" data-placement="bottom" title="Wishlist"><i
                                                class="fa fa-heart-o"></i>Wishlist</a>
                                    </li>
                                    <li><a href="" class="sms-cart" data-toggle="tooltip" data-placement="bottom" title="Cart"><i
                                                class="fa fa-cart-plus"></i>Cart</a>
                                    </li>
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
                                <a href="single-bike-product.html">Lexus GS 450h</a>
                                <div class="separator"></div>
                                <div class="price">
                                    <span class="old-price">$35,568</span>
                                    <span class="new-price">$32,698 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="car-item text-center">
                            <div class="car-image">
                                <img class="img-fluid" src="images/bicycle/new-Cycle-03.jpg" alt="">
                                <div class="car-overlay-banner">
                                    <ul>
                                        <li>
                                            <div class="compare_item">
                                                <div class="checkbox">
                                                    <input type="checkbox" class="compare-checkbox" id="compare2">
                                                    <label for="compare2">Compare</label>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="car-list">
                                <ul class="list-inline">
                                    <li><a href="" class="sms-wishlist" data-toggle="tooltip" data-placement="bottom" title="Wishlist"><i
                                                class="fa fa-heart-o"></i>Wishlist</a>
                                    </li>
                                    <li><a href="" class="sms-cart" data-toggle="tooltip" data-placement="bottom" title="Cart"><i
                                                class="fa fa-cart-plus"></i>Cart</a>
                                    </li>
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
                                <a href="single-bike-product.html">GTA 5 Lowriders DLC</a>
                                <div class="separator"></div>
                                <div class="price">
                                    <span class="old-price">$35,568</span>
                                    <span class="new-price">$32,698 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="car-item text-center">
                            <div class="car-image">
                                <img class="img-fluid" src="images/bicycle/new-Cycle-01.jpg" alt="">
                                <div class="car-overlay-banner">
                                    <ul>
                                        <li>
                                            <div class="compare_item">
                                                <div class="checkbox">
                                                    <input type="checkbox" class="compare-checkbox" id="compare2">
                                                    <label for="compare2">Compare</label>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="car-list">
                                <ul class="list-inline">
                                    <li><a href="" class="sms-wishlist" data-toggle="tooltip" data-placement="bottom" title="Wishlist"><i
                                                class="fa fa-heart-o"></i>Wishlist</a>
                                    </li>
                                    <li><a href="" class="sms-cart" data-toggle="tooltip" data-placement="bottom" title="Cart"><i
                                                class="fa fa-cart-plus"></i>Cart</a>
                                    </li>
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
                                <a href="single-bike-product.html">Toyota avalon hybrid </a>
                                <div class="separator"></div>
                                <div class="price">
                                    <span class="old-price">$35,568</span>
                                    <span class="new-price">$32,698 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="car-item text-center">
                            <div class="car-image">
                                <img class="img-fluid" src="images/bicycle/new-Cycle-02.jpg" alt="">
                                <div class="car-overlay-banner">
                                    <ul>
                                        <li>
                                            <div class="compare_item">
                                                <div class="checkbox">
                                                    <input type="checkbox" class="compare-checkbox" id="compare2">
                                                    <label for="compare2">Compare</label>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="car-list">
                                <ul class="list-inline">
                                    <li><a href="" class="sms-wishlist" data-toggle="tooltip" data-placement="bottom" title="Wishlist"><i
                                                class="fa fa-heart-o"></i>Wishlist</a>
                                    </li>
                                    <li><a href="" class="sms-cart" data-toggle="tooltip" data-placement="bottom" title="Cart"><i
                                                class="fa fa-cart-plus"></i>Cart</a>
                                    </li>
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
                                <a href="single-bike-product.html">Hyundai santa fe sport </a>
                                <div class="separator"></div>
                                <div class="price">
                                    <span class="old-price">$35,568</span>
                                    <span class="new-price">$32,698 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="car-listing.html" target="_blank" class="button red">View All<i
                    class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
        </div>
    </div>
</section>
<!--=================================
End Popular car -->


<!--=================================
Start business partner -->

<section id="partner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-loaded owl-drag" data-nav-dots="true" data-items="5" data-md-items="5" data-sm-items="3" data-xs-items="2" data-space="10">
                    <div class="owl-stage-outer">
                        <div class="owl-stage" style="transform: translate3d(-2530px, 0px, 0px); transition: all 0.25s ease 0s; width: 4140px;">
                            <div class="owl-item cloned" style="width: 220px; margin-right: 10px;">
                                <div class="item">
                                    <img class="img-fluid center-block" src="images/p1.png" alt="">
                                </div>
                            </div>
                            <div class="owl-item cloned" style="width: 220px; margin-right: 10px;">
                                <div class="item">
                                    <img class="img-fluid center-block" src="images/p2.png" alt="">
                                </div>
                            </div>
                            <div class="owl-item cloned" style="width: 220px; margin-right: 10px;">
                                <div class="item">
                                    <img class="img-fluid center-block" src="images/p3.png" alt="">
                                </div>
                            </div>
                            <div class="owl-item cloned" style="width: 220px; margin-right: 10px;">
                                <div class="item">
                                    <img class="img-fluid center-block" src="images/p4.png" alt="">
                                </div>
                            </div>
                            <div class="owl-item cloned" style="width: 220px; margin-right: 10px;">
                                <div class="item">
                                    <img class="img-fluid center-block" src="images/p5.png" alt="">
                                </div>
                            </div>
                            <div class="owl-item" style="width: 220px; margin-right: 10px;">
                                <div class="item">
                                    <img class="img-fluid center-block" src="images/p6.png" alt="">
                                </div>
                            </div>
                            <div class="owl-item" style="width: 220px; margin-right: 10px;">
                                <div class="item">
                                    <img class="img-fluid center-block" src="images/p4.png" alt="">
                                </div>
                            </div>
                            <div class="owl-item" style="width: 220px; margin-right: 10px;">
                                <div class="item">
                                    <img class="img-fluid center-block" src="images/p1.png" alt="">
                                </div>
                            </div>
                            <div class="owl-item" style="width: 220px; margin-right: 10px;">
                                <div class="item">
                                    <img class="img-fluid center-block" src="images/p2.png" alt="">
                                </div>
                            </div>
                            <div class="owl-item" style="width: 220px; margin-right: 10px;">
                                <div class="item">
                                    <img class="img-fluid center-block" src="images/p3.png" alt="">
                                </div>
                            </div>
                            <div class="owl-item" style="width: 220px; margin-right: 10px;">
                                <div class="item">
                                    <img class="img-fluid center-block" src="images/p4.png" alt="">
                                </div>
                            </div>
                            <div class="owl-item active" style="width: 220px; margin-right: 10px;">
                                <div class="item">
                                    <img class="img-fluid center-block" src="images/p1.png" alt="">
                                </div>
                            </div>
                            <div class="owl-item active" style="width: 220px; margin-right: 10px;">
                                <div class="item">
                                    <img class="img-fluid center-block" src="images/p5.png" alt="">
                                </div>
                            </div>
                            <div class="owl-item cloned active" style="width: 220px; margin-right: 10px;">
                                <div class="item">
                                    <img class="img-fluid center-block" src="images/p3.png" alt="">
                                </div>
                            </div>
                            <div class="owl-item cloned active" style="width: 220px; margin-right: 10px;">
                                <div class="item">
                                    <img class="img-fluid center-block" src="images/p2.png" alt="">
                                </div>
                            </div>
                            <div class="owl-item cloned active" style="width: 220px; margin-right: 10px;">
                                <div class="item">
                                    <img class="img-fluid center-block" src="images/p5.png" alt="">
                                </div>
                            </div>
                            <div class="owl-item cloned" style="width: 220px; margin-right: 10px;">
                                <div class="item">
                                    <img class="img-fluid center-block" src="images/p3.png" alt="">
                                </div>
                            </div>
                            <div class="owl-item cloned" style="width: 220px; margin-right: 10px;">
                                <div class="item">
                                    <img class="img-fluid center-block" src="images/p1.png" alt="">
                                </div>
                            </div>
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

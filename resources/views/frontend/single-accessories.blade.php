@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
	{{ session()->get('message') }}
</div>
@endif


@include('layouts.frontend.accessories-background')


    <!--=================================
car-details  -->

    <section class="car-details page-section-ptb">
        <div class="container">
            <div class="row bike-space">
                <div class="col-md-9">
                    <h3>CoolChange Waterproof Bike Bag Frame Front Head</h3>
                    <p>Temporibus possimus quasi beatae, You will begin to realize why, consectetur adipisicing elit.
                        aspernatur nemo maiores.</p>
                    <div class="star">
                        <i class="fa fa-star orange-color"></i>
                        <i class="fa fa-star orange-color"></i>
                        <i class="fa fa-star orange-color"></i>
                        <i class="fa fa-star orange-color"></i>
                        <i class="fa fa-star-o orange-color"></i>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="singleprice-tag">$ 25.30<span>(Fixed)</span></div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <!-- <div class="slider-slick">
                        <div class="slider slider-for detail-big-car-gallery">
                            <img class="img-fluid" src="images/bike/1-shot.jpg" alt="">
                            <img class="img-fluid" src="images/bike/2-shot.jpg" alt="">
                            <img class="img-fluid" src="images/bike/3-shot.jpg" alt="">
                            <img class="img-fluid" src="images/bike/4-shot.jpg" alt="">
                            <img class="img-fluid" src="images/bike/5-shot.jpg" alt="">
                            <img class="img-fluid" src="images/bike/6-shot.jpg" alt="">
                            <img class="img-fluid" src="images/bike/7-shot.jpg" alt="">
                            <img class="img-fluid" src="images/bike/8-shot.jpg" alt="">
                        </div>
                        <div class="slider slider-nav">
                            <img class="img-fluid" src="images/bike/s1-shot.jpg" alt="">
                            <img class="img-fluid" src="images/bike/s2-shot.jpg" alt="">
                            <img class="img-fluid" src="images/bike/s3-shot.jpg" alt="">
                            <img class="img-fluid" src="images/bike/s4-shot.jpg" alt="">
                            <img class="img-fluid" src="images/bike/s5-shot.jpg" alt="">
                            <img class="img-fluid" src="images/bike/s6-shot.jpg" alt="">
                            <img class="img-fluid" src="images/bike/s7-shot.jpg" alt="">
                            <img class="img-fluid" src="images/bike/s8-shot.jpg" alt="">
                        </div>
                    </div> -->

                    <div class="exzoom" id="exzoom">
                        <!-- Images -->
                        <div class="exzoom_img_box">
                            <ul class='exzoom_img_ul'>
                                <li><img src="images/bike/1-shot.jpg" /></li>
                                <li><img src="images/bike/2-shot.jpg" /></li>
                                <li><img src="images/bike/3-shot.jpg" /></li>
                                <li><img src="images/bike/4-shot.jpg" /></li>
                                <li><img src="images/bike/5-shot.jpg" /></li>
                                <li><img src="images/bike/6-shot.jpg" /></li>
                                <li><img src="images/bike/7-shot.jpg" /></li>
                                <li><img src="images/bike/8-shot.jpg" /></li>
                            </ul>
                        </div>
                        <!-- <a href="https://www.jqueryscript.net/tags.php?/Thumbnail/">Thumbnail</a> Nav-->
                        <div class="exzoom_nav"></div>
                        <!-- Nav Buttons -->
                        <p class="exzoom_btn">
                            <a href="javascript:void(0);" class="exzoom_prev_btn">
                                < </a>
                                    <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="sms-accessories-des">
                        <h3>
                            Description:
                        </h3>
                        <p>
                            - Wear-resistant nylon material, durable and stable, servicing a longer life for you.
                        </p>
                        <p>
                            - Be waterproof, easily deal with all kinds of wet or rainy weather.
                        </p>
                        <p>
                            - Built to greatly strict quality control standards, so it has a stable performance and
                            superb
                            workmanship.
                        </p>
                        <p>
                            - High quality material, durable zipper, compact, lightweight, stylish and comfortable
                            feeling.
                        </p>
                        <p>
                            - Be waterproof, easily deal with all kinds of wet or rainy weather.
                        </p>
                        <p>
                            - Built to greatly strict quality control standards, so it has a stable performance and
                            superb
                            workmanship.
                        </p>
                        <p>
                            - High quality material, durable zipper, compact, lightweight, stylish and comfortable
                            feeling.
                        </p>
                    </div>
                    <div class="sms-add-cart-place sms-accessories">

                        <div class="cart-plus-minus">
                            <div class="dec qtybutton">-</div>
                            <input type="text" value="1" name="qtybutton" class="cart-plus-minus-box">
                            <div class="inc qtybutton">+</div>
                        </div>
                        <div class="add_to_cart_btn">
                            <a href="#">add to cart</a>
                        </div>
                        <div class="wishlist">
                            <a href="#"><i class="fa fa-heart-o"></i></a>
                        </div>
                        <div class="add_compare">
                            <div class="checkbox">
                                <input type="checkbox" class="compare-checkbox" value="" id="compare14">
                                <label for="compare14">Compare</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="sms-groupbuying-area">
                        <div class="sms-coundown-area">
                            <div class="flipper" data-reverse="true" data-datetime="2019-11-10 00:00:00"
                                data-template="dd|HH|ii|ss" data-labels="Days|Hours|Minutes|Seconds" id="myFlipper">
                            </div>
                        </div>
                        <div class="sms-notice">
                            <span><b>Notice</b>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum,
                                quasi.</span>
                        </div>
                        <div class="qunatity_price_box">

                            <div class="quantity_box">
                                <table width="100%">
                                    <tbody>
                                        <tr>
                                            <td class="column1">
                                                <h3>Quantity</h3>
                                            </td>
                                            <td>
                                                <ul class="quantity_listing  items3" id="quantity_listing">
                                                    <li class="item1">0<br>PCS</li>
                                                    <li class="item2">200<br>PCS</li>
                                                    <li class="item3">400<br>PCS</li>
                                                    <li class="item4">600<br>PCS</li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="process_order">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <div class="sms-after-process-ord"></div>
                            </div>
                            <div class="price_box">
                                <table width="100%">
                                    <tbody>
                                        <tr>
                                            <td class="column2">
                                                <h3>EXW Price</h3>
                                            </td>
                                            <td>
                                                <ul class="price_listing  items3" id="price_listing">
                                                    <li class="item2">৳5000</li>
                                                    <li class="item2">৳4500</li>
                                                    <li class="item2">৳4000</li>
                                                    <li class="item2">৳3000</li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div id="tabs">
                        <ul class="tabs">
                            <li data-tabs="tab1" class="active"> <span aria-hidden="true" class="icon-diamond"></span>
                                Specification
                            </li>
                            <li data-tabs="tab2"><span aria-hidden="true" class="icon-list"></span>Description
                            </li>
                        </ul>
                        <div id="tab1" class="tabcontent">
                            <ul class="smsinner">
                                <li class="">
                                    <div class="list-label">Speedometer </div>
                                    <div class="list-stat">Estate</div>
                                </li>
                                <li class="">
                                    <div class="list-label">Techometer</div>
                                    <div class="list-stat">1968cc</div>
                                </li>
                                <li class="">
                                    <div class="list-label">Odometer</div>
                                    <div class="list-stat">2.0 L</div>
                                </li>
                                <li class="">
                                    <div class="list-label">RPM meter</div>
                                    <div class="list-stat">Diesel</div>
                                </li>
                                <li class="">
                                    <div class="list-label">Fuel warning indicator </div>
                                    <div class="list-stat">5</div>
                                </li>
                                <li class="">
                                    <div class="list-label">Oil warning indicator </div>
                                    <div class="list-stat">5</div>
                                </li>
                                <li class="">
                                    <div class="list-label">Low battery indicator </div>
                                    <div class="list-stat">Manual</div>
                                </li>
                                <li class="">
                                    <div class="list-label">Pillon seat </div>
                                    <div class="list-stat">131 g/km</div>
                                </li>
                                <li class="">
                                    <div class="list-label">Turn lamp </div>
                                    <div class="list-stat">20</div>
                                </li>
                                <li class="">
                                    <div class="list-label">Tail lamp </div>
                                    <div class="list-stat">20</div>
                                </li>
                                <li class="">
                                    <div class="list-label">Passenger grab rail </div>
                                    <div class="list-stat">20</div>
                                </li>
                                <li class="">
                                    <div class="list-label">Engine kill switch </div>
                                    <div class="list-stat">20</div>
                                </li>
                            </ul>
                        </div>
                        <div id="tab2" class="tabcontent">
                            <div class="des-icon">
                                <ul>
                                    <li><i class="fa fa-calendar" aria-hidden="true"></i>Body type </li>
                                    <li><i class="fa fa-road" aria-hidden="true"></i>Manufacturing year </li>
                                    <li><i class="fa fa-hourglass-end" aria-hidden="true"></i>Displacement</li>
                                    <li><i class="fa fa-500px" aria-hidden="true"></i>Milleage</li>
                                    <li><i class="fa fa-cloud-upload" aria-hidden="true"></i>Kerb Weight </li>
                                    <li><i class="fa fa-road" aria-hidden="true"></i>No of gears</li>
                                    <li><i class="fa fa-road" aria-hidden="true"></i>Max power</li>
                                    <li><i class="fa fa-road" aria-hidden="true"></i>Max torque</li>
                                </ul>
                            </div>

                            <div class="des-content">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem fugit voluptatum quas
                                cum illo eius suscipit. Dignissimos aliquam officiis sapiente sit voluptatibus magni,
                                vero harum nam quo alias cupiditate deserunt distinctio non saepe autem dicta
                                velit amet perferendis sint. Hic, in. Veniam soluta repellendus atque blanditiis tempore
                                error, deserunt ipsa, quod beatae earum enim quae natus dolorum eum incidunt dignissimos
                                iure laborum necessitatibus et sunt dicta,
                                molestiae reiciendis numquam? Vitae!
                            </div>


                        </div>
                    </div>


                    <div class="panel panel-white post panel-shadow" id="sms">
                        <div class="post-footer">
                            <div class="input-group">
                                <input class="form-control" placeholder="Add a comment" type="text">
                                <span class="input-group-addon">
                                    <a href="#"><i class="fa fa-edit"></i></a>
                                </span>
                            </div>
                            <ul class="comments-list">
                                <li class="comment">
                                    <a class="pull-left" href="#">
                                        <img class="avatar" src="images/post-user_1.jpg" alt="avatar">
                                    </a>
                                    <div class="comment-body">
                                        <div class="comment-heading">
                                            <h4 class="user">Gavino Free</h4>
                                            <h5 class="time">5 minutes ago</h5>
                                        </div>
                                        <p>Sure, oooooooooooooooohhhhhhhhhhhhhhhh</p>
                                        <div class="sms-reply-comment-icon"><i class="fa fa-reply"
                                                aria-hidden="true"></i></div>
                                    </div>

                                    <ul>
                                        <li class="comment sms-reply-comment">
                                            <a class="pull-left" href="#">
                                                <img class="avatar" src="images/post-user_2.jpg" alt="avatar">
                                            </a>
                                            <div class="comment-body">
                                                <div class="comment-heading">
                                                    <h4 class="user">Gavino Free</h4>
                                                    <h5 class="time">3 minutes ago</h5>
                                                </div>
                                                <p>Ok, cool.</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="comments-list">
                                        <li class="comment">
                                            <a class="pull-left" href="#">
                                                <img class="avatar" src="images/post-user_3.jpg" alt="avatar">
                                            </a>
                                            <div class="comment-body">
                                                <div class="comment-heading">
                                                    <h4 class="user">Ryan Haywood</h4>
                                                    <h5 class="time">3 minutes ago</h5>
                                                </div>
                                                <p>Relax my friend</p>
                                                <div class="sms-reply-comment-icon"><i class="fa fa-reply"
                                                        aria-hidden="true"></i></div>
                                            </div>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="sms-review-comment-area">
                        <div id="comments">
                            <ol class="commentlist">
                                <li class="review even thread-even depth-1" id="li-comment-3">
                                    <div id="comment-3" class="customer-comment">
                                        <div class="media">
                                            <div class="apus-avata media-left">
                                                <div class="apus-image">
                                                    <img alt="" src="images/reviw-name-user.png">
                                                </div>
                                                <div class="star-rating">
                                                    <div class="star">
                                                        <i class="fa fa-star orange-color"></i>
                                                        <i class="fa fa-star orange-color"></i>
                                                        <i class="fa fa-star orange-color"></i>
                                                        <i class="fa fa-star orange-color"></i>
                                                        <i class="fa fa-star-o orange-color"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment-text media-body">
                                                <div class="clearfix comment-ifo">
                                                    <div class="date">
                                                        <time>March 28, 2019</time>
                                                    </div>
                                                    <div class="apus-author">NoisyPrints</div>
                                                </div>
                                                <div class="content-comment clear">
                                                    <p>Very good theme. Thank you</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li><!-- #comment-## -->
                            </ol>
                        </div>
                        <div class="review-form">
                            <h4>Add a review</h4>
                            <form action="" id="review-form">
                                <div class="row">
                                    <div class="col-md-12 col-sx-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="validationCustom01"
                                                placeholder="Name" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sx-12">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="4" placeholder="Comment"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment-form-rating"><label for="rating">Your Rating</label>
                                    <p class="stars">
                                        <span>
                                            <a class="star-1" href="#">1</a>
                                            <a class="star-2" href="#">2</a>
                                            <a class="star-3" href="#">3</a>
                                            <a class="star-4" href="#">4</a>
                                            <a class="star-5" href="#">5</a>
                                        </span>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <button class="button red">Submit Review</button>
                                </div>
                            </form>
                        </div>
                    </div>








                    <div class="extra-feature">
                        <h6> After sell Service</h6>
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="list-style-1">
                                    <li><i class="fa fa-check"></i>one years maintainenece free</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="bike-Disclaimer pt10">
                        <h6>Disclaimer</h6>
                        <p>Above mentioned information may not be 100% accurate. There is always having a chance to make
                            a mistake to adding information. Generally we collect information from manufacturer website
                            and other reputed sources. Please inform
                            us if you have found any mistake or wrong information.</p>
                    </div>
                    <div class="feature-car">
                        <h6>Recently Vehicle</h6>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="owl-carousel" data-nav-arrow="true" data-nav-dots="true" data-items="3"
                                    data-md-items="3" data-sm-items="2" data-space="15">
                                    <div class="item">
                                        <div class="car-item gray-bg text-center">
                                            <div class="car-image">
                                                <img class="img-fluid" src="images/bike/Bike-image-01.png" alt="">
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
                                                    <li><a href="" class="sms-wishlist" data-toggle="tooltip"
                                                            data-placement="bottom" title="Wishlist"><i
                                                                class="fa fa-heart-o"></i>Wishlist</a>
                                                    </li>
                                                    <li><a href="" class="sms-cart" data-toggle="tooltip"
                                                            data-placement="bottom" title="Cart"><i
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
                                                <a href="#">Acura Rsx</a>
                                                <div class="separator"></div>
                                                <div class="price">
                                                    <span class="old-price">$35,568</span>
                                                    <span class="new-price">$32,698 </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="car-item gray-bg text-center">
                                            <div class="car-image">
                                                <img class="img-fluid" src="images/bike/Bike-image-02.png" alt="">
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
                                                    <li><a href="" class="sms-wishlist" data-toggle="tooltip"
                                                            data-placement="bottom" title="Wishlist"><i
                                                                class="fa fa-heart-o"></i>Wishlist</a>
                                                    </li>
                                                    <li><a href="" class="sms-cart" data-toggle="tooltip"
                                                            data-placement="bottom" title="Cart"><i
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
                                                <a href="#">Lexus GS 450h</a>
                                                <div class="separator"></div>
                                                <div class="price">
                                                    <span class="old-price">$35,568</span>
                                                    <span class="new-price">$32,698 </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="car-item gray-bg text-center">
                                            <div class="car-image">
                                                <img class="img-fluid" src="images/bike/Bike-image-03.png" alt="">
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
                                                    <li><a href="" class="sms-wishlist" data-toggle="tooltip"
                                                            data-placement="bottom" title="Wishlist"><i
                                                                class="fa fa-heart-o"></i>Wishlist</a>
                                                    </li>
                                                    <li><a href="" class="sms-cart" data-toggle="tooltip"
                                                            data-placement="bottom" title="Cart"><i
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
                                                <a href="#">GTA 5 Lowriders DLC</a>
                                                <div class="separator"></div>
                                                <div class="price">
                                                    <span class="old-price">$35,568</span>
                                                    <span class="new-price">$32,698 </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="car-item gray-bg text-center">
                                            <div class="car-image">
                                                <img class="img-fluid" src="images/bike/Bike-image-01.png" alt="">
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
                                                    <li><a href="" class="sms-wishlist" data-toggle="tooltip"
                                                            data-placement="bottom" title="Wishlist"><i
                                                                class="fa fa-heart-o"></i>Wishlist</a>
                                                    </li>
                                                    <li><a href="" class="sms-cart" data-toggle="tooltip"
                                                            data-placement="bottom" title="Cart"><i
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
                                                <a href="#"> Toyota avalon hybrid </a>
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
                </div>
                <div class="col-md-4">
                    <div class="car-details-sidebar">
                        <div class="details-social details-weight">
                            <h5>Share now</h5>
                            <ul>
                                <li>
                                    <a href="#"> <i class="fa fa-facebook"></i> facebook</a>
                                </li>
                                <li><a href="#"><i class="fa fa-linkedin"></i> Linkedin</a></li>
                                <li>
                                    <a href="#"> <i class="fa fa-whatsapp"></i> whatsapp</a>
                                </li>
                            </ul>
                        </div>



                        <div class="details-form contact-2">
                            <form class="gray-form">
                                <h5>Financing Calculator</h5>
                                <div class="form-group">
                                    <label>Vehicle Price ($)*</label>
                                    <input type="text" class="form-control" placeholder="Price">
                                </div>
                                <div class="form-group">
                                    <label>Interest rate (%)*</label>
                                    <input type="text" class="form-control" placeholder="Rate">
                                </div>
                                <div class="form-group">
                                    <label>Period (Month)*</label>
                                    <input type="text" class="form-control" placeholder="Month">
                                </div>
                                <div class="form-group">
                                    <label>Down Payment *</label>
                                    <input type="text" class="form-control" placeholder="Payment">
                                </div>
                                <div class="form-group">
                                    <a class="button red" href="#">estimate payment</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
End car-details -->

    <!--=================================
Start What a new button -->
    <div id="sms-wht-new">
        <a href="#what-a-new" data-toggle="modal" data-dismiss="modal">What a New ?</a>
    </div>


    <!--=================================
End What a new button -->
@endsection
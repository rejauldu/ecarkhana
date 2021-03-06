@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.motorcycle-background')


<!--=================================product-listing  -->

<section class="product-listing page-section-ptb" id="product-list">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="listing-sidebar">
                    <div class="widget">
                        <div class="widget-search">
                            <h5>See Result</h5>
                            <ul class="list-style-none">
                                <li><i class="fa fa-star"> </i> Results Found <span class="float-right">(39)</span></li>
                                <li><i class="fa fa-shopping-cart"> </i> Compare Vehicles <span class="float-right">(10)</span></li>
                            </ul>
                        </div>
                        <div class="clearfix">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="#">Year</a>
                                    <ul>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> All Years
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> 2009
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> 2010
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> 2011
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> 2012
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> 2013
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> 2014
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> 2015
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> 2016
                                                </label>
                                            </span></li>
                                    </ul>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Condition</a>
                                    <ul>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> All Conditions
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Brand New
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Slightly Used
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Used
                                                </label>
                                            </span></li>
                                    </ul>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Body</a>
                                    <ul>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> All Body Styles
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> 2dr Car
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> 4dr Car
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Convertible
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Sedan
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Sports Utility Vehicle
                                                </label>
                                            </span></li>
                                    </ul>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Model</a>
                                    <ul>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> All Models
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> 3-Series
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Boxster
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Carrera
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Cayenne
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> F-type
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> GT-R
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> GTS
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> M6
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Macan
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Mazda6
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> RLX
                                                </label>
                                            </span></li>
                                    </ul>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Transmission</a>
                                    <ul>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> All Transmissions
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> 5-Speed Manual
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> 6-Speed Automatic
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> 6-Speed Manual
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> 6-Speed Semi-Auto
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> 7-Speed PDK
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> 8-Speed Automatic
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> 8-Speed Tiptronic
                                                </label>
                                            </span></li>
                                    </ul>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Exterior Color</a>
                                    <ul>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Ruby Red Metallic
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Racing Yellow
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Guards Red
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Aqua Blue Metallic
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> White
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Dark Blue Metallic
                                                </label>
                                            </span></li>
                                    </ul>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Interior Color</a>
                                    <ul>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Platinum Grey
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Agate Grey
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Marsala Red
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Alcantara Black
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Black
                                                </label>
                                            </span></li>
                                        <li><span class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Luxor Beige
                                                </label>
                                            </span></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="widget-banner">
                        <img class="img-fluid center-block" src="images/bike/ad-bikeeeeee.jpg" alt="">
                    </div>
                </div>

                <div class="sidebar_widget">
                    <div class="widget_heading">
                        <h5><i class="fa fa-motorcycle" aria-hidden="true"></i> Recently Listed Bikes</h5>
                    </div>
                    <div class="recent_addedcars">
                        <ul>
                            <li class="gray-bg">
                                <div class="recent_post_img">
                                    <a href="#"><img src="images/bike/200.jpg" alt="image"></a>
                                </div>
                                <div class="recent_post_title"> <a href="#">Ford Shelby GT350</a>
                                    <p class="widget_price">$92,000</p>
                                </div>
                            </li>
                            <li class="gray-bg">
                                <div class="recent_post_img">
                                    <a href="#"><img src="images/bike/200-2.jpg" alt="image"></a>
                                </div>
                                <div class="recent_post_title"> <a href="#">BMW 535i</a>
                                    <p class="widget_price">$92,000</p>
                                </div>
                            </li>
                            <li class="gray-bg">
                                <div class="recent_post_img">
                                    <a href="#"><img src="images/bike/200-3.jpg" alt="image"></a>
                                </div>
                                <div class="recent_post_title"> <a href="#">Mazda CX-5 SX</a>
                                    <p class="widget_price">$92,000</p>
                                </div>
                            </li>
                            <li class="gray-bg">
                                <div class="recent_post_img">
                                    <a href="#"><img src="images/bike/200-4.jpg" alt="image"></a>
                                </div>
                                <div class="recent_post_title"> <a href="#">Ford GT350 </a>
                                    <p class="widget_price">$92,000</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="sorting-options-main">
                    <div id="filter_form2 car-listing">
                        <div class="container">
                            <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">New</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Used</a>

                                </div>
                            </nav>

                            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="sms-bg" class="main_bg white-text">
                                        <h3 class="car-title">Find Your Dream Bike</h3>
                                        <div class="row">
                                            <form action="#" method="get">
                                                <div class="form-group col-md-3 col-sm-6">
                                                    <div class="select">
                                                        <select class="form-control">
                                                            <option value="">Select Location </option>
                                                            <option value="">Location 1 </option>
                                                            <option value="">Location 1 </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3 col-sm-6">
                                                    <div class="select">
                                                        <select class="form-control">
                                                            <option>Select Brand</option>
                                                            <option>Audi</option>
                                                            <option>BMW</option>
                                                            <option>Nissan</option>
                                                            <option>Toyota</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3 col-sm-6">
                                                    <div class="select">
                                                        <select class="form-control">
                                                            <option>Select Brand</option>
                                                            <option>Audi</option>
                                                            <option>BMW</option>
                                                            <option>Nissan</option>
                                                            <option>Toyota</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3 col-sm-6">
                                                    <button type="submit" class="btn btn-block"><i class="fa fa-search"
                                                                                                   aria-hidden="true"></i>
                                                        Search Bike </button>
                                                </div>

                                                <div class="form-group col-md-12 col-sm-6">
                                                    <div class="sms-advance">Advaned Search</div>
                                                </div>
                                                <div class="sms-toggle-content">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="form-group col-md-3 col-sm-6">
                                                                <div class="select">
                                                                    <select class="form-control">
                                                                        <option>Select Brand</option>
                                                                        <option>Audi</option>
                                                                        <option>BMW</option>
                                                                        <option>Nissan</option>
                                                                        <option>Toyota</option>
                                                                    </select>
                                                                </div>
                                                            </div>


                                                            <div class="form-group col-md-3 col-sm-6">
                                                                <div class="select">
                                                                    <select class="form-control">
                                                                        <option>Select Model </option>
                                                                        <option>New Car</option>
                                                                        <option>Used Car</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-3 col-sm-6">
                                                                <div class="select">
                                                                    <select class="form-control">
                                                                        <option>Body Type</option>
                                                                        <option>Audi</option>
                                                                        <option>BMW</option>
                                                                        <option>Nissan</option>
                                                                        <option>Toyota</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-3 col-sm-6">
                                                                <div class="select">
                                                                    <select class="form-control">
                                                                        <option>Budget</option>
                                                                        <option>Audi</option>
                                                                        <option>BMW</option>
                                                                        <option>Nissan</option>
                                                                        <option>Toyota</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-3 col-sm-6">
                                                                <div class="select">
                                                                    <select class="form-control">
                                                                        <option>Millage</option>
                                                                        <option>Audi</option>
                                                                        <option>BMW</option>
                                                                        <option>Nissan</option>
                                                                        <option>Toyota</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-3 col-sm-6">
                                                                <div class="select">
                                                                    <select class="form-control">
                                                                        <option>Location</option>
                                                                        <option>Audi</option>
                                                                        <option>BMW</option>
                                                                        <option>Nissan</option>
                                                                        <option>Toyota</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-3 col-sm-6">
                                                                <div class="select">
                                                                    <select class="form-control">
                                                                        <option>Manufacturing Year</option>
                                                                        <option>Audi</option>
                                                                        <option>BMW</option>
                                                                        <option>Nissan</option>
                                                                        <option>Toyota</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-3 col-sm-6">
                                                                <div class="select">
                                                                    <select class="form-control">
                                                                        <option>Type of Car </option>
                                                                        <option>New Car</option>
                                                                        <option>Used Car</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div class="sms-bg" class="main_bg white-text">
                                        <h3>Find Your Dream Bike</h3>
                                        <div class="row">
                                            <form action="#" method="get">
                                                <div class="form-group col-md-3 col-sm-6">
                                                    <div class="select">
                                                        <select class="form-control">
                                                            <option value="">Select Location </option>
                                                            <option value="">Location 1 </option>
                                                            <option value="">Location 1 </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3 col-sm-6">
                                                    <div class="select">
                                                        <select class="form-control">
                                                            <option>Select Brand</option>
                                                            <option>Audi</option>
                                                            <option>BMW</option>
                                                            <option>Nissan</option>
                                                            <option>Toyota</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3 col-sm-6">
                                                    <div class="select">
                                                        <select class="form-control">
                                                            <option>Select Brand</option>
                                                            <option>Audi</option>
                                                            <option>BMW</option>
                                                            <option>Nissan</option>
                                                            <option>Toyota</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3 col-sm-6">
                                                    <button type="submit" class="btn btn-block"><i class="fa fa-search"
                                                                                                   aria-hidden="true"></i>
                                                        Search Bike </button>
                                                </div>

                                                <div class="form-group col-md-12 col-sm-6">
                                                    <div class="sms-advance">Advaned Search</div>
                                                </div>
                                                <div class="sms-toggle-content">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="form-group col-md-3 col-sm-6">
                                                                <div class="select">
                                                                    <select class="form-control">
                                                                        <option>Select Brand</option>
                                                                        <option>Audi</option>
                                                                        <option>BMW</option>
                                                                        <option>Nissan</option>
                                                                        <option>Toyota</option>
                                                                    </select>
                                                                </div>
                                                            </div>


                                                            <div class="form-group col-md-3 col-sm-6">
                                                                <div class="select">
                                                                    <select class="form-control">
                                                                        <option>Select Model </option>
                                                                        <option>New Car</option>
                                                                        <option>Used Car</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-3 col-sm-6">
                                                                <div class="select">
                                                                    <select class="form-control">
                                                                        <option>Body Type</option>
                                                                        <option>Audi</option>
                                                                        <option>BMW</option>
                                                                        <option>Nissan</option>
                                                                        <option>Toyota</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-3 col-sm-6">
                                                                <div class="select">
                                                                    <select class="form-control">
                                                                        <option>Budget</option>
                                                                        <option>Audi</option>
                                                                        <option>BMW</option>
                                                                        <option>Nissan</option>
                                                                        <option>Toyota</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-3 col-sm-6">
                                                                <div class="select">
                                                                    <select class="form-control">
                                                                        <option>Millage</option>
                                                                        <option>Audi</option>
                                                                        <option>BMW</option>
                                                                        <option>Nissan</option>
                                                                        <option>Toyota</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-3 col-sm-6">
                                                                <div class="select">
                                                                    <select class="form-control">
                                                                        <option>Location</option>
                                                                        <option>Audi</option>
                                                                        <option>BMW</option>
                                                                        <option>Nissan</option>
                                                                        <option>Toyota</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-3 col-sm-6">
                                                                <div class="select">
                                                                    <select class="form-control">
                                                                        <option>Manufacturing Year</option>
                                                                        <option>Audi</option>
                                                                        <option>BMW</option>
                                                                        <option>Nissan</option>
                                                                        <option>Toyota</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-3 col-sm-6">
                                                                <div class="select">
                                                                    <select class="form-control">
                                                                        <option>Type of Car </option>
                                                                        <option>New Car</option>
                                                                        <option>Used Car</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row sorting-options">
                        <div class="col-lg-5">
                            <h5>All Bikes</h5>
                        </div>
                        <div class="col-lg-3 text-right">
                            <div class="selected-box">
                                <select>
                                    <option>Show  </option>
                                    <option>1</option>
                                    <option>2 </option>
                                    <option>3 </option>
                                    <option>4 </option>
                                    <option>5 </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 text-right">
                            <div class="selected-box">
                                <select>
                                    <option>Sort by </option>
                                    <option>Price: Lowest first</option>
                                    <option>Price: Highest first </option>
                                    <option>Product Name: A to Z </option>
                                    <option>Product Name: Z to A </option>
                                    <option>In stock</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4" v-for="product in products">
                        <div class="car-item gray-bg text-center">
                            <div class="car-image">
                                <img class="img-fluid" :src="'{{ asset('/assets/products') }}/'+product.id+'/'+product.image1" alt="">
                                <div class="car-overlay-banner">
                                    <ul>
                                        <li>
                                            <div class="compare_item">
                                                <div class="checkbox">
                                                    <input type="checkbox" class="compare-checkbox" @click="addToCompare(product.id)"/>
                                                    <label for="compare2">Compare</label>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="car-list">
                                <ul class="list-inline">
                                    <li>
                                        <a href="" class="sms-wishlist" data-toggle="tooltip" data-placement="bottom" title="Wishlist"><i class="fa fa-heart-o"></i>Wishlist</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('motorcycle-cart') }}" class="sms-cart" data-toggle="tooltip" data-placement="bottom" title="Cart"><i class="fa fa-cart-plus"></i>Cart</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="car-content">
                                <div class="star">
                                    <i class="fa orange-color" :class="{'fa-star':product.rating>0, 'fa-star-o':product.rating<=0}"></i>
                                    <i class="fa orange-color" :class="{'fa-star':product.rating>1, 'fa-star-o':product.rating<=1}"></i>
                                    <i class="fa orange-color" :class="{'fa-star':product.rating>2, 'fa-star-o':product.rating<=2}"></i>
                                    <i class="fa orange-color" :class="{'fa-star':product.rating>3, 'fa-star-o':product.rating<=3}"></i>
                                    <i class="fa orange-color" :class="{'fa-star':product.rating>4, 'fa-star-o':product.rating<=4}"></i>
                                </div>
                                <a :href="'{{ url('/single-motorcycle-product') }}/'+product.id">@{{ product.name }}</a>
                                <div class="separator"></div>
                                <div class="price">
                                    <span class="new-price">Tk. @{{ product.msrp }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
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
                    <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><i class="fa fa-angle-left fa-2x"></i></button><button type="button" role="presentation" class="owl-next"><i class="fa fa-angle-right fa-2x"></i></div>
                    <div class="owl-dots"><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot active"><span></span></button></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=================================End business partner -->
@endsection
@section('script')
<script>
    var product_list = new Vue({
        el: '#product-list',
        data: {
            products: {!! json_encode(json_decode($products->toJson())->data) !!}
        },
        methods: {
            addToCompare: function(id) {
                var exist = document.body.querySelector("input[product-id='"+id+"']");
                if(exist) {
                    exist.click()
                } else {
                    var checkbox = document.createElement('input');
                    checkbox.type = "checkbox";
                    checkbox.setAttribute("class", "compare-checkbox d-none");
                    checkbox.setAttribute("product-id", id);
                    document.body.appendChild(checkbox);
                    attachEventListener(checkbox);
                    checkbox.click();
                }
            }
        }
    });
</script>
@endsection
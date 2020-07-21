@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
	{{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.motorcycle-background')


    <!--=================================
Auction product-listing  -->

    <section id="group-buying-products" class="product-listing page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="sorting-options-main">
                        <!-- <div id="filter_form2 car-listing">
                            <div class="container">
                                <nav>
                                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Bike</a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Bicycle</a>

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
                                                        <button type="submit" class="btn btn-block"><i
                                                                class="fa fa-search" aria-hidden="true"></i>
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
                                            <h3>Find Your Dream Bicycle</h3>
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
                                                        <button type="submit" class="btn btn-block"><i
                                                                class="fa fa-search" aria-hidden="true"></i>
                                                            Search Bicycle </button>
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
                        </div> -->
                        <div class="sms-search-box">
        <form action="#" class="search-wrapper cf">
        <input type="text" placeholder="Search here..." required="">
        <button type="submit">Search</button>
    </form>
        </div>

                        <div class="row sorting-options">
                            <div class="col-lg-5">
                                <h5>Group Buying Products</h5>
                            </div>
                            <div class="col-lg-3 text-right">
                                <div class="selected-box">
                                    <select>
                                        <option>Show </option>
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
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-lg-4">
                            <div class="car-item gray-bg text-center">
                                <div class="car-image">
                                    <img class="img-fluid" src="images/Bike-image-01.png" alt="">
                                    <div class="car-overlay-banner">

                                    </div>
                                </div>
                                <div class="car-list">
                                    <ul class="list-inline">
                                        <li><i class="fa fa-registered"></i> 2016</li>
                                        <li><i class="fa fa-cog"></i> Manual </li>
                                        <li><i class="fa fa-shopping-cart"></i> 6,000 mi</li>
                                    </ul>
                                </div>
                                <div class="car-content">
                                    <a href="single-bike-product.html">Toyota avalon hybrid <span class="remaining">(120)</span> </a>
                                    <div class="separator"></div>
                                    <div class="price">
                                        <span class="new-price">$32,698 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="car-item gray-bg text-center">
                                <div class="car-image">
                                    <img class="img-fluid" src="images/Bike-image-02.png" alt="">
                                    <div class="car-overlay-banner">

                                    </div>
                                </div>
                                <div class="car-list">
                                    <ul class="list-inline">
                                        <li><i class="fa fa-registered"></i> 2016</li>
                                        <li><i class="fa fa-cog"></i> Manual </li>
                                        <li><i class="fa fa-shopping-cart"></i> 6,000 mi</li>
                                    </ul>
                                </div>
                                <div class="car-content">
                                    <a href="single-bike-product.html">Hyundai santa fe sport  <span class="remaining">(120)</span> </a>
                                    <div class="separator"></div>
                                    <div class="price">
                                        <span class="new-price">$32,698 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="car-item gray-bg text-center">
                                <div class="car-image">
                                    <img class="img-fluid" src="images/Bike-image-03.png" alt="">
                                    <div class="car-overlay-banner">

                                    </div>
                                </div>
                                <div class="car-list">
                                    <ul class="list-inline">
                                        <li><i class="fa fa-registered"></i> 2016</li>
                                        <li><i class="fa fa-cog"></i> Manual </li>
                                        <li><i class="fa fa-shopping-cart"></i> 6,000 mi</li>
                                    </ul>
                                </div>
                                <div class="car-content">
                                    <a href="single-bike-product.html">Lexus is f  <span class="remaining">(120)</span> </a>
                                    <div class="separator"></div>
                                    <div class="price">
                                        <span class="new-price">$32,698 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="car-item gray-bg text-center">
                                <div class="car-image">
                                    <img class="img-fluid" src="images/Cycle-01.png" alt="">
                                    <div class="car-overlay-banner">

                                    </div>
                                </div>
                                <div class="car-list">
                                    <ul class="list-inline">
                                        <li><i class="fa fa-registered"></i> 2016</li>
                                        <li><i class="fa fa-cog"></i> Manual </li>
                                        <li><i class="fa fa-shopping-cart"></i> 6,000 mi</li>
                                    </ul>
                                </div>
                                <div class="car-content">
                                    <a href="single-bike-product.html">Acura Rsx  <span class="remaining">(120)</span> </a>
                                    <div class="separator"></div>
                                    <div class="price">
                                        <span class="new-price">$32,698 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="car-item gray-bg text-center">
                                <div class="car-image">
                                    <img class="img-fluid" src="images/Cycle-02.png" alt="">
                                    <div class="car-overlay-banner">

                                    </div>
                                </div>
                                <div class="car-list">
                                    <ul class="list-inline">
                                        <li><i class="fa fa-registered"></i> 2016</li>
                                        <li><i class="fa fa-cog"></i> Manual </li>
                                        <li><i class="fa fa-shopping-cart"></i> 6,000 mi</li>
                                    </ul>
                                </div>
                                <div class="car-content">
                                    <a href="single-bike-product.html">GTA 5 Lowriders DLC  <span class="remaining">(120)</span> </a>
                                    <div class="separator"></div>
                                    <div class="price">
                                        <span class="new-price">$32,698 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="car-item gray-bg text-center">
                                <div class="car-image">
                                    <img class="img-fluid" src="images/Cycle 03.png" alt="">
                                    <div class="car-overlay-banner">

                                    </div>
                                </div>
                                <div class="car-list">
                                    <ul class="list-inline">
                                        <li><i class="fa fa-registered"></i> 2016</li>
                                        <li><i class="fa fa-cog"></i> Manual </li>
                                        <li><i class="fa fa-shopping-cart"></i> 6,000 mi</li>
                                    </ul>
                                </div>
                                <div class="car-content">
                                    <a href="single-bike-product.html"> Lexus GS 450h  <span class="remaining">(120)</span> </a>
                                    <div class="separator"></div>
                                    <div class="price">
                                        <span class="new-price">$32,698 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pagination-nav d-flex justify-content-center">
                        <ul class="pagination">
                            <li><a href="#">«</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
   product-listing  -->


@endsection
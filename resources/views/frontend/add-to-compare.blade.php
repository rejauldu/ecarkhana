@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.car-background')

<section class="section-full content-inner-2">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="m-b30">
                    <h4 class="h4 m-t0">Compare to choose the right car! </h4>
                    <ul class="used-car-dl-info">
                        <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Side bar start -->
            <div class="col-md-4 col-sm-6 m-b30">
                <div class="icon-bx-wraper bx-style-1 p-a20 text-center">
                    <div>
                        <img class="hover-opacity-5 cursor-pointer" src="http://ecarkhana/images/add-car.jpg" alt="">
                    </div>
                    <form>
                        <h4>Add to compare</h4>	
                        <div class="input-group m-b20">
                            <select class="form-control bs-select-hidden">
                                <option>-Select Brand-</option>
                                @foreach($brands as $brand)
                                                            <option value="{{ $brand->id }}" @if(isset($car) && $car->brand_id == $brand->id) selected @endif>{{ $brand->name }}</option>
                                                            @endforeach
                            </select>
                        </div>
                        <div class="input-group m-b20">
                            <select class="form-control bs-select-hidden">
                                <option>-Select Model-</option>
                                <option>Creta</option>
                                <option>Elantra</option>
                                <option>EON</option>
                                <option>Grand i10</option>
                            </select>
                        </div>
                        <div class="input-group m-b20">
                            <select class="form-control bs-select-hidden">
                                <option>-Select Variant-</option>
                                <option>Creta</option>
                                <option>Elantra</option>
                                <option>EON</option>
                                <option>Grand i10</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 m-b30">
                <div class="icon-bx-wraper bx-style-1 p-a20 text-center">
                    <div>
                        <img src="http://ecarkhana/images/add-car.jpg" alt="">
                    </div>
                    <form>
                        <h4>Add to compare</h4>	
                        <div class="input-group m-b20">
                            <select class="form-control bs-select-hidden">
                                <option>-Select Brand-</option>
                                <option>Maruti</option>
                                <option>Hyundai</option>
                                <option>Honda</option>
                                <option>Toyota</option>
                            </select>
                        </div>
                        <div class="input-group m-b20">
                            <select class="form-control bs-select-hidden">
                                <option>-Select Model-</option>
                                <option>Creta</option>
                                <option>Elantra</option>
                                <option>EON</option>
                                <option>Grand i10</option>
                            </select>
                        </div>
                        <div class="input-group m-b20">
                            <select class="form-control bs-select-hidden">
                                <option>-Select Variant-</option>
                                <option>Creta</option>
                                <option>Elantra</option>
                                <option>EON</option>
                                <option>Grand i10</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Side bar END -->
            <div class="col-md-4 col-sm-6 m-b30 sms-phn-hide">
                <div class="icon-bx-wraper bx-style-1 p-a20 text-center">
                    <div>
                        <img src="http://ecarkhana/images/add-car.jpg" alt="">
                    </div>
                    <form>
                        <h4>Add to compare</h4>	
                        <div class="input-group m-b20">
                            <select class="form-control bs-select-hidden">
                                <option>-Select Brand-</option>
                                <option>Maruti</option>
                                <option>Hyundai</option>
                                <option>Honda</option>
                                <option>Toyota</option>
                            </select>
                        </div>
                        <div class="input-group m-b20">
                            <select class="form-control bs-select-hidden">
                                <option>-Select Model-</option>
                                <option>Creta</option>
                                <option>Elantra</option>
                                <option>EON</option>
                                <option>Grand i10</option>
                            </select>
                        </div>
                        <div class="input-group m-b20">
                            <select class="form-control bs-select-hidden">
                                <option>-Select Variant-</option>
                                <option>Creta</option>
                                <option>Elantra</option>
                                <option>EON</option>
                                <option>Grand i10</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 text-center">
                <div class="input-group icon-bx-wraper bx-style-1 p-a20">
                    <a class="button red" href="">Compare Now</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>SIMILAR CAR COMPARISONS</h2>
                    <div class="separator"></div>
                </div>
                <div class="owl-carousel owl-theme owl-loaded owl-drag" data-nav-arrow="true" data-items="4" data-md-items="4" data-sm-items="2" data-xs-items="1" data-space="20">
                    <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-1130px, 0px, 0px); transition: all 0.25s ease 0s; width: 3673px;"><div class="owl-item cloned" style="width: 262.5px; margin-right: 20px;"><div class="item">
                                    <div class="car-item text-center">
                                        <div class="car-image">
                                            <img class="img-fluid" src="images/12.jpg" alt="">
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
                                                <li><i class="fa fa-registered"></i> 2017</li>
                                                <li><i class="fa fa-cog"></i> Manual </li>
                                                <li><i class="fa fa-dashboard"></i> 6,000 mi</li>
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
                                            <a href="single-car-product.html">Lexus GS 450h</a>
                                            <div class="separator"></div>
                                            <div class="price">
                                                <span class="old-price">$35,568</span>
                                                <span class="new-price">$32,698 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item cloned" style="width: 262.5px; margin-right: 20px;"><div class="item">
                                    <div class="car-item text-center">
                                        <div class="car-image">
                                            <img class="img-fluid" src="images/16.jpg" alt="">
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
                                                <li><i class="fa fa-registered"></i> 2017</li>
                                                <li><i class="fa fa-cog"></i> Manual </li>
                                                <li><i class="fa fa-dashboard"></i> 6,000 mi</li>
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
                                            <a href="single-car-product.html">GTA 5 Lowriders DLC</a>
                                            <div class="separator"></div>
                                            <div class="price">
                                                <span class="old-price">$35,568</span>
                                                <span class="new-price">$32,698 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item cloned" style="width: 262.5px; margin-right: 20px;"><div class="item">
                                    <div class="car-item text-center">
                                        <div class="car-image">
                                            <img class="img-fluid" src="images/14.jpg" alt="">
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
                                                <li><i class="fa fa-registered"></i> 2017</li>
                                                <li><i class="fa fa-cog"></i> Manual </li>
                                                <li><i class="fa fa-dashboard"></i> 6,000 mi</li>
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
                                            <a href="single-car-product.html">Toyota avalon hybrid </a>
                                            <div class="separator"></div>
                                            <div class="price">
                                                <span class="old-price">$35,568</span>
                                                <span class="new-price">$32,698 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item cloned" style="width: 262.5px; margin-right: 20px;"><div class="item">
                                    <div class="car-item text-center">
                                        <div class="car-image">
                                            <img class="img-fluid" src="images/15.jpg" alt="">
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
                                                <li><i class="fa fa-registered"></i> 2017</li>
                                                <li><i class="fa fa-cog"></i> Manual </li>
                                                <li><i class="fa fa-dashboard"></i> 6,000 mi</li>
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
                                            <a href="single-car-product.html">Hyundai santa fe sport </a>
                                            <div class="separator"></div>
                                            <div class="price">
                                                <span class="old-price">$35,568</span>
                                                <span class="new-price">$32,698 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item active" style="width: 262.5px; margin-right: 20px;"><div class="item">
                                    <div class="car-item text-center">
                                        <div class="car-image">
                                            <img class="img-fluid" src="images/11.jpg" alt="">
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
                                                <li><i class="fa fa-registered"></i> 2017</li>
                                                <li><i class="fa fa-cog"></i> Manual </li>
                                                <li><i class="fa fa-dashboard"></i> 6,000 mi</li>
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
                                            <a href="single-car-product.html">Acura Rsx</a>
                                            <div class="separator"></div>
                                            <div class="price">
                                                <span class="old-price">$35,568</span>
                                                <span class="new-price">$32,698 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item active" style="width: 262.5px; margin-right: 20px;"><div class="item">
                                    <div class="car-item text-center">
                                        <div class="car-image">
                                            <img class="img-fluid" src="images/12.jpg" alt="">
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
                                                <li><i class="fa fa-registered"></i> 2017</li>
                                                <li><i class="fa fa-cog"></i> Manual </li>
                                                <li><i class="fa fa-dashboard"></i> 6,000 mi</li>
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
                                            <a href="single-car-product.html">Lexus GS 450h</a>
                                            <div class="separator"></div>
                                            <div class="price">
                                                <span class="old-price">$35,568</span>
                                                <span class="new-price">$32,698 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item active" style="width: 262.5px; margin-right: 20px;"><div class="item">
                                    <div class="car-item text-center">
                                        <div class="car-image">
                                            <img class="img-fluid" src="images/16.jpg" alt="">
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
                                                <li><i class="fa fa-registered"></i> 2017</li>
                                                <li><i class="fa fa-cog"></i> Manual </li>
                                                <li><i class="fa fa-dashboard"></i> 6,000 mi</li>
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
                                            <a href="single-car-product.html">GTA 5 Lowriders DLC</a>
                                            <div class="separator"></div>
                                            <div class="price">
                                                <span class="old-price">$35,568</span>
                                                <span class="new-price">$32,698 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item active" style="width: 262.5px; margin-right: 20px;"><div class="item">
                                    <div class="car-item text-center">
                                        <div class="car-image">
                                            <img class="img-fluid" src="images/14.jpg" alt="">
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
                                                <li><i class="fa fa-registered"></i> 2017</li>
                                                <li><i class="fa fa-cog"></i> Manual </li>
                                                <li><i class="fa fa-dashboard"></i> 6,000 mi</li>
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
                                            <a href="single-car-product.html">Toyota avalon hybrid </a>
                                            <div class="separator"></div>
                                            <div class="price">
                                                <span class="old-price">$35,568</span>
                                                <span class="new-price">$32,698 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item" style="width: 262.5px; margin-right: 20px;"><div class="item">
                                    <div class="car-item text-center">
                                        <div class="car-image">
                                            <img class="img-fluid" src="images/15.jpg" alt="">
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
                                                <li><i class="fa fa-registered"></i> 2017</li>
                                                <li><i class="fa fa-cog"></i> Manual </li>
                                                <li><i class="fa fa-dashboard"></i> 6,000 mi</li>
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
                                            <a href="single-car-product.html">Hyundai santa fe sport </a>
                                            <div class="separator"></div>
                                            <div class="price">
                                                <span class="old-price">$35,568</span>
                                                <span class="new-price">$32,698 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item cloned" style="width: 262.5px; margin-right: 20px;"><div class="item">
                                    <div class="car-item text-center">
                                        <div class="car-image">
                                            <img class="img-fluid" src="images/11.jpg" alt="">
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
                                                <li><i class="fa fa-registered"></i> 2017</li>
                                                <li><i class="fa fa-cog"></i> Manual </li>
                                                <li><i class="fa fa-dashboard"></i> 6,000 mi</li>
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
                                            <a href="single-car-product.html">Acura Rsx</a>
                                            <div class="separator"></div>
                                            <div class="price">
                                                <span class="old-price">$35,568</span>
                                                <span class="new-price">$32,698 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item cloned" style="width: 262.5px; margin-right: 20px;"><div class="item">
                                    <div class="car-item text-center">
                                        <div class="car-image">
                                            <img class="img-fluid" src="images/12.jpg" alt="">
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
                                                <li><i class="fa fa-registered"></i> 2017</li>
                                                <li><i class="fa fa-cog"></i> Manual </li>
                                                <li><i class="fa fa-dashboard"></i> 6,000 mi</li>
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
                                            <a href="single-car-product.html">Lexus GS 450h</a>
                                            <div class="separator"></div>
                                            <div class="price">
                                                <span class="old-price">$35,568</span>
                                                <span class="new-price">$32,698 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item cloned" style="width: 262.5px; margin-right: 20px;"><div class="item">
                                    <div class="car-item text-center">
                                        <div class="car-image">
                                            <img class="img-fluid" src="images/16.jpg" alt="">
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
                                                <li><i class="fa fa-registered"></i> 2017</li>
                                                <li><i class="fa fa-cog"></i> Manual </li>
                                                <li><i class="fa fa-dashboard"></i> 6,000 mi</li>
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
                                            <a href="single-car-product.html">GTA 5 Lowriders DLC</a>
                                            <div class="separator"></div>
                                            <div class="price">
                                                <span class="old-price">$35,568</span>
                                                <span class="new-price">$32,698 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item cloned" style="width: 262.5px; margin-right: 20px;">
                                    <div class="item">
                                    <div class="car-item text-center">
                                        <div class="car-image">
                                            <img class="img-fluid" src="images/14.jpg" alt="">
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
                                                <li><i class="fa fa-registered"></i> 2017</li>
                                                <li><i class="fa fa-cog"></i> Manual </li>
                                                <li><i class="fa fa-dashboard"></i> 6,000 mi</li>
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
                                            <a href="single-car-product.html">Toyota avalon hybrid </a>
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
                    <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i class="fa fa-angle-left fa-2x"></i></button><button type="button" role="presentation" class="owl-next"><i class="fa fa-angle-right fa-2x"></i></button></div>
                    <div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button role="button" class="owl-dot"><span></span></button></div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('script')
<script>
    var vuejs = new Vue({
        el: '#insurance-company',
        data: {
            brand: {},
            model:  {},
            package: {},
        },
        methods: {
            getFromStorage: function() {
                if (localStorage.category)
                    this.category = JSON.parse(localStorage.category);
                if (localStorage.brand)
                    this.brand = JSON.parse(localStorage.brand);
                if (localStorage.model)
                    this.model = JSON.parse(localStorage.model);
                if (localStorage.type)
                    this.type = localStorage.type;
                if (localStorage.displacement)
                    this.displacement = JSON.parse(localStorage.displacement);
                if (localStorage.passenger)
                    this.passenger = localStorage.passenger;
                if (localStorage.price)
                    this.price = localStorage.price;
            },
            coverageStringToArray: function() {
                for(let i=0; i<this.companies.length; i++) {
                    this.companies[i].basic_coverage = this.companies[i].basic_coverage.split(',');
                    this.companies[i].insurance_feature = this.companies[i].insurance_feature.split(',');
                }
            },
            pageSetting: function() {
                if(this.category.id == 2) {
                    this.passenger = 1;
                    localStorage.passenger = 1;
                }
            },
            openModal: function(company) {
                this.company = company;
                
                $('#insurance-company-modal').modal('show');
            },
            formSubmit: function(company) {
                this.company = company;
                Vue.nextTick(function() {
                    vuejs.$refs.form.submit();
                });
            },
            ownDamage: function(c) {
                
                if(this.type == this.types[1])
                    return this.displacement.basic + this.price*c.total_rate/100;
                else
                    return 0;
            },
            netPremium: function(c) {
                return this.ownDamage(c) + this.displacement.act_liability + this.passenger*45 + 30;
            },
            totalPremium: function(c) {
                return this.netPremium(c) + this.netPremium(c) * 15/100;
            },
            grandTotal: function(c) {
                return this.totalPremium(c) + 40;
            },
            calculateRate: function() {
                for(let c = 0; c < this.companies.length; c++) {
                    this.companies[c].total_rate = 0;
                    for(let i = 0; i < this.companies[c].basic_coverage.length; i++) {
                        for(let j=0; j<this.coverages.length; j++) {
                            if(this.companies[c].basic_coverage[i] == this.coverages[j].id) {
                                this.companies[c].total_rate += Number(this.coverages[j].rate);
                                break;
                            }
                        }
                    }
                }
            }
        },
        computed: {
            
        },
        watch: {
            company: function(v) {
                localStorage.company = JSON.stringify(v);
            }
        },
        created: function() {
            this.calculateRate();
        },
        mounted: function() {
            this.getFromStorage();
            this.coverageStringToArray();
            this.pageSetting();
        },
    });
</script>
@endsection
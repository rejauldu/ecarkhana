@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.car-background')

<section class="section-full content-inner-2" id="compare">
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
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card" @click.prevent="openModal(2)" v-if="page == 1">
                    <img class="card-img-top img-fluid cursor-pointer hover-opacity-5" src="{{ url('/') }}/images/add-car.jpg" alt="Card image">
                    <div class="card-body">
                        <div class="input-group rounded-0 rounded-top" @click="openModal(2)">
                            <input type="text" class="form-control border-right-0 rounded-0 border-bottom-0" placeholder="Select Brand/Model">
                            <div class="input-group-append">
                                <span class="input-group-text bg-white border-left-0  border-bottom-0 rounded-0"><i class="fa fa-caret-down"></i></span>
                            </div>
                        </div>
                        <div class="input-group rounded-0" @click="openModal(3)">
                            <input type="text" class="form-control border-right-0 rounded-0" placeholder="Select Package">
                            <div class="input-group-append">
                                <span class="input-group-text bg-white border-left-0 rounded-0"><i class="fa fa-caret-down"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" v-if="page == 2">
                    <div class="card-header bg-white">
                        <a class="btn btn-link text-danger" href="#" @click.prevent="page=2">Brand/Modal</a> <a class="btn btn-link text-dark" href="#" @click.prevent="page=3">Package</a>
                        <i class="fa fa-close position-absolute right-10 top-10 cursor-pointer btn-light text-danger" @click.prevent="page=1"></i>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Select Brand/Model" v-model="search">
                        </div>
                        <ul class="list-group compare-scroll" v-if="filteredBrands.length">
                            <li class="list-group-item py-1 cursor-pointer border-0" v-for="b in filteredBrands" :class="{'text-danger': b.id == brand.id}">
                                <strong><i class="fa fa-check" v-if="b.id == brand.id"></i> @{{ b.name }}</strong>
                                <ul class="list-group list-group-flush border-left">
                                    <li class="list-group-item list-group-item-action py-1 cursor-pointer border-0" v-for="m in models" @click.prevent="modelSelected(m)" :class="{'text-danger': m.id == model.id}" v-if="b.id == m.brand_id"><i class="fa fa-check" v-if="m.id == model.id"></i> @{{ m.name }}</li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="list-group compare-scroll" v-else>
                            <li class="list-group-item py-1 cursor-pointer border-0" v-for="b in brands" :class="{'text-danger': b.id == brand.id}">
                                <strong><i class="fa fa-check" v-if="b.id == brand.id"></i> @{{ b.name }}</strong>
                                <ul class="list-group list-group-flush border-left">
                                    <li class="list-group-item list-group-item-action py-1 cursor-pointer border-0" v-for="m in filteredModels" @click.prevent="modelSelected(m)" :class="{'text-danger': m.id == model.id}" v-if="b.id == m.brand_id"><i class="fa fa-check" v-if="m.id == model.id"></i> @{{ m.name }}</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card" v-if="page == 3">
                    <div class="card-header bg-white">
                        <a class="btn btn-link text-dark" href="#" @click.prevent="page=2">Brand/Model</a> <a class="btn btn-link text-danger" href="#" @click.prevent="page=3">Package</a>
                        <i class="fa fa-close position-absolute right-10 top-10 cursor-pointer btn-light text-danger" @click.prevent="page=1"></i>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Select Package" v-model="search">
                        </div>
                        <ul class="list-group list-group-flush compare-scroll">
                            <li class="list-group-item list-group-item-action py-1 cursor-pointer" v-for="p in filteredPackages" :class="{'text-danger': p.id == package.id}" v-if="p.model_id == model.id" @click.prevent="packageSelected(p)">
                                <i class="fa fa-check" v-if="p.id == package.id"></i> @{{ p.name }}
                            </li>
                        </ul>
                    </div>
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
        el: '#compare',
        data: {
            products: [],
            search:"",
            brand: {},
            brands: @json($brands),
            model:  {},
            models: @json($models),
            package: {},
            packages: @json($packages),
            page: 1
        },
        methods: {
            openModal: function (p) {
                if (p == 1) {
                    this.page = 1;
                } else if (p == 2) {
                    this.page = 2;
                } else if (p == 3) {
                    if (this.model)
                        this.page = 3;
                }

                $('#sell-car-modal').modal('show');
            },
            
            modelSelected: function (m) {
                this.model = m;
                this.search = '';
                this.page = 3;
            },
            packageSelected: function (p) {
                this.package = p;
            },
            isEmpty: function(obj) {
                return Object.keys(obj).length === 0;
            },
            getProduct: function() {
                var _this = this;
                $.ajax({
                    url: "{{ route('get-regions') }}?brand_id=" + _this.brand.id + "&model_id=" + _this.model.id + "&package_id=" + _this.package.id,
                    dataType: "json",
                    success: function(result){
                        console.log(result);
                        _this.products[] = result;
                    }
                });
            },
        },
        computed: {
            filteredBrands() {
                return this.brands.filter(item => {
                    return item.name.toLowerCase().startsWith(this.search.toLowerCase());
                })
            },
            filteredModels() {
                return this.models.filter(item => {
                    return item.name.toLowerCase().startsWith(this.search.toLowerCase());
                })
            },
            filteredPackages() {
                return this.packages.filter(item => {
                    return item.name.toLowerCase().startsWith(this.search.toLowerCase());
                })
            }
        },
        watch: {
        },
        created: function() {
        },
        mounted: function() {
        },
    });
</script>
@endsection
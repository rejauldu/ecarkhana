@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif

@if($category == "Car")
@include('layouts.frontend.car-background')
@elseif($category == "Motorcycle")
@include('layouts.frontend.motorcycle-background')
@elseif($category == "Bicycle")
@include('layouts.frontend.bicycle-background')
@endif


<!--=================================product-listing  -->

<section class="product-listing page-section-ptb">
    <div class="container">
        <div class="row">
            @computer
            <div class="col-lg-3 col-md-4">
                <div class="listing-sidebar">
                    @include('layouts.frontend.left-filter')
                </div>
            </div>
            @endcomputer

            <div class="col-lg-9 col-md-8" id="products">
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-12 col-md-6 col-lg-4 px-2">
                        <div class="bg-white product-hover-effect shadow-sm mb-3">
                            <div class="size-53">
                                <div class="size-child overflow-hidden">
                                    <img class="position-center h-auto w-100" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image1 ?? 'not-found.jpg' }}" alt="{{ $product->name }}">
                                </div>
                                <div class="size-child product-hover-show">
                                    <div class="float-left form-control bg-dark text-white text-left border-0 d-inline-block w-auto position-relative py-1 height-30">
                                        <input type="checkbox" id="new-{{ $product->id }}" class="compare-checkbox" product-id="{{ $product->id }}">
                                        <label for="new-{{ $product->id }}">Compare</label>
                                    </div>
                                </div>
                                <div class="bg-white product-hover-show2 position-absolute height-30 w-100 line-height-30 bottom-0">
                                    <a class="btn btn-link border text-dark py-1" href="{{ route('products.show', $product->id) }}">Dealer Detail</a>
                                    <a class="btn btn-link border float-right text-dark py-1" href="#" @click.prevent='openWhatsappModal({{ $product->id }})'><i class="fa fa-whatsapp text-success"></i> Chat</a>
                                </div>
                            </div>
                            <div class="text-dark clearfix px-3 py-1">
                                <div class="text-center">
                                    <i class="fa @if($product->rating > 0) fa-star @else fa-star-o @endif orange-color"></i>
                                    <i class="fa @if($product->rating > 1) fa-star @else fa-star-o @endif orange-color"></i>
                                    <i class="fa @if($product->rating > 2) fa-star @else fa-star-o @endif orange-color"></i>
                                    <i class="fa @if($product->rating > 3) fa-star @else fa-star-o @endif orange-color"></i>
                                    <i class="fa @if($product->rating > 4) fa-star @else fa-star-o @endif orange-color"></i>
                                </div>
                                <div class="text-left clearfix">
                                    <span><i class="fa fa-map-marker text-danger"></i> {{ $product->supplier->region->name ?? ''}}</span>
                                    <span class="float-right"><i class="fa fa-industry text-warning"></i> {{ $product->brand->name ?? ''}}</span>
                                </div>
                                <div class="display-6 my-2 owl-heading"><a href="{{ route('products.show', $product->id) }}" class="">{{ $product->name }}</a></div>
                                <div class="separator"></div>
                                <h3 class="owl-heading">Tk.{{ $product->msrp }}</h3>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="pagination-nav d-flex justify-content-center">
                    {{ $products->links() }}
                </div>
                <!-- The Modal -->
                <div class="modal fullscreen-md" id="whatsapp-modal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Personal Details</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Your Name:</label>
                                    <input type="name" class="form-control" placeholder="Enter Name" id="name" v-model="name">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Number:</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text btn btn-link bg-white border-right-0 text-dark">+88</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="phone" id="phone" name="phone" v-model="phone" @keyup="isPhoneValid" :disabled="otp_sent">
                                        <div class="input-group-append">
                                            <a class="input-group-text btn btn-link bg-white border-left-0 text-success" href="#" v-if="isPhoneValid() && !otp_sent" @click.prevent="sendOtp">Verify Now</a>
                                            <span class="input-group-text btn bg-white border-left-0 text-secondary" v-else-if="!otp_sent">Invalid</span>
                                            <a class="input-group-text btn bg-white border-left-0 text-danger" href="#" v-else>@{{ countDown }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" v-if="otp_sent">
                                    <label for="demo">OTP:</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="OTP" id="otp" name="otp" v-model="otp">
                                        <div class="input-group-append">
                                            <span class="input-group-text btn bg-white border-left-0 text-secondary" v-if="otp_sent && !otp_error"><i class="fa fa-spinner fa-spin"></i></span>
                                            <a class="input-group-text btn bg-white border-left-0 text-danger" href="#" v-else-if="otp_error">Wrong OTP</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="terms" name="terms" v-model="terms">
                                    <label class="custom-control-label" for="terms">I agree to the <a class="btn btn-link text-primary p-0" href="#">Terms of Service</a> and <a class="btn btn-link text-primary p-0" href="#">Privacy Policy</a></label>
                                </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer" v-if="name && phone && otp_sent && terms">
                                <a class="btn red border" href="#" @click.prevent="verifyOtp">See Seller Details</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            @mobile
            <div class="sms-phone-footer-filter">
                <ul class=" filterSticky">
                    <li class="ecar-short-phn"><i class="fa fa-sort" aria-hidden="true"></i>Sort</li>
                    <li class="ecar-filter-phn"><i class="fa fa-filter" aria-hidden="true"></i>Filters</li>
                </ul>
            </div>
            <div class="sortByPanel" style="display:none;">
                <div class="heading">Sort by :</div>
                <div class="gsc_closeBtn">×</div>
                <ul class="sms-short-phn">
                    <li>
                        <div class="listTitle">Price</div>
                        <div class="listText">
                            <div class="">Low to High</div>
                            <div class="" data-sort="price-desc">High to Low</div>
                        </div>
                    </li>
                    <li>
                        <div class="listTitle">Mileage</div>
                        <div class="listText">
                            <div class="">Low to High</div>
                            <div class="">High to Low</div>
                        </div>
                    </li> 
                    <li>
                        <div class="listTitle">Popularity</div>
                        <div class="listText">
                            <div class="">Popular</div>
                        </div>
                    </li>
                    <li>
                        <div class="listTitle">Latest</div>
                        <div class="listText">
                            <div class="">Latest</div>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="smsphone-list-filter" style="display:none;"> 
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="#">Price</a>
                        <ul>
                            <li>
                                <span class="checkbox">
                                    <label>
                                        <input type="checkbox"> All Conditions
                                    </label>
                                </span>
                            </li>
                        </ul>
                    </li>
                    <li class="list-group-item">
                        <a href="#">Year</a>
                        <ul>
                            <li>
                                <span class="checkbox">
                                    <label><input type="checkbox"> All Years</label>
                                </span>
                            </li>
                            <li>
                                <span class="checkbox">
                                    <label>
                                        <input type="checkbox"> 2009
                                    </label>
                                </span>
                            </li>
                            <li>
                                <span class="checkbox">
                                    <label>
                                        <input type="checkbox"> 2010
                                    </label>
                                </span>
                            </li>
                            <li>
                                <span class="checkbox">
                                    <label>
                                        <input type="checkbox"> 2011
                                    </label>
                                </span>
                            </li>
                            <li>
                                <span class="checkbox">
                                    <label>
                                        <input type="checkbox"> 2012
                                    </label>
                                </span>
                            </li>
                            <li>
                                <span class="checkbox">
                                    <label>
                                        <input type="checkbox"> 2013
                                    </label>
                                </span>
                            </li>
                            <li>
                                <span class="checkbox">
                                    <label>
                                        <input type="checkbox"> 2014
                                    </label>
                                </span>
                            </li>
                            <li>
                                <span class="checkbox">
                                    <label>
                                        <input type="checkbox"> 2015
                                    </label>
                                </span>
                            </li>
                            <li>
                                <span class="checkbox">
                                    <label>
                                        <input type="checkbox"> 2016
                                    </label>
                                </span>
                            </li>
                        </ul>
                    </li>
                    <li class="list-group-item">
                        <a href="#">Condition</a>
                        <ul>
                            <li>
                                <span class="checkbox">
                                    <label>
                                        <input type="checkbox"> All Conditions
                                    </label>
                                </span>
                            </li>
                            <li>
                                <span class="checkbox">
                                    <label>
                                        <input type="checkbox"> Brand New
                                    </label>
                                </span>
                            </li>
                            <li>
                                <span class="checkbox">
                                    <label>
                                        <input type="checkbox"> Slightly Used
                                    </label>
                                </span>
                            </li>
                            <li>
                                <span class="checkbox">
                                    <label>
                                        <input type="checkbox"> Used
                                    </label>
                                </span>
                            </li>
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
                            <li>
                                <span class="checkbox">
                                    <label>
                                        <input type="checkbox"> Luxor Beige
                                    </label>
                                </span>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            @else

            @endmobile
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


<!--=================================End business partner -->

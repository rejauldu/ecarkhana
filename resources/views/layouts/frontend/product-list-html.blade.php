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
                @include('layouts.frontend.products')
                <div class="pagination-nav d-flex justify-content-center">
                    {{ $products->links() }}
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

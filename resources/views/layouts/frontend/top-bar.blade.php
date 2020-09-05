<header id="header" class="defualt">
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="topbar-left text-lg-left text-center">
                        <ul class="list-inline">
                            <li> <i class="fa fa-envelope-o"> </i> {{ env('MAIL_CONTACT_US') }}</li>
                            <li> <i class="fa fa-phone"></i> {{ env('PHONE_CONTACT_US') }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="topbar-right text-lg-right text-center">
                        @guest
                        <div class="sms-login-btn">
                            <a href="#" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal" data-target="#loginform"> <i class="fa fa-user"></i></a>
                        </div>
                        @endguest
                        @auth
                        <div class="sms-seller-dropdown" id="app">
                            <a href="#" class="sms-dropdown">
                                <img class="img-circle resize" alt="" src="{{ url('/') }}/assets/profile/{{ $user->photo ?? 'not-found.jpg' }}"> {{ $user->name ?? 'Unnamed' }} <i class="fa fa-sort-desc" aria-hidden="true"></i>
                            </a>
                            <ul>
                                <li><a href="{{ route('seller-profile', Auth::user()->id) }}">Seller Profile</a></li>
                                <li><a href="{{ route('seller-my-ad', Auth::user()->id) }}">Active Ads</a></li>
                                <li><a href="{{ route('chats.index') }}">Message Panel</a></li>
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                            </ul>
                        </div>
                        @endauth
                        <div class="sms-menu-add-cart" id="cart">
                            <a href="#"><i class="fa fa-shopping-cart"></i> Cart <span class="badge total-product">@{{ totalProduct }}</span></a>
                            <div class="shopping-cart">
                                <div class="shopping-cart-header">
                                    <i class="fa fa-shopping-cart cart-icon"></i><span class="badge total-product">@{{ totalProduct }}</span>
                                    <div class="shopping-cart-total">
                                        <span class="lighter-text">Total:</span>
                                        <span class="main-color-text total-cost"></span>
                                    </div>
                                </div>
                                <!--end shopping-cart-header -->

                                <ul class="shopping-cart-items">
                                    <li class="clearfix" v-for="product in products">
                                        <img v-bind:src="product.image1" alt="item1" />
                                        <span class="item-name">@{{ product.name }}</span>
                                        <span class="item-detail owl-paragraph">@{{ product.note }}</span>
                                        <span class="item-price">Tk.@{{ product.msrp }}</span>
                                        <span class="item-quantity">Quantity: @{{ product.quantity }}</span>
                                        <span class="sms-cart-delete" @click.prevent="remove(product.id)"><i class="fa fa-trash"></i></span>
                                    </li>
                                </ul>
                                <div class="sms-ecommerce-btn">
                                    <a href="{{ route('motorcycle-cart') }}" class="button red">View Cart  <i class="fa fa-chevron-right"></i></a>
                                    <a href="{{ route('motorcycle-checkout') }}" class="button red">Checkout <i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="sell-car-btn">
                            <a href="car-ad-post" class="button red">Sell Car</a>
                        </div>
                        <div>
                            <form action="{{ route('search-page') }}">
                                <div class="searchBox">
                                    <input class="searchInput" type="text" name="search" placeholder="Search" value="{{ $search ?? '' }}">
                                    <button class="searchButton" type="submit">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <div class="sms-menu">
        <div class="container">
            <div id='main-menu' class='main-menu'>
                <div class="logo">
                    <a href="{{ url('/') }}"><img src="{{ asset('assets/logo.png') }}" alt="image" /></a>
                </div>
                <div class='container-menu'>
                    <nav class='navigation'>
                        <ul class='core-menu'>
                            <li class="@if((isset($type) && $type == 'Car') || !isset($type)) current @endif sms-focus"><a href='{{ url('/') }}'><i class="fa fa-car"></i>Car</a></li>
                            <li class="@if(isset($type) && $type == 'Motorcycle') current @endif sms-focus"><a href='{{ route("motorcycle-index") }}'><i class="fa fa-motorcycle"></i>Bike</a></li>
                            <li class="@if(isset($type) && $type == 'Bicycle') current @endif sms-focus"><a href='{{ route("bicycle-index") }}'><i class="fa fa-bicycle"></i>Bicycle</a></li>
                            <li class="slide"></li>
                        </ul>

                        <div class="menu-wrapper text-center">
                            <button class="sms-menu-toggle">
                                <div class="one"></div>
                                <div class="two"></div>
                                <div class="three"></div>
                            </button>
                            <div class="sms-main-menu">
                                <nav>
                                    <ul class="m-0 p-0">
                                        <li class="mobile-menu"><a href='{{ url('/') }}'>Car</a></li>
                                        <li class="mobile-menu"><a href='bike-index'>Bike</a> </li>
                                        <li class="mobile-menu"><a href='bicycle-index'>Bicycle</a>
                                        </li>
                                        <li><a href="{{ route('dealer-list') }}" class="current-hover">EShowroom</a>
                                        </li>
                                        <li><a href="{{ route('national-distributor-list') }}">National Distributor </a>
                                        </li>
                                        <li class="carkhana-drop"><a href="#">Loan Info <i class="fa fa-angle-double-down"></i></a>
                                            <ul class='dropdown'>
                                                <li><a href="{{ route('car-loan') }}">Apply Loan </a></li>
                                                <li><a href="{{ route('loan-eligibility') }}">Loan Eligibility</a></li>
                                                <li><a href="{{ route('insurance') }}">Insurance</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('car-listing') }}">Buy Cars</a>
                                        </li>
                                        <li><a href="{{ route('sell-product-list') }}">Sell Cars</a> </li>
                                        <li><a href="{{ route('compare') }}@if(isset($type) && $type == 'Motorcycle')?category=Motorcycle @elseif(isset($type) && $type == 'Bicycle')?category=Bicycle @endif">Comparison</a> </li>
                                        <li><a href="{{ route('auction-product-list') }}">Auction</a> </li>
                                        <li><a href="{{ route('group-buying-list') }}">Group Buying</a> </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Navigation end -->
</header>

<!--=================================header -->
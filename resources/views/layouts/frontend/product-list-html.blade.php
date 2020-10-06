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
            
            
        </div>
</section>

<section class="w-100 z-index-999999 position-relative py-0">
    <div class="row">
        <div class="col-12">
            <div class="position-fixed w-100 bottom-10 z-index">
                <div class="height-40 line-height-40 display-6 bg-white mx-5 shadow text-center rounded-lg" data-toggle="collapse" data-target="#mobile-filter">
                    <i class="fa fa-filter text-danger"></i> Filter
                </div>
            </div>
        </div>
    </div>
</section>
<section class="w-100 bg-white z-index-99999 position-fixed bottom-0 py-0 collapse" id="mobile-filter">
    <div class="row">
        <div class="col-12 y-scroll vh">
            @include('layouts.frontend.left-filter')
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

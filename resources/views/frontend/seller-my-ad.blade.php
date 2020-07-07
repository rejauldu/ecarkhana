@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
	{{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.car-background')


    <!--=================================
Start Seller ad  -->

    <section class="seller-profile page-section-ptb">
        <div class="container">
            @include('layouts.frontend.profile-header', ['ad' => 'active'])
            <div class="seller-ad-area">
                <div class="row">
					@foreach($user->products as $product)
                    <div class="col-md-4">
                        <div class="featured-car-list">
                            <div class="featured-car-img">
                                <a href=""><img src="{{ url('/') }}/assets/products/{{ $product->picture ?? 'not-found.jpg'}}" class="img-responsive img-fluid" alt="Image"></a>
                                <div class="featured-ribbon">
                                    <span>Featured</span>
                                </div>
                                <div class="notification msgs">
                                    <a class="round-btn" href=""><i class="fa fa-shopping-cart"></i></a>
                                    <span>{{ $product->order_details->sum('quantity') }}</span>
                                </div>
                            </div>
                            <div class="featured-car-content">
                                <h6><a href="single-car-product.html">{{ $product->brand->name ?? ''}} {{ $product->model->name ?? ''}}</a></h6>
                                <div class="price_info">
                                    <p class="featured-price">৳ {{ $product->msrp }}</p>
                                    <div class="car-location"><span><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $product->supplier->region->name }}, {{ $product->supplier->division->name }}</span></div>
                                </div>
                                <ul>
									@if($product->condition_id == 3)
                                    <li><i class="fa fa-road" aria-hidden="true"></i>{{ $product->kms_driven }} km</li>
                                    <li><i class="fa fa-calendar" aria-hidden="true"></i>{{ $product->registration_year }}</li>
									@endif
                                    <li><i class="fa fa-car" aria-hidden="true"></i>{{ $product->model->name ?? ''}} model</li>
                                    <li><i class="fa fa-building-o" aria-hidden="true"></i>{{ $product->brand->name ?? ''}}</li>
                                </ul>
                                <div class="ad-info-1">
                                    <p><i class="fa fa-calendar" aria-hidden="true"></i> &nbsp;<span>{{ $product->created_at->format('jS M Y') }}</span></p>
                                    <ul class="pull-right">
                                        <li> <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit this Ad" href=""><i class="fa fa-pencil edit"></i></a> </li>
                                        <li> <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="fa fa-times delete"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
					@endforeach
                </div>
            </div>
        </div>
    </section>

    <!--=================================
   End Seller ad   -->



@endsection
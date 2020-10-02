@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
	{{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.car-background')

    <!--=================================
   Start Dealer details-->
    <section class="dealer_profile inner_pages">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-4">
                    <div class="dealer_logo"> <img src="{{ url('assets/profile') }}/{{ $u->photo }}" alt="image"> </div>
                </div>
                <div class="col-md-6 col-sm-5 col-8">
                    <div class="dealer_info">
                        <h4>{{ $u->name }}</h4>
                        <p>{{ $u->address ?? '' }}<br>{{ $u->division->name ?? '' }}, {{ $u->phone ?? '' }}</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-12">
                    <div class="dealer_contact_info gray-bg">
                        <h6><i class="fa fa-globe" aria-hidden="true"></i> Website</h6>
                        <a href="{{ $u->website ?? '' }}">{{ $u->website ?? '' }}</a> </div>
                    <div class="dealer_contact_info gray-bg">
                        <h6><i class="fa fa-envelope" aria-hidden="true"></i> Email Address</h6>
                        <a href="mailto:{{ $u->email ?? '' }}">{{ $u->email ?? '' }}</a> </div>
                    <div class="dealer_contact_info gray-bg">
                        <h6><i class="fa fa-phone" aria-hidden="true"></i> Phone Number</h6>
                        <a href="tel:{{ $u->phone ?? '' }}">{{ $u->phone ?? '' }}</a> </div>
                </div>
            </div>
            <div class="space-60"></div>
            <div class="row">
                <div class="col-md-9 text-center">
                    <h2>Seller's Products</h2>
                    <div class="car-item">
                        <div class="separator"></div>
                    </div>
                    <div class="owl-carousel owl-theme" data-nav-arrow="true" data-items="3" data-md-items="3" data-sm-items="2" data-xs-items="1" data-space="0">
                        @foreach($related_products as $related_product)
                        <div class="item">
                            <div class="bg-white shadow-sm mx-1 zoom-parent overflow-hidden shadow-hover-10">
                                <div class="size-53 clearfix">
                                    <div class="size-child overflow-hidden zoom-target-1">
                                        <img class="position-center h-auto" src="{{ url('/') }}/assets/products/{{ $related_product->id }}/{{ $related_product->image1 ?? 'not-found.jpg' }}" alt="{{ $related_product->name }}">
                                    </div>
                                    <div class="float-left form-control bg-dark text-white text-left border-0 d-inline-block w-auto position-relative height-30 py-1">
                                        <input type="checkbox" id="used-{{ $related_product->id }}" class="compare-checkbox" product-id="{{ $related_product->id }}">
                                        <label for="used-{{ $related_product->id }}">Compare</label>
                                    </div>
                                    @if($related_product->condition_id == 3)
                                    <div class="float-right form-control bg-danger text-white text-left border-0 d-inline-block w-auto position-relative height-30 py-1">
                                        Used
                                    </div>
                                    @endif
                                </div>
                                <div class="text-dark clearfix px-3 py-1">
                                    <div>
                                        <i class="fa @if($related_product->rating > 0) fa-star @else fa-star-o @endif orange-color"></i>
                                        <i class="fa @if($related_product->rating > 1) fa-star @else fa-star-o @endif orange-color"></i>
                                        <i class="fa @if($related_product->rating > 2) fa-star @else fa-star-o @endif orange-color"></i>
                                        <i class="fa @if($related_product->rating > 3) fa-star @else fa-star-o @endif orange-color"></i>
                                        <i class="fa @if($related_product->rating > 4) fa-star @else fa-star-o @endif orange-color"></i>
                                    </div>
                                    <div class="text-left clearfix">
                                        <span><i class="fa fa-map-marker text-danger"></i> {{ $related_product->supplier->region->name ?? ''}}</span>
                                        <span class="float-right"><i class="fa fa-industry text-warning"></i> {{ $related_product->brand->name ?? ''}}</span>
                                    </div>
                                    <div class="display-6 my-2 owl-heading"><a href="{{ route('products.show', $related_product->id) }}" class="">{{ $related_product->name }}</a></div>
                                    <div class="separator"></div>
                                    <h3 class="owl-heading">Tk.{{ $related_product->msrp }}</h3>
                                    <div class="row text-left">
                                        <div class="col-6 my-1">
                                            <i class="fa fa-hourglass-end"></i> {{ $related_product->brand->name ?? ''}} brand
                                        </div>
                                        <div class="col-6 my-1">
                                            <i class="fa fa-calendar"></i> {{ $related_product->model->name ?? ''}} model
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @php($category = strtolower($related_product->category->name))
                    @php($route = $category."s.index")
                    <a href="{{ route($route) }}" target="_blank" class="button red mt-3">View All<i class="fa fa-chevron-circle-right"></i></a>
                </div>
                <aside class="col-md-3">
                    <div class="sidebar_widget">
                        <div class="widget_heading">
                            <h5><i class="fa fa-envelope" aria-hidden="true"></i> Message to Dealer</h5>
                        </div>
                        <form action="{{ route('requested-more-infos.store') }}" method="post">
							@csrf
							<input type="hidden" name="user_id" value="{{ $u->id }}">
                            <div class="form-group">
								<input type="text" name="name" class="form-control" id="validationCustom01" placeholder="Name" required>
							</div>
							<div class="form-group">
								<input type="text" name="email" class="form-control" id="validationCustom02" placeholder="Email" required>
							</div>
							<div class="form-group">
								<input type="text" name="phone" class="form-control" id="validationCustom03" placeholder="Phone" required>
							</div>
							<div class="form-group">
								<textarea class="form-control" name="message" rows="4" placeholder="Comment"></textarea>
							</div>
							<div class="form-group">
								<button type="submit" class="button red">Request a service</button>
							</div>
                        </form>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <!--=================================
   End Dealer details-->

@endsection
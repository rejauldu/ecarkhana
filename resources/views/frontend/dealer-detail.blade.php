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
                <div class="col-md-9">
                    <div class="dealer_more_info">
                        <h5 class="gray-bg info_title">About {{ $u->name ?? '' }}</h5>
                        <p>{{ $u->about ?? '' }}</p>

                        <div class="dealer_listings">
                            <h6>Inventorys Listing By {{ $u->name ?? '' }}</h6>
                            <div class="row">
                                <div class="col-md-12">
									<div class="owl-carousel" data-nav-arrow="true" data-nav-dots="true" data-items="3" data-md-items="3" data-sm-items="2" data-space="15">
										@foreach($related_products as $related_product)
										<div class="item">
											<div class="featured-car-list">
												<div class="featured-car-img">
													<a href=""><img src="{{ url('/') }}/assets/products/cars/{{ $related_product->car->image1 }}" class="img-responsive" alt="Image"></a>
													<div class="label_icon">Used</div>
													<div class="compare_item">
														<div class="checkbox">
															<input type="checkbox" class="compare-checkbox" class="compare-checkbox" id="compare3">
															<label for="compare3">Compare</label>
														</div>
													</div>
												</div>
												<div class="featured-car-content">
													<h6><a href="{{ route('single-car-product', $related_product->id) }}">{{ $related_product->car->brand->name ?? ''}}</a></h6>
													<div class="price_info">
														<p class="featured-price">$ {{ $related_product->msrp ?? ''}}</p>
														<div class="car-location"><span><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $related_product->supplier->region->name ?? ''}}, {{ $related_product->supplier->division->name ?? ''}}</span></div>
													</div>
													<ul>
														<li><i class="fa fa-road" aria-hidden="true"></i>{{ $related_product->car->kms_driven ?? ''}} km</li>
														<li><i class="fa fa-tachometer" aria-hidden="true"></i>{{ $related_product->car->milage ?? ''}} miles</li>
														<li><i class="fa fa-calendar" aria-hidden="true"></i>{{ $related_product->car->model->name ?? ''}} model</li>
														<li><i class="fa fa-car" aria-hidden="true"></i>{{ $related_product->car->fuel_type->name ?? ''}}</li>
														<li><i class="fa fa-user" aria-hidden="true"></i>{{ $related_product->car->brand->name ?? ''}} brand</li>
														<li><i class="fa fa-superpowers" aria-hidden="true"></i>{{ $related_product->car->maximum_power ?? ''}} kW</li>
													</ul>
												</div>
											</div>
										</div>
										@endforeach
									</div>
								</div>
                            </div>
                        </div>
                    </div>
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
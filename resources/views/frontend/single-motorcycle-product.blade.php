@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
	{{ session()->get('message') }}
</div>
@endif


@include('layouts.frontend.motorcycle-background')


    <!--=================================car-details  -->

    <section class="car-details page-section-ptb">
        <div class="container">
            <div class="row bike-space">
                <div class="col-md-9">
                    <h3>{{ $product->motorcycle->name }} {{ $product->motorcycle->model->name }} {{ $product->motorcycle->brand->name }}</h3>
                    <p>{{ $product->motorcycle->description ?? ''}}</p>
                    <div class="star">
                        <i class="fa fa-star @if($product->reviews->avg('score')<1) fa-star-o @endif orange-color"></i>
						<i class="fa fa-star @if($product->reviews->avg('score')<2) fa-star-o @endif orange-color"></i>
						<i class="fa fa-star @if($product->reviews->avg('score')<3) fa-star-o @endif orange-color"></i>
						<i class="fa fa-star @if($product->reviews->avg('score')<4) fa-star-o @endif orange-color"></i>
						<i class="fa fa-star @if($product->reviews->avg('score')<5) fa-star-o @endif orange-color"></i>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="singleprice-tag">৳ {{ $product->msrp }}<span>(Fixed)</span></div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-8">
                    <div class="slider-slick">
                        <div class="slider slider-for detail-big-motorcycle-gallery">
                            <img class="img-fluid" src="{{ url('/') }}/assets/products/motorcycles/{{ $product->motorcycle->image1 }}" alt="">
							<img class="img-fluid" src="{{ url('/') }}/assets/products/motorcycles/{{ $product->motorcycle->image2 }}" alt="">
							<img class="img-fluid" src="{{ url('/') }}/assets/products/motorcycles/{{ $product->motorcycle->image3 }}" alt="">
							<img class="img-fluid" src="{{ url('/') }}/assets/products/motorcycles/{{ $product->motorcycle->image4 }}" alt="">
							<img class="img-fluid" src="{{ url('/') }}/assets/products/motorcycles/{{ $product->motorcycle->image5 }}" alt="">
							<img class="img-fluid" src="{{ url('/') }}/assets/products/motorcycles/{{ $product->motorcycle->image6 }}" alt="">
							<img class="img-fluid" src="{{ url('/') }}/assets/products/motorcycles/{{ $product->motorcycle->image7 }}" alt="">
							<img class="img-fluid" src="{{ url('/') }}/assets/products/motorcycles/{{ $product->motorcycle->image8 }}" alt="">
							<img class="img-fluid" src="{{ url('/') }}/assets/products/motorcycles/{{ $product->motorcycle->image9 }}" alt="">
							<img class="img-fluid" src="{{ url('/') }}/assets/products/motorcycles/{{ $product->motorcycle->image10 }}" alt="">
                        </div>
                        <div class="slider slider-nav">
                            <img class="img-fluid" src="{{ url('/') }}/assets/products/motorcycles/{{ $product->motorcycle->image1 }}" alt="">
							<img class="img-fluid" src="{{ url('/') }}/assets/products/motorcycles/{{ $product->motorcycle->image2 }}" alt="">
							<img class="img-fluid" src="{{ url('/') }}/assets/products/motorcycles/{{ $product->motorcycle->image3 }}" alt="">
							<img class="img-fluid" src="{{ url('/') }}/assets/products/motorcycles/{{ $product->motorcycle->image4 }}" alt="">
							<img class="img-fluid" src="{{ url('/') }}/assets/products/motorcycles/{{ $product->motorcycle->image5 }}" alt="">
							<img class="img-fluid" src="{{ url('/') }}/assets/products/motorcycles/{{ $product->motorcycle->image6 }}" alt="">
							<img class="img-fluid" src="{{ url('/') }}/assets/products/motorcycles/{{ $product->motorcycle->image7 }}" alt="">
							<img class="img-fluid" src="{{ url('/') }}/assets/products/motorcycles/{{ $product->motorcycle->image8 }}" alt="">
							<img class="img-fluid" src="{{ url('/') }}/assets/products/motorcycles/{{ $product->motorcycle->image9 }}" alt="">
							<img class="img-fluid" src="{{ url('/') }}/assets/products/motorcycles/{{ $product->motorcycle->image10 }}" alt="">
                        </div>

                        <div class="sms-360-view">
                            <a href="" data-toggle="modal" data-target=".bd-example-modal-lg-360">
                                <img src="{{ url('/') }}/images/360-view.png" alt="">
                            </a>
                            <div class="modal fade bd-example-modal-lg-360" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel">360 view</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <canvas id='canvas' width="730px" height="570px"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sms-add-cart-place" id="add-to-cart">
                        <div class="cart-plus-minus">
                            <div class="dec qtybutton"  @click="temp_quantity-=1">-</div>
                            <input type="text" v-model="temp_quantity" class="cart-plus-minus-box" />
                            <div class="inc qtybutton" @click="temp_quantity+=1">+</div>
                        </div>
                        <div class="add_to_cart_btn">
                            <a href="#" @click.prevent="addToCart()">add to cart</a>
                        </div>
                        <div class="wishlist">
                            <a href="#"><i class="fa fa-heart-o"></i></a>
                        </div>
                        <div class="add_compare">
                            <div class="checkbox">
                                <input type="checkbox" class="compare-checkbox" value="" id="compare14">
                                <label for="compare14">Compare</label>
                            </div>
                        </div>
                    </div>
                    <div class="details-block details-weight">
                        <h5>General Specification</h5>
                        <ul>
                            <li> <span>Bike type </span> <strong class="text-right">{{ $product->motorcycle->body_type->name ?? '' }}</strong></li>
                            <li> <span>Brand </span> <strong class="text-right">{{ $product->motorcycle->brand->name ?? '' }}</strong></li>
                            <li> <span>Model</span> <strong class="text-right">{{ $product->motorcycle->model->name ?? '' }}</strong></li>
                            <li> <span>Displacement</span> <strong class="text-right">{{ $product->motorcycle->displacement->name ?? '' }}</strong></li>
                            @if($product->condition_id == 3)
                            <li> <span>Registration year: </span> <strong class="text-right">{{ $product->registration_year ?? '' }}</strong></li>
							<li> <span>Kms driven: </span> <strong class="text-right">{{ $product->kms_driven ?? '' }}</strong></li>
							@endif
                            <li> <span>No of gears </span> <strong class="text-right">{{ $product->motorcycle->gear_no ?? '' }}</strong></li>
                            <li> <span>Wheel Base </span> <strong class="text-right">{{ $product->motorcycle->wheel_base ?? '' }}</strong></li>
                            <li> <span>Made origin  </span> <strong class="text-right">{{ $product->motorcycle->made_origin->name ?? '' }}</strong></li>
                            <li> <span>Color  </span> <strong class="text-right">{{ $product->color ?? '' }}</strong></li>
                            <li> <span>Condition</span> <strong class="text-right">{{ $product->condition->name ?? '' }}</strong></li>
                            <li> <span>Engine type </span> <strong class="text-right">{{ $product->motorcycle->engine_type->name ?? '' }}</strong></li>
                            <li> <span>Max power </span> <strong class="text-right">{{ $product->motorcycle->maximum_power ?? '' }}</strong></li>
                            <li> <span>Max torque</span> <strong class="text-right">{{ $product->motorcycle->maximum_torque ?? '' }}</strong></li>
                            <li> <span>Max speed </span> <strong class="text-right">{{ $product->motorcycle->maximum_speed ?? '' }}</strong></li>
                            <li> <span>Bike assemble</span> <strong class="text-right">{{ $product->motorcycle->made_in->name ?? '' }}</strong></li>
                            <li> <span>Seller </span> <strong class="text-right">{{ $product->supplier->name ?? '' }}</strong></li>
                            <li> <span>Price</span> <strong class="text-right">৳ {{ $product->msrp ?? '' }}</strong></li>
                            <li> <span>Mileage kmpl </span> <strong class="text-right">{{ $product->motorcycle->milage ?? '' }}</strong></li>
                            <li> <span>Remarks (any Prob)</span> <strong class="text-right">{{ $product->description ?? '' }}</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
					@if(isset($auction) && $auction)
                    <div class="sms-groupbuying-area">
                        <div class="sms-coundown-area">
                            
							<div class="sms-auction-area">
								<div class="sms-coundown-area">
									<div class="flipper" data-reverse="true" data-datetime="{{ $product->auction_to }}" data-template="dd|HH|ii|ss" data-labels="Days|Hours|Minutes|Seconds" id="myFlipper">
									</div>
								</div>
								<div class="sms-bid-area">
									<div class="bid-info">
										<span>Current bid:</span>
										<span><strong>৳ {{ $product->auction_amount ?? 0}}</strong></span>
										<span> <a href="{{ route('auction-bidding-list', $product->id) }}">[ {{ $product->bids->count() }} bids ]</a> </span>
									</div>
									<div class="u-flL">
										<form action="{{ route('auctions.store') }}" method="post" class="d-block">
											@csrf
											<input type="hidden" name="product_id" value="{{ $product->id }}" />
											
											<label class="u-dspn">Your max bid:</label>
											<input placeholder="" class="MaxBidClass" type="text" name="amount">
											@if(session()->has('amount'))
												<div class="alert alert-danger">
													{{ session()->get('amount') }}
												</div>
											@endif
											<div class="notranslate">Enter more than ৳{{ $product->auction_amount ?? 0}} </div>
											<button type="submit" class="button red">Place Bid</button>
										</form>
									</div>
								</div>
							</div>
                        </div>
                        <div class="sms-notice">
                            <span><b>Notice</b>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, quasi.</span>
                        </div>
                        <div class="qunatity_price_box">
                            <div class="quantity_box">
                                <table width="100%">
                                    <tbody>
                                        <tr>
                                            <td class="column1">
                                                <h3>Quantity</h3>
                                            </td>
                                            <td>
                                                <ul class="quantity_listing  items3" id="quantity_listing">
                                                    <li class="item1">0<br>PCS</li>
                                                    <li class="item2">200<br>PCS</li>
                                                    <li class="item3">400<br>PCS</li>
                                                    <li class="item4">600<br>PCS</li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="process_order">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <div class="sms-after-process-ord"></div>
                            </div>
                            <div class="price_box">
                                <table width="100%">
                                    <tbody>
                                        <tr>
                                            <td class="column2">
                                                <h3>EXW Price</h3>
                                            </td>
                                            <td>
                                                <ul class="price_listing  items3" id="price_listing">
                                                    <li class="item2">৳5000</li>
                                                    <li class="item2">৳4500</li>
                                                    <li class="item2">৳4000</li>
                                                    <li class="item2">৳3000</li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
					@endif
                    <div class="row twelvecol tablet-hidden">

                        <div class="col-md-4 fourcol mobile-half-col">
                            <ul>
                                <li><i class="fa fa-road" aria-hidden="true"></i> Manufacturing year   
                                <div class="twelve-name">
                                        {{ $product->manufacturing_year ?? '' }}
                                    </div>
                                </li>
                                <li><i class="fa fa-hourglass-end" aria-hidden="true"></i> Suspension
                                <div class="twelve-name">
                                        {{ $product->suspension ?? '' }}
                                    </div>
                                </li>
                                <li><i class="fa fa-500px" aria-hidden="true"></i> Top speed
                                <div class="twelve-name">
                                        {{ $product->maximum_speed ?? '' }}
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-4 fourcol mobile-half-col">
                            <ul>
                                <li><i class="fa fa-cloud-upload" aria-hidden="true"></i> Fuel Supply System 
                                <div class="twelve-name">
                                        {{ $product->fuel_supply_system ?? '' }}
                                    </div>
                                </li>
                                <li><i class="fa fa-cloud-upload" aria-hidden="true"></i> FueL tank capacity
                                    <div class="twelve-name">
                                            {{ $product->fuel_tank_capacity ?? '' }}
                                        </div>
                                    </li>
                                <li><i class="fa fa-podcast" aria-hidden="true"></i> Brake system 
                                <div class="twelve-name">
                                        {{ $product->brake_system ?? '' }}
                                    </div>
                                </li>
                                <li><i class="fa fa-snowflake-o" aria-hidden="true"></i> kerb weight
                                <div class="twelve-name">
                                        {{ $product->kerb_weight ?? '' }}
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-4 fourcol last mobile-border-top mobile-hidden">
                            <ul>
                                <li><i class="fa fa-rss-square" aria-hidden="true"></i>No of gears
                                <div class="twelve-name">
                                       {{ $product->gear_no ?? '' }}
                                    </div>
                                </li>
                                <li><i class="fa fa-podcast" aria-hidden="true"></i> Displacement(CC) 
                                    <div class="twelve-name">
                                            {{ $product->displacement->name ?? '' }}
                                        </div>
                                    </li>
                                <li><i class="fa fa-road" aria-hidden="true"></i> Bore
									<div class="twelve-name">
                                        {{ $product->bore ?? '' }}
                                    </div>
                                </li>
                                <li><i class="fa fa-taxi" aria-hidden="true"></i> Stroke</li>
								<div class="twelve-name">
                                        {{ $product->stroke ?? '' }}
                                    </div>

                            </ul>
                        </div>

                    </div>
                    <div id="tabs">
                        <ul class="tabs">
                            <li data-tabs="tab1" class="active"> <span aria-hidden="true" class="icon-diamond"></span> Specification
                            </li>
                            <li data-tabs="tab2"><span aria-hidden="true" class="icon-list"></span>Description
                            </li>
                            <li data-tabs="tab3"> <span aria-hidden="true" class="icon-equalizer"></span> Features
                            </li>
                            <!-- <li data-tabs="tab4"> <span aria-hidden="true" class="icon-equalizer"></span> Finance
                            </li> -->
                        </ul>
                        <div id="tab1" class="tabcontent">
                            <ul class="smsaccordion">
                                <li>
                                    <a class="smstoggle">Engine and transmission<i class="fa fa-chevron-down"></i></a>
                                    <ul class="smsinner" style="display: block;">
                                        <li class="">
                                            <div class="list-label"> Engine type </div>
                                            <div class="list-stat">{{ $product->engine_type->name ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Max power </div>
                                            <div class="list-stat">{{ $product->maximum_power ?? '' }} cc</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label"> Max torque </div>
                                            <div class="list-stat">{{ $product->maximum_torque ?? '' }} L</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Displacement</div>
                                            <div class="list-stat">{{ $product->displacement->name ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Bore</div>
                                            <div class="list-stat">{{ $product->bore ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Stroke</div>
                                            <div class="list-stat">{{ $product->stroke ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Top speed </div>
                                            <div class="list-stat">{{ $product->maximum_speed ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">No of cylinders </div>
                                            <div class="list-stat">{{ $product->cylinder_no ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">No of gears </div>
                                            <div class="list-stat">{{ $product->gear_no ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Comparison ratio </div>
                                            <div class="list-stat">{{ $product->comparison_ratio ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Clutch </div>
                                            <div class="list-stat">{{ $product->clutch_type ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Starting system</div>
                                            <div class="list-stat">{{ $product->starting_system->name ?? '' }}0</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Cooling </div>
                                            <div class="list-stat">{{ $product->cooling_system->name ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Ignition </div>
                                            <div class="list-stat">{{ $product->ignition->name ?? '' }}</div>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a class="smstoggle"> Fuel consumption <i class="fa fa-chevron-down"></i></a>
                                    <ul class="smsinner">
                                        <li class="">
                                            <div class="list-label">Fuel Supply System</div>
                                            <div class="list-stat">{{ $product->fuel_supply_system ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Fuel tank capacity </div>
                                            <div class="list-stat">{{ $product->fuel_tank_capacity ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Millage </div>
                                            <div class="list-stat">{{ $product->milage ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Overall riding range</div>
                                            <div class="list-stat">{{ $product->riding_range ?? '' }}</div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="smstoggle"> Dimension and weight <i class="fa fa-chevron-down"></i></a>
                                    <ul class="smsinner">
                                        <li class="">
                                            <div class="list-label">Overall length</div>
                                            <div class="list-stat">{{ $product->length ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Overall height</div>
                                            <div class="list-stat">{{ $product->height ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Overall width</div>
                                            <div class="list-stat">{{ $product->width ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Wheel base </div>
                                            <div class="list-stat">{{ $product->wheel_base ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Seat height </div>
                                            <div class="list-stat">{{ $product->seat_height ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Ground clearance</div>
                                            <div class="list-stat">{{ $product->ground_clearance->name ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Kerb weight</div>
                                            <div class="list-stat">{{ $product->kerb_weight ?? '' }}</div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="smstoggle"> Chassis and suspension <i class="fa fa-chevron-down"></i></a>
                                    <ul class="smsinner">
                                        <li class="">
                                            <div class="list-label">Chassis type</div>
                                            <div class="list-stat">{{ $product->chassis_type ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Suspension</div>
                                            <div class="list-stat">{{ $product->suspension	 ?? '' }}</div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="smstoggle"> Brake and tyre<i class="fa fa-chevron-down"></i></a>
                                    <ul class="smsinner">
                                        <li class="">
                                            <div class="list-label">Brake type</div>
                                            <div class="list-stat">{{ $product->brake_system ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Tyre type</div>
                                            <div class="list-stat">{{ $product->tyre_type->name ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Anti-Lock Braking System </div>
                                            <div class="list-stat">{{ $product->abs ?? '' }}</div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="smstoggle"> Electricals<i class="fa fa-chevron-down"></i></a>
                                    <ul class="smsinner">
                                        <li class="">
                                            <div class="list-label">Battery type </div>
                                            <div class="list-stat">{{ $product->battery_type ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Battery Voltage </div>
                                            <div class="list-stat">{{ $product->battery_voltage ?? '' }}</div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div id="tab2" class="tabcontent">
                            <div class="des-icon">
                                <ul>
                                    <li><i class="fa fa-calendar" aria-hidden="true"></i>Body type </li>
                                    <li><i class="fa fa-road" aria-hidden="true"></i>Manufacturing year </li>
                                    <li><i class="fa fa-hourglass-end" aria-hidden="true"></i>Displacement</li>
									@if($product->condition_id == 3)
                                    <li><i class="fa fa-hourglass-end" aria-hidden="true"></i>Registration year</li>
                                    <li><i class="fa fa-hourglass-end" aria-hidden="true"></i>Kms driven</li>
									@endif
                                    <li><i class="fa fa-500px" aria-hidden="true"></i>Milleage</li>
                                    <li><i class="fa fa-cloud-upload" aria-hidden="true"></i>Kerb Weight </li>
                                    <li><i class="fa fa-road" aria-hidden="true"></i>No of gears</li>
                                    <li><i class="fa fa-road" aria-hidden="true"></i>Max power</li>
                                    <li><i class="fa fa-road" aria-hidden="true"></i>Max torque</li>
                                    <li><i class="fa fa-road" aria-hidden="true"></i>Seller type </li>
                                    <li><i class="fa fa-road" aria-hidden="true"></i>Location </li>
                                    <li><i class="fa fa-road" aria-hidden="true"></i>Starting Method  </li>
                                </ul>
                            </div>

                            <div class="des-content">
                                {{ $product->description ?? '' }}
                            </div>


                        </div>
                        <div id="tab3" class="tabcontent">
                            <ul class="smsaccordion">
                                <li>
                                    <a class="smstoggle">Key Features<i class="fa fa-chevron-down"></i></a>
                                    <ul class="smsinner" style="display: block;">
                                        @foreach($key_features as $key_feature)
											@php($array = explode(",", $product->motorcycle->key_feature))
											@if(in_array($key_feature->id, $array))
											<li class="">
												<div class="list-stat">{{ $key_feature->name }}</div>
											</li>
											@endif
										@endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
					</div>
                <div class="extra-feature">
                    <h6> After sell Service </h6>
                    <div class="row">
						@foreach($after_sell_services as $after_sell_service)
						<div class="col-lg-4">
							<ul class="list-style-1">
								<li><i class="fa fa-check"></i> @if(isset($product) && $product->after_sell_service && in_array($after_sell_service->id, $product->after_sell_service)) {{ $after_sell_service->name }} @endif</li>
							</ul>
						</div>
						@endforeach
					</div>
                </div>
                
                <div class="panel panel-white post panel-shadow" id="sms">
                    <div class="post-footer">
							<form action="{{ route('comments.store') }}" method="post">
								@csrf
								<input type="hidden" name="product_id" value="{{ $product->id }}" />
								<div class="input-group">
									<input class="form-control" name="data" placeholder="Add a comment" type="text">
									<button type="submit" class="input-group-addon">
										<a href="#"><i class="fa fa-edit"></i></a>
									</button>
								</div>
							</form>
                            <ul class="comments-list">
								@foreach($product->comments as $comment)
                                <li class="comment">
                                    <a class="pull-left" href="#" style="position:absolute">
                                        <img class="avatar" src="{{ url('/') }}/assets/profile/{{ $comment->user->photo ?? 'not-found.jpg'}}" alt="avatar">
                                    </a>
                                    <div class="comment-body">
                                        <div class="comment-heading">
                                            <h4 class="user">{{ $comment->user->name ?? 'Unnamed'}}</h4>
                                            <h5 class="time">{{ $comment->created_at->format('jS M Y') }}</h5>
                                        </div>
                                        <p>{{ $comment->data ?? ''}}</p>
                                        <div class="sms-reply-comment-icon" onclick="document.getElementById('comment-box-{{ $comment->id }}').classList.remove('d-none')"><i class="fa fa-reply" aria-hidden="true"></i></div>
                                    </div>
                                    <ul>
										@foreach($comment->sub_comments as $sub_comment)
                                        <li class="comment sms-reply-comment">
                                            <a class="pull-left" href="#" style="position:absolute">
                                                <img class="avatar" src="{{ url('/') }}/assets/profile/{{ $sub_comment->user->photo ?? 'not-found.jpg'}}" alt="avatar">
                                            </a>
                                            <div class="comment-body">
                                                <div class="comment-heading">
                                                    <h4 class="user">{{ $sub_comment->user->name ?? 'Unnamed'}}</h4>
                                                    <h5 class="time">{{ $sub_comment->created_at->format('jS M Y') }}</h5>
                                                </div>
                                                <p>{{ $sub_comment->data ?? ''}}</p>
                                            </div>
                                        </li>
										@endforeach
										<li class="mb-3 d-none" id="comment-box-{{ $comment->id }}">
											<form action="{{ route('sub-comments.store') }}" method="post">
												@csrf
												<input type="hidden" name="comment_id" value="{{ $comment->id }}" />
												<div class="input-group">
													<input class="form-control" name="data" placeholder="Add a Sub-Comment" type="text">
													<button type="submit" class="input-group-addon">
														<a href="#"><i class="fa fa-edit"></i></a>
													</button>
												</div>
											</form>
										</li>
                                    </ul>
                                </li>
								@endforeach
                            </ul>
                        </div>
					</div>
					<div class="sms-review-comment-area">
                        <div class="review-form">
                            <h4>Add a review</h4>
                            <form id="review-form" action="{{ route('reviews.store') }}" method="post">
								@csrf
								<input type="hidden" name="product_id" value="{{ $product->id }}" />
								<input type="hidden" name="score" id="feedback-score" value="0"/>
                                <div class="row">
                                    <div class="col-md-12 col-sx-12">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="4" placeholder="Comment" name="message"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment-form-rating"><label for="rating">Your Rating</label>
                                    <p class="stars">
                                        <span>
                                            <a class="star-1 score" href="#" onclick="feedbackScore(this);">1</a>
                                            <a class="star-2 score" href="#" onclick="feedbackScore(this);">2</a>
                                            <a class="star-3 score" href="#" onclick="feedbackScore(this);">3</a>
                                            <a class="star-4 score" href="#" onclick="feedbackScore(this);">4</a>
                                            <a class="star-5 score" href="#" onclick="feedbackScore(this);">5</a>
                                        </span>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="button red">Submit Review</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="feature-car">
                        <h6>Related Bikes</h6>
                        <div class="row">
                            <div class="col-md-12">
								<div class="owl-carousel" data-nav-arrow="true" data-nav-dots="true" data-items="3" data-md-items="3" data-sm-items="2" data-space="15">
                                    @foreach($related_products as $related_product)
									<div class="item">
										<div class="featured-car-list">
											<div class="featured-car-img">
												<a href=""><img src="{{ url('/') }}/assets/products/cars/{{ $related_product->motorcycle->image1 }}" class="img-responsive" alt="Image"></a>
												<div class="label_icon">Used</div>
												<div class="compare_item">
													<div class="checkbox">
														<input type="checkbox" class="compare-checkbox" class="compare-checkbox" id="compare3">
														<label for="compare3">Compare</label>
													</div>
												</div>
											</div>
											<div class="featured-car-content">
												<h6><a href="single-car-product/{{ $related_product->id }}">{{ $related_product->motorcycle->brand->name ?? ''}}</a></h6>
												<div class="price_info">
													<p class="featured-price">৳ {{ $related_product->msrp ?? ''}}</p>
													<div class="car-location"><span><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $related_product->supplier->region->name ?? ''}}, {{ $related_product->supplier->division->name ?? ''}}</span></div>
												</div>
												<ul>
													<li><i class="fa fa-road" aria-hidden="true"></i>{{ $related_product->motorcycle->kms_driven ?? ''}} km</li>
													<li><i class="fa fa-tachometer" aria-hidden="true"></i>{{ $related_product->motorcycle->milage ?? ''}} miles</li>
													<li><i class="fa fa-calendar" aria-hidden="true"></i>{{ $related_product->motorcycle->model->name ?? ''}}</li>
													<li><i class="fa fa-car" aria-hidden="true"></i>{{ $related_product->motorcycle->fuel_supply_system ?? ''}}</li>
													<li><i class="fa fa-user" aria-hidden="true"></i>{{ $related_product->motorcycle->brand->name ?? ''}}</li>
													<li><i class="fa fa-superpowers" aria-hidden="true"></i>{{ $related_product->motorcycle->maximum_power ?? ''}} kW</li>
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
                <div class="col-md-4">
                    <div class="car-details-sidebar">
                        <div class="details-social details-weight">
                            <h5>Share now</h5>
                            <ul>
                                <li>
                                <script>(function(d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id)) return;
                                    js = d.createElement(s); js.id = id;
                                    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
                                    fjs.parentNode.insertBefore(js, fjs);
                                    }(document, 'script', 'facebook-jssdk'));
                                </script>
                                <!-- Your share button code -->
                                <div class="fb-share-button" data-href="{{ Request::url() }}" data-layout="button"></div>
                                </li>
                                <li>
                                    <a class="twitter-share-button" href="https://twitter.com/intent/tweet?text={{ $product->description }}&url={{ Request::url() }}" data-size="large"> <i class="fa fa-twitter"></i> twitter</a>
                                </li>
                                <li>
                                    <a href="whatsapp://send?text={{ Request::url() }}" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"></i> whatsapp</a>
                                </li>
                            </ul>
                        </div>
                        <div class="details-form contact-2">
                            <form class="gray-form">
                                <h5>Financing Calculator</h5>
                                <div class="form-group">
                                    <label>Vehicle Price ($)*</label>
                                    <input type="text" class="form-control" placeholder="Price">
                                </div>
                                <div class="form-group">
                                    <label>Interest rate (%)*</label>
                                    <input type="text" class="form-control" placeholder="Rate">
                                </div>
                                <div class="form-group">
                                    <label>Period (Month)*</label>
                                    <input type="text" class="form-control" placeholder="Month">
                                </div>
                                <div class="form-group">
                                    <label>Down Payment *</label>
                                    <input type="text" class="form-control" placeholder="Payment">
                                </div>
                                <div class="form-group">
                                    <a class="button red" href="#">estimate payment</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================End car-details -->

    <!--=================================Start What a new button -->
    <div id="sms-wht-new">
        <a href="#what-a-new" data-toggle="modal" data-dismiss="modal">What a New ?</a>
    </div>


    <!--=================================End What a new button -->
	<div class="communication-box">
        <div class="fabs">
            <a href="{{ route('chats.show', $product->supplier_id) }}" id="prime" class="fab"><i class="fa fa-comments-o"></i></a>
        </div>
    </div>
@endsection
@section('script')
<script>
var app2 = new Vue({
	el: '#add-to-cart',
	data: {
		temp_quantity:1,
	},
	methods: {
		addToCart: function() {
			if(this.temp_quantity<1) {
				this.temp_quantity = 1;
				return;
			}
			var is_same = false;
			for(let i=0; i<cart.products.length; i++) {
				if(cart.products[i].id == {{ $product->id }}) {
					cart.products[i].quantity = parseInt(cart.products[i].quantity)+parseInt(this.temp_quantity);
					is_same = true;
					break;
				}
			}
			if(!is_same) {
				let product = {
					"id": {{ $product->id }},
					"photo": "{{ url('/') }}/images/bike/cart-img.webp",
					"quantity": this.temp_quantity,
					"price": {{ $product->msrp }},
					"brand": "{{ $product->brand->name }}",
					"model": "{{ $product->model->name }}"
				};
				cart.products.unshift(product);
			}
			localStorage.cart_products = JSON.stringify(cart.products);
		}
	},
	watch: {
		temp_quantity: function() {
			if(this.temp_quantity<1)
				this.temp_quantity = 1;
		}
	}
});
</script>
<!-- 360-view -->
<script type="text/javascript" src="{{ url('/') }}/js/jquery.flipper-responsive.js"></script>
<script type="text/javascript" src="{{ url('/') }}/js/easeljs-0.6.0.min.js"></script>

<script>
	jQuery(function($) {
		$('#myFlipper').flipper('init');
	});
	/*************************
																																														   360 view
																																													*************************/
	var stage;

	function init() {
		var canvas = document.getElementById("canvas");
		if (!canvas || !canvas.getContext) return;

		stage = new createjs.Stage(canvas);
		stage.enableMouseOver(true);
		stage.mouseMoveOutside = true;
		createjs.Touch.enable(stage);

		var imgList = [
			@for($i=1; $i<=36; $i++)
				@php($image='image'.$i)
				@if($product->$image)
					"{{ url('/') }}/images/360-view/{{ $product->$image ?? 'not-found.jpg' }}",
				@endif
			@endfor
		];
		var images = [],
			loaded = 0,
			currentFrame = 0,
			totalFrames = imgList.length;
		var rotate360Interval, start_x;

		var bg = new createjs.Shape();
		stage.addChild(bg);

		var bmp = new createjs.Bitmap();
		stage.addChild(bmp);



		function load360Image() {
			var img = new Image();
			img.src = imgList[loaded];
			img.onload = img360Loaded;
			images[loaded] = img;
		}

		function img360Loaded(event) {
			loaded++;
			bg.graphics.clear()
			bg.graphics.beginFill("#fff").drawRect(0, 0, stage.canvas.width * loaded / totalFrames, stage.canvas
				.height);
			bg.graphics.endFill();

			if (loaded == totalFrames) start360();
			else load360Image();
		}


		function start360() {
			document.body.style.cursor = 'none';



			// update-draw
			update360(0);

			// first rotation
			rotate360Interval = setInterval(function () {
				if (currentFrame === totalFrames - 1) {
					clearInterval(rotate360Interval);
					addNavigation();
				}
				update360(1);
			}, 25);
		}

		function iconLoaded(event) {
			var iconBmp = new createjs.Bitmap();
			iconBmp.image = event.target;
			iconBmp.x = 20;
			iconBmp.y = canvas.height - iconBmp.image.height - 20;
			stage.addChild(iconBmp);
		}

		function update360(dir) {
			currentFrame += dir;
			if (currentFrame < 0) currentFrame = totalFrames - 1;
			else if (currentFrame > totalFrames - 1) currentFrame = 0;
			bmp.image = images[currentFrame];
		}


		//------------------------------- 
		function addNavigation() {
			stage.onMouseOver = mouseOver;
			stage.onMouseDown = mousePressed;
			document.body.style.cursor = 'auto';
		}

		function mouseOver(event) {
			document.body.style.cursor = 'pointer';
		}

		function mousePressed(event) {
			start_x = event.rawX;
			stage.onMouseMove = mouseMoved;
			stage.onMouseUp = mouseUp;

			document.body.style.cursor = 'w-resize';
		}

		function mouseMoved(event) {
			var dx = event.rawX - start_x;
			var abs_dx = Math.abs(dx);

			if (abs_dx > 5) {
				update360(dx / abs_dx);
				start_x = event.rawX;
			}
		}

		function mouseUp(event) {
			stage.onMouseMove = null;
			stage.onMouseUp = null;
			document.body.style.cursor = 'pointer';
		}

		function handleTick() {
			stage.update();
		}

		document.body.style.cursor = 'progress';
		load360Image();


		// TICKER
		createjs.Ticker.addEventListener("tick", handleTick);
		createjs.Ticker.setFPS(60);
		createjs.Ticker.useRAF = true;
	}

	// Init
	window.addEventListener('load', init, false);
	function feedbackScore(e) {
		event.preventDefault();
		 var scores = document.getElementsByClassName('score');
		 for(let i=0; i<scores.length; i++) {
			 scores[i].classList.remove("active");
		 }
		 e.classList.add('active');
		 document.getElementById('feedback-score').value=e.innerHTML;
	}
</script>
@endsection
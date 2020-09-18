@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif
@include('layouts.frontend.motorcycle-background')
<!--=================================car-details  -->
<section class="car-details page-section-ptb" id="product">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h3>{{ $product->name }}</h3>
                <div>{!! $product->note !!}</div>
                <div class="star mt-2">
                    <i class="fa fa-star @if($product->reviews->avg('score')<1) fa-star-o @endif orange-color"></i>
                    <i class="fa fa-star @if($product->reviews->avg('score')<2) fa-star-o @endif orange-color"></i>
                    <i class="fa fa-star @if($product->reviews->avg('score')<3) fa-star-o @endif orange-color"></i>
                    <i class="fa fa-star @if($product->reviews->avg('score')<4) fa-star-o @endif orange-color"></i>
                    <i class="fa fa-star @if($product->reviews->avg('score')<5) fa-star-o @endif orange-color"></i>
                </div>
            </div>
            <div class="col-md-3">
                <div class="singleprice-tag">Tk.{{ $product->msrp }}<span>(Fixed)</span></div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-8">
                <div class="slider-slick">
                    <div class="slider slider-for detail-big-car-gallery">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image1 }}"
                        alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image2 }}"
                        alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image3 }}"
                        alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image4 }}"
                        alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image5 }}"
                        alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image6 }}"
                        alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image7 }}"
                        alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image8 }}"
                        alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image9 }}"
                        alt="">
                        <img class="img-fluid"
                        src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image10 }}">
                    </div>
                    <div class="slider slider-nav">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image1 }}"
                        alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image2 }}"
                        alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image3 }}"
                        alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image4 }}"
                        alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image5 }}"
                        alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image6 }}"
                        alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image7 }}"
                        alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image8 }}"
                        alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image9 }}"
                        alt="">
                        <img class="img-fluid"
                        src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image10 }}">
                    </div>

                    <div class="sms-360-view">
                        <a href="" data-toggle="modal" data-target=".bd-example-modal-lg-360">
                            <img src="{{ url('/') }}/images/360-view.png" alt="">
                        </a>
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
                        <a href="#" @click.prevent="floatImage($event)">add to cart</a>
                    </div>
                    <div class="wishlist">
                        <a href="#"><i class="fa fa-heart-o"></i></a>
                    </div>
                    <div class="add_compare">
                        <div class="checkbox">
                            <input type="checkbox" class="compare-checkbox" product-id="{{ $product->id }}">
                            <label for="">Compare</label>
                        </div>
                    </div>
                </div>
                <div class="details-block details-weight">
                    <h5>General Specification</h5>
                    <ul>
                        <li> <span>Bike type </span> <strong class="text-right">{{ $product->condition->name ?? '' }}</strong></li>
                        <li> <span>Brand </span> <strong class="text-right">{{ $product->motorcycle->brand->name ?? '' }}</strong></li>
                        <li> <span>Model</span> <strong class="text-right">{{ $product->motorcycle->model->name ?? '' }}</strong></li>
                        <li> <span>Displacement</span> <strong class="text-right">{{ $product->motorcycle->displacement->name ?? '' }}</strong></li>
                        @if($product->condition_id == 3)
                        <li> <span>Registration year: </span> <strong class="text-right">{{ $product->registration_year ?? '' }}</strong></li>
                        <li> <span>Kms driven: </span> <strong class="text-right">{{ $product->kms_driven ?? '' }}</strong></li>
                        @endif
                        <li> <span>Engine type </span> <strong class="text-right">{{ $product->motorcycle->engine_type->name ?? '' }}</strong></li>
                        <li> <span>Max power </span> <strong class="text-right">{{ $product->motorcycle->maximum_power ?? '' }}</strong></li>
                        <li> <span>Max torque</span> <strong class="text-right">{{ $product->motorcycle->maximum_torque ?? '' }}</strong></li>
                        <li> <span>Max speed </span> <strong class="text-right">{{ $product->motorcycle->maximum_speed ?? '' }}</strong></li>
                        <li> <span>Mileage kmpl </span> <strong class="text-right">{{ $product->motorcycle->milage ?? '' }}</strong></li>
                        <li> <span>Made origin  </span> <strong class="text-right">{{ $product->motorcycle->made_origin->name ?? '' }}</strong></li>
                        <li> <span>Bike assemble</span> <strong class="text-right">{{ $product->motorcycle->made_in->name ?? '' }}</strong></li>
                        <li> <span>Seller </span> <strong class="text-right">{{ $product->supplier->name ?? '' }}</strong></li>
                        <li> <span>Price</span> <strong class="text-right">Tk.{{ $product->msrp ?? '' }}</strong></li>
                        <li> <span>Remarks (any Prob)</span> <strong class="text-justify">{!! $product->note ?? '' !!}</strong></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="sms-groupbuying-area">
                    @if(isset($auction) && $auction)
                    <div class="card my-3">
                        <div class="card-header alert alert-danger">
                            <div class="text-center display-6 font-weight-bold" id="countdown"></div>
                        </div>
                        <div class="card-body">
                            <div>Current Bid: <strong>Tk.{{ $product->auction_amount ?? 0}}</strong> <a href="{{ route('bids.show', $product->id) }}">[ {{ $product->bids->count() }} bids ]</a></div>
                            <form action="{{ route('auctions.store') }}" method="post" class="d-block clearfix">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                <div class="d-flex my-3">
                                    <div class="">
                                        <label for="bid" class="line-height-30 pr-3">Your bid:</label>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="input-group">
                                            <div class="input-group-prepend height-30 bg-white">
                                                <span class="input-group-text bg-white border-right-0">TK.</span>
                                            </div>
                                            <input type="number" class="form-control height-30" id="bid" placeholder="BDT" name="amount">
                                        </div>
                                        <div class="text-secondary"><small>Enter more than Tk.{{ $product->auction_amount ?? 0}}</small></div>
                                    </div>
                                </div>
                                @if(session()->has('amount'))
                                <div class="alert alert-warning">
                                    {{ session()->get('amount') }}
                                </div>
                                @endif
                                <button type="submit" class="button red float-right">Place Bid</button>
                            </form>
                        </div>
                        <div class="card-footer alert-light">
                            <a href="#" class="btn btn-link" data-toggle="collapse" data-target="#upto-modal">Add Automatic Bid</a>
                            <div class="collapse" id="upto-modal">
                                <h4 class="text-dark">Your maximum bidding amount</h4>
                                <p>Your maximum bidding amount will not be published until another bidder reaches your amount. We will add an automatic bid upto your maximum amount whenever someone bids.</p>
                                <form action="{{ route('bids.store') }}" method="post" class="d-block clearfix">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white">Tk.</span>
                                        </div>
                                        <input name="amount" type="text" class="form-control" placeholder="Maximum amount">
                                    </div>
                                    <button type="submit" class="button red float-right">Place Bid</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if(isset($group_buying) && $group_buying)
                    <div class="qunatity_price_box">
                        <div class="quantity_box">
                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <td class="column1">
                                            <h3>Quantity</h3>
                                        </td>
                                        <td>
                                            <ul class="quantity_listing items3" id="quantity_listing">
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
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="details-block details-weight">
                                <ul>
                                    <li>
                                        <span><i class="fa fa-industry text-red" aria-hidden="true"></i> Displacement: </span>
                                        <strong class="text-right">{{ $product->motorcycle->displacement->name ?? '' }}cc</strong>
                                    </li>
                                    <li>
                                        <span><i class="fa fa-cab text-red" aria-hidden="true"></i> Suspension: </span>
                                        <strong class="text-right">{{ $product->motorcycle->suspension ?? '' }}</strong>
                                    </li>
                                    <li>
                                        <span><i class="fa fa-fire text-red" aria-hidden="true"></i> Top speed: </span>
                                        <strong class="text-right">{{ $product->motorcycle->maximum_speed ?? '' }}</strong>
                                    </li>
                                    <li>
                                        <span><i class="fa fa-balance-scale text-red" aria-hidden="true"></i> FueL tank: </span>
                                        <strong class="text-right">{{ $product->motorcycle->fuel_tank_capacity ?? '' }}</strong>
                                    </li>
                                    <li>
                                        <span><i class="fa fa-power-off text-red" aria-hidden="true"></i> Brake system: </span>
                                        <strong class="text-right">{{ $product->motorcycle->brake_system ?? '' }}</strong>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="details-block details-weight">
                                <ul>
                                    <li>
                                        <span><i class="fa fa-ticket text-red" aria-hidden="true"></i> Kerb Weight: </span>
                                        <strong class="text-right">{{ $product->motorcycle->kerb_weight ?? '' }}</strong>
                                    </li>
                                    <li>
                                        <span><i class="fa fa-car text-red" aria-hidden="true"></i> No of gears: </span>
                                        <strong class="text-right">{{ $product->motorcycle->gear_no ?? '' }}</strong>
                                    </li>
                                    <li>
                                        <span><i class="fa fa-gear text-red" aria-hidden="true"></i> Bore: </span>
                                        <strong class="text-right">{{ $product->motorcycle->bore ?? '' }}</strong>
                                    </li>
                                    <li>
                                        <span><i class="fa fa-money text-red" aria-hidden="true"></i> Stroke: </span>
                                        <strong class="text-right">{{ $product->motorcycle->stroke ?? '' }}</strong>
                                    </li>
                                    <li>
                                        <span><i class="fa fa-info-circle text-red" aria-hidden="true"></i> After sell service: </span>
                                        <strong class="text-right">@if($product->after_sell_service) Yes @else No @endif</strong>
                                    </li>
                                </ul>
                            </div>
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
                                            <div class="list-stat">{{ $product->motorcycle->engine_type->name ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Max power </div>
                                            <div class="list-stat">{{ $product->motorcycle->maximum_power ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label"> Max torque </div>
                                            <div class="list-stat">{{ $product->motorcycle->maximum_torque ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Displacement</div>
                                            <div class="list-stat">{{ $product->motorcycle->displacement->name ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Bore</div>
                                            <div class="list-stat">{{ $product->motorcycle->bore ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Stroke</div>
                                            <div class="list-stat">{{ $product->motorcycle->stroke ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Top speed </div>
                                            <div class="list-stat">{{ $product->motorcycle->maximum_speed ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">No of cylinders </div>
                                            <div class="list-stat">{{ $product->motorcycle->cylinder_no ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">No of gears </div>
                                            <div class="list-stat">{{ $product->motorcycle->gear_no ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Comparison ratio </div>
                                            <div class="list-stat">{{ $product->motorcycle->comparison_ratio ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Clutch </div>
                                            <div class="list-stat">{{ $product->motorcycle->clutch_type ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Starting system</div>
                                            <div class="list-stat">{{ $product->motorcycle->starting_system->name ?? '' }}0</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Cooling </div>
                                            <div class="list-stat">{{ $product->motorcycle->cooling_system->name ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Ignition </div>
                                            <div class="list-stat">{{ $product->motorcycle->ignition ?? '' }}</div>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a class="smstoggle"> Fuel consumption <i class="fa fa-chevron-down"></i></a>
                                    <ul class="smsinner">
                                        <li class="">
                                            <div class="list-label">Fuel Supply System</div>
                                            <div class="list-stat">{{ $product->motorcycle->fuel_supply_system ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Fuel tank capacity </div>
                                            <div class="list-stat">{{ $product->motorcycle->fuel_tank_capacity ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Millage </div>
                                            <div class="list-stat">{{ $product->motorcycle->milage ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Overall riding range</div>
                                            <div class="list-stat">{{ $product->motorcycle->riding_range ?? '' }}</div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="smstoggle"> Dimension and weight <i class="fa fa-chevron-down"></i></a>
                                    <ul class="smsinner">
                                        <li class="">
                                            <div class="list-label">Overall length</div>
                                            <div class="list-stat">{{ $product->motorcycle->length ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Overall height</div>
                                            <div class="list-stat">{{ $product->motorcycle->height ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Overall width</div>
                                            <div class="list-stat">{{ $product->motorcycle->width ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Wheel base </div>
                                            <div class="list-stat">{{ $product->motorcycle->wheel_base ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Seat height </div>
                                            <div class="list-stat">{{ $product->motorcycle->seat_height ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Ground clearance</div>
                                            <div class="list-stat">{{ $product->motorcycle->ground_clearance->name ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Kerb weight</div>
                                            <div class="list-stat">{{ $product->motorcycle->kerb_weight ?? '' }}</div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="smstoggle"> Chassis and suspension <i class="fa fa-chevron-down"></i></a>
                                    <ul class="smsinner">
                                        <li class="">
                                            <div class="list-label">Chassis type</div>
                                            <div class="list-stat">{{ $product->motorcycle->chassis_type ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Suspension</div>
                                            <div class="list-stat">{{ $product->motorcycle->suspension   ?? '' }}</div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="smstoggle"> Brake and tyre<i class="fa fa-chevron-down"></i></a>
                                    <ul class="smsinner">
                                        <li class="">
                                            <div class="list-label">Brake type</div>
                                            <div class="list-stat">{{ $product->motorcycle->brake_system ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Tyre type</div>
                                            <div class="list-stat">{{ $product->motorcycle->tyre_type->name ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Anti-Lock Braking System </div>
                                            <div class="list-stat">{{ $product->motorcycle->abs ?? '' }}</div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="smstoggle"> Electricals<i class="fa fa-chevron-down"></i></a>
                                    <ul class="smsinner">
                                        <li class="">
                                            <div class="list-label">Battery type </div>
                                            <div class="list-stat">{{ $product->motorcycle->battery_type ?? '' }}</div>
                                        </li>
                                        <li class="">
                                            <div class="list-label">Battery Voltage </div>
                                            <div class="list-stat">{{ $product->motorcycle->battery_voltage ?? '' }}</div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div id="tab2" class="tabcontent">
                            <div>
                                <ul>
                                    <li class="">
                                        <div class="list-label">Body type </div>
                                        <div class="list-stat">{{ $product->motorcycle->body_type ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Manufacturing year </div>
                                        <div class="list-stat">{{ $product->motorcycle->manufacturing_year ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Displacement </div>
                                        <div class="list-stat">{{ $product->motorcycle->displacement->name ?? '' }} cc</div>
                                    </li>
                                    @if($product->condition_id == 3)
                                    <li class="">
                                        <div class="list-label">Registration year </div>
                                        <div class="list-stat">{{ $product->motorcycle->registration_year ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Kms driven </div>
                                        <div class="list-stat">{{ $product->motorcycle->kms_driven ?? '' }}</div>
                                    </li>
                                    @endif
                                    <li class="">
                                        <div class="list-label">Milleage </div>
                                        <div class="list-stat">{{ $product->motorcycle->milage ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Kerb Weight </div>
                                        <div class="list-stat">{{ $product->motorcycle->kerb_weight ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">No of gears </div>
                                        <div class="list-stat">{{ $product->motorcycle->gear_no ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Max power </div>
                                        <div class="list-stat">{{ $product->motorcycle->maximum_power ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Max torque </div>
                                        <div class="list-stat">{{ $product->motorcycle->maximum_torque ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Seller type </div>
                                        <div class="list-stat">{{ $product->supplier->user_type->name ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Location </div>
                                        <div class="list-stat">{{ $product->supplier->division->name ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Starting Method </div>
                                        <div class="list-stat">{{ $product->motorcycle->starting_system->name ?? '' }}</div>
                                    </li>
                                </ul>
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

                    <div class="card card-white post" id="sms">
                        <div class="card-body">
                            <form action="{{ route('comments.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                <div class="input-group">
                                    <input class="form-control" name="data" placeholder="Add a comment" type="text">
                                    <button type="submit" class="input-group-addon border-0">
                                        <a href="#" class="btn btn-danger"><i class="fa fa-check-square"></i></a>
                                    </button>
                                </div>
                            </form>
                            @if($product->comments->count()>1)
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
                                                    <button type="submit" class="input-group-addon border-0">
                                                        <a href="#" class="btn btn-danger"><i class="fa fa-check-square"></i></a>
                                                    </button>
                                                </div>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                            @endif
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
                </div>
                <div class="col-md-12">
                    <div class="feature-car">
                        <h6>Related Bikes</h6>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="owl-carousel" data-nav-arrow="true" data-nav-dots="true" data-items="3" data-md-items="3" data-sm-items="2" data-space="15">
                                    @foreach($related_products as $related_product)
                                    <div class="item">
                                        <div class="featured-car-list">
                                            <div class="featured-car-img">
                                                <a href=""><img src="{{ url('/') }}/assets/products/{{ $related_product->motorcycle->id }}/{{ $related_product->motorcycle->image1 }}" class="img-responsive" alt="Image"></a>
                                                <div class="label_icon">{{ $related_product->condition->name }}</div>
                                                <div class="compare_item">
                                                    <div class="checkbox">
                                                        <input type="checkbox" class="compare-checkbox" product-id="{{ $related_product->id }}">
                                                        <label for="compare3">Compare</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="featured-car-content">
                                                <div class="price_info">
                                                    <p class="featured-price">Tk.{{ $related_product->msrp ?? ''}}</p>
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
            </div>
        </div>
    </section>
    <div class="modal fade bd-example-modal-lg-360" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body row">
                    <div class="clearfix col-12">
                        <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="col-12 size-32"><div id="object" class="size-child"></div></div>
                </div>
            </div>
        </div>
    </div>
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
    @section('style')
    <style>
        html, body {
            position:relative;
        }
        .float-it {
            -webkit-transition: all 1000ms ease-out;
            -moz-transition: all 1000ms ease-out;
            -o-transition: all 1000ms ease-out;
            transition: all 1000ms ease-out;
            z-index: 999999;
            display: block;
        }
    </style>
    @endsection
    @section('script')
    <script>
        var app2 = new Vue({
            el: '#product',
            data: {
                temp_quantity:1
            },
            methods: {
                floatImage: function (e) {
                    var img = e.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.querySelector('img.slick-active');
                    console.log(img);
                    var cloned = img.cloneNode();
                    var coords = this.getCoords(img);
                    var cart_coords = this.getCoords(document.getElementById('cart'));
                    var middle_percent = 100; /* Just enter the middle point size *1/4;*/

                    cloned.style.top = coords.top + "px";
                    cloned.style.left = coords.left + "px";
                    cloned.style.width = img.width + "px";
                    cloned.style.height = img.height + "px";
                    cloned.style.position = "absolute";
                    cloned.classList.add('float-it');
                    document.body.append(cloned);
                    setTimeout(function(){
                        cloned.style.top = cart_coords.top + "px"; /*This is the middle point */
                        cloned.style.left = cart_coords.left - 100 + "px";
                        cloned.style.width = img.offsetWidth * middle_percent / 400 + "px";
                        cloned.style.height = img.offsetHeight * middle_percent / 400 + "px";
                        cloned.style.position = "absolute";
                    }, 100);
                    setTimeout(function(){
                        cloned.style.top = cart_coords.top + 10 + "px";
                        cloned.style.left = cart_coords.left + 10 + "px";
                        cloned.style.width = "0px";
                        cloned.style.height = "0px";
                        cloned.style.opacity = 0;
                    }, 10 * middle_percent);
                    var _this = this;
                    setTimeout(function(){
                        _this.addToCart();
                    }, 1500);
                },
                addToCart: function() {
                    if (this.temp_quantity < 1) {
                        this.temp_quantity = 1;
                        return;
                    }
                    var is_same = false;
                    for (let i = 0; i < cart.products.length; i++) {
                        if (cart.products[i].id == {{ $product->id }}) {
                            cart.products[i].quantity = parseInt(cart.products[i].quantity) + parseInt(this.temp_quantity);
                            is_same = true;
                            break;
                        }
                    }
                    if (!is_same) {
                        let product = {
                            "id": {{ $product->id }},
                            "quantity": this.temp_quantity,
                            "msrp": {{ $product->msrp }},
                            "name": "{{ $product->name }}",
                            "image1": "{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image1 ?? 'not-found.jpg'}}",
                            "note": @json($product->note)
                        };
                        cart.products.unshift(product);
                    }
                    localStorage.cart = JSON.stringify(cart.products);
                },
                getCoords: function(elem) { // crossbrowser version
                    var box = elem.getBoundingClientRect();
                    var body = document.body;
                    var docEl = document.documentElement;
                    var scrollTop = window.pageYOffset || docEl.scrollTop || body.scrollTop;
                    var scrollLeft = window.pageXOffset || docEl.scrollLeft || body.scrollLeft;
                    var clientTop = docEl.clientTop || body.clientTop || 0;
                    var clientLeft = docEl.clientLeft || body.clientLeft || 0;
                    var top = box.top + scrollTop - clientTop;
                    var left = box.left + scrollLeft - clientLeft;
                    return { top: Math.round(top), left: Math.round(left) };
                },
                limitQuantity: function() {
                    if (this.temp_quantity < 12)
                        this.temp_quantity = 12;
                },
                countdown: function() {
                    var countDownDate = new Date("{{ $product->auction_to }}").getTime();
                    var x = setInterval(function() {
                    var now = new Date().getTime();
                    var distance = countDownDate - now;

                    // Time calculations for days, hours, minutes and seconds
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    var s = '';
                    if(days)
                      s = days+'d '+hours+'h';
                    else if(hours)
                      s = hours+'h '+minutes+'m';
                    else
                      s = minutes+'m '+seconds+'s';
                    document.getElementById("countdown").innerHTML = 'Bidding Time Left: '+s;

                    if (distance < 0) {
                      clearInterval(x);
                      document.getElementById("countdown").innerHTML = "EXPIRED";
                    }
                  }, 1000);
                }
            },
            mounted: function () {
                this.countdown();
            }
        });
    </script>

    <!-- 360-view -->
    <script type="text/javascript" src="{{ url('/') }}/js/jquery.flipper-responsive.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/easeljs-0.6.0.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/3deye.js?{{ time() }}"></script>

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
        @for ($i = 1; $i <= 36; $i++)
        @php($image = 'image'.$i)
        @if ($product->$image)
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
        for (let i = 0; i < scores.length; i++) {
            scores[i].classList.remove("active");
        }
        e.classList.add('active');
        document.getElementById('feedback-score').value = e.innerHTML;
    }
</script>
<script>
    $(document).ready(function(){
        $("#object").vc3dEye({
            imagePath:"{{ url('/') }}/assets/products/motorcycles/{{ $product->motorcycle->id }}/",
            totalImages:{{ iterator_count(new FilesystemIterator(public_path()."/assets/products/motorcycles/".$product->motorcycle->id)) - 2 }},
            imageExtension:"jpg",
            autoRotate:500,
            autoRotateInactivityDelay:5000
        });
    });
</script>

@endsection

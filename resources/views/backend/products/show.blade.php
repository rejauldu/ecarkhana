@extends('layouts.index')

@section('content')
@if(!isset($type))
@php($type = 'Car')
@endif
@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif


@include('layouts.frontend.car-background')


<!--=================================car-details  -->

<section class="car-details page-section-ptb" id="product">

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h3>{{ $product->name }}</h3>
                <div>{!! $product->note !!}</div>
                <div class="sms-single-rating mt-2">
                    <div class="star">
                        <i class="fa fa-star @if($product->reviews->avg('score')<1) fa-star-o @endif orange-color"></i>
                        <i class="fa fa-star @if($product->reviews->avg('score')<2) fa-star-o @endif orange-color"></i>
                        <i class="fa fa-star @if($product->reviews->avg('score')<3) fa-star-o @endif orange-color"></i>
                        <i class="fa fa-star @if($product->reviews->avg('score')<4) fa-star-o @endif orange-color"></i>
                        <i class="fa fa-star @if($product->reviews->avg('score')<5) fa-star-o @endif orange-color"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="singleprice-tag">৳ {{ $product->msrp }}<span>(Fixed)</span></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="details-nav">
                    <ul>
                        <li>
                            <a href="{{ route('car-loan') }}"> <i class="fa fa-money" aria-hidden="true"></i> Apply for loan </a>
                        </li>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-question-circle"></i>Request More Info
                            </a>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel">Request More Info</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="sub-title">Please fill out the information below and one of
                                                our representatives will contact you regarding your more information
                                                request. </p>
                                            <form class="gray-form reset_css ajax-upload" id="rmi_form"
                                                  action="{{ route('requested-more-infos.store') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}"/>

                                                <div class="form-group">
                                                    <label>Name*</label>
                                                    <input type="text" class="form-control" name="name"
                                                           id="validationCustom122" required="" id="rmi_name"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email address*</label>
                                                    <input type="text" class="form-control" name="email"
                                                           id="validationCustom132" required="" id="rmi_email"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Phone*</label>
                                                    <input type="text" class="form-control" id="phone"
                                                           id="validationCustom142" required="" name="rmi_phone">
                                                </div>
                                                <div class="form-group">
                                                    <label>Message</label>
                                                    <textarea class="form-control" name="message"
                                                              id="validationCustom152" required=""
                                                              id="rmi_message"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <button class="button red">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a data-toggle="modal" data-target="#exampleModal2" data-whatever="@mdo" href="#"
                               class="css_btn">
                                <i class="fa fa-dashboard"></i>Schedule Test Drive</a>
                            <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel">Schedule Test Drive</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div id="std_message"></div>
                                        <div class="modal-body">
                                            <p class="sub-title">Complete this form to request a test drive of your
                                                favorite car. Our Sales Advisor will contact you promptly to confirm
                                                your appointment. </p>
                                            <form class="gray-form reset_css" id="std_form" action="post">
                                                <input type="hidden" name="action" value="schedule_test_drive"/>
                                                <div class="form-group">
                                                    <label>Name*</label>
                                                    <input type="text" class="form-control" id="std_ firstname" name="name"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email address*</label>
                                                    <input type="text" class="form-control" id="std_email" name="email">
                                                </div>
                                                <div class="form-group">
                                                    <label>Phone*</label>
                                                    <input type="text" class="form-control" id="std_phone" name="phone">
                                                </div>
                                                <div class="form-group">
                                                    <label>Preferred Day*</label>
                                                    <input type="text" class="form-control" id="std_day" name="day">
                                                </div>
                                                <div class="form-group">
                                                    <label>Preferred Time*</label>
                                                    <input type="text" class="form-control" id="std_time" name="time">
                                                </div>
                                                <div class="form-group">
                                                    <a class="button red" id="schedule_test_drive_submit" data-dismiss="modal">Schedule Now</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a data-toggle="modal" data-target="#exampleModal3" data-whatever="@mdo" href="#"
                               class="css_btn"><i class="fa fa-tag"></i>Make an Offer</a>
                            <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel">Make an Offer</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div id="mao_message"></div>
                                        <div class="modal-body">
                                            <form class="gray-form reset_css ajax-upload" id="mao_form"
                                                  action="{{ route('make-an-offers.store') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}"/>
                                                <div class="form-group">
                                                    <label>Name*</label>
                                                    <input type="text" id="mao_name" name="name"
                                                           id="validationCustom192" required=""
                                                           class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Email address*</label>
                                                    <input type="text" id="mao_email" name="email"
                                                           id="validationCustom193" required=""
                                                           class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Phone*</label>
                                                    <input type="text" id="mao_phone" name="phone"
                                                           id="validationCustom194" required=""
                                                           class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Offered Price*</label>
                                                    <input type="text" id="mao_price" name="price"
                                                           id="validationCustom195" required=""
                                                           class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Financing Required*</label>
                                                    <div class="selected-box">
                                                        <select class="selectpicker" id="financing_required"
                                                                id="validationCustom196" required=""
                                                                name="mao_financing">
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>additional Comments/Conditions</label>
                                                    <textarea class="form-control input-message" rows="4" id="mao_comments" name="message"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <button class="button red">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a data-toggle="modal" data-target="#exampleModal4" data-whatever="@mdo" href="#"
                               class="css_btn"><i class="fa fa-envelope"></i>Email to a Friend</a>
                            <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel">Email to a Friend</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div id="etf_message"></div>
                                        <div class="modal-body">
                                            <form class="gray-form reset_css" action="post" action="action="{{ route('make-an-offers.store') }}"" id="etf_form">
                                                <div class="form-group">
                                                    <label>Name*</label>
                                                    <input name="name" type="text" id="etf_name"
                                                           id="validationCustom182" required=""
                                                           class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Email address*</label>
                                                    <input type="text" class="form-control" id="etf_email"
                                                           id="validationCustom183" required="" name="email">
                                                </div>
                                                <div class="form-group">
                                                    <label>Friends Email*</label>
                                                    <input type="Email" class="form-control" id="etf_fmail"
                                                           id="validationCustom184" required="" name="fmail">
                                                </div>
                                                <div class="form-group">
                                                    <label>Message to friend</label>
                                                    <textarea class="form-control input-message" id="etf_fmessage"
                                                              name="message" rows="4"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <div id="recaptcha4"></div>
                                                </div>
                                                <div class="form-group">
                                                    <button class="button red"> Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li><a href="javascript:window.print()"><i class="fa fa-print"></i>Print this page</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="slider-slick">
                    <div class="slider slider-for detail-big-car-gallery">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image1 ?? 'not-found.jpg' }}"
                             alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image2 ?? 'not-found.jpg' }}"
                             alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image3 ?? 'not-found.jpg' }}"
                             alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image4 ?? 'not-found.jpg' }}"
                             alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image5 ?? 'not-found.jpg' }}"
                             alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image6 ?? 'not-found.jpg' }}"
                             alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image7 ?? 'not-found.jpg' }}"
                             alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image8 ?? 'not-found.jpg' }}"
                             alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image9 ?? 'not-found.jpg' }}"
                             alt="">
                        <img class="img-fluid"
                             src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image10 }}">
                    </div>
                    <div class="slider slider-nav">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image1 ?? 'not-found.jpg' }}"
                             alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image2 ?? 'not-found.jpg' }}"
                             alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image3 ?? 'not-found.jpg' }}"
                             alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image4 ?? 'not-found.jpg' }}"
                             alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image5 ?? 'not-found.jpg' }}"
                             alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image6 ?? 'not-found.jpg' }}"
                             alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image7 ?? 'not-found.jpg' }}"
                             alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image8 ?? 'not-found.jpg' }}"
                             alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image9 ?? 'not-found.jpg' }}"
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
                <div class="add_compare">
                    <div class="checkbox">
                        <input type="checkbox" class="compare-checkbox" product-id="{{ $product->id }}">
                        <label for="">Add to Compare</label>
                    </div>
                </div>
                <div class="details-block details-weight">
                    <h5>General Specification</h5>
                    <ul>
                        <li><span>Brand: </span> <strong class="text-right">{{ $product->car->brand->name ?? '' }}</strong></li>
                        <li><span>Model: </span> <strong class="text-right">{{ $product->car->model->name ?? '' }}</strong></li>
                        <li><span>Body type: </span> <strong class="text-right">{{ $product->car->body_type->name ?? '' }}</strong></li>
                        <li><span>Package: </span> <strong class="text-right"> {{ $product->car->package->name ?? '' }}</strong></li>
                        <li><span>Displacement: </span> <strong class="text-right">{{ $product->car->displacement->name ?? '' }} cc</strong></li>
                        <li><span>Manufacturing year: </span> <strong class="text-right">{{ $product->car->manufacturing_year }}</strong></li>
                        @if($product->condition_id == 3)
                        <li><span>Registration year: </span> <strong class="text-right">{{ $product->registration_year ?? '' }}</strong></li>
                        <li><span>Kms driven: </span> <strong class="text-right">{{ $product->kms_driven ?? '' }}</strong></li>
                        @elseif($product->condition_id == 2)
                        <li><span>Auction Grade: </span> <strong class="text-right"> {{ $product->auction_grade->name ?? '' }} </strong></li>
                        <li><span>Kms driven: </span> <strong class="text-right">{{ $product->kms_driven ?? '' }}</strong></li>
                        @endif
                        <li><span>Ground clearance: </span> <strong class="text-right">{{ $product->car->ground_clearance->name ?? '' }}</strong></li>
                        <li><span>Drive type: </span> <strong class="text-right">{{ $product->car->drive_type->name ?? '' }}</strong></li>
                        <li><span>Engine type: </span> <strong class="text-right">{{ $product->car->engine_type->name ?? '' }}</strong></li>
                        <li><span>Fuel Type: </span> <strong class="text-right">{{ $product->car->fuel_type->name ?? '' }} </strong></li>
                        <li><span>Condition: </span> <strong class="text-right"> {{ $product->condition->name ?? '' }} </strong></li>
                        <li><span>Selller type: </span> <strong class="text-right"> {{ $product->supplier->user_type->name ?? 'Individual Seller' }} </strong></li>
                        <li><span>Selling Price: </span> <strong class="text-right"> {{ $product->msrp ?? 0 }} </strong></li>
                        @if($product->condition_id == 2 || $product->condition_id == 3)
                        <li><span>Remarks (any Prob): </span> <strong class="text-right"> {!! $product->note ?? '' !!}  </strong></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                @if(isset($auction) && $auction)
                <div class="sms-auction-area">
                    <div class="sms-coundown-area">
                        <div class="flipper" data-reverse="true" data-datetime="{{ $product->auction_to }}"
                             data-template="dd|HH|ii|ss" data-labels="Days|Hours|Minutes|Seconds"
                             id="myFlipper">
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
                                <input type="hidden" name="product_id" value="{{ $product->id }}"/>
                                <label class="u-dspn">Your max bid:</label>
                                <input placeholder="" class="MaxBidClass" type="text" name="amount">
                                @if(session()->has('amount'))
                                <div class="alert alert-danger">
                                    {{ session()->get('amount') }}
                                </div>
                                @endif
                                <div class="notranslate">Enter more than
                                    ৳{{ $product->auction_amount ?? 0}} </div>
                                <button type="submit" class="button red">Place Bid</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
                <h5>Key Specification</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="details-block details-weight">
                            <ul>
                                <li>
                                    <span><i class="fa fa-industry text-red" aria-hidden="true"></i> Make Year: </span>
                                    <strong class="text-right">{{ $product->car->manufacturing_year ?? '' }}</strong>
                                </li>
                                <li>
                                    <span><i class="fa fa-cab text-red" aria-hidden="true"></i> Transmission: </span>
                                    <strong class="text-right">{{ $product->car->transmission->name ?? '' }}</strong>
                                </li>
                                <li>
                                    <span><i class="fa fa-fire text-red" aria-hidden="true"></i> Fuel Type: </span>
                                    <strong class="text-right">{{ $product->car->fuel_type->name ?? '' }}</strong>
                                </li>
                                <li>
                                    <span><i class="fa fa-balance-scale text-red" aria-hidden="true"></i> Gross Weight: </span>
                                    <strong class="text-right">{{ $product->car->weight ?? '' }}</strong>
                                </li>
                                <li>
                                    <span><i class="fa fa-power-off text-red" aria-hidden="true"></i> Maximum Power: </span>
                                    <strong class="text-right">{{ $product->car->maximum_power ?? '' }}</strong>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="details-block details-weight">
                            <ul>
                                <li>
                                    <span><i class="fa fa-ticket text-red" aria-hidden="true"></i> Seating Capacity: </span>
                                    <strong class="text-right">{{ $product->car->seating_capacity ?? '' }}</strong>
                                </li>
                                <li>
                                    <span><i class="fa fa-car text-red" aria-hidden="true"></i> Drive Type: </span>
                                    <strong class="text-right">{{ $product->car->drive_type->name ?? '' }}</strong>
                                </li>
                                <li>
                                    <span><i class="fa fa-gear text-red" aria-hidden="true"></i> Gear Box: </span>
                                    <strong class="text-right">{{ $product->car->gear_box->name ?? '' }}</strong>
                                </li>
                                <li>
                                    <span><i class="fa fa-money text-red" aria-hidden="true"></i> Loan Availability: </span>
                                    <strong class="text-right">Upto {{ $product->car->loan_upto ?? '' }}%</strong>
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
                        <li data-tabs="tab1" class="active"><span aria-hidden="true" class="icon-diamond"></span>Specification
                        </li>
                        <li data-tabs="tab2"><span aria-hidden="true" class="icon-list"></span>Description</li>
                        <li data-tabs="tab3"><span aria-hidden="true" class="icon-equalizer"></span> Features</li>
                        <li data-tabs="tab4"><span aria-hidden="true" class="icon-equalizer"></span> Finance</li>
                    </ul>
                    <div id="tab1" class="tabcontent">
                        <ul class="smsaccordion">
                            <li>
                                <a class="smstoggle">Engine and Transmission<i class="fa fa-chevron-down"></i></a>
                                <ul class="smsinner" style="display: block;">
                                    <li class="">
                                        <div class="list-label">Engine Type</div>
                                        <div class="list-stat">{{ $product->car->engine_type->name ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Engine Capacity</div>
                                        <div class="list-stat">{{ $product->car->engine_capacity ?? 0 }}cc</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Displacement</div>
                                        <div class="list-stat">{{ $product->car->displacement->name ?? '' }}
                                        </div>
                                    </li>
                                    <li class="">
                                        <div class="list-label"> Max power</div>
                                        <div class="list-stat">{{ $product->car->maximum_power ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Maximum toque</div>
                                        <div class="list-stat">{{ $product->car->maximum_torque ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Mileage kmpl</div>
                                        <div class="list-stat">{{ $product->car->milage ?? '' }} kmpl</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Engine check warning</div>
                                        <div class="list-stat">{{ $product->car->engine_check_warning ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Wheels base</div>
                                        <div
                                            class="list-stat">{{ $product->car->ground_clearance->name ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label"> Gear box</div>
                                        <div class="list-stat">{{ $product->car->gear_box->name ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Transmission</div>
                                        <div class="list-stat">{{ $product->car->transmission->name ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label"> Cylinder</div>
                                        <div class="list-stat">{{ $product->car->cylinder->name ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label"> Drive type</div>
                                        <div class="list-stat">{{ $product->car->drive_type->name ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label"> Minimum turning radius</div>
                                        <div class="list-stat">{{ $product->car->turning_radius ?? '' }}</div>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a class="smstoggle"> Weight and Dimension<i class="fa fa-chevron-down"></i></a>
                                <ul class="smsinner">
                                    <li class="">
                                        <div class="list-label">Gross weight</div>
                                        <div class="list-stat">{{ $product->car->weight ?? '' }} kg</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Seating capacity</div>
                                        <div class="list-stat">{{ $product->car->selling_capacity ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Ground clearance</div>
                                        <div
                                            class="list-stat">{{ $product->car->ground_clearance->name ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Wheel base</div>
                                        <div class="list-stat">{{ $product->car->wheel_base->name ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">No of Door</div>
                                        <div class="list-stat">{{ $product->car->no_of_door ?? 0 }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Length</div>
                                        <div class="list-stat">{{ $product->car->length ?? 0 }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Width</div>
                                        <div class="list-stat">{{ $product->car->width ?? 0 }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Height</div>
                                        <div class="list-stat">{{ $product->car->height ?? 0 }}</div>
                                    </li>

                                </ul>
                            </li>
                            <li>
                                <a class="smstoggle"> Wheels Tyre Steering and Brakes <i
                                        class="fa fa-chevron-down"></i></a>
                                <ul class="smsinner">
                                    <li class="">
                                        <div class="list-label"> Front suspension</div>
                                        <div class="list-stat">{{ $product->car->front_suspension ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label"> Rear suspension</div>
                                        <div class="list-stat">{{ $product->car->rear_suspension ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label"> Wheel type</div>
                                        <div class="list-stat">{{ $product->car->wheel_type->name ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Wheel size</div>
                                        <div class="list-stat">{{ $product->car->wheel_size ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Turning radius</div>
                                        <div class="list-stat">{{ $product->car->turning_radius ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">tyre type</div>
                                        <div class="list-stat">{{ $product->car->tyre_type->name ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Front tyre size</div>
                                        <div class="list-stat">{{ $product->car->front_tyre_size ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Rear tyre size</div>
                                        <div class="list-stat">{{ $product->car->rear_tyre_size ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Steering type</div>
                                        <div class="list-stat">{{ $product->car->steering_type ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Steering Column</div>
                                        <div class="list-stat">{{ $product->car->steering_column ?? 0 }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Front break type</div>
                                        <div class="list-stat">{{ $product->car->front_brake->name ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Rear break type</div>
                                        <div class="list-stat">{{ $product->car->rear_brake->name ?? '' }}</div>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a class="smstoggle"> Fuel and Consumption <i class="fa fa-chevron-down"></i></a>
                                <ul class="smsinner">
                                    <li class="">
                                        <div class="list-label">Fuel type</div>
                                        <div class="list-stat">{{ $product->car->fuel_type->name ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Fuel tank capacity</div>
                                        <div class="list-stat">{{ $product->car->fuel_tank_capacity ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Mileage kmpl</div>
                                        <div class="list-stat">{{ $product->car->milage ?? '' }}</div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div id="tab2" class="tabcontent">
                        <div class="des-icon">
                            <ul class="smsinner" style="display: block;">
                                <li class="">
                                    <div class="list-label">Body type</div>
                                    <div class="list-stat">{{ $product->car->body_type->name ?? '' }}</div>
                                </li>
                                <li class="">
                                    <div class="list-label">Make year</div>
                                    <div class="list-stat">{{ $product->car->manufacturing_year ?? '' }}</div>
                                </li>
                                @if($product->condition_id == 3)
                                <li>
                                    <div class="list-label">Registration year: </div>
                                    <div class="list-stat">{{ $product->registration_year ?? '' }}</div>
                                </li>
                                <li>
                                    <div class="list-label">Kms driven: </div>
                                    <div class="list-stat">{{ $product->kms_driven ?? '' }}</div>
                                </li>
                                @elseif($product->condition_id == 2)
                                <li>
                                    <div class="list-label">Auction grade: </div>
                                    <div class="list-stat">{{ $product->auction_grade->name ?? '' }}</div>
                                </li>
                                <li>
                                    <div class="list-label">Kms driven: </div>
                                    <div class="list-stat">{{ $product->kms_driven ?? '' }}</div>
                                </li>
                                @endif
                                <li class="">
                                    <div class="list-label">Boot Space</div>
                                    <div class="list-stat">{{ $product->car->boot_space ?? '' }}</div>
                                </li>
                                <li class="">
                                    <div class="list-label">Airbag</div>
                                    <div class="list-stat">{{ $product->car->airbag ?? '' }}</div>
                                </li>
                                <li class="">
                                    <div class="list-label">Dashboard Color</div>
                                    <div class="list-stat">{{ $product->car->dashboard_color ?? '(empty)' }}</div>
                                </li>
                                <li class="">
                                    <div class="list-label">Wheel Base</div>
                                    <div class="list-stat">{{ $product->car->wheel_base ?? '' }}</div>
                                </li>
                                <li class="">
                                    <div class="list-label">Color</div>
                                    <div class="list-stat">{{ $product->color ?? '' }}</div>
                                </li>
                                <li class="">
                                    <div class="list-label">Finance Upto</div>
                                    <div class="list-stat">{{ $product->finance_upto ?? '' }}</div>
                                </li>
                                <li class="">
                                    <div class="list-label">Supplier</div>
                                    <div class="list-stat">{{ $product->supplier->name ?? $product->dealer_name ?? '' }}</div>
                                </li>
                            </ul>
                        </div>
                        @if($product->condition_id == 2 || $product->condition_id == 3)
                        <div class="des-content">
                            {{ $product->description ?? '' }}
                        </div>
                        @endif
                    </div>
                    <div id="tab3" class="tabcontent">
                        <ul class="smsaccordion">
                            <li>
                                <a class="smstoggle">Key features<i class="fa fa-chevron-down"></i></a>
                                <ul class="smsinner" style="display: block;">
                                    @foreach($key_features as $key_feature)
                                    @php($array = explode(",", $product->car->key_feature))
                                    @if(in_array($key_feature->id, $array))
                                    <li class="">
                                        <div class="list-stat">{{ $key_feature->name }}</div>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a class="smstoggle"> Interior / Exterior <i class="fa fa-chevron-down"></i></a>
                                <ul class="smsinner">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="sixcol">
                                                <p><i class="fa fa-american-sign-language-interpreting"
                                                      aria-hidden="true"></i> Interior</p>
                                                <ul class="row tablist">
                                                    @foreach($interior_features as $interior_feature)
                                                    @php($array = explode(",", $product->car->interior_feature))
                                                    @if(in_array($interior_feature->id, $array))
                                                    <li class="">
                                                        <div class="list-stat">{{ $interior_feature->name }}</div>
                                                    </li>
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="sixcol last">
                                                <p><i class="fa fa-assistive-listening-systems"
                                                      aria-hidden="true"></i> Exterior</p>
                                                <ul class="row tablist">
                                                    @foreach($exterior_features as $exterior_feature)
                                                    @php($array = explode(",", $product->car->exterior_feature))
                                                    @if(in_array($exterior_feature->id, $array))
                                                    <li class="">
                                                        <div class="list-stat">{{ $exterior_feature->name }}</div>
                                                    </li>
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </ul>
                            </li>

                            <li>
                                <a class="smstoggle"> Safety and Security <i class="fa fa-chevron-down"></i></a>
                                <ul class="smsinner">
                                    @foreach($safety_securities as $safety_security)
                                    @php($array = explode(",", $product->car->safety_security))
                                    @if(in_array($safety_security->id, $array))
                                    <p>{{ $safety_security->name }}</p>
                                    @endif
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a class="smstoggle">Additional Features <i class="fa fa-chevron-down"></i></a>
                                <ul class="smsinner">
                                    @foreach($additional_features as $additional_feature)
                                    @php($array = explode(",", $product->car->additional_feature))
                                    @if(in_array($additional_feature->id, $array))
                                    <p>{{ $additional_feature->name }}</p>
                                    @endif
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div id="tab4" class="tabcontent">
                        <div class="details-form contact-2" id="finance-calculator">
                            <h5>Financing Calculator</h5>
                            <label for="msrp">Car price:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Tk.</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Enter price" id="msrp" value="{{ $product->msrp ?? 0 }}">
                            </div>
                            <div class="form-group mt-2">
                                <label>Period (Month)*</label>
                                <input type="text" class="form-control" placeholder="Month" id="validationCustom13" required="" value="50">
                            </div>
                            <div class="form-group">
                                <label for="customRadio0">Select bank:</label>
                                <div class="row">
                                    <div class="col-6 col-md-4 col-lg-3">
                                        <div class="custom-control custom-radio pl-0">
                                            <input type="radio" class="custom-control-input" id="customRadio0" name="example1" value="customEx" checked="checked">
                                            <label class="custom-control-label" for="customRadio0"><img class="img-thumbnail" src="{{ asset('images/dbbl.png') }}" /></label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4 col-lg-3">
                                        <div class="custom-control custom-radio pl-0">
                                            <input type="radio" class="custom-control-input" id="customRadio1" name="example1" value="customEx">
                                            <label class="custom-control-label" for="customRadio1"><img class="img-thumbnail" src="{{ asset('images/dbbl.png') }}" /></label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4 col-lg-3">
                                        <div class="custom-control custom-radio pl-0">
                                            <input type="radio" class="custom-control-input" id="customRadio2" name="example1" value="customEx">
                                            <label class="custom-control-label" for="customRadio2"><img class="img-thumbnail" src="{{ asset('images/dbbl.png') }}" /></label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4 col-lg-3">
                                        <div class="custom-control custom-radio pl-0">
                                            <input type="radio" class="custom-control-input" id="customRadio3" name="example1" value="customEx">
                                            <label class="custom-control-label" for="customRadio3"><img class="img-thumbnail" src="{{ asset('images/dbbl.png') }}" /></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label for="msrp">Down payment:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Tk.</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Enter down payment" id="msrp" value="2000000">
                            </div>
                            <div class="form-group mt-3">
                                <button class="button red" data-toggle="modal" data-target="#finance-result">Estimate payment</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- The Modal -->
                <div class="modal" id="finance-result">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Financing Calculation</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <table class="table table-striped table-sm">
                                    <tbody>
                                        <tr>
                                            <td>car Price</td>
                                            <td>Tk.50000000</td>
                                        </tr>
                                        <tr>
                                            <td>Monthly installment</td>
                                            <td>Tk.20000</td>
                                        </tr>
                                        <tr>
                                            <td>Interest Rate</td>
                                            <td>2%</td>
                                        </tr>
                                        <tr>
                                            <td>Down payment</td>
                                            <td>Tk.10000000</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Total payable</th>
                                            <th>Tk.55000000</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="extra-feature">
                    <h6> After sell Service </h6>
                    <div class="row">
                        @foreach($after_sell_services as $after_sell_service)
                        <div class="col-lg-4">
                            <ul class="list-style-1">
                                <li>
                                    <i class="fa fa-check"></i> @if(isset($product) && $product->after_sell_service && in_array($after_sell_service->id, $product->after_sell_service)) {{ $after_sell_service->name }} @endif
                                </li>
                            </ul>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="card bg-white post" id="sms">
                    <div class="card-body">
                        <form action="{{ route('comments.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}"/>
                            <div class="input-group">
                                <input class="form-control" name="data" placeholder="Add a comment" type="text">
                                <button type="submit" class="input-group-addon border-0">
                                    <a href="#" class="btn btn-danger"><i class="fa fa-check-square"></i></a>
                                </button>
                            </div>
                        </form>
                        @if($product->comments->count()>0)
                        <ul class="comments-list">
                            @foreach($product->comments as $comment)
                            <li class="comment">
                                <a class="pull-left" href="#" style="position:absolute">
                                    <img class="avatar"
                                         src="{{ url('/') }}/assets/profile/{{ $comment->user->photo ?? 'not-found.jpg'}}"
                                         alt="avatar">
                                </a>
                                <div class="comment-body">
                                    <div class="comment-heading">
                                        <h4 class="user">{{ $comment->user->name ?? 'Unnamed'}}</h4>
                                        <h5 class="time">{{ $comment->created_at->format('jS M Y') }}</h5>
                                    </div>
                                    <p>{{ $comment->data ?? ''}}</p>
                                    <div class="sms-reply-comment-icon"
                                         onclick="document.getElementById('comment-box-{{ $comment->id }}').classList.remove('d-none')">
                                        <i class="fa fa-reply" aria-hidden="true"></i></div>
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
                                            <input type="hidden" name="comment_id" value="{{ $comment->id }}"/>
                                            <div class="input-group">
                                                <input class="form-control" name="data"
                                                       placeholder="Add a Sub-Comment" type="text">
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
                            <input type="hidden" name="product_id" value="{{ $product->id }}"/>
                            <input type="hidden" name="score" id="feedback-score" value="0"/>
                            <div class="row">
                                <div class="col-md-12 col-sx-12">
                                    <div class="form-group">
                                        <textarea class="form-control" rows="4" placeholder="Comment"
                                                  name="message"></textarea>
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
            <div class="col-md-4">
                <div class="car-details-sidebar">
                    <div class="details-social details-weight">
                        <h5>Share now</h5>
                        <ul>
                            <li>
                                <a href="https://www.facebook.com/sharer.php?u={{ Request::url() }}" target="_blank"><i class="fa fa-facebook"></i> Facebook</a>
                            </li>
                            <li>
                                <a class="twitter-share-button" href="https://twitter.com/intent/tweet?text={{ $product->note }}&url={{ Request::url() }}" data-size="large"><i class="fa fa-twitter"></i> Twitter</a>
                            </li>
                            <li>
                                <a href="whatsapp://send?text={{ Request::url() }}" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"></i> WhatsApp</a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ Request::url() }}" target="_blank"><i class="fa fa-linkedin"></i> LinkedIn</a>
                            </li>
                            <li>
                                <a href="https://pinterest.com/pin/create/button/?url={{ Request::url() }}&media={{ url('/') }}/assets/products/{{ $product->image1 ?? 'not-found.jpg' }}"&description={{ $product->note }}" class="pin-it-button" count-layout="horizontal"><i class="fa fa-pinterest"></i> Pinterest</a>
                            </li>
                            <li>
                                <a href="https://reddit.com/submit?url={{ Request::url() }}&title={{ $product->name }}" target="_blank"><i class="fa fa-whatsapp"></i> Reddit</a>
                            </li>
                        </ul>
                    </div>

                    <div class="sidebar_widget">
                        <div class="widget_heading">
                            <h5><i class="fa fa-address-card-o" aria-hidden="true"></i> Dealer Contact </h5>
                        </div>
                        <div class="user-info-card">
                            <div class="user-photo border-0">
                                <img class="img-circle" src="{{ url('/') }}/assets/profile/{{ $product->supplier->photo ?? 'avatar.png' }}" alt="">
                            </div>
                            <div class="user-information">
                                <span class="user-name"><a class="hover-color" href="#">{{ $product->supplier->name ?? $product->dealer_name ?? ''  }}</a></span>
                                <div class="item-date">
                                    <span>Published on: {{ $product->created_at->format('jS M Y') }}</span>
                                    @if($product->supplier)
                                    <br>
                                    <a href="{{ route('car-listing') }}" class="link">More Ads</a>
                                    @endif
                                </div>
                                <div class="user-phone">
                                    <i class="fa fa-phone" aria-hidden="true"></i> <span data-replace="{{ $product->supplier->phone ?? $product->phone ?? ''  }}">{{ $product->supplier->phone ?? $product->phone ?? ''  }}</span>
                                </div>
                            </div>

                        </div>
                        
                        </br>
                        <form class="gray-form" action="{{ route('requested-more-infos.store') }}" method="post">
                            @if($product->supplier_id)
                            @csrf
                            <h5>Message to Dealer</h5>
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="validationCustom01"
                                       placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" id="validationCustom02"
                                       placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control" id="validationCustom03"
                                       placeholder="Phone" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="4"
                                          placeholder="Comment"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="button red">Request a service</button>
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <h2>Related Cars</h2>
                <div class="car-item">
                    <div class="separator"></div>
                </div>
                <div class="owl-carousel owl-theme" data-nav-arrow="true" data-items="3" data-md-items="3" data-sm-items="2" data-xs-items="1" data-space="0">
                    @foreach($related_products as $used_product)
                    <div class="item">
                        <div class="bg-white shadow m-3 zoom-parent overflow-hidden shadow-hover-10">
                            <div class="size-53 clearfix">
                                <div class="size-child overflow-hidden zoom-target-1">
                                    <img class="position-center h-auto" src="{{ url('/') }}/assets/products/{{ $used_product->id }}/{{ $used_product->image1 ?? 'not-found.jpg' }}" alt="{{ $used_product->name }}">
                                </div>
                                <div class="float-left form-control bg-dark text-white text-left border-0 d-inline-block w-auto position-relative height-30 py-1">
                                    <input type="checkbox" id="used-{{ $used_product->id }}" class="compare-checkbox" product-id="{{ $used_product->id }}">
                                    <label for="used-{{ $used_product->id }}">Compare</label>
                                </div>
                            </div>
                            <div class="text-dark clearfix px-3 py-1">
                                <div>
                                    <i class="fa @if($used_product->rating > 0) fa-star @else fa-star-o @endif orange-color"></i>
                                    <i class="fa @if($used_product->rating > 1) fa-star @else fa-star-o @endif orange-color"></i>
                                    <i class="fa @if($used_product->rating > 2) fa-star @else fa-star-o @endif orange-color"></i>
                                    <i class="fa @if($used_product->rating > 3) fa-star @else fa-star-o @endif orange-color"></i>
                                    <i class="fa @if($used_product->rating > 4) fa-star @else fa-star-o @endif orange-color"></i>
                                </div>
                                <div class="text-left clearfix">
                                    <span><i class="fa fa-map-marker text-danger"></i> {{ $used_product->supplier->region->name ?? ''}}, {{ $used_product->supplier->division->name ?? ''}}</span>
                                    <span class="float-right"><i class="fa fa-industry text-warning"></i> {{ $used_product->car->brand->name ?? ''}}</span>
                                </div>
                                <div class="display-6 my-2 owl-heading"><a href="{{ route('products.show', $used_product->id) }}" class="">{{ $used_product->name }}</a></div>
                                <div class="separator"></div>
                                <h3 class="owl-heading">Tk.{{ $used_product->msrp }}</h3>
                                <div class="row text-left">
                                    <div class="col-6 my-1">
                                        <i class="fa fa-road"></i> {{ $used_product->car->displacement->name ?? ''}} cc
                                    </div>
                                    <div class="col-6 my-1">
                                        <i class="fa fa-calendar"></i> {{ $used_product->car->milage ?? ''}} km milage
                                    </div>
                                    <div class="col-6 my-1">
                                        <i class="fa fa-calendar"></i> {{ $used_product->car->model->name ?? ''}} model
                                    </div>
                                    <div class="col-6 my-1">
                                        <i class="fa fa-car"></i> {{ $used_product->car->fuel_type->name ?? ''}}
                                    </div>
                                    <div class="col-6 my-1">
                                        <i class="fa fa-hourglass-end"></i> {{ $used_product->car->brand->name ?? ''}} brand
                                    </div>
                                    <div class="col-6 my-1">
                                        <i class="fa fa-superpowers"></i> {{ $used_product->car->maximum_power ?? ''}} Watt
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('cars.index') }}" target="_blank" class="button red mt-3">View All<i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
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
                <div class="col-12">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#internal">Internal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#external">External</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="internal" class="container tab-pane active"><br>
                            <div class="row">
                                <div class="col-12 size-32"><div id="panorama" class="size-child"></div></div>
                            </div>

                        </div>
                        <div id="external" class="container tab-pane fade"><br>
                            <div class="row">
                                <div class="col-12 size-32"><div id="object" class="size-child"></div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--=================================
End car-details -->

<!--=================================
Start What a new button -->
<div id="sms-wht-new">
    <a href="#what-a-new" data-toggle="modal" data-dismiss="modal">What a New ?</a>
</div>
<!--=================================
End What a new button -->
@if($product->supplier_id)
<div class="communication-box">
    <div class="fabs">
        <a href="{{ route('chats.show', $product->supplier_id) }}" id="prime" class="fab"><i class="fa fa-comments-o"></i></a>
    </div>
</div>
@endif
@endsection
@section('style')
<link rel="stylesheet" href="{{ url('/') }}/css/countdown.css"/>
<link rel="stylesheet" href="{{ url('/') }}/css/pannellum.css"/>
<style>
</style>
@endsection
@section('script')
<!-- 360-view -->
<script type="text/javascript" src="{{ url('/') }}/js/jquery.flipper-responsive.js"></script>
<script type="text/javascript" src="{{ url('/') }}/js/easeljs-0.6.0.min.js"></script>
<script type="text/javascript" src="{{ url('/') }}/js/pannellum.js"></script>
<script type="text/javascript" src="{{ url('/') }}/js/3deye.js?{{ time() }}"></script>

<script>
                                    jQuery(function ($) {
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
    (function() {
    var product = new Vue({
    el: '#finance-calculator',
            data: {
            temp_quantity: 12,
                    show_image_src: "{{ url('/') }}/assets/products/{{ $product->image1 ?? 'not-found.jpg' }}"
            },
            methods: {
            floatImage: function (e) {
            }
            }
    });
    })();
</script>
<script>
    $(document).ready(function(){
    $("#object").vc3dEye({
    imagePath:"{{ url('/') }}/assets/products/cars/{{ $product->car->id }}/",
            totalImages:{{ iterator_count(new FilesystemIterator(public_path()."/assets/products/cars/".$product->car->id))-2 }},
            imageExtension:"jpg",
            autoRotate:500,
            autoRotateInactivityDelay:5000
    });
    pannellum.viewer('panorama', {
    "type": "equirectangular",
            "panorama": "{{ url('/') }}/assets/products/cars/{{ $product->car->id }}/panorama.jpg",
            "preview": "{{ url('/') }}/assets/products/cars/{{ $product->car->id }}/panorama-preview.jpg",
            "autoRotate":5,
            "autoRotateInactivityDelay": 5000,
            "orientationOnByDefault":true
    });
    });
</script>
<script>
$('#rmi_form').submit(function(e) {
    e.preventDefault();
    $('#exampleModal').modal('hide'); //or  $('#IDModal').modal('hide');
    return false;
});
$('#mao_form').submit(function(e) {
    e.preventDefault();
    $('#exampleModal3').modal('hide'); //or  $('#IDModal').modal('hide');
    return false;
});
$('#etf_form').submit(function(e) {
    e.preventDefault();
    $('#exampleModal4').modal('hide'); //or  $('#IDModal').modal('hide');
    return false;
});
</script>
@endsection
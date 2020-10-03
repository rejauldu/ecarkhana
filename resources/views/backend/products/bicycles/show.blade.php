@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif
@include('layouts.frontend.bicycle-background')
<!--=================================car-details  -->
<section class="car-details page-section-ptb" id="product">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h3>{{ $product->name ?? 'Unnamed'}}</h3>
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
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image1 }}" alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image2 }}" alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image3 }}" alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image4 }}" alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image5 }}" alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image6 }}" alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image7 }}" alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image8 }}" alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image9 }}" alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image10 }}" alt="">
                    </div>
                    <div class="slider slider-nav">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image1 }}" alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image2 }}" alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image3 }}" alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image4 }}" alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image5 }}" alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image6 }}" alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image7 }}" alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image8 }}" alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image9 }}" alt="">
                        <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image10 }}">
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
                        <li> <span>Brand </span> <strong class="text-right">{{ $product->brand->name ?? '' }}</strong></li>
                        <li> <span>Model</span> <strong class="text-right">{{ $product->model->name ?? '' }}</strong></li>
                        <li> <span>Frame Size</span> <strong class="text-right">{{ $product->bicycle->frame_size ?? '' }}</strong></li>
                        @if($product->condition_id == 3)
                        <li> <span>Registration year: </span> <strong class="text-right">{{ $product->registration_year ?? '' }}</strong></li>
                        <li> <span>Kms driven: </span> <strong class="text-right">{{ $product->kms_driven ?? '' }}</strong></li>
                        @endif
                        <li> <span>Frame Materials</span> <strong class="text-right">{{ $product->bicycle->frame_material ?? '' }}</strong></li>
                        <li> <span>Fork</span> <strong class="text-right">{{ $product->bicycle->fork ?? '' }}</strong></li>
                        <li> <span>No of gears</span> <strong class="text-right">{{ $product->bicycle->gear_no ?? '' }}</strong></li>
                        <li> <span>Wheel Size</span> <strong class="text-right">{{ $product->bicycle->wheel_size ?? '' }}</strong></li>
                        <li> <span>Shifter</span> <strong class="text-right">{{ $product->bicycle->shifter ?? '' }}</strong></li>
                        <li> <span>Made Origin</span> <strong class="text-right">{{ $product->bicycle->made_origin->name ?? '' }}</strong></li>
                        <li> <span>Weight</span> <strong class="text-right">{{ $product->bicycle->weight ?? '' }}</strong></li>
                        <li> <span>Seller</span> <strong class="text-right">{{ $product->supplier->name ?? '' }}</strong></li>
                        <li> <span>Size</span> <strong class="text-right">{{ $product->bicycle->recommended_biker_height  ?? '' }}</strong></li>
                        <li> <span>Price</span> <strong class="text-right">Tk.{{ $product->msrp ?? '' }}</strong></li>
                        <li> <span>Remarks (any Prob)</span> <strong class="text-justify">{!! $product->note ?? '' !!}</strong></li>
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
                <div class="row">
                    <div class="col-md-6">
                        <div class="details-block details-weight">
                            <ul>
                                <li>
                                    <span><i class="fa fa-industry text-red" aria-hidden="true"></i> Frame Size: </span>
                                    <strong class="text-right">{{ $product->bicycle->frame_size ?? '' }}cc</strong>
                                </li>
                                <li>
                                    <span><i class="fa fa-cab text-red" aria-hidden="true"></i> Shifters: </span>
                                    <strong class="text-right">{{ $product->bicycle->shifter ?? '' }}</strong>
                                </li>
                                <li>
                                    <span><i class="fa fa-fire text-red" aria-hidden="true"></i> Brake Type: </span>
                                    <strong class="text-right">{{ $product->bicycle->brake_type ?? '' }}</strong>
                                </li>
                                <li>
                                    <span><i class="fa fa-balance-scale text-red" aria-hidden="true"></i> Shifter Lever: </span>
                                    <strong class="text-right">{{ $product->bicycle->shifter_lever ?? '' }}</strong>
                                </li>
                                <li>
                                    <span><i class="fa fa-power-off text-red" aria-hidden="true"></i> Rear Derailleur: </span>
                                    <strong class="text-right">{{ $product->bicycle->rear_derailleur ?? '' }}</strong>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="details-block details-weight">
                            <ul>
                                <li>
                                    <span><i class="fa fa-ticket text-red" aria-hidden="true"></i> Front Derailleur: </span>
                                    <strong class="text-right">{{ $product->bicycle->front_derailleur ?? '' }}</strong>
                                </li>
                                <li>
                                    <span><i class="fa fa-car text-red" aria-hidden="true"></i> Rims: </span>
                                    <strong class="text-right">{{ $product->bicycle->rim ?? '' }}</strong>
                                </li>
                                <li>
                                    <span><i class="fa fa-gear text-red" aria-hidden="true"></i> Hubs Quality: </span>
                                    <strong class="text-right">{{ $product->bicycle->hub_quality ?? '' }}</strong>
                                </li>
                                <li>
                                    <span><i class="fa fa-money text-red" aria-hidden="true"></i> Geared: </span>
                                    <strong class="text-right">{{ $product->bicycle->gear ?? '' }}</strong>
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
                        <li data-tabs="tab2"><span aria-hidden="true" class="icon-list"></span>Features
                        </li>
                        <li data-tabs="tab3"> <span aria-hidden="true" class="icon-equalizer"></span> Weight and limit
                        </li>
                        <!-- <li data-tabs="tab4"> <span aria-hidden="true" class="icon-equalizer"></span> Finance
                        </li> -->
                    </ul>
                    <div id="tab1" class="tabcontent">
                        <ul class="smsaccordion">
                            <li>
                                <a class="smstoggle">Frame and Suspension<i class="fa fa-chevron-down"></i></a>
                                <ul class="smsinner" style="display: block;">
                                    <li class="">
                                        <div class="list-label"> Frame size</div>
                                        <div class="list-stat">{{ $product->bicycle->frame_size ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Frame metarials</div>
                                        <div class="list-stat">{{ $product->bicycle->frame_material ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label"> Recommended biker height </div>
                                        <div class="list-stat">{{ $product->bicycle->recommended_biker_height ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Fork rear</div>
                                        <div class="list-stat">{{ $product->bicycle->fork_rear ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Fork front</div>
                                        <div class="list-stat">{{ $product->bicycle->fork_front ?? '' }}</div>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a class="smstoggle"> Wheels and Tyres <i class="fa fa-chevron-down"></i></a>
                                <ul class="smsinner">
                                    <li class="">
                                        <div class="list-label">Wheels</div>
                                        <div class="list-stat">{{ $product->bicycle->wheel_type->name ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Wheel size</div>
                                        <div class="list-stat">{{ $product->bicycle->wheel_size ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Tyre type</div>
                                        <div class="list-stat">{{ $product->bicycle->tyre_type->name ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Tyre size</div>
                                        <div class="list-stat">{{ $product->bicycle->tyre_size ?? '' }}</div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="smstoggle"> Drivetrain <i class="fa fa-chevron-down"></i></a>
                                <ul class="smsinner">
                                    <li class="">
                                        <div class="list-label">Shifters</div>
                                        <div class="list-stat">{{ $product->bicycle->shifter ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Front derailleur</div>
                                        <div class="list-stat">{{ $product->bicycle->front_derailleur ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Rear derailleur</div>
                                        <div class="list-stat">{{ $product->bicycle->rear_derailleur ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Crank</div>
                                        <div class="list-stat">{{ $product->bicycle->crank ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Freewheel</div>
                                        <div class="list-stat">{{ $product->bicycle->freewheel ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Seat post</div>
                                        <div class="list-stat">{{ $product->bicycle->seat_post ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Chain </div>
                                        <div class="list-stat">{{ $product->bicycle->chain ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Pedals</div>
                                        <div class="list-stat">{{ $product->bicycle->pedal ?? '' }}</div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="smstoggle"> Components <i class="fa fa-chevron-down"></i></a>
                                <ul class="smsinner">
                                    <li class="">
                                        <div class="list-label">Saddle</div>
                                        <div class="list-stat">{{ $product->bicycle->saddle ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Seat post</div>
                                        <div class="list-stat">{{ $product->bicycle->seat_post   ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Headset</div>
                                        <div class="list-stat">{{ $product->bicycle->headset     ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Handlebar</div>
                                        <div class="list-stat">{{ $product->bicycle->handlebar   ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Grips</div>
                                        <div class="list-stat">{{ $product->bicycle->grip    ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Stem</div>
                                        <div class="list-stat">{{ $product->bicycle->stem    ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Brake set</div>
                                        <div class="list-stat">{{ $product->bicycle->brake_system ?? '' }}</div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div id="tab2" class="tabcontent">
                        <ul class="smsaccordion">
                            <li>
                                <a class="smstoggle">Key Features<i class="fa fa-chevron-down"></i></a>
                                <ul class="smsinner d-block">
                                    @foreach($key_features as $key_feature)
                                    @php($array = explode(",", $product->bicycle->key_feature))
                                    @if(in_array($key_feature->id, $array))
                                    <li class="">
                                        <div class="list-stat">{{ $key_feature->name ?? ''}}</div>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div id="tab3" class="tabcontent">
                        <ul class="smsaccordion">
                            <li>
                                <a class="smstoggle">Weight and limit <i class="fa fa-chevron-down"></i></a>
                                <ul class="smsinner d-block">
                                    <li class="">
                                        <div class="list-label">Bike weight</div>
                                        <div class="list-stat">{{ $product->bicycle->weight ?? '' }}</div>
                                    </li>
                                    <li class="">
                                        <div class="list-label">Biker weight limit</div>
                                        <div class="list-stat">{{ $product->bicycle->biker_weight ?? '' }}</div>
                                    </li>
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
                            <div class="comment-form-rating">
                                <label for="rating">Your Rating</label>
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
                                <a href="https://pinterest.com/pin/create/button?url={{ Request::url() }}&media={{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image1 ?? 'not-found.jpg' }}&description={{ $product->note }}" class="pin-it-button" count-layout="horizontal"><i class="fa fa-pinterest"></i> Pinterest</a>
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
                                <img class="img-circle"
                                     src="{{ url('/') }}/assets/profile/{{ $product->supplier->photo ?? 'not-found.jpg' }}"
                                     alt="">
                            </div>
                            <div class="user-information">
                                <span class="user-name"><a class="hover-color"
                                                           href="#">{{ $product->supplier->name ?? 'Unnamed' }}</a></span>
                                <div class="item-date">
                                    <span>Published on: {{ $product->created_at->format('jS M Y') }}</span><br>
                                    <a href="{{ route('bicycle-listing') }}" class="link">More Ads</a>
                                </div>
                                <div class="user-phone">
                                    <i class="fa fa-mobile" aria-hidden="true"></i><span
                                        data-replace="{{ $product->supplier->phone ?? '' }}">{{ $product->supplier->phone ?? '' }}</span>
                                </div>
                            </div>

                        </div>

                        </br>
                        <form class="gray-form" action="{{ route('requested-more-infos.store') }}" method="post">
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
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <h2>Related Bicycles</h2>
                <div class="car-item">
                    <div class="separator"></div>
                </div>
                <div class="owl-carousel owl-theme" data-nav-arrow="true" data-items="3" data-md-items="3" data-sm-items="2" data-xs-items="1" data-space="0">
                    @foreach($related_products as $related_product)
                    <div class="item">
                        <div class="bg-white shadow-sm mx-2 zoom-parent overflow-hidden shadow-hover-10">
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
                                        <i class="fa fa-road"></i> {{ $related_product->kms_driven ?? ''}} km
                                    </div>
                                    <div class="col-6 my-1">
                                        <i class="fa fa-calendar"></i> {{ $related_product->bicycle->milage ?? ''}} miles
                                    </div>
                                    <div class="col-6 my-1">
                                        <i class="fa fa-calendar"></i> {{ $related_product->model->name ?? ''}} model
                                    </div>
                                    <div class="col-6 my-1">
                                        <i class="fa fa-hourglass-end"></i> {{ $related_product->brand->name ?? ''}} brand
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('bicycles.index') }}" target="_blank" class="button red mt-3">View All<i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
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
                            "name": "{{ $product->name ?? 'Unnamed' }}",
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
                    }
            }
    });</script>

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
    imagePath:"{{ url('/') }}/assets/products/bicycles/{{ $product->bicycle->id }}/",
            totalImages:{{ iterator_count(new FilesystemIterator(public_path()."/assets/products/bicycles/".$product->bicycle->id)) - 2 }},
            imageExtension:"jpg",
            autoRotate:500,
            autoRotateInactivityDelay:5000
    });
    });
</script>

@endsection
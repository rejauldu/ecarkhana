@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
	{{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.car-background')


    <!--=================================Start Seller Profile  -->

    <section class="seller-profile page-section-ptb">
        <div class="container">
			@if ($errors->any())
			<div class="row">
				<div class="col-12">
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
			@endif
            @include('layouts.frontend.profile-header', ['profile' => 'active'])
            <div class="seller-tab-area">
                <div class="row">
                    <div class="col-md-12 col-12 ">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="seller-nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">Profile</a>
								<a class="nav-item nav-link" id="nav-edit-password-tab" data-toggle="tab" href="#nav-password" role="tab" aria-controls="nav-password" aria-selected="false">Password</a>
								<a class="nav-item nav-link" id="nav-photo-tab" data-toggle="tab" href="#nav-photo" role="tab" aria-controls="nav-photo" aria-selected="false">Photo</a>
                                <a class="nav-item nav-link" id="nav-plan-setting-tab" data-toggle="tab" href="#nav-plan-setting" role="tab" aria-controls="nav-plan-setting" aria-selected="false">My Order</a>
                                <a class="nav-item nav-link" id="nav-notification-setting-tab" data-toggle="tab" href="#nav-notification-setting" role="tab" aria-controls="nav-notification-setting" aria-selected="false">Notification</a>
                            </div>
                        </nav>
                        <div class="tab-content py-3 px-3 px-sm-0" id="seller-nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <h2 class="heading-md">Manage your Security Settings</h2>
                                <p>Manage Your Account</p>
                                <div class="row">
                                    <form class="ajax-upload" action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
										@method('PUT')
										<input type="hidden" name="data_source" value="frontend" />
										<div class="form-group col-md-6 col-sm-12">
                                            <label class="control-label">Your Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $user->name ?? '' }}">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label class="control-label">Your Email</label>
                                            <input type="email" name="email" class="form-control" placeholder="username@example.com" value="{{ $user->email ?? '' }}">
                                        </div>
                                        <div class="form-group col-md-12 col-sm-12">
                                            <label class="control-label">Contact Number</label>
                                            <input type="text" name="phone" class="form-control" placeholder="01xxxxxxxxx" value="{{ $user->phone ?? '' }}">
                                        </div>
                                        <div class="form-group col-md-12 col-sm-12">
											<label for="division">City</label>
											<select id="division" name="division_id" class="custom-select">
												<option value="0" selected>--Select city--</option>
												@foreach($divisions as $division)
												<option value="{{ $division->id }}" @if($user->division && $division->id == $user->division->id) selected @endif>{{ $division->name }}</option>
												@endforeach
											</select>
										</div>
										<div class="form-group col-md-12 col-sm-12">
											<label for="region">Region</label>
											<select id="region" name="region_id" class="custom-select">
												<option value="{{ $user->region->id ?? 0 }}" selected>{{ $user->region->name ?? '--Select region--'}}</option>
											</select>
										</div>
										<div class="form-group col-md-12 col-sm-12">
											<label for="ad">Address</label>
											<textarea class="form-control" name="address" placeholder="Enter Address" title="Enter you Address">{{ $user->address ?? ''}}</textarea>
										</div>
										<div class="form-group col-md-12 col-sm-12">
											<label for="card-type">Billing City</label>
											<select id="billing-division" name="billing_division_id" class="custom-select">
												<option value="0" selected>--Select city--</option>
												@foreach($divisions as $division)
												<option value="{{ $division->id }}" @if($user->billing_division && $division->id == $user->billing_division->id) selected @endif>{{ $division->name }}</option>
												@endforeach
											</select>
										</div>
										<div class="form-group col-md-12 col-sm-12">
											<label for="region">Billing Region</label>
											<select id="billing-region" name="billing_region_id" class="custom-select">
												<option value="{{ $user->region->id ?? 0 }}" selected>{{ $user->billing_region->name ?? '--Select region--'}}</option>
											</select>
										</div>
										<div class="form-group col-md-12 col-sm-12">
											<label for="ad">Billing Address</label>
											<textarea class="form-control" name="billing_address" placeholder="Enter Address" title="Enter you Address">{{ $user->billing_address }}</textarea>
										</div>
										<div class="form-group col-md-12 col-sm-12">
											<label for="card-type">Shipping City</label>
											<select id="shipping-division" name="shipping_division_id" class="custom-select">
												<option value="0" selected>--Select city--</option>
												@foreach($divisions as $division)
												<option value="{{ $division->id }}" @if($user->shipping_division && $division->id == $user->shipping_division->id) selected @endif>{{ $division->name }}</option>
												@endforeach
											</select>
										</div>
										<div class="form-group col-md-12 col-sm-12">
											<label for="region">Shipping Region</label>
											<select id="shipping-region" name="shipping_region_id" class="custom-select">
												<option value="{{ $user->region->id ?? 0 }}" selected>{{ $user->shipping_region->name ?? '--Select region--'}}</option>
											</select>
										</div>
										<div class="form-group col-md-12 col-sm-12">
											<label for="ad">Shipping Address</label>
											<textarea class="form-control" name="shipping_address" placeholder="Enter Address" title="Enter you Address">{{ $user->shipping_address }}</textarea>
										</div>
										<div class="form-group col-md-12 col-sm-12">
											<label for="ad">About Yourself</label>
											<textarea class="form-control" name="about" placeholder="Enter About" title="Enter about">{{ $user->about ?? ''}}</textarea>
										</div>
                                        <div class="form-group  col-md-12 col-sm-12 text-right">
                                            <button id="submit1" type="submit" class="button red"> Update My Info</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
							<div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-edit-password-tab">
                                <h2 class="heading-md">Manage password</h2>
								<p>Password must contain at least one letter and one character. Password must be minimum 6 characters long.</p>
                                <div class="row">
                                    <form class="ajax-upload" action="{{ route('users.update', $user->id) }}" method="post">
                                        @csrf
										@method('PUT')
										<div class="form-group col-12">
											<label for="password_old">Old Password</label>
											<input id="password_old" type="password" class="form-control" name="password_old" value="" placeholder="Enter old password" title="Enter old password."/>
											@error('password_old')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
										<div class="form-group col-12">
											<label for="pass">New Password</label>
											<input id="pass" type="password" class="form-control" name="password" value="" placeholder="Enter new password." title="Enter your password."/>
											@error('password')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
										<div class="form-group col-12">
											<label for="password_confirmation">Confirm Password</label>
											<input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="" placeholder="Enter new password again." title="Enter your password again.">
											@error('password_confirmation')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
										<div class="form-group col-12 text-right">
											<button  id="password_submit" class="button red" type="submit">Update</button>
										</div>
									</form>
								</div>
							</div>
							<div class="tab-pane fade" id="nav-photo" role="tabpanel" aria-labelledby="nav-photo-tab">
								<h2 class="heading-md">Manage photo</h2>
								<p>Profile photo must be in jpeg, png, jpg, gif or svg format and maximum file size 2MB</p>
                                <div class="row">
									<div class="text-center">
										<img id="display-photo-on-select" src="{{ asset('/assets/profile') }}/{{ $user->photo }}" class="img-thumbnail rounded-circle" style="max-width:200px" alt="avatar">
										<h6>Upload a different photo...</h6>
										<form class="ajax-upload text-left" action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
											@csrf
											@method('PUT')
											<div class="form-group">
												<input type="file" id="file" name="photo" class="form-control bg-theme text-white" onchange="displayPhotoOnSelect(this)" accept="image/*" value="Upload picture" />
											</div>
											<div class="progress mt-2">
												<div class="progress-bar progress-bar-striped active list" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%; height:100%; line-height:22px"></div>
											</div>
											<input type="submit" class="button red" value="Upload" />
										</form>
									</div>
								</div>
							</div>
                            <div class="tab-pane fade" id="nav-plan-setting" role="tabpanel" aria-labelledby="nav-plan-setting-tab">
                                <div class="sms-account-order">
									@foreach($user->orders as $order)
                                    <div class="sms-order">
                                        <div class="sms-order-status">
                                            <b>Status :</b> {{ $order->status->name }}
                                        </div>
                                        <div class="sms-order-id">
                                            <b>Order ID :</b> #{{ $order->id }}
                                        </div>
                                        <div class="sms-order-price">
											@php($sum = 0)
											@foreach($order->order_details as $detail)
												@php($sum += $detail->product->msrp*$detail->quantity)
											@endforeach
                                            <b>Total Amount: </b> ৳{{ $sum }}
                                        </div>
                                        <div class="sms-order-button">
                                            <button class="button red" onclick="window.location.href = 'bike-cart.html';">Show Details</button>
                                        </div>
                                    </div>
									@endforeach
                                </div>
                            </div>


                            <div class="tab-pane fade" id="nav-notification-setting" role="tabpanel" aria-labelledby="nav-notification-setting-tab">
                                <h2 class="heading-md">Manage your Notifications.</h2>
                                <p>Below are the notifications you may manage.</p>
								<ul>
									@foreach(Auth::user()->unreadNotifications as $notification)
									<li><a class="btn btn-link" href="#">{{ $notification->data['subject'] }}</a></li>
									@endforeach
								</ul>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================End Seller Profile   -->

@endsection
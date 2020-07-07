@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
	{{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.motorcycle-background')


    <!--=================================
checkout-listing  -->
    <section class="bike-checkout">
        <div class="checkout-area">
            <div class="container">
				
                <div class="row">
                    <div class="col-md-12">
                        <div class="coupon-accordion">
							@guest
                            <!-- ACCORDION START -->
                            <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
                            <div id="checkout-login" class="coupon-content" style="display: none;">
                                <div class="coupon-info">
                                    <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est sit amet ipsum luctus.</p>
                                    <form method="POST" action="{{ route('login') }}">
										@csrf
                                        <p class="form-row-first">
                                            <label>Email <span class="required">*</span></label>
                                            <input type="email" name="email">
                                        </p>
                                        <p class="form-row-last">
                                            <label>Password  <span class="required">*</span></label>
                                            <input type="password" name="password">
                                        </p>
                                        <p class="form-row">
                                            <input type="submit" value="Login">
                                            <label>
                                                    <input type="checkbox" name="remember">
                                                     Remember me 
                                                </label>
                                        </p>
                                        <p class="lost-password">
                                            <a href="{{ route('password.request') }}">Lost your password?</a>
                                        </p>
                                    </form>
                                </div>
                            </div>
                            <!-- ACCORDION END -->
							@endguest
                            <!-- ACCORDION START -->
                            <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                            <div id="checkout_coupon" class="coupon-checkout-content" style="display: none;">
                                <div class="coupon-info">
                                    <form action="#">
                                        <p class="checkout-coupon">
                                            <input type="text" name="coupon" placeholder="Coupon code">
                                            <input type="submit" value="Apply Coupon">
                                        </p>
                                    </form>
                                </div>
                            </div>
                            <!-- ACCORDION END -->
                        </div>
                    </div>
                </div>
				<form class="d-block" action="{{ route('orders.store') }}" method="post">
					@csrf
                <div class="row sms-checkout-form">
                    <div class="col-lg-6 col-md-12 col-12">
						<div class="checkbox-form">
							<h3>Billing Details</h3>
							<div class="row">
								<div class="col-md-6">
									<div class="checkout-form-list">
										<label>Name <span class="required">*</span></label>
										<input type="text" name="name" value="{{ $profile->name ?? '' }}" placeholder="Enter your name">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="billing-division">City</label>
										<select id="billing-division" name="billing_division_id" class="custom-select">
											<option value="0" selected>--Select city--</option>
											@foreach($divisions as $division)
											<option value="{{ $division->id }}" @if(isset($profile) && $profile->billing_division && $division->id == $profile->billing_division->id) selected @endif>{{ $division->name }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="billing-region">Region</label>
										<select id="billing-region" name="billing_region_id" class="custom-select">
											@if(isset($profile))
											<option value="{{ $profile->billing_region->id ?? 0 }}" selected>{{ $profile->billing_region->name ?? '--Select billing_region--'}}</option>
											@else
												<option value="0">--Select billing_region--</option>
											@endif
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<div class="col-xs-6">
											<label for="ad">Address</label>
											<textarea class="form-control" name="billing_address" placeholder="Enter Address" title="Enter you Address">{{ $profile->billing_address ?? ''}}</textarea>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="checkout-form-list">
										<label>Email Address <span class="required">*</span></label>
										<input type="email" name="email" value="{{ $profile->email ?? '' }}">
									</div>
								</div>
								<div class="col-md-6">
									<div class="checkout-form-list">
										<label>Phone  <span class="required">*</span></label>
										<input type="text" name="phone" value="{{ $profile->phone ?? '' }}">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-6">
									<label for="note">Note:</label>
									<textarea class="form-control" name="note" id="note" placeholder="Enter Note" title="Enter Note"></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="checkout-form-list create-acc">
									<input id="cbox" type="checkbox" name="create_account" value="1">
									<label for="cbox">Create an account?</label>
								</div>
							</div>
							<div class="different-address">
								<div class="ship-different-title">
									<h3>
										<label for="ship-box">Ship to a different address?</label>
										<input id="ship-box" name="different_shipping" type="checkbox" value="true">
									</h3>
								</div>
								<div id="ship-box-info" class="row" style="display: none;">
									<div class="col-md-12">
										<div class="form-group">
											<label for="shipping-division">City</label>
											<select id="shipping-division" name="shipping_division_id" class="custom-select">
												<option value="0" selected>--Select city--</option>
												@foreach($divisions as $division)
												<option value="{{ $division->id }}" @if(isset($profile) && $profile->shipping_division && $division->id == $profile->shipping_division->id) selected @endif>{{ $division->name }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="shipping-region">Region</label>
											<select id="shipping-region" name="shipping_region_id" class="custom-select">
												@if(isset($profile))
												<option value="{{ $profile->shipping_region->id ?? 0 }}" selected>{{ $profile->shipping_region->name ?? '--Select shipping_region--'}}</option>
												@else
													<option value="0">--Select shipping_region--</option>
												@endif
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<div class="col-xs-6">
												<label for="ad">Address</label>
												<textarea class="form-control" name="shipping_address" placeholder="Enter Address" title="Enter you Address">{{ $profile->shipping_address ?? ''}}</textarea>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12" id="checkout">
                        <div class="your-order">
                            <h3>Your order</h3>
                            <div class="your-order-table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">Product</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="cart_item" v-for="product in products">
                                            <td class="product-name">
											@{{ product.model }} <strong class="product-quantity"> × @{{ product.quantity }}</strong>
											<input type="hidden" name="product_id[]" v-model="product.id" />
											<input type="hidden" name="quantity[]" v-model="product.quantity" />
                                            </td>
                                            <td class="product-total">
                                                <span class="amount">৳ @{{ product.price*product.quantity }}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td><span class="amount">৳ @{{ subTotal }}</span></td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span class="amount">৳ @{{ total }}</span></strong>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment-method">
                                <div class="payment-accordion">
                                    <div class="panel-group" id="faq">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">Select payment method</h5>
                                            </div>
                                            <div id="payment">
                                                <div class="custom-control custom-radio">
													<input type="radio" class="custom-control-input" id="cash" name="payment_method" value="cash" checked>
													<label class="custom-control-label" for="cash">Cash on Delivery</label>
												</div>
												<div class="custom-control custom-radio">
													<input type="radio" class="custom-control-input" id="ssl" name="payment_method" value="ssl">
													<label class="custom-control-label" for="ssl">Credit/Debit Card</label>
												</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-button-payment">
                                        <button type="submit" class="button red">Place Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				</form>
            </div>
        </div>

    </section>

    <!--=================================checkout-listing  -->
@endsection
@section('script')
<script>
var app2 = new Vue({
	el: '#checkout',
	data: {
		products: cart.products
	},
	computed: {
		subTotal: function () {
			var price = 0;
			for(let i=0; i<this.products.length; i++) {
				price += this.products[i].price * this.products[i].quantity;
			}
			return price;
		},
		total: function () {
			return this.subTotal;
		}
	}
});
</script>
@endsection

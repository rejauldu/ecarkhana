@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.motorcycle-background')


<!--=================================
cart-listing  -->

<div class="cart_page_area pt-100 pb-60" id="cart-products">
    <form action="#">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cart-table table-responsive mb-40">
                        <table>
                            <thead>
                                <tr>
                                    <th class="pro-thumbnail">Image</th>
                                    <th class="pro-title">Product</th>
                                    <th class="pro-price">Price</th>
                                    <th class="pro-quantity">Quantity</th>
                                    <th class="pro-subtotal">Total</th>
                                    <th class="pro-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="product in products">
                                    <td class="pro-thumbnail">
                                        <a href="#"><img v-bind:src="product.image1" alt=""></a>
                                    </td>
                                    <td class="pro-title"><a href="#">@{{ product.name }}</a></td>
                                    <td class="pro-price"><span class="amount">৳ @{{ product.msrp }}</span></td>
                                    <td class="pro-quantity">
                                        <div class="cart-plus-minus">
                                            <div class="dec qtybutton" @click="product.quantity=parseInt(product.quantity)-1; if(product.quantity<1) product.quantity = 1;">-</div>
                                            <input type="text" v-model="product.quantity" @change="if(product.quantity<1) product.quantity = 1;" name="qtybutton" class="cart-plus-minus-box">
                                            <div class="inc qtybutton" @click="product.quantity=parseInt(product.quantity)+1">+</div>
                                        </div>
                                    </td>
                                    <td class="pro-subtotal">৳ @{{ product.msrp*product.quantity }}</td>
                                    <td class="pro-remove"><a href="#" @click.prevent="remove(product.id)">×</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-8 col-12">
                    <div class="cart-buttons mb-30">
                        <a href="{{ route('motorcycle-listing') }}">Continue Shopping</a>
                    </div>
                    <div class="cart-coupon mb-40">
                        <h4>Coupon</h4>
                        <p>Enter your coupon code if you have one.</p>
                        <div class="coupon_form_inner">
                            <input type="text" placeholder="Coupon code">
                            <input type="submit" value="Apply Coupon">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="cart-total mb-40">
                        <h3>Cart Totals</h3>
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                    <tr class="cart-subtotal">
                                        <th>Subtotal</th>
                                        <td><span class="amount">৳ @{{ subTotal }}</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Total</th>
                                        <td>
                                            <strong><span class="amount">৳ @{{ total }}</span></strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="proceed-to-checkout section mt-30">
                            <a href="{{ route('checkout') }}">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </form>
</div>

<!--=================================cart-listing  -->
@endsection
@section('script')
<script>
    var app2 = new Vue({
        el: '#cart-products',
        data: {
            products: cart.products
        },
        methods: {
            remove: function (id) {
                this.products = this.products.filter(function (el) {
                    return el.id != id;
                });
            },
            decreaseQuantity: function (q) {
                q--;
                if (q < 1)
                    q = 1;
            }
        },
        computed: {
            subTotal: function () {
                var price = 0;
                if(!this.products)
                    return 0;
                for (let i = 0; i < this.products.length; i++) {
                    price += this.products[i].msrp * this.products[i].quantity;
                }
                return price;
            },
            total: function () {
                return this.subTotal;
            },
        },
        watch: {
            products: {
                handler: function (n, o) {
                    cart.products = n;
                },
                deep: true,
            }
        }
    });
</script>
@endsection
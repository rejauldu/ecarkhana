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

    <div class="cart_page_area pt-100 pb-60">
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
                                        <th class="pro-quantity">Stock Stauts</th>
                                        <th class="pro-subtotal">Add to Cart</th>
                                        <th class="pro-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="pro-thumbnail">
                                            <a href="#"><img src="images/bike/cart-img.webp" alt=""></a>
                                        </td>
                                        <td class="pro-title"><a href="#">Le Parc Minotti Chair</a></td>
                                        <td class="pro-price"><span class="amount">$169.00</span></td>
                                        <td class="pro-stock">
                                            In Stock
                                        </td>
                                        <td class="pro-cart"><a href="#">add to cart</a></td>
                                        <td class="pro-remove"><a href="#">×</a></td>
                                    </tr>
                                    <tr>
                                        <td class="pro-thumbnail">
                                            <a href="#"><img src="images/bike/cart-img.webp" alt=""></a>
                                        </td>
                                        <td class="pro-title"><a href="#">DSR Eiffel chair</a></td>
                                        <td class="pro-price"><span class="amount">$137.00</span></td>
                                        <td class="pro-out-stoke">
                                            Out Stock
                                        </td>
                                        <td class="pro-cart"><a href="#">add to cart</a></td>
                                        <td class="pro-remove"><a href="#">×</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>



                </div>
            </div>
        </form>
    </div>

    <!--=================================
   cart-listing  -->




@endsection
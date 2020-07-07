@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
	{{ session()->get('message') }}
</div>
@endif
@include('layouts.frontend.car-background')


    <!--=================================
Auction product-listing  -->

    <section id="Auction-products" class="product-listing page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="sorting-options-main">
                        @include('layouts.frontend.car-filter')
                        <div class="row sorting-options">
                            <div class="col-lg-5">
                                <h5>Auction Products</h5>
                            </div>
                            <div class="col-lg-3 text-right">
                                <div class="selected-box">
                                    <select>
                                        <option>Show </option>
                                        <option>1</option>
                                        <option>2 </option>
                                        <option>3 </option>
                                        <option>4 </option>
                                        <option>5 </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 text-right">
                                <div class="selected-box">
                                    <select>
                                        <option>Sort by </option>
                                        <option>Price: Lowest first</option>
                                        <option>Price: Highest first </option>
                                        <option>Product Name: A to Z </option>
                                        <option>Product Name: Z to A </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-lg-4">
                            <div class="car-item gray-bg text-center">
                                <div class="car-image">
                                    <img class="img-fluid" src="assets/products/cars/{{ $product->car->image1 }}" alt="">
                                    <div class="car-overlay-banner">
                                        <ul>
                                            <li>
                                                <div class="compare_item">
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="compare2">
                                                        <label for="compare2">Compare</label>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="car-list">
                                    <ul class="list-inline">
                                        <li><i class="fa fa-registered"></i> {{ $product->car->manufacturing_year ?? ''}}</li>
                                        <li><i class="fa fa-cog"></i> {{ $product->car->steering_gear_type ?? ''}} </li>
                                        <li><i class="fa fa-shopping-cart"></i> {{ $nproduct->car->milage ?? ''}} mi</li>
                                    </ul>
                                </div>
                                <div class="car-content">
                                    <div class="star">
                                        <i class="fa fa-star orange-color"></i>
                                        <i class="fa fa-star orange-color"></i>
                                        <i class="fa fa-star orange-color"></i>
                                        <i class="fa fa-star orange-color"></i>
                                        <i class="fa fa-star-o orange-color"></i>
                                    </div>
                                    <a href="{{ route('single-sell-product', $product->id) }}">{{ $product->name }}</a>
                                    <div class="separator"></div>
                                    <div class="price">
                                        <span class="new-price">৳ {{ $product->msrp }} </span>
                                    </div>
                                </div>
                            </div>
                        </div>
						@endforeach
                    </div>
                    <div class="pagination-nav d-flex justify-content-center">
					{{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================product-listing  -->
 @endsection
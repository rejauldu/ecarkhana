@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif
@include('layouts.frontend.car-background')
<!--=================================Auction product-listing  -->
<section id="Auction-products" class="product-listing page-section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="sorting-options-main">
                    @include('layouts.frontend.car-filter')
                </div>
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-lg-4">
                        <div class="car-item gray-bg text-center">
                            <div class="car-image">
                                <img class="img-fluid" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image1 ?? 'not-found.jpg' }}" alt="">
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
                                    <li><i class="fa fa-registered"></i> {{ $product->brand->name ?? ''}}</li>
                                    <li><i class="fa fa-cog"></i> {{ $product->model->name ?? ''}} </li>
                                </ul>
                            </div>
                            <div class="car-content">
                                <div class="star">
                                    <i class="fa @if($product->rating > 0) fa-star @else fa-star-o @endif orange-color"></i>
                                    <i class="fa @if($product->rating > 1) fa-star @else fa-star-o @endif orange-color"></i>
                                    <i class="fa @if($product->rating > 2) fa-star @else fa-star-o @endif orange-color"></i>
                                    <i class="fa @if($product->rating > 3) fa-star @else fa-star-o @endif orange-color"></i>
                                    <i class="fa @if($product->rating > 4) fa-star @else fa-star-o @endif orange-color"></i>
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
@section('style')
<style>
    #Auction-products .car-item .car-list {
        bottom: 123px;
    }
</style>
@endsection
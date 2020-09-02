@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.car-background')
<!--================================= Start Compare -->
<section class="compare-page inner_pages">
    <div class="container">
        <div class="compare_info">
            <h4>Compare {{ $product[0]->name ?? '' }}, {{ $product[1]->name ?? '' }} and {{ $product[2]->name ?? '' }}</h4>
            <div class="compare_product_img">
                <div class="inventory_info_list">
                    <ul>
                        <li id="filter_toggle" class="search_other_inventory"><i class="fa fa-search" aria-hidden="true"></i> Search Other Inventory</li>
                        <li>
                            <a href="{{ route('single-car-product', $product[0]->id) }}"><img src="{{ url('/assets/products') }}/{{ $product[0]->id }}/{{ $product[0]->image1 ?? 'not-found.jpg' }}" alt="image"></a>
                        </li>
                        <li>
                            <a href="{{ route('single-car-product', $product[1]->id) }}"><img src="{{ url('/assets/products') }}/{{ $product[1]->id }}/{{ $product[0]->image1 ?? 'not-found.jpg' }}" alt="image"></a>
                        </li>
                        <li>
                            <a href="{{ route('single-car-product', $product[2]->id) }}"><img src="{{ url('/assets/products') }}/{{ $product[2]->id }}/{{ $product[0]->image1 ?? 'not-found.jpg' }}" alt="image"></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="compare_product_title gray-bg">
                <div class="inventory_info_list">
                    <ul>
                        <li class="listing_heading">Compare <br> Inventorys <span class="td_divider"></span></li>
                        <li><a href="#">{{ $product[0]->name ?? '' }}</a>
                            <p class="price">Tk.{{ $product[0]->msrp ?? '' }}</p>
                            <span class="vs">V/s</span></li>
                        <li><a href="#">{{ $product[1]->name ?? '' }}</a>
                            <p class="price">Tk.{{ $product[1]->msrp ?? '' }}</p>
                            <span class="vs">V/s</span></li>
                        <li><a href="#">{{ $product[2]->name ?? '' }}</a>
                            <p class="price">Tk.{{ $product[2]->msrp ?? '' }}</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!--=================================
End Compare -->

@endsection
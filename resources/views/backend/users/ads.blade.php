@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
	{{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.car-background')


    <!--=================================
Start Seller ad  -->

    <section class="seller-profile page-section-ptb pt-0">
        <div class="container">
            @include('layouts.frontend.profile-header', ['ad' => 'active'])
            <div class="seller-ad-area">
                @php($products = $user->products)
                @include('layouts.frontend.user-products')
            </div>
        </div>
    </section>

    <!--=================================
   End Seller ad   -->



@endsection
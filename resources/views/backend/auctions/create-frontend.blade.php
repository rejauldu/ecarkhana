@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.car-background')

<section id="about-sms">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title mb-3">
                    <h2>Auction</h2>
                    <div class="separator"></div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('products.auction.store', $product->id) }}" method="post" enctype="multipart/form-data" class="d-block">
                            @csrf
                            <div class="form-group">
                                <label for="auction-from">Starting Date:</label>
                                <input id="auction-from" type="text" class="form-control datepicker" name="auction_from" value="@if($product->auction_from) {{ date('Y/m/d', strtotime($product->auction_from)) ?? '' }} @endif" placeholder="yyyy/mm/dd" title="Starting date" autocomplete="off" required />
                            </div>
                            <div class="form-group">
                                <label for="auction-to">Ending Date</label>
                                <input id="auction-to" type="text" class="form-control datepicker" name="auction_to" value="@if($product->auction_to) {{ date('Y/m/d', strtotime($product->auction_to)) ?? '' }} @endif" placeholder="yyyy/mm/dd" title="Ending date" autocomplete="off" required />
                            </div>
                            <div class="form-group">
                                <label for="amount">Minimum Amount</label>
                                <input id="amount" type="text" class="form-control" name="auction_amount" value="{{ $product->auction_amount ?? '' }}" placeholder="Amount in BDT" title="Amount" required />
                            </div>
                            <div class="form-group mt-3">
                                <button class="btn alert-danger" type="submit">{{ __('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
@section('style')
    <link href="{{ url('/') }}/css/bootstrap-datepicker.min.css" rel="stylesheet">
@endsection
@section('script')
    <script src="{{ url('/') }}/js/bootstrap-datepicker.min.js"></script>
    <script>
        $('.datepicker').datepicker({
            autoclose:true,
            disableTouchKeyboard: true,
            todayHighlight: true,
            format: 'yyyy/mm/dd'
        });
    </script>
@endsection
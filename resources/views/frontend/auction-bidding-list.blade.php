@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
	{{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.car-background')


    <!--=================================Bidding List-->

    <section id="Bidding-list" class="bidding-listing page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bidding-area">
                        <div class="bid-info-wrap">
                            <ul>
                                <li><span>Bidders:</span>
                                    <div>{{ $bidder_product->bids->count() }}</div>
                                </li>
                                <li><span>Bids:</span>
                                    <div>{{ $product->bids->count() }}</div>
                                </li>
                                <li><span>Time Left:</span>
                                    <div>{{ $remaining[1] ?? 0 }} Hours {{ $remaining[2] ?? 0 }} Minutes {{ $remaining[3] ?? 0 }} Seconds</div>
                                </li>
                                <li><span>Duration:</span>
                                    <div>{{ $remaining[0] ?? 0 }} Days </div>
                                </li>
                            </ul>
                            <div class="bid-pera">
                                Only actual bids (not automatic bids generated up to a bidder's maximum) are shown. Automatic bids may be placed days or hours before a listing ends.
                            </div>
                        </div>
                        <div class="sms-bidding-table">
                            <table class="bidding-table-content">
                                <thead>
                                    <tr>
                                        <th class="bidding-table-title">Bidder
                                            <i class="fa fa-exclamation-circle"></i>
                                        </th>
                                        <th class="bidding-table-title">Bid Amount
                                            <i class="fa fa-money"></i>
                                        </th>
                                        <th class="bidding-table-title">Bid Time
                                            <i class="fa fa-clock-o"></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
									@php($i=0)
									@foreach($bidder_product->bids as $bid)

                                    <tr>
                                        <td class="bidding-table-details">
                                            <span class="@if($i ==0) bid-updated @endif">{{ $bid->user->email ?? '' }}</span>
                                        </td>
                                        <td class="bidding-table-details">
                                            <span class="@if($i ==0) bid-updated @endif">{{ $bid->amount ?? 0 }}</span>
                                        </td>
                                        <td class="bidding-table-details">
                                            <span class="@if($i ==0) bid-updated @endif">{{ $bid->created_at->format('jS M Y, h:i:sA') }}</span>
                                        </td>
										@php($i++)
                                    </tr>
									@endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
   Bidding List  -->

@endsection

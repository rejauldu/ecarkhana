@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
	{{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.car-background')

    <!--=================================
   Start Dealer -->
    <section class="inner_pages">
        <div class="container">
        <div class="sms-search-box">
        <form action="#" class="search-wrapper cf">
        <input type="text" placeholder="Search here..." required="">
        <button type="submit">Search</button>
    </form>
        </div>
            <div class="result-sorting-wrapper">
                <div class="sorting-count">
                    <p>1 - 6 <span>of 50 Results for your search.</span></p>
                </div>
                <div class="result-sorting-by">
                    <form action="#" method="post">
                        <div class="form-group select sorting-select">
							<select class="form-control ">
								<option>Best Sellers</option>
								<option>Newest Sellers</option>
							</select>
                        </div>
                    </form>
                </div>
            </div>
            <div class="dealers_list_wrap">
				@foreach($users as $user)
                <div class="dealers_listing">
                    <div class="row">
                        <div class="col-sm-3 col-xs-4">
                            <div class="dealer_logo">
                                <a href="#"><img src="{{ url('assets/profile') }}/{{ $user->photo }}" alt="image"></a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-8">
                            <div class="dealer_info">
                                <h5><a href="#">{{ $user->name }}</a></h5>
                                <p>{{ $user->address ?? '' }}<br>{{ $user->division->name ?? '' }}, {{ $user->phone ?? '' }}</p>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-12">
                            <div class="view_profile"> <a href="{{ route('dealer-detail', $user->id) }}" class="button red">View Profile</a>
                                <p>({{ $user->products->count() }} products)</p>
                            </div>
                        </div>
                    </div>
                </div>
				@endforeach
            </div>
            <div class="pagination-nav d-flex justify-content-center">
				{{ $users->links() }}
            </div>
        </div>
    </section>

    <!--=================================
   End Dealer -->

@endsection
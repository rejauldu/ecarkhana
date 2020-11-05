@extends('layouts.index')
@section('content')
    @include('layouts.frontend.car-background')
    <section class="seller-profile page-section-ptb pt-0">
        <div class="container my-sm-4 my-md-5">
            @include('layouts.frontend.profile-header')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>{{ json_decode($notification->data)->subject ?? '(empty)' }}</h3>
                            <p class="text-secondary">From: {{ config('app.url') }} <span
                                    class="pull-right">{{ $notification->created_at->format('jS M Y') }}</span></p>
                        </div>
                        <div class="card-body">
                            {!! json_decode($notification->data)->body ?? '(empty)' !!}
                        </div>
                        <div class="card-footer">
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-1">
                    <p class="text-secondary"><small>This notification is now viewed and you will not find any viewed
                            notification in your profile's notification list. If you think this notification is
                            important for you, you should store the link in your device.</small></p>
                </div>
            </div>
        </div>
    </section>
@endsection

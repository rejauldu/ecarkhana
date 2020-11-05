
@extends('layouts.index')

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-warning">
            {{ session()->get('message') }}
        </div>
    @endif

    @include('layouts.frontend.car-background')

    <section class="seller-profile page-section-ptb pt-0">
        <div class="container">
            @include('layouts.frontend.profile-header', ['incomplete' => 'active'])
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Order status</th>
                    <th>View</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer->name ?? $order->guest->name ?? '' }}</td>
                    <td>{{ $order->status->name ?? '' }}</td>
                    <td><a href="{{ route('orders.show', $order->id) }}" class="text-success"><i class="fa fa-eye"></i></a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>

@endsection

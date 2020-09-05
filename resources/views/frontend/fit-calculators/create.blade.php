@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.bicycle-background')
<section id="fit-calculator" class="container">
    <div class="row">
        <div class="col-sm-1 col-md-3"></div>
        <div class="col-6 col-sm-5 col-md-3">
            <div class="card bg-transparent border-0 hover-opacity-8 hover-border cursor-pointer p-3">
                <img class="card-img-top" src="{{ url('/images/bicycle/man.png') }}" alt="Male">
                <div class="card-body p-1">
                    <h4 class="text-center m-0">Male</h4>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-5 col-md-3">
            <div class="card bg-transparent border-0 hover-opacity-8 hover-border cursor-pointer p-3">
                <img class="card-img-top" src="{{ url('/images/bicycle/woman.png') }}" alt="Female">
                <div class="card-body p-1">
                    <h4 class="text-center m-0">Female</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-1 col-md-3"></div>
        <div class="col-6 col-sm-5 col-md-3">
            <div class="card bg-transparent border-0 hover-opacity-8 hover-border cursor-pointer p-3">
                <img class="card-img-top" src="{{ url('/images/bicycle/roads.png') }}" alt="Road">
                <div class="card-body p-1">
                    <h4 class="text-center m-0">Road Bicycle</h4>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-5 col-md-3">
            <div class="card bg-transparent border-0 hover-opacity-8 hover-border cursor-pointer p-3">
                <img class="card-img-top" src="{{ url('/images/bicycle/mountains.png') }}" alt="Mountain">
                <div class="card-body p-1">
                    <h4 class="text-center m-0">Mountain Bicycle</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-1 col-md-3"></div>
        <div class="col-6 col-sm-5 col-md-3">
            <div class="card bg-transparent border-0 hover-opacity-8 hover-border cursor-pointer p-3">
                <img class="card-img-top" src="{{ url('/images/bicycle/inch.png') }}" alt="Road">
                <div class="card-body p-1">
                    <h4 class="text-center m-0">Inch</h4>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-5 col-md-3">
            <div class="card bg-transparent border-0 hover-opacity-8 hover-border cursor-pointer p-3">
                <img class="card-img-top" src="{{ url('/images/bicycle/centimeter.png') }}" alt="Mountain">
                <div class="card-body p-1">
                    <h4 class="text-center m-0">Centimeter</h4>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    var vuejs = new Vue({
        el: '#fit-calculator',
        data: {
        },
        methods: {
        },
        computed: {
        },
        watch: {
        },
        created: function () {
        },
        mounted: function () {
        },
    });
</script>
@endsection
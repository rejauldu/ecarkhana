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
        <div class="col-12 col-md-3 py-4 shadow bg-white rounded">
            <div class="form-inline mb-2">
                <label for="inseam" class="w-50 m-0 nowrap text-dark font-14 font-sm-11">Actual Inseam</label>
                <input type="number" name="inseam" class="form-control m-0 w-45 pr-0 font-14 font-sm-11 bg-light" :placeholder="measurement" id="inseam" @focus="focus(0)">
            </div>
            <div class="form-inline mb-2">
                <label for="trunk" class="w-50 m-0 nowrap text-dark font-14 font-sm-11">Trunk</label>
                <input type="number" name="trunk" class="form-control m-0 w-45 pr-0 font-14 font-sm-11 bg-light" :placeholder="measurement" id="trunk" @focus="focus(1)">
            </div>
            <div class="form-inline mb-2">
                <label for="forearm" class="w-50 m-0 nowrap text-dark font-14 font-sm-11">Forearm</label>
                <input type="number" name="forearm" class="form-control m-0 w-45 pr-0 font-14 font-sm-11 bg-light" :placeholder="measurement" id="forearm" @focus="focus(2)">
            </div>
            <div class="form-inline mb-2">
                <label for="arm" class="w-50 m-0 nowrap text-dark font-14 font-sm-11">Arm</label>
                <input type="number" name="arm" class="form-control m-0 w-45 pr-0 font-14 font-sm-11 bg-light" :placeholder="measurement" id="arm" @focus="focus(3)">
            </div>
            <div class="form-inline mb-2">
                <label for="thigh" class="w-50 m-0 nowrap text-dark font-14 font-sm-11">Thigh</label>
                <input type="number" name="thigh" class="form-control m-0 w-45 pr-0 font-14 font-sm-11 bg-light" :placeholder="measurement" id="thigh" @focus="focus(4)">
            </div>
            <div class="form-inline mb-2">
                <label for="leg" class="w-50 m-0 nowrap text-dark font-14 font-sm-11">Lower leg</label>
                <input type="number" name="leg" class="form-control m-0 w-45 pr-0 font-14 font-sm-11 bg-light" :placeholder="measurement" id="leg" @focus="focus(5)">
            </div>
            <div class="form-inline mb-2">
                <label for="sternal-notch" class="w-50 m-0 nowrap text-dark font-14 font-sm-11">Sternal notch</label>
                <input type="number" name="sternal_notch" class="form-control m-0 w-45 pr-0 font-14 font-sm-11 bg-light" :placeholder="measurement" id="inseam" @focus="focus(6)">
            </div>
            <div class="form-inline mb-2">
                <label for="height" class="w-50 m-0 nowrap text-dark font-14 font-sm-11">Total height</label>
                <input type="number" name="height" class="form-control m-0 w-45 pr-0 font-14 font-sm-11 bg-light" :placeholder="measurement" id="inseam" @focus="focus(7)">
            </div>
            <div class="text-right">
                <a href="#" class="btn btn-danger m-3">Continue <i class="fa fa-angle-right ml-3"></i></a>
            </div>
            
        </div>
        <div class="col-12 col-md-6 col-xl-7">
            <div class="size-32">
                <div class="size-child">
                    <iframe class="w-100 h-100" :src="active_item.video" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div>
                <h4>@{{ active_item.name }}</h4>
                <p class="text-justify">@{{ active_item.description }}</p>
            </div>
        </div>
        <div class="col-12 col-md-3 col-xl-2">
            <div class="size-12">
                <img :src="'{{ url('images/bicycle') }}/'+active_item.image" class="img-thumbnail" />
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
            contents: @json($contents),
            page:1,
            gender: 'male',
            type: 'road',
            measurement: 'inch',
            discomfort: 'no',
            pain: 'achilles-tendon',
            active_item: {}
        },
        methods: {
            focus: function(i) {
                this.active_item = this.contents[i];
            },
            focusFirst: function() {
                document.getElementById('inseam').focus();
            }
        },
        computed: {
        },
        watch: {
        },
        created: function () {
            
        },
        mounted: function () {
            this.focusFirst();
        },
    });
</script>
@endsection
@section('style')
<style>
    .w-45 {
        width:45% !important;
    }
</style>
@endsection
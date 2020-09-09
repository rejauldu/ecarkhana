@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.bicycle-background')
<section id="fit-calculator" class="container pt-3">
    <div class="row">
        <div class="col-12 mb-3">
            <h1>Bicycle Fit Calculator</h1>
            <p>Measure Up And Get The Right Fit For You</p>
        </div>
        <div class="col-12 mb-3 bg-deep-light rounded display-6">Your Fit Summary</div>
        <div class="col-12 col-md-6 col-lg-5 col-xl-4">
            <div class="p-lg-3 h-100">
                <p class="display-6"><span class="font-weight-bold">Top Tube Length</span> <span class="float-right">55.9-56.3 Cm</span></p>
                <p class="display-6"><span class="font-weight-bold">Seat Tube Range CC</span> <span class="float-right">55.9-56.3 Cm</span></p>
                <p class="display-6"><span class="font-weight-bold">Seat Tube Range CT</span> <span class="float-right">55.9-56.3 Cm</span></p>
                <p class="display-6"><span class="font-weight-bold">Stem Length</span> <span class="float-right">55.9-56.3 Cm</span></p>
                <p class="display-6"><span class="font-weight-bold">BB Saddle Position</span> <span class="float-right">55.9-56.3 Cm</span></p>
                <p class="display-6"><span class="font-weight-bold">Saddle Handlebar</span> <span class="float-right">55.9-56.3 Cm</span></p>
                <p class="display-6"><span class="font-weight-bold">Saddle Setback</span> <span class="float-right">55.9-56.3 Cm</span></p>
                <p class="display-6"><span class="font-weight-bold">Seatpost Type</span> <span class="float-right">55.9-56.3 Cm</span></p>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-7 col-xl-8">
            <div class="mx-xl-5 px-xl-5">
                <img src="{{ url('/') }}/images/bicycle/result.png" class="w-100">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-4 mb-3">
            <div class="bg-deep-light rounded display-6 mb-3 pl-3">Your Measurements</div>
            <div class="p-lg-3 h-100">
                <p class="display-6"><span class="font-weight-bold">Actual Inseam</span> <span class="float-right">@{{ inseam }} Cm</span></p>
                <p class="display-6" v-if="tab == 'advance'"><span class="font-weight-bold">Trunk</span> <span class="float-right">@{{ trunk }} Cm</span></p>
                <p class="display-6" v-if="tab == 'advance'"><span class="font-weight-bold">Forearm</span> <span class="float-right">@{{ forearm }} Cm</span></p>
                <p class="display-6"><span class="font-weight-bold">Arm</span> <span class="float-right">@{{ arm }} Cm</span></p>
                <p class="display-6" v-if="tab == 'advance'"><span class="font-weight-bold">Thigh</span> <span class="float-right">@{{ thigh }} Cm</span></p>
                <p class="display-6" v-if="tab == 'advance'"><span class="font-weight-bold">Lower Leg</span> <span class="float-right">@{{ leg }} Cm</span></p>
                <p class="display-6" v-if="tab == 'advance'"><span class="font-weight-bold">Sternal Notch</span> <span class="float-right">@{{ sternal_notch }} Cm</span></p>
                <p class="display-6"><span class="font-weight-bold">Total Height</span> <span class="float-right">@{{ height }} Cm</span></p>
            </div>
        </div>
        <div class="col-12 col-md-4 mb-3">
            <div class="bg-deep-light rounded display-6 mb-3 pl-3">Save Results</div>
            <div class="p-lg-3 h-100">
                <p class="font-weight-bold">Never take your measurements again.</p>
                <p class="text-justify">Lose the measuring tape. Your measurements will be stored safe with us on your account page. Review and edit them at anytime.</p>
                <a href="#" class="btn btn-danger">Save <i class="fa fa-sign-in ml-lg-3"></i></a> <a href="#" class="btn btn-secondary">Download <i class="fa fa-file-pdf-o ml-lg-3"></i></a>
            </div>
        </div>
        <div class="col-12 col-md-4 mb-3">
            <div class="bg-deep-light rounded display-6 mb-3 pl-3">Email This Result</div>
            <form action="/action_page.php" class="w-100">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email" id="email">
                </div>
                <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea class="form-control" name="comment" rows="2" id="comment" placeholder="Comment"></textarea>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="subscribe" class="custom-control-input" id="subscribe">
                    <label class="custom-control-label" for="subscribe">Join our email list</label>
                </div>
                <button type="submit" class="btn btn-danger mt-2">Send <i class="fa fa-envelope ml-3"></i></button>
            </form>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    var vuejs = new Vue({
        el: '#fit-calculator',
        data: {
            contents: [],
            page:1,
            gender: "{{ $gender ?? ''}}",
            type:  "{{ $bicycle_type ?? ''}}",
            measurement:  "{{ $measurement ?? ''}}",
            discomfort: "{{ $discomfort ?? ''}}",
            pain: "{{ $pain ?? ''}}",
            inseam:{{ $inseam ?? 0 }},
            trunk:{{ $trunk ?? 0 }},
            forearm:{{ $forearm ?? 0 }},
            arm:{{ $arm ?? 0 }},
            thigh:{{ $thigh ?? 0 }},
            leg:{{ $leg ?? 0 }},
            sternal_notch:{{ $sternal_notch ?? 0 }},
            height:{{ $height ?? 0 }},
            tab:"{{ $tab ?? ''}}",
        },
        methods: {
            continues: function() {
                
            }
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
@section('style')
<style>
    .w-45 {
        width:45% !important;
    }
</style>
@endsection
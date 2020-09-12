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
        <div class="col-12 mb-3">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <div><strong>Warning:</strong> {{ $pain_detail->tips ?? '' }}</div>
            </div>
        </div>
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
            <div class="bg-deep-light rounded display-6 mb-3 pl-3">Discomfort Detail</div>
            <p class="text-justify">{{ $pain_detail->description }}</p>
        </div>
        <div class="col-12 col-md-4 mb-3">
            <div class="bg-deep-light rounded display-6 mb-3 pl-3">Causes of {{ $pain_detail->name }} Pain</div>
            <p class="text-justify">{{ $pain_detail->cause }}</p>
        </div>
        <div class="col-12 col-md-4 mb-3">
            <div class="bg-deep-light rounded display-6 mb-3 pl-3">Treatment of {{ $pain_detail->name }} Pain</div>
            <p class="text-justify">{{ $pain_detail->treatment }}</p>
        </div>
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
            <div class="bg-deep-light rounded display-6 mb-3 pl-3">Save Result</div>
            <div class="p-lg-3 h-100">
                <p class="font-weight-bold">Never take your measurements again.</p>
                <p class="text-justify">Lose the measuring tape. Your measurements will be stored safe with us on your account page. Review and edit them at anytime.</p>
                <a href="#" class="btn btn-danger">Save <i class="fa fa-sign-in ml-lg-3"></i></a> <a href="#" class="btn btn-secondary" @click.prevent="download()">Download <i class="fa fa-file-pdf-o ml-lg-3"></i></a>
            </div>
        </div>
        <div class="col-12 col-md-4 mb-3">
            <div class="bg-deep-light rounded display-6 mb-3 pl-3">Email This Result</div>
            <form action="{{ route('bicycle-fit-result') }}" class="d-block" method="post">
                @csrf
                <input type="hidden" name="url" value="{{ Request::url() }}">
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
        <div class="col-12">
            <div class="mt-5">
                <h5>Share now</h5>
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item text-center bg-facebook hover-opacity-8 p-0">
                        <a class="text-white p-0" href="https://www.facebook.com/sharer.php?u={{ Request::url() }}" target="_blank"><i class="fa fa-facebook px-3 line-height-40"></i></a>
                    </li>
                    <li class="list-group-item text-center bg-twitter hover-opacity-8 p-0">
                        <a class="text-white p-0" href="https://twitter.com/intent/tweet?text=I%20have%20calculated%20Bicycle%20fit%20for%20myself&url={{ Request::url() }}" data-size="large"><i class="fa fa-twitter px-3 line-height-40"></i></a>
                    </li>
                    <li class="list-group-item text-center bg-whatsapp hover-opacity-8 p-0">
                        <a class="text-white p-0" href="whatsapp://send?text={{ Request::url() }}" data-action="share/whatsapp/share"><i class="fa fa-whatsapp px-3 line-height-40"></i></a>
                    </li>
                    <li class="list-group-item text-center bg-linkedin hover-opacity-8 p-0">
                        <a class="text-white p-0" href="https://www.linkedin.com/shareArticle?mini=true&url={{ Request::url() }}" target="_blank"><i class="fa fa-linkedin px-3 line-height-40"></i></a>
                    </li>
                    <li class="list-group-item text-center bg-pinterest hover-opacity-8 p-0">
                        <a class="text-white p-0" href="https://pinterest.com/pin/create/button?url={{ Request::url() }}&media={{ url('/') }}/images/bicycle/result.png&description=I%20have%20calculated%20Bicycle%20fit%20for%20myself" class="pin-it-button" count-layout="horizontal"><i class="fa fa-pinterest px-3 line-height-40"></i></a>
                    </li>
                    <li class="list-group-item text-center bg-reddit hover-opacity-8 p-0">
                        <a class="text-white p-0" href="https://reddit.com/submit?url={{ Request::url() }}&title=Bicycle%20Fit" target="_blank"><i class="fa fa-whatsapp px-3 line-height-40"></i></a>
                    </li>
                </ul>
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
            download: function() {
                var url = this.gender+'-and-'+this.type+'-and-'+this.measurement+'-and-'+this.discomfort+'-and-'+this.pain+'-and-'+this.inseam+'-and-'+this.trunk+'-and-'+this.forearm+'-and-'+this.arm+'-and-'+this.thigh+'-and-'+this.leg+'-and-'+this.sternal_notch+'-and-'+this.height;
                window.location = "{{ url('/') }}/fit-result/"+url+".pdf";
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
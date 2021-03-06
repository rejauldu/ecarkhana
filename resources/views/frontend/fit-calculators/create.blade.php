@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.bicycle-background')
<section id="fit-calculator" class="container pt-0">
    <div class="row mt-2 mb-4"><div class="col-12" v-if="page>1"><a class="btn btn-light border" href="#" @click.prevent="page--"><i class="fa fa-arrow-left mr-1"></i> back</a></div></div>
    <div class="row" v-if="page == 1">
        <div class="col-12"><h3 class="text-center pb-3">Select Gender</h3></div>
        <div class="col-sm-1 col-md-3"></div>
        <div class="col-6 col-sm-5 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': gender != 'male'}" @click.prevent="gender = 'male'; page++">
                <img class="card-img-top" src="{{ url('/images/bicycle/man.png') }}" alt="Male">
                <div class="card-body p-1">
                    <div class="text-center display-6">Male</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-5 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': gender != 'female'}" @click.prevent="gender = 'female'; page++">
                <img class="card-img-top" src="{{ url('/images/bicycle/woman.png') }}" alt="Female">
                <div class="card-body p-1">
                    <div class="text-center m-0 display-6">Female</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" v-if="page == 2">
        <div class="col-12"><h3 class="text-center pb-3">Select Bicycle Type</h3></div>
        <div class="col-6 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': type != 'road'}" @click.prevent="type = 'road'; page++">
                <img class="card-img-top" src="{{ url('/images/bicycle/roads.png') }}" alt="Road">
                <div class="card-body p-1">
                    <div class="text-center m-0 display-6">Road Bicycle</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': type != 'mountain'}" @click.prevent="type = 'mountain'; page++">
                <img class="card-img-top" src="{{ url('/images/bicycle/mountains.png') }}" alt="Mountain">
                <div class="card-body p-1">
                    <div class="text-center m-0 display-6">Mountain Bicycle</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': type != 'city'}" @click.prevent="type = 'city'; page++">
                <img class="card-img-top" src="{{ url('/images/bicycle/city.png') }}" alt="City">
                <div class="card-body p-1">
                    <div class="text-center m-0 display-6">City Bicycle</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': type != 'kids'}" @click.prevent="type = 'kids'; page++">
                <img class="card-img-top" src="{{ url('/images/bicycle/kids.png') }}" alt="Kids">
                <div class="card-body p-1">
                    <div class="text-center m-0 display-6">Kids Bicycle</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" v-if="page == 3">
        <div class="col-12"><h3 class="text-center pb-3">Select Unit of Measurement</h3></div>
        <div class="col-sm-1 col-md-3"></div>
        <div class="col-6 col-sm-5 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': measurement != 'inch'}" @click.prevent="measurement = 'inch'; page++">
                <img class="card-img-top" src="{{ url('/images/bicycle/inch.png') }}" alt="Road">
                <div class="card-body p-1">
                    <div class="text-center m-0 display-6">Inch</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-5 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': measurement != 'centimeter'}" @click.prevent="measurement = 'centimeter'; page++">
                <img class="card-img-top" src="{{ url('/images/bicycle/centimeter.png') }}" alt="Mountain">
                <div class="card-body p-1">
                    <div class="text-center m-0 display-6">Centimeter</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" v-if="page == 4">
        <div class="col-12"><h3 class="text-center pb-3">Select Riding Position</h3></div>
        <div class="col-6 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': position != 'moderate'}" @click.prevent="position = 'moderate'; page++">
                <img class="card-img-top" src="{{ url('/images/bicycle/60.png') }}" alt="Moderate">
                <div class="card-body p-1">
                    <div class="text-center m-0 display-6">Moderate</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': position != 'athletic'}" @click.prevent="position = 'athletic'; page++">
                <img class="card-img-top" src="{{ url('/images/bicycle/45.png') }}" alt="Athletic">
                <div class="card-body p-1">
                    <div class="text-center m-0 display-6">Athletic</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': position != 'relaxed'}" @click.prevent="position = 'relaxed'; page++">
                <img class="card-img-top" src="{{ url('/images/bicycle/90.png') }}" alt="Relaxed">
                <div class="card-body p-1">
                    <div class="text-center m-0 display-6">Relaxed</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': position != 'aggressive'}" @click.prevent="position = 'aggressive'; page++">
                <img class="card-img-top" src="{{ url('/images/bicycle/30.png') }}" alt="Aggressive">
                <div class="card-body p-1">
                    <div class="text-center m-0 display-6">Racing Aggressive</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" v-if="page == 5">
        <div class="col-12"><h3 class="text-center pb-3">Do you have any physical discomfort?</h3></div>
        <div class="col-sm-1 col-md-3"></div>
        <div class="col-6 col-sm-5 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': discomfort != 'no'}" @click.prevent="discomfort = 'no'; continues()">
                <img class="card-img-top" src="{{ url('/images/bicycle/well.png') }}" alt="Road">
                <div class="card-body p-1">
                    <div class="text-center m-0 display-6">No</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-5 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': discomfort != 'yes'}" @click.prevent="discomfort = 'yes'; page++">
                <img class="card-img-top" src="{{ url('/images/bicycle/sick.png') }}" alt="Mountain">
                <div class="card-body p-1">
                    <div class="text-center m-0 display-6">Yes</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row text-dark" v-if="page == 6">
        <div class="col-12"><h3 class="text-center pb-3">Select Discomfort</h3></div>
        @foreach($discomforts as $discomfort)
        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <div class="card hover-opacity-8 hover-border cursor-pointer pl-3 pt-3 pr-3 my-2 bg-transparent" :class="{'border-0': !pain.includes('-{{ str_replace(" ", "", $discomfort->name) }}'), 'bg-light-secondary': pain.includes('-{{ str_replace(" ", "", $discomfort->name) }}')}" @click.prevent="painSelected('-{{ str_replace(" ", "", $discomfort->name) }}')" data-toggle="tooltip" title="{{ $discomfort->description }}">
                <img class="card-img-top img-thumbnail" src="{{ url('/images/bicycle/discomforts/') }}/{{ $discomfort->image }}" alt="{{ $discomfort->name }}">
                <div class="card-body p-1">
                    <div class="text-center">{{ $discomfort->name }}</div>
                </div>
                
            </div>
        </div>
        @endforeach
        <div class="col-12 text-right">
            <a href="#" class="btn btn-danger mr-5" @click.prevent="continues()">Continue <i class="fa fa-arrow-right ml-3"></i></a>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    var vuejs = new Vue({
        el: '#fit-calculator',
        data: {
            page:1,
            gender: 'male',
            type: 'road',
            measurement: 'inch',
            position: 'moderate',
            discomfort: 'no',
            pain: ''
        },
        methods: {
            painSelected: function(p) {
                if(!this.pain.includes(p)) {
                    this.pain += p;
                } else {
                    this.pain = this.pain.replace(p, '');
                }
            },
            continues: function() {
                if(this.discomfort == 'no')
                    this.pain = '-well';
                var url = this.gender+'-and-'+this.type+'-and-'+this.measurement+'-and-'+this.position+'-and-'+this.discomfort+'-and'+this.pain;
                window.location = "{{ url('/') }}/fit-calculator/"+url;
            } 
        },
        computed: {
        },
        watch: {
            page() {
                if(this.page == 6) {
                    Vue.nextTick(function () {
                        $('[data-toggle="tooltip"]').tooltip({animation: true, delay: {show: 1500, hide: 100}, html: true});
                    });
                }
            }
        },
        created: function () {
        },
        mounted: function () {
        },
    });
    
</script>
@endsection
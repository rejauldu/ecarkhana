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
            <a class="btn btn-link text-danger" href="#" :class="{'text-light-secondary':tab!='basic'}" @click.prevent="tab='basic'">Basic Inputs</a>
            <a class="btn btn-link text-danger" href="#" :class="{'text-light-secondary':tab!='advance'}" @click.prevent="tab='advance'">Advance Inputs</a>
        </div>
        <div class="col-12 col-md-3 py-4 shadow bg-white rounded">
            <div class="form-inline mb-2">
                <label for="inseam" class="w-50 m-0 nowrap text-dark font-14 font-sm-11">Actual Inseam</label>
                <input type="number" name="inseam" class="form-control m-0 w-45 pr-0 font-14 font-sm-11 bg-light" :placeholder="measurement" id="inseam" @focus="focus(0)" v-model="inseam">
                <div class="invalid-feedback w-45 ml-auto mr-2 nowrap" :class="{'d-block':!inseam && error}">Please fill out this field.</div>
            </div>
            <div class="form-inline mb-2" v-if="tab=='advance'">
                <label for="trunk" class="w-50 m-0 nowrap text-dark font-14 font-sm-11">Trunk</label>
                <input type="number" name="trunk" class="form-control m-0 w-45 pr-0 font-14 font-sm-11 bg-light" :placeholder="measurement" id="trunk" @focus="focus(1)" v-model="trunk">
                <div class="invalid-feedback w-45 ml-auto mr-2 nowrap" :class="{'d-block':!trunk && error}">Please fill out this field.</div>
            </div>
            <div class="form-inline mb-2" v-if="tab=='advance'">
                <label for="forearm" class="w-50 m-0 nowrap text-dark font-14 font-sm-11">Forearm</label>
                <input type="number" name="forearm" class="form-control m-0 w-45 pr-0 font-14 font-sm-11 bg-light" :placeholder="measurement" id="forearm" @focus="focus(2)" v-model="forearm">
                <div class="invalid-feedback w-45 ml-auto mr-2 nowrap" :class="{'d-block':!forearm && error}">Please fill out this field.</div>
            </div>
            <div class="form-inline mb-2">
                <label for="arm" class="w-50 m-0 nowrap text-dark font-14 font-sm-11">Arm</label>
                <input type="number" name="arm" class="form-control m-0 w-45 pr-0 font-14 font-sm-11 bg-light" :placeholder="measurement" id="arm" @focus="focus(3)" v-model="arm">
                <div class="invalid-feedback w-45 ml-auto mr-2 nowrap" :class="{'d-block':!arm && error}">Please fill out this field.</div>
            </div>
            <div class="form-inline mb-2" v-if="tab=='advance'">
                <label for="thigh" class="w-50 m-0 nowrap text-dark font-14 font-sm-11">Thigh</label>
                <input type="number" name="thigh" class="form-control m-0 w-45 pr-0 font-14 font-sm-11 bg-light" :placeholder="measurement" id="thigh" @focus="focus(4)" v-model="thigh">
                <div class="invalid-feedback w-45 ml-auto mr-2 nowrap" :class="{'d-block':!thigh && error}">Please fill out this field.</div>
            </div>
            <div class="form-inline mb-2" v-if="tab=='advance'">
                <label for="leg" class="w-50 m-0 nowrap text-dark font-14 font-sm-11">Lower leg</label>
                <input type="number" name="leg" class="form-control m-0 w-45 pr-0 font-14 font-sm-11 bg-light" :placeholder="measurement" id="leg" @focus="focus(5)" v-model="leg">
                <div class="invalid-feedback w-45 ml-auto mr-2 nowrap" :class="{'d-block':!leg && error}">Please fill out this field.</div>
            </div>
            <div class="form-inline mb-2" v-if="tab=='advance'">
                <label for="sternal-notch" class="w-50 m-0 nowrap text-dark font-14 font-sm-11">Sternal notch</label>
                <input type="number" name="sternal_notch" class="form-control m-0 w-45 pr-0 font-14 font-sm-11 bg-light" :placeholder="measurement" id="sternal-notch" @focus="focus(6)" v-model="sternal_notch">
                <div class="invalid-feedback w-45 ml-auto mr-2 nowrap" :class="{'d-block':!sternal_notch && error}">Please fill out this field.</div>
            </div>
            <div class="form-inline mb-2">
                <label for="height" class="w-50 m-0 nowrap text-dark font-14 font-sm-11">Total height</label>
                <input type="number" name="height" class="form-control m-0 w-45 pr-0 font-14 font-sm-11 bg-light" :placeholder="measurement" id="height" @focus="focus(7)" v-model="height">
                <div class="invalid-feedback w-45 ml-auto mr-2 nowrap" :class="{'d-block':!height && error}">Please fill out this field.</div>
            </div>
            <div class="text-right">
                <a href="#" class="btn btn-danger m-3" @click.prevent="continues()">Continue <i class="fa fa-angle-right ml-3"></i></a>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-7">
            <div class="size-32">
                <div class="size-child">
                    <iframe class="w-100 h-100" :src="active_item.video" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="mt-4">
                <h4>@{{ active_item.name }}</h4>
                <p class="text-justify">@{{ active_item.description }}</p>
            </div>
        </div>
        <div class="col-12 col-md-3 col-xl-2">
            <div class="size-12">
                <img :src="'{{ url('images/bicycle') }}/'+active_item.image" class="img-thumbnail"/>
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
            gender: "{{ $gender }}",
            type:  "{{ $type }}",
            measurement:  "{{ $measurement }}",
            discomfort: "{{ $discomfort }}",
            pain: "{{ $pain }}",
            inseam:'',
            trunk:'',
            forearm:'',
            arm:'',
            thigh:'',
            leg:'',
            sternal_notch:'',
            height:'',
            active_item: {},
            tab:'advance',
            error: false
        },
        methods: {
            focus: function(i) {
                this.active_item = this.contents[i];
            },
            focusFirst: function() {
                document.getElementById('inseam').focus();
            },
            continues: function() {
                this.error = true;
                if(this.gender && this.type && this.measurement && this.discomfort && this.pain && this.inseam && this.arm && this.height) {
                    if(this.tab == 'advance') {
                        if(!(this.trunk && this.forearm && this.thigh && this.leg && this.sternal_notch)) {
                            return false;
                        }
                    }
                } else {
                    return false;
                }
                        
                var url = this.gender+'-and-'+this.type+'-and-'+this.measurement+'-and-'+this.discomfort+'-and-'+this.pain+'-and-'+this.inseam+'-and-'+this.trunk+'-and-'+this.forearm+'-and-'+this.arm+'-and-'+this.thigh+'-and-'+this.leg+'-and-'+this.sternal_notch+'-and-'+this.height;
                if(this.tab == 'basic')
                    url = this.gender+'-and-'+this.type+'-and-'+this.measurement+'-and-'+this.discomfort+'-and-'+this.pain+'-and-'+this.inseam+'-and-'+this.arm+'-and-'+this.height;
                window.location = "{{ url('/') }}/fit-calculator/"+url;
                
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
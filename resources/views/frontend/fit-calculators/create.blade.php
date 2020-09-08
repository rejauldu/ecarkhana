@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.bicycle-background')
<section id="fit-calculator" class="container">
    <div class="row" v-if="page == 1">
        <div class="col-12"><h3 class="text-center pb-3">Select Gender</h3></div>
        <div class="col-sm-1 col-md-3"></div>
        <div class="col-6 col-sm-5 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': gender != 'male'}" @click.prevent="gender = 'male'; page++">
                <img class="card-img-top" src="{{ url('/images/bicycle/man.png') }}" alt="Male">
                <div class="card-body p-1">
                    <h4 class="text-center m-0">Male</h4>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-5 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': gender != 'female'}" @click.prevent="gender = 'female'; page++">
                <img class="card-img-top" src="{{ url('/images/bicycle/woman.png') }}" alt="Female">
                <div class="card-body p-1">
                    <h4 class="text-center m-0">Female</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row" v-if="page == 2">
        <div class="col-12"><h3 class="text-center pb-3">Select Bicycle Type</h3></div>
        <div class="col-sm-1 col-md-3"></div>
        <div class="col-6 col-sm-5 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': type != 'road'}" @click.prevent="type = 'road'; page++">
                <img class="card-img-top" src="{{ url('/images/bicycle/roads.png') }}" alt="Road">
                <div class="card-body p-1">
                    <h4 class="text-center m-0">Road Bicycle</h4>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-5 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': type != 'mountain'}" @click.prevent="type = 'mountain'; page++">
                <img class="card-img-top" src="{{ url('/images/bicycle/mountains.png') }}" alt="Mountain">
                <div class="card-body p-1">
                    <h4 class="text-center m-0">Mountain Bicycle</h4>
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
                    <h4 class="text-center m-0">Inch</h4>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-5 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': gender != 'centimeter'}" @click.prevent="measurement = 'centimeter'; page++">
                <img class="card-img-top" src="{{ url('/images/bicycle/centimeter.png') }}" alt="Mountain">
                <div class="card-body p-1">
                    <h4 class="text-center m-0">Centimeter</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row" v-if="page == 4">
        <div class="col-12"><h3 class="text-center pb-3">Do you have any physical discomfort?</h3></div>
        <div class="col-sm-1 col-md-3"></div>
        <div class="col-6 col-sm-5 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': discomfort != 'no'}" @click.prevent="discomfort = 'no'">
                <img class="card-img-top" src="{{ url('/images/bicycle/well.png') }}" alt="Road">
                <div class="card-body p-1">
                    <h4 class="text-center m-0">No</h4>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-5 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': discomfort != 'yes'}" @click.prevent="discomfort = 'yes'; page++">
                <img class="card-img-top" src="{{ url('/images/bicycle/sick.png') }}" alt="Mountain">
                <div class="card-body p-1">
                    <h4 class="text-center m-0">Yes</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row text-dark" v-if="page == 5">
        <div class="col-12"><h3 class="text-center pb-3">Select Discomfort</h3></div>
        <div class="col-6 col-sm-4 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': pain != 'achilles-tendon'}" @click.prevent="pain = 'achilles-tendon'">
                <img class="card-img-top img-thumbnail" src="{{ url('/images/bicycle/discomforts/Achilles-Tendon.jpg') }}" alt="Achilles Tendon">
                <div class="card-body p-1">
                    <div class="text-center">Achilles Tendon</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-4 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': pain != 'ankles'}" @click.prevent="pain = 'ankles'">
                <img class="card-img-top img-thumbnail" src="{{ url('/images/bicycle/discomforts/Ankles_.jpg') }}" alt="Ankles">
                <div class="card-body p-1">
                    <div class="text-center">Ankles</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-4 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': pain != 'knees'}" @click.prevent="pain = 'knees'">
                <img class="card-img-top img-thumbnail" src="{{ url('/images/bicycle/discomforts/Knees.jpg') }}" alt="Knees">
                <div class="card-body p-1">
                    <div class="text-center">Knees</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-4 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': pain != 'feet'}" @click.prevent="pain = 'feed'">
                <img class="card-img-top img-thumbnail" src="{{ url('/images/bicycle/discomforts/Feet_.jpg') }}" alt="Feet">
                <div class="card-body p-1">
                    <div class="text-center">Feet</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-4 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': pain != 'bottom'}" @click.prevent="pain = 'bottom'">
                <img class="card-img-top img-thumbnail" src="{{ url('/images/bicycle/discomforts/Bottom.jpg') }}" alt="Bottom">
                <div class="card-body p-1">
                    <div class="text-center">Bottom</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-4 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': pain != 'hip'}" @click.prevent="pain = 'hip'">
                <img class="card-img-top img-thumbnail" src="{{ url('/images/bicycle/discomforts/hip.jpg') }}" alt="Hip">
                <div class="card-body p-1">
                    <div class="text-center">Hip</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-4 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': pain != 'back'}" @click.prevent="pain = 'back'">
                <img class="card-img-top img-thumbnail" src="{{ url('/images/bicycle/discomforts/Back.jpg') }}" alt="Back">
                <div class="card-body p-1">
                    <div class="text-center">Back</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-4 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': pain != 'fingers'}" @click.prevent="pain = 'fingers'">
                <img class="card-img-top img-thumbnail" src="{{ url('/images/bicycle/discomforts/Fingers.jpg') }}" alt="Fingers">
                <div class="card-body p-1">
                    <div class="text-center">Fingers</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-4 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': pain != 'neck'}" @click.prevent="pain = 'neck'">
                <img class="card-img-top img-thumbnail" src="{{ url('/images/bicycle/discomforts/Neck.jpg') }}" alt="Neck">
                <div class="card-body p-1">
                    <div class="text-center">Neck</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-4 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': pain != 'shoulders'}" @click.prevent="pain = 'shoulders'">
                <img class="card-img-top img-thumbnail" src="{{ url('/images/bicycle/discomforts/Shoulders.jpg') }}" alt="Shoulders">
                <div class="card-body p-1">
                    <div class="text-center">Shoulders</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-4 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': pain != 'thighs'}" @click.prevent="pain = 'thighs'">
                <img class="card-img-top img-thumbnail" src="{{ url('/images/bicycle/discomforts/Thighs.jpg') }}" alt="Thighs">
                <div class="card-body p-1">
                    <div class="text-center">Thighs</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-4 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': pain != 'wrists'}" @click.prevent="pain = 'wrists'">
                <img class="card-img-top img-thumbnail" src="{{ url('/images/bicycle/discomforts/Wrists.jpg') }}" alt="Wrists">
                <div class="card-body p-1">
                    <div class="text-center">Wrists</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-4 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': pain != 'muscles'}" @click.prevent="pain = 'muscles'">
                <img class="card-img-top img-thumbnail" src="{{ url('/images/bicycle/discomforts/Muscles.jpg') }}" alt="Muscles">
                <div class="card-body p-1">
                    <div class="text-center">Muscles</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-4 col-md-3">
            <div class="card bg-transparent hover-opacity-8 hover-border cursor-pointer p-3" :class="{'border-0': pain != 'hands'}" @click.prevent="pain = 'hands'">
                <img class="card-img-top img-thumbnail" src="{{ url('/images/bicycle/discomforts/Hands.jpg') }}" alt="Hands">
                <div class="card-body p-1">
                    <div class="text-center">Hands</div>
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
            page:1,
            gender: 'male',
            type: 'road',
            measurement: 'inch',
            discomfort: 'no',
            pain: 'achilles-tendon'
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
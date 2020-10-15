@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.motorcycle-background')


<!--=================================
checkout-listing  -->
<section class="bike-checkout" id="checkout">
    <div class="checkout-area">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="coupon-accordion">
                        @guest
                        <!-- ACCORDION START -->
                        <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
                        <div id="checkout-login" class="coupon-content" style="display: none;">
                            <div class="coupon-info">
                                <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est sit amet ipsum luctus.</p>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <p class="form-row-first">
                                        <label>Email <span class="required">*</span></label>
                                        <input type="email" name="email">
                                    </p>
                                    <p class="form-row-last">
                                        <label>Password  <span class="required">*</span></label>
                                        <input type="password" name="password">
                                    </p>
                                    <p class="form-row">
                                        <input type="submit" value="Login">
                                        <label>
                                            <input type="checkbox" name="remember">
                                            Remember me 
                                        </label>
                                    </p>
                                    <p class="lost-password">
                                        <a href="{{ route('password.request') }}">Lost your password?</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                        <!-- ACCORDION END -->
                        @endguest
                    </div>
                </div>
            </div>
            <form class="d-block" action="{{ route('insurance-checkout-store', $insurance->id) }}" method="post">
                @csrf
                <div class="row sms-checkout-form">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="checkbox-form">
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Name <span class="required">*</span></label>
                                        <input type="text" name="name" value="{{ $profile->name ?? '' }}" placeholder="Enter your name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="billing-division">City</label>
                                        <select id="billing-division" name="billing_division_id" class="custom-select">
                                            <option value="0" selected>--Select city--</option>
                                            @foreach($divisions as $division)
                                            <option value="{{ $division->id }}" @if(isset($profile) && $profile->billing_division && $division->id == $profile->billing_division->id) selected @endif>{{ $division->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="billing-region">Region</label>
                                        <select id="billing-region" name="billing_region_id" class="custom-select">
                                            @if(isset($profile))
                                            <option value="{{ $profile->billing_region->id ?? 0 }}" selected>{{ $profile->billing_region->name ?? '--Select billing_region--'}}</option>
                                            @else
                                            <option value="0">--Select billing_region--</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="ad">Address</label>
                                            <textarea class="form-control" name="billing_address" placeholder="Enter Address" title="Enter you Address">{{ $profile->billing_address ?? ''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input type="email" value="{{ $profile->email ?? '' }}" readonly="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone<span class="required">*</span></label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text btn btn-link bg-white border-right-0 text-dark pr-0">+88</span>
                                            </div>
                                            <input type="text" class="form-control border-left-0 pl-0" :class="{'opacity-5': otp_sent, 'border-right-0': phone != new_phone && isPhoneValid()}" name="phone" id="phone" v-model="new_phone" :disabled="otp_sent || otp_verified">
                                            <div class="input-group-append">
                                                <a class="input-group-text btn btn-link bg-white border-left-0 text-secondary" href="#" v-if="!isPhoneValid()"><i class="fa fa-phone"></i></a>
                                                <a class="input-group-text btn btn-link bg-white border-left-0 text-success" href="#" v-else-if="isPhoneValid() && !phone_verified && !otp_sent && phone != new_phone" @click.prevent="sendOtp">Verify Now</a>
                                                <span class="input-group-text btn bg-white border-left-0 text-secondary" v-else-if="!otp_sent && phone != new_phone">Invalid</span>
                                                <a class="input-group-text btn bg-white border-left-0 text-danger" href="#" v-else-if="!otp_verified && phone != new_phone">@{{ countDown }}</a>
                                                <span class="input-group-text btn bg-white border-left-0 text-success" v-else>Verified</span>
                                            </div>
                                            <div class="position-center" v-if="otp_sent && !otp_verified"><i class="fa fa-spinner fa-spin text-dark"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group" v-if="otp_sent">
                                        <label for="otp">OTP:</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" :class="{'opacity-5': otp.length == 4}" placeholder="OTP" id="otp" v-model="otp" :disabled="otp.length == 4 || otp_verified">
                                            <div class="input-group-append">
                                                <span class="input-group-text btn bg-white border-left-0 text-danger" v-if="otp.length != 4 && !otp_verified">Must be 4 digit</span>
                                                <span class="input-group-text btn bg-white border-left-0 text-success" v-else-if="otp_verified">OTP Verified</span>
                                            </div>
                                            <div class="position-center" v-if="otp.length == 4"><i class="fa fa-spinner fa-spin text-dark"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list create-acc">
                                    <input id="cbox" type="checkbox" name="create_account" value="1">
                                    <label for="cbox">Create an account?</label>
                                </div>
                            </div>
                            <div class="different-address">
                                <div class="ship-different-title">
                                    <h3>
                                        <label for="ship-box">Ship to a different address?</label>
                                        <input id="ship-box" name="different_shipping" type="checkbox" value="true">
                                    </h3>
                                </div>
                                <div id="ship-box-info" class="row" style="display: none;">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="shipping-division">City</label>
                                            <select id="shipping-division" name="shipping_division_id" class="custom-select">
                                                <option value="0" selected>--Select city--</option>
                                                @foreach($divisions as $division)
                                                <option value="{{ $division->id }}" @if(isset($profile) && $profile->shipping_division && $division->id == $profile->shipping_division->id) selected @endif>{{ $division->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="shipping-region">Region</label>
                                            <select id="shipping-region" name="shipping_region_id" class="custom-select">
                                                @if(isset($profile))
                                                <option value="{{ $profile->shipping_region->id ?? 0 }}" selected>{{ $profile->shipping_region->name ?? '--Select shipping_region--'}}</option>
                                                @else
                                                <option value="0">--Select shipping_region--</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="ad">Address</label>
                                                <textarea class="form-control" name="shipping_address" placeholder="Enter Address" title="Enter you Address">{{ $profile->shipping_address ?? ''}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="breakdown-content">
                            <div class="some_random_class">
                                <div class="single-block">
                                    <div class="block-term">
                                        <span>Type</span>
                                    </div>
                                    <div class="block-detail">
                                        <span>@{{ type }}</span>
                                    </div>
                                </div>
                                <div class="single-block">
                                    <div class="block-term">
                                        <span>Insurance Provider Company</span>
                                    </div>
                                    <div class="block-detail">
                                        <span>@{{ company.name }}</span>
                                    </div>
                                </div>
                                <div class="single-block">
                                    <div class="block-term">
                                        <span>CC Type</span>
                                    </div>
                                    <div class="block-detail">
                                        <span>@{{ displacement.name }} cc</span>
                                    </div>
                                </div>
                                <div class="single-block" v-if="type == types[1]">
                                    <div class="block-term">
                                        <span>Sum Insured</span>
                                    </div>
                                    <div class="block-detail">
                                        <span>Tk. @{{ price }}</span>
                                    </div>
                                </div>
                                <div class="single-block has-full-line" v-if="type == types[1]">
                                    <div class="block-term">
                                        <span></span>
                                    </div>
                                    <div class="block-detail">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="single-block" v-if="type == types[1] && company.total_rate">
                                    <div class="block-term">
                                        <span>Basic</span>
                                    </div>
                                    <div class="block-detail">
                                        <span>Tk. @{{ displacement.basic }}</span>
                                    </div>
                                </div>
                                <div class="single-block" v-if="type == types[1]">
                                    <div class="block-term">
                                        <span>+ @{{ company.total_rate.toFixed(2) }}% of full value</span>
                                    </div>
                                    <div class="block-detail">
                                        <span>Tk. @{{ price*company.total_rate.toFixed(2)/100 }}</span>
                                    </div>
                                </div>
                                <div class="single-block">
                                    <div class="block-term">
                                        <span>Own Damage</span>
                                    </div>
                                    <div class="block-detail">
                                        <span>Tk. @{{ ownDamage(company) }}</span>
                                    </div>
                                </div>
                                <div class="single-block">
                                    <div class="block-term">
                                        <span>Act Liabilities</span>
                                    </div>
                                    <div class="block-detail">
                                        <span>Tk. @{{ displacement.act_liability }}</span>
                                    </div>
                                </div>
                                <div class="single-block">
                                    <div class="block-term">
                                        <span>+ @{{ passenger }} Passenger @ 45</span>
                                    </div>
                                    <div class="block-detail">
                                        <span>Tk. @{{ passenger*45 }}</span>
                                    </div>
                                </div>
                                <div class="single-block">
                                    <div class="block-term">
                                        <span>+ 1 Driver</span>
                                    </div>
                                    <div class="block-detail">
                                        <span>Tk. 30</span>
                                    </div>
                                </div>
                                <div class="single-block has-half-line">
                                    <div class="block-term">
                                        <span></span>
                                    </div>
                                    <div class="block-detail">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="single-block">
                                    <div class="block-term">
                                        <span>Net Premium</span>
                                    </div>
                                    <div class="block-detail">
                                        <span>Tk. @{{ netPremium(company) }}</span>
                                    </div>
                                </div>
                                <div class="single-block">
                                    <div class="block-term">
                                        <span>+ 15% Vat</span>
                                    </div>
                                    <div class="block-detail">
                                        <span>Tk. @{{ netPremium(company)*15/100 }}</span>
                                    </div>
                                </div>
                                <div class="single-block has-full-line">
                                    <div class="block-term">
                                        <span></span>
                                    </div>
                                    <div class="block-detail">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="single-block">
                                    <div class="block-term">
                                        <span>Total Premium</span>
                                    </div>
                                    <div class="block-detail">
                                        <span>Tk. @{{ totalPremium(company) }}</span>
                                    </div>
                                </div>
                                <div class="single-block">
                                    <div class="block-term">
                                        <span>+ Service Delivery Cost</span>
                                    </div>
                                    <div class="block-detail">
                                        <span>Tk. 40</span>
                                    </div>
                                </div>
                                <div class="single-block has-full-line">
                                    <div class="block-term">
                                        <span></span>
                                    </div>
                                    <div class="block-detail">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="single-block">
                                    <div class="block-term">
                                        <span>Grand Total</span>
                                    </div>
                                    <div class="block-detail">
                                        <span>Tk. @{{ grandTotal(company) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" class="btn button red" value="Update" :disabled="!(phone == new_phone && phone_verified)"/>
                    </div>
                </div>
            </form>
        </div>
    </div>

</section>

<!--=================================checkout-listing  -->
@endsection
@section('script')
<script>
    var vuejs = new Vue({
        el: '#checkout',
        data: {
            category: '',
            brand: {},
            model:  {},
            type: '',
            types: ['Act Liabilities / Third Party Insurance', 'Comprehensive / First Party Insurance'],
            displacement: {},
            passenger: 1,
            price: '',
            company: {},
            companies: @json($insurance_companies),
            coverages: @json($coverages),
            features: @json($insurance_features),
            phone: localStorage.verified_phone?localStorage.verified_phone:'',
            new_phone: '{{ $profile->phone ?? "" }}',
            otp: '',
            otp_sent: false,
            otp_verified: false,
            phone_verified: localStorage.phone_verified?true:false,
            countDown: 60
        },
        methods: {
            getFromStorage: function() {
                if (localStorage.category)
                    this.category = JSON.parse(localStorage.category);
                if (localStorage.brand)
                    this.brand = JSON.parse(localStorage.brand);
                if (localStorage.model)
                    this.model = JSON.parse(localStorage.model);
                if (localStorage.type)
                    this.type = localStorage.type;
                if (localStorage.displacement)
                    this.displacement = JSON.parse(localStorage.displacement);
                if (localStorage.passenger)
                    this.passenger = localStorage.passenger;
                if (localStorage.price)
                    this.price = localStorage.price;
                if (localStorage.company)
                    this.company = JSON.parse(localStorage.company);
            },
            coverageStringToArray: function() {
                for(let i=0; i<this.companies.length; i++) {
                    this.companies[i].basic_coverage = this.companies[i].basic_coverage.split(',');
                    this.companies[i].insurance_feature = this.companies[i].insurance_feature.split(',');
                }
            },
            openModal: function(company) {
                this.company = company;
                
                $('#insurance-company-modal').modal('show');
            },
            formSubmit: function(company) {
                this.company = company;
                Vue.nextTick(function() {
                    vuejs.$refs.form.submit();
                });
            },
            ownDamage: function(c) {
                if(this.type == this.types[1])
                    return this.displacement.basic + this.price*c.total_rate/100;
                else
                    return 0;
            },
            netPremium: function(c) {
                return this.ownDamage(c) + this.displacement.act_liability + this.passenger*45 + 30;
            },
            totalPremium: function(c) {
                return this.netPremium(c) + this.netPremium(c) * 15/100;
            },
            grandTotal: function(c) {
                return this.totalPremium(c) + 40;
            },
            calculateRate: function() {
                for(let c = 0; c < this.companies.length; c++) {
                    this.companies[c].total_rate = 0;
                    for(let i = 0; i < this.companies[c].basic_coverage.length; i++) {
                        for(let j=0; j<this.coverages.length; j++) {
                            if(this.companies[c].basic_coverage[i] == this.coverages[j].id) {
                                this.companies[c].total_rate += Number(this.coverages[j].rate);
                                break;
                            }
                        }
                    }
                }
            },
            isPhoneValid: function () {
                var pattern = /(^(\+88|0088)?(01){1}[356789]{1}(\d){8,9})$/;
                return pattern.test(this.new_phone);
            },
            sendOtp: function () {
                var _this = this;
                this.countDown = 60;
                this.countDownTimer();
                $.ajax({
                    url: "{{ route('send-otp') }}",
                    data: {"phone":this.new_phone, "_token":"{{ csrf_token() }}"},
                    type: "post",
                    success: function(result){
                        _this.otp = '';
                        _this.otp_sent = true;
                    }
                });
            },
            countDownTimer() {
                if (this.countDown > 0) {
                    setTimeout(() => {
                        this.countDown -= 1;
                        this.countDownTimer();
                    }, 1000)
                } else {
                    this.otp_sent = false;
                }
            },
            verifyOtp: function() {
                var _this = this;
                $.ajax({
                    url: "{{ route('verify-otp') }}",
                    data: {"phone":this.new_phone, "otp":this.otp, "_token":"{{ csrf_token() }}"},
                    type: "post",
                    success: function(result) {
                        if (result == 'success') {
                            _this.otp_verified = true;
                            _this.otp = '';
                            localStorage.phone_verified = 1;
                            localStorage.verified_phone = _this.new_phone;
                            _this.phone = _this.new_phone;
                            _this.phone_verified = true;
                        }
                    }
                });
            },
        },
        computed: {
            
        },
        watch: {
            otp() {
              if(this.otp.length > 3)
                this.verifyOtp();
            }
        },
        created: function() {
            this.calculateRate();
        },
        mounted: function() {
            this.getFromStorage();
            this.coverageStringToArray();
        },
    });
</script>
@endsection

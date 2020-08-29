@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.car-background')


<section id="insurance-photos">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-content" id="app2">
                        <form action="{{ route('insurances.update', $insurance->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label for="name">Registration copy (Front side)</label>
                                    <input type="file" id="registration-copy-front" name="registration_copy_front" class="form-control bg-theme text-white" onchange="displayPhotoOnSelect(this, 'front-view')" accept="image/*" value="Upload image" @if(!isset($insurance->registration_copy_front)) required @endif/>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="col-6 form-group">
                                    <img id="front-view" src="{{ asset('/assets/insurances') }}/{{ $insurance->registration_copy_front ?? 'not-found.jpg' }}" class="img-thumbnail width-50 height-50 mt-3" alt="Product">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label for="name">Registration copy (Back side)</label>
                                    <input type="file" id="registration-copy-back" name="registration_copy_back" class="form-control bg-theme text-white" onchange="displayPhotoOnSelect(this, 'back-view')" accept="image/*" value="Upload image" @if(!isset($insurance->registration_copy_back)) required @endif/>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="col-6 form-group">
                                    <img id="back-view" src="{{ asset('/assets/insurances') }}/{{ $insurance->registration_copy_back ?? 'not-found.jpg' }}" class="img-thumbnail width-50 height-50 mt-3" alt="Product">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label for="name">Previous Insurance copy (If Any)</label>
                                    <input type="file" id="previous-copy" name="previous_copy" class="form-control bg-theme text-white" onchange="displayPhotoOnSelect(this, 'photo-view')" accept="image/*" value="Upload image"/>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="col-6 form-group">
                                    <img id="photo-view" src="{{ asset('/assets/insurances') }}/{{ $insurance->previous_copy ?? 'not-found.jpg' }}" class="img-thumbnail width-50 height-50 mt-3" alt="Product">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="note">Additional Informations</label>
                                <textarea name="note" class="form-control editor-tools" rows="5" id="note" required>{!! $product->note ?? '' !!}</textarea>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <button type="submit" class="button is-info">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
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
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    var vuejs = new Vue({
        el: '#insurance-photos',
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
            features: @json($insurance_features)
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
            }
        },
        computed: {
            
        },
        watch: {
            
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
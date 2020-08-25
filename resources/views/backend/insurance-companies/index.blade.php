@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.car-background')


<!--=================================
Start Car Loan  Eligibility check-->

<section class="Car-eligibility-check page-section-ptb" id="insurance-company">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h4>We Have Found @{{ companies.length }} Vehicle Loan of Amount 10.00 Lac (BDT) for 5 Years </h4>
                    <div class="separator"></div>
                </div>
            </div>
        </div>
        <div class="row insurance-area pb-5 border border-left-0 border-top-0 border-right-0" v-for="c in companies">
            <div class="col-md-2">
                <div class="card  border-0  align-items-center">
                    <div class="card-image mt-0"><img class=" " :src="'/assets/insurance-company/'+c.logo" style="width: 160px; max-width: 160px;">
                    </div>
                    <a class="btn button red" href="#" @click.prevent="formSubmit(c)">Buy @Tk.@{{ grandTotal }}</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card border-0">
                    <div class="row">
                        <div class="col">
                            <h4 class=" fz-22  pb-3 " style="text-align: center">@{{ c.name }}</h4>
                            <hr class=" mt-0 mb-0" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col border-right border-left-0 border-top-0 border-bottom-0 border-dashed text-center pt-2">
                            <ul class="list-group list-group-flush bullet">
                                <li class="list-group-item py-1 text-justify" v-for="coverage in coverages" v-if="c.basic_coverage.includes(coverage.id.toString())">@{{ coverage.name }}</li>
                            </ul>
                        </div>
                        <div class="col text-center pt-2">
                            <ul class="list-group list-group-flush bullet">
                                <li class="list-group-item py-1 text-justify" v-for="feature in features" v-if="c.insurance_feature.includes(feature.id.toString())">@{{ feature.name }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="table-grid-1 border-left border-top-0 border-bottom-0 border-right-0 border-dashed col">
                    <div class="card full-height d-flex align-items-center justify-content-center border-0 align-items-center justify-content-streatch">
                        <div class="coverage">
                            <div class="cover-circle">
                                <div>
                                    <span class="cover__title" v-if="c">@{{ c.basic_coverage.length }}</span>Covers
                                </div>
                            </div>
                        </div>
                        <button class="required" @click.prevent="openModal(c)"><span v-if="type == types[1]">Add Coverage</span><span v-else>View Pricing</span></button>
                        <button class="quick-details"><span>Quick Details</span><i class="fa fa-plus-square" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>

            <div class="card-features border-top border-dashed mt-0 " style="display: none;">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card border-0">
                            <h5 class="features-art pb-2">Fees &amp; Charges</h5>
                            <div>
                                <p>Processing Fee: 1% of the approved loan amount</p>
                                <p>Early Adjustment Fee: 2% of outstanding amount</p>
                                <p>Partial Payment Fee: 2% of the prepayment amount</p>
                                <p>Penal Charge: 2% on the arrears amount.&nbsp;</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="card border-0">
                            <h5 class="features-art pb-2">Features</h5>
                            <div>
                                <div>Financing for buying new, reconditioned and used cars</div>
                                <div>Transparent fixed pricing</div>
                                <div>Finance of up to 50% of car value</div>
                                <div>Maximum loan amount of BDT 400,00,00</div>
                                <div>Flexible tenure of up to 5 years</div>
                                <div>Discount in pricing for bundle combination with Personal Loan&nbsp;</div>
                                <div>No prior account relationship, personal guarantee or cash security required
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card pl-3 border-0">
                            <h5 class="features-art pb-2">Eligibility</h5>
                            <div>
                                <p>Minimum Income: BDT 32,500<br>Minimum&nbsp; Years Ownership Required.<br>Age Requirement&nbsp;: 23 to 65 Years.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=================================End  Car Loan Eligibility Check-->
    <!-- Required Document -->
    <div class="modal fade fullscreen-md" id="insurance-company-modal">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Required Documents</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container text-dark">
                        <div class="row">
                            <div class="col-12 col-md-5 order-md-2 mb-3" v-if="type == types[1]">
                                <div class="display-6">Select Coverages</div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item py-0" v-for="coverage in coverages">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" :id="'coverage-'+coverage.id" v-model.number="company.basic_coverage" :value="coverage.id">
                                            <label class="custom-control-label" :for="'coverage-'+coverage.id"><small>@{{ coverage.name }}</small></label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <hr class="w-100 d-md-none"/>
                            <div class="col-12 col-md-7" :class="{'col-12': type == types[0]}">
                                <div class="row">
                                    <div class="col-6">Insurance Policy</div><div class="col-6">@{{ type }}</div>
                                    <div class="col-6">Insurance Provider Company</div><div class="col-6">@{{ company.name }}</div>
                                    <div class="col-6">CC Type</div><div class="col-6">@{{ displacement.name }} cc</div>
                                    <div class="col-6" v-if="type == types[1]">Sum Insured</div><div class="col-6" v-if="type == types[1]">Tk. @{{ price }}</div>
                                    <hr class="w-100 my-0">
                                    <div class="col-6" v-if="type == types[1]">Basic</div><div class="col-6" v-if="type == types[1]">Tk. @{{ displacement.basic }}</div>
                                    <div class="col-6" v-if="type == types[1]">+ @{{ in_rate.toFixed(2) }}% of full value</div><div class="col-6 border-bottom" v-if="type == types[1]">Tk. @{{ price*in_rate.toFixed(2)/100 }}</div>
                                    <div class="col-6" v-if="type == types[1]"><strong>Own Damage</strong></div><div class="col-6" v-if="type == types[1]"><strong>Tk. @{{ ownDamage }}</strong></div>
                                    <div class="col-6">Act Liabilities</div><div class="col-6">Tk. @{{ displacement.act_liability }}</div>
                                    <div class="col-6">+ @{{ passenger }} Passenger @ 45</div><div class="col-6">Tk. @{{ passenger*45 }}</div>
                                    <div class="col-6">+ 1 Driver</div><div class="col-6 border-bottom">Tk. @{{ 30 }}</div>
                                    <div class="col-6"><strong>Net Premium</strong></div><div class="col-6"><strong>Tk. @{{ netPremium }}</strong></div>
                                    <div class="col-6 border-bottom">+ 15% Vat</div><div class="col-6 border-bottom">Tk. @{{ netPremium*15/100 }}</div>
                                    <div class="col-6"><strong>Total Premium</strong></div><div class="col-6"><strong>Tk. @{{ totalPremium }}</strong></div>
                                    <div class="col-6 border-bottom">+ Service Delivery Cost</div><div class="col-6 border-bottom">Tk. @{{ 40 }}</div>
                                    <div class="col-6 display-6"><strong>Grand Total</strong></div><div class="col-6 display-6"><strong>Tk. @{{ grandTotal }}</strong></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span v-if="company.name">@{{ calculateRate }}</span>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Buy Now</button>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('insurances.store') }}" method="post" ref="form">
        @csrf
        <input type="hidden" name="category_id" v-model="category.id" />
        <input type="hidden" name="type" v-model="type" />
        <input type="hidden" name="displacement_range_id" v-model="displacement.id" />
        <input type="hidden" name="passengers" v-model="passenger" />
        <input type="hidden" name="brand_id" v-model="brand.id" />
        <input type="hidden" name="model_id" v-model="model.id" />
        <input type="hidden" name="coverages" v-model="company.basic_coverage" />
        <input type="hidden" name="price" v-model="price" />
        <input type="hidden" name="insurance_company_id" v-model="company.id"/>
    </form>
    <!-- Required Document -->
</section>

@endsection
@section('script')
<script>
    var vuejs = new Vue({
        el: '#insurance-company',
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
            in_rate:0,
            ex_rate:0
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
            },
            coverageStringToArray: function() {
                for(let i=0; i<this.companies.length; i++) {
                    this.companies[i].basic_coverage = this.companies[i].basic_coverage.split(',');
                    this.companies[i].insurance_feature = this.companies[i].insurance_feature.split(',');
                }
            },
            pageSetting: function() {
                if(this.category.id == 2) {
                    this.passenger = 1;
                    localStorage.passenger = 1;
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
            }
        },
        computed: {
            calculateRate: function() {
                this.in_rate = 0;
                this.ex_rate = 0;
                for(j=0; j<this.coverages.length; j++) {
                    let temp = false;
                    for(i = 0; i < this.company.basic_coverage.length; i++) {
                        if(this.company.basic_coverage[i] == this.coverages[j].id) {
                            this.in_rate += Number(this.coverages[j].rate);
                            temp = true;
                            break;
                        }
                    }
                    if(!temp)
                        this.ex_rate += Number(this.coverages[j].rate);
                }
            },
            ownDamage: function() {
                if(this.type == this.types[1])
                    return this.displacement.basic + this.price*this.in_rate/100;
                else
                    return 0;
            },
            netPremium: function() {
                return this.ownDamage + this.displacement.act_liability + this.passenger*45 + 30;
            },
            totalPremium: function() {
                return this.netPremium + this.netPremium * 15/100;
            },
            grandTotal: function() {
                return this.totalPremium + 40;
            }
        },
        watch: {
            
        },
        mounted: function() {
            this.getFromStorage();
            this.coverageStringToArray();
            this.pageSetting();
        },
    });
</script>
@endsection
@extends('layouts.frontend')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.car-background')
<section class="page-section-ptb" id="buy-insurance">
    <div class="row">
        <div class="col-12">
            @if($errors->any())
            {!! implode('', $errors->all('<div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert">&times;</button>:message</div>')) !!}
            @endif
        </div>
        <div class="col-12 col-md-2 col-lg-3 col-xl-4"></div>
        <div class="col-12 col-md-8 col-lg-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Buy insurance in a click!</h4>
                    <div class="form-group form-label-group">
                        <input type="text" class="form-control bg-light" id="category" placeholder="Vehicle Type" readonly="" v-model="category.name" @click.prevent="openModal(1)" />
                        <label for="category" class=" cursor-pointer">Vehicle Type</label>
                    </div>
                    <div class="form-group form-label-group">
                        <input type="text" class="form-control bg-light" id="vehicle" placeholder="Select Vehicle" readonly="" v-model="vehicle" @click.prevent="openModal(2)" />
                        <label for="vehicle" class=" cursor-pointer">Select Vehicle</label>
                    </div>
                    <div class="form-group form-label-group">
                        <input type="text" class="form-control bg-light" id="type" placeholder="Select Insurance Type" readonly="" v-model="type" @click.prevent="openModal(4)" />
                        <label for="type" class=" cursor-pointer">Insurance Type</label>
                    </div>
                    <div class="form-group form-label-group">
                        <input type="text" class="form-control bg-light" id="displacement" placeholder="Select Displacement" readonly="" v-model="displacement.name" @click.prevent="openModal(5)" />
                        <label for="displacement" class=" cursor-pointer">Displacement</label>
                    </div>
                    <div class="form-group form-label-group" v-if="category.id == 1">
                        <input type="text" class="form-control bg-light" id="passenger" placeholder="Select Passenger" readonly="" v-model="passenger" @click.prevent="openModal(6)" />
                        <label for="passenger" class=" cursor-pointer">Passenger</label>
                    </div>
                    <div class="row">
                        <div class="col-12 text-right"><a href="{{ route('insurance-companies.index') }}" class="btn button red"  @click="isSubmitable"><span class="mr-3">Continue</span> <i class="fa fa-arrow-right"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- The Modal -->
    <div class="modal fullscreen-md modal-scrollable" id="buy-insurance-modal">
        <div class="modal-dialog modal-dialog-center">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header flex-md-row flex-column justify-content-between">
                    <i class="fa fa-arrow-left cursor-pointer height-30 line-height-30" data-dismiss="modal" v-if="page == 1"></i>
                    <span class="fa fa-arrow-left cursor-pointer height-30 line-height-30" v-else @click.prevent="page--"></span>
                    <div class="flex-grow-1 px-3 overflow-hidden">
                        <div class="horizontal-scroll py-1">
                            <span class="border rounded cursor-pointer width-100 text-center d-inline-block overflow-hidden" v-if="!isEmpty(category)" @click.prevent="categorySelected(category)">@{{ category.name }}</span>
                            <span class="border rounded cursor-pointer width-100 text-center d-inline-block overflow-hidden" v-if="!isEmpty(brand)" @click.prevent="brandSelected(brand)">@{{ brand.name }}</span>
                            <span class="border rounded cursor-pointer width-100 text-center d-inline-block overflow-hidden" v-if="!isEmpty(model)" @click.prevent="modelSelected(model)">@{{ model.name }}</span>
                            <span class="border rounded cursor-pointer width-100 text-center d-inline-block overflow-hidden" v-if="type" @click.prevent="typeSelected(type)">@{{ type }}</span>
                            <span class="border rounded cursor-pointer width-100 text-center d-inline-block overflow-hidden" v-if="!isEmpty(displacement)" @click.prevent="displacementSelected(displacement)">@{{ displacement.name }} cc</span>
                            <span class="border rounded cursor-pointer width-100 text-center d-inline-block overflow-hidden" v-if="passenger" @click.prevent="passengerSelected(passenger)" v-if="category.id == 1">@{{ passenger }}</span>
                        </div>
                    </div>
                    <span class="float-right nowrap height-30  width-40"><i class="fa fa-angle-left cursor-pointer width-20 height-30 line-height-30 text-center border" @click.prevent="scrollLeft()" v-if="!scrolledLeft"></i><i class="fa fa-angle-right cursor-pointer width-20 height-30 line-height-30 text-center border" @click.prevent="scrollRight()" v-if="!scrolledRight"></i></span>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <h4 class="mx-5 text-center" v-if="page==1">Select Vehicle Type</h4>
                    <h4 class="mx-5" v-if="page==2">Vehicle Brand</h4>
                    <h4 class="mx-5" v-if="page==3">Vehicle Model</h4>
                    <h4 class="mx-5" v-if="page==4">Insurance Type</h4>
                    <h4 class="mx-5" v-if="page==5">Displacement</h4>
                    <div class="form-group mx-5" v-if="page != 1 && page != 6">
                        <input class="form-control" placeholder="Search..." v-model="search" />
                    </div>
                    <div v-if="page == 1" class="container mt-5">
                        <div class="row ">
                            <div class="col-6 height-100 text-right"><p class="text-cener pr-5 mb-0">Car</p><i class="fa fa-car font-100 btn-light cursor-pointer img-thumbnail" @click.prevent="categorySelected(categories[0])" :class="{'list-group-item-danger': category.id == 1}"></i></div>
                            <div class="col-6 height-100 text-left"><p class="text-left pl-4 mb-0">Motorcycle</p><i class="fa fa-motorcycle font-100 btn-light cursor-pointer img-thumbnail" @click.prevent="categorySelected(categories[1])" :class="{'list-group-item-danger': category.id == 2}"></i></div>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush mx-5" v-if="page == 2">
                        <li class="list-group-item list-group-item-action py-1 cursor-pointer" v-for="b in filteredBrands" @click.prevent="brandSelected(b)" :class="{'text-danger': b.id == brand.id}" v-if="category.id == b.category_id"><i class="fa fa-check" v-if="b.id == brand.id"></i> @{{ b.name }}</li>
                    </ul>
                    <ul class="list-group list-group-flush mx-5" v-else-if="page == 3">
                        <li class="list-group-item list-group-item-action py-1 cursor-pointer" v-for="m in filteredModels" @click.prevent="modelSelected(m)" :class="{'text-danger': m.id == model.id}" v-if="brand.id == m.brand_id"><i class="fa fa-check" v-if="m.id == model.id"></i> @{{ m.name }}</li>
                    </ul>
                    <ul class="list-group list-group-flush mx-5" v-else-if="page == 4">
                        <li class="list-group-item list-group-item-action py-1 cursor-pointer" v-for="m in filteredTypes" @click.prevent="typeSelected(m)" :class="{'text-danger': m == type}"><i class="fa fa-check" v-if="m == type"></i> @{{ m }}</li>
                    </ul>
                    <ul class="list-group list-group-flush mx-5" v-else-if="page == 5">
                        <li class="list-group-item list-group-item-action py-1 cursor-pointer" v-for="m in filteredDisplacements" @click.prevent="displacementSelected(m)" :class="{'text-danger': m.id == displacement.id}" v-if="m.category_id == category.id"><i class="fa fa-check" v-if="m.id == displacement.id"></i> @{{ m.name }} cc</li>
                    </ul>
                    <div v-else-if="page == 6" class="container">
                        <div class="row mx-0">
                            <div class="col-12" v-if="category.id == 1">
                                <div class="form-group mb-1">
                                    <label class="" for="pasengers">No. of Passengers</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text border-right-0 bg-white">1 Driver +</span>
                                        </div>
                                        <input type="text" class="form-control bg-white border-left-0 border-right-0" id="passengers" placeholder="Passengers" v-model="passenger" />
                                        <div class="input-group-append">
                                            <span class="input-group-text border-left-0 bg-white">Passengers</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div v-if="category.id == 1" class="col-2" v-for="p in filteredPassengers">
                                <button class="btn btn-light m-1" @click.prevent="passengerSelected(p)" :class="{'text-danger': p == passenger}">@{{ p }}</button>
                            </div>
                            <div class="col-12" v-if="type == types[1]">
                                <div class="form-group mb-1">
                                    <label class="" for="price">@{{ category.name }} Value</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text border-right-0 bg-white">Tk.</span>
                                        </div>
                                        <input type="text" class="form-control bg-white border-left-0" id="price" placeholder="Price" v-model="price" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class=" border list-group-item-light my-1 px-3 img-thumbnail">
                                    <div class="text-dark">@{{ brand.name }} @{{ model.name }}</div>
                                    <small class="text-secondary">@{{ type }} <i class="fa fa-angle-double-right"></i> @{{ displacement.name }} cc</small><br/>
                                    <a href="#" class="btn btn-link text-danger p-0" data-dismiss="modal">Edit details</a>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" id="terms" v-model="terms">
                                    <label class="custom-control-label" for="terms">I agree to the <a class="btn btn-link text-primary p-0" href="#">Terms of Service</a> and <a class="btn btn-link text-primary p-0" href="#">Privacy Policy</a></label>
                                </div>
                                <div class="input-group my-3">
                                    <a href="{{ route('insurance-companies.index') }}" class="form-control border-right-0 btn btn-danger" @click="isSubmitable">Continue</a>
                                    <div class="input-group-append">
                                        <span class="input-group-text border-0 bg-danger text-white"><i class="fa fa-arrow-right"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- add more covers -->


@endsection
@section('script')
<script>
    var vuejs = new Vue({
        el: '#buy-insurance',
        data: {
            search: '',
            page: 1,
            category: {},
            categories: @json($categories),
            brand: {},
            brands: @json($brands),
            model: {},
            models: @json($models),
            type: '',
            types: ['Act Liabilities / Third Party Insurance', 'Comprehensive / First Party Insurance'],
            displacement: {},
            displacements: @json($displacement_ranges),
            passenger: 4,
            passengers: [3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14],
            price: '',
            scrolledLeft: true,
            scrolledRight: true,
            terms: '',
        },
        methods: {
            categorySelected: function (c) {
                this.category = c;
                this.page = 2;
                this.reset('brand', 'model', 'type', 'displacement', 'passenger', 'price');
            },
            brandSelected: function (b) {
                this.brand = b;
                this.page = 3;
                this.reset('model', 'type', 'displacement', 'passenger', 'price');
            },
            modelSelected: function (m) {
                this.model = m;
                this.page = 4;
                this.reset('type', 'displacement', 'passenger', 'price');
            },
            typeSelected: function (m) {
                this.type = m;
                this.page = 5;
                this.reset('displacement', 'passenger', 'price');
            },
            displacementSelected: function (m) {
                this.displacement = m;
                this.page = 6;
                this.reset('passenger', 'price');
            },
            passengerSelected: function (m) {
                this.passenger = m;
            },
            priceSelected: function (p) {
                this.price = p;
            },
            openModal: function (p) {
                if (p == 1) {
                    this.page = 1;
                } else if (p == 2) {
                    this.page = 2;
                } else if (p == 4) {
                    if (this.type)
                        this.page = 4;
                } else if (p == 5) {
                    if (this.displacement)
                        this.page = 5;
                } else if (p == 6) {
                    if (this.passenger)
                        this.page = 6;
                }
                $('#buy-insurance-modal').modal('show');
            },
            reset: function (...args) {
                for (var i = 0; i < args.length; i++) {
                    if(args[i] == 'category') {
                        this.category = {};
                    } else if (args[i] == 'brand') {
                        this.brand = {};
                    } else if (args[i] == 'model') {
                        this.model = {};
                    } else if (args[i] == 'type') {
                        this.type = '';
                    } else if (args[i] == 'displacement') {
                        this.displacement = {};
                    } else if (args[i] == 'passenger') {
                        this.passenger = '';
                    } else if (args[i] == 'price') {
                        this.price = '';
                    }
                }
                this.search = '';
                var e = document.querySelector('.horizontal-scroll');
                var _this = this;
                setTimeout(function() {
                    if (e.offsetWidth < e.scrollWidth)
                        _this.scrolledRight = false;
                    else {
                        _this.scrolledLeft = true;
                        _this.scrolledRight = true;
                    }
                }, 1000);
            },
            scrollLeft: function () {
                var e = document.querySelector('.horizontal-scroll');
                e.scrollBy( - 102, 0);
                var _this = this;
                setTimeout(function(){
                if (e.scrollLeft == 0)
                    _this.scrolledLeft = true;
                if (e.scrollLeft < (e.scrollWidth - e.offsetWidth))
                    _this.scrolledRight = false;
                }, 1000);
            },
            scrollRight: function () {
                var e = document.querySelector('.horizontal-scroll');
                e.scrollBy(102, 0);
                var _this = this;
                setTimeout(function() {
                    if (e.scrollLeft == (e.scrollWidth - e.offsetWidth))
                        _this.scrolledRight = true;
                    if (e.scrollLeft > 0)
                        _this.scrolledLeft = false;
                }, 1000);
            },
            isSubmitable: function(e) {
                $s = this.type && !this.isEmpty(this.displacement) && (this.passenger || this.price || this.category.id == this.categories[1].id) && this.terms;
                if(!$s)
                    e.preventDefault();
            },
            isEmpty: function(obj) {
                return Object.keys(obj).length === 0;
            },
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
        },
        computed: {
            vehicle() {
                var car = '';
                if (!this.isEmpty(this.brand))
                    car += this.brand.name;
                if (!this.isEmpty(this.model))
                    car += this.model.name;
                return car;
            },
            filteredBrands() {
                return this.brands.filter(item => {
                    return item.name.toLowerCase().startsWith(this.search.toLowerCase());
                })
            },
            filteredModels() {
                return this.models.filter(item => {
                    return item.name.toLowerCase().startsWith(this.search.toLowerCase());
                })
            },
            filteredTypes() {
                return this.types.filter(item => {
                    return item.toLowerCase().startsWith(this.search.toLowerCase());
                })
            },
            filteredDisplacements() {
                return this.displacements.filter(item => {
                    return item.name.startsWith(this.search);
                })
            },
            filteredPassengers() {
                return this.passengers.filter(item => {
                    return item.toString().startsWith(this.search);
                })
            },
        },
        mounted: function() {
            this.getFromStorage();
        },
        watch: {
            category: function(v) {
                localStorage.category = JSON.stringify(v);
            },
            brand: function(v) {
                localStorage.brand = JSON.stringify(v);
            },
            model: function(v) {
                localStorage.model = JSON.stringify(v);
            },
            type: function(v) {
                localStorage.type = v;
            },
            displacement: function(v) {
                localStorage.displacement = JSON.stringify(v);
            },
            passenger: function(v) {
                localStorage.passenger = v;
            },
            price: function(v) {
                localStorage.price = v;
            },
        }
    });
</script>
@endsection
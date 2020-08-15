@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif
@include('layouts.frontend.car-background')


<!--=================================
Start Post Your Ad-->

<section class="Post-Ad page-section-ptb" id="sell-car">
    <div class="row">
        <div class="col-12 col-md-2 col-lg-3 col-xl-4"></div>
        <div class="col-12 col-md-8 col-lg-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Sell your car in a click!</h4>
                    <div class="form-group form-label-group">
                        <input type="text" class="form-control bg-light" id="car" name="field1" placeholder="Select Car" readonly="" v-model="car" data-toggle="modal" data-target="#sell-car-modal"/>
                        <label for="car" class=" cursor-pointer">Select Car</label>
                    </div>
                    <div class="form-group form-label-group">
                        <input type="text" class="form-control bg-light" id="kms-driven" name="field1" placeholder="Select Car" readonly="" v-model="kms_driven" data-toggle="modal" data-target="#sell-car-modal"/>
                        <label for="kms-driven" class=" cursor-pointer">Kms driven</label>
                    </div>
                    <div class="form-group form-label-group">
                        <input type="text" class="form-control bg-light" id="ownership" name="field1" placeholder="Select Car" readonly="" v-model="ownership" data-toggle="modal" data-target="#sell-car-modal"/>
                        <label for="ownership" class=" cursor-pointer">Ownership</label>
                    </div>
                    <div class="form-group form-label-group">
                        <input type="text" class="form-control bg-light" id="city" name="field1" placeholder="Select Car" readonly="" v-model="division" data-toggle="modal" data-target="#sell-car-modal"/>
                        <label for="city" class=" cursor-pointer">City</label>
                    </div>
                    <div class="form-group form-label-group">
                        <input type="text" class="form-control bg-light" id="price" name="field1" placeholder="Select Car" readonly="" v-model="price" data-toggle="modal" data-target="#sell-car-modal"/>
                        <label for="price" class=" cursor-pointer">Expected Price</label>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <h4 class="mb-0">Upload Photos</h4>
                            <div class="text-secondary"><small>More photos give 6x more verified buyers</small></div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4 col-md-2">
                            <div class="size-11 cursor-pointer bg-light border"  data-toggle="modal" data-target="#sell-car-modal">
                                <div class="size-child">
                                    <i class="fa fa-plus position-center"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 col-md-2">
                            <div class="size-11 cursor-pointer bg-light border"  data-toggle="modal" data-target="#sell-car-modal">
                                <div class="size-child">
                                    <i class="fa fa-plus position-center"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 col-md-2">
                            <div class="size-11 cursor-pointer bg-light border"  data-toggle="modal" data-target="#sell-car-modal">
                                <div class="size-child">
                                    <i class="fa fa-plus position-center"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 col-md-2">
                            <div class="size-11 cursor-pointer bg-light border"  data-toggle="modal" data-target="#sell-car-modal">
                                <div class="size-child">
                                    <i class="fa fa-plus position-center"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 col-md-2">
                            <div class="size-11 cursor-pointer bg-light border"  data-toggle="modal" data-target="#sell-car-modal">
                                <div class="size-child">
                                    <i class="fa fa-plus position-center"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 col-md-2">
                            <div class="size-11 cursor-pointer bg-light border"  data-toggle="modal" data-target="#sell-car-modal">
                                <div class="size-child">
                                    <i class="fa fa-plus position-center"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-right"><button class="btn button red"><span class="mr-3">Continue</span> <i class="fa fa-arrow-right"></i></button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- The Modal -->
    <div class="modal fullscreen-md modal-scrollable" id="sell-car-modal">
        <div class="modal-dialog modal-dialog-center">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header border-bottom-0 flex-md-row flex-column justify-content-between">
                    <i class="fa fa-arrow-left cursor-pointer" class="close height-30" data-dismiss="modal" v-if="page == 1"></i>
                    <span class="fa fa-arrow-left cursor-pointer height-30" v-else @click.prevent="page--"></span>
                    <div class="flex-grow-1 px-3 container-horizontal-scroll" >
                        <div class="target-horizontal-scroll py-1">
                            <span class="p-1 border rounded cursor-pointer" v-if="brand" @click.prevent="brandSelected(brand)">@{{ brand }}</span>
                            <span class="p-1 border rounded cursor-pointer" v-if="model" @click.prevent="modelSelected(model)">@{{ model }}</span>
                            <span class="p-1 border rounded cursor-pointer" v-if="manufacturing_year" @click.prevent="manufacturingYearSelected(manufacturing_year)">@{{ manufacturing_year }}</span>
                            <span class="p-1 border rounded cursor-pointer" v-if="package" @click.prevent="packageSelected(package)">@{{ package }}</span>
                            <span class="p-1 border rounded cursor-pointer" v-if="kms_driven" @click.prevent="kmsDrivenSelected(kms_driven)">@{{ kms_driven }}</span>
                            <span class="p-1 border rounded cursor-pointer" v-if="ownership" @click.prevent="ownershipSelected(ownership)">@{{ ownership }}</span>
                            <span class="p-1 border rounded cursor-pointer" v-if="division" @click.prevent="divisionSelected(division)">@{{ division }}</span>
                        </div>
                    </div>
                    <span class="float-right width-40 height-30"><i class="fa fa-angle-left cursor-pointer" @click.prevent="scrollLeft()" v-if="!scrolledLeft"></i><i class="fa fa-angle-right cursor-pointer ml-3" @click.prevent="scrollRight()" v-if="!scrolledRight"></i></span>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <h4 class="" v-if="page==1">Car Brand</h4>
                    <h4 class="" v-else-if="page==2">Car Model</h4>
                    <h4 class="" v-else-if="page==3">Car Make Year</h4>
                    <h4 class="" v-else-if="page==4">Car Variant</h4>
                    <h4 class="" v-else-if="page==5">Car Kms Driven</h4>
                    <h4 class="" v-else-if="page==6">Car Ownership</h4>
                    <h4 class="" v-else-if="page==7">Car City</h4>
                    <div class="form-group">
                        <input class="form-control" placeholder="Search..." v-model="search" />
                    </div>
                    <ul class="list-group list-group-flush" v-if="page == 1">
                        <li class="list-group-item list-group-item-action py-1 cursor-pointer" v-for="b in filteredBrands" @click.prevent="brandSelected(b.name)">@{{ b.name }}</li>
                    </ul>
                    <ul class="list-group list-group-flush" v-else-if="page == 2">
                        <li class="list-group-item list-group-item-action py-1 cursor-pointer" v-for="m in filteredModels" @click.prevent="modelSelected(m.name)">@{{ m.name }}</li>
                    </ul>
                    <ul class="list-group list-group-flush" v-else-if="page == 3">
                        <li class="list-group-item list-group-item-action py-1 cursor-pointer" v-for="m in filteredManufacturingYears" @click.prevent="manufacturingYearSelected(m)">@{{ m }}</li>
                    </ul>
                    <ul class="list-group list-group-flush" v-else-if="page == 4">
                        <li class="list-group-item list-group-item-action py-1 cursor-pointer" v-for="m in filteredPackages" @click.prevent="packageSelected(m.name)">@{{ m.name }}</li>
                    </ul>
                    <button v-if="page == 5" class="btn btn-light m-1" v-for="m in filteredKmsDrivens" @click.prevent="kmsDrivenSelected(m)">@{{ m }}</button>
                    <button v-if="page == 6" class="btn btn-light m-1" v-for="m in filteredOwnerships" @click.prevent="ownershipSelected(m)">@{{ m }}</button>
                    <button v-if="page == 7" class="btn btn-light m-1" v-for="m in filteredDivisions" @click.prevent="divisionSelected(m.name)">@{{ m.name }}</button>
                </div>

            </div>
        </div>
    </div>
</section>

<!--=================================
End  Post Your Ad -->

@endsection                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
@section('script')
<script>
    var vuejs = new Vue({
    el: '#sell-car',
            data: {
                search: '',
                page: 1,
                brand: '',
                brands: @json($brands),
                model: '',
                models: @json($models),
                package: '',
                packages: @json($packages),
                manufacturing_year: '',
                manufacturing_years: [2020, 2019, 2018, 2017, 2016, 2015, 2014, 2013, 2012, 2011, 2010, 2009, 2008, 2007, 2006, 2005, 2004, 2003, 2002, 2001, 2000, 1999, 1998, 1997, 1996, 1995,
                        1994, 1993, 1992, 1991, 1990, 1989, 1988, 1987, 1986, 1985, 1984, 1983, 1982, 1981, 1980],
                kms_driven: '',
                kms_drivens: [5000, 10000, 15000, 20000, 25000, 30000, 35000, 40000, 50000, 60000, 70000, 80000, 90000, 100000, 110000, 120000],
                ownership: '',
                ownerships: ['First', 'Second', 'Third', 'Above'],
                division: '',
                divisions: @json($divisions),
                price: '',
                prices: [5000, 10000, 15000, 20000, 25000, 30000, 35000, 40000, 50000, 60000, 70000, 80000, 90000, 100000, 110000, 120000],
                scrolledLeft: true,
                scrolledRight: true,
            },
            methods: {
                brandSelected: function (b) {
                    this.brand = b;
                    this.page = 2;
                    this.reset('model', 'manufacturing_year', 'package', 'kms_driven', 'ownership', 'division', 'price');
                },
                modelSelected: function (m) {
                    this.model = m;
                    this.page = 3;
                    this.reset('manufacturing_year', 'package', 'kms_driven', 'ownership', 'division', 'price');
                },
                manufacturingYearSelected: function (m) {
                    this.manufacturing_year = m;
                    this.page = 4;
                    this.reset('package', 'kms_driven', 'ownership', 'division', 'price');
                },
                packageSelected: function (m) {
                    this.package = m;
                    this.page = 5;
                    this.reset('kms_driven', 'ownership', 'division', 'price');
                },
                kmsDrivenSelected: function (m) {
                    this.kms_driven = m;
                    this.page = 6;
                    this.reset('ownership', 'division', 'price');
                },
                ownershipSelected: function (m) {
                    this.ownership = m;
                    this.page = 7;
                    this.reset('division', 'price');
                },
                divisionSelected: function (m) {
                    this.division = m;
                    this.page = 8;
                    this.reset('price');
                },
                priceSelected: function (m) {
                    this.price = m;
                    this.page = 9;
                },
                photoSelected: function (m) {
                    this.photo = m;
                    this.page = 10;
                },
                reset: function (...args) {
                    for (var i = 0; i < args.length; i++) {
                        if (args[i] == 'brand') {
                            this.brand = '';
                        } else if (args[i] == 'model') {
                            this.model = '';
                        } else if (args[i] == 'manufacturing_year') {
                            this.manufacturing_year = '';
                        } else if (args[i] == 'package') {
                            this.package = '';
                        } else if (args[i] == 'kms_driven') {
                            this.kms_driven = '';
                        } else if (args[i] == 'ownership') {
                            this.ownership = '';
                        } else if (args[i] == 'division') {
                            this.division = '';
                        } else if (args[i] == 'price') {
                            this.price = '';
                        }
                    }
                    this.search = '';
                    var e = document.querySelector('.target-horizontal-scroll');
                    var _this = this;
                    setTimeout(function(){
                        if(e.offsetWidth < e.scrollWidth)
                            _this.scrolledRight = false;
                    }, 1000);
                    
                },
                scrollLeft: function () {
                    var e = document.querySelector('.target-horizontal-scroll');
                    e.scrollBy(-30, 0);
                    if(e.scrollLeft == 0)
                        this.scrolledLeft = true;
                    if(e.scrollLeft < (e.scrollWidth-e.offsetWidth))
                        this.scrolledRight = false;
                },
                scrollRight: function () {
                    var e = document.querySelector('.target-horizontal-scroll');
                    e.scrollBy(30, 0);
                    if(e.scrollLeft == (e.scrollWidth-e.offsetWidth))
                        this.scrolledRight = true;
                    if(e.scrollLeft > 0)
                        this.scrolledLeft = false;
                },
            },
            computed: {
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
                filteredManufacturingYears() {
                    return this.manufacturing_years.filter(item => {
                        return item.toString().startsWith(this.search);
                    })
                },
                filteredPackages() {
                    return this.packages.filter(item => {
                        return item.name.toLowerCase().startsWith(this.search.toLowerCase());
                    })
                },
                filteredKmsDrivens() {
                    return this.kms_drivens.filter(item => {
                        return item.toString().startsWith(this.search);
                    })
                },
                filteredOwnerships() {
                    return this.ownerships.filter(item => {
                        return item.toLowerCase().startsWith(this.search.toLowerCase());
                    })
                },
                filteredDivisions() {
                    return this.divisions.filter(item => {
                        return item.name.toLowerCase().startsWith(this.search.toLowerCase());
                    })
                },
                filteredPrices() {
                    return this.prices.filter(item => {
                        return item.toString().startsWith(this.search);
                    })
                },
    //            filteredPhotos() {
    //                return this.photos.filter(item => {
    //                    return item.name.toLowerCase().startsWith(this.search.toLowerCase());
    //                })
    //            },
                car() {
                    var car = '';
                    if (this.brand)
                        car += this.brand + ' ' + this.model + ' ' + this.manufacturing_year;
                    else
                        return '';
                    if (this.package)
                        car += ', ' + this.package;
                    return car;
                },
            }
    })
</script>
@endsection
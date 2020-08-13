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
                        <input type="text" class="form-control bg-light" id="car" name="field1" placeholder="Select Car" readonly="" v-model="brand" data-toggle="modal" data-target="#sell-car-modal"/>
                        <label for="car" class=" cursor-pointer">Select Car</label>
                    </div>
                    <div class="form-group form-label-group">
                        <input type="text" class="form-control bg-light" id="kms-driven" name="field1" placeholder="Select Car" readonly="" v-model="brand" data-toggle="modal" data-target="#sell-car-modal"/>
                        <label for="kms-driven" class=" cursor-pointer">Kms driven</label>
                    </div>
                    <div class="form-group form-label-group">
                        <input type="text" class="form-control bg-light" id="ownership" name="field1" placeholder="Select Car" readonly="" v-model="brand" data-toggle="modal" data-target="#sell-car-modal"/>
                        <label for="ownership" class=" cursor-pointer">Ownership</label>
                    </div>
                    <div class="form-group form-label-group">
                        <input type="text" class="form-control bg-light" id="city" name="field1" placeholder="Select Car" readonly="" v-model="brand" data-toggle="modal" data-target="#sell-car-modal"/>
                        <label for="city" class=" cursor-pointer">City</label>
                    </div>
                    <div class="form-group form-label-group">
                        <input type="text" class="form-control bg-light" id="price" name="field1" placeholder="Select Car" readonly="" v-model="brand" data-toggle="modal" data-target="#sell-car-modal"/>
                        <label for="price" class=" cursor-pointer">Expected Price</label>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <h4 class="mb-0">Upload Photos</h4>
                            <div class="text-secondary"><small>More photos give 5x more verified buyers</small></div>
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
    <div class="modal fullscreen-md" id="sell-car-modal">
        <div class="modal-dialog modal-dialog-center">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header border-bottom-0">
                    <i class="fa fa-arrow-left cursor-pointer"  class="close" data-dismiss="modal"></i>
                    <span class="p-2 border rounded cursor-pointer" v-if="brand" @click.prevent="brandSelected(brand)">@{{ brand }}</span>
                    <span class="p-2 border rounded cursor-pointer" v-if="model" @click.prevent="modelSelected(model)">@{{ model }}</span>
                    <span class="p-2 border rounded cursor-pointer" v-if="manufacturing_year" @click.prevent="manufacturingYearSelected(manufacturing_year)">@{{ manufacturing_year }}</span>
                    <span class="p-2 border rounded cursor-pointer" v-if="package" @click.prevent="packageSelected(package)">@{{ package }}</span>
                    <span><i class="fa fa-angle-left cursor-pointer"></i><i class="fa fa-angle-right cursor-pointer ml-3"></i></span>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" placeholder="Search..." v-model="search" />
                    </div>
                    <button v-if="page == 1" class="btn btn-light m-1" v-for="b in filteredBrands" @click.prevent="brandSelected(b.name)">@{{ b.name }}</button>
                    <button v-if="page == 2" class="btn btn-light m-1" v-for="m in filteredModels" @click.prevent="modelSelected(m.name)">@{{ m.name }}</button>
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
            manufacturing_years: [2020, 2019, 2018, 2017, 2016, 2015, 2014, 2013, 2012],
            kms_driven: '',
            ownership: '',
            division: '',
            divisions: @json($divisions),
            price: ''
        },
        methods: {
            brandSelected: function (b) {
                this.brand = b;
                this.page = 2;
                this.model = '';
            },
            modelSelected: function (m) {
                this.model = m;
                this.page = 3;
            },
            manufacturingYearSelected: function (m) {
                this.model = m;
                this.page = 4;
            },
            packageSelected: function (m) {
                this.model = m;
                this.page = 5;
            },
            ownershipSelected: function (m) {
                this.model = m;
                this.page = 6;
            },
            divisionSelected: function (m) {
                this.model = m;
                this.page = 7;
            },
            priceSelected: function (m) {
                this.model = m;
                this.page = 8;
            },
            photoSelected: function (m) {
                this.model = m;
                this.page = 9;
            }
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
            }
        }
    })
</script>
@endsection
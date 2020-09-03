@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.car-background')
<section class="section-full content-inner-2 text-dark" id="compare">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="m-b30">
                    <h4 class="h4 m-t0">Compare to choose the right car! </h4>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Side bar start -->
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card" @click.prevent="openModal(2)" v-if="page == 1 && configuration == 1">
                    <div class="size-32">
                        <img class="card-img-top img-fluid cursor-pointer hover-opacity-5" src="{{ url('/') }}/images/add-car.jpg" alt="Card image">
                    </div>
                    <div class="card-body">
                        <div class="input-group rounded-0 rounded-top" @click.prevent="openModal(2)">
                            <input type="text" class="form-control border-right-0 rounded-0 border-bottom-0" placeholder="Select Brand/Model">
                            <div class="input-group-append">
                                <span class="input-group-text bg-white border-left-0  border-bottom-0 rounded-0"><i class="fa fa-caret-down"></i></span>
                            </div>
                        </div>
                        <div class="input-group rounded-0" @click.prevent="openModal(3)">
                            <input type="text" class="form-control border-right-0 rounded-0" placeholder="Select Package">
                            <div class="input-group-append">
                                <span class="input-group-text bg-white border-left-0 rounded-0"><i class="fa fa-caret-down"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" v-else-if="page == 2 && configuration == 1">
                    <div class="card-header bg-white">
                        <a class="btn btn-link text-danger" href="#" @click.prevent="page=2">Brand/Modal</a> <a class="btn btn-link text-dark" href="#" @click.prevent="page=3">Package</a>
                        <i class="fa fa-close position-absolute right-10 top-10 cursor-pointer btn-light text-danger" @click.prevent="page=1"></i>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Select Brand/Model" v-model="search">
                        </div>
                        <ul class="list-group compare-scroll" v-if="filteredBrands.length">
                            <li class="list-group-item py-1 cursor-pointer border-0" v-for="b in filteredBrands" :class="{'text-danger': b.id == brand.id}">
                                <strong><i class="fa fa-check" v-if="b.id == brand.id"></i> @{{ b.name }}</strong>
                                <ul class="list-group list-group-flush border-left">
                                    <li class="list-group-item list-group-item-action py-1 cursor-pointer border-0" v-for="m in models" @click.prevent="modelSelected(b, m)" :class="{'text-danger': m.id == model.id}" v-if="b.id == m.brand_id"><i class="fa fa-check" v-if="m.id == model.id"></i> @{{ m.name }}</li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="list-group compare-scroll" v-else>
                            <li class="list-group-item py-1 cursor-pointer border-0" v-for="b in brands" :class="{'text-danger': b.id == brand.id}">
                                <strong><i class="fa fa-check" v-if="b.id == brand.id"></i> @{{ b.name }}</strong>
                                <ul class="list-group list-group-flush border-left">
                                    <li class="list-group-item list-group-item-action py-1 cursor-pointer border-0" v-for="m in filteredModels" @click.prevent="modelSelected(b, m)" :class="{'text-danger': m.id == model.id}" v-if="b.id == m.brand_id"><i class="fa fa-check" v-if="m.id == model.id"></i> @{{ m.name }}</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card" v-else-if="page == 3 && configuration == 1">
                    <div class="card-header bg-white">
                        <a class="btn btn-link text-dark" href="#" @click.prevent="page=2">Brand/Model</a> <a class="btn btn-link text-danger" href="#" @click.prevent="page=3">Package</a>
                        <i class="fa fa-close position-absolute right-10 top-10 cursor-pointer btn-light text-danger" @click.prevent="page=1"></i>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Select Package" v-model="search">
                        </div>
                        <ul class="list-group list-group-flush compare-scroll">
                            <li class="list-group-item list-group-item-action py-1 cursor-pointer" v-for="p in filteredPackages" :class="{'text-danger': p.id == package.id}" v-if="p.model_id == model.id" @click.prevent="packageSelected(p, 0)">
                                <i class="fa fa-check" v-if="p.id == package.id"></i> @{{ p.name }}
                            </li>
                        </ul>
                    </div>
                    <div class="w-100 h-parent position-absolute dark-opacity-3" v-if="loading"><i class="fa fa-spinner fa-spin text-white position-center"></i></div>
                </div>
                <div class="card" v-else-if="configuration > 1 || products.length > 0">
                    <div class="size-32">
                        <img class="card-img-top img-fluid" :src="'{{ url('/') }}/assets/products/'+products[0].id+'/'+products[0].image1" alt="Product Image">
                    </div>
                    <div class="card-body">
                        <i class="fa fa-close position-absolute right-10 top-10 cursor-pointer btn-light text-danger" @click.prevent="page=1; configuration=1; removeProduct(0)"></i>
                        <div><span>@{{ products[0].brand.name }} @{{ products[0].model.name }} @{{ products[0].manufacturing_year }}, @{{ products[0].package.name }}</span> <i class="fa fa-pencil cursor-pointer btn-light text-danger" @click.prevent="page=1; configuration=1; removeProduct(0)"></i></div>
                        <div class="display-6 text-dark">Tk. @{{ products[0].msrp }}</div>
                    </div>
                </div>
            </div>
            <!-- Side bar start -->
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card opacity-5" v-if="configuration < 2 && products.length < 2">
                    <div class="size-32">
                        <img class="card-img-top img-fluid" src="{{ url('/') }}/images/add-car.jpg" alt="Card image">
                    </div>
                    <div class="card-body">
                        <div class="input-group rounded-0 rounded-top">
                            <input type="text" class="form-control border-right-0 rounded-0 border-bottom-0 bg-white" placeholder="Select Brand/Model" disabled="">
                            <div class="input-group-append">
                                <span class="input-group-text bg-white border-left-0  border-bottom-0 rounded-0"><i class="fa fa-caret-down"></i></span>
                            </div>
                        </div>
                        <div class="input-group rounded-0">
                            <input type="text" class="form-control border-right-0 rounded-0 bg-white" placeholder="Select Package" disabled="">
                            <div class="input-group-append">
                                <span class="input-group-text bg-white border-left-0 rounded-0"><i class="fa fa-caret-down"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" @click.prevent="openModal(2)" v-else-if="page == 1 && configuration == 2">
                    <div class="size-32">
                        <img class="card-img-top img-fluid cursor-pointer hover-opacity-5" src="{{ url('/') }}/images/add-car.jpg" alt="Card image">
                    </div>
                    <div class="card-body">
                        <div class="input-group rounded-0 rounded-top" @click.prevent="openModal(2)">
                            <input type="text" class="form-control border-right-0 rounded-0 border-bottom-0" placeholder="Select Brand/Model">
                            <div class="input-group-append">
                                <span class="input-group-text bg-white border-left-0  border-bottom-0 rounded-0"><i class="fa fa-caret-down"></i></span>
                            </div>
                        </div>
                        <div class="input-group rounded-0" @click.prevent="openModal(3)">
                            <input type="text" class="form-control border-right-0 rounded-0" placeholder="Select Package">
                            <div class="input-group-append">
                                <span class="input-group-text bg-white border-left-0 rounded-0"><i class="fa fa-caret-down"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" v-else-if="page == 2 && configuration == 2">
                    <div class="card-header bg-white">
                        <a class="btn btn-link text-danger" href="#" @click.prevent="page=2">Brand/Modal</a> <a class="btn btn-link text-dark" href="#" @click.prevent="page=3">Package</a>
                        <i class="fa fa-close position-absolute right-10 top-10 cursor-pointer btn-light text-danger" @click.prevent="page=1"></i>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Select Brand/Model" v-model="search">
                        </div>
                        <ul class="list-group compare-scroll" v-if="filteredBrands.length">
                            <li class="list-group-item py-1 cursor-pointer border-0" v-for="b in filteredBrands" :class="{'text-danger': b.id == brand.id}">
                                <strong><i class="fa fa-check" v-if="b.id == brand.id"></i> @{{ b.name }}</strong>
                                <ul class="list-group list-group-flush border-left">
                                    <li class="list-group-item list-group-item-action py-1 cursor-pointer border-0" v-for="m in models" @click.prevent="modelSelected(b, m)" :class="{'text-danger': m.id == model.id}" v-if="b.id == m.brand_id"><i class="fa fa-check" v-if="m.id == model.id"></i> @{{ m.name }}</li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="list-group compare-scroll" v-else>
                            <li class="list-group-item py-1 cursor-pointer border-0" v-for="b in brands" :class="{'text-danger': b.id == brand.id}">
                                <strong><i class="fa fa-check" v-if="b.id == brand.id"></i> @{{ b.name }}</strong>
                                <ul class="list-group list-group-flush border-left">
                                    <li class="list-group-item list-group-item-action py-1 cursor-pointer border-0" v-for="m in filteredModels" @click.prevent="modelSelected(b, m)" :class="{'text-danger': m.id == model.id}" v-if="b.id == m.brand_id"><i class="fa fa-check" v-if="m.id == model.id"></i> @{{ m.name }}</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card" v-else-if="page == 3 && configuration == 2">
                    <div class="card-header bg-white">
                        <a class="btn btn-link text-dark" href="#" @click.prevent="page=2">Brand/Model</a> <a class="btn btn-link text-danger" href="#" @click.prevent="page=3">Package</a>
                        <i class="fa fa-close position-absolute right-10 top-10 cursor-pointer btn-light text-danger" @click.prevent="page=1"></i>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Select Package" v-model="search">
                        </div>
                        <ul class="list-group list-group-flush compare-scroll">
                            <li class="list-group-item list-group-item-action py-1 cursor-pointer" v-for="p in filteredPackages" :class="{'text-danger': p.id == package.id}" v-if="p.model_id == model.id" @click.prevent="packageSelected(p, 1)">
                                <i class="fa fa-check" v-if="p.id == package.id"></i> @{{ p.name }}
                            </li>
                        </ul>
                    </div>
                    <div class="w-100 h-parent position-absolute dark-opacity-3" v-if="loading == 2"><i class="fa fa-spinner fa-spin text-white position-center"></i></div>
                </div>
                <div class="card" v-else-if="configuration > 2 || products.length > 1">
                    <div class="size-32">
                        <img class="card-img-top img-fluid" :src="'{{ url('/') }}/assets/products/'+products[1].id+'/'+products[1].image1" alt="Product Image">
                    </div>
                    <div class="card-body">
                        <i class="fa fa-close position-absolute right-10 top-10 cursor-pointer btn-light text-danger" @click.prevent="page=1; configuration = 2; removeProduct(1)"></i>
                        <div><span>@{{ products[1].brand.name }} @{{ products[1].model.name }} @{{ products[1].manufacturing_year }}, @{{ products[1].package.name }}</span> <i class="fa fa-pencil cursor-pointer btn-light text-danger" @click.prevent="page=1; configuration = 2; removeProduct(1)"></i></div>
                        <div class="display-6 text-dark">Tk. @{{ products[1].msrp }}</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card opacity-5" v-if="configuration < 3 && products.length < 3">
                    <div class="size-32">
                        <img class="card-img-top img-fluid" src="{{ url('/') }}/images/add-car.jpg" alt="Card image">
                    </div>
                    <div class="card-body">
                        <div class="input-group rounded-0 rounded-top">
                            <input type="text" class="form-control border-right-0 rounded-0 border-bottom-0 bg-white" placeholder="Select Brand/Model" disabled="">
                            <div class="input-group-append">
                                <span class="input-group-text bg-white border-left-0  border-bottom-0 rounded-0"><i class="fa fa-caret-down"></i></span>
                            </div>
                        </div>
                        <div class="input-group rounded-0">
                            <input type="text" class="form-control border-right-0 rounded-0 bg-white" placeholder="Select Package" disabled="">
                            <div class="input-group-append">
                                <span class="input-group-text bg-white border-left-0 rounded-0"><i class="fa fa-caret-down"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" @click.prevent="openModal(2)" v-else-if="page == 1 && configuration == 3">
                    <div class="size-32">
                        <img class="card-img-top img-fluid cursor-pointer hover-opacity-5" src="{{ url('/') }}/images/add-car.jpg" alt="Card image">
                    </div>
                    <div class="card-body">
                        <div class="input-group rounded-0 rounded-top" @click.prevent="openModal(2)">
                            <input type="text" class="form-control border-right-0 rounded-0 border-bottom-0" placeholder="Select Brand/Model">
                            <div class="input-group-append">
                                <span class="input-group-text bg-white border-left-0  border-bottom-0 rounded-0"><i class="fa fa-caret-down"></i></span>
                            </div>
                        </div>
                        <div class="input-group rounded-0" @click.prevent="openModal(3)">
                            <input type="text" class="form-control border-right-0 rounded-0" placeholder="Select Package">
                            <div class="input-group-append">
                                <span class="input-group-text bg-white border-left-0 rounded-0"><i class="fa fa-caret-down"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" v-else-if="page == 2 && configuration == 3">
                    <div class="card-header bg-white">
                        <a class="btn btn-link text-danger" href="#" @click.prevent="page=2">Brand/Modal</a> <a class="btn btn-link text-dark" href="#" @click.prevent="page=3">Package</a>
                        <i class="fa fa-close position-absolute right-10 top-10 cursor-pointer btn-light text-danger" @click.prevent="page=1"></i>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Select Brand/Model" v-model="search">
                        </div>
                        <ul class="list-group compare-scroll" v-if="filteredBrands.length">
                            <li class="list-group-item py-1 cursor-pointer border-0" v-for="b in filteredBrands" :class="{'text-danger': b.id == brand.id}">
                                <strong><i class="fa fa-check" v-if="b.id == brand.id"></i> @{{ b.name }}</strong>
                                <ul class="list-group list-group-flush border-left">
                                    <li class="list-group-item list-group-item-action py-1 cursor-pointer border-0" v-for="m in models" @click.prevent="modelSelected(b, m)" :class="{'text-danger': m.id == model.id}" v-if="b.id == m.brand_id"><i class="fa fa-check" v-if="m.id == model.id"></i> @{{ m.name }}</li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="list-group compare-scroll" v-else>
                            <li class="list-group-item py-1 cursor-pointer border-0" v-for="b in brands" :class="{'text-danger': b.id == brand.id}">
                                <strong><i class="fa fa-check" v-if="b.id == brand.id"></i> @{{ b.name }}</strong>
                                <ul class="list-group list-group-flush border-left">
                                    <li class="list-group-item list-group-item-action py-1 cursor-pointer border-0" v-for="m in filteredModels" @click.prevent="modelSelected(b, m)" :class="{'text-danger': m.id == model.id}" v-if="b.id == m.brand_id"><i class="fa fa-check" v-if="m.id == model.id"></i> @{{ m.name }}</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card" v-else-if="page == 3 && configuration == 3">
                    <div class="card-header bg-white">
                        <a class="btn btn-link text-dark" href="#" @click.prevent="page=2">Brand/Model</a> <a class="btn btn-link text-danger" href="#" @click.prevent="page=3">Package</a>
                        <i class="fa fa-close position-absolute right-10 top-10 cursor-pointer btn-light text-danger" @click.prevent="page=1"></i>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Select Package" v-model="search">
                        </div>
                        <ul class="list-group list-group-flush compare-scroll">
                            <li class="list-group-item list-group-item-action py-1 cursor-pointer" v-for="p in filteredPackages" :class="{'text-danger': p.id == package.id}" v-if="p.model_id == model.id" @click.prevent="packageSelected(p, 2)">
                                <i class="fa fa-check" v-if="p.id == package.id"></i> @{{ p.name }}
                            </li>
                        </ul>
                    </div>
                    <div class="w-100 h-parent position-absolute dark-opacity-3" v-if="loading == 3"><i class="fa fa-spinner fa-spin text-white position-center"></i></div>
                </div>
                <div class="card" v-else-if="configuration > 3 || products.length > 2">
                    <div class="size-32">
                        <img class="card-img-top img-fluid" :src="'{{ url('/') }}/assets/products/'+products[2].id+'/'+products[2].image1" alt="Product Image">
                    </div>
                    <div class="card-body">
                        <i class="fa fa-close position-absolute right-10 top-10 cursor-pointer btn-light text-danger" @click.prevent="page=1; configuration = 3; removeProduct(2)"></i>
                        <div><span>@{{ products[2].brand.name }} @{{ products[2].model.name }} @{{ products[2].manufacturing_year }}, @{{ products[2].package.name }}</span> <i class="fa fa-pencil cursor-pointer btn-light text-danger" @click.prevent="page=1; configuration = 3; removeProduct(2)"></i></div>
                        <div class="display-6 text-dark">Tk. @{{ products[2].msrp }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 text-center py-4">
                <a class="btn btn-danger" href="#" @click.prevent="compare()">Compare Now</a>
            </div>
            @if(isset($products) && count($products)>0)
            @php($three = array_chunk($products, 3)[0])
            @php($category = strtolower($type))
            <div class="col-12">
                <div class="row">
                    <div class="col-12 cursor-pointer collapsed" data-toggle="collapse" data-target="#general-specification">
                        <div class="row mx-0 list-group-item-danger border border-light">
                            <div class="col py-2"><strong>General Specification</strong></div>
                            <div class="col py-2"></div>
                            @if(isset($products) && count($products)>1)
                            <div class="col py-2"></div>
                            @endif
                            @if(isset($products) && count($products)>2)
                            <div class="col py-2"></div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 collapse striped show" id="general-specification" data-parent="#compare">
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Brand</div>
                            </div>
                            @foreach($products as $product)
                                <div class="col px-3 py-2 text-center">
                                    {{ $product->$category->brand->name ?? '' }}
                                </div>
                            @endforeach
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Model</div>
                            </div>
                            @foreach($products as $product)
                                <div class="col px-3 py-2 text-center">
                                    {{ $product->$category->model->name ?? '' }}
                                </div>
                            @endforeach
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Body Type</div>
                            </div>
                            @foreach($products as $product)
                                <div class="col px-3 py-2 text-center">
                                    {{ $product->$category->body_type->name ?? '' }}
                                </div>
                            @endforeach
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Package</div>
                            </div>
                            @foreach($products as $product)
                                <div class="col px-3 py-2 text-center">
                                    {{ $product->$category->package->name ?? '' }}
                                </div>
                            @endforeach
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Displacement</div>
                            </div>
                            @foreach($products as $product)
                                <div class="col px-3 py-2 text-center">
                                    {{ $product->$category->displacement->name ?? '' }}
                                </div>
                            @endforeach
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Make Year</div>
                            </div>
                            @foreach($products as $product)
                                <div class="col px-3 py-2 text-center">
                                    {{ $product->$category->manufacturing_year ?? '' }}
                                </div>
                            @endforeach
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Ground Clearance</div>
                            </div>
                            @foreach($products as $product)
                                <div class="col px-3 py-2 text-center">
                                    {{ $product->$category->ground_clearance->name ?? '' }}
                                </div>
                            @endforeach
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Drive Type</div>
                            </div>
                            @foreach($products as $product)
                                <div class="col px-3 py-2 text-center">
                                    {{ $product->$category->drive_type->name ?? '' }}
                                </div>
                            @endforeach
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Engine Type</div>
                            </div>
                            @foreach($products as $product)
                                <div class="col px-3 py-2 text-center">
                                    {{ $product->$category->engine_type->name ?? '' }}
                                </div>
                            @endforeach
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Fuel Type</div>
                            </div>
                            @foreach($products as $product)
                                <div class="col px-3 py-2 text-center">
                                    {{ $product->$category->fuel_type->name ?? '' }}
                                </div>
                            @endforeach
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Price</div>
                            </div>
                            @foreach($products as $product)
                                <div class="col px-3 py-2 text-center">
                                    Tk.{{ $product->msrp ?? '' }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 cursor-pointer collapsed" data-toggle="collapse" data-target="#key-feature">
                        <div class="row mx-0 list-group-item-danger border border-light">
                            <div class="col py-2"><strong>Key Feature</strong></div>
                            <div class="col py-2"></div>
                            @if(isset($products) && count($products)>1)
                            <div class="col py-2"></div>
                            @endif
                            @if(isset($products) && count($products)>2)
                            <div class="col py-2"></div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 striped collapse show" id="key-feature" data-parent="#compare">
                        @foreach($key_features as $key_feature)
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>{{ ucwords($key_feature->name) }}</div>
                            </div>
                            @foreach($products as $product)
                                <div class="col px-3 py-2 text-center">
                                    @if($product->$category->key_feature && in_array($key_feature->id, $product->$category->key_feature)) <i class="fa fa-check text-success"></i> @else <i class="fa fa-close text-danger"></i> @endif
                                </div>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 cursor-pointer collapsed" data-toggle="collapse" data-target="#engine-transmission">
                        <div class="row mx-0 list-group-item-danger border border-light">
                            <div class="col py-2"><strong>Engine & Transmission</strong></div>
                            <div class="col py-2"></div>
                            @if(isset($products) && count($products)>1)
                            <div class="col py-2"></div>
                            @endif
                            @if(isset($products) && count($products)>2)
                            <div class="col py-2"></div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 collapse striped" id="engine-transmission" data-parent="#compare">
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Engine Type</div>
                            </div>
                            @foreach($products as $product)
                                <div class="col px-3 py-2 text-center">
                                    {{ $product->$category->engine_type->name ?? '' }}
                                </div>
                            @endforeach
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Engine Capacity</div>
                            </div>
                            @foreach($products as $product)
                                <div class="col px-3 py-2 text-center">
                                    {{ $product->$category->engine_capacity->name ?? '' }}
                                </div>
                            @endforeach
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Displacement</div>
                            </div>
                            @foreach($products as $product)
                                <div class="col px-3 py-2 text-center">
                                    {{ $product->$category->displacement->name ?? '' }}cc
                                </div>
                            @endforeach
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Maximum Power</div>
                            </div>
                            @foreach($products as $product)
                                <div class="col px-3 py-2 text-center">
                                    {{ $product->$category->maximum_power ?? '' }}
                                </div>
                            @endforeach
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Maximum Torque</div>
                            </div>
                            @foreach($products as $product)
                                <div class="col px-3 py-2 text-center">
                                    {{ $product->$category->maximum_torque ?? '' }}
                                </div>
                            @endforeach
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Milage kmpl</div>
                            </div>
                            @foreach($products as $product)
                                <div class="col px-3 py-2 text-center">
                                    {{ $product->$category->milage ?? '' }}kmpl
                                </div>
                            @endforeach
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Engine Check Warning</div>
                            </div>
                            @foreach($products as $product)
                                <div class="col px-3 py-2 text-center">
                                    {{ $product->$category->engine_check_warning ?? '' }}
                                </div>
                            @endforeach
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Gear Box</div>
                            </div>
                            @foreach($products as $product)
                                <div class="col px-3 py-2 text-center">
                                    {{ $product->$category->gear_box->name ?? '' }}
                                </div>
                            @endforeach
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Transmission</div>
                            </div>
                            @foreach($products as $product)
                                <div class="col px-3 py-2 text-center">
                                    {{ $product->$category->transmission->name ?? '' }}
                                </div>
                            @endforeach
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Cylinder</div>
                            </div>
                            @foreach($products as $product)
                                <div class="col px-3 py-2 text-center">
                                    {{ $product->$category->cylinder->name ?? '' }}
                                </div>
                            @endforeach
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Drive Type</div>
                            </div>
                            @foreach($products as $product)
                                <div class="col px-3 py-2 text-center">
                                    {{ $product->$category->drive_type->name ?? '' }}
                                </div>
                            @endforeach
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Turning Radius</div>
                            </div>
                            @foreach($products as $product)
                                <div class="col px-3 py-2 text-center">
                                    {{ $product->$category->turning_radius ?? '' }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <table class="table table-striped mb-0">
                    <thead>
                        <tr data-toggle="collapse" href="#weight-dimension" class="cursor-pointer">
                            <th>Weight & Dimension</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="weight-dimension" class="collapse" data-parent="#compare">
                        <tr>
                            <td>Gross Weight</td>
                            <td>{{ $three[0]->$category->weight ?? '' }}</td>
                            <td>{{ $three[1]->$category->weight ?? '' }}</td>
                            <td>{{ $three[2]->$category->weight ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>Ground Clearance</td>
                            <td>{{ $three[0]->$category->ground_clearance->name ?? '' }}</td>
                            <td>{{ $three[1]->$category->ground_clearance->name ?? '' }}</td>
                            <td>{{ $three[2]->$category->ground_clearance->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>Wheel Base</td>
                            <td>{{ $three[0]->$category->wheel_base->name ?? '' }}</td>
                            <td>{{ $three[1]->$category->wheel_base->name ?? '' }}</td>
                            <td>{{ $three[2]->$category->wheel_base->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>No of Door</td>
                            <td>{{ $three[0]->$category->no_of_door ?? '' }}</td>
                            <td>{{ $three[1]->$category->no_of_door ?? '' }}</td>
                            <td>{{ $three[2]->$category->no_of_door ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>Length</td>
                            <td>{{ $three[0]->$category->length ?? '' }}</td>
                            <td>{{ $three[1]->$category->length ?? '' }}</td>
                            <td>{{ $three[2]->$category->length ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>Width</td>
                            <td>{{ $three[0]->$category->width ?? '' }}</td>
                            <td>{{ $three[1]->$category->width ?? '' }}</td>
                            <td>{{ $three[2]->$category->width ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>Height</td>
                            <td>{{ $three[0]->$category->height ?? '' }}</td>
                            <td>{{ $three[1]->$category->height ?? '' }}</td>
                            <td>{{ $three[2]->$category->height ?? '' }}</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-striped mb-0">
                    <thead>
                        <tr data-toggle="collapse" href="#wheel-tyre" class="cursor-pointer">
                            <th>Wheels Tyre & Seating Capacity</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="wheel-tyre" class="collapse" data-parent="#compare">
                        <tr>
                            <td>Front Suspension</td>
                            <td>{{ $three[0]->$category->front_suspension ?? '' }}</td>
                            <td>{{ $three[1]->$category->front_suspension ?? '' }}</td>
                            <td>{{ $three[2]->$category->front_suspension ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>Rear Suspension</td>
                            <td>{{ $three[0]->$category->rear_suspension ?? '' }}</td>
                            <td>{{ $three[1]->$category->rear_suspension ?? '' }}</td>
                            <td>{{ $three[2]->$category->rear_suspension ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>Wheel Type</td>
                            <td>{{ $three[0]->$category->wheel_type->name ?? '' }}</td>
                            <td>{{ $three[1]->$category->wheel_type->name ?? '' }}</td>
                            <td>{{ $three[2]->$category->wheel_type->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>Wheel Size</td>
                            <td>{{ $three[0]->$category->wheel_size ?? '' }}</td>
                            <td>{{ $three[1]->$category->wheel_size ?? '' }}</td>
                            <td>{{ $three[2]->$category->wheel_size ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>Turning Radius</td>
                            <td>{{ $three[0]->$category->turning_radius ?? '' }}</td>
                            <td>{{ $three[1]->$category->turning_radius ?? '' }}</td>
                            <td>{{ $three[2]->$category->turning_radius ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>Tyre Type</td>
                            <td>{{ $three[0]->$category->tyre_type->name ?? '' }}</td>
                            <td>{{ $three[1]->$category->tyre_type->name ?? '' }}</td>
                            <td>{{ $three[2]->$category->tyre_type->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>Front Tyre Size</td>
                            <td>{{ $three[0]->$category->front_tyre_size ?? '' }}</td>
                            <td>{{ $three[1]->$category->front_tyre_size ?? '' }}</td>
                            <td>{{ $three[2]->$category->front_tyre_size ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>Rear Tyre Size</td>
                            <td>{{ $three[0]->$category->rear_tyre_size ?? '' }}</td>
                            <td>{{ $three[1]->$category->rear_tyre_size ?? '' }}</td>
                            <td>{{ $three[2]->$category->rear_tyre_size ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>Stearing Type</td>
                            <td>{{ $three[0]->$category->steering_type ?? '' }}</td>
                            <td>{{ $three[1]->$category->steering_type ?? '' }}</td>
                            <td>{{ $three[2]->$category->steering_type ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>Seating Capacity</td>
                            <td>{{ $three[0]->$category->seating_capacity ?? '' }}</td>
                            <td>{{ $three[1]->$category->seating_capacity ?? '' }}</td>
                            <td>{{ $three[2]->$category->seating_capacity ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>Front Brake Type</td>
                            <td>{{ $three[0]->$category->front_brake->name ?? '' }}</td>
                            <td>{{ $three[1]->$category->front_brake->name ?? '' }}</td>
                            <td>{{ $three[2]->$category->front_brake->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>Rear Brake Type</td>
                            <td>{{ $three[0]->$category->rear_brake->name ?? '' }}</td>
                            <td>{{ $three[1]->$category->rear_brake->name ?? '' }}</td>
                            <td>{{ $three[2]->$category->rear_brake->name ?? '' }}</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-striped mb-0">
                    <thead>
                        <tr data-toggle="collapse" href="#fuel-consumption" class="cursor-pointer">
                            <th>Fuel & Consumption</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="fuel-consumption" class="collapse" data-parent="#compare">
                        <tr>
                            <td>Fuel Type</td>
                            <td>{{ $three[0]->$category->fuel_type->name ?? '' }}</td>
                            <td>{{ $three[1]->$category->fuel_type->name ?? '' }}</td>
                            <td>{{ $three[2]->$category->fuel_type->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>Fuel Tank Capacity</td>
                            <td>{{ $three[0]->$category->fuel_tank_capacity ?? '' }}</td>
                            <td>{{ $three[1]->$category->fuel_tank_capacity ?? '' }}</td>
                            <td>{{ $three[2]->$category->fuel_tank_capacity ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>Millage Kmpl</td>
                            <td>{{ $three[0]->$category->milage ?? '' }}</td>
                            <td>{{ $three[1]->$category->milage ?? '' }}</td>
                            <td>{{ $three[2]->$category->milage ?? '' }}</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-striped mb-0">
                    <thead>
                        <tr data-toggle="collapse" href="#interior-exterior" class="cursor-pointer">
                            <th>Interior/Exterior</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="interior-exterior" class="collapse" data-parent="#compare">
                        @foreach($interior_features as $interior_feature)
                        <tr>
                            <td>{{ ucwords($interior_feature->name) }}</td>
                            <td>@if($three[0]->$category->interior_feature && in_array($interior_feature->id, $three[0]->$category->interior_feature)) <i class="fa fa-check text-success"></i> @else <i class="fa fa-close text-danger"></i> @endif</td>
                            <td>@if(isset($three[1]) && $three[1]->$category->interior_feature && in_array($interior_feature->id, $three[1]->$category->interior_feature)) <i class="fa fa-check text-success"></i> @else <i class="fa fa-close text-danger"></i> @endif</td>
                            <td>@if(isset($three[2]) && $three[2]->$category->interior_feature && in_array($interior_feature->id, $three[2]->$category->interior_feature)) <i class="fa fa-check text-success"></i> @else <i class="fa fa-close text-danger"></i> @endif</td>
                        </tr>
                        @endforeach
                        @foreach($exterior_features as $exterior_feature)
                        <tr>
                            <td>{{ ucwords($exterior_feature->name) }}</td>
                            <td>@if($three[0]->$category->exterior_feature && in_array($exterior_feature->id, $three[0]->$category->exterior_feature)) <i class="fa fa-check text-success"></i> @else <i class="fa fa-close text-danger"></i> @endif</td>
                            <td>@if(isset($three[1]) && $three[1]->$category->exterior_feature && in_array($exterior_feature->id, $three[1]->$category->exterior_feature)) <i class="fa fa-check text-success"></i> @else <i class="fa fa-close text-danger"></i> @endif</td>
                            <td>@if(isset($three[2]) && $three[2]->$category->exterior_feature && in_array($exterior_feature->id, $three[2]->$category->exterior_feature)) <i class="fa fa-check text-success"></i> @else <i class="fa fa-close text-danger"></i> @endif</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-12 cursor-pointer collapsed" data-toggle="collapse" data-target="#safety-security">
                        <div class="row mx-0">
                            <div class="col py-2"><strong>Safety and Security</strong></div>
                            <div class="col py-2"></div>
                            @if(isset($products) && count($products)>1)
                            <div class="col py-2"></div>
                            @endif
                            @if(isset($products) && count($products)>2)
                            <div class="col py-2"></div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 collapse striped" id="safety-security" data-parent="#compare">
                    @foreach($safety_securities as $safety_security)
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>{{ ucwords($safety_security->name) }}</div>
                            </div>
                            @foreach($products as $product)
                                <div class="col px-3 py-2 text-center">
                                    @if($product->$category->safety_security && in_array($safety_security->id, $product->$category->safety_security)) <i class="fa fa-check text-success"></i> @else <i class="fa fa-close text-danger"></i> @endif
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 cursor-pointer collapsed" data-toggle="collapse" data-target="#additional-feature">
                        <div class="row mx-0 list-group-item-danger">
                            <div class="col py-2"><strong>Additional Feature</strong></div>
                            <div class="col py-2"></div>
                            @if(isset($products) && count($products)>1)
                            <div class="col py-2"></div>
                            @endif
                            @if(isset($products) && count($products)>2)
                            <div class="col py-2"></div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 collapse" id="additional-feature" data-parent="#compare">
                        <div class="row mx-0">
                            @foreach($additional_features as $additional_feature)
                                <div class="col py-2">
                                    <div>{{ ucwords($additional_feature->name) }}</div>
                                </div>
                                @foreach($products as $product)
                                    <div class="col px-3 py-2 text-center">
                                        @if($product->$category->additional_feature && in_array($additional_feature->id, $product->$category->additional_feature)) <i class="fa fa-check text-success"></i> @else <i class="fa fa-close text-danger"></i> @endif
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

@endsection
@section('script')
<script>
    var vuejs = new Vue({
        el: '#compare',
        data: {
            configuration: @if(isset($products)) {{ count($products)+1 }} @endif,
            products: @json($products),
            search:"",
            brand: {},
            brands: @json($brands),
            model:  {},
            models: @json($models),
            package: {},
            packages: @json($packages),
            page: 1,
            loading: 0
        },
        methods: {
            openModal: function (p) {
                if (p == 1) {
                    this.page = 1;
                } else if (p == 2) {
                    this.page = 2;
                } else if (p == 3) {
                    if (this.model)
                        this.page = 3;
                }

                $('#sell-car-modal').modal('show');
            },
            modelSelected: function (b, m) {
                this.brand = b;
                this.model = m;
                this.search = '';
                this.page = 3;
                console.log(this.loading);
            },
            packageSelected: function (p, i=0) {
                this.package = p;
                console.log(this.loading);
                this.loading = i+1;
                Vue.nextTick(function() {
                    setParentsHeight();
                });
                this.getProduct(i);
            },
            isEmpty: function(obj) {
                return Object.keys(obj).length === 0;
            },
            getProduct: function(i) {
                var _this = this;
                
                $.ajax({
                    url: "{{ route('get-product') }}?brand_id=" + _this.brand.id + "&model_id=" + _this.model.id + "&package_id=" + _this.package.id,
                    dataType: "json",
                    success: function(result){
                        _this.page = 1;
                        _this.products[i] = result;
                        _this.configuration = _this.products.length+1;
                        _this.reset('brand', 'model', 'package');
                        _this.loading = 0;
                    }
                });
            },
            removeProduct: function(i) {
                this.reset('brand', 'model', 'package');
            },
            reset: function (...args) {
                for (var i = 0; i < args.length; i++) {
                    if (args[i] == 'brand') {
                        this.brand = {};
                    } else if (args[i] == 'model') {
                        this.model = {};
                    } else if (args[i] == 'package') {
                        this.package = {};
                    }
                }
                this.search = '';
            },
            compare: function() {
                var url = '{{ route("compare") }}/';
                for(let i=0; i<this.products.length; i++) {
                    if(i != 0)
                        url += '-and-';
                    url += this.products[i].brand.name + '-' + this.products[i].model.name + '-' + this.products[i].package.name;
                }
                window.location = url;
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
            },
            filteredPackages() {
                return this.packages.filter(item => {
                    return item.name.toLowerCase().startsWith(this.search.toLowerCase());
                })
            }
        },
        watch: {
        },
        created: function() {
        },
        mounted: function() {
        },
    });
</script>
@endsection
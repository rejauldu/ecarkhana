@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.car-background')
<section class="section-full content-inner-2" id="compare">
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
                    <div class="w-100 h-parent position-absolute dark-opacity-3" v-if="true"><i class="fa fa-spinner fa-spin text-white position-center"></i></div>
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
            @if(isset($type))
            @php($category = strtolower($type))
            <div class="col-12">
                <div class="compare_product_info">
                    <!--Basic-Info-Table-->
                    <div class="inventory_info_list">
                        <div class="listing_heading">
                            <div>General Information</div>
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                            <div class="sms-phn-hide">&nbsp;</div>
                        </div>
                        <ul>
                            <li class="info_heading">
                                <div>Brand</div>
                                <div>Model</div>
                                <div>Body type</div>
                                <div>Package</div>
                                <div>Displacement</div>
                                <div>Make Year</div>
                                <div>Ground Clearance</div>
                                <div>Drive Type</div>
                                <div>Engine Type</div>
                                <div>Fuel Type</div>
                                <div>Selling Price</div>
                            </li>
                            @foreach($products as $product)
                            <li>
                                <div>{{ $product->$category->brand->name ?? '' }}</div>
                                <div>{{ $product->$category->model->name ?? '' }}</div>
                                <div>{{ $product->$category->body_type->name ?? '' }}</div>
                                <div>{{ $product->$category->package->name ?? '' }}</div>
                                <div>{{ $product->$category->displacement->name ?? '' }}cc</div>
                                <div>{{ $product->$category->manufacturing_year ?? '' }}</div>
                                <div>{{ $product->$category->ground_clearance->name ?? '' }}</div>
                                <div>{{ $product->$category->drive_type->name ?? '' }}</div>
                                <div>{{ $product->$category->engine_type->name ?? '' }}</div>
                                <div>{{ $product->$category->fuel_type->name ?? '' }}</div>
                                <div>Tk.{{ $product->msrp ?? '' }}</div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="inventory_info_list">
                        <div class="listing_heading">
                            <div>Key Features</div>
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                            <div class="sms-phn-hide">&nbsp;</div>
                        </div>
                        <ul>
                            <li class="info_heading">
                                @foreach($key_features as $key_feature)
                                <div>{{ ucwords($key_feature->name) }}</div>
                                @endforeach
                            </li>
                            @foreach($products as $product)
                            <li>
                                @foreach($key_features as $key_feature)
                                <div class="text-center">@if($product->$category->key_feature && in_array($key_feature->id, $product->$category->key_feature)) <i class="fa fa-check text-success"></i> @else <i class="fa fa-close"></i> @endif</div>
                                @endforeach
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sms-sys-com">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="#">Engine & Transmission</a>
                                <ul style="display:none" class="list-group">
                                    <li>
                                        <div>Engine Type</div>
                                        <div>Engine Capacity</div>
                                        <div>Displacement</div>
                                        <div>Max Power</div>
                                        <div>Max Torque</div>
                                        <div>Milage Kmpl</div>
                                        <div>Engine Check & Warning</div>
                                        <div>Gear Box</div>
                                        <div>Transmission</div>
                                        <div>Cylinder</div>
                                        <div>Drive Type</div>
                                        <div>Min Turning Radius</div>
                                    </li>
                                    @foreach($products as $product)
                                    <li>
                                        <div>{{ $product->car->engine_type->name ?? '' }}</div>
                                        <div>{{ $product->car->engine_capacity ?? 0 }}cc</div>
                                        <div>{{ $product->car->displacement->name ?? '' }}cc</div>
                                        <div>{{ $product->car->maximum_power ?? '' }}</div>
                                        <div>{{ $product->car->maximum_torque ?? '' }}</div>
                                        <div>{{ $product->car->milage ?? '' }} kmpl</div>
                                        <div>{{ $product->car->engine_check_warning ?? '' }}</div>
                                        <div>{{ $product->car->gear_box->name ?? '' }}</div>
                                        <div>{{ $product->car->transmission->name ?? '' }}</div>
                                        <div>{{ $product->car->cylinder->name ?? '' }}</div>
                                        <div>{{ $product->car->drive_type->name ?? '' }}</div>
                                        <div>{{ $product->car->turning_radius ?? '' }}</div>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="list-group-item">
                                <a href="#">Weight & Dimension</a>
                                <ul style="display:none;">
                                    <li>
                                        <div>Gross Weight</div>
                                        <div>Seating Capacity</div>
                                        <div>Wheel Base</div>
                                        <div>Length</div>
                                        <div>Width</div>
                                        <div>Height</div>
                                    </li>
                                    <li>
                                        <div>1500kg</div>
                                        <div>5</div>
                                        <div>1200mm</div>
                                        <div>15cc</div>
                                        <div>20</div>
                                        <div>13</div>
                                    </li>
                                    <li>
                                        <div>1650kg</div>
                                        <div>8</div>
                                        <div>1500mm</div>
                                        <div>16cc</div>
                                        <div>21</div>
                                        <div>14</div>
                                    </li>
                                    <li class="sms-phn-hide">
                                        <div>1650kg</div>
                                        <div>8</div>
                                        <div>1500mm</div>
                                        <div>16cc</div>
                                        <div>21</div>
                                        <div>14</div>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-group-item">
                                <a href="#">Wheels Tyre & Seating Capacity</a>
                                <ul style="display:none;">
                                    <li>
                                        <div>Front Suspension</div>
                                        <div>Rear Suspension</div>
                                        <div>Wheel Type</div>
                                        <div>Wheel Size</div>
                                        <div>Tyre Type</div>
                                        <div>Front Tyre Size</div>
                                        <div>Rear Tyre Size</div>
                                        <div>Stearing Type</div>
                                        <div>Stearing Column</div>
                                        <div>Front Break Type</div>
                                        <div>Rear Break Type</div>
                                    </li>
                                    <li>
                                        <div>1500kg</div>
                                        <div>5</div>
                                        <div>1200mm</div>
                                        <div>15cc</div>
                                        <div>20</div>
                                        <div>13</div>
                                        <div>5</div>
                                        <div>1200mm</div>
                                        <div>15cc</div>
                                        <div>20</div>
                                        <div>13</div>
                                    </li>
                                    <li>
                                        <div>1500kg</div>
                                        <div>5</div>
                                        <div>1200mm</div>
                                        <div>15cc</div>
                                        <div>20</div>
                                        <div>13</div>
                                        <div>5</div>
                                        <div>1200mm</div>
                                        <div>15cc</div>
                                        <div>20</div>
                                        <div>13</div>
                                    </li>
                                    <li class="sms-phn-hide">
                                        <div>1500kg</div>
                                        <div>5</div>
                                        <div>1200mm</div>
                                        <div>15cc</div>
                                        <div>20</div>
                                        <div>13</div>
                                        <div>5</div>
                                        <div>1200mm</div>
                                        <div>15cc</div>
                                        <div>20</div>
                                        <div>13</div>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-group-item">
                                <a href="#">Fuel & Consumption</a>
                                <ul style="display:none;">
                                    <li>
                                        <div>Fuel Type</div>
                                        <div>Fuel Tank Capacity</div>
                                        <div>Millage Kmpl</div>
                                    </li>
                                    <li>
                                        <div>Hybrid</div>
                                        <div>500cc</div>
                                        <div>20kmpl</div>
                                    </li>
                                    <li>
                                        <div>Hybrid</div>
                                        <div>500cc</div>
                                        <div>20kmpl</div>
                                    </li>
                                    <li class="sms-phn-hide">
                                        <div>Hybrid</div>
                                        <div>500cc</div>
                                        <div>20kmpl</div>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-group-item">
                                <a href="#">Features</a> 
                                <ul style="display:none">
                                    <li>
                                        <div>Power Streaming</div>
                                        <div>Duel Front Car Bag</div>
                                        <div>Passenger Air Bag</div>
                                        <div>Automatic Climate</div>
                                        <div>Power Windows Form</div>
                                        <div>Fog Light Form</div>
                                        <div>4WD</div>
                                        <div>Anti-thief Device</div>
                                    </li>
                                    <li>
                                        <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                        <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                        <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                        <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                        <div><i class="fa fa-times" aria-hidden="true"></i></div>
                                        <div><i class="fa fa-times" aria-hidden="true"></i></div>
                                        <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                        <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                    </li>
                                    <li>
                                        <div><i class="fa fa-times" aria-hidden="true"></i></div>
                                        <div><i class="fa fa-times" aria-hidden="true"></i></div>
                                        <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                        <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                        <div><i class="fa fa-times" aria-hidden="true"></i></div>
                                        <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                        <div><i class="fa fa-times" aria-hidden="true"></i></div>
                                        <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                    </li>
                                    <li class="sms-phn-hide">
                                        <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                        <div><i class="fa fa-times" aria-hidden="true"></i></div>
                                        <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                        <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                        <div><i class="fa fa-times" aria-hidden="true"></i></div>
                                        <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                        <div><i class="fa fa-times" aria-hidden="true"></i></div>
                                        <div><i class="fa fa-times" aria-hidden="true"></i></div>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-group-item">
                                <a href="#">Interior/Exterior</a> 
                                <ul style="display:none">
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li class="sms-phn-hide"></li>                               
                                </ul>
                            </li>
                        </ul>
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
                var url = '';
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
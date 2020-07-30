@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
	{{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.car-background')
    <!--================================= Start Compare -->
    <section class="compare-page inner_pages">
        <div class="container">
            <div class="compare_info">
                <h4>Compare {{ $product[0]->car->brand->name ?? '' }} {{ $product[0]->car->package->name ?? '' }}, {{ $product[1]->car->brand->name ?? '' }} {{ $product[1]->car->package->name ?? '' }} and {{ $product[2]->car->brand->name ?? '' }} {{ $product[2]->car->package->name ?? '' }}</h4>
                <div class="compare_product_img">
                    <div class="inventory_info_list">
                        <ul>
                            <li id="filter_toggle" class="search_other_inventory"><i class="fa fa-search" aria-hidden="true"></i> Search Other Inventory</li>
                            <li>
                                <a href="{{ route('single-car-product', $product[0]->id) }}"><img src="{{ url('/assets/products/cars') }}/{{ $product[0]->photo ?? 'not-found.jpg' }}" alt="image"></a>
                            </li>
                            <li>
                                <a href="{{ route('single-car-product', $product[1]->id) }}"><img src="{{ url('/assets/products/cars') }}/{{ $product[1]->photo ?? 'not-found.jpg' }}" alt="image"></a>
                            </li>
                            <li>
                                <a href="{{ route('single-car-product', $product[2]->id) }}"><img src="{{ url('/assets/products/cars') }}/{{ $product[2]->photo ?? 'not-found.jpg' }}" alt="image"></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="compare_product_title gray-bg">
                    <div class="inventory_info_list">
                        <ul>
                            <li class="listing_heading">Compare <br> Inventorys <span class="td_divider"></span></li>
                            <li><a href="#">{{ $product[0]->car->brand->name ?? '' }} {{ $product[0]->car->model->name ?? '' }} {{ $product[0]->car->package->name ?? '' }}</a>
                                <p class="price">${{ $product[0]->msrp ?? '' }}</p>
                                <span class="vs">V/s</span></li>
                            <li><a href="#">{{ $product[1]->car->brand->name ?? '' }} {{ $product[1]->car->model->name ?? '' }} {{ $product[1]->car->package->name ?? '' }}</a>
                                <p class="price">${{ $product[1]->msrp ?? '' }}</p>
                                <span class="vs">V/s</span></li>
                            <li><a href="#">{{ $product[2]->car->brand->name ?? '' }} {{ $product[2]->car->model->name ?? '' }} {{ $product[2]->car->package->name ?? '' }}</a>
                                <p class="price">${{ $product[2]->msrp ?? '' }}</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="compare_product_info">
                    <!--Basic-Info-Table-->
                    <div class="inventory_info_list">
                        <div class="listing_heading">
                            <div>General Information</div>
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
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
                                <div>Dimension</div>
                                <div>Engine Type</div>
                                <div>Fuel Type</div>
                                <div>Condition</div>
                                <div>Seller Type</div>
                                <div>Selling Price</div>
                                <div>On Road Price</div>
                            </li>
                            <li>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->model->name ?? '' }}</div>
                                <div>{{ $product[0]->car->package->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                
                            </li>
                            <li>
                                <div>{{ $product[1]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[1]->car->model->name ?? '' }}</div>
                                <div>{{ $product[1]->car->package->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                            </li>
                            <li>
                                <div>{{ $product[2]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[2]->car->model->name ?? '' }}</div>
                                <div>{{ $product[2]->car->package->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                            </li>
                        </ul>
                    </div>


                    <div class="sms-sys-com">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="#">Key Features</a> 
                                  <ul style="display:none">
                                      <li>
                                          <div>Transmission</div>
                                          <div>Gross Weight</div>
                                          <div>Max Power</div>
                                          <div>Seating Capacity</div>
                                          <div>Gear Box</div>
                                          <div>EMI Start From</div>
                                          <div>Millage Kmpl</div>
                                          <div>Boot/Space Cargo</div>
                                          <div>Fuel Tank Capacity</div>
                                      </li>
                                      <li>
                                          <div>Automatic</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                      </li>
                                      <li>
                                          <div>Automatic</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                      </li>
                                      <li>
                                          <div>Automatic</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                      </li>
                                  </ul>
                                
                            </li>
                               





                            <li class="list-group-item">
                                <a href="#">Model</a>
                            </li>
                        </ul>
                    </div>












                    <!--Technical-Specification-Table-->
                    <div class="inventory_info_list">
                        <div class="listing_heading">
                            <div>Technical Specification</div>
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                        </div>
                        <ul>
                            <li class="info_heading">
                                <div>Engine Type</div>
                                <div>Cylinder</div>
                                <div>Bootspace</div>
                                <div>Front suspension</div>
                                <div>Fuel Tank Capacity</div>
                                <div>Seating Capacity</div>
                                <div>Transmission Type</div>
                            </li>
                            <li>
                                <div>{{ $product[0]->car->engine_type->name ?? '' }}</div>
                                <div>{{ $product[0]->car->cylinder->name ?? '' }}</div>
                                <div>{{ $product[0]->car->boot_space ?? '' }}</div>
                                <div>{{ $product[0]->car->front_suspension ?? '' }}</div>
                                <div>{{ $product[0]->car->fuel_tank_capacity ?? '' }}</div>
                                <div>{{ $product[0]->car->seating_capacity ?? '' }}</div>
                                <div>{{ $product[0]->car->transmission->name ?? '' }}</div>
                            </li>
                            <li>
                                <div>{{ $product[1]->car->engine_type->name ?? '' }}</div>
                                <div>{{ $product[1]->car->cylinder->name ?? '' }}</div>
                                <div>{{ $product[1]->car->boot_space ?? '' }}</div>
                                <div>{{ $product[1]->car->front_suspension ?? '' }}</div>
                                <div>{{ $product[1]->car->fuel_tank_capacity ?? '' }}</div>
                                <div>{{ $product[1]->car->seating_capacity ?? '' }}</div>
                                <div>{{ $product[1]->car->transmission->name ?? '' }}</div>
                            </li>
                            <li>
                                <div>{{ $product[2]->car->engine_type->name ?? '' }}</div>
                                <div>{{ $product[2]->car->cylinder->name ?? '' }}</div>
                                <div>{{ $product[2]->car->boot_space ?? '' }}</div>
                                <div>{{ $product[2]->car->front_suspension ?? '' }}</div>
                                <div>{{ $product[2]->car->fuel_tank_capacity ?? '' }}</div>
                                <div>{{ $product[2]->car->seating_capacity ?? '' }}</div>
                                <div>{{ $product[2]->car->transmission->name ?? '' }}</div>
                            </li>
                        </ul>
                    </div>

                    <!--Accessories-->
                    <div class="inventory_info_list">
                        <div class="listing_heading">
                            <div>Accessories</div>
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                        </div>
                        <ul>
                            <li class="info_heading">
								@foreach($key_features as $key_feature)
									<div>{{ ucfirst($key_feature->name) }}</div>
								@endforeach
                            </li>
                            <li>
								@foreach($key_features as $key_feature)
									@if(in_array($key_feature->id, $product[0]->car->key_feature))
										<div><i class="fa fa-check" aria-hidden="true"></i></div>
									@else
										<div><i class="fa fa-close" aria-hidden="true"></i></div>
									@endif
								@endforeach
                            </li>
                            <li>
                                @foreach($key_features as $key_feature)
									@if(in_array($key_feature->id, $product[1]->car->key_feature))
										<div><i class="fa fa-check" aria-hidden="true"></i></div>
									@else
										<div><i class="fa fa-close" aria-hidden="true"></i></div>
									@endif
								@endforeach
                            </li>
                            <li>
                                @foreach($key_features as $key_feature)
									@if(in_array($key_feature->id, $product[2]->car->key_feature))
										<div><i class="fa fa-check" aria-hidden="true"></i></div>
									@else
										<div><i class="fa fa-close" aria-hidden="true"></i></div>
									@endif
								@endforeach
                            </li>
                        </ul>
                    </div>
                    <div class="inventory_info_list text-center">
                        <ul>
                            <li>&nbsp;</li>
                            <li><a href="{{ route('single-car-product', $product[0]->id) }}" class="button red">View Detail</a></li>
                            <li><a href="{{ route('single-car-product', $product[1]->id) }}" class="button red">View Detail</a></li>
                            <li><a href="{{ route('single-car-product', $product[2]->id) }}" class="button red">View Detail</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
End Compare -->

@endsection
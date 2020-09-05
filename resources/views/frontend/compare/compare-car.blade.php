@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif
@php($type = isset($type)?$type:'car')
@include('layouts.frontend.'.strtolower($type).'-background')
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
            @include('frontend.compare.configuration')
            @php($total = 0)
            @if(isset($products))
            @php($total = count($products))
            @mobile
            @php($total = $total>2?2:$total)
            @endmobile
            @endif
            @if($total>0)
            <div class="col-12 bg-white shadow-sm alert alert-dismissible m-0 py-1 sticky-top">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <div class="row">
                            <div class="col-6 @mobile px-0 @endmobile"><div class="size-32 position-relative"><img src="{{ url('/') }}/assets/products/{{ $products[0]->id }}/{{ $products[0]->image1 ?? 'not-found.jpg'}}" class="img-fluid" /></div></div>
                            <div class="col-6 @mobile px-0 @endmobile overflow-hidden">
                                <div class="text-dark @mobile text-small @endmobile">{{ $products[0]->name }}</div>
                                <div class="text-secondary"><small>TK.{{ $products[0]->msrp }}</small></div>
                            </div>
                        </div>
                    </div>
                    @if($total>1)
                    <div class="col">
                        <div class="row">
                            <div class="col-6 @mobile px-0 @endmobile"><div class="size-32 position-relative"><img src="{{ url('/') }}/assets/products/{{ $products[1]->id }}/{{ $products[1]->image1 ?? 'not-found.jpg'}}" class="img-fluid" /></div></div>
                            <div class="col-6 @mobile px-0 @endmobile overflow-hidden">
                                <div class="text-dark @mobile text-small @endmobile">{{ $products[1]->name }}</div>
                                <div class="text-secondary"><small>TK.{{ $products[1]->msrp }}</small></div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($total>2)
                    <div class="col d-none d-md-block">
                        <div class="row">
                            <div class="col-6 @mobile px-0 @endmobile"><div class="size-32 position-relative"><img src="{{ url('/') }}/assets/products/{{ $products[2]->id }}/{{ $products[2]->image1 ?? 'not-found.jpg'}}" class="img-fluid" /></div></div>
                            <div class="col-6 @mobile px-0 @endmobile overflow-hidden">
                                <div class="text-dark @mobile text-small @endmobile">{{ $products[2]->name }}</div>
                                <div class="text-secondary"><small>TK.{{ $products[2]->msrp }}</small></div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @endif
            @if($total>0)
            @php($category = strtolower($type))
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="row mx-0 list-group-item-danger border border-light">
                            <div class="col py-2"><strong>General Specification</strong></div>
                            <div class="col py-2"></div>
                            @if($total>1)
                            <div class="col py-2"></div>
                            @endif
                            @if($total>2)
                            <div class="col py-2"></div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 striped" id="general-specification">
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Brand</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->brand->name ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Model</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->model->name ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Body Type</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->body_type->name ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Package</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->package->name ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Displacement</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->displacement->name ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Make Year</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->manufacturing_year ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Ground Clearance</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->ground_clearance->name ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Drive Type</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->drive_type->name ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Engine Type</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->engine_type->name ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Fuel Type</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->fuel_type->name ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Price</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    Tk.{{ $products[$i]->msrp ?? '' }}
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 cursor-pointer collapsed" data-toggle="collapse" data-target="#key-feature">
                        <div class="row mx-0 list-group-item-danger border border-light">
                            <div class="col py-2"><strong>Key Feature</strong></div>
                            <div class="col py-2"></div>
                            @if($total>1)
                            <div class="col py-2"></div>
                            @endif
                            @if($total>2)
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
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    @if($products[$i]->$category->key_feature && in_array($key_feature->id, $products[$i]->$category->key_feature)) <i class="fa fa-check text-success"></i> @else <i class="fa fa-close text-danger"></i> @endif
                                </div>
                            @endfor
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 cursor-pointer collapsed" data-toggle="collapse" data-target="#engine-transmission">
                        <div class="row mx-0 list-group-item-danger border border-light">
                            <div class="col py-2"><strong>Engine & Transmission</strong></div>
                            <div class="col py-2"></div>
                            @if($total>1)
                            <div class="col py-2"></div>
                            @endif
                            @if($total>2)
                            <div class="col py-2"></div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 collapse striped" id="engine-transmission" data-parent="#compare">
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Engine Type</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->engine_type->name ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Engine Capacity</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->engine_capacity->name ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Displacement</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->displacement->name ?? '' }}cc
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Maximum Power</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->maximum_power ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Maximum Torque</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->maximum_torque ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Milage kmpl</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->milage ?? '' }}kmpl
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Engine Check Warning</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->engine_check_warning ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Gear Box</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->gear_box->name ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Transmission</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->transmission->name ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Cylinder</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->cylinder->name ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Drive Type</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->drive_type->name ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Turning Radius</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->turning_radius ?? '' }}
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 cursor-pointer collapsed" data-toggle="collapse" data-target="#weight-dimension">
                        <div class="row mx-0 list-group-item-danger border border-light">
                            <div class="col py-2"><strong>Weight & Dimension</strong></div>
                            <div class="col py-2"></div>
                            @if($total>1)
                            <div class="col py-2"></div>
                            @endif
                            @if($total>2)
                            <div class="col py-2"></div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 collapse striped" id="weight-dimension" data-parent="#compare">
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Gross Weight</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->weight ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Ground Clearance</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->ground_clearance->name ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Wheel Base</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->wheel_base->name ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>No of Door</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->no_of_door ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Length</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->length ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Width</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->width ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Height</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->height ?? '' }}
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 cursor-pointer collapsed" data-toggle="collapse" data-target="#wheel-tyre">
                        <div class="row mx-0 list-group-item-danger border border-light">
                            <div class="col py-2"><strong>Wheels Tyre & Seating Capacity</strong></div>
                            <div class="col py-2"></div>
                            @if($total>1)
                            <div class="col py-2"></div>
                            @endif
                            @if($total>2)
                            <div class="col py-2"></div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 collapse striped" id="wheel-tyre" data-parent="#compare">
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Front Suspension</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->front_suspension ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Rear Suspension</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->rear_suspension ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Wheel Type</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->wheel_type->name ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Wheel Size</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->wheel_size->name ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Turning Radius</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->turning_radius ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Tyre Type</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->tyre_type->name ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Front Tyre Size</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->front_tyre_size ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Rear Tyre Size</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->rear_tyre_size ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Stearing Type</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->steering_type ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Seating Capacity</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->seating_capacity ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Front Brake Type</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->front_brake->name ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Rear Brake Type</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->rear_brake->name ?? '' }}
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 cursor-pointer collapsed" data-toggle="collapse" data-target="#fuel-consumption">
                        <div class="row mx-0 list-group-item-danger border border-light">
                            <div class="col py-2"><strong>Fuel & Consumption</strong></div>
                            <div class="col py-2"></div>
                            @if($total>1)
                            <div class="col py-2"></div>
                            @endif
                            @if($total>2)
                            <div class="col py-2"></div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 collapse striped" id="fuel-consumption" data-parent="#compare">
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Fuel Type</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->fuel_type->name ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Fuel Tank Capacity</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->fuel_tank_capacity->name ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Millage Kmpl</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->milage ?? '' }}kmpl
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 cursor-pointer collapsed" data-toggle="collapse" data-target="#interior-exterior">
                        <div class="row mx-0 list-group-item-danger border border-light">
                            <div class="col py-2"><strong>Interior/Exterior</strong></div>
                            <div class="col py-2"></div>
                            @if($total>1)
                            <div class="col py-2"></div>
                            @endif
                            @if($total>2)
                            <div class="col py-2"></div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 striped collapse" id="interior-exterior" data-parent="#compare">
                        @foreach($interior_features as $interior_feature)
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>{{ ucwords($interior_feature->name) }}</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    @if($products[$i]->$category->interior_feature && in_array($interior_feature->id, $products[$i]->$category->interior_feature)) <i class="fa fa-check text-success"></i> @else <i class="fa fa-close text-danger"></i> @endif
                                </div>
                            @endfor
                        </div>
                        @endforeach
                        @foreach($exterior_features as $exterior_feature)
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>{{ ucwords($exterior_feature->name) }}</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    @if($products[$i]->$category->exterior_feature && in_array($exterior_feature->id, $products[$i]->$category->exterior_feature)) <i class="fa fa-check text-success"></i> @else <i class="fa fa-close text-danger"></i> @endif
                                </div>
                            @endfor
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 cursor-pointer collapsed" data-toggle="collapse" data-target="#safety-security">
                        <div class="row mx-0 list-group-item-danger border border-light">
                            <div class="col py-2"><strong>Safety and Security</strong></div>
                            <div class="col py-2"></div>
                            @if($total>1)
                            <div class="col py-2"></div>
                            @endif
                            @if($total>2)
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
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    @if($products[$i]->$category->safety_security && in_array($safety_security->id, $products[$i]->$category->safety_security)) <i class="fa fa-check text-success"></i> @else <i class="fa fa-close text-danger"></i> @endif
                                </div>
                            @endfor
                        </div>
                    @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 cursor-pointer collapsed" data-toggle="collapse" data-target="#additional-feature">
                        <div class="row mx-0 list-group-item-danger">
                            <div class="col py-2"><strong>Additional Feature</strong></div>
                            <div class="col py-2"></div>
                            @if($total>1)
                            <div class="col py-2"></div>
                            @endif
                            @if($total>2)
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
                                @for ($i = 0; $i < $total; $i++)
                                    <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                        @if($products[$i]->$category->additional_feature && in_array($additional_feature->id, $products[$i]->$category->additional_feature)) <i class="fa fa-check text-success"></i> @else <i class="fa fa-close text-danger"></i> @endif
                                    </div>
                                @endfor
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
            configuration: @if(isset($products)) {{ $total+1 }} @endif,
            products: @json($products),
            search:"",
            brand: {},
            brands: @json($brands),
            model:  {},
            models: @json($models),
            package: {},
            packages: @json($packages),
            page: 1,
            loading: 0,
            category_id: 1
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
            modelSelected: function (b, m, i=0) {
                this.brand = b;
                this.model = m;
                this.search = '';
                this.page = 3;
                if( this.category_id >= 2) {
                    this.page = 2;
                    this.loading = i+1;
                    Vue.nextTick(function() {
                        setParentsHeight();
                    });
                    this.getProduct(i);
                }
                console.log(this.category_id);
            },
            packageSelected: function (p, i=0) {
                this.package = p;
                this.loading = i+1;
                Vue.nextTick(function() {
                    setParentsHeight();
                });
                this.getProduct(i);
            },
            isEmpty: function(obj) {
                if(obj)
                    return Object.keys(obj).length === 0;
                return true;
            },
            getProduct: function(i) {
                var _this = this;
                var u = "{{ route('get-product') }}?brand_id=" + _this.brand.id + "&model_id=" + _this.model.id;
                if(!this.isEmpty(this.package) && this.package.id>0)
                    u += "&package_id=" + this.package.id;
                    
                $.ajax({
                    url: u,
                    dataType: "json",
                    success: function(result){
                        _this.page = 1;
                        _this.products[i] = result;
                        console.log(_this.products.length);
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
                    url += this.products[i].brand.name + '-' + this.products[i].model.name;
                    if(!this.isEmpty(this.products[i].package))
                        url += '-' + this.products[i].package.name
                }
                window.location = url;
            },
            getFromStorage: function() {
                if(localStorage.category_id)
                    this.category_id = localStorage.category_id;
            }
        },
        computed: {
            filteredBrands() {
                var _this = this;
                return this.brands.filter(item => {
                    if(item.category_id == _this.category_id)
                        return item.name.toLowerCase().startsWith(this.search.toLowerCase());
                    else
                        return false;
                });
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
            this.getFromStorage();
        },
    });
    (function() {
        var e = document.querySelector('.sticky-top');
        if(e)
            window.observer.observe(e);
    })();
</script>
@endsection
@section('style')
<style>
    .sticky-top {
       visibility: hidden;
       height:0px;
       overflow: hidden;
    }
    .sticky-top.stuck {
       visibility: visible;
       height:auto;
       min-height: 86px;
       border-radius: 0;
    }
</style>
@endsection
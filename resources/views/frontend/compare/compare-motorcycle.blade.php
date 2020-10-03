@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.motorcycle-background')
<section class="section-full content-inner-2 text-dark" id="compare">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="m-b30">
                    <h4 class="h4 m-t0">Compare to choose the right Bike! </h4>
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
                                    {{ $products[$i]->brand->name ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Model</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->model->name ?? '' }}
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
                                <div>Max. power</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->mximum_power ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Max. Torque</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->maximum_torque ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Max. Speed</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->maximum_speed ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Max. Speed</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->maximum_speed ?? '' }}
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
                                <div>Made Origin</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->made_origin->name ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Bike Assemble</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->made_in->name ?? '' }}
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
                            <div class="col py-2"><strong>Feature</strong></div>
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
                                <div>Bore</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->bore ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Stroke</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->stroke ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Top speed</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->maximum_speed ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>No of cylinders</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->cylinder_no ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>No of gears</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->gear_no ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Comparison ratio</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->comparison_ratio ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Clutch</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->clutch_type ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Starting system</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->starting_system->name ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Cooling</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->cooling_system->name ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Ignition</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->ignition ?? '' }}
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 cursor-pointer collapsed" data-toggle="collapse" data-target="#fuel-consumption">
                        <div class="row mx-0 list-group-item-danger border border-light">
                            <div class="col py-2"><strong>Fuel Consumption</strong></div>
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
                                <div>Fuel Supply System</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->fuel_supply_system ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Fuel tank capacity</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->fuel_tank_capacity ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Millage</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->milate ?? '' }} kmpl
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Overall riding range</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->riding_range ?? '' }}
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 cursor-pointer collapsed" data-toggle="collapse" data-target="#dimension-weight">
                        <div class="row mx-0 list-group-item-danger border border-light">
                            <div class="col py-2"><strong>Dimension and weight</strong></div>
                            <div class="col py-2"></div>
                            @if($total>1)
                            <div class="col py-2"></div>
                            @endif
                            @if($total>2)
                            <div class="col py-2"></div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 collapse striped" id="dimension-weight" data-parent="#compare">
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Overall Length</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->length ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Overall Height</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->height ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Wheel Base</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->wheel_base ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Seat Height</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->seat_height ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Ground clearance</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->ground_clearance->name ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Kerb weight</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->kerb_weight ?? '' }}
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 cursor-pointer collapsed" data-toggle="collapse" data-target="#chassis-suspension">
                        <div class="row mx-0 list-group-item-danger border border-light">
                            <div class="col py-2"><strong>Chassis and suspension</strong></div>
                            <div class="col py-2"></div>
                            @if($total>1)
                            <div class="col py-2"></div>
                            @endif
                            @if($total>2)
                            <div class="col py-2"></div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 collapse striped" id="chassis-suspension" data-parent="#compare">
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Chassis type</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->chassis_type ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Suspension</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->suspension ?? '' }}
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 cursor-pointer collapsed" data-toggle="collapse" data-target="#brake-tyre">
                        <div class="row mx-0 list-group-item-danger border border-light">
                            <div class="col py-2"><strong>Brake and tyre</strong></div>
                            <div class="col py-2"></div>
                            @if($total>1)
                            <div class="col py-2"></div>
                            @endif
                            @if($total>2)
                            <div class="col py-2"></div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 collapse striped" id="brake-tyre" data-parent="#compare">
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Brake type</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->brake_system ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Tyre type</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->tyre_type->name ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Anti-Lock Braking System</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->abs ?? '' }}
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 cursor-pointer collapsed" data-toggle="collapse" data-target="#electricals">
                        <div class="row mx-0 list-group-item-danger border border-light">
                            <div class="col py-2"><strong>Electricals</strong></div>
                            <div class="col py-2"></div>
                            @if($total>1)
                            <div class="col py-2"></div>
                            @endif
                            @if($total>2)
                            <div class="col py-2"></div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 collapse striped" id="electricals" data-parent="#compare">
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Battery type</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->battery_type ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Battery Voltage</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->battery_voltage ?? '' }}
                                </div>
                            @endfor
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
@extends('layouts.dashboard')
@section('title')
{{ __(isset($car)?'Update car':'Create car') }}
@endsection
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <section class="content-header">
            <h3>Car <small>{{ isset($car)?'edit':'create' }}</small></h3>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="#">Cars</a></li>
                <li class="active">{{ isset($car)?'Edit':'Create' }}</li>
            </ol>
        </section>
        @if(session()->has('message'))
        <div class="alert alert-warning">
            {{ session()->get('message') }}
        </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-edit"></i> {{ __(isset($car)?'Update car':'Create car') }}</h3>
                        <div class="box-tools float-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row pt-2">
                            <div class="col-12 col-md-12">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a class="nav-link active" href="{{ route('cars.create') }}">Car</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('motorcycles.create') }}">Motorcycle</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('bicycles.create') }}">Bicycle</a></li>
                                </ul>
                                <div class="tab-content mt-3">
                                    <div class="tab-pane active">
                                        <form action="@if(isset($car)) {{ route('cars.update', $car->id) }} @else {{ route('cars.store') }} @endif" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    @csrf
                                                    @if(isset($car))
                                                    @method('PUT')
                                                    @endif
                                                    <input type="hidden" name="category_id" value="1" />
                                                    <div class="form-group">
                                                        <label for="brand">Brand</label>
                                                        <select id="brand" name="brand_id" class="custom-select">
                                                            <option value="0" selected>--Select Brand--</option>
                                                            @foreach($brands as $brand)
                                                            <option value="{{ $brand->id }}" @if(isset($car) && $car->brand_id == $brand->id) selected @endif>{{ $brand->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="model">Model</label>
                                                        <select id="model" name="model_id" class="custom-select" derive-from="brand">
                                                            <option value="0" selected>--Select Model--</option>
                                                            @foreach($models as $model)
                                                            <option value="{{ $model->id }}" @if(isset($car) && $car->model_id == $model->id) selected @endif derive-parent="{{ $model->brand_id }}">{{ $model->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="body-type">Body Type</label>
                                                        <select id="body-type" name="body_type_id" class="custom-select">
                                                            <option value="0" selected>--Select Body Type--</option>
                                                            @foreach($body_types as $body_type)
                                                            <option value="{{ $body_type->id }}" @if(isset($car) && $car->body_type_id == $body_type->id) selected @endif>{{ $body_type->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="package">Package</label>
                                                        <select id="package" name="package_id" class="custom-select" derive-from="model">
                                                            <option value="0" selected>--Select Package--</option>
                                                            @foreach($packages as $package)
                                                            <option value="{{ $package->id }}" @if(isset($car) && $car->package_id == $package->id) selected @endif derive-parent="{{ $package->model_id }}">{{ $package->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="displacement">Displacement</label>
                                                        <select id="displacement" name="displacement_id" class="custom-select" derive-from="model">
                                                            <option value="0" selected>--Select Displacement--</option>
                                                            @foreach($displacements as $displacement)
                                                            <option value="{{ $displacement->id }}" @if(isset($car) && $car->displacement_id == $displacement->id) selected @endif derive-parent="{{ $displacement->model_id }}">{{ $displacement->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="manufacturing-year">Manufacturing Year</label>
                                                        <input id="manufacturing-year" type="number" class="form-control" name="manufacturing_year" value="{{ $car->manufacturing_year ?? '' }}" placeholder="Enter Manufacturing Year" title="Enter Manufacturing Year" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="ground-clearance">Ground Clearance</label>
                                                        <select id="ground-clearance" name="ground_clearance_id" class="custom-select" derive-from="model">
                                                            <option value="0" selected>--Select Ground Clearance--</option>
                                                            @foreach($ground_clearances as $ground_clearance)
                                                            <option value="{{ $ground_clearance->id }}" @if(isset($car) && $car->ground_clearance_id == $ground_clearance->id) selected @endif derive-parent="{{ $ground_clearance->model_id }}">{{ $ground_clearance->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="drive-type">Drive Type</label>
                                                        <select id="drive-type" name="drive_type_id" class="custom-select">
                                                            <option value="0" selected>--Select Drive Type--</option>
                                                            @foreach($drive_types as $drive_type)
                                                            <option value="{{ $drive_type->id }}" @if(isset($car) && $car->drive_type_id == $drive_type->id) selected @endif>{{ $drive_type->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="engine-type">Engine Type</label>
                                                        <select id="engine-type" name="engine_type_id" class="custom-select">
                                                            <option value="0" selected>--Select Engine Type--</option>
                                                            @foreach($engine_types as $engine_type)
                                                            <option value="{{ $engine_type->id }}" @if(isset($car) && $car->engine_type_id == $engine_type->id) selected @endif>{{ $engine_type->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="engine-capacity">Engine Capacity</label>
                                                        <input id="engine-capacity" type="number" class="form-control" name="engine_capacity" value="{{ $car->engine_capacity ?? '' }}" placeholder="Enter Engine Capacity" title="Enter Engine Capacity" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fuel-type">Fuel Type</label>
                                                        <select id="fuel-type" name="fuel_type_id" class="custom-select">
                                                            <option value="0" selected>--Select Fuel Type--</option>
                                                            @foreach($fuel_types as $fuel_type)
                                                            <option value="{{ $fuel_type->id }}" @if(isset($car) && $car->fuel_type_id == $fuel_type->id) selected @endif>{{ $fuel_type->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="seating-capacity">Seating Capacity</label>
                                                        <input id="seating-capacity" type="number" class="form-control" name="seating_capacity" value="{{ $car->seating_capacity ?? '' }}" placeholder="Enter Seating Capacity" title="Enter Seating Capacity" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="weight">Gross Weight</label>
                                                        <input id="weight" type="number" class="form-control" name="weight" value="{{ $car->weight ?? '' }}" placeholder="Enter Weight" title="Enter Weight" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="maximum-power">Maximum Power</label>
                                                        <input id="maximum-power" type="number" class="form-control" name="maximum_power" value="{{ $car->maximum_power ?? '' }}" placeholder="Enter Maximum Power" title="Enter Maximum Power" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="maximum-torque">Maximum Torque</label>
                                                        <input id="maximum-torque" type="number" class="form-control" name="maximum_torque" value="{{ $car->maximum_torque ?? '' }}" placeholder="Enter Maximum Troque" title="Enter Maximum Torque" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="emi-star-from">EMI star from</label>
                                                        <input id="emi-star-from" type="number" class="form-control" name="emi_star_from" value="{{ $car->emi_star_from ?? '' }}" placeholder="Enter EMI star from" title="Enter EMI star from" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="gear-box">Gear Box</label>
                                                        <select id="gear-box" name="gear_box_id" class="custom-select">
                                                            <option value="0" selected>--Select Gear Box--</option>
                                                            @foreach($gear_boxes as $gear_box)
                                                            <option value="{{ $gear_box->id }}" @if(isset($car) && $car->gear_box_id == $gear_box->id) selected @endif>{{ $gear_box->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="loan-upto">Loan Upto</label>
                                                        <input type="number" class="form-control" name="loan_upto" id="loan-upto" value="{{ $car->loan_upto ?? '' }}" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="engine-check-warning">Engine Check Warning</label>
                                                        <input id="engine-check-warning" type="text" class="form-control" name="engine_check_warning" value="{{ $car->engine_check_warning ?? '' }}" placeholder="Enter Engine Check Warning" title="Enter Engine Check Warning" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="wheel-base">Wheel Base</label>
                                                        <select id="wheel-base" name="wheel_base_id" class="custom-select" derive-from="model">
                                                            <option value="0" selected>--Select Wheel Base--</option>
                                                            @foreach($wheel_bases as $wheel_base)
                                                            <option value="{{ $wheel_base->id }}" @if(isset($car) && $car->wheel_base_id == $wheel_base->id) selected @endif derive-parent="{{ $wheel_base->model_id }}">{{ $wheel_base->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="mild-hybrid">Mild Hybrid</label>
                                                        <input id="mild-hybrid" type="text" class="form-control" name="mild_bybrid" value="{{ $car->mild_bybrid ?? '' }}" placeholder="Enter Mild Hybrid" title="Enter Mild Hybrid" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cylinder">Cylinder</label>
                                                        <select id="cylinder" name="cylinder_id" class="custom-select">
                                                            <option value="0" selected>--Select Cylinder--</option>
                                                            @foreach($cylinders as $cylinder)
                                                            <option value="{{ $cylinder->id }}" @if(isset($car) && $car->cylinder_id == $cylinder->id) selected @endif>{{ $cylinder->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="transmission">Transmission</label>
                                                        <select id="transmission" name="transmission_id" class="custom-select">
                                                            <option value="0" selected>--Select Transmission--</option>
                                                            @foreach($transmissions as $transmission)
                                                            <option value="{{ $transmission->id }}" @if(isset($car) && $car->transmission_id == $transmission->id) selected @endif>{{ $transmission->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="boot-space">Boot Space</label>
                                                        <input id="boot-space" type="text" class="form-control" name="boot_space" value="{{ $car->boot_space ?? '' }}" placeholder="Enter Boot Space" title="Enter Boot Space" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="color">dashboard Color</label>
                                                        <select id="color" name="dashboard_color_id" class="custom-select" required>
                                                            <option value="0" selected>--Select Color--</option>
                                                            @foreach($colors as $color)
                                                            <option value="{{ $color->id }}" @if(isset($car) && $car->dashboard_color_id == $color->id) selected @endif>{{ $color->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="valid-feedback">Valid.</div>
                                                        <div class="invalid-feedback">Please fill out this field.</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6 form-group">
                                                            <label for="panorama">Internal view (panorama)</label>
                                                            <input type="file" id="panorama" name="panorama" onchange="displayPhotoOnSelect(this, 'panorama-view')" class="form-control bg-theme text-white" accept="image/*" value="Upload Panorama" />
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <img id="panorama-view" style="width:50px; height:50px" src="{{ asset('/assets/products/cars') }}/{{ $car->id ?? '0'}}/panorama.jpg" class="img-thumbnail" alt="Car">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6 form-group">
                                                            <label for="panorama">Preview photo (Internal)</label>
                                                            <input type="file" id="panorama-preview" name="panorama_preview" onchange="displayPhotoOnSelect(this, 'panorama-preview-view')" class="form-control bg-theme text-white" accept="image/*" value="Upload Preview" />
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <img id="panorama-preview-view" style="width:50px; height:50px" src="{{ asset('/assets/products/cars') }}/{{ $car->id ?? '0'}}/panorama-preview.jpg" class="img-thumbnail" alt="Car">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="color">Images for 360 view (external)</label>
                                                        <input type="file" id="360" name="360[]" class="form-control bg-theme text-white" accept="image/*" value="Upload image" multiple />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="front-suspension">Front Suspension</label>
                                                        <input id="front-suspension" type="text" class="form-control" name="front_suspension" value="{{ $car->front_suspension ?? '' }}" placeholder="Enter Front Suspension" title="Enter Front Suspension" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="wheel-type">Wheel Type</label>
                                                        <select id="wheel-type" name="wheel_type_id" class="custom-select">
                                                            <option value="0" selected>--Select Wheel Type--</option>
                                                            @foreach($wheel_types as $wheel_type)
                                                            <option value="{{ $wheel_type->id }}" @if(isset($car) && $car->wheel_type_id == $wheel_type->id) selected @endif>{{ $wheel_type->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="wheel-size">Wheel Size</label>
                                                        <input id="wheel-size" type="number" class="form-control" name="wheel_size" value="{{ $car->wheel_size ?? '' }}" placeholder="Enter Wheel Size" title="Enter Wheel Size" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="turning-radius">Max. Turning Radius</label>
                                                        <input id="turning-radius" type="number" class="form-control" name="turning_radius" value="{{ $car->turning_radius ?? '' }}" placeholder="Enter Turning Radius" title="Enter Turning Radius" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tyre-type">Tyre Type</label>
                                                        <select id="tyre-type" name="tyre_type_id" class="custom-select">
                                                            <option value="0" selected>--Select Tyre Type--</option>
                                                            @foreach($tyre_types as $tyre_type)
                                                            <option value="{{ $tyre_type->id }}" @if(isset($car) && $car->tyre_type_id == $tyre_type->id) selected @endif>{{ $tyre_type->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="front-tyre-size">Front Tyre Size</label>
                                                        <input id="front-tyre-size" type="number" class="form-control" name="front_tyre_size" value="{{ $car->front_tyre_size ?? '' }}" placeholder="Enter Front Tyre Size" title="Enter Front Tyre Size" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="rear-tyre-size">Rear Tyre Size</label>
                                                        <input id="rear-tyre-size" type="number" class="form-control" name="rear_tyre_size" value="{{ $car->rear_tyre_size ?? '' }}" placeholder="Enter Rear Tyre Size" title="Enter Rear Tyre Size" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="steering-type">Steering Type</label>
                                                        <input id="steering-type" type="text" class="form-control" name="steering_type" value="{{ $car->steering_type ?? '' }}" placeholder="Enter Steering Type" title="Enter Steering Type" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="steering-type">Steering Column</label>
                                                        <input id="steering-type" type="text" class="form-control" name="steering_column" value="{{ $car->steering_column ?? '' }}" placeholder="Enter Steering Column" title="Enter Steering Column" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="steering-gear-type">Steering Gear Type</label>
                                                        <input id="steering-gear-type" type="text" class="form-control" name="steering_gear_type" value="{{ $car->steering_gear_type ?? '' }}" placeholder="Enter Steering Gear Type" title="Enter Steering Gear Type" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="front-brake">Front Brake</label>
                                                        <select id="front-brake" name="front_brake_id" class="custom-select">
                                                            <option value="0" selected>--Select Front Brake--</option>
                                                            @foreach($front_brakes as $front_brake)
                                                            <option value="{{ $front_brake->id }}" @if(isset($car) && $car->front_brake_id == $front_brake->id) selected @endif>{{ $front_brake->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="rear-brake">Rear Brake</label>
                                                        <select id="rear-brake" name="rear_brake_id" class="custom-select">
                                                            <option value="0" selected>--Select Rear Brake--</option>
                                                            @foreach($rear_brakes as $rear_brake)
                                                            <option value="{{ $rear_brake->id }}" @if(isset($car) && $car->rear_brake_id == $rear_brake->id) selected @endif>{{ $rear_brake->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fuel-tank-capacity">Fuel Tank Capacity</label>
                                                        <input id="fuel-tank-capacity" type="number" class="form-control" name="fuel_tank_capacity" value="{{ $car->fuel_tank_capacity ?? '' }}" placeholder="Enter Fuel Tank Capacity" title="Enter Fuel Tank Capacity" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="milage">Milage</label>
                                                        <input id="milage" type="number" class="form-control" name="milage" value="{{ $car->milage ?? '' }}" placeholder="Enter Milage" title="Enter Milage" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="airbag">Airbag</label>
                                                        <input id="airbag" type="text" class="form-control" name="airbag" value="{{ $car->airbag ?? '' }}" placeholder="Enter Airbag" title="Enter Airbag" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="finance-upto">Finance Upto</label>
                                                        <input id="finance-upto" type="number" class="form-control" name="finance_upto" value="{{ $car->finance_upto ?? '' }}" placeholder="Enter Finance Upto" title="Enter Finance Upto" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="auction-grade">Auction Grade</label>
                                                        <input id="auction-grade" type="number" class="form-control" name="auction_grade" value="{{ $car->auction_grade ?? '' }}" placeholder="Enter Auction Grade" title="Enter Auction Grade" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="registration-cost">Registration Cost</label>
                                                        <input id="registration-cost" type="number" class="form-control" name="registration_cost" value="{{ $car->registration_cost ?? '' }}" placeholder="Enter Registration Cost" title="Enter Registration Cost" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="no-of-door">No of door</label>
                                                        <input id="no-of-door" type="number" class="form-control" name="no_of_door" value="{{ $car->no_of_door ?? '' }}" placeholder="Enter No of door" title="Enter No of door" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="length">Length</label>
                                                        <input id="length" type="number" class="form-control" name="length" value="{{ $car->length ?? '' }}" placeholder="Enter Length" title="Enter Length" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="width">Width</label>
                                                        <input id="width" type="number" class="form-control" name="width" value="{{ $car->width ?? '' }}" placeholder="Enter Width" title="Enter Width" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="height">Height</label>
                                                        <input id="height" type="number" class="form-control" name="height" value="{{ $car->height ?? '' }}" placeholder="Enter Height" title="Enter Height" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="rear-suspension">Rear Suspension</label>
                                                        <select id="rear-suspension" name="rear_suspension" class="custom-select">
                                                            <option value="0">--Select Rear Suspension--</option>
                                                            <option value="Automatic" @if(isset($car) && $car->rear_suspension == 'Automatic') selected @endif>Automatic</option>
                                                            <option value="Manual" @if(isset($car) && $car->rear_suspension == 'Manual') selected @endif>Manual</option>
                                                        </select>
                                                    </div>
                                                    <div class="display-6">What a new</div>
                                                    <div class="custom-control custom-checkbox">
                                                        <div class="row">
                                                            @foreach($what_a_news as $what_a_new)
                                                            <div class="col-6">
                                                                <input type="checkbox" class="custom-control-input" id="what-a-new-{{ $what_a_new->id }}" name="what_a_new[]" value="{{ $what_a_new->id }}" @if(isset($car) && $car->what_a_new && in_array($what_a_new->id, $car->what_a_new)) checked @endif>
                                                                <label class="custom-control-label" for="what-a-new-{{ $what_a_new->id }}">{{ $what_a_new->name }}</label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="display-6">Pros and Cons</div>
                                                    <div class="custom-control custom-checkbox">
                                                        <div class="row">
                                                            @foreach($pros_conses as $pros_cons)
                                                            <div class="col-6">
                                                                <input type="checkbox" class="custom-control-input" id="pros-cons-{{ $pros_cons->id }}" name="pros_cons[]" value="{{ $pros_cons->id }}" @if(isset($car) && $car->pros_cons && in_array($pros_cons->id, $car->pros_cons)) checked @endif>
                                                                <label class="custom-control-label" for="pros-cons-{{ $pros_cons->id }}">{{ $pros_cons->name }}</label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="display-6">Key Feature</div>
                                                    <div class="custom-control custom-checkbox">
                                                        <div class="row">
                                                            @foreach($key_features as $key_feature)
                                                            <div class="col-6">
                                                                <input type="checkbox" class="custom-control-input" id="key-feature-{{ $key_feature->id }}" name="key_feature[]" value="{{ $key_feature->id }}" @if(isset($car) && $car->key_feature && in_array($key_feature->id, $car->key_feature)) checked @endif>
                                                                <label class="custom-control-label" for="key-feature-{{ $key_feature->id }}">{{ $key_feature->name }}</label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="display-6">Exterior Feature</div>
                                                    <div class="custom-control custom-checkbox">
                                                        <div class="row">
                                                            @foreach($exterior_features as $exterior_feature)
                                                            <div class="col-6">
                                                                <input type="checkbox" class="custom-control-input" id="exterior-feature-{{ $exterior_feature->id }}" name="exterior_feature[]" value="{{ $exterior_feature->id }}" @if(isset($car) && $car->exterior_feature && in_array($exterior_feature->id, $car->exterior_feature)) checked @endif>
                                                                <label class="custom-control-label" for="exterior-feature-{{ $exterior_feature->id }}">{{ $exterior_feature->name }}</label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="display-6">Interior Feature</div>
                                                    <div class="custom-control custom-checkbox">
                                                        <div class="row">
                                                            @foreach($interior_features as $interior_feature)
                                                            <div class="col-6">
                                                                <input type="checkbox" class="custom-control-input" id="interior-feature-{{ $interior_feature->id }}" name="interior_feature[]" value="{{ $interior_feature->id }}" @if(isset($car) && $car->interior_feature && in_array($interior_feature->id, $car->interior_feature)) checked @endif>
                                                                <label class="custom-control-label" for="interior-feature-{{ $interior_feature->id }}">{{ $interior_feature->name }}</label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="display-6">Safety & Security</div>
                                                    <div class="custom-control custom-checkbox">
                                                        <div class="row">
                                                            @foreach($safety_securities as $safety_security)
                                                            <div class="col-6">
                                                                <input type="checkbox" class="custom-control-input" id="safety-security-{{ $safety_security->id }}" name="safety_security[]" value="{{ $safety_security->id }}" @if(isset($car) && $car->safety_security && in_array($safety_security->id, $car->safety_security)) checked @endif>
                                                                <label class="custom-control-label" for="safety-security-{{ $safety_security->id }}">{{ $safety_security->name }}</label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="display-6">Additional Feature</div>
                                                    <div class="custom-control custom-checkbox">
                                                        <div class="row">
                                                            @foreach($additional_features as $additional_feature)
                                                            <div class="col-6">
                                                                <input type="checkbox" class="custom-control-input" id="additional-feature-{{ $additional_feature->id }}" name="additional_feature[]" value="{{ $additional_feature->id }}" @if(isset($car) && $car->additional_feature && in_array($additional_feature->id, $car->additional_feature)) checked @endif>
                                                                <label class="custom-control-label" for="additional-feature-{{ $additional_feature->id }}">{{ $additional_feature->name }}</label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <button id="profile-submit" class="btn btn-theme mt-5" type="submit">Store</button>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!--/col-9-->
                    </div><!--/row-->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
<script>
$('.editor-tools').summernote({
    placeholder: 'Enter email body',
    tabsize: 2,
    height: 100
});
</script>
@endsection

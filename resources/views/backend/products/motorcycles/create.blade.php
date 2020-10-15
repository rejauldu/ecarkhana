@extends('layouts.dashboard')
@section('title')
{{ __(isset($motorcycle)?'Update motorcycle':'Create motorcycle') }}
@endsection
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<section class="content-header">
			<h3>Motorcycle <small>{{ isset($motorcycle)?'edit':'create' }}</small></h3>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li><a href="#">Motorcycles</a></li>
				<li class="active">{{ isset($motorcycle)?'Edit':'Create' }}</li>
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
						<h3 class="box-title"><i class="fa fa-edit"></i> {{ __(isset($motorcycle)?'Update motorcycle':'Create motorcycle') }}</h3>
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
									<li class="nav-item"><a class="nav-link" href="{{ route('cars.create') }}">Car</a></li>
									<li class="nav-item"><a class="nav-link active" href="{{ route('motorcycles.create') }}">Motorcycle</a></li>
									<li class="nav-item"><a class="nav-link" href="{{ route('bicycles.create') }}">Bicycle</a></li>
								</ul>
								<div class="tab-content mt-3">
									<div class="tab-pane active">
										<form action="@if(isset($motorcycle)) {{ route('motorcycles.update', $motorcycle->id) }} @else {{ route('motorcycles.store') }} @endif" method="post" enctype="multipart/form-data">
											<div class="row">
												<div class="col-12 col-md-6">
													@csrf
													@if(isset($motorcycle))
													@method('PUT')
													@endif
													<input type="hidden" name="category_id" value="1" />
													<div class="form-group">
														<label for="brand">Brand</label>
														<select id="brand" name="brand_id" class="custom-select">
															<option value="0" selected>--Select Brand--</option>
															@foreach($brands as $brand)
															<option value="{{ $brand->id }}" @if(isset($motorcycle) && $motorcycle->brand_id == $brand->id) selected @endif>{{ $brand->name }}</option>
															@endforeach
														</select>
													</div>
													<div class="form-group">
														<label for="model">Model</label>
														<select id="model" name="model_id" class="custom-select" derive-from="brand">
															<option value="0" selected>--Select Model--</option>
															@foreach($models as $model)
															<option value="{{ $model->id }}" @if(isset($motorcycle) && $motorcycle->model_id == $model->id) selected @endif derive-parent="{{ $model->brand_id }}">{{ $model->name }}</option>
															@endforeach
														</select>
													</div>
													<div class="form-group">
														<label for="manufacturing-year">Manufacturing Year</label>
														<input id="manufacturing-year" type="number" class="form-control" name="manufacturing_year" value="{{ $motorcycle->manufacturing_year ?? '' }}" placeholder="Enter Manufacturing Year" title="Enter Manufacturing Year" />
													</div>
													<div class="form-group">
                                                        <label for="package">Package</label>
                                                        <select id="package" name="package_id" class="custom-select" derive-from="model">
                                                            <option value="0" selected>--Select Package--</option>
                                                            @foreach($packages as $package)
                                                            <option value="{{ $package->id }}" @if(isset($motorcycle) && $motorcycle->package_id == $package->id) selected @endif derive-parent="{{ $package->model_id }}">{{ $package->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
													<div class="form-group">
														<label for="body-type">Bike Type / Body Type</label>
														<select id="body-type" name="body_type_id" class="custom-select">
															<option value="0" selected>--Select Body Type--</option>
															@foreach($body_types as $body_type)
															<option value="{{ $body_type->id }}" @if(isset($motorcycle) && $motorcycle->body_type_id == $body_type->id) selected @endif>{{ $body_type->name }}</option>
															@endforeach
														</select>
													</div>
													<div class="form-group">
														<label for="displacement">Displacement</label>
														<select id="displacement" name="displacement_id" class="custom-select" derive-from="model">
															<option value="0" selected>--Select Displacement--</option>
															@foreach($displacements as $displacement)
															<option value="{{ $displacement->id }}" @if(isset($motorcycle) && $motorcycle->displacement_id == $displacement->id) selected @endif derive-parent="{{ $displacement->model_id }}">{{ $displacement->name }}</option>
															@endforeach
														</select>
													</div>
													<div class="form-group">
														<label for="engine-type">Engine Type</label>
														<select id="engine-type" name="engine_type_id" class="custom-select">
															<option value="0" selected>--Select Engine Type--</option>
															@foreach($engine_types as $engine_type)
															<option value="{{ $engine_type->id }}" @if(isset($motorcycle) && $motorcycle->engine_type_id == $engine_type->id) selected @endif>{{ $engine_type->name }}</option>
															@endforeach
														</select>
													</div>
													<div class="form-group">
														<label for="maximum-power">Maximum Power</label>
														<input id="maximum-power" type="number" class="form-control" name="maximum_power" value="{{ $motorcycle->maximum_power ?? '' }}" placeholder="Enter Maximum Power" title="Enter Maximum Power" />
													</div>
													<div class="form-group">
														<label for="maximum-torque">Maximum Torque</label>
														<input id="maximum-torque" type="number" class="form-control" name="maximum_torque" value="{{ $motorcycle->maximum_torque ?? '' }}" placeholder="Enter Maximum Troque" title="Enter Maximum Torque" />
													</div>
													<div class="form-group">
														<label for="maximum-speed">Maximum/Top Speed</label>
														<input id="maximum-speed" type="number" class="form-control" name="maximum_speed" value="{{ $motorcycle->maximum_speed ?? '' }}" placeholder="Enter Maximum Speed" title="Enter Maximum Speed" />
													</div>
													<div class="form-group">
														<label for="milage">Milage</label>
														<input id="milage" type="number" class="form-control" name="milage" value="{{ $motorcycle->milage ?? '' }}" placeholder="Enter Milage" title="Enter Milage" />
													</div>
													<div class="form-group">
														<label for="made-origin">Made Origin</label>
														<select id="made-origin" name="made_origin_id" class="custom-select">
															<option value="0" selected>--Select Made Origin--</option>
															@foreach($made_origins as $made_origin)
															<option value="{{ $made_origin->id }}" @if(isset($motorcycle) && $motorcycle->made_origin_id == $made_origin->id) selected @endif>{{ $made_origin->name }}</option>
															@endforeach
														</select>
													</div>
													<div class="form-group">
														<label for="made-in">Made In</label>
														<select id="made-in" name="made_in_id" class="custom-select">
															<option value="0" selected>--Select Made In--</option>
															@foreach($made_ins as $made_in)
															<option value="{{ $made_in->id }}" @if(isset($motorcycle) && $motorcycle->made_in_id == $made_in->id) selected @endif>{{ $made_in->name }}</option>
															@endforeach
														</select>
													</div>
													<div class="form-group">
														<label for="ground-clearance">Ground Clearance</label>
														<select id="ground-clearance" name="ground_clearance_id" class="custom-select" derive-from="model">
															<option value="0" selected>--Select Ground Clearance--</option>
															@foreach($ground_clearances as $ground_clearance)
															<option value="{{ $ground_clearance->id }}" @if(isset($motorcycle) && $motorcycle->ground_clearance_id == $ground_clearance->id) selected @endif derive-parent="{{ $ground_clearance->model_id }}">{{ $ground_clearance->name }}</option>
															@endforeach
														</select>
													</div>
													<div class="form-group">
														<label for="suspension">Suspension</label>
														<input id="suspension" type="text" class="form-control" name="suspension" value="{{ $motorcycle->suspension ?? '' }}" placeholder="Enter Suspension" title="Enter Suspension" />
													</div>
													<div class="form-group">
														<label for="fuel_supply_system">Fuel Supply System</label>
														<input id="fuel_supply_system" type="text" class="form-control" name="fuel_supply_system" value="{{ $motorcycle->fuel_supply_system ?? '' }}" placeholder="Enter Fuel Supply System" title="Enter Fuel Supply System" />
													</div>
													<div class="form-group">
														<label for="fuel-tank-capacity">Fuel Tank Capacity</label>
														<input id="fuel-tank-capacity" type="number" class="form-control" name="fuel_tank_capacity" value="{{ $motorcycle->fuel_tank_capacity ?? '' }}" placeholder="Enter Fuel Tank Capacity" title="Enter Fuel Tank Capacity" />
													</div>
													<div class="form-group">
														<label for="brake-system">Brake System</label>
														<input id="brake-system" type="text" class="form-control" name="brake_system" value="{{ $motorcycle->brake_system ?? '' }}" placeholder="Enter Brake System" title="Enter Brake System" />
													</div>
													<div class="form-group">
														<label for="kerb-weight">Kerb Weight</label>
														<input id="kerb-weight" type="text" class="form-control" name="kerb_weight" value="{{ $motorcycle->kerb_weight ?? '' }}" placeholder="Enter Kerb Weight" title="Enter Kerb Weight" />
													</div>
													<div class="row">
														<div class="col-6 form-group">
															<input type="file" id="image1" name="image1" class="form-control bg-theme text-white" onchange="displayPhotoOnSelect(this, 'image1-view')" accept="image/*" value="Upload image" />
														</div>
														<div class="col-6 form-group">
															<img id="image1-view" style="width:50px; height:50px" src="{{ asset('/assets/products/motorcycles') }}/{{ $motorcycle->image1 ?? 'not-found.jpg'}}" class="img-thumbnail" alt="motorcycle">
														</div>
													</div>
													<div class="row">
														<div class="col-6 form-group">
															<input type="file" id="image2" name="image2" class="form-control bg-theme text-white" onchange="displayPhotoOnSelect(this, 'image2-view')" accept="image/*" value="Upload image" />
														</div>
														<div class="col-6 form-group">
															<img id="image2-view" style="width:50px; height:50px" src="{{ asset('/assets/products/motorcycles') }}/{{ $motorcycle->image2 ?? 'not-found.jpg'}}" class="img-thumbnail" alt="motorcycle">
														</div>
													</div>
													<div class="row">
														<div class="col-6 form-group">
															<input type="file" id="image3" name="image3" class="form-control bg-theme text-white" onchange="displayPhotoOnSelect(this, 'image3-view')" accept="image/*" value="Upload image" />
														</div>
														<div class="col-6 form-group">
															<img id="image3-view" style="width:50px; height:50px" src="{{ asset('/assets/products/motorcycles') }}/{{ $motorcycle->image3 ?? 'not-found.jpg'}}" class="img-thumbnail" alt="motorcycle">
														</div>
													</div>
													<div class="row">
														<div class="col-6 form-group">
															<input type="file" id="image4" name="image4" class="form-control bg-theme text-white" onchange="displayPhotoOnSelect(this, 'image4-view')" accept="image/*" value="Upload image" />
														</div>
														<div class="col-6 form-group">
															<img id="image4-view" style="width:50px; height:50px" src="{{ asset('/assets/products/motorcycles') }}/{{ $motorcycle->image4 ?? 'not-found.jpg'}}" class="img-thumbnail" alt="motorcycle">
														</div>
													</div>
													<div class="row">
														<div class="col-6 form-group">
															<input type="file" id="image5" name="image5" class="form-control bg-theme text-white" onchange="displayPhotoOnSelect(this, 'image5-view')" accept="image/*" value="Upload image" />
														</div>
														<div class="col-6 form-group">
															<img id="image5-view" style="width:50px; height:50px" src="{{ asset('/assets/products/motorcycles') }}/{{ $motorcycle->image5 ?? 'not-found.jpg'}}" class="img-thumbnail" alt="motorcycle">
														</div>
													</div>
													<div class="row">
														<div class="col-6 form-group">
															<input type="file" id="image6" name="image6" class="form-control bg-theme text-white" onchange="displayPhotoOnSelect(this, 'image6-view')" accept="image/*" value="Upload image" />
														</div>
														<div class="col-6 form-group">
															<img id="image6-view" style="width:50px; height:50px" src="{{ asset('/assets/products/motorcycles') }}/{{ $motorcycle->image6 ?? 'not-found.jpg'}}" class="img-thumbnail" alt="motorcycle">
														</div>
													</div>
													<div class="row">
														<div class="col-6 form-group">
															<input type="file" id="image7" name="image7" class="form-control bg-theme text-white" onchange="displayPhotoOnSelect(this, 'image7-view')" accept="image/*" value="Upload image" />
														</div>
														<div class="col-6 form-group">
															<img id="image7-view" style="width:50px; height:50px" src="{{ asset('/assets/products/motorcycles') }}/{{ $motorcycle->image7 ?? 'not-found.jpg'}}" class="img-thumbnail" alt="motorcycle">
														</div>
													</div>
													<div class="row">
														<div class="col-6 form-group">
															<input type="file" id="image8" name="image8" class="form-control bg-theme text-white" onchange="displayPhotoOnSelect(this, 'image8-view')" accept="image/*" value="Upload image" />
														</div>
														<div class="col-6 form-group">
															<img id="image8-view" style="width:50px; height:50px" src="{{ asset('/assets/products/motorcycles') }}/{{ $motorcycle->image8 ?? 'not-found.jpg'}}" class="img-thumbnail" alt="motorcycle">
														</div>
													</div>
													<div class="row">
														<div class="col-6 form-group">
															<input type="file" id="image9" name="image9" class="form-control bg-theme text-white" onchange="displayPhotoOnSelect(this, 'image9-view')" accept="image/*" value="Upload image" />
														</div>
														<div class="col-6 form-group">
															<img id="image9-view" style="width:50px; height:50px" src="{{ asset('/assets/products/motorcycles') }}/{{ $motorcycle->image9 ?? 'not-found.jpg'}}" class="img-thumbnail" alt="motorcycle">
														</div>
													</div>
													<div class="row">
														<div class="col-6 form-group">
															<input type="file" id="image10" name="image10" class="form-control bg-theme text-white" onchange="displayPhotoOnSelect(this, 'image10-view')" accept="image/*" value="Upload image" />
														</div>
														<div class="col-6 form-group">
															<img id="image10-view" style="width:50px; height:50px" src="{{ asset('/assets/products/motorcycles') }}/{{ $motorcycle->image10 ?? 'not-found.jpg'}}" class="img-thumbnail" alt="motorcycle">
														</div>
													</div>
												</div>
												<div class="col-12 col-md-6">
													<div class="form-group">
														<label for="wheel-base">Wheel Base</label>
														<input id="wheel-base" type="number" class="form-control" name="wheel_base" value="{{ $motorcycle->wheel_base ?? '' }}" placeholder="Enter Gear Number" title="Enter Gear Number" />
													</div>
													<div class="form-group">
														<label for="gear-no">No of Gear</label>
														<input id="gear-no" type="number" class="form-control" name="gear_no" value="{{ $motorcycle->gear_no ?? '' }}" placeholder="Enter Gear Number" title="Enter Gear Number" />
													</div>
													<div class="form-group">
														<label for="bore">Bore</label>
														<input id="bore" type="text" class="form-control" name="bore" value="{{ $motorcycle->bore ?? '' }}" placeholder="Enter Bore" title="Enter Bore" />
													</div>
													<div class="form-group">
														<label for="stroke">Stroke</label>
														<input id="stroke" type="text" class="form-control" name="stroke" value="{{ $motorcycle->stroke ?? '' }}" placeholder="Enter Stroke" title="Enter Stroke" />
													</div>
													<div class="form-group">
														<label for="cylinder-no">Cylinder Number</label>
														<input id="cylinder-no" type="number" class="form-control" name="cylinder_no" value="{{ $motorcycle->cylinder_no ?? '' }}" placeholder="Enter Cylinder Number" title="Enter Cylinder Number" />
													</div>
													<div class="form-group">
														<label for="comparison-ratio">Comparison Ratio</label>
														<input id="comparison-ratio" type="text" class="form-control" name="comparison_ratio" value="{{ $motorcycle->comparison_ratio ?? '' }}" placeholder="Enter Comparison Ratio" title="Enter Comparison Ratio" />
													</div>
													<div class="form-group">
														<label for="clutch-type">Clutch Type</label>
														<input id="clutch-type" type="text" class="form-control" name="clutch_type" value="{{ $motorcycle->clutch_type ?? '' }}" placeholder="Enter Clutch Type" title="Enter Clutch Type" />
													</div>
													<div class="form-group">
														<label for="starting-system">Starting System</label>
														<select id="starting-system" name="starting_system_id" class="custom-select">
															<option value="0" selected>--Select Starting System--</option>
															@foreach($starting_systems as $starting_system)
															<option value="{{ $starting_system->id }}" @if(isset($motorcycle) && $motorcycle->starting_system_id == $starting_system->id) selected @endif>{{ $starting_system->name }}</option>
															@endforeach
														</select>
													</div>
													<div class="form-group">
														<label for="cooling-system">Cooling System</label>
														<select id="cooling-system" name="cooling_system_id" class="custom-select">
															<option value="0" selected>--Select Cooling System--</option>
															@foreach($cooling_systems as $cooling_system)
															<option value="{{ $cooling_system->id }}" @if(isset($motorcycle) && $motorcycle->cooling_system_id == $cooling_system->id) selected @endif>{{ $cooling_system->name }}</option>
															@endforeach
														</select>
													</div>
													<div class="form-group">
														<label for="ignition">Ignition</label>
														<input id="ignition" type="text" class="form-control" name="ignition" value="{{ $motorcycle->ignition ?? '' }}" placeholder="Enter Ignition" title="Enter Ignition" />
													</div>
													<div class="form-group">
														<label for="riding-range">Riding Range</label>
														<input id="riding-range" type="text" class="form-control" name="riding_range" value="{{ $motorcycle->riding_range ?? '' }}" placeholder="Enter Riding Range" title="Enter Riding Range" />
													</div>
													<div class="form-group">
														<label for="length">Length</label>
														<input id="length" type="text" class="form-control" name="length" value="{{ $motorcycle->length ?? '' }}" placeholder="Enter Length" title="Enter Length" />
													</div>
													<div class="form-group">
														<label for="height">Height</label>
														<input id="height" type="text" class="form-control" name="height" value="{{ $motorcycle->height ?? '' }}" placeholder="Enter Height" title="Enter Height" />
													</div>
													<div class="form-group">
														<label for="width">Width</label>
														<input id="width" type="text" class="form-control" name="width" value="{{ $motorcycle->width ?? '' }}" placeholder="Enter Width" title="Enter Width" />
													</div>
													<div class="form-group">
														<label for="seat-height">Seat Height</label>
														<input id="seat-height" type="text" class="form-control" name="seat_height" value="{{ $motorcycle->seat_height ?? '' }}" placeholder="Enter Seat Height" title="Enter Seat Height" />
													</div>
													<div class="form-group">
														<label for="door-no">Door Number</label>
														<input id="door-no" type="text" class="form-control" name="door_no" value="{{ $motorcycle->door_no ?? '' }}" placeholder="Enter Door Number" title="Enter Door Number" />
													</div>
													<div class="form-group">
														<label for="chassis-type">Chassis Type</label>
														<input id="chassis-type" type="text" class="form-control" name="chassis_type" value="{{ $motorcycle->chassis_type ?? '' }}" placeholder="Enter Chassis Type" title="Enter Chassis Type" />
													</div>
													<div class="form-group">
														<label for="front-brake">Front Brake</label>
														<select id="front-brake" name="front_brake_id" class="custom-select">
															<option value="0" selected>--Select Front Brake--</option>
															@foreach($front_brakes as $front_brake)
															<option value="{{ $front_brake->id }}" @if(isset($motorcycle) && $motorcycle->front_brake_id == $front_brake->id) selected @endif>{{ $front_brake->name }}</option>
															@endforeach
														</select>
													</div>
													<div class="form-group">
														<label for="rear-brake">Rear Brake</label>
														<select id="rear-brake" name="rear_brake_id" class="custom-select">
															<option value="0" selected>--Select Rear Brake--</option>
															@foreach($rear_brakes as $rear_brake)
															<option value="{{ $rear_brake->id }}" @if(isset($motorcycle) && $motorcycle->rear_brake_id == $rear_brake->id) selected @endif>{{ $rear_brake->name }}</option>
															@endforeach
														</select>
													</div>
													<div class="custom-control custom-switch">
														<input type="checkbox" class="custom-control-input" name="abs" id="abs" value="1" @if(isset($motorcycle) && $motorcycle->abs == 1) checked @endif>
														<label class="custom-control-label" for="abs">Is Anti-lock Braking System Available?</label>
													</div>
													<div class="form-group">
														<label for="tyre-type">Tyre Type</label>
														<select id="tyre-type" name="tyre_type_id" class="custom-select">
															<option value="0" selected>--Select Tyre Type--</option>
															@foreach($tyre_types as $tyre_type)
															<option value="{{ $tyre_type->id }}" @if(isset($motorcycle) && $motorcycle->tyre_type_id == $tyre_type->id) selected @endif>{{ $tyre_type->name }}</option>
															@endforeach
														</select>
													</div>
													<div class="form-group">
														<label for="battery-type">Battery Type</label>
														<input id="battery-type" type="text" class="form-control" name="battery_type" value="{{ $motorcycle->battery_type ?? '' }}" placeholder="Enter Battery Type" title="Enter Battery Type" />
													</div>
													<div class="form-group">
														<label for="battery-voltage">Battery Voltage</label>
														<input id="battery-voltage" type="number" class="form-control" name="battery_voltage" value="{{ $motorcycle->battery_voltage ?? '' }}" placeholder="Enter Voltage" title="Enter Voltage" />
													</div>
													<div class="form-group">
														<label for="registration-cost">Registration Cost</label>
														<input id="registration-cost" type="number" class="form-control" name="registration_cost" value="{{ $motorcycle->registration_cost ?? '' }}" placeholder="Enter Registration Cost" title="Enter Registration Cost" />
													</div>
													<div class="display-5">Feature</div>
													<div class="custom-control custom-checkbox">
														<div class="row">
															@foreach($key_features as $key_feature)
															<div class="col-6">
																<input type="checkbox" class="custom-control-input" id="key-feature-{{ $key_feature->id }}" name="key_feature[]" value="{{ $key_feature->id }}" @if(isset($motorcycle) && isset($motorcycle->key_feature) && in_array($key_feature->id, $motorcycle->key_feature)) checked @endif>
																<label class="custom-control-label" for="key-feature-{{ $key_feature->id }}">{{ $key_feature->name }}</label>
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
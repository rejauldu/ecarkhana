@extends('layouts.dashboard')
@section('title')
{{ __(isset($bicycle)?'Update bicycle':'Create bicycle') }}
@endsection
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <section class="content-header">
            <h3>Bicycle <small>{{ isset($bicycle)?'edit':'create' }}</small></h3>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="#">Bicycles</a></li>
                <li class="active">{{ isset($bicycle)?'Edit':'Create' }}</li>
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
                        <h3 class="box-title"><i class="fa fa-edit"></i> {{ __(isset($bicycle)?'Update bicycle':'Create bicycle') }}</h3>
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
                                    <li class="nav-item"><a class="nav-link" href="{{ route('motorcycles.create') }}">Motorcycle</a></li>
                                    <li class="nav-item"><a class="nav-link active" href="{{ route('bicycles.create') }}">Bicycle</a></li>
                                </ul>
                                <div class="tab-content mt-3">
                                    <div class="tab-pane active">
                                        <form action="@if(isset($bicycle)) {{ route('bicycles.update', $bicycle->id) }} @else {{ route('bicycles.store') }} @endif" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    @csrf
                                                    @if(isset($bicycle))
                                                    @method('PUT')
                                                    @endif
                                                    <input type="hidden" name="category_id" value="1" />
                                                    <div class="form-group">
                                                        <label for="brand">Brand</label>
                                                        <select id="brand" name="brand_id" class="custom-select">
                                                            <option value="0" selected>--Select Brand--</option>
                                                            @foreach($brands as $brand)
                                                            <option value="{{ $brand->id }}" @if(isset($bicycle) && $bicycle->brand_id == $brand->id) selected @endif>{{ $brand->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="model">Model</label>
                                                        <select id="model" name="model_id" class="custom-select" derive-from="brand">
                                                            <option value="0" selected>--Select Model--</option>
                                                            @foreach($models as $model)
                                                            <option value="{{ $model->id }}" @if(isset($bicycle) && $bicycle->model_id == $model->id) selected @endif derive-parent="{{ $model->brand_id }}">{{ $model->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="bicycle-type">Bicycle Type</label>
                                                        <select id="bicycle-type" name="bicycle_type_id" class="custom-select">
                                                            <option value="0" selected>--Select Bicycle Type--</option>
                                                            @foreach($bicycle_types as $bicycle_type)
                                                            <option value="{{ $bicycle_type->id }}" @if(isset($bicycle) && $bicycle->bicycle_type_id == $bicycle_type->id) selected @endif>{{ $bicycle_type->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="frame-size">Frame Size</label>
                                                        <input id="frame-size" type="number" class="form-control" name="frame_size" value="{{ $bicycle->frame_size ?? '' }}" placeholder="Enter Frame Size" title="Enter Frame Size" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="frame-material">Frame Material</label>
                                                        <input id="frame-material" type="text" class="form-control" name="frame_material" value="{{ $bicycle->frame_material ?? '' }}" placeholder="Enter Frame Material" title="Enter Frame Material" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="suspension">Suspension</label>
                                                        <input id="suspension" type="text" class="form-control" name="suspension" value="{{ $bicycle->suspension ?? '' }}" placeholder="Enter Suspension" title="Enter Suspension" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="gear_no">Gear Number</label>
                                                        <input id="gear_no" type="number" class="form-control" name="gear_no" value="{{ $bicycle->gear_no ?? '' }}" placeholder="Enter Gear Number" title="Enter Gear Number" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="wheel-type">Wheel Type</label>
                                                        <select id="wheel-type" name="wheel_type_id" class="custom-select">
                                                            <option value="0" selected>--Select Wheel Type--</option>
                                                            @foreach($wheel_types as $wheel_type)
                                                            <option value="{{ $wheel_type->id }}" @if(isset($bicycle) && $bicycle->wheel_type_id == $wheel_type->id) selected @endif>{{ $wheel_type->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="wheel-size">Wheel Size</label>
                                                        <input id="wheel-size" type="number" class="form-control" name="wheel_size" value="{{ $bicycle->wheel_size ?? '' }}" placeholder="Enter Wheel Size" title="Enter Wheel Size" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="shifter">Shifter</label>
                                                        <input id="shifter" type="text" class="form-control" name="shifter" value="{{ $bicycle->shifter ?? '' }}" placeholder="Enter Shifter" title="Enter Shifter" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="made-origin">Made Origin</label>
                                                        <select id="made-origin" name="made_origin_id" class="custom-select">
                                                            <option value="0" selected>--Select Made Origin--</option>
                                                            @foreach($made_origins as $made_origin)
                                                            <option value="{{ $made_origin->id }}" @if(isset($bicycle) && $bicycle->made_origin_id == $made_origin->id) selected @endif>{{ $made_origin->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="weight">Weight</label>
                                                        <input id="weight" type="number" class="form-control" name="weight" value="{{ $bicycle->weight ?? '' }}" placeholder="Enter Weight" title="Enter Weight" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="360">Images for 360<sup>0</sup> view</label>
                                                        <input type="file" id="360" name="360[]" class="form-control bg-theme text-white" accept="image/*" value="Upload image" multiple />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="shifter-lever">Shifter Lever</label>
                                                        <input id="shifter-lever" type="text" class="form-control" name="shifter_lever" value="{{ $bicycle->shifter_lever ?? '' }}" placeholder="Enter Shifter Lever" title="Enter Shifter Lever" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="front-derailleur">Front Derailleur</label>
                                                        <input id="front-derailleur" type="number" class="form-control" name="front_derailleur" value="{{ $bicycle->front_derailleur ?? '' }}" placeholder="Enter Front Derailleur" title="Enter Front Derailleur" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="rear-derailleur">Rear Derailleur</label>
                                                        <input id="rear-derailleur" type="number" class="form-control" name="rear_derailleur" value="{{ $bicycle->rear_derailleur ?? '' }}" placeholder="Enter Rear Derailleur" title="Enter Rear Derailleur" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="rims">Rims</label>
                                                        <input id="rims" type="text" class="form-control" name="rims" value="{{ $bicycle->rims ?? '' }}" placeholder="Enter Rims" title="Enter Rims" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="hub-quality">Hub Quality</label>
                                                        <input id="hub-quality" type="text" class="form-control" name="hub_quality" value="{{ $bicycle->hub_quality ?? '' }}" placeholder="Enter Hub Quality" title="Enter Hub Quality" />
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="cassette">Cassette</label>
                                                        <input id="cassette" type="text" class="form-control" name="cassette" value="{{ $bicycle->cassette ?? '' }}" placeholder="Enter Cassette" title="Enter Cassette" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recommended-biker-height">Recommended Biker Height</label>
                                                        <input id="recommended-biker-height" type="number" class="form-control" name="recommended_biker_height" value="{{ $bicycle->recommended_biker_height ?? '' }}" placeholder="Enter Recommended Biker Height" title="Enter Recommended Biker Height" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tyre-type">Tyre Type</label>
                                                        <select id="tyre-type" name="tyre_type_id" class="custom-select">
                                                            <option value="0" selected>--Select Tyre Type--</option>
                                                            @foreach($tyre_types as $tyre_type)
                                                            <option value="{{ $tyre_type->id }}" @if(isset($bicycle) && $bicycle->tyre_type_id == $tyre_type->id) selected @endif>{{ $tyre_type->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tyre-size">Tyre Size</label>
                                                        <input id="tyre-size" type="number" class="form-control" name="tyre_size" value="{{ $bicycle->tyre_size ?? '' }}" placeholder="Enter Tyre Size" title="Enter Tyre Size" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="crank">Crank</label>
                                                        <input id="crank" type="text" class="form-control" name="crank" value="{{ $bicycle->crank ?? '' }}" placeholder="Enter Crank" title="Enter Crank" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="seat-post">Sear Post</label>
                                                        <input id="seat-post" type="text" class="form-control" name="seat_post" value="{{ $bicycle->seat_post ?? '' }}" placeholder="Enter Sear Post" title="Enter Sear Post" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="chain">Chain</label>
                                                        <input id="chain" type="text" class="form-control" name="chain" value="{{ $bicycle->chain ?? '' }}" placeholder="Enter Chain" title="Enter Chain" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="pedial">Pedal</label>
                                                        <input id="pedial" type="text" class="form-control" name="pedal" value="{{ $bicycle->pedal ?? '' }}" placeholder="Enter Pedal" title="Enter Pedal" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="saddle">Saddle</label>
                                                        <input id="saddle" type="text" class="form-control" name="saddle" value="{{ $bicycle->saddle ?? '' }}" placeholder="Enter Saddle" title="Enter Saddle" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="headset">Headset</label>
                                                        <input id="headset" type="text" class="form-control" name="headset" value="{{ $bicycle->headset ?? '' }}" placeholder="Enter Headset" title="Enter Headset" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="handlebar">Handlebar</label>
                                                        <input id="handlebar" type="text" class="form-control" name="handlebar" value="{{ $bicycle->handlebar ?? '' }}" placeholder="Enter Handlebar" title="Enter Handlebar" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="grip">Grip</label>
                                                        <input id="grip" type="text" class="form-control" name="grip" value="{{ $bicycle->grip ?? '' }}" placeholder="Enter Grip" title="Enter Grip" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="stem">Stem</label>
                                                        <input id="stem" type="text" class="form-control" name="stem" value="{{ $bicycle->stem ?? '' }}" placeholder="Enter Stem" title="Enter Stem" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="brake-system">Brake System</label>
                                                        <input id="brake-system" type="text" class="form-control" name="brake_system" value="{{ $bicycle->brake_system ?? '' }}" placeholder="Enter Brake System" title="Enter Brake System" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="brake-system">Fork</label>
                                                        <input id="brake-system" type="text" class="form-control" name="fork" value="{{ $bicycle->fork ?? '' }}" placeholder="Enter Fork" title="Enter Fork" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="brake-system">Brake Type</label>
                                                        <input id="brake-system" type="text" class="form-control" name="brake_type" value="{{ $bicycle->brake_type ?? '' }}" placeholder="Enter Brake Type" title="Enter Brake Type" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="brake-system">Rims</label>
                                                        <input id="brake-system" type="text" class="form-control" name="rim" value="{{ $bicycle->rim ?? '' }}" placeholder="Enter Rims" title="Enter Rims" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="brake-system">Gear</label>
                                                        <input id="brake-system" type="text" class="form-control" name="gear" value="{{ $bicycle->gear ?? '' }}" placeholder="Enter Gear" title="Enter Gear" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="brake-system">Freewheel</label>
                                                        <input id="brake-system" type="text" class="form-control" name="freewheel" value="{{ $bicycle->freewheel ?? '' }}" placeholder="Enter Freewheel" title="Enter Freewheel" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="brake-system">Biker weight limit</label>
                                                        <input id="brake-system" type="text" class="form-control" name="biker_weight" value="{{ $bicycle->biker_weight ?? '' }}" placeholder="Enter Biker weight limit" title="Enter Biker weight limit" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="biker-gender">Biker Gender</label>
                                                        <select id="biker-gender" name="biker_gender_id" class="custom-select">
                                                            <option value="0" selected>--Select Biker Gender--</option>
                                                            @foreach($biker_genders as $biker_gender)
                                                            <option value="{{ $biker_gender->id }}" @if(isset($bicycle) && $bicycle->biker_gender_id == $biker_gender->id) selected @endif>{{ $biker_gender->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="display-5">Feature</div>
                                                    <div class="custom-control custom-checkbox">
                                                        <div class="row">
                                                            @foreach($key_features as $key_feature)
                                                            <div class="col-6">
                                                                <input type="checkbox" class="custom-control-input" id="key-feature-{{ $key_feature->id }}" name="key_feature[]" value="{{ $key_feature->id }}" @if(isset($bicycle) && $bicycle->key_feature && in_array($key_feature->id, $bicycle->key_feature)) checked @endif>
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
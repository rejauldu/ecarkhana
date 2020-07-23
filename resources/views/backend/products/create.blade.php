@extends('layouts.dashboard')
@section('title')
{{ __(isset($product)?'Update product':'Create product') }}
@endsection
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <section class="content-header">
            <h3>Product <small>{{ isset($product)?'edit':'create' }}</small></h3>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="#">Products</a></li>
                <li class="active">{{ isset($product)?'Edit':'Create' }}</li>
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
                        <h3 class="box-title"><i class="fa fa-edit"></i> {{ __(isset($product)?'Update product':'Create product') }}</h3>
                        <div class="box-tools float-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row pt-2">
                            <div class="col-12">
                                <form class="needs-validation" action="@if(isset($product)) {{ route('products.update', $product->id) }} @else {{ route('products.store') }} @endif" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            @csrf
                                            @if(isset($product))
                                            @method('PUT')
                                            @endif
                                            @if(isset($product))
                                            <input type="hidden" name="id" value="{{ $product->id }}" />
                                            @endif
                                            <div class="form-group">
                                                <label for="category">Category</label>
                                                <select id="category" name="category_id" class="custom-select" required onchange="updateCrossElements()">
                                                    <option value="0">--Select Category--</option>
                                                    @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" @if(isset($product) && $product->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Please fill out this field.</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="brand">Brand</label>
                                                <select id="brand" name="brand_id" class="custom-select" derive-from="category" required>
                                                    <option value="0" selected>--Select Brand--</option>
                                                    @foreach($brands as $brand)
                                                    <option value="{{ $brand->id }}" @if(isset($product) && $product->brand_id == $brand->id) selected @endif derive-parent="{{ $brand->category_id }}">{{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Please fill out this field.</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="model">Model</label>
                                                <select id="model" name="model_id" class="custom-select" derive-from="brand" required>
                                                    <option value="0" selected>--Select Model--</option>
                                                    @foreach($models as $model)
                                                    <option value="{{ $model->id }}" @if(isset($product) && $product->model_id == $model->id) selected @endif derive-parent="{{ $model->brand_id }}">{{ $model->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Please fill out this field.</div>
                                            </div>
                                            <div class="form-group d-cross d-car">
                                                <label for="package">Package</label>
                                                <select id="package" name="package_id" class="custom-select" derive-from="model" required>
                                                    <option value="0" selected>--Select Package--</option>
                                                    @foreach($packages as $package)
                                                    <option value="{{ $package->id }}" @if(isset($product) && $product->package_id == $package->id) selected @endif derive-parent="{{ $package->model_id }}">{{ $package->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Please fill out this field.</div>
                                            </div>
                                            <div class="form-group d-cross d-car d-motorcycle">
                                                <label for="manufacturing-year">Manufacturing Year</label>
                                                <input id="manufacturing-year" type="number" class="form-control" name="manufacturing_year" value="{{ $product->manufacturing_year ?? '' }}" placeholder="Enter manufacturing Year" title="Enter manufacturing Year" />
                                            </div>
                                            <div class="form-group">
                                                <label for="condition">Condition</label>
                                                <select id="condition" name="condition_id" class="custom-select" required onchange="updateCrossElements()">
                                                    <option value="0" selected>--Select Condition--</option>
                                                    @foreach($conditions as $condition)
                                                    <option value="{{ $condition->id }}" @if(isset($product) && $product->condition_id == $condition->id) selected @endif>{{ $condition->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Please fill out this field.</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input id="name" type="text" class="form-control" name="name" value="{{ $product->name ?? '' }}" placeholder="Enter Name" title="Enter Name" required/>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Please fill out this field.</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="color">Color</label>
                                                <select id="color" name="color_id" class="custom-select" required>
                                                    <option value="0" selected>--Select Color--</option>
                                                    @foreach($colors as $color)
                                                    <option value="{{ $color->id }}" @if(isset($product) && $product->color_id == $color->id) selected @endif>{{ $color->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Please fill out this field.</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="view360">Images for 360<sup>0</sup> view</label>
                                                <image-update id="view360" stored_images="{{ $images ?? '[]' }}"></image-update>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Please fill out this field.</div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="size">Size</label>
                                                <select id="size" name="size_id" class="custom-select" required>
                                                    <option value="0" selected>--Select Size--</option>
                                                    @foreach($sizes as $size)
                                                    <option value="{{ $size->id }}" @if(isset($product) && $product->size_id == $size->id) selected @endif>{{ $size->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Please fill out this field.</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="msrp">Price</label>
                                                <input id="msrp" type="number" class="form-control" name="msrp" value="{{ $product->msrp ?? '' }}" placeholder="Enter Price" title="Enter Price" required/>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Please fill out this field.</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="discount">Discount</label>
                                                <input id="discount" type="number" class="form-control" name="discount" value="{{ $product->discount ?? '' }}" placeholder="Enter Discount percentage" title="Enter Discount %" required/>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Please fill out this field.</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="stock">Stock</label>
                                                <input id="stock" type="number" class="form-control" name="stock" value="{{ $product->stock ?? '' }}" placeholder="Enter Stock" title="Enter Stock" required/>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Please fill out this field.</div>
                                            </div>
                                            <div class="form-group d-cross d-car-used">
                                                <label for="registration-year">Registration Year</label>
                                                <input id="registration-year" type="number" class="form-control" name="registration_year" value="{{ $product->registration_year ?? '' }}" placeholder="Enter Registration Year" title="Enter Registration Year" />
                                            </div>
                                            <div class="form-group d-cross d-car-recondition d-car-used">
                                                <label for="kms-driven">Kms driven</label>
                                                <input id="kms-driven" type="number" class="form-control" name="kms_driven" value="{{ $product->kms_driven ?? '' }}" placeholder="Enter Kms driven" title="Enter Kms driven" />
                                            </div>
                                            <div class="form-group d-cross d-car-recondition">
                                                <label for="auction-grade">Auction Grade</label>
                                                <select id="auction-grade" name="auction_grade_id" class="custom-select" required>
                                                    <option value="0">--Select Auction Grade--</option>
                                                    @foreach($auction_grades as $auction_grade)
                                                    <option value="{{ $auction_grade->id }}" @if(isset($product) && $product->auction_grade_id == $auction_grade->id) selected @endif>{{ $auction_grade->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Please fill out this field.</div>
                                            </div>
                                            <div class="display-5">After Sell Service</div>
                                            <div class="custom-control custom-checkbox">
                                                <div class="row">
                                                    @foreach($after_sell_services as $after_sell_service)
                                                    <div class="col-6">
                                                        <input type="checkbox" class="custom-control-input" id="after-sell-service-{{ $after_sell_service->id }}" name="after_sell_service[]" value="{{ $after_sell_service->id }}" @if(isset($product) && $product->after_sell_service && in_array($after_sell_service->id, $product->after_sell_service)) checked @endif>
                                                        <label class="custom-control-label" for="after-sell-service-{{ $after_sell_service->id }}">{{ $after_sell_service->name }}</label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="note">Note:</label>
                                                <textarea name="note" class="form-control editor-tools" rows="5" id="note" required>{!! $product->note ?? '' !!}</textarea>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Please fill out this field.</div>
                                            </div>
                                            <div class="form-group">
                                                <button id="profile-submit" class="btn btn-theme mt-5" type="submit">Store</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
        placeholder: 'Enter note for your product',
        tabsize: 2,
        height: 100
    });
</script>
<script>
    (function () {
        updateCrossElements();
    })();
    function updateCrossElements() {
        var category = document.getElementById('category').value;
        var condition = document.getElementById('condition').value;
        var crosses = document.getElementsByClassName("d-cross");
        var cars = document.getElementsByClassName("d-car");
        var car_reconditions = document.getElementsByClassName("d-car-recondition");
        var car_useds = document.getElementsByClassName("d-car-used");
        var motorcycles = document.getElementsByClassName("d-motorcycle");
        for (let i = 0; i < crosses.length; i++) {
            crosses[i].classList.add('d-none');
        }
        if (category == '1') {
            for (let i = 0; i < cars.length; i++) {
                cars[i].classList.remove('d-none');
            }
            if (condition == '2') {
                for (let i = 0; i < car_reconditions.length; i++) {
                    car_reconditions[i].classList.remove('d-none');
                }
            } else if (condition == '3') {
                for (let i = 0; i < car_useds.length; i++) {
                    car_useds[i].classList.remove('d-none');
                }
            }
        } else if (category == '2') {
            for (let i = 0; i < cars.length; i++) {
                cars[i].classList.remove('d-none');
            }
        }

    }
    ;
</script>
@endsection
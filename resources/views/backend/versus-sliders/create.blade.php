@extends('layouts.dashboard')
@section('title')
{{ __(isset($versus_slider)?'Update slider':'Create slider') }}
@endsection
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<section class="content-header">
			<h3>Category <small>{{ isset($versus_slider)?'edit':'create' }}</small></h3>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li><a href="#">Sliders</a></li>
				<li class="active">{{ isset($versus_slider)?'Edit':'Create' }}</li>
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
						<h3 class="box-title"><i class="fa fa-edit"></i> {{ __(isset($versus_slider)?'Update slider':'Create slider') }}</h3>
						<div class="box-tools float-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div class="row pt-2">
							<div class="col-12"><!--left col-->
								<form action="@if(isset($versus_slider)) {{ route('versus-sliders.update', $versus_slider->id) }} @else {{ route('versus-sliders.store') }} @endif" method="post" enctype="multipart/form-data">
									@csrf
									@if(isset($versus_slider))
										@method('PUT')
									@endif
									<div class="form-group">
                                        <label for="category">Category</label>
                                        <select id="category" name="category_id" class="custom-select" required>
                                            <option value="0">--Select Category--</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}" @if(isset($versus_slider) && $versus_slider->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
									<div class="row">
                                        <div class="col-6 col-md-3 form-group">
                                            <input type="file" id="product1-image" name="product1_image" class="form-control bg-theme text-white" onchange="displayPhotoOnSelect(this, 'product1-image-view')" accept="image/*" value="Upload image" @if(!isset($versus_slider->product1_image)) required @endif/>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                        <div class="col-6 col-md-3 form-group">
                                            <img id="product1-image-view" style="width:50px; height:50px" src="{{ asset('/assets/versus-sliders') }}/{{ $versus_slider->product1_image ?? 'not-found.jpg' }}" class="img-thumbnail" alt="Product1">
                                        </div>
                                        <div class="col-6 col-md-3 form-group">
                                            <input type="file" id="product2-image" name="product2_image" class="form-control bg-theme text-white" onchange="displayPhotoOnSelect(this, 'product2-image-view')" accept="image/*" value="Upload image" @if(!isset($versus_slider->product1_image)) required @endif/>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                        <div class="col-6 col-md-3 form-group">
                                            <img id="product2-image-view" style="width:50px; height:50px" src="{{ asset('/assets/versus-sliders') }}/{{ $versus_slider->product2_image ?? 'not-found.jpg' }}" class="img-thumbnail" alt="Product2">
                                        </div>
                                    </div>
                                    <div class="row">
                                    	<div class="col-12 col-md-6">
                                    		<div class="form-group">
												<label for="product1-id">Product 1 ID</label>
												<input id="product1-id" type="number" class="form-control" name="product1_id" value="{{ $versus_slider->product1_id ?? '' }}" placeholder="Product 1 ID" title="Product 1 ID" />
											</div>
                                    	</div>
                                    	<div class="col-12 col-md-6">
                                    		<div class="form-group">
												<label for="product2-id">Product 2 ID</label>
												<input id="product2-id" type="number" class="form-control" name="product2_id" value="{{ $versus_slider->product2_id ?? '' }}" placeholder="Product 2 ID" title="Product 2 ID" />
											</div>
                                    	</div>
                                    </div>
									<div class="form-group mt-3">
										<button class="btn btn-success btn-theme" type="submit">{{ __(isset($versus_slider)?'Update':'Save') }}</button>
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
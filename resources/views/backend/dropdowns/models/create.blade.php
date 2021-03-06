@extends('layouts.dashboard')
@section('title')
{{ __(isset($model)?'Update Model':'Create Model') }}
@endsection
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<section class="content-header">
			<h3>Category <small>{{ isset($model)?'edit':'create' }}</small></h3>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li><a href="#">Models</a></li>
				<li class="active">{{ isset($model)?'Edit':'Create' }}</li>
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
						<h3 class="box-title"><i class="fa fa-edit"></i> {{ __(isset($model)?'Update Model':'Create Model') }}</h3>
						<div class="box-tools float-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div class="row pt-2">
							<div class="col-12"><!--left col-->
								<form action="@if(isset($model)) {{ route('models.update', $model->id) }} @else {{ route('models.store') }} @endif" method="post" enctype="multipart/form-data">
									@csrf
									@if(isset($model))
										@method('PUT')
									@endif
									<div class="form-group">
										<label for="card-type">Category</label>
										<select id="category" name="category_id" class="custom-select" required="">
											<option value="0" selected>--Select Category--</option>
											@foreach($categories as $category)
											<option value="{{ $category->id }}" @if(isset($model) && $category->id == $model->category_id) selected @endif>{{ $category->name }}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<label for="card-type">Brand</label>
										<select id="brand" name="brand_id" class="custom-select" derive-from="category" required="">
											<option value="0" selected>--Select Brand--</option>
											@foreach($brands as $brand)
											<option value="{{ $brand->id }}" @if(isset($model) && $brand->id == $model->brand_id) selected @endif derive-parent="{{ $brand->category_id }}">{{ $brand->name }}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<label for="name">Name</label>
										<input id="name" type="text" class="form-control" name="name" value="{{ $model->name ?? '' }}" placeholder="First name" title="Enter your first name if any." />
									</div>
									<div class="form-group mt-3">
										<button class="btn btn-success btn-theme" type="submit">{{ __(isset($model)?'Update':'Save') }}</button>
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
@endsection
@section('script')
@endsection
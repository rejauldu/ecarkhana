@extends('layouts.dashboard')
@section('title')
{{ __(isset($advertisement)?'Update slider':'Create slider') }}
@endsection
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<section class="content-header">
			<h3>Category <small>{{ isset($advertisement)?'edit':'create' }}</small></h3>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li><a href="#">Sliders</a></li>
				<li class="active">{{ isset($advertisement)?'Edit':'Create' }}</li>
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
						<h3 class="box-title"><i class="fa fa-edit"></i> {{ __(isset($advertisement)?'Update slider':'Create slider') }}</h3>
						<div class="box-tools float-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div class="row pt-2">
							<div class="col-12"><!--left col-->
								<form action="@if(isset($advertisement)) {{ route('advertisements.update', $advertisement->id) }} @else {{ route('advertisements.store') }} @endif" method="post" enctype="multipart/form-data">
									@csrf
									@if(isset($advertisement))
										@method('PUT')
									@endif
									<div class="form-group">
                                        <label for="category">Category</label>
                                        <select id="category" name="category_id" class="custom-select" required>
                                            <option value="0">--Select Category--</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}" @if(isset($advertisement) && $advertisement->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
									<div class="row">
                                        <div class="col-6 col-md-3 form-group">
                                        	<label for="image">Image (2*1)</label>
                                            <input type="file" id="image" name="image" class="form-control bg-theme text-white" onchange="displayPhotoOnSelect(this, 'image-view')" accept="image/*" value="Upload image" @if(!isset($advertisement->image)) required @endif/>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                        <div class="col-6 col-md-3 form-group">
                                            <img id="image-view" style="width:50px; height:50px" src="{{ asset('/assets/advertisements') }}/{{ $advertisement->image ?? 'not-found.jpg' }}" class="img-thumbnail" alt="Product1">
                                        </div>
                                    	<div class="col-12 col-md-6">
                                    		<div class="form-group">
												<label for="url">URL</label>
												<input id="url" type="url" class="form-control" name="url" value="{{ $advertisement->url ?? '' }}" placeholder="URL" title="URL" />
											</div>
                                    	</div>
                                    </div>
									<div class="form-group mt-3">
										<button class="btn btn-success btn-theme" type="submit">{{ __(isset($advertisement)?'Update':'Save') }}</button>
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
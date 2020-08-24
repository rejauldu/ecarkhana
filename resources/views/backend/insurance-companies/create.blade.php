@extends('layouts.dashboard')
@section('title')
{{ __(isset($insurance_company)?'Update insurance company':'Create insurance company') }}
@endsection
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <section class="content-header">
            <h3>Category <small>{{ isset($insurance_company)?'edit':'create' }}</small></h3>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="#">Banks</a></li>
                <li class="active">{{ isset($insurance_company)?'Edit':'Create' }}</li>
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
                        <h3 class="box-title"><i class="fa fa-edit"></i> {{ __(isset($insurance_company)?'Update insurance company':'Create insurance company') }}</h3>
                        <div class="box-tools float-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row pt-2">
                            <div class="col-12"><!--left col-->
                                <form action="@if(isset($insurance_company)) {{ route('insurance-companies.update', $insurance_company->id) }} @else {{ route('insurance-companies.store') }} @endif" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @if(isset($insurance_company))
                                    @method('PUT')
                                    @endif
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input id="name" type="text" class="form-control" name="name" value="{{ $insurance_company->name ?? '' }}" placeholder="Name" title="Enter insurance company name" />
                                    </div>
                                    <div class="display-6">Company Logo</div>
                                    <div class="row">
                                        <div class="col-6 col-md-8">
                                            <div class="form-group">
                                                <input type="file" id="file" name="logo" class="form-control bg-theme text-white" onchange="displayPhotoOnSelect(this)" accept="image/*" value="Upload picture" />
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4">
                                            <img id="display-photo-on-select" src="{{ asset('/assets/insurance-company') }}/{{ $insurance_company->logo ?? 'not-found.jpg' }}" class="img-thumbnail width-100 height-100" alt="logo">
                                        </div>
                                    </div>
                                    <div class="display-6">Company Feature</div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <div class="row">
                                            @foreach($insurance_features as $insurance_feature)
                                            <div class="col-6">
                                                <input type="checkbox" class="custom-control-input" id="insurance-feature-{{ $insurance_feature->id }}" name="insurance_feature[]" value="{{ $insurance_feature->id }}" @if(isset($insurance_company) && $insurance_company->insurance_feature && in_array($insurance_feature->id, $insurance_company->insurance_feature)) checked @endif>
                                                <label class="custom-control-label" for="insurance-feature-{{ $insurance_feature->id }}">{{ $insurance_feature->name }}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="display-6">Insurance Type</div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="checkbox" class="custom-control-input" id="supported-type-1" name="supported_type[]" value="1" @if(isset($insurance_company) && $insurance_company->supported_type && in_array(1, $insurance_company->supported_type)) checked @endif>
                                                <label class="custom-control-label" for="supported-type-1">Act Liability / Third party</label>
                                            </div>
                                            <div class="col-6">
                                                <input type="checkbox" class="custom-control-input" id="supported-type-2" name="supported_type[]" value="2" @if(isset($insurance_company) && $insurance_company->supported_type && in_array(2, $insurance_company->supported_type)) checked @endif>
                                                <label class="custom-control-label" for="supported-type-2">Comprehensive / First Party</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="display-6">Basic Coverages</div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <div class="row">
                                            @foreach($coverages as $coverage)
                                            <div class="col-6">
                                                <input type="checkbox" class="custom-control-input" id="insurance-feature-{{ $coverage->id }}" name="insurance_feature[]" value="{{ $coverage->id }}" @if(isset($insurance_company) && $insurance_company->basic_coverage && in_array($coverage->id, $insurance_company->basic_coverage)) checked @endif>
                                                <label class="custom-control-label" for="insurance-feature-{{ $coverage->id }}">{{ $coverage->name }}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group mt-3 text-right">
                                        <button class="btn btn-success btn-theme" type="submit">{{ __(isset($insurance_company)?'Update':'Save') }}</button>
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
        placeholder: 'Enter email body',
        tabsize: 2,
        height: 100
    });
</script>
@endsection
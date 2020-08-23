@extends('layouts.dashboard')
@section('title')
{{ __(isset($bank)?'Update bank':'Create bank') }}
@endsection
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <section class="content-header">
            <h3>Category <small>{{ isset($bank)?'edit':'create' }}</small></h3>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="#">Banks</a></li>
                <li class="active">{{ isset($bank)?'Edit':'Create' }}</li>
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
                        <h3 class="box-title"><i class="fa fa-edit"></i> {{ __(isset($bank)?'Update bank':'Create bank') }}</h3>
                        <div class="box-tools float-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row pt-2">
                            <div class="col-12"><!--left col-->
                                <form action="@if(isset($bank)) {{ route('banks.update', $bank->id) }} @else {{ route('banks.store') }} @endif" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @if(isset($bank))
                                    @method('PUT')
                                    @endif
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input id="name" type="text" class="form-control" name="name" value="{{ $bank->name ?? '' }}" placeholder="Name" title="Enter bank name" />
                                    </div>
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <input type="file" id="photo" name="photo" class="form-control bg-theme text-white" onchange="displayPhotoOnSelect(this, 'photo-view')" accept="image/*" value="Upload image" @if(!isset($bank->photo)) required @endif/>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                        <div class="col-6 form-group">
                                            <img id="photo-view" style="width:50px; height:50px" src="{{ asset('/assets/banks') }}/{{ $bank->photo ?? 'not-found.jpg' }}" class="img-thumbnail" alt="Product">
                                        </div>
                                    </div>
                                    <div class="row my-3 text-center">
                                        <div class="col-12 col-md-4">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="new" name="is_new" value="1" @if(isset($bank->is_new) && $bank->is_new) checked @endif>
                                                <label class="custom-control-label" for="new">Provides loan for new vehicle</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="recondition" name="is_reconditioned" value="1" @if(isset($bank->is_reconditioned) && $bank->is_reconditioned) checked @endif>
                                                <label class="custom-control-label" for="recondition">Provides loan for recondition vehicle</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="used" name="is_used" value="1" @if(isset($bank->is_used) && $bank->is_used) checked @endif>
                                                <label class="custom-control-label" for="used">Provides loan for used vehicle</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="loan_percentage">Loan percentage of total price</label>
                                        <div class="input-group">
                                            <input id="loan_percentage" type="number" class="form-control" name="loan_percentage" value="{{ $bank->loan_percentage ?? '' }}" placeholder="Loan percentage" title="Enter Loan percentage" />
                                            <div class="input-group-append">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-3">
                                        <div class="col-12 col-md-6">
                                            <div class="card">
                                                <div class="card-header list-group-item-success">
                                                    <h4 class="card-title">General</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="age_min">Age minimum</label>
                                                        <div class="input-group">
                                                            <input id="age_min" type="number" class="form-control" name="age_min" value="{{ $bank->age_min ?? '' }}" placeholder="Age minimum" title="Enter age minimum" />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">years</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="age_max">Age maximum</label>
                                                        <div class="input-group">
                                                            <input id="age_max" type="number" class="form-control" name="age_max" value="{{ $bank->age_max ?? '' }}" placeholder="Age maximum" title="Enter age maximum" />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">years</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="loan_tenure_min">Loan tenure minimum</label>
                                                        <div class="input-group">
                                                            <input id="loan_tenure_min" type="number" class="form-control" name="loan_tenure_min" value="{{ $bank->loan_tenure_min ?? '' }}" placeholder="Loan tenure minimum" title="Enter loan_tenure minimum" />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">years</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="loan_tenure_max">Loan tenure maximum</label>
                                                        <div class="input-group">
                                                            <input id="loan_tenure_max" type="number" class="form-control" name="loan_tenure_max" value="{{ $bank->loan_tenure_max ?? '' }}" placeholder="Loan tenure maximum" title="Enter loan_tenure maximum" />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">years</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="card">
                                                <div class="card-header list-group-item-warning">
                                                    <h4 class="card-title">Salaried</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="salaried_income">Monthly Salary</label>
                                                        <div class="input-group">
                                                            <input id="salaried_income" type="number" class="form-control" name="salaried_income" value="{{ $bank->salaried_income ?? '' }}" placeholder="Salary" title="Enter Salary" />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">TK</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="salaried_duration">Experience</label>
                                                        <div class="input-group">
                                                            <input id="salaried_duration" type="number" class="form-control" name="salaried_duration" value="{{ $bank->salaried_duration ?? '' }}" placeholder="Total experience" title="Enter total experience" />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">years</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="salaried_loan_min">Loan amount minimum</label>
                                                        <div class="input-group">
                                                            <input id="salaried_loan_min" type="number" class="form-control" name="salaried_loan_min" value="{{ $bank->salaried_loan_min ?? '' }}" placeholder="Loan amount minimum" title="Enter loan_amount minimum" />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">TK</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="salaried_loan_max">Loan amount maximum</label>
                                                        <div class="input-group">
                                                            <input id="salaried_loan_max" type="number" class="form-control" name="salaried_loan_max" value="{{ $bank->salaried_loan_max ?? '' }}" placeholder="Loan amount maximum" title="Enter loan_amount maximum" />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">TK</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-3">
                                        <div class="col-12 col-md-6">
                                            <div class="card">
                                                <div class="card-header list-group-item-danger">
                                                    <h4 class="card-title">Business</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="business_income">Monthly Income</label>
                                                        <div class="input-group">
                                                            <input id="business_income" type="number" class="form-control" name="business_income" value="{{ $bank->business_income ?? '' }}" placeholder="Monthly income" title="Enter Monthly Income" />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">TK</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="business_duration">Trade license duration</label>
                                                        <div class="input-group">
                                                            <input id="business_duration" type="number" class="form-control" name="business_duration" value="{{ $bank->business_duration ?? '' }}" placeholder="Trade license duration" title="Enter trade license duration" />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">years</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="business_loan_min">Loan amount minimum</label>
                                                        <div class="input-group">
                                                            <input id="business_loan_min" type="number" class="form-control" name="business_loan_min" value="{{ $bank->business_loan_min ?? '' }}" placeholder="Loan amount minimum" title="Enter loan_amount minimum" />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">TK</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="business_loan_max">Loan amount maximum</label>
                                                        <div class="input-group">
                                                            <input id="business_loan_max" type="number" class="form-control" name="business_loan_max" value="{{ $bank->business_loan_max ?? '' }}" placeholder="Loan amount maximum" title="Enter loan_amount maximum" />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">TK</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="card">
                                                <div class="card-header list-group-item-info">
                                                    <h4 class="card-title">Land-lord</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="land_lord_income">Monthly Income</label>
                                                        <div class="input-group">
                                                            <input id="land_lord_income" type="number" class="form-control" name="land_lord_income" value="{{ $bank->land_lord_income ?? '' }}" placeholder="Monthly income" title="Enter Monthly Income" />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">TK</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="land_lord_duration">Land ownership duration</label>
                                                        <div class="input-group">
                                                            <input id="land_lord_duration" type="number" class="form-control" name="land_lord_duration" value="{{ $bank->land_lord_duration ?? '' }}" placeholder="Land ownership duration" title="Enter land ownership duration" />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">years</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="land_lord_loan_min">Loan amount minimum</label>
                                                        <div class="input-group">
                                                            <input id="land_lord_loan_min" type="number" class="form-control" name="land_lord_loan_min" value="{{ $bank->land_lord_loan_min ?? '' }}" placeholder="Loan amount minimum" title="Enter loan_amount minimum" />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">TK</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="land_lord_loan_max">Loan amount maximum</label>
                                                        <div class="input-group">
                                                            <input id="land_lord_loan_max" type="number" class="form-control" name="land_lord_loan_max" value="{{ $bank->land_lord_loan_max ?? '' }}" placeholder="Loan amount maximum" title="Enter loan_amount maximum" />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">TK</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3 text-right">
                                        <button class="btn btn-success btn-theme" type="submit">{{ __(isset($bank)?'Update':'Save') }}</button>
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
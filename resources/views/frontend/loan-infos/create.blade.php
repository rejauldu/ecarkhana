@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.car-background')


<!--=================================
Start Car Loan  Eligibility-->

<section class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="section-title">
                <h2>Loan Eligibility </h2>
                <div class="separator"></div>
            </div>
        </div>
    </div>

    <h4>Check Your eligibility for loans.</h4>
    <form action="{{ route('loan-infos.store') }}" class="d-block" method="post">
        @csrf
        <div class="row" id="loan-eligibility">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="name">Your name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="email">Your email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="name">Your phone number:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">+88</span>
                        </div>
                        <input type="tel" class="form-control" id="phone" placeholder="Enter phone" name="phone">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group select">
                    <label for="gender">Gender</label>
                    <select class="form-control" name="gender_id" id="gender">
                        <option value="0">--Select Gender--</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                        <option value="3">Other</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-gift"></i></span>
                        </div>
                        <input type="text" class="form-control datepicker" name="dob" placeholder="Date of Birth" id="dob" required="" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group select">
                    <label for="residance_type">Residence Type</label>
                    <select class="form-control" name="residance_type_id" id="residance_type">
                        <option value="0">--Select Residence Type--</option>
                        <option value="1">Self Owned Home</option>
                        <option value="2">Rented Home</option>
                        <option value="3">Company Provided</option>
                        <option value="4">Other</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="residence-since">Residence Since</label>
                    <input type="text" class="form-control datepicker" name="residence_since" placeholder="Residence since" id="residence-since" required="" autocomplete="off">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="condition">Vehicle Condition</label>
                    <select id="condition" name="condition_id" class="custom-select">
                        <option value="0" selected>--Select Condition--</option>
                        @foreach($conditions as $condition)
                        <option value="{{ $condition->id }}" @if(isset($product) && $product->condition_id == $condition->id) selected @endif>{{ $condition->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="have-choice" name="have_choice" value="1">
                        <label class="custom-control-label" for="have-choice">Do you choice any car?</label>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="price">Vehicle price:</label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" id="price" placeholder="Enter price" name="price">
                        <div class="input-group-append">
                            <span class="input-group-text">TK</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group select">
                    <label for="profession">Your Profession</label>
                    <select class="form-control" name="profession_id" id="profession_id" v-model="profession">
                        <option value="0">--Select Profession--</option>
                        <option value="1">Salaried Job</option>
                        <option value="2">Business</option>
                        <option value="3">Land-lord</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-6" v-if="profession == 1 || profession == 2 || profession == 3">
                <div class="form-group">
                    <label for="division" v-if="profession == 1">Your Current Job Location</label>
                    <label for="division" v-if="profession == 2">Your Business Location</label>
                    <label for="division" v-if="profession == 3">Location of Property</label>
                    <select id="division" name="division_id" class="custom-select">
                        <option value="0" selected>--Select city--</option>
                        @foreach($divisions as $division)
                        <option value="{{ $division->id }}" @if(isset($loan_info) && $division->id == $loan_info->division->id) selected @endif>{{ $division->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-6" v-if="profession == 1">
                <div class="form-group select">
                    <label for="job-status">Job status</label>
                    <select class="form-control" name="job_status_id" id="job-status">
                        <option value="0">--Select Job Status--</option>
                        <option value="1">Permanent</option>
                        <option value="2">Contractual</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-6" v-if="profession == 1">
                <div class="form-group">
                    <label for="experience">Job Experience</label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" id="experience" placeholder="Enter job experience" name="experience">
                        <div class="input-group-append">
                            <span class="input-group-text">Years</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6" v-if="profession == 1 || profession == 2">
                <div class="form-group">
                    <label for="salary" v-if="profession == 1">Salary Per Month:</label>
                    <label for="salary" v-if="profession == 2">Your gross monthly income</label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" id="salary" placeholder="Enter Salary" name="salary">
                        <div class="input-group-append">
                            <span class="input-group-text">TK</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6" v-if="profession == 1">
                <div class="form-group">
                    <label for="emi">Monthly EMI:</label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" id="emi" placeholder="Enter EMI" name="emi">
                        <div class="input-group-append">
                            <span class="input-group-text">TK</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6" v-if="profession == 1 || profession == 2">
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="have-loan" name="have_loan" value="1">
                        <label class="custom-control-label" for="have-loan">Do you have any bank loan?</label>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6" v-if="profession == 2 || profession == 3">
                <div class="form-group select">
                    <label for="company-type" v-if="profession == 2">Company Type</label>
                    <label for="company-type" v-if="profession == 3">Property Type</label>
                    <select class="form-control" name="company_type_id" id="company-type">
                        <option value="0">--Select Company Type--</option>
                        <option value="1">Private Limited</option>
                        <option value="2">Partnership</option>
                        <option value="3">Proprietorship</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-6" v-if="profession == 2">
                <div class="form-group">
                    <label for="share">Your share portion (percentage)</label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" id="share" placeholder="Enter Share portion" name="share">
                        <div class="input-group-append">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6" v-if="profession == 2">
                <div class="form-group">
                    <label for="last-year-transaction">Last one year business transaction</label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" id="last-year-transaction" placeholder="Enter Share portion" name="last_year_transaction">
                        <div class="input-group-append">
                            <span class="input-group-text">TK</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6" v-if="profession == 2">
                <div class="form-group">
                    <label for="trade-license">Trade license age</label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" id="trade-license" placeholder="Enter Trade license age" name="trade_license">
                        <div class="input-group-append">
                            <span class="input-group-text">Years</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6" v-if="profession == 2">
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="have-other-income" name="have_other_income" value="1">
                        <label class="custom-control-label" for="have-other-income">Do you have other income?</label>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6" v-if="profession == 2 || profession == 3">
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="have-tin" name="have_tin" value="1">
                        <label class="custom-control-label" for="have-tin" v-if="profession == 2">Do you have any TIN?</label>
                        <label class="custom-control-label" for="have-tin" v-if="profession == 3">Do you have any E-TIN?</label>
                    </div>
                </div>
            </div>
            <div class="col-12 text-right">
                <div class="form-group text-right">
                    <button type="submit" class="btn button red">Check Eligibility</button>
                </div>
            </div>
            
        </div>
    </form>
</section>

<!--=================================
End  Car Loan Eligibility -->


@endsection
@section('style')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection
@section('script')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(function () {
    $(".datepicker").datepicker();
});
</script>
<script>
var loan = new Vue({
    el: '#loan-eligibility',
    data: {
        profession: 0
    },
    methods: {
        
    }
});
</script>
@endsection
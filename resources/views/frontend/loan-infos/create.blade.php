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
    <div class="card">
        <div class="card-header">
            <div class="section-title mb-0">
                @if(isset($data_type) && $data_type == 'eligibility')
                <h2>Loan Eligibility </h2>
                @else
                <h2>Car Loan Application</h2>
                @endif
                <div class="separator"></div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('loan-infos.store') }}" class="d-block" method="post">
                <input type="hidden" name="data_type" value="{{ $data_type ?? 'eligibility' }}">
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
                            <label for="dob">Date of Birth<sup class="text-danger">*</sup></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-gift"></i></span>
                                </div>
                                <input type="text" class="form-control datepicker" name="dob" placeholder="mm/dd/yyyy" id="dob" required="" autocomplete="off">
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
                            <label for="residence-since">Residence Here Since</label>
                            <select class="form-control" name="residence_since_id" id="residance_since">
                                <option value="0">--Select Residence Since--</option>
                                <option value="1">Less than 2 years</option>
                                <option value="2">More than 2 years</option>
                            </select>
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
                        <div class="form-group position-center-v">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="have-choice" name="have_choice" value="1">
                                <label class="custom-control-label" for="have-choice">Do you have any choice car?</label>
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
                            <label for="profession">Your Profession<sup class="text-danger">*</sup></label>
                            <select class="form-control" name="profession_id" id="profession_id" v-model="profession" required="">
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
                    <div class="col-12 col-md-6" v-if="profession == 1 || profession == 2 || profession == 3">
                        <div class="form-group">
                            <label for="experience" v-if="profession == 1">Job Experience<sup class="text-danger">*</sup></label>
                            <label for="experience" v-if="profession == 2">Trade Licence Age<sup class="text-danger">*</sup></label>
                            <label for="experience" v-if="profession == 3">Land Ownership Age<sup class="text-danger">*</sup></label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" id="experience" placeholder="Years" name="experience" required="">
                                <div class="input-group-append">
                                    <span class="input-group-text">Years</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="salary" v-if="profession == 1">Salary Per Month<sup class="text-danger">*</sup></label>
                            <label for="salary" v-else>Your gross monthly income<sup class="text-danger">*</sup></label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" id="salary" placeholder="Enter Income" name="salary" required="">
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
                            @if(isset($data_type) && $data_type == 'eligibility')
                            <button type="submit" class="btn button red">Check Eligibility</button>
                            @else
                            <button type="submit" class="btn button red">Apply for Loan</button>
                            @endif
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</section>

<!--=================================
End  Car Loan Eligibility -->
<!-- The Modal -->
<div class="modal" id="not-eligible">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Sorry!</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                @if(session()->has('message'))
                {{ session()->get('message') }}
                @endif
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Ok</button>
            </div>

        </div>
    </div>
</div>

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
            openModal: function() {
                @if(session()->has('message'))
                $('#not-eligible').modal('show');
                @endif
            }
        },
        mounted: function () {
            this.openModal();
        }
    });
</script>
@endsection
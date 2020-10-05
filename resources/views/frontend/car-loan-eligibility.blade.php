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

    <section class="Car Loan page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Loan Eligibility </h2>
                        <div class="separator"></div>
                    </div>
                </div>
            </div>
            <div class="loan-eligibility-block">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <h2 class="mb20">Check Your eligibility for loans.</h2>
                        <form name="formval2" class="form-horizontal loan-eligibility-form">
                            <div class="form-group">
                                <label for="input" class="control-label">Your Age</label>
                                <input type="text" class="form-control" placeholder="How old are you?" id="validationCustom1" required="">
                            </div>
                            <div class="form-group select">
                                <label for="input" class="control-label">Residence Type</label>
                                <select class="form-control" id="validationCustom2" required="">
                                    <option>Select your Residence Type</option>
                                    <option>Owned</option>
                                    <option>Rented</option>
                                </select>
                            </div>
                            <div class="form-group select">
                                <label for="input" class="control-label">Resident Here Since</label>
                                <select class="form-control" id="validationCustom3" required="">
                                        <option>Select Resident Here Since</option>
                                        <option>Less than 2 Years</option>
                                        <option>More than 2 Years</option>
                                    </select>
                            </div>
                            <div class="form-group select">
                                <label for="input" class="control-label">Total Work Experience</label>
                                <select class="form-control" id="validationCustom4" required="">
                                        <option>Total Work Experience</option>
                                        <option>Less than 2 Years</option>
                                        <option>More than 2 Years</option>
                                    </select>
                            </div>

                            <div class="form-group">
                                <label for="input" class="control-label">Car Loan Required</label>
                                <div class="input-group" >
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="number" class="form-control input-sm" placeholder="Enter Loan Amount" id="validationCustom5" required="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input" class="control-label">Net income per month</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="number" class="form-control" placeholder="Excluding LTA and Medical allowances" id="validationCustom6" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input" class="control-label">Existing loan commitments</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="number" class="form-control" placeholder="(per month)" id="validationCustom7" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input" class="control-label">Loan Tenure</label>
                                <input type="number" class="form-control" placeholder="(in years)" id="validationCustom8" required="">

                            </div>
                            <div class="form-group">
                                <label for="input" class="control-label">Rate of Interest</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">%</span>
                                    </div>
                                    <input type="number" class="form-control" id="input" value="9.5" name="int_rate2" id="validationCustom9" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="button red"  data-toggle="modal" href="#ignismyModal">Check Eligibility</button>
                                <button type="reset" class="btn btn-primary">Reset All</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
 End  Car Loan Eligibility -->


@endsection
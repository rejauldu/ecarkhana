@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
	{{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.car-background')


    <!--=================================
Start Car Loan  Insurance-->

    <section class="Car-insurance page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Insurance </h2>
                        <div class="separator"></div>
                    </div>
                </div>
            </div>
            <div class="insurance-car">
                <div class="row">
                    <div id="tabs">
                        <ul class="tabs">
                            <li data-tabs="tab11" class="active"> <span aria-hidden="true" class="icon-diamond"></span> New Car Insurance
                            </li>
                            <li data-tabs="tab22" class=""><span aria-hidden="true" class="icon-list"></span>Renew Insurance
                            </li>
                        </ul>
                        <div id="tab11" class="tabcontent">
                            <div class="progress" style="height: 40px; background: transparent;">
                                <div class="progress-bar rounded" role="progressbar" style="width: 42%;" id="progressBar">
                                    <b class="lead" id="progressText">CAR DETAILS</b>
                                </div>
                            </div>
                            <form action="" method="post" id="form-data">
                                <div id="first">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-12">
                                            <div class="select">
                                                <select class="form-control">
                                                    <option value="">Choose Model </option>
                                                    <option value="">Maruti Suzuki Omni </option>
                                                    <option value="">Maruti Suzuki Eeco </option>
                                                    <option value="">Maruti Suzuki Dzire </option>
                                                    <option value="">Maruti Suzuki Gypsy </option>
                                                    <option value="">Honda Civic </option>
                                                    <option value="">Honda Accord Hybrid </option>
                                                    <option value="">Hyundai Elantra </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <div class="select">
                                                <select class="form-control">
                                                    <option value="">Choose Fuel Type</option>
                                                    <option value="">CNG </option>
                                                    <option value="">CNG + Petrol </option>
                                                    <option value="">Diesel</option>
                                                    <option value="">Electric</option>
                                                    <option value="">Hybrid </option>
                                                    <option value="">LPG</option>
                                                    <option value="">Petrol </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <div class="select">
                                                <select class="form-control">
                                                    <option value="">Choose Variant</option>
                                                    <option value="">5 STR BS-IV </option>
                                                    <option value="">E 8 STR BS-IV</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <div class="select">
                                                <select class="form-control">
                                                    <option value="">Choose RTO</option>
                                                    <option value="">AN-01 - Port Blair</option>
                                                    <option value="">AN-02 - Car Nicobar</option>
                                                    <option value="">AP-01 - Nirmal</option>
                                                    <option value="">AP-02 - Anantapur</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <a id="next-1" class="button red" href="#">Next</a>
                                        </div>
                                    </div>
                                </div>

                                <div id="second">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-12">
                                            <input type="name" placeholder="Enter your Name" class="form-control placeholder"  id="validationCustom97" required="">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <input type="email" placeholder="Enter your Email" class="form-control placeholder"  id="validationCustom98" required="">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <input type="tel" placeholder="Enter your Mobile Number" class="form-control placeholder" id="validationCustom99" required="">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <input type="text" placeholder="Enter your Address" class="form-control placeholder" id="validationCustom96" required="">
                                        </div>


                                        <div class="col-md-6 col-sm-12">
                                            <a id="pre" class="button red" href="#">Previous</a>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <a id="Quotes" class="button red" href="car-loan-insurance-check.html">Get Quotes</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="tab22" class="tabcontent" style="display: none;">
                            <div class="progress" style="height: 40px; background: transparent;">
                                <div class="progress-bar rounded" role="progressbar" style="width: 42%;" id="RenewprogressBar">
                                    <b class="lead" id="RenewprogressText">CAR DETAILS</b>
                                </div>
                            </div>
                            <form action="" method="post" id="Renew-form-data">
                                <div id="Renewfirst">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-12">
                                            <div class="select">
                                                <select class="form-control">
                                                        <option value="">Choose Model </option>
                                                        <option value="">Maruti Suzuki Omni </option>
                                                        <option value="">Maruti Suzuki Eeco </option>
                                                        <option value="">Maruti Suzuki Dzire </option>
                                                        <option value="">Maruti Suzuki Gypsy </option>
                                                        <option value="">Honda Civic </option>
                                                        <option value="">Honda Accord Hybrid </option>
                                                        <option value="">Hyundai Elantra </option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <div class="select">
                                                <select class="form-control">
                                                        <option value="">Choose Fuel Type</option>
                                                        <option value="">CNG </option>
                                                        <option value="">CNG + Petrol </option>
                                                        <option value="">Diesel</option>
                                                        <option value="">Electric</option>
                                                        <option value="">Hybrid </option>
                                                        <option value="">LPG</option>
                                                        <option value="">Petrol </option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <div class="select">
                                                <select class="form-control">
                                                        <option value="">Choose Variant</option>
                                                        <option value="">5 STR BS-IV </option>
                                                        <option value="">E 8 STR BS-IV</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <div class="select">
                                                <select class="form-control">
                                                        <option value="">Choose RTO</option>
                                                        <option value="">AN-01 - Port Blair</option>
                                                        <option value="">AN-02 - Car Nicobar</option>
                                                        <option value="">AP-01 - Nirmal</option>
                                                        <option value="">AP-02 - Anantapur</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <div class="select">
                                                <select class="form-control">
                                                        <option value="">Choose Registration Year</option>
                                                        <option value="">2018</option>
                                                        <option value="">2017</option>
                                                        <option value="">2016</option>
                                                        <option value="">2015</option>
                                                        <option value="">2014</option>
                                                        <option value="">2013</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <input type="text" placeholder="Type Previous Insurer Name" class="form-control placeholder">
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <a id="Renewnext-1" class="button red" href="#">Next</a>
                                        </div>
                                    </div>
                                </div>

                                <div id="Renewsecond">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-12">
                                            <input type="name" placeholder="Enter your Name" class="form-control placeholder" id="validationCustom95" required="">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <input type="email" placeholder="Enter your Email" class="form-control placeholder" id="validationCustom94" required="">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <input type="tel" placeholder="Enter your Mobile Number" class="form-control placeholder" id="validationCustom93" required="">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <input type="text" placeholder="Enter your Address" class="form-control placeholder" id="validationCustom92" required="">
                                        </div>


                                        <div class="col-md-6 col-sm-12">
                                            <a id="Renewpre" class="button red" href="#">Previous</a>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <a id="RenewQuotes" class="button red" href="car-loan-insurance-check.html">Get Quotes</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

    <!--=================================
 End  Car Loan Insurance -->

@endsection
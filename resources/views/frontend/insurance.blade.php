@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
	{{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.car-background')


<!-- <section id="filter_form24">
        <div class="container">
            
        </div>
    </section> -->

<section class="Car-insurance page-section-ptb">
        <div class="container">

		<nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">CAR</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">BIKE</a>
                </div>
            </nav>

            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="sms-bg">
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
                        <div id="tab11" class="tabcontent" style="">
                           
                            <form action="" id="form-data">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-12">
                                            <div class="select">
											<label class="control-label">Insurance Type</label>
                                                <select class="form-control">
                                                    <option value="">Insurance Type </option>
                                                    <option value="">Act Liabilities / Third Party Insurance </option>
                                                    <option value="">Comprehensive / First Party Insurance </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <div class="select">
											<label class="control-label">Displacement</label>
                                                <select class="form-control">
                                                    <option value="">Displacement / Cc</option>
                                                    <option value="">800 to 1300 Cc </option>
                                                    <option value="">1300 to 1800 Cc</option>
                                                    <option value="">1800 to 3000 Cc</option>
                                                    <option value="">Over 3000 Cc</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 col-sm-12">
										<div id="passenger_block">
										    <div class="field-label">
											   <label class="control-label">No of  Passenger</label>
											   <div class="passenger-input">
											      <span class="diver-number">1 Driver +</span>
											      <input value="4" type="number" placeholder="No of Passenger">
												  <span class="total-diver-number">Total passenger : <span class=sms-passen-count> 5</span></span>
											   </div>
											</div> 
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <div class="select">
											<label class="control-label">Vehicle Type</label>
                                                <select class="form-control">
                                                    <option value="">Vehicle Type</option>
                                                    <option value="">Individual</option>
                                                    <option value="">Commercial</option>
                                                </select>
                                            </div>
                                        </div>
										<div class="form-group col-md-4 col-sm-12">
                                            <div class="select">
											<label class="control-label">Brand</label>
                                                <select class="form-control">
                                                    <option value="">Make</option>
                                                    <option value="">Toyota</option>
                                                    <option value="">Nissan</option>
                                                    <option value="">Hundai</option>
                                                </select>
                                            </div>
                                        </div>
										<div class="form-group col-md-4 col-sm-12">
                                            <div class="select">
											<label class="control-label">Model</label>
                                                <select class="form-control">
                                                    <option value="">Model</option>
                                                    <option value="">Allion</option>
                                                    <option value="">Premio</option>
                                                    <option value="">Axio</option>
                                                </select>
                                            </div>
                                        </div>


										<div class="form-group col-md-6 col-sm-12">
                                            <div class="select">
											<label class="control-label">Car Price  </label>
											<input type="number" class="form-control" placeholder="Price">
                                            </div>
                                        </div>
										<div class="form-group col-md-6 col-sm-12">
                                            <div class="select">
											<label class="control-label">Car Registration Year  </label>
											<input type="number" class="form-control" placeholder="Registration Year">
                                            </div>
                                        </div>
										<div class="col-md-6  col-sm-12 sms-rad">
											<label class="control-label">Do you have any extra policy</label>
											<div class="sms-radio">
												<input id="radio-1" name="radio" type="radio">
												<label for="radio-1" class="radio-label">Yes</label>
												<input id="radio-2" name="radio" type="radio">
												<label for="radio-2" class="radio-label">No</label>
											</div>
                                        </div>
										<div class="col-md-6  col-sm-12 sms-rad">
											<label class="control-label">Do you have any claim</label>
											<div class="sms-radio">
												<input id="radio-3" name="radio" type="radio">
												<label for="radio-3" class="radio-label">Yes</label>
												<input id="radio-4" name="radio" type="radio">
												<label for="radio-4" class="radio-label">No</label>
											</div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                        <div id="tab22" class="tabcontent" style="display: none;">
                           
                            <form action="" id="Renew-form-data">
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
                            </form>
                        </div>

                    </div>

                </div>
            </div>
					</div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="sms-bg">
					
					</div>
                </div>
                
            </div>
        </div>
    </section>

	<section>
	<div class="container">
	    <div class="sms-get-quo-res">
		<div class="row insurance-area">
                <div class="col-md-2">
                    <div class="card  border-0  align-items-center">
                        <div class="card-image mt-0"><img class=" " src="images/idic.jpg" style="width: 160px; max-width: 160px;">
                        </div>
                        <button class="button red" onclick="window.location.href = 'car-loan.html';">Apply  
                            Now</button>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card border-0">
                        <div class="row">
                            <div class="col">
                                <h4 class=" fz-22  pb-3 " style="text-align: center">IDLC Finance</h4>
                                <hr class=" mt-0 mb-0">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mt-lg-3 mt-md-2 border-right border-left-0 pt-lg-3 pt-md-2 border-top-0 border-bottom-0 border-dashed pl-0 text-center">
                                <span class="card-box-title">Loan
                                    Amount</span>
                                <p class="mb-0 font-weight-bold text-1e6  ff-roboto  card-box-content">1,000,000 BDT</p>
                            </div>
                            <div class="col  text-center  mt-lg-3 mt-md-2 border-right border-left-0 pt-lg-3 pt-md-2 border-top-0 border-bottom-0 border-dashed pr-0 pl-0">
                                <span class="card-box-title">Interest
                                    Rate</span>
                                <p class="mb-0 font-weight-bold text-1e6  ff-roboto card-box-content ">12.25 %</p>
                            </div>
                            <div class="col  text-center   mt-lg-3 mt-md-2 border-right border-left-0 pt-lg-3 pt-md-2 border-top-0 border-bottom-0 border-dashed pr-0 pl-0">
                                <span class="card-box-title text-capitalize">Loan
                                    Duration</span>
                                <p class="mb-0 font-weight-bold text-1e6  ff-roboto card-box-content ">5 Years</p>
                            </div>
                            <div class="col  text-center   mt-lg-3 mt-md-2 border-right border-left-0 pt-lg-3 pt-md-2 border-top-0 border-bottom-0 border-dashed pr-0 pl-0">
                                <span class="card-box-title text-uppercase">EMI</span>
                                <p class="mb-0 font-weight-bold text-1e6  ff-roboto  card-box-content">22,371 BDT</p>
                            </div>
                            <div class="col  text-center   mt-lg-3 mt-md-2  border-left-0 pt-lg-3 pt-md-2 "><span class="fz-15  fw-medium letter-spacing-07 card-box-title text-capitalize">
                                    Payable Amount</span>
                                <p class="mb-0 font-weight-bold text-1e6  ff-roboto  card-box-content">1,342,259 BDT</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="text-normal fz-18 text-normal-res res-style pl-2 text-555 mt-lg-2 mt-md-0 pt-4 smallScreenPadding">
                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>Floating Rate. Rate Varies: 12.25%-13.25%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="table-grid-1 border-left border-top-0 border-bottom-0 border-right-0 border-dashed col">
                        <div class="card full-height d-flex align-items-center justify-content-center border-0 align-items-center justify-content-streatch">
                            <img src="images/credit-card-search.png">
                            <button class="required" data-toggle="modal" data-target="#exampleModalScrollable">Required
                                Documents
                            </button>
                            <button class="quick-details"><span>Quick Details</span><i class="fa fa-plus-square" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-features border-top border-dashed mt-0 " style="display: none;">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card border-0">
                                <h5 class="features-art pb-2">Fees &amp; Charges</h5>
                                <div>
                                    <p>Processing Fee: 1% of the approved loan amount</p>
                                    <p>Early Adjustment Fee: 2% of outstanding amount</p>
                                    <p>Partial Payment Fee: 2% of the prepayment amount</p>
                                    <p>Penal Charge: 2% on the arrears amount.&nbsp;</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 ">
                            <div class="card border-0">
                                <h5 class="features-art pb-2">Features</h5>
                                <div>
                                    <div>Financing for buying new, reconditioned and used cars</div>
                                    <div>Transparent fixed pricing</div>
                                    <div>Finance of up to 50% of car value</div>
                                    <div>Maximum loan amount of BDT 400,00,00</div>
                                    <div>Flexible tenure of up to 5 years</div>
                                    <div>Discount in pricing for bundle combination with Personal Loan&nbsp;</div>
                                    <div>No prior account relationship, personal guarantee or cash security required
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card pl-3 border-0 cc_cursor">
                                <h5 class="features-art pb-2 cc_cursor">Eligibility</h5>
                                <div>
                                    <p>Minimum Income: BDT 32,500<br>Minimum&nbsp; Years Ownership Required.<br>Age Requirement&nbsp;: 23 to 65 Years.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
	    </div>
	</div>
	</section>
    


@endsection
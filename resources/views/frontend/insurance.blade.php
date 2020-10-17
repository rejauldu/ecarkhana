@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
	{{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.car-background')
<section class="sms-new-Car-insurance page-section-ptb">
        <div class="container">
			<div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Car Insurance </h2>
                        <div class="separator"></div>
                    </div>
                </div>
            </div>
            <div class="new-insurance-car">
                <div class="row">
                    <div id="tabs">
                        <ul class="tabs">
                            <li data-tabs="tab11" class="active"> <span aria-hidden="true" class="icon-diamond"></span> New Insurance
                            </li>
                            <li data-tabs="tab22" class=""><span aria-hidden="true" class="icon-list"></span>Renew Insurance
                            </li>
                        </ul>
                        <div id="tab11" class="tabcontent" style="">
                           
                            <form action="" class="form-data">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-12">
                                            <div class="select">
											<label class="control-label">Insurance Type</label>
                                                <select id="colorselector" class="form-control">
                                                    <option value="">Insurance Type </option>
                                                    <option value="">Act Liabilities / Third Party Insurance </option>
                                                    <option value="compress">Comprehensive / First Party Insurance </option>
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

                                    <div class="output">
                                        <div  id="compress" class="colors car" style="display: none;">
                                            <div class="row">
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
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    <div id="tab22" class="tabcontent" style="display: none;">
                    <form action="" class="form-data">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-12">
                                            <div class="select">
											<label class="control-label">Insurance Type</label>
                                                <select id="renewcolorselector" class="form-control">
                                                    <option value="">Insurance Type </option>
                                                    <option value="">Act Liabilities / Third Party Insurance </option>
                                                    <option value="renewcompress">Comprehensive / First Party Insurance </option>
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

                                    <div class="output">
                                        <div  id="renewcompress" class="colors car" style="display: none;">
                                            <div class="row">
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
                                                            <input id="radio-5" name="radio" type="radio">
                                                            <label for="radio-5" class="radio-label">Yes</label>
                                                            <input id="radio-6" name="radio" type="radio">
                                                            <label for="radio-6" class="radio-label">No</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6  col-sm-12 sms-rad">
                                                        <label class="control-label">Do you have any claim</label>
                                                        <div class="sms-radio">
                                                            <input id="radio-7" name="radio" type="radio">
                                                            <label for="radio-7" class="radio-label">Yes</label>
                                                            <input id="radio-8" name="radio" type="radio">
                                                            <label for="radio-8" class="radio-label">No</label>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                    </div>
                <button class="button red get-res">Get Quotes</button>
            </div>
		</div>
    </div>
    </section>

	<section class="get-quo-output" style="display:none;">
	<div class="container">
	    <div class="sms-get-quo-res">
		  <div class="row insurance-area">
                <div class="col-md-2">
                    <div class="card  border-0  align-items-center">
                        <div class="card-image mt-0"><img class=" " src="images/idic.jpg" style="width: 160px; max-width: 160px;">
                        </div>
                        <button class="button red" onclick="window.location.href = 'https://ecarkhana.com/insurances';">Buy @tk  - 454</button>
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
                            
                            <div class="col  text-center   mt-lg-3 mt-md-2 border-right border-left-0 pt-lg-3 pt-md-2 border-top-0 border-bottom-0 border-dashed pr-0 pl-0">
                                
                                <p class="mb-0 font-weight-bold text-1e6  ff-roboto  card-box-content">1. Smart Card</p>
                            </div>
                            <div class="col  text-center   mt-lg-3 mt-md-2  border-left-0 pt-lg-3 pt-md-2 ">
                                <p class="mb-0 font-weight-bold text-1e6  ff-roboto  card-box-content">2. Estimated delivery within 5 working days inside Dhaka.</p>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col">
                                <p class="text-normal fz-18 text-normal-res res-style pl-2 text-555 mt-lg-2 mt-md-0 pt-4 smallScreenPadding">
                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>Floating Rate. Rate Varies: 12.25%-13.25%</p>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="table-grid-1 border-left border-top-0 border-bottom-0 border-right-0 border-dashed col">
                        <div class="card full-height d-flex align-items-center justify-content-center border-0 align-items-center justify-content-streatch">
                        <div class="coverage"><div class="cover-circle"><div><span class="cover__title">2</span>Covers
                                                    </div></div></div>
                            <button class="required" data-toggle="modal" data-target="#exampleModalScrollable">Add More Covers
                            </button>
                            <button class="quick-details"><span>Breakdown</span><i class="fa fa-plus-square" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-features border-top border-dashed mt-0 " style="display: none;">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                        <div class="breakdown-content"><div class="some_random_class"><h3 class="my-2 is-size-3">Act Liability Breakdown</h3> <div class="single-block"><div class="block-term"><span>
                            Type
                        </span></div> <div class="block-detail"><span>
                            Act Liability Insurance
                        </span></div></div><div class="single-block"><div class="block-term"><span>
                            Insurance Provider Company
                        </span></div> <div class="block-detail"><span>
                            Bangladesh National Insurance Company Limited
                        </span></div></div><div class="single-block"><div class="block-term"><span>
                            CC Type
                        </span></div> <div class="block-detail"><span>
                            800 cc - 1300 cc
                        </span></div></div><div class="single-block has-full-line"><div class="block-term"><span>
                            
                        </span></div> <div class="block-detail"><span>
                            
                        </span></div></div><div class="single-block"><div class="block-term"><span>
                            Act Liabilities
                        </span></div> <div class="block-detail"><span>
                            Tk. 150
                        </span></div></div><div class="single-block"><div class="block-term"><span>
                            + 4 Passenger @ 45
                        </span></div> <div class="block-detail"><span>
                            Tk. 180
                        </span></div></div><div class="single-block"><div class="block-term"><span>
                            + 1 Driver
                        </span></div> <div class="block-detail"><span>
                            Tk. 30
                        </span></div></div><div class="single-block has-half-line"><div class="block-term"><span>
                            
                        </span></div> <div class="block-detail"><span>
                            
                        </span></div></div><div class="single-block"><div class="block-term"><span>
                            Net Premium
                        </span></div> <div class="block-detail"><span>
                            Tk. 360
                        </span></div></div><div class="single-block"><div class="block-term"><span>
                            + 15% Vat
                        </span></div> <div class="block-detail"><span>
                            Tk. 54
                        </span></div></div><div class="single-block has-full-line"><div class="block-term"><span>
                            
                        </span></div> <div class="block-detail"><span>
                            
                        </span></div></div><div class="single-block"><div class="block-term"><span>
                            Total Premium
                        </span></div> <div class="block-detail"><span>
                            Tk. 414
                        </span></div></div><div class="single-block"><div class="block-term"><span>
                            + Service Delivery Cost
                        </span></div> <div class="block-detail"><span>
                            Tk. 40
                        </span></div></div><div class="single-block has-full-line"><div class="block-term"><span>
                            
                        </span></div> <div class="block-detail"><span>
                            
                        </span></div></div><div class="single-block"><div class="block-term"><span>
                            Grand Total
                        </span></div> <div class="block-detail"><span>
                            Tk. 454</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
             <div class="col-md-4 ">
                        <div class="breakdown-content"><div class="some_random_class"><h3 class="my-2 is-size-3">Full Comprehensive</h3> <div class="single-block"><div class="block-term"><span>
                        Type
                    </span></div> <div class="block-detail"><span>
                        Comprehensive Insurance
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        Insurance Provider Company
                    </span></div> <div class="block-detail"><span>
                        Bangladesh National Insurance Company Limited
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        CC Type
                    </span></div> <div class="block-detail"><span>
                        800 cc - 1300 cc
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        Sum Insured
                    </span></div> <div class="block-detail"><span>
                        Tk. 676700
                    </span></div></div><div class="single-block has-full-line"><div class="block-term"><span>
                        
                    </span></div> <div class="block-detail"><span>
                        
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        Basic
                    </span></div> <div class="block-detail"><span>
                        Tk. 2795
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        + 2.65% of full value
                    </span></div> <div class="block-detail"><span>
                        Tk. 17933
                    </span></div></div><div class="single-block has-half-line"><div class="block-term"><span>
                        
                    </span></div> <div class="block-detail"><span>
                        
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        Own Damage
                    </span></div> <div class="block-detail"><span>
                        20728
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        + Act Liabilities
                    </span></div> <div class="block-detail"><span>
                        Tk. 150
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        + 4 Passenger @ 45
                    </span></div> <div class="block-detail"><span>
                        Tk. 180
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        + 1 Driver @ 30
                    </span></div> <div class="block-detail"><span>
                        Tk. 30
                    </span></div></div><div class="single-block has-half-line"><div class="block-term"><span>
                        
                    </span></div> <div class="block-detail"><span>
                        
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        Net Premium
                    </span></div> <div class="block-detail"><span>
                        Tk. 21088
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        + 15% Vat
                    </span></div> <div class="block-detail"><span>
                        Tk. 3163
                    </span></div></div><div class="single-block has-full-line"><div class="block-term"><span>
                        
                    </span></div> <div class="block-detail"><span>
                        
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        Total Premium
                    </span></div> <div class="block-detail"><span>
                        Tk. 24251
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        + Service Delivery Cost
                    </span></div> <div class="block-detail"><span>
                        Tk. 40
                    </span></div></div><div class="single-block has-full-line"><div class="block-term"><span>
                        
                    </span></div> <div class="block-detail"><span>
                        
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        Grand Total
                    </span></div> <div class="block-detail"><span>
                        Tk. 24291</span>
                    </div>
                </div>
            </div>
        </div>
     </div>
                        <div class="col-md-4 ">
                        <div class="breakdown-content"><div class="some_random_class"><h3 class="my-2 is-size-3">Comprehensive (Ex. Fld, cyc &amp; EQ)</h3> <div class="single-block"><div class="block-term"><span>
                                Type
                            </span></div> <div class="block-detail"><span>
                                Comprehensive Insurance
                            </span></div></div><div class="single-block"><div class="block-term"><span>
                                Insurance Provider Company
                            </span></div> <div class="block-detail"><span>
                                Bangladesh National Insurance Company Limited
                            </span></div></div><div class="single-block"><div class="block-term"><span>
                                CC Type
                            </span></div> <div class="block-detail"><span>
                                800 cc - 1300 cc
                            </span></div></div><div class="single-block"><div class="block-term"><span>
                                Sum Insured
                            </span></div> <div class="block-detail"><span>
                                Tk. 676700
                            </span></div></div><div class="single-block has-full-line"><div class="block-term"><span>
                                
                            </span></div> <div class="block-detail"><span>
                                
                            </span></div></div><div class="single-block"><div class="block-term"><span>
                                Basic
                            </span></div> <div class="block-detail"><span>
                                Tk. 2795
                            </span></div></div><div class="single-block"><div class="block-term"><span>
                                + 2.65% of full value
                            </span></div> <div class="block-detail"><span>
                                Tk. 17933
                            </span></div></div><div class="single-block"><div class="block-term"><span>
                                - 0.5 % (EX. Fld, Cyc &amp; EQ)
                            </span></div> <div class="block-detail"><span>
                                Tk. 3384
                            </span></div></div><div class="single-block has-half-line"><div class="block-term"><span>
                                
                            </span></div> <div class="block-detail"><span>
                                
                            </span></div></div><div class="single-block"><div class="block-term"><span>
                                Own Damage
                            </span></div> <div class="block-detail"><span>
                                17344
                            </span></div></div><div class="single-block"><div class="block-term"><span>
                                + Act Liabilities
                            </span></div> <div class="block-detail"><span>
                                Tk. 150
                            </span></div></div><div class="single-block"><div class="block-term"><span>
                                + 4 Passenger @ 45
                            </span></div> <div class="block-detail"><span>
                                Tk. 180
                            </span></div></div><div class="single-block"><div class="block-term"><span>
                                + 1 Driver @ 30
                            </span></div> <div class="block-detail"><span>
                                Tk. 30
                            </span></div></div><div class="single-block has-half-line"><div class="block-term"><span>
                                
                            </span></div> <div class="block-detail"><span>
                                
                            </span></div></div><div class="single-block"><div class="block-term"><span>
                                Net Premium
                            </span></div> <div class="block-detail"><span>
                                Tk. 17704
                            </span></div></div><div class="single-block"><div class="block-term"><span>
                                + 15% Vat
                            </span></div> <div class="block-detail"><span>
                                Tk. 2656
                            </span></div></div><div class="single-block has-full-line"><div class="block-term"><span>
                                
                            </span></div> <div class="block-detail"><span>
                                
                            </span></div></div><div class="single-block"><div class="block-term"><span>
                                Total Premium
                            </span></div> <div class="block-detail"><span>
                                Tk. 20360
                            </span></div></div><div class="single-block"><div class="block-term"><span>
                                + Service Delivery Cost
                            </span></div> <div class="block-detail"><span>
                                Tk. 40
                            </span></div></div><div class="single-block has-full-line"><div class="block-term"><span>
                                
                            </span></div> <div class="block-detail"><span>
                                
                            </span></div></div><div class="single-block"><div class="block-term"><span>
                                Grand Total
                            </span></div> <div class="block-detail"><span>
                                Tk. 20400</span>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
         </div>
       </div>
     </div>


     <div class="row insurance-area">
                <div class="col-md-2">
                    <div class="card  border-0  align-items-center">
                        <div class="card-image mt-0"><img class=" " src="images/standard.jpg" style="width: 160px; max-width: 160px;">
                        </div>
                        <button class="button red" onclick="window.location.href = 'http://ecarkhana/insurance-list';">Buy @tk  - 454</button>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card border-0">
                        <div class="row">
                            <div class="col">
                                <h4 class=" fz-22  pb-3 " style="text-align: center">Standard Chartered Bank</h4>
                                <hr class=" mt-0 mb-0">
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col  text-center   mt-lg-3 mt-md-2 border-right border-left-0 pt-lg-3 pt-md-2 border-top-0 border-bottom-0 border-dashed pr-0 pl-0">
                                
                                <p class="mb-0 font-weight-bold text-1e6  ff-roboto  card-box-content">1. Smart Card</p>
                            </div>
                            <div class="col  text-center   mt-lg-3 mt-md-2  border-left-0 pt-lg-3 pt-md-2 ">
                                <p class="mb-0 font-weight-bold text-1e6  ff-roboto  card-box-content">2. Estimated delivery within 5 working days inside Dhaka.</p>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col">
                                <p class="text-normal fz-18 text-normal-res res-style pl-2 text-555 mt-lg-2 mt-md-0 pt-4 smallScreenPadding">
                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>Floating Rate. Rate Varies: 12.25%-13.25%</p>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="table-grid-1 border-left border-top-0 border-bottom-0 border-right-0 border-dashed col">
                        <div class="card full-height d-flex align-items-center justify-content-center border-0 align-items-center justify-content-streatch">
                        <div class="coverage"><div class="cover-circle"><div><span class="cover__title">2</span>Covers
                                                    </div></div></div>
                            <button class="required" data-toggle="modal" data-target="#exampleModalScrollable">Add More Covers
                            </button>
                            <button class="quick-details"><span>Breakdown</span><i class="fa fa-plus-square" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-features border-top border-dashed mt-0 " style="display: none;">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                        <div class="breakdown-content"><div class="some_random_class"><h3 class="my-2 is-size-3">Act Liability Breakdown</h3> <div class="single-block"><div class="block-term"><span>
                            Type
                        </span></div> <div class="block-detail"><span>
                            Act Liability Insurance
                        </span></div></div><div class="single-block"><div class="block-term"><span>
                            Insurance Provider Company
                        </span></div> <div class="block-detail"><span>
                            Bangladesh National Insurance Company Limited
                        </span></div></div><div class="single-block"><div class="block-term"><span>
                            CC Type
                        </span></div> <div class="block-detail"><span>
                            800 cc - 1300 cc
                        </span></div></div><div class="single-block has-full-line"><div class="block-term"><span>
                            
                        </span></div> <div class="block-detail"><span>
                            
                        </span></div></div><div class="single-block"><div class="block-term"><span>
                            Act Liabilities
                        </span></div> <div class="block-detail"><span>
                            Tk. 150
                        </span></div></div><div class="single-block"><div class="block-term"><span>
                            + 4 Passenger @ 45
                        </span></div> <div class="block-detail"><span>
                            Tk. 180
                        </span></div></div><div class="single-block"><div class="block-term"><span>
                            + 1 Driver
                        </span></div> <div class="block-detail"><span>
                            Tk. 30
                        </span></div></div><div class="single-block has-half-line"><div class="block-term"><span>
                            
                        </span></div> <div class="block-detail"><span>
                            
                        </span></div></div><div class="single-block"><div class="block-term"><span>
                            Net Premium
                        </span></div> <div class="block-detail"><span>
                            Tk. 360
                        </span></div></div><div class="single-block"><div class="block-term"><span>
                            + 15% Vat
                        </span></div> <div class="block-detail"><span>
                            Tk. 54
                        </span></div></div><div class="single-block has-full-line"><div class="block-term"><span>
                            
                        </span></div> <div class="block-detail"><span>
                            
                        </span></div></div><div class="single-block"><div class="block-term"><span>
                            Total Premium
                        </span></div> <div class="block-detail"><span>
                            Tk. 414
                        </span></div></div><div class="single-block"><div class="block-term"><span>
                            + Service Delivery Cost
                        </span></div> <div class="block-detail"><span>
                            Tk. 40
                        </span></div></div><div class="single-block has-full-line"><div class="block-term"><span>
                            
                        </span></div> <div class="block-detail"><span>
                            
                        </span></div></div><div class="single-block"><div class="block-term"><span>
                            Grand Total
                        </span></div> <div class="block-detail"><span>
                            Tk. 454</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
             <div class="col-md-4 ">
                        <div class="breakdown-content"><div class="some_random_class"><h3 class="my-2 is-size-3">Full Comprehensive</h3> <div class="single-block"><div class="block-term"><span>
                        Type
                    </span></div> <div class="block-detail"><span>
                        Comprehensive Insurance
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        Insurance Provider Company
                    </span></div> <div class="block-detail"><span>
                        Bangladesh National Insurance Company Limited
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        CC Type
                    </span></div> <div class="block-detail"><span>
                        800 cc - 1300 cc
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        Sum Insured
                    </span></div> <div class="block-detail"><span>
                        Tk. 676700
                    </span></div></div><div class="single-block has-full-line"><div class="block-term"><span>
                        
                    </span></div> <div class="block-detail"><span>
                        
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        Basic
                    </span></div> <div class="block-detail"><span>
                        Tk. 2795
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        + 2.65% of full value
                    </span></div> <div class="block-detail"><span>
                        Tk. 17933
                    </span></div></div><div class="single-block has-half-line"><div class="block-term"><span>
                        
                    </span></div> <div class="block-detail"><span>
                        
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        Own Damage
                    </span></div> <div class="block-detail"><span>
                        20728
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        + Act Liabilities
                    </span></div> <div class="block-detail"><span>
                        Tk. 150
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        + 4 Passenger @ 45
                    </span></div> <div class="block-detail"><span>
                        Tk. 180
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        + 1 Driver @ 30
                    </span></div> <div class="block-detail"><span>
                        Tk. 30
                    </span></div></div><div class="single-block has-half-line"><div class="block-term"><span>
                        
                    </span></div> <div class="block-detail"><span>
                        
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        Net Premium
                    </span></div> <div class="block-detail"><span>
                        Tk. 21088
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        + 15% Vat
                    </span></div> <div class="block-detail"><span>
                        Tk. 3163
                    </span></div></div><div class="single-block has-full-line"><div class="block-term"><span>
                        
                    </span></div> <div class="block-detail"><span>
                        
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        Total Premium
                    </span></div> <div class="block-detail"><span>
                        Tk. 24251
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        + Service Delivery Cost
                    </span></div> <div class="block-detail"><span>
                        Tk. 40
                    </span></div></div><div class="single-block has-full-line"><div class="block-term"><span>
                        
                    </span></div> <div class="block-detail"><span>
                        
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        Grand Total
                    </span></div> <div class="block-detail"><span>
                        Tk. 24291</span>
                    </div>
                </div>
            </div>
        </div>
     </div>
                        <div class="col-md-4 ">
                        <div class="breakdown-content"><div class="some_random_class"><h3 class="my-2 is-size-3">Comprehensive (Ex. Fld, cyc &amp; EQ)</h3> <div class="single-block"><div class="block-term"><span>
                                Type
                            </span></div> <div class="block-detail"><span>
                                Comprehensive Insurance
                            </span></div></div><div class="single-block"><div class="block-term"><span>
                                Insurance Provider Company
                            </span></div> <div class="block-detail"><span>
                                Bangladesh National Insurance Company Limited
                            </span></div></div><div class="single-block"><div class="block-term"><span>
                                CC Type
                            </span></div> <div class="block-detail"><span>
                                800 cc - 1300 cc
                            </span></div></div><div class="single-block"><div class="block-term"><span>
                                Sum Insured
                            </span></div> <div class="block-detail"><span>
                                Tk. 676700
                            </span></div></div><div class="single-block has-full-line"><div class="block-term"><span>
                                
                            </span></div> <div class="block-detail"><span>
                                
                            </span></div></div><div class="single-block"><div class="block-term"><span>
                                Basic
                            </span></div> <div class="block-detail"><span>
                                Tk. 2795
                            </span></div></div><div class="single-block"><div class="block-term"><span>
                                + 2.65% of full value
                            </span></div> <div class="block-detail"><span>
                                Tk. 17933
                            </span></div></div><div class="single-block"><div class="block-term"><span>
                                - 0.5 % (EX. Fld, Cyc &amp; EQ)
                            </span></div> <div class="block-detail"><span>
                                Tk. 3384
                            </span></div></div><div class="single-block has-half-line"><div class="block-term"><span>
                                
                            </span></div> <div class="block-detail"><span>
                                
                            </span></div></div><div class="single-block"><div class="block-term"><span>
                                Own Damage
                            </span></div> <div class="block-detail"><span>
                                17344
                            </span></div></div><div class="single-block"><div class="block-term"><span>
                                + Act Liabilities
                            </span></div> <div class="block-detail"><span>
                                Tk. 150
                            </span></div></div><div class="single-block"><div class="block-term"><span>
                                + 4 Passenger @ 45
                            </span></div> <div class="block-detail"><span>
                                Tk. 180
                            </span></div></div><div class="single-block"><div class="block-term"><span>
                                + 1 Driver @ 30
                            </span></div> <div class="block-detail"><span>
                                Tk. 30
                            </span></div></div><div class="single-block has-half-line"><div class="block-term"><span>
                                
                            </span></div> <div class="block-detail"><span>
                                
                            </span></div></div><div class="single-block"><div class="block-term"><span>
                                Net Premium
                            </span></div> <div class="block-detail"><span>
                                Tk. 17704
                            </span></div></div><div class="single-block"><div class="block-term"><span>
                                + 15% Vat
                            </span></div> <div class="block-detail"><span>
                                Tk. 2656
                            </span></div></div><div class="single-block has-full-line"><div class="block-term"><span>
                                
                            </span></div> <div class="block-detail"><span>
                                
                            </span></div></div><div class="single-block"><div class="block-term"><span>
                                Total Premium
                            </span></div> <div class="block-detail"><span>
                                Tk. 20360
                            </span></div></div><div class="single-block"><div class="block-term"><span>
                                + Service Delivery Cost
                            </span></div> <div class="block-detail"><span>
                                Tk. 40
                            </span></div></div><div class="single-block has-full-line"><div class="block-term"><span>
                                
                            </span></div> <div class="block-detail"><span>
                                
                            </span></div></div><div class="single-block"><div class="block-term"><span>
                                Grand Total
                            </span></div> <div class="block-detail"><span>
                                Tk. 20400</span>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
         </div>
       </div>
     </div>
	 </div>
</div>
</section>





    <!-- add more covers -->
    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Additional Covers</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="addons-area">
                               <div class="addon-text">
                                   <h2>Choose Add-ons</h2> 
                                   <p>Select add-on covers which should be chosen for the complete protection of your car.</p>
                               </div> 

                                <div class="fix-pre">
                                        <div class="totl-prem">
                                            <span class="prem">Total Premium</span>
                                            <span class="prem-amt js-targetfly">৳ 44187</span>
                                        </div> 
                                        <div class="amount addon-btn">
                                            <a href="#" class="button red">Done</a>
                                        </div>
                                </div>
                            </div>
                        </div>




                        <div class="col-md-6">
                                    <div class="add-onblock">
                                     <div class="check-feild">
                                        <input id="check-addon1" type="checkbox" class="input-check">
                                         <label class="js-addoncover"></label>
                                         <span class="js-addoncover1"></span>
                                     </div> 
                                        <div class="cover-block js-covertext">
                                          <h3 class="listClose">Zero Depreciation (ZD)  <span>৳ 18433</span></h3> 
                                           <div class="mob-slide">
                                           <p>Every year, your car devaluates due to wear and tear of its parts. 
                                           The add-on does not consider this, giving you complete coverage.
                                           </p> 
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="col-md-6">
                                    <div class="add-onblock">
                                     <div class="check-feild">
                                        <input id="check-addon1" type="checkbox" class="input-check">
                                         <label class="js-addoncover"></label>
                                         <span class="js-addoncover1"></span>
                                     </div> 
                                        <div class="cover-block js-covertext">
                                          <h3 class="listClose">Zero Depreciation (ZD)  <span>৳ 18433</span></h3> 
                                           <div class="mob-slide">
                                           <p>Every year, your car devaluates due to wear and tear of its parts. 
                                           The add-on does not consider this, giving you complete coverage.
                                           </p> 
                                        </div>
                                    </div>
                                </div>
                        </div>


                        <div class="col-md-6">
                                    <div class="add-onblock">
                                     <div class="check-feild">
                                        <input id="check-addon1" type="checkbox" class="input-check">
                                         <label class="js-addoncover"></label>
                                         <span class="js-addoncover1"></span>
                                     </div> 
                                        <div class="cover-block js-covertext">
                                          <h3 class="listClose">Zero Depreciation (ZD)  <span>৳ 18433</span></h3> 
                                           <div class="mob-slide">
                                           <p>Every year, your car devaluates due to wear and tear of its parts. 
                                           The add-on does not consider this, giving you complete coverage.
                                           </p> 
                                        </div>
                                    </div>
                                </div>
                        </div>


                        <div class="col-md-6">
                                    <div class="add-onblock">
                                     <div class="check-feild">
                                        <input id="check-addon1" type="checkbox" class="input-check">
                                         <label class="js-addoncover"></label>
                                         <span class="js-addoncover1"></span>
                                     </div> 
                                        <div class="cover-block js-covertext">
                                          <h3 class="listClose">Zero Depreciation (ZD)  <span>৳ 18433</span></h3> 
                                           <div class="mob-slide">
                                           <p>Every year, your car devaluates due to wear and tear of its parts. 
                                           The add-on does not consider this, giving you complete coverage.
                                           </p> 
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="col-md-6">
                                    <div class="add-onblock">
                                     <div class="check-feild">
                                        <input id="check-addon1" type="checkbox" class="input-check">
                                         <label class="js-addoncover"></label>
                                         <span class="js-addoncover1"></span>
                                     </div> 
                                        <div class="cover-block js-covertext">
                                          <h3 class="listClose">Zero Depreciation (ZD)  <span>৳ 18433</span></h3> 
                                           <div class="mob-slide">
                                           <p>Every year, your car devaluates due to wear and tear of its parts. 
                                           The add-on does not consider this, giving you complete coverage.
                                           </p> 
                                        </div>
                                    </div>
                                </div>
                        </div>


                                <div class="col-md-6">
                                    <div class="add-onblock">
                                     <div class="check-feild">
                                        <input id="check-addon1" type="checkbox" class="input-check">
                                         <label class="js-addoncover"></label>
                                         <span class="js-addoncover1"></span>
                                     </div> 
                                        <div class="cover-block js-covertext">
                                          <h3 class="listClose">Zero Depreciation (ZD)  <span>৳ 18433</span></h3> 
                                           <div class="mob-slide">
                                           <p>Every year, your car devaluates due to wear and tear of its parts. 
                                           The add-on does not consider this, giving you complete coverage.
                                           </p> 
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <!-- add more covers -->


@endsection
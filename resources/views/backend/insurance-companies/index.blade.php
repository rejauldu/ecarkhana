@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.car-background')


<!--=================================
Start Car Loan  Eligibility check-->

<section class="Car-eligibility-check page-section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h4>We Have Found {{ $insurances->count() }} Vehicle Loan of Amount 10.00 Lac (BDT) for 5 Years </h4>
                    <div class="separator"></div>
                </div>
            </div>
        </div>
        @foreach($insurances as $insurance)
        <div class="row insurance-area pb-5 border border-left-0 border-top-0 border-right-0">
            <div class="col-md-2">
                <div class="card  border-0  align-items-center">
                    <div class="card-image mt-0"><img class=" " src="{{ asset('/assets/insurances') }}/{{ $insurance->photo ?? 'not-found.jpg' }}" style="width: 160px; max-width: 160px;">
                    </div>
                    <a class="btn button red" href="{{ route('car-loan') }}">Apply Now</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card border-0">
                    <div class="row">
                        <div class="col">
                            <h4 class=" fz-22  pb-3 " style="text-align: center">{{ $insurance->name }}</h4>
                            <hr class=" mt-0 mb-0" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-lg-3 mt-md-2 border-right border-left-0 pt-lg-3 pt-md-2 border-top-0 border-bottom-0 border-dashed pl-0 text-center">
                            <span class="card-box-title">Loan Percentage</span>
                            <p class="mb-0 font-weight-bold text-1e6  ff-roboto  card-box-content">{{ $insurance->loan_percentage ?? 0 }}%</p>
                        </div>
                        <div class="col text-center  mt-lg-3 mt-md-2 border-right border-left-0 pt-lg-3 pt-md-2 border-top-0 border-bottom-0 border-dashed pr-0 pl-0">
                            <span class="card-box-title">Loan tenure</span>
                            <p class="mb-0 font-weight-bold text-1e6  ff-roboto card-box-content ">{{ $insurance->loan_tenure_min ?? 0 }} - {{ $insurance->loan_tenure_max ?? 0 }} Years</p>
                        </div>
                        <div class="col text-center   mt-lg-3 mt-md-2 border-right border-left-0 pt-lg-3 pt-md-2 border-top-0 border-bottom-0 border-dashed pr-0 pl-0">
                            <span class="card-box-title text-capitalize">Customer Age</span>
                            <p class="mb-0 font-weight-bold text-1e6  ff-roboto card-box-content ">{{ $insurance->age_min ?? 0 }} - {{ $insurance->age_max ?? 0 }} Years</p>
                        </div>
                        <div class="col text-center   mt-lg-3 mt-md-2 border-right border-left-0 pt-lg-3 pt-md-2 border-top-0 border-bottom-0 border-dashed pr-0 pl-0">
                            <span class="card-box-title text-uppercase">Loan amount</span>
                            @if(isset($loan_info))
                            @php($profession = $loan_info->profession)
                            @else
                            @php($profession = 'salaried')
                            @endif
                            @php($min = $profession.'_loan_min')
                            @php($max = $profession.'_loan_max')
                            <p class="mb-0 font-weight-bold text-1e6  ff-roboto  card-box-content">{{ $insurance->$min }} - {{ $insurance->$max }} TK</p>
                        </div>
                        <div class="col text-center   mt-lg-3 mt-md-2  border-left-0 pt-lg-3 pt-md-2 ">
                            <span class="fz-15  fw-medium letter-spacing-07 card-box-title text-capitalize">Monthly Income</span>
                            @php($income = $profession.'_income')
                            <p class="mb-0 font-weight-bold text-1e6  ff-roboto  card-box-content">{{ $insurance->$income }} TK (min)</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="table-grid-1 border-left border-top-0 border-bottom-0 border-right-0 border-dashed col">
                    <div class="card full-height d-flex align-items-center justify-content-center border-0 align-items-center justify-content-streatch">
                        <div class="coverage">
							<div class="cover-circle">
								<div>
									<span class="cover__title">2</span>Covers
								</div>
							</div>
						</div>
						<button class="required" data-toggle="modal" data-target="#exampleModalScrollable">Required Documents</button>
						<button class="quick-details"><span>Quick Details</span><i class="fa fa-plus-square" aria-hidden="true"></i></button>
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
                        <div class="card pl-3 border-0">
                            <h5 class="features-art pb-2">Eligibility</h5>
                            <div>
                                <p>Minimum Income: BDT 32,500<br>Minimum&nbsp; Years Ownership Required.<br>Age Requirement&nbsp;: 23 to 65 Years.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!--=================================
End  Car Loan Eligibility Check-->



<!-- Required Document -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Required Documents</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="required-title"><i class="fa fa-info-circle"></i>REMEMBER</div>
                        <div class="required-list">
                            <ul>
                                <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>Loan processing will start only after submitting all the documents to the insurance you have applied for.</li>
                                <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>If any further document is required please submit it as early as possible otherwise loan processing will not start.</li>
                                <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>In case you submit any fake/false documents , you will be blacklisted by the insurance for lifetime.</li>
                            </ul>
                        </div>

                        <div class="required-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>Watchout</div>
                        <div class="required-list">
                            <ul>
                                <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>Do not submit any fake/false document.</li>
                                <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>Each and every document should be up-to-date.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="required-title"><i class="fa fa-info-circle"></i>ESSENTIAL DOCUMENTS</div>
                        <div class="required-list">
                            <ul>
                                <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>Lab Print Photo 4 Copy</li>
                                <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>NID/ Passport Clear Copy</li>
                                <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>TIN Certificate Copy</li>
                                <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>Utility Bill Copy (Update)</li>
                                <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>Mutation Copy</li>
                                <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>Title Deed Copy</li>
                                <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>Update Land Tax Copy</li>
                                <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>Holding Tax Copy</li>
                                <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>Rental Deed Copy</li>
                                <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>Partition Deed Copy (If Needed)</li>
                                <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>Bank Statement Last 12 Months</li>
                            </ul>
                        </div>
                        <div class="required-title"><i class="fa fa-info-circle"></i>GUARANTOR DOCUMENTS</div>
                        <div class="required-list">
                            <ul>
                                <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>Lab Print Photo 2 Copy</li>
                                <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>NID/ Passport Clear Copy</li>
                                <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>Personal Information (Address, Mobile Number)</li>
                            </ul>
                        </div>
                        <div class="required-title"><i class="fa fa-info-circle"></i>REFERENCE DOCUMENTS</div>
                        <div class="required-list">
                            <ul>
                                <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>Personal Information (Address, Mobile Number)</li>
                            </ul>
                        </div>
                        <div class="required-title"><i class="fa fa-info-circle"></i>NEW CAR</div>
                        <div class="required-list">
                            <ul>
                                <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>Car Quotation</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Required Document -->


@endsection
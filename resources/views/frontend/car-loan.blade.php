@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
	{{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.car-background')


    <!--=================================
Car Loan  -->
<section class="container">
    <div class="card">
        <div class="card-header bg-white">
            <h3 class="text-center">Apply for Car loan</h3>
        </div>
        <div class="card-body">
            <form id="loan" class="ajax-upload d-block" action="{{ route('car-loan') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Full Name" id="name" required="">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email ID" id="email" required="">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" name="phone" class="form-control" placeholder="Phone Number" id="phone" required="">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="amount">Loan Amount</label>
                            <input type="number" name="amount" class="form-control" placeholder="Loan Amount" id="amount" required="">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="condition">Condition</label>
                            <select class="form-control" name="condition_id" id="condition" required="">
                                <option value="0" selected>--Select Condition--</option>
                                @foreach($conditions as $condition)
                                <option value="{{ $condition->id }}">{{ $condition->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="dependant">No. of dependant</label>
                            <select class="form-control" name="dependant" id="dependant" required="">
                                <option>Number of Dependants</option>
                                <option value="0">0 Dependant</option>
                                <option value="1">1 Dependant</option>
                                <option value="2">2 Dependants</option>
                                <option value="3">3 Dependants</option>
                                <option value="4">4 Dependants</option>
                                <option value="5">5+ Dependants</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="date" name="dob" class="form-control" placeholder="Date of Birth" id="dob" required="">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="marital-status">Marital Status</label>
                            <select class="form-control" name="marital_status" id="marital-status" required="">
                                <option value="0">--Marital Status-</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="division">City</label>
                            <select id="division" name="division_id" class="custom-select">
                                <option value="0" selected>--Select city--</option>
                                @foreach($divisions as $division)
                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="region">Region</label>
                            <select id="region" name="region_id" class="custom-select">
                                <option value="{{ $region->id ?? 0 }}" selected>--Select region--</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" name="address" id="address" placeholder="Enter Address" title="Enter you Address">{{ $address ?? ''}}</textarea>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="income">Monthly Income</label>
                            <input type="number" name="monthly_income" class="form-control" placeholder="Monthly Income" id="income" required="">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group select">
                            <label for="gender">Gender</label>
                            <select class="form-control" name="gender" id="gender" required="">
                              <option value="0">--Select Gender--</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="industry">Employment Industry Name</label>
                            <input type="text" name="employment_industry" class="form-control" placeholder="Employment Industry" id="industry" required="">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="employer">Your Employer Name</label>
                            <input type="text" name="employer_name" class="form-control" placeholder="Employer Name" id="employer" required="">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="tel">City</label>
                            <input type="tel" name="work_phone" class="form-control" placeholder="Work Phone Number" id="tel" required="">
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        <div class="form-group">
                            <button class="button red" type="submit" data-toggle="modal" data-target="#submitquote">Submit Quote</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

    <section class="Car Loan page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Apply Loan </h2>
                        <div class="separator"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <h4>Get the @ Apply Loan</h4>
                    <p>Lorem Ipsum is simply <u>dummy text of the printing</u> and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
                        a type specimen book.</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="img-box"> <img src="images/car-loan-form.jpg" alt="image"> </div>
                        </div>
                        <div class="col-lg-6 loan-des">
                            <h6>Apply Loans</h6>
                            <p>It has survived not only five <a href="#"><strong>centuries</strong></a>, but also the leap into electronic
                                <mark>@8.95%.</mark>
                            </p>
                            <h6>Commercial Vehicle</h6>
                            <p>Survived not only five centuries, but also the leap into electronic
                                <mark>@11.99%.</mark>
                            </p>
                        </div>
                    </div>
                    <div class="divider mb-4 mt-3"></div>
                    <h4>Leave Money Problem to us.</h4>
                    <p>At vero eos et accusamus et iusto <u>odio dignissimos ducimus qui blanditiis</u> praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa
                        qui officia deserunt mollitia animi.</p>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item"> <a class="nav-link" id="eligibility-tab" data-toggle="tab" href="#eligibility" role="tab" aria-controls="eligibility" aria-selected="false">Eligibility</a> </li>
                        <li class="nav-item"> <a class="nav-link active show" id="doc-tab" data-toggle="tab" href="#doc" role="tab" aria-controls="doc" aria-selected="true">Documentation</a> </li>
                        <li class="nav-item"> <a class="nav-link" id="faq-tab" data-toggle="tab" href="#faq" role="tab" aria-controls="contact" aria-selected="false">FAQ</a> </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade" id="eligibility" role="tabpanel" aria-labelledby="eligibility-tab">
                            <table class="border-none">
                                <tbody>
                                    <tr>
                                        <td><strong>Age Limit :</strong></td>
                                        <td>The applicant should be min 21 years &amp; max. 65 years.</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Income :</strong></td>
                                        <td>Business should be profit making at least for the past 3 years</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Turnover :</strong></td>
                                        <td>Rs. 250,000 p.a. should be the minimum annual income</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Co-applicants :</strong></td>
                                        <td>Business should be profit making at least for the past 2 years</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Audited :</strong></td>
                                        <td>We accept only audited financials by CA.</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Cash flow :</strong></td>
                                        <td>On the other hand, we denounce with righteous indignation.</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Type of Business :</strong></td>
                                        <td>Proprietorship, Partnership, Pvt.Ltd. or Public Ltd.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade active show" id="doc" role="tabpanel" aria-labelledby="doc-tab">
                            <h6>Need following documents</h6>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever.</p>
                            <ul>
                                <li>Office address proof.</li>
                                <li>Passport sized photographs of all applicants / co-applicants.</li>
                                <li>Proof of Continuity Of Business</li>
                                <li>Certified copies of MOA / AOA /Partnership deed.</li>
                                <li>Repayment track record.</li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                            <h6>Do I have the option of pre-paying the entire loan amount?</h6>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever.</p>
                            <h6>Section 1.10.33 of "de Finibus Bonorum et Malorum?</h6>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever.</p>
                        </div>
                    </div>
                    <h4 class="loan-business">Why apply for a Business loan on eCapital ?</h4>
                    <ul id="loan-ull">
                        <li><strong>Lowest interest rates :</strong> At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti.</li>
                        <li><strong>Instant e-approval :</strong> At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti.</li>
                        <li><strong>Simple Online Comparison :</strong> At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti.</li>
                        <li><strong>Transparency :</strong> At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti.</li>
                    </ul>
                </div>

                <div class="col-lg-4">
                    <div class="info-box">
                        <div class="box-head">
                            <h5>Quick Apply for Loan</h5>
                        </div>
                        <div class="box-body">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
   Apply Loan  -->

<!-- Modal -->
<div class="modal fade" id="submitquote" tabindex="-1" role="dialog" aria-labelledby="submitquoteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
             </div>
            
            <div class="modal-body">
               
                <div class="thank-you-pop">
                    <img src="images/Green-Round-Tick.png" alt="">
                    <h1>Thank You!</h1>
                    <p>Your submission is received and we will contact you soon</p>
                    
                 </div>
                 
            </div>
            
        </div>
    </div>
  </div>
@endsection
@section('script')
<script src="{{ url('/js/theme.js') }}"></script>
@endsection
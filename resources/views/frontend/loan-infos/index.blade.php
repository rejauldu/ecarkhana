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

<section class="Car-eligibility-check page-section-ptb" id="loan-info">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h4>We Have Found {{ $banks->count() }} Car Loan of Amount {{ integerWithCommasIndian($loan_info->price) ?? 'you expect' }}</h4>
                    <div class="separator"></div>
                </div>
            </div>
        </div>
        @php($i = 0)
		@foreach($banks as $bank)

        <div class="row insurance-area pb-5 border border-left-0 border-top-0 border-right-0">
            <div class="col-md-2">
                <div class="card  border-0  align-items-center">
                    <div class="card-image mt-0"><img class=" " src="{{ asset('/assets/banks') }}/{{ $bank->photo ?? 'not-found.jpg' }}" style="width: 160px; max-width: 160px;">
                    </div>
                    <a class="btn button red" href="{{ route('car-loan-to', ['bank' => $bank->id, 'loan_info' => $loan_info->id]) }}">Apply Now</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card border-0">
                    <div class="row">
                        <div class="col">
                            <h4 class=" fz-22  pb-3 " style="text-align: center">{{ $bank->name }}</h4>
                            <hr class=" mt-0 mb-0" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-lg-3 mt-md-2 border-right border-left-0 pt-lg-3 pt-md-2 border-top-0 border-bottom-0 border-dashed pl-0 text-center">
                            <span class="card-box-title">Loan Percentage</span>
                            <p class="mb-0 font-weight-bold text-1e6  ff-roboto  card-box-content">{{ $bank->loan_percentage ?? 0 }}%</p>
                        </div>
                        <div class="col text-center  mt-lg-3 mt-md-2 border-right border-left-0 pt-lg-3 pt-md-2 border-top-0 border-bottom-0 border-dashed pr-0 pl-0">
                            <span class="card-box-title">Loan tenure</span>
                            <p class="mb-0 font-weight-bold text-1e6  ff-roboto card-box-content ">{{ $bank->loan_tenure_min ?? 0 }} - {{ $bank->loan_tenure_max ?? 0 }} Years</p>
                        </div>
                        <div class="col text-center mt-lg-3 mt-md-2 border-right-0 border-left-0 pt-lg-3 pt-md-2 border-top-0 border-bottom-0 border-dashed pr-0 pl-0">
                            <span class="card-box-title text-uppercase">Loan amount</span>
							@if(isset($loan_info))
							@php($profession = $loan_info->profession)
							@else
                            @php($profession = 'salaried')
							@endif
                            @php($min = $profession.'_loan_min')
                            @php($max = $profession.'_loan_max')
                            <p class="mb-0 font-weight-bold text-1e6  ff-roboto  card-box-content">BDT {{ integerWithCommasIndian($bank->$min) }} - {{ integerWithCommasIndian($bank->$max) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="table-grid-1 border-left border-top-0 border-bottom-0 border-right-0 border-dashed col">
                    <div class="card full-height d-flex align-items-center justify-content-center border-0 align-items-center justify-content-streatch">
                    	<div>Add to compare</div>
                    	<div class="text-center"><i class="fa fa-level-down"></i></div>
                        <div class="coverage">
							<div class="cover-circle">
								<input type="checkbox" v-model="selected_banks" class="width-20 height-20" value="{{ $i ?? 0 }}">
							</div>
						</div>
						<button class="quick-details"><span>Quick Details</span><i class="fa fa-plus-square" aria-hidden="true"></i></button>
					</div>
                </div>
            </div>

            <div class="col-12 card-features" style="display: none;">
                <div class="row">
                    <div class="col-12 col-md-6 mb-2">
                        <div class="card alert-danger">
                        	<div class="card-header list-group-item-danger">
	                            <h5 class="card-title">Product Features</h5>
	                        </div>
	                        <div class="card-body">
	                        	<ul class="list-group">
									<li class="list-group-item py-1 border-0 bg-transparent"><strong>Financial Amount:</strong> BDT {{ integerWithCommasIndian($bank->$min) }} - {{ integerWithCommasIndian($bank->$max) }}</li>
									<li class="list-group-item py-1 border-0 bg-transparent"><strong>Loan Tenure:</strong> {{ $bank->loan_tenure_min ?? 0 }} - {{ $bank->loan_tenure_max ?? 0 }} Years</li>
									<li class="list-group-item py-1 border-0 bg-transparent"><strong>Interest Rate:</strong> {{ $bank->loan_percentage ?? 0 }}%</li>
								</ul>
	                        </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <div class="card alert-danger h-100">
                        	<div class="card-header list-group-item-danger">
	                            <h5 class="card-title">Loan Eligibility</h5>
	                        </div>
	                        <div class="card-body">
	                        	<ul class="list-group">
                            		@php($income = $profession.'_income')
									<li class="list-group-item py-1 border-0 bg-transparent"><strong>Min. Salary Requirement:</strong> BDT {{ integerWithCommasIndian($bank->$income) }}</li>
									<li class="list-group-item py-1 border-0 bg-transparent"><strong>Age Requirement:</strong> {{ $bank->age_min ?? 0 }} - {{ $bank->age_max ?? 0 }} Years</li>
								</ul>
	                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php($i++)
        @endforeach
    </div>
    <div class=" position-fixed right-0 position-center-v height-50 width-100 alert-secondary rounded shadow-sm" v-if="selected_banks.length">
    	<a href="#loan-info-modal" data-toggle="modal" class="btn alert-danger position-center">Compare</a>
    </div>
    <!-- The Modal -->
	<div class="modal fullscreen-md" id="loan-info-modal">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Choose the right bank</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<div class="table-responsive">
						<table class="table table-striped table-sm">
							<thead>
								<tr>
									<th>Bank</th>
									<th>Interest Rate</th>
									<th>Loan Amount</th>
									<th>Age Limit</th>
									<th>Loan Tenure</th>
									<th>Monthly Income</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="i in selected_banks">
									<th>@{{ banks[i].name }}</th>
									<td>@{{ banks[i].loan_percentage }}%</td>
									<td>@{{ integerWithCommasIndian(banks[i][profession+'_loan_min']) }} - @{{ integerWithCommasIndian(banks[i][profession+'_loan_max']) }}</td>
									<td>@{{ banks[i].age_min }} - @{{ banks[i].age_max }} Years</td>
									<td>@{{ banks[i].loan_tenure_min }} - @{{ banks[i].loan_tenure_max }} Years</td>
									<td>@{{ integerWithCommasIndian(banks[i][profession+'_income']) }}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Ok</button>
				</div>

			</div>
		</div>
	</div>
</section>

<!--=================================End  Car Loan Eligibility Check-->

@endsection
@section('script')
<script>
var loan_info = new Vue({
	el: '#loan-info',
	data: {
		banks: @json($banks),
		loan_info: @json($loan_info),
		selected_banks: [],
		profession: "{{ $loan_info->profession ?? 'salaried' }}"
	}
});
</script>
@endsection
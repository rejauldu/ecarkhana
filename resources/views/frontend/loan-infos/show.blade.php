@extends('layouts.dashboard')
@section('title')
{{ __('All Loan Infos') }}
@endsection
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <section class="content-header">
            <h3>Loan Info <small>all</small></h3>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Loan Infos</li>
            </ol>
        </section>
        @if(session()->has('message'))
        <div class="alert alert-warning">
            {{ session()->get('message') }}
        </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Customer Name</td>
                                    <td>{{ $loan_info->name ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $loan_info->email ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>{{ $loan_info->phone ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td>@if($loan_info->gender_id == 1)
                                            Male
                                        @elseif($loan_info->gender_id == 2)
                                            Female
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Date of Birth</td>
                                    <td>{{ $loan_info->dob->format('jS M Y') ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>Condition</td>
                                    <td>{{ $loan_info->condition->name ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>Do you have choice?</td>
                                    <td>@if(isset($loan_info->have_choice) && $loan_info->have_choice) Yes @else No @endif</td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td>BDT {{ $loan_info->price ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>Profession</td>
                                    <td>@if($loan_info->profession_id == 1)
                                            Job holder
                                        @elseif($loan_info->profession_id == 2)
                                            Businessman
                                        @else
                                            Landlord
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>City</td>
                                    <td>{{ $loan_info->division->name ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>Job Status</td>
                                    <td>@if($loan_info->job_status_id == 1)
                                            Permanent
                                        @elseif($loan_info->job_status_id == 2)
                                            Contractual
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Experience</td>
                                    <td>{{ $loan_info->experience ?? '' }} Years</td>
                                </tr>
                                <tr>
                                    <td>Monthly Income</td>
                                    <td>{{ $loan_info->salary ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>EMI</td>
                                    <td>BDT {{ $loan_info->emi ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>Do you have other loan?</td>
                                    <td>@if(isset($loan_info->have_loan) && $loan_info->have_loan) Yes @else No @endif</td>
                                </tr>
                                <tr>
                                    <td>Do you have trade license?</td>
                                    <td>@if(isset($loan_info->trade_license) && $loan_info->trade_license) Yes @else No @endif</td>
                                </tr>
                                <tr>
                                    <td>Created At</td>
                                    <td>{{ $loan_info->created_at->format('jS M Y') }}</td>
                                </tr>
                                <tr>
                                    <td>Data Type</td>
                                    <td>{{ ucfirst($loan_info->data_type) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('style')
<!-- dataTables plugin -->
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" media="all"/>
<link href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css" rel="stylesheet" media="screen">
<link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet" media="all"/>
<!-- /dataTables plugin -->
@endsection
@section('script')
<!---dataTables plugin JavaScript -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="{{ asset('js/datatables.js') }}"></script>
<!--/dataTables plugin JavaScript -->
@endsection
@extends('layouts.dashboard')
@section('title')
{{ __('All Cars') }}
@endsection
@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		<section class="content-header">
			<h3>Car <small>all</small></h3>
			<ol class="breadcrumb">
				<li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li class="active">Cars</li>
			</ol>
		</section>
		@if(session()->has('message'))
		<div class="alert alert-warning">
			{{ session()->get('message') }}
		</div>
		@endif
		<div class="row">
			<div class="col-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-credit-card mr-1"></i> {{ __('All Cars') }}</h3>
						<div class="box-tools float-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div class="row pt-2">
							<div class="col-12 col-md-12">
								<ul class="nav nav-tabs">
									<li class="nav-item"><a class="nav-link active" href="{{ route('cars.index') }}">Car</a></li>
									<li class="nav-item"><a class="nav-link" href="{{ route('motorcycles.index') }}">Motorcycle</a></li>
									<li class="nav-item"><a class="nav-link" href="{{ route('bicycles.index') }}">Bicycle</a></li>
								</ul>
								<div class="tab-content mt-3">
									<div class="tab-pane active">
										<table id="dataTables" class="display nowrap" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th>ID</th>
													<th>Brand</th>
													<th>Model</th>
													<th>Package</th>
													<th>Created</th>
													<th>Edit</th>
													<th>Delete</th>
												</tr>
											</thead>
											<tbody>
												@foreach($cars as $car)
												<tr>
													<td>{{ $car->id }}</td>
													<td>{{ $car->brand->name ?? ''}}</td>
													<td>{{ $car->model->name ?? ''}}</td>
													<td>{{ $car->package->name ?? ''}}</td>
													<td>{{ $car->created_at->format('jS M Y') }}</td>
													<td><a href="{{ route('cars.edit', $car->id) }}" class="text-success fa fa-edit"></a></td>
													<td><a href="{{ route('cars.destroy', $car->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form').action = this.href; document.getElementById('delete-form').submit.click();" class="text-danger fa fa-trash"></button></td>
												</tr>
												@endforeach
											</tbody>
											<tfoot>
												<tr>
													<th>ID</th>
													<th>Brand</th>
													<th>Model</th>
													<th>Package</th>
													<th>Created</th>
													<th>Edit</th>
													<th>Delete</th>
												</tr>
											</tfoot>
										</table>
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
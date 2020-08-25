@extends('layouts.dashboard')
@section('title')
{{ __('All Insurances') }}
@endsection
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <section class="content-header">
            <h3>Insurance <small>show</small></h3>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Insurance show</li>
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
                        <h3 class="box-title"><i class="fa fa-credit-card mr-1"></i> {{ __('All Insurances') }}</h3>
                        <div class="box-tools float-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('insurances.update', $insurance->id) }}" class="w-100 text-right ajax-upload" id="form-submit" method="post">
                            @csrf
                            @method('PUT')
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="is_complete" id="switch1" @if($insurance->is_complete) checked @endif onchange="document.getElementById('form-submit').submit()" value="1">
                                <label class="custom-control-label" for="switch1">Is Complete?</label>
                            </div>
                        </form>
                        <table id="dataTables" class="display nowrap w-100">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td>Category</td>
                                    <td>{{ $insurance->category->name ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Insurance Policy</td>
                                    <td>{{ $insurance->type }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Displacement</td>
                                    <td>{{ $insurance->displacement->name ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Passenger</td>
                                    <td>{{ $insurance->passengers ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Brand</td>
                                    <td>{{ $insurance->brand->name ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Model</td>
                                    <td>{{ $insurance->model->name ?? '' }}</td>
                                </tr>
                                @if($insurance->coverages)
                                <tr>
                                    <td></td>
                                    <td>Coverages</td>
                                    <td>
                                        <ul class="list-group list-group-flush">
                                            @foreach($coverages as $coverage)
                                            @if($insurance->coverages && in_array($coverage->id, $insurance->coverages))
                                            <li class="list-group-item">{{ $coverage->name ?? '' }}</li>
                                            @endif
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                                @endif
                                @if($insurance->price)
                                <tr>
                                    <td></td>
                                    <td>Price</td>
                                    <td>Tk. {{ $insurance->price }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <td></td>
                                    <td>Company</td>
                                    <td>{{ $insurance->company->name ?? '' }}</td>
                                </tr>
                                @if($insurance->user_id)
                                <tr>
                                    <td></td>
                                    <td>User</td>
                                    <td>{{ $insurance->user->name ?? '' }}</td>
                                </tr>
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
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
<script src="{{ asset('js/dataTables.js') }}"></script>
<!--/dataTables plugin JavaScript -->
@endsection
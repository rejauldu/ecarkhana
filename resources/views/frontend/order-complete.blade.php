@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
	{{ session()->get('message') }}
</div>
@endif
@include('layouts.frontend.motorcycle-background')
<div class="card">
	<div class="card-body text-center">
		<img src="{{ asset('images/Red-Round-Tick.png') }}" />
		<h1>Thank you for your Order!</h1>
		<p>We have received your order. We will contact you shortly.</p>
	</div>
</div>
@endsection
@section('style')
<script>
(function() {
	localStorage.clear();
})();

</script>
@endsection
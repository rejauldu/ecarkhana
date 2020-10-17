@extends('layouts.chat')
@section('title')
{{ __('Chat') }}
@endsection
@section('content')
<div class="content-wrapper">
	<div class="container-fluid bg-light">
		<div class="row">
			<div class="col-12 px-0">
				<chat v-bind:user='@json($user)' v-bind:partner='@json($partner)' :messages='@json($messages)'></chat>
			</div>
		</div>
	</div>
</div>
@endsection
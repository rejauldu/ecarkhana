@extends('layouts.dashboard')
@section('title')
{{ __('Chat') }}
@endsection
@section('content')
<div class="content-wrapper">
	<div class="container-fluid bg-light">
		<div class="row">
			@computer
			<div class="col-md-3 col-sm-6 col-12 px-0">
				<chat-list :user='@json($user)' :partner='@json($partner)' :message_list='@json($message_list)' @if(session()->has('message')) error='{{ session()->get('message') }}' @endif></chat-list>
			</div>
			@endcomputer
			<div class="col-md-9 col-sm-6 col-12 px-0">
				<chat v-bind:user='@json($user)' v-bind:partner='@json($partner)' :messages='@json($messages)'></chat>
			</div>
		</div>
	</div>
</div>
@endsection
@extends('layouts.index')
@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif
@include('layouts.frontend.car-background')
<div class="row">
    <div class="col-sm-0 col-lg-2"></div>
    <div class="col-sm-12 col-lg-6">
        <!-- Title -->
        <h3 class="mt-4">{{ $post->title ?? 'No Title' }}</h3>
        <!-- Preview Image -->
        <div><img class="img-fluid rounded img-thumbnail" src="{{ url('/') }}/assets/blogs/{{ $post->photo }}" alt=""></div>
        <div class="mb-4">
            <hr/>
            <span class="text-secondary">By {{ $post->user->name }}</span> <span class="float-right">At {{ $post->created_at->format('jS M Y') }}</span>
            <hr/>
        </div>
        <!-- Post Content -->
        <div class="text-justify lead">{!! $post->body !!}</div>
    </div>
    <div class="col-sm-0 col-lg-2">
        
    </div>
</div>
@endsection
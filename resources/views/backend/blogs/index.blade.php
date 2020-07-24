@extends('layouts.index')
@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif
@include('layouts.frontend.car-background')
<div class="row my-5">
    <div class="col-sm-0 col-lg-2"></div>
    <div class="col-sm-12 col-lg-6">
        @foreach($posts as $post)
        <div class="row my-2">
            <div class="col-12 col-md-6 col-lg-4"><img src="{{ url('/') }}/assets/blogs/{{ $post->thumbnail }}" class="img-thumbnail" /></div>
            <div class="col-12 col-md-6 col-lg-8">
                <h4><a href="{{ route('blogs.show', $post->id) }}">{{ $post->title }}</a></h4>
                <hr/>
                <span class="text-secondary">By {{ $post->user->name }}</span> <span class="float-right">At {{ $post->created_at->format('jS M Y') }}</span>
                <hr/>
                <div class="text-justify">{!! excerpt($post->body, 400) !!} <a class="btn btn-link" href="{{ route('blogs.show', $post->id) }}">...more</a></div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="col-sm-0 col-lg-2"></div>
</div>
@endsection
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
    <div class="col-sm-12 col-lg-6 bg-white py-5">
        <!-- Title -->
        <h3 class="mt-4">{{ $post->title ?? 'No Title' }}</h3>
        <!-- Preview Image -->
        <div><img class="img-fluid rounded img-thumbnail w-100" src="{{ url('/') }}/assets/blogs/{{ $post->photo }}" alt=""></div>
        <div class="mb-4">
            <hr/>
            <span class="text-secondary">By {{ $post->user->name }}</span> <span class="float-right">At {{ $post->created_at->format('jS M Y') }}</span>
            <hr/>
        </div>
        <!-- Post Content -->
        <div class="text-justify">{!! $post->body !!}</div>
        <div class="card bg-white post" id="sms">
            <div class="card-body">
                <form action="{{ route('comments.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="blog_id" value="{{ $post->id }}"/>
                    <div class="input-group">
                        <input class="form-control" name="data" placeholder="Add a comment" type="text">
                        <button type="submit" class="input-group-addon border-0">
                            <a href="#" class="btn btn-danger"><i class="fa fa-check-square"></i></a>
                        </button>
                    </div>
                </form>
                @if($post->comments && $post->comments->count()>0)
                <ul class="comments-list list-style-type-none">
                    @foreach($post->comments as $comment)
                    <li class="comment">
                        <a class="pull-left" href="#" style="position:absolute">
                            <img class="avatar" src="{{ url('/') }}/assets/profile/{{ $comment->user->photo ?? 'not-found.jpg'}}" alt="avatar">
                        </a>
                        <div class="comment-body">
                            <div class="comment-heading">
                                <h4 class="user">{{ $comment->user->name ?? 'Unnamed'}}</h4>
                                <h5 class="time">{{ $comment->created_at->format('jS M Y') }}</h5>
                            </div>
                            <p>{{ $comment->data ?? ''}}</p>
                            <div class="sms-reply-comment-icon" onclick="document.getElementById('comment-box-{{ $comment->id }}').classList.remove('d-none')">
                                <i class="fa fa-reply" aria-hidden="true"></i>
                            </div>
                        </div>
                        <ul class="list-style-type-none">
                            @foreach($comment->sub_comments as $sub_comment)
                            <li class="comment sms-reply-comment">
                                <a class="pull-left" href="#" style="position:absolute">
                                    <img class="avatar" src="{{ url('/') }}/assets/profile/{{ $sub_comment->user->photo ?? 'not-found.jpg'}}" alt="avatar">
                                </a>
                                <div class="comment-body">
                                    <div class="comment-heading">
                                        <h4 class="user">{{ $sub_comment->user->name ?? 'Unnamed'}}</h4>
                                        <h5 class="time">{{ $sub_comment->created_at->format('jS M Y') }}</h5>
                                    </div>
                                    <p>{{ $sub_comment->data ?? ''}}</p>
                                </div>
                            </li>
                            @endforeach
                            <li class="mb-3 d-none" id="comment-box-{{ $comment->id }}">
                                <form action="{{ route('sub-comments.store') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="comment_id" value="{{ $comment->id }}"/>
                                    <div class="input-group">
                                        <input class="form-control" name="data" placeholder="Add a Sub-Comment" type="text">
                                        <button type="submit" class="input-group-addon border-0">
                                            <a href="#" class="btn btn-danger"><i class="fa fa-check-square"></i></a>
                                        </button>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </div>
    <div class="col-sm-0 col-lg-2 bg-white py-5">
        <div class="card">
            <div class="card-header bg-white">Categories</div>
            <div class="card-body">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="btn btn-link py-0" href="{{ route('blogs.index') }}">All Posts</a></li>
                    @foreach($categories as $category)
                    <li class="nav-item"><a class="btn btn-link py-0" href="{{ route('blogs.index') }}?category={{ $category->id }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.index')

@section('content')
@php($category = $type)
@php($category_small = strtolower($category))
@include('layouts.frontend.product-list-html')
@endsection
@section('style')
@include('layouts.frontend.product-list-css')
@endsection
@section('script')
@include('layouts.frontend.product-list-js')
@endsection
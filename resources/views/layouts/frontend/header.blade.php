<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!--base url for Script files -->
	<meta name="base-url" content="{{ url('/') }}">
	<!--Facebook Share-->
	<meta property="og:url"           content="{{ Request::url() }}" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="{{ config('app.name', 'Laravel') }}" />
	<meta property="og:description"   content="{{ config('app.name', 'Laravel') }}" />
	@if(isset($product))
	<meta property="og:image"         content="{{ url('/assets/products/cars') }}/{{ $product->photo ?? 'not-found.jpg' }}" />
	@endif
	<!--/Facebook Share end-->


	<title>{{ config('app.name', 'Laravel') }}</title>
	<link rel="icon" href="{{ asset('assets/favicon.ico') }}" type="image/gif" sizes="16x16">
	<!-- Fonts -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- All packages style -->
	<link href="{{ asset('css/frontend/app.css') }}" rel="stylesheet">
	<!-- flaticon -->
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}" />
	<!-- owl-carousel -->
    <link rel="stylesheet" href="{{ asset('css/owl-carousel/owl.carousel.css') }}" />
	<!-- slick css -->
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}" />
    <!-- revolution -->
    <link rel="stylesheet" href="{{ asset('css/revolution/settings.css') }}" />
    <!-- main style -->
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <!-- swiper -->
    <link rel="stylesheet" href="{{ asset('css/swiper.css') }}" />
	<script src="https://cdn.jsdelivr.net/npm/vue"></script>
	@yield('style')
</head>
<body>
	<!--=================================
loading -->

    <div id="loading">
        <div id="loading-center">
            <img src="{{ url('/') }}/images/{{ $type ?? 'Car' }}-loader.gif" alt="">
        </div>
    </div>

    <!--=================================
	loading -->


	<!--=================================
	Ajax loader -->
	<div class="ajax-loading ajax-active" style="display: none;"></div>

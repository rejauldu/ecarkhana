@include('layouts.backend.header')
@include('layouts.backend.top-bar')
@include('layouts.backend.left-sidebar')
@yield('content')
@computer
@include('layouts.backend.bottom-bar')
@endcomputer
@include('layouts.backend.footer')
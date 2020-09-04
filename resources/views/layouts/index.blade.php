@include('layouts.frontend.header')
@include('layouts.frontend.top-bar')
<div class="container-fluid px-0">
    <div class="row">
        <div class="col-12 pt-md-55">
            @yield('content')
        </div>
    </div>
</div>
@include('layouts.frontend.footer')
    <!--=================================
 inner-intro -->

    <section class="inner-intro bg-1 bg-overlay-black-70" style="background-image: url({{ url('/') }}/images/bike/bike-title.jpg)">
        <div class="container">
            <div class="row text-center intro-title">
                <div class="col-md-6 text-md-left d-inline-block">
					@php($url = explode('/', Request::path()))
                    <h1 class="text-white">{{ str_replace('-', ' ', $url[0]) }}</h1>
                </div>
                <div class="col-md-6 text-md-right float-right">
                    <ul class="page-breadcrumb">
                        <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-double-right"></i></li>
                        <li><span>{{ ucwords(str_replace('-', ' ', $url[0])) }}</span> </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
   inner-intro -->
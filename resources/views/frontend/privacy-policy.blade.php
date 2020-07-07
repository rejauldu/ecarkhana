@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
	{{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.car-background')


    <!--=================================
Privacy Policy  -->

    <section class="privacy-policy page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <span>Protecting your personal information </span>
                        <h2>Privacy Policy </h2>
                        <div class="separator"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p>You will begin to realize why, consectetur adipisicing elit. Quidem error quae illo excepturi nostrum blanditiis laboriosam magnam explicabo.
                    </p>
                    <p> eum nihil expedita dolorum odio dolorem, explicabo rem illum magni perferendis. You will begin to realize why, consectetur adipisicing elit. Quidem error quae illo excepturi nostrum blanditiis laboriosam magnam explicabo. Molestias,
                        eum nihil expedita dolorum odio dolorem, explicabo rem illum magni perferendis.</p>
                    <p>You will begin to realize why, consectetur adipisicing elit. Quidem error quae illo excepturi nostrum blanditiis laboriosam magnam explicabo. Molestias, eum nihil expedita dolorum odio dolorem, explicabo rem illum magni perferendis.</p>

                    <h5 class="text-red">Personal Information</h5>
                    <ul class="list-style-1">
                        <li> <i class="fa fa-angle-right"></i> You will begin to realize why, consectetur </li>
                        <li> <i class="fa fa-angle-right"></i> Quidem error quae illo excepturi nostrum blanditiis laboriosam </li>
                        <li> <i class="fa fa-angle-right"></i> Molestias, eum nihil expedita dolorum odio dolorem</li>
                        <li> <i class="fa fa-angle-right"></i> Eum nihil expedita dolorum odio dolorem</li>
                        <li> <i class="fa fa-angle-right"></i> Explicabo rem illum magni perferendis</li>
                    </ul>
                    <p>You will begin to realize why, consectetur adipisicing elit. Possimus, ex, quisquam. Nulla excepturi sint iusto incidunt sed omnis expedita, commodi dolores. Debitis nemo animi quia deleniti commodi nesciunt illo. Deserunt.</p>

                    <h5 class="text-red">Use of User Information.</h5>
                    <p>You will begin to realize why, consectetur adipisicing elit. Possimus, ex, quisquam. Nulla excepturi sint iusto incidunt sed omnis expedita, commodi dolores. Debitis nemo animi quia deleniti commodi nesciunt illo. Deserunt.You will
                        begin to realize why, consectetur adipisicing elit. Possimus, ex, quisquam. Nulla excepturi sint iusto incidunt sed omnis expedita, commodi dolores. Debitis nemo animi quia deleniti commodi nesciunt illo. Deserunt.You will begin
                        to realize why, consectetur adipisicing elit. Possimus, ex, quisquam. Nulla excepturi sint iusto incidunt sed omnis expedita, commodi dolores. Debitis nemo animi quia deleniti commodi nesciunt illo. Deserunt.</p>.

                    <h5 class="text-red">Disclosure of User Information.</h5>
                    <p>You will begin to realize why, consectetur adipisicing elit. Autem ullam nostrum dolor alias aspernatur nobis suscipit eaque cumque distinctio eos, beatae deserunt, nihil nam maiores vero, eius harum. Reprehenderit, aspernatur.<a href="#">support@website.com</a>                        </p>

                    <ul class="list-style-1">
                        <li> <i class="fa fa-angle-right"></i> Nulla excepturi sint iusto incidunt sed omnis expedita </li>
                        <li> <i class="fa fa-angle-right"></i> Quidem error quae illo excepturi nostrum blanditiis laboriosam </li>
                        <li> <i class="fa fa-angle-right"></i> Deserunt.You will begin to realize why</li>
                        <li> <i class="fa fa-angle-right"></i> Possimus, ex, quisquam. Nulla excepturi</li>
                    </ul>
                    <p>You will begin to realize why, consectetur adipisicing elit. Possimus, ex, quisquam. Nulla excepturi sint iusto incidunt sed omnis expedita, commodi dolores. Debitis nemo animi quia deleniti commodi nesciunt illo. Deserunt.<a href="#">support@website.com</a></p>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
   Privacy Policy  -->



@endsection
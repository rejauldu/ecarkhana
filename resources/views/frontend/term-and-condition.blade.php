@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
	{{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.car-background')


    <!--=================================
Terms And Conditions  -->

    <section class="terms-and-conditions page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <span>Protecting your personal information </span>
                        <h2>Terms And Conditions</h2>
                        <div class="separator"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h5 class="text-red">1. Description of Service</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente, distinctio iste praesentium totam quasi tempore, magnam ipsum cum animi at fuga alias harum quo quibusdam odit eum reprehenderit consectetur suscipit!</p>

                    <h5 class="text-red">2. Your Registration Obligations</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio nesciunt officia culpa nostrum maxime vero architecto, corporis placeat repudiandae minima facere animi, pariatur fugit dignissimos qui error est nulla. Doloribus.Lorem
                        ipsum dolor sit amet, consectetur adipisicing elit. Distinctio nesciunt officia culpa nostrum maxime vero architecto, corporis placeat repudiandae minima facere animi, pariatur fugit dignissimos qui error est nulla. Doloribus.</p>

                    <h5 class="text-red"> 3. User Account, Password, and Security</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente, distinctio iste praesentium totam quasi tempore, magnam ipsum cum animi.</p>

                    <h5 class="text-red">4. User Conduct</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente, distinctio iste praesentium totam quasi tempore, magnam ipsum cum animi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium vel recusandae ad impedit
                        ipsum, vitae facere expedita! Voluptatem iure dolorem dignissimos nisi magni a dolore, et inventore optio, voluptas, obcaecati.</p>

                    <ul class="list-style-1">
                        <li> <i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur </li>
                        <li> <i class="fa fa-angle-right"></i> Quidem error quae illo excepturi nostrum blanditiis laboriosam </li>
                        <li> <i class="fa fa-angle-right"></i> Molestias, eum nihil expedita dolorum odio dolorem</li>
                        <li> <i class="fa fa-angle-right"></i> Eum nihil expedita dolorum odio dolorem</li>
                        <li> <i class="fa fa-angle-right"></i> Explicabo rem illum magni perferendis</li>
                    </ul>

                    <h5 class="text-red">5. International Use</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente, distinctio iste praesentium totam quasi tempore, magnam ipsum cum animi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium vel recusandae ad impedit
                        ipsum, vitae facere expedita! Voluptatem iure dolorem dignissimos nisi magni a dolore, et inventore optio, voluptas, obcaecati. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate incidunt aliquam sint, magnam excepturi
                        quas a, id doloremque quasi iusto quo consequuntur dolorum neque optio ipsum, rerum nesciunt illo iure. </p>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
   Terms And Conditions  -->


@endsection
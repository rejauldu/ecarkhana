@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
	{{ session()->get('message') }}
</div>
@endif


    <!--=================================
Conatct Us  -->

    <section class="contact page-section-ptb white-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <span>We’d Love to Hear From You</span>
                        <h2>LET'S GET IN TOUCH!</h2>
                        <div class="separator"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="contact-box text-center">
                        <i class="fa fa-map-marker"></i>
                        <h5>Address</h5>
                        <p>220E Front St. Burlington NC 215</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="contact-box text-center">
                        <i class="fa fa-phone"></i>
                        <h5>Phone</h5>
                        <p> (007) 123 456 7890</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="contact-box text-center">
                        <i class="fa fa-envelope-o"></i>
                        <h5>Email</h5>
                        <p> support@website.com</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="contact-box text-center">
                        <i class="fa fa-fax"></i>
                        <h5>Fax</h5>
                        <p>(007) 123 456 7890</p>
                    </div>
                </div>
            </div>
            <div class="page-section-ptb">
                <div class="row">
                    <div class="col-lg-8 col-sm-12">
                        <div class="gray-form">
                            <div id="formmessage">Success/Error Message Goes Here</div>
                            <form class="form-horizontal" id="contactform" role="form" method="post" action="php/contact-form.php">
                                <div class="contact-form row">
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <input id="name" type="text" placeholder="Name*" class="form-control placeholder" name="name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <input type="email" placeholder="Email*" class="form-control placeholder" name="email">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <input type="text" placeholder="Phone*" class="form-control placeholder" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control input-message placeholder" placeholder="Comment*" rows="7" name="message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="hidden" name="action" value="sendEmail">
                                        <button id="submit" name="submit" type="submit" value="Send" class="button red"> Send your message </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 mt-lg-0 mt-4">
                        <div class="opening-hours gray-bg mt-sm-0">
                            <h6>opening hours</h6>
                            <ul class="list-style-none">
                                <li><strong>Sunday</strong> <span class="text-red"> closed</span></li>
                                <li><strong>Monday</strong> <span> 9:00 AM to 9:00 PM</span></li>
                                <li><strong>Tuesday </strong> <span> 9:00 AM to 9:00 PM</span></li>
                                <li><strong>Wednesday </strong> <span> 9:00 AM to 9:00 PM</span></li>
                                <li><strong>Thursday </strong> <span> 9:00 AM to 9:00 PM</span></li>
                                <li><strong>Friday </strong> <span> 9:00 AM to 9:00 PM</span></li>
                                <li><strong>Saturday </strong> <span> 9:00 AM to 9:00 PM</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-box-3">
                        <div class="icon">
                            <i class="fa fa-clock-o"></i>
                        </div>
                        <div class="content">
                            <h6>opening hours </h6>
                            <p>Voluptatem accusanoremque sed ut perspiciatis unde omnis iste natus error sit laudantium, totam rem aperiam. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box-3">
                        <div class="icon">
                            <i class="fa fa-support"></i>
                        </div>
                        <div class="content">
                            <h6>Our Support Center </h6>
                            <p>Iste natus error sit sed ut perspiciatis unde omnis voluptatem laudantium, totam rem aperiam. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box-3">
                        <div class="icon">
                            <i class="fa fa-info"></i>
                        </div>
                        <div class="content">
                            <h6>Some Information </h6>
                            <p>Totam rem aperiam sed ut perspiciatis unde omnis iste natus error sit voluptatem laudantium.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
   Conatct Us  -->


@endsection
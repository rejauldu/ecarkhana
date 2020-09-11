@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
	{{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.motorcycle-background')


    <!--=================================
Start Car Loan  Insurance-->

    <section class="Car-insurance page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Bicycle fit calculator</h2>
                        <div class="separator"></div>
                    </div>
                </div>
            </div>
            <div class="insurance-car fit-bike">
                <div class="row">
                    <div class="progress h-40 w-100 bg-transparent">
                        <div class="progress-bar rounded w-100" role="progressbar" id="progressBar">
                            <b class="lead" id="progressText">GENDER</b>
                        </div>
                    </div>
                    <form action="" method="post" id="form-data">
                        <div id="first">
                            <div class="row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <div class="rate-us">
                                        <input type='radio' name='question' value='Unhappy' class="male" id="question1b" />
                                        <label for="question1b" class="male-label">
                                            <div class="sms-name">Male</div>
                                        </label>

                                        <input type='radio' name='question' value='Unhappy' class="female" id="question3b" />
                                        <label for="question3b" class="female-label">
                                            <div class="sms-name">Female</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="sms-erpor">
                                        <a id="next-1" class="button red" href="#">Next</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="second">
                            <div class="row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <div class="rate-us">
                                        <input type='radio' name='question' value='Unhappy' class="Mountain" id="question4b" />
                                        <label for="question4b" class="Mountain-label">
                                            <div class="sms-name">Mountain bike</div>
                                        </label>

                                        <input type='radio' name='question' value='Happy' class="Road" id="question5b" />
                                        <label for="question5b" class="Road-label">
                                            <div class="sms-name">Road bike</div>
                                        </label>

                                        <input type='radio' name='question' value='Happy' id="question6b" class="City" />
                                        <label for="question6b" class="City-label">
                                            <div class="sms-name">City bike</div>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group col-md-12 col-sm-12">
                                    <div class="rate-us">
                                        <input type='radio' name='question' value='Unhappy' id="question7b" class="Cross" />
                                        <label for="question7b" class="Cross-label">
                                            <div class="sms-name">Cross country bike</div>
                                        </label>

                                        <input type='radio' name='question' value='Happy' id="question8b" class="Kids" />
                                        <label for="question8b" class="Kids-label">
                                            <div class="sms-name">Kids bike</div>
                                        </label>

                                        <input type='radio' name='question' value='Happy' id="question9b" class="E-bike" />
                                        <label for="question9b" class="E-bike-label">
                                            <div class="sms-name">E-bike</div>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <a id="pre" class="button red" href="#">Previous</a>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <a id="next-2" class="button red" href="#">Next</a>
                                </div>
                            </div>
                        </div>


                        <div id="third">
                            <div class="row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <div class="rate-us">
                                        <input type='radio' name='question' value='Unhappy' id="question10b" class="inch" />
                                        <label for="question10b" class="inch-label">
                                            <div class="sms-name">Inch</div>
                                        </label>

                                        <input type='radio' name='question' value='Happy' id="question11b" class="cm" />
                                        <label for="question11b" class="cm-label">
                                            <div class="sms-name">Cm</div>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <a id="pre-1" class="button red" href="#">Previous</a>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <a id="next-3" class="button red" href="#">Next</a>
                                </div>
                            </div>
                        </div>


                        <div id="four">
                            <div class="row">
                                <div class="form-group col-md-4 col-sm-12">
                                    <div class="mesuarement-size">
                                        <h3>INPUT MEASUREMENTS</h3>
                                        <div class="mesuarement-field">
                                            <label class="inch-label">Actual inseam </label>
                                            <input type="number" placeholder="inch" name="quantity" id="sms-check-one">
                                        </div>
                                        <div class="mesuarement-field">
                                            <label class="inch-label">Trunk </label>
                                            <input type="number" placeholder="inch" name="quantity" id="sms-check-two">
                                        </div>
                                        <div class="mesuarement-field">
                                            <label class="inch-label">Forearm </label>
                                            <input type="number" placeholder="inch" name="quantity" id="sms-check-three">
                                        </div>
                                        <div class="mesuarement-field">
                                            <label class="inch-label">Arm</label>
                                            <input type="number" placeholder="inch" name="quantity" id="sms-check-four">
                                        </div>
                                        <div class="mesuarement-field">
                                            <label class="inch-label">Thigh</label>
                                            <input type="number" placeholder="inch" name="quantity" id="sms-check-five">
                                        </div>
                                        <div class="mesuarement-field">
                                            <label class="inch-label">Lower leg</label>
                                            <input type="number" placeholder="inch" name="quantity" id="sms-check-six">
                                        </div>
                                        <div class="mesuarement-field">
                                            <label class="inch-label">Sterna leg</label>
                                            <input type="number" placeholder="inch" name="quantity" id="sms-check-seven">
                                        </div>
                                        <div class="mesuarement-field">
                                            <label class="inch-label">Total height</label>
                                            <input type="number" placeholder="inch" name="quantity" id="sms-check-eight">
                                        </div>
                                        <div class="sms-btttn-cos">
                                            <a id="pre-2" class="button red" href="#">Previous</a>
                                            <a id="next-4" class="button red" href="#">Continue</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8 col-sm-12">
                                    <div class="measurment-des">
                                        <div id="video-one">
                                            <div class="measurement-video">
                                                <div class="sms-video">
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe src="https://www.youtube.com/embed/6_-zpSXQzsA" frameborder="0" allowfullscreen=""></iframe>
                                                    </div>
                                                    <div class="video-des">
                                                        <h3>INSEAM</h3>
                                                        <p>
                                                            Wear your cycling shorts, and take the measurements in bare feet. Set your feet approximately 8" apart and straddle a straight edge - something like a square or a 2" level is ideal. Put as much pressure on your crotch as you feel when sitting on your
                                                            bike seat. Measure the distance from the top of the level to the ground. Alternatively, mark the wall, then step away and take the measurement of the mark to the ground. And whatever you do,
                                                            please don't use the inseam measurement from your Levi's! Pants inseams are at least 2" shorter than your actual inseam.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="video-img">
                                                    <img src="images/bicycle/inseam.jpg" alt="">
                                                </div>
                                            </div>
                                        </div>

                                        <div id="video-two">
                                            <div class="measurement-video">
                                                <div class="sms-video">
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe src="https://www.youtube.com/embed/6_-zpSXQzsA" frameborder="0" allowfullscreen=""></iframe>
                                                    </div>
                                                    <div class="video-des">
                                                        <h3>TRUNK</h3>
                                                        <p>
                                                            Wear your cycling shorts, and take the measurements in bare feet. Set your feet approximately 8" apart and straddle a straight edge - something like a square or a 2" level is ideal. Put as much pressure on your crotch as you feel when sitting on your
                                                            bike seat. Measure the distance from the top of the level to the ground. Alternatively, mark the wall, then step away and take the measurement of the mark to the ground. And whatever you do,
                                                            please don't use the inseam measurement from your Levi's! Pants inseams are at least 2" shorter than your actual inseam.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="video-img">
                                                    <img src="images/bicycle/trunk.jpg" alt="">
                                                </div>
                                            </div>
                                        </div>

                                        <div id="video-three">
                                            <div class="measurement-video">
                                                <div class="sms-video">
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe src="https://www.youtube.com/embed/YQ6iM5EGmPg" frameborder="0" allowfullscreen=""></iframe>
                                                    </div>
                                                    <div class="video-des">
                                                        <h3>FOREARM</h3>
                                                        <p>
                                                            Wear your cycling shorts, and take the measurements in bare feet. Set your feet approximately 8" apart and straddle a straight edge - something like a square or a 2" level is ideal. Put as much pressure on your crotch as you feel when sitting on your
                                                            bike seat. Measure the distance from the top of the level to the ground. Alternatively, mark the wall, then step away and take the measurement of the mark to the ground. And whatever you do,
                                                            please don't use the inseam measurement from your Levi's! Pants inseams are at least 2" shorter than your actual inseam.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="video-img">
                                                    <img src="images/bicycle/forearm.jpg" alt="">
                                                </div>
                                            </div>
                                        </div>

                                        <div id="video-four">
                                            <div class="measurement-video">
                                                <div class="sms-video">
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe src="https://www.youtube.com/embed/M_TUSEMIY_g" frameborder="0" allowfullscreen=""></iframe>
                                                    </div>
                                                    <div class="video-des">
                                                        <h3>ARM</h3>
                                                        <p>
                                                            Wear your cycling shorts, and take the measurements in bare feet. Set your feet approximately 8" apart and straddle a straight edge - something like a square or a 2" level is ideal. Put as much pressure on your crotch as you feel when sitting on your
                                                            bike seat. Measure the distance from the top of the level to the ground. Alternatively, mark the wall, then step away and take the measurement of the mark to the ground. And whatever you do,
                                                            please don't use the inseam measurement from your Levi's! Pants inseams are at least 2" shorter than your actual inseam.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="video-img">
                                                    <img src="images/bicycle/arm.JPG" alt="">
                                                </div>
                                            </div>
                                        </div>


                                        <div id="video-five">
                                            <div class="measurement-video">
                                                <div class="sms-video">
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe src="https://www.youtube.com/embed/rHbA9qgKIYk" frameborder="0" allowfullscreen=""></iframe>
                                                    </div>
                                                    <div class="video-des">
                                                        <h3>THIGH</h3>
                                                        <p>
                                                            Wear your cycling shorts, and take the measurements in bare feet. Set your feet approximately 8" apart and straddle a straight edge - something like a square or a 2" level is ideal. Put as much pressure on your crotch as you feel when sitting on your
                                                            bike seat. Measure the distance from the top of the level to the ground. Alternatively, mark the wall, then step away and take the measurement of the mark to the ground. And whatever you do,
                                                            please don't use the inseam measurement from your Levi's! Pants inseams are at least 2" shorter than your actual inseam.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="video-img">
                                                    <img src="images/bicycle/thigh.JPG" alt="">
                                                </div>
                                            </div>
                                        </div>


                                        <div id="video-six">
                                            <div class="measurement-video">
                                                <div class="sms-video">
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe src="https://www.youtube.com/embed/aeoMJj53ujQ" frameborder="0" allowfullscreen=""></iframe>
                                                    </div>
                                                    <div class="video-des">
                                                        <h3>LOWER LEG</h3>
                                                        <p>
                                                            Wear your cycling shorts, and take the measurements in bare feet. Set your feet approximately 8" apart and straddle a straight edge - something like a square or a 2" level is ideal. Put as much pressure on your crotch as you feel when sitting on your
                                                            bike seat. Measure the distance from the top of the level to the ground. Alternatively, mark the wall, then step away and take the measurement of the mark to the ground. And whatever you do,
                                                            please don't use the inseam measurement from your Levi's! Pants inseams are at least 2" shorter than your actual inseam.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="video-img">
                                                    <img src="images/bicycle/lowerLeg.jpg" alt="">
                                                </div>
                                            </div>
                                        </div>


                                        <div id="video-seven">
                                            <div class="measurement-video">
                                                <div class="sms-video">
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe src="https://www.youtube.com/embed/DgLBwA7n-Ug" frameborder="0" allowfullscreen=""></iframe>
                                                    </div>
                                                    <div class="video-des">
                                                        <h3>STERNAL NOTCH</h3>
                                                        <p>
                                                            Wear your cycling shorts, and take the measurements in bare feet. Set your feet approximately 8" apart and straddle a straight edge - something like a square or a 2" level is ideal. Put as much pressure on your crotch as you feel when sitting on your
                                                            bike seat. Measure the distance from the top of the level to the ground. Alternatively, mark the wall, then step away and take the measurement of the mark to the ground. And whatever you do,
                                                            please don't use the inseam measurement from your Levi's! Pants inseams are at least 2" shorter than your actual inseam.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="video-img">
                                                    <img src="images/bicycle/sternalNotch.jpg" alt="">
                                                </div>
                                            </div>
                                        </div>



                                        <div id="video-eight">
                                            <div class="measurement-video">
                                                <div class="sms-video">
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe src="https://www.youtube.com/embed/mz2UxbRCmbs" frameborder="0" allowfullscreen=""></iframe>
                                                    </div>
                                                    <div class="video-des">
                                                        <h3>
                                                            TOTAL HEIGHT</h3>
                                                        <p>
                                                            Wear your cycling shorts, and take the measurements in bare feet. Set your feet approximately 8" apart and straddle a straight edge - something like a square or a 2" level is ideal. Put as much pressure on your crotch as you feel when sitting on your
                                                            bike seat. Measure the distance from the top of the level to the ground. Alternatively, mark the wall, then step away and take the measurement of the mark to the ground. And whatever you do,
                                                            please don't use the inseam measurement from your Levi's! Pants inseams are at least 2" shorter than your actual inseam.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="video-img">
                                                    <img src="images/bicycle/totalHeight.jpg" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="five">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="measurement-result">
                                        <h3>Fit Style</h3>
                                        <div class="mesarement-res-com-name">
                                            <p>Top Tube Length</p>
                                            <p>Seat Tube Range CC</p>
                                            <p>Seat Tube Range CT</p>

                                            <div class="mesarement-res-com-name-second">
                                            <p>Stem Length</p>
                                            <p>BB Saddle Position</p>
                                            <p>Saddle Handlebar</p>
                                            <p>Saddle Setback</p>
                                            <p>Seatpost Type</p>
                                            </div>
                                            
                                        </div>
                                        <div class="mesarement-res-com-value">
                                            <p>82.6 - 83 Cm</p>
                                            <p>37.3 - 37.8 Cm</p>
                                            <p>38.4 - 38.9 Cm</p>
                                            <div class="mesarement-res-com-value-second">
                                            <p>9.6 - 10.2 Cm</p>
                                            <p>129.3 - 131.3 Cm</p>
                                            <p>51.6 - 52.2 Cm</p>
                                            <p>12.3 - 11.9 Cm</p>
                                            <p>Not Setback</p>
                                            </div>
                                            
                                        </div>
                                        <div class="bike-shop-btn">
                                            <a id="#" class="button red" href="#">Shop Now</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="mesaurment-output-img">
                                        <img src="images/bicycle/road.png" alt="">
                                    </div>
                                </div>



                                <div class="col-md-6 col-sm-12">
                                    <div class="mesaurement-pre-input">
                                        <h3>YOUR MEASUREMENTS</h3>
                                        <div class="pre-measuremne-name">
                                            <p>Actual Inseam</p>
                                            <p>Trunk </p>
                                            <p> Forearm </p>
                                            <p> Arm </p>
                                            <p> Thigh </p>
                                            <p> Lower leg </p>
                                            <p> Sterna leg </p>
                                            <p> Total height</p>
                                        </div>

                                        <div class="pre-mesaurments-valu">
                                            <p>22 In</p>
                                            <p>18 In</p>
                                            <p>15 In</p>
                                            <p>34 In</p>
                                            <p>16 In</p>
                                            <p>33 In</p>
                                            <p>43 In</p>
                                            <p>89 In</p>
                                        </div>

                                        <div class="edit-measurements">
                                            <a id="#" class="button red" href="#">Edit Now</a>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6 col-sm-12">
                                    <div class="save-result">
                                        <h3>SAVE RESULT</h3>
                                        <div class="save-des">
                                            <p style="font-weight: 700;">Never take your measurements again.</p>
                                            <p>
                                                Lose the measuring tape. Your measurements will be stored safe with us on your account page. Review and edit them at anytime. Lose the measuring tape. Your measurements will be stored safe with us on your account page. Review and edit them at anytime.
                                                Lose the measuring tape. Your measurements will be stored safe with us on your account page. Review and edit them at anytime. Lose the measuring tape.
                                            </p>
                                        </div>
                                        <div class="save-btn">
                                            <a id="#" class="button red" href="#">Save</a>
                                            <a id="#" class="button red" href="#">Download PDF</a>
                                        </div>
                                        <div class="share-sms">
                                            <a href="#">
                                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            </a>
                                            <a href="#">
                                            <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-4 col-sm-12">

                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <!--=================================
 End  Car Loan Insurance -->


@endsection
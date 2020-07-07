@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
	{{ session()->get('message') }}
</div>
@endif
@include('layouts.frontend.car-background')


    <!--=================================
Start Post Your Ad-->

    <section class="Post-Ad page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Post Your Ad </h2>
                        <div class="separator"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <form action="#" method="get" class="sms-ad">
                        <div class="form-group col-md-12 col-sm-12">
                            <label class="control-label">Ad Title</label>
                            <input type="text" class="form-control" placeholder="Brand new honda civic 2017 for sale">
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="select">
                                <label class="control-label">Select Make</label>
                                <select class="form-control">
                                    <option>Select Make : Any make</option>
                                    <option>Audi</option>
                                    <option>BMW</option>
                                    <option>Nissan</option>
                                    <option>Toyota</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="control-label">Price</label>
                            <input type="text" class="form-control" placeholder="$350">
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="select">
                                <label class="control-label">Manufacture Year</label>
                                <select class="form-control">
                                    <option>Select Make : Any make</option>
                                    <option>Audi</option>
                                    <option>BMW</option>
                                    <option>Nissan</option>
                                    <option>Toyota</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="select">
                                <label class="control-label">Select Body Type</label>
                                <select class="form-control">
                                    <option>Select Make : Any make</option>
                                    <option>Audi</option>
                                    <option>BMW</option>
                                    <option>Nissan</option>
                                    <option>Toyota</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="select">
                                <label class="control-label">Transmission Type</label>
                                <select class="form-control">
                                    <option>Select Make : Any make</option>
                                    <option>Audi</option>
                                    <option>BMW</option>
                                    <option>Nissan</option>
                                    <option>Toyota</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="select">
                                <label class="control-label">Drive Type</label>
                                <select class="form-control">
                                    <option>Select Make : Any make</option>
                                    <option>Audi</option>
                                    <option>BMW</option>
                                    <option>Nissan</option>
                                    <option>Toyota</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="select">
                                <label class="control-label">Select Type</label>
                                <select class="form-control">
                                    <option>Select Make : Any make</option>
                                    <option>Audi</option>
                                    <option>BMW</option>
                                    <option>Nissan</option>
                                    <option>Toyota</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-6 col-sm-12">
                            <div class="select">
                                <label class="control-label">Select A Vehicle</label>
                                <select class="form-control" id="colorselector">
                                    <option>Select Make : Any make</option>
                                    <option value="car">Car</option>
                                    <option value="bike">Bike</option>
                                    <option value="bicycle">Bicycle</option>
                                </select>
                            </div>
                        </div>

                        <div class="output">
                            <div id="car" class="colors car">
                                <div class="form-group col-md-12 col-sm-12 sms-checked-box">
                                    <label class="control-label">Select Additional Features Your Car Has</label>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <input type="checkbox" id="Alloy Wheels" name="features" value="Alloy Wheels">
                                            <label for="Alloy Wheels">Alloy Wheels</label>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <input type="checkbox" id="ABS" name="features" value="ABS">
                                            <label for="ABS">ABS</label>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <input type="checkbox" id="Air Bags" name="features" value="Air Bags">
                                            <label for="Air Bags">Air Bags</label>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <input type="checkbox" id="Air Conditioning" name="features" value="Air Conditioning">
                                            <label for="Air Conditioning">Air Conditioning</label>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <input type="checkbox" id="CD Player" name="features" value="CD Player">
                                            <label for="CD Player">CD Player</label>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <input type="checkbox" id="Cool Box" name="features" value="Cool Box">
                                            <label for="Cool Box">Cool Box</label>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <input type="checkbox" id="AM/FM Radio" name="features" value="AM/FM Radio">
                                            <label for="AM/FM Radio">AM/FM Radio</label>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <input type="checkbox" id="Bonnet Protector" name="features" value="Bonnet Protector">
                                            <label for="Bonnet Protector">Bonnet Protector</label>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <input type="checkbox" id="Power Steering" name="features" value="Power Steering">
                                            <label for="Power Steering">Power Steering</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="bike" class="colors bike">
                                <div class="form-group col-md-12 col-sm-12 sms-checked-box">
                                    <label class="control-label">Select Additional Features Your Bike Has</label>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <input type="checkbox" id="Alloy Wheels" name="features" value="Alloy Wheels">
                                            <label for="Alloy Wheels">Alloy Wheels</label>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <input type="checkbox" id="bike-sms" name="features" value="bike-sms">
                                            <label for="bike-sms">ABS</label>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <input type="checkbox" id="Air Bags" name="features" value="Air Bags">
                                            <label for="Air Bags">Air Bags</label>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <input type="checkbox" id="Cool Box" name="features" value="Cool Box">
                                            <label for="Cool Box">Cool Box</label>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <input type="checkbox" id="Bonnet Protector" name="features" value="Bonnet Protector">
                                            <label for="Bonnet Protector">Bonnet Protector</label>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <input type="checkbox" id="Power Steering" name="features" value="Power Steering">
                                            <label for="Power Steering">Power Steering</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="bicycle" class="colors bicycle">
                                <div class="form-group col-md-12 col-sm-12 sms-checked-box">
                                    <label class="control-label">Select Additional Features Your bicycle Has</label>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <input type="checkbox" id="Alloy Wheels" name="features" value="Alloy Wheels">
                                            <label for="Alloy Wheels">Alloy Wheels</label>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <input type="checkbox" id="Air Bags" name="features" value="Air Bags">
                                            <label for="Air Bags">Air Bags</label>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <input type="checkbox" id="Bonnet Protector" name="features" value="Bonnet Protector">
                                            <label for="Bonnet Protector">Bonnet Protector</label>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <input type="checkbox" id="Power Steering" name="features" value="Power Steering">
                                            <label for="Power Steering">Power Steering</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="col-md-12 col-xs-12">
                            <label class="control-label">Photos for your ad <small>Please add images
                                    of your ad. (350x450)</small>
                            </label>
                            <div id="dropzone" class="dropzone dz-clickable col-md-12">
                                <div class="dz-default dz-message"></div>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <label class="control-label">Ad Description
                                <small>Enter long description for your project
                                </small>
                            </label>
                            <textarea class="form-control input-message placeholder" placeholder="Descriptions" rows="7" name="message"></textarea>
                        </div>

                        <div class="col-md-12 col-lg-12 col-xs-12  col-sm-12">
                            <label class="control-label">Ad Tags </label>
                            <input type="text" id="testInput" value="Honda,Honda Civic" />
                        </div>

                        <div class="col-md-6 col-lg-6 col-xs-12  col-sm-12 sms-rad">
                            <label class="control-label">Type Of Ad
                                <small>want to buy or sale
                                </small>
                            </label>
                            <div class="sms-radio">
                                <input id="radio-1" name="radio" type="radio">
                                <label for="radio-1" class="radio-label">I want to sell</label>
                                <input id="radio-2" name="radio" type="radio">
                                <label for="radio-2" class="radio-label">I want to buy</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xs-12  col-sm-12 sms-rad">
                            <label class="control-label">Condition
                                <small>Item Condition
                                </small>
                            </label>
                            <div class="sms-radio">
                                <input id="radio-3" name="radio" type="radio">
                                <label for="radio-3" class="radio-label">New</label>
                                <input id="radio-4" name="radio" type="radio">
                                <label for="radio-4" class="radio-label">Used</label>
                            </div>
                        </div>

                        <div class="form-group col-md-6 col-sm-12">
                            <label class="control-label">Your Name</label>
                            <input type="text" class="form-control" placeholder="eg John Doe">
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="control-label">Your Email ID</label>
                            <input type="text" class="form-control" placeholder="contact@ecarkhana.com">
                        </div>
                        <div class="form-group col-md-12 col-sm-12">
                            <div class="select">
                                <label class="control-label">Bidding</label>
                                <select class="form-control" id="bidcolorselector">
                                    <option>Select Make : Any make</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="output">
                            <div id="yes" class="bidcolors yes" style="display: none">
                                <div class="date-picker">
                                    <div class="input">
                                        <div class="result">Bidding End Date: <span></span></div>
                                        <button><i class="fa fa-calendar"></i></button>
                                    </div>
                                    <div class="calendar"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-sm-12 submit-ad">
                            <button id="submit" name="submit" type="submit" value="Send" class="button red"> Publish
                                My Ad</button>
                        </div>


                    </form>
                </div>



                <div class="col-md-4 col-xs-12 col-sm-12">
                    <!-- Sidebar Widgets -->
                    <div class="sms-ad-blog-sidebar">
                        <!-- Categories -->
                        <div class="widget">
                            <div class="widget-heading">
                                <h4 class="panel-title"><a>Saftey Tips </a></h4>
                            </div>
                            <div class="widget-content">
                                <p class="lead">Posting an ad on <a href="#">E carkhana</a> is free! However, all ads must follow our rules:</p>
                                <ol>
                                    <li>Make sure you post in the correct category.</li>
                                    <li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
                                    <li>Do not upload pictures with watermarks.</li>
                                    <li>Do not post ads containing multiple items unless it's a package deal.</li>
                                    <li>Do not put your email or phone numbers in the title or description.</li>
                                    <li>Make sure you post in the correct category.</li>
                                    <li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
                                    <li>Do not upload pictures with watermarks.</li>
                                    <li>Do not post ads containing multiple items unless it's a package deal.</li>
                                </ol>
                            </div>
                        </div>
                        <!-- Latest News -->
                    </div>
                    <!-- Sidebar Widgets End -->
                </div>
            </div>
        </div>
    </section>

    <!--=================================
 End  Post Your Ad -->

@endsection
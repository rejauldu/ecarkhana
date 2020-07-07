@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
	{{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.bicycle-background')

    <!--=================================
   Start Filter -->
    <section id="filter_form" class="inner-filter gray-bg" style="display: none;">
        <div class="container">
            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">New</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Used</a>

                </div>
            </nav>

            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="sms-bg" class="main_bg white-text">
                        <h3 class="car-title">Find Your Dream Bicycle</h3>
                        <div class="row">
                            <form action="#" method="get">
                                <div class="form-group col-md-3 col-sm-6">
                                    <div class="select">
                                        <select class="form-control">
                                                    <option value="">Select Location </option>
                                                    <option value="">Location 1 </option>
                                                    <option value="">Location 1 </option>
                                                </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <div class="select">
                                        <select class="form-control">
                                                    <option>Select Brand</option>
                                                    <option>Audi</option>
                                                    <option>BMW</option>
                                                    <option>Nissan</option>
                                                    <option>Toyota</option>
                                                </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <div class="select">
                                        <select class="form-control">
                                                    <option>Select Brand</option>
                                                    <option>Audi</option>
                                                    <option>BMW</option>
                                                    <option>Nissan</option>
                                                    <option>Toyota</option>
                                                </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <button type="submit" class="btn btn-block"><i class="fa fa-search"
                                                    aria-hidden="true"></i>
                                                Search Bicycle </button>
                                </div>

                                <div class="form-group col-md-12 col-sm-6">
                                    <div class="sms-advance">Choose Your Bicycle</div>
                                </div>
                                <div class="sms-toggle-content">
                                    <div class="container">
                                        <div class="row">
                                            <div class="form-group col-md-3 col-sm-6">
                                                <div class="select">
                                                    <select class="form-control">
                                                                <option>Select Brand</option>
                                                                <option>Audi</option>
                                                                <option>BMW</option>
                                                                <option>Nissan</option>
                                                                <option>Toyota</option>
                                                            </select>
                                                </div>
                                            </div>


                                            <div class="form-group col-md-3 col-sm-6">
                                                <div class="select">
                                                    <select class="form-control">
                                                                <option>Select Model </option>
                                                                <option>New Car</option>
                                                                <option>Used Car</option>
                                                            </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3 col-sm-6">
                                                <div class="select">
                                                    <select class="form-control">
                                                                <option>Body Type</option>
                                                                <option>Audi</option>
                                                                <option>BMW</option>
                                                                <option>Nissan</option>
                                                                <option>Toyota</option>
                                                            </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-3 col-sm-6">
                                                <div class="select">
                                                    <select class="form-control">
                                                                <option>Budget</option>
                                                                <option>Audi</option>
                                                                <option>BMW</option>
                                                                <option>Nissan</option>
                                                                <option>Toyota</option>
                                                            </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-3 col-sm-6">
                                                <div class="select">
                                                    <select class="form-control">
                                                                <option>Millage</option>
                                                                <option>Audi</option>
                                                                <option>BMW</option>
                                                                <option>Nissan</option>
                                                                <option>Toyota</option>
                                                            </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-3 col-sm-6">
                                                <div class="select">
                                                    <select class="form-control">
                                                                <option>Location</option>
                                                                <option>Audi</option>
                                                                <option>BMW</option>
                                                                <option>Nissan</option>
                                                                <option>Toyota</option>
                                                            </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3 col-sm-6">
                                                <div class="select">
                                                    <select class="form-control">
                                                                <option>Manufacturing Year</option>
                                                                <option>Audi</option>
                                                                <option>BMW</option>
                                                                <option>Nissan</option>
                                                                <option>Toyota</option>
                                                            </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3 col-sm-6">
                                                <div class="select">
                                                    <select class="form-control">
                                                                <option>Type of Car </option>
                                                                <option>New Car</option>
                                                                <option>Used Car</option>
                                                            </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="sms-bg" class="main_bg white-text">
                        <h3>Find Your Dream Bicycle</h3>
                        <div class="row">
                            <form action="#" method="get">
                                <div class="form-group col-md-3 col-sm-6">
                                    <div class="select">
                                        <select class="form-control">
                                                    <option value="">Select Location </option>
                                                    <option value="">Location 1 </option>
                                                    <option value="">Location 1 </option>
                                                </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <div class="select">
                                        <select class="form-control">
                                                    <option>Select Brand</option>
                                                    <option>Audi</option>
                                                    <option>BMW</option>
                                                    <option>Nissan</option>
                                                    <option>Toyota</option>
                                                </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <div class="select">
                                        <select class="form-control">
                                                    <option>Select Brand</option>
                                                    <option>Audi</option>
                                                    <option>BMW</option>
                                                    <option>Nissan</option>
                                                    <option>Toyota</option>
                                                </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <button type="submit" class="btn btn-block"><i class="fa fa-search"
                                                    aria-hidden="true"></i>
                                                Search Bicycle </button>
                                </div>

                                <div class="form-group col-md-12 col-sm-6">
                                    <div class="sms-advance">Choose Your Bicycle</div>
                                </div>
                                <div class="sms-toggle-content">
                                    <div class="container">
                                        <div class="row">
                                            <div class="form-group col-md-3 col-sm-6">
                                                <div class="select">
                                                    <select class="form-control">
                                                                <option>Select Brand</option>
                                                                <option>Audi</option>
                                                                <option>BMW</option>
                                                                <option>Nissan</option>
                                                                <option>Toyota</option>
                                                            </select>
                                                </div>
                                            </div>


                                            <div class="form-group col-md-3 col-sm-6">
                                                <div class="select">
                                                    <select class="form-control">
                                                                <option>Select Model </option>
                                                                <option>New Car</option>
                                                                <option>Used Car</option>
                                                            </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3 col-sm-6">
                                                <div class="select">
                                                    <select class="form-control">
                                                                <option>Body Type</option>
                                                                <option>Audi</option>
                                                                <option>BMW</option>
                                                                <option>Nissan</option>
                                                                <option>Toyota</option>
                                                            </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-3 col-sm-6">
                                                <div class="select">
                                                    <select class="form-control">
                                                                <option>Budget</option>
                                                                <option>Audi</option>
                                                                <option>BMW</option>
                                                                <option>Nissan</option>
                                                                <option>Toyota</option>
                                                            </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-3 col-sm-6">
                                                <div class="select">
                                                    <select class="form-control">
                                                                <option>Millage</option>
                                                                <option>Audi</option>
                                                                <option>BMW</option>
                                                                <option>Nissan</option>
                                                                <option>Toyota</option>
                                                            </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-3 col-sm-6">
                                                <div class="select">
                                                    <select class="form-control">
                                                                <option>Location</option>
                                                                <option>Audi</option>
                                                                <option>BMW</option>
                                                                <option>Nissan</option>
                                                                <option>Toyota</option>
                                                            </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3 col-sm-6">
                                                <div class="select">
                                                    <select class="form-control">
                                                                <option>Manufacturing Year</option>
                                                                <option>Audi</option>
                                                                <option>BMW</option>
                                                                <option>Nissan</option>
                                                                <option>Toyota</option>
                                                            </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3 col-sm-6">
                                                <div class="select">
                                                    <select class="form-control">
                                                                <option>Type of Car </option>
                                                                <option>New Car</option>
                                                                <option>Used Car</option>
                                                            </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
   End Filter -->

    <!--=================================
Start Compare -->
    <section class="compare-page inner_pages">
        <div class="container">
            <div class="compare_info">
                <h4>Compare Hyundai Elantra 1.6 SX and Ford Figo 1.5D Base MT and Hyundai Elantra 2.0 SX</h4>
                <div class="compare_product_img">
                    <div class="inventory_info_list">
                        <ul>
                            <li id="filter_toggle" class="search_other_inventory"><i class="fa fa-search" aria-hidden="true"></i> Search Other Inventory</li>
                            <li>
                                <a href="#"><img src="images/bicycle/upcoming-cycles-01.jpg" alt="image"></a>
                            </li>
                            <li>
                                <a href="#"><img src="images/bicycle/upcoming-cycles-02.jpg" alt="image"></a>
                            </li>
                            <li>
                                <a href="#"><img src="images/bicycle/upcoming-cycles-03.jpg" alt="image"></a>
                            </li>
                        </ul>
                    </div>
                    <table>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="compare_product_title gray-bg">
                    <div class="inventory_info_list">
                        <ul>
                            <li class="listing_heading">Compare <br> Inventorys <span class="td_divider"></span></li>
                            <li><a href="#">Hyundai Elantra 1.6 SX</a>
                                <p class="price">$90,000</p>
                                <span class="vs">V/s</span></li>
                            <li><a href="#">Ford Figo 1.5D Base MT</a>
                                <p class="price">$85,000</p>
                                <span class="vs">V/s</span></li>
                            <li><a href="#">Hyundai Elantra 2.0 SX</a>
                                <p class="price">$75,000</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="compare_product_info">
                    <!--Basic-Info-Table-->
                    <div class="inventory_info_list">
                        <div class="listing_heading">
                            <div>BASIC INFO</div>
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                        </div>
                        <ul>
                            <li class="info_heading">
                                <div>Model Year</div>
                                <div>No. of Owners</div>
                                <div>KMs Driven</div>
                                <div>Fuel Type</div>
                            </li>
                            <li>
                                <div>2010</div>
                                <div>4</div>
                                <div>30,000</div>
                                <div>Diesel</div>
                            </li>
                            <li>
                                <div>2005</div>
                                <div>2</div>
                                <div>55,000</div>
                                <div>Diesel</div>
                            </li>
                            <li>
                                <div>2010</div>
                                <div>1</div>
                                <div>95,000</div>
                                <div>Diesel</div>
                            </li>
                        </ul>
                    </div>

                    <!--Technical-Specification-Table-->
                    <div class="inventory_info_list">
                        <div class="listing_heading">
                            <div>Technical Specification</div>
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                        </div>
                        <ul>
                            <li class="info_heading">
                                <div>Engine Type</div>
                                <div>Engine Description</div>
                                <div>No. of Cylinders</div>
                                <div>Mileage-City</div>
                                <div>Mileage-Highway</div>
                                <div>Fuel Tank Capacity</div>
                                <div>Seating Capacity</div>
                                <div>Transmission Type</div>
                            </li>
                            <li>
                                <div>TDCI Diesel Engine</div>
                                <div>1.5KW</div>
                                <div>4</div>
                                <div>22.4kmpl</div>
                                <div>25.83kmpl</div>
                                <div>40 (Liters)</div>
                                <div>5</div>
                                <div>Manual</div>
                            </li>
                            <li>
                                <div>TDCI Diesel Engine</div>
                                <div>1.9KW</div>
                                <div>5</div>
                                <div>32.4kmpl</div>
                                <div>48.83kmpl</div>
                                <div>60 (Liters)</div>
                                <div>5</div>
                                <div>Automatic</div>
                            </li>
                            <li>
                                <div>TDCI Diesel Engine</div>
                                <div>1.6KW</div>
                                <div>6</div>
                                <div>21.4kmpl</div>
                                <div>28.83kmpl</div>
                                <div>42 (Liters)</div>
                                <div>6</div>
                                <div>Manual</div>
                            </li>
                        </ul>
                    </div>

                    <!--Accessories-->
                    <div class="inventory_info_list">
                        <div class="listing_heading">
                            <div>Accessories</div>
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                        </div>
                        <ul>
                            <li class="info_heading">
                                <div>Air Conditioner</div>
                                <div>AntiLock Braking System</div>
                                <div>Power Steering</div>
                                <div>Power Windows</div>
                                <div>CD Player</div>
                                <div>Leather Seats</div>
                                <div>Central Locking</div>
                                <div>Power Door Locks</div>
                                <div>Brake Assist</div>
                                <div>Driver Airbag</div>
                                <div>Passenger Airbag</div>
                                <div>Crash Sensor</div>
                                <div>Engine Check Warning</div>
                                <div>Automatic Headlamps</div>
                            </li>
                            <li>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                            </li>
                            <li>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-close" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                            </li>
                            <li>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-close" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-close" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-close" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div><i class="fa fa-check" aria-hidden="true"></i></div>
                            </li>
                        </ul>
                    </div>
                    <div class="inventory_info_list text-center">
                        <ul>
                            <li>&nbsp;</li>
                            <li><a href="#" class="button red">View Detail</a></li>
                            <li><a href="#" class="button red">View Detail</a></li>
                            <li><a href="#" class="button red">View Detail</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
End Compare -->

@endsection
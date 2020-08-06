@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
	{{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.car-background')
    <!--================================= Start Compare -->
    <section class="compare-page inner_pages">
        <div class="container">
            <div class="compare_info">
                <h4>Compare {{ $product[0]->name ?? '' }}, {{ $product[1]->name ?? '' }} and {{ $product[2]->name ?? '' }}</h4>
                <div class="compare_product_img">
                    <div class="inventory_info_list">
                        <ul>
                            <li id="filter_toggle" class="search_other_inventory"><i class="fa fa-search" aria-hidden="true"></i> Search Other Inventory</li>
                            <li>
                                <a href="{{ route('single-car-product', $product[0]->id) }}"><img src="{{ url('/assets/products') }}/{{ $product[0]->id }}/{{ $product[0]->image1 ?? 'not-found.jpg' }}" alt="image"></a>
                            </li>
                            <li>
                                <a href="{{ route('single-car-product', $product[1]->id) }}"><img src="{{ url('/assets/products') }}/{{ $product[1]->id }}/{{ $product[0]->image1 ?? 'not-found.jpg' }}" alt="image"></a>
                            </li>
                            <li>
                                <a href="{{ route('single-car-product', $product[2]->id) }}"><img src="{{ url('/assets/products') }}/{{ $product[2]->id }}/{{ $product[0]->image1 ?? 'not-found.jpg' }}" alt="image"></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="compare_product_title gray-bg">
                    <div class="inventory_info_list">
                        <ul>
                            <li class="listing_heading">Compare <br> Inventorys <span class="td_divider"></span></li>
                            <li><a href="#">{{ $product[0]->name ?? '' }}</a>
                                <p class="price">Tk.{{ $product[0]->msrp ?? '' }}</p>
                                <span class="vs">V/s</span></li>
                            <li><a href="#">{{ $product[1]->name ?? '' }}</a>
                                <p class="price">Tk.{{ $product[1]->msrp ?? '' }}</p>
                                <span class="vs">V/s</span></li>
                            <li><a href="#">{{ $product[2]->name ?? '' }}</a>
                                <p class="price">Tk.{{ $product[2]->msrp ?? '' }}</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="compare_product_info">
                    <!--Basic-Info-Table-->
                    <div class="inventory_info_list">
                        <div class="listing_heading">
                            <div>General Information</div>
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                            <div class="sms-phn-hide">&nbsp;</div>
                        </div>
                        <ul>
                            <li class="info_heading">
                                <div>Brand</div>
                                <div>Model</div>
                                <div>Body type</div>
                                <div>Package</div>
                                <div>Displacement</div>
                                <div>Make Year</div>
                                <div>Ground Clearance</div>
                                <div>Drive Type</div>
                                <div>Dimension</div>
                                <div>Engine Type</div>
                                <div>Fuel Type</div>
                                <div>Condition</div>
                                <div>Seller Type</div>
                                <div>Selling Price</div>
                                <div>On Road Price</div>
                            </li>
                            <li>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->model->name ?? '' }}</div>
                                <div>{{ $product[0]->car->package->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                
                            </li>
                            <li>
                                <div>{{ $product[1]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[1]->car->model->name ?? '' }}</div>
                                <div>{{ $product[1]->car->package->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                            </li>
                            <li class="sms-phn-hide">
                                <div>{{ $product[2]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[2]->car->model->name ?? '' }}</div>
                                <div>{{ $product[2]->car->package->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                                <div>{{ $product[0]->car->brand->name ?? '' }}</div>
                            </li>
                        </ul>
                    </div>

                    <div class="inventory_info_list">
                        <div class="listing_heading">
                            <div>Key Features</div>
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                            <div class="sms-phn-hide">&nbsp;</div>
                        </div>
                        <ul>
                            <li class="info_heading">
                                
                                    <div>Transmission</div>
                                    <div>Gross Weight</div>
                                    <div>Max Power</div>
                                    <div>Seating Capacity</div>
                                    <div>Gear Box</div>
                                    <div>EMI Start From</div>
                                    <div>Millage Kmpl</div>
                                    <div>Boot/Space Cargo</div>
                                    <div>Fuel Tank Capacity</div>
                            </li>
                            <li>
                                          <div>Automatic</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                
                            </li>
                            <li>
                                          <div>Automatic</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                            </li>
                            <li class="sms-phn-hide">
                                          <div>Automatic</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                                          <div>1500kg</div>
                            </li>
                        </ul>
                    </div>


                    <div class="sms-sys-com">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="#">Engine & Transmission</a>
                                 <ul style="display:none">
                                     <li>
                                         <div>Engine Type</div>
                                         <div>Engine Capacity</div>
                                         <div>Displacement</div>
                                         <div>Max Power</div>
                                         <div>Max Torque</div>
                                         <div>Milage Kmpl</div>
                                         <div>Engine Check & Warning</div>
                                         <div>Gear Box</div>
                                         <div>Transmission</div>
                                         <div>Cylinder</div>
                                         <div>Drive Type</div>
                                         <div>Min Turning Radius</div>
                                     </li>
                                     <li>
                                         <div>OTIS Ripin</div>
                                         <div>1500 (cc)</div>
                                         <div>1500 (cc)</div>
                                         <div>1500 (cc)</div>
                                         <div>1500 (cc)</div>
                                         <div>200/Kmpl</div>
                                         <div>Yes</div>
                                         <div>Automatic</div>
                                         <div>Automatic</div>
                                         <div>4 Cylinder</div>
                                         <div>4WD</div>
                                         <div>4WD</div>
                                     </li>
                                     <li>
                                         <div>OTIS Ripin</div>
                                         <div>1500 (cc)</div>
                                         <div>1500 (cc)</div>
                                         <div>1500 (cc)</div>
                                         <div>1500 (cc)</div>
                                         <div>200/Kmpl</div>
                                         <div>Yes</div>
                                         <div>Automatic</div>
                                         <div>Automatic</div>
                                         <div>4 Cylinder</div>
                                         <div>4WD</div>
                                         <div>4WD</div>
                                     </li>
                                     <li class="sms-phn-hide">
                                         <div>OTIS Ripin</div>
                                         <div>1500 (cc)</div>
                                         <div>1500 (cc)</div>
                                         <div>1500 (cc)</div>
                                         <div>1500 (cc)</div>
                                         <div>200/Kmpl</div>
                                         <div>Yes</div>
                                         <div>Automatic</div>
                                         <div>Automatic</div>
                                         <div>4 Cylinder</div>
                                         <div>4WD</div>
                                         <div>4WD</div>
                                     </li>
                                 </ul>
                            </li>


                            <li class="list-group-item">
                                <a href="#">Weight & Dimension</a>
                                  <ul style="display:none;">
                                      <li>
                                          <div>Gross Weight</div>
                                          <div>Seating Capacity</div>
                                          <div>Wheel Base</div>
                                          <div>Length</div>
                                          <div>Width</div>
                                          <div>Height</div>
                                      </li>
                                      <li>
                                          <div>1500kg</div>
                                          <div>5</div>
                                          <div>1200mm</div>
                                          <div>15cc</div>
                                          <div>20</div>
                                          <div>13</div>
                                      </li>
                                      <li>
                                          <div>1650kg</div>
                                          <div>8</div>
                                          <div>1500mm</div>
                                          <div>16cc</div>
                                          <div>21</div>
                                          <div>14</div>
                                      </li>
                                      <li class="sms-phn-hide">
                                          <div>1650kg</div>
                                          <div>8</div>
                                          <div>1500mm</div>
                                          <div>16cc</div>
                                          <div>21</div>
                                          <div>14</div>
                                      </li>
                                  </ul>
                            </li>




                            <li class="list-group-item">
                                <a href="#">Wheels Tyre & Seating Capacity</a>
                                  <ul style="display:none;">
                                      <li>
                                          <div>Front Suspension</div>
                                          <div>Rear Suspension</div>
                                          <div>Wheel Type</div>
                                          <div>Wheel Size</div>
                                          <div>Tyre Type</div>
                                          <div>Front Tyre Size</div>
                                          <div>Rear Tyre Size</div>
                                          <div>Stearing Type</div>
                                          <div>Stearing Column</div>
                                          <div>Front Break Type</div>
                                          <div>Rear Break Type</div>
                                      </li>
                                      <li>
                                          <div>1500kg</div>
                                          <div>5</div>
                                          <div>1200mm</div>
                                          <div>15cc</div>
                                          <div>20</div>
                                          <div>13</div>
                                          <div>5</div>
                                          <div>1200mm</div>
                                          <div>15cc</div>
                                          <div>20</div>
                                          <div>13</div>
                                      </li>
                                      <li>
                                          <div>1500kg</div>
                                          <div>5</div>
                                          <div>1200mm</div>
                                          <div>15cc</div>
                                          <div>20</div>
                                          <div>13</div>
                                          <div>5</div>
                                          <div>1200mm</div>
                                          <div>15cc</div>
                                          <div>20</div>
                                          <div>13</div>
                                      </li>
                                      <li class="sms-phn-hide">
                                          <div>1500kg</div>
                                          <div>5</div>
                                          <div>1200mm</div>
                                          <div>15cc</div>
                                          <div>20</div>
                                          <div>13</div>
                                          <div>5</div>
                                          <div>1200mm</div>
                                          <div>15cc</div>
                                          <div>20</div>
                                          <div>13</div>
                                      </li>
                                  </ul>
                            </li>


                            <li class="list-group-item">
                                <a href="#">Fuel & Consumption</a>
                                  <ul style="display:none;">
                                      <li>
                                          <div>Fuel Type</div>
                                          <div>Fuel Tank Capacity</div>
                                          <div>Millage Kmpl</div>
                                      </li>
                                      <li>
                                          <div>Hybrid</div>
                                          <div>500cc</div>
                                          <div>20kmpl</div>
                                      </li>
                                      <li>
                                          <div>Hybrid</div>
                                          <div>500cc</div>
                                          <div>20kmpl</div>
                                      </li>
                                      <li class="sms-phn-hide">
                                          <div>Hybrid</div>
                                          <div>500cc</div>
                                          <div>20kmpl</div>
                                      </li>
                                  </ul>
                            </li>


                            <li class="list-group-item">
                                <a href="#">Features</a> 
                                  <ul style="display:none">
                                      <li>
                                          <div>Power Streaming</div>
                                          <div>Duel Front Car Bag</div>
                                          <div>Passenger Air Bag</div>
                                          <div>Automatic Climate</div>
                                          <div>Power Windows Form</div>
                                          <div>Fog Light Form</div>
                                          <div>4WD</div>
                                          <div>Anti-thief Device</div>
                                      </li>
                                      <li>
                                          <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                          <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                          <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                          <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                          <div><i class="fa fa-times" aria-hidden="true"></i></div>
                                          <div><i class="fa fa-times" aria-hidden="true"></i></div>
                                          <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                          <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                      </li>
                                      <li>
                                          <div><i class="fa fa-times" aria-hidden="true"></i></div>
                                          <div><i class="fa fa-times" aria-hidden="true"></i></div>
                                          <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                          <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                          <div><i class="fa fa-times" aria-hidden="true"></i></div>
                                          <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                          <div><i class="fa fa-times" aria-hidden="true"></i></div>
                                          <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                      </li>
                                      <li class="sms-phn-hide">
                                          <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                          <div><i class="fa fa-times" aria-hidden="true"></i></div>
                                          <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                          <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                          <div><i class="fa fa-times" aria-hidden="true"></i></div>
                                          <div><i class="fa fa-check" aria-hidden="true"></i></div>
                                          <div><i class="fa fa-times" aria-hidden="true"></i></div>
                                          <div><i class="fa fa-times" aria-hidden="true"></i></div>
                                      </li>
                                  </ul>
                                
                            </li>


                            <li class="list-group-item">
                                <a href="#">Interior/Exterior</a> 
                                  <ul style="display:none">
                                  <li></li>
                                  <li></li>
                                  <li></li>
                                  <li class="sms-phn-hide"></li>                               
                                  </ul>
                            </li>
                                    



                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
End Compare -->

@endsection
<!--=================================
Start Form -->


<section id="filter-form">
    <div class="container px-0">
        <nav>
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#tab-new" role="tab" aria-controls="tab-new" aria-selected="true">New</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#tab-used" role="tab" aria-controls="tab-used" aria-selected="false">Used</a>
            </div>
        </nav>

        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
            <div class="tab-pane fade show active" id="tab-new" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="sms-bg">
                    <h3 class="Bicycle-title">Find Your Dream Bicycle</h3>
                    <div class="row">
                        <form id="filter-new" action="{{ route('bicycles.index') }}" method="get">
                            <input type="hidden" name="condition" value="new"/>
                            <div class="form-group col-md-3 col-sm-6">
                                <input type="text" class="form-control" name="location" value="{{ $location ?? '' }}" placeholder="Search location" v-model="input" autocomplete="off" data-toggle="modal" data-target="#location-modal" />
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <div class="select">
                                    <select class="form-control" name="brand" id="brand" onchange="setDropdown(this, 'brand-advance')">
                                        <option>All Brands</option>
                                        @foreach($brands as $b)
                                        <option value="{{ $b->name }}" @if(isset($brand) && $brand == $b->name) selected @endif>{{ $b->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <div class="select">
                                    <select class="form-control" name="model" id="model" derive-from="brand" onchange="setDropdown(this, 'model-advance')">
                                        <option>All Models</option>
                                        @foreach($models as $m)
                                        <option value="{{ $m->name }}" @if(isset($model) && $model == $m->name) selected @endif derive-parent="{{ $m->brand->name }}">{{ $m->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <button type="submit" class="btn btn-dark w-100"><i class="fa fa-search" aria-hidden="true"></i> Search Bicycle</button>
                            </div>
                            <div class="form-group col-md-12 col-sm-6">
                                <div class="sms-advance">Advanced Search</div>
                            </div>
                            <div class="sms-toggle-content">
                                <div class="container px-0">
                                    <div class="row">
                                        <div class="form-group col-md-3 col-sm-6">
                                            <a class="btn btn-light border w-100" @click.prevent="getCurrentLocation()" href="#">Current Location</a>
                                        </div>
                                        <div class="form-group col-md-3 col-sm-6">
                                            <div class="select">
                                                <select class="form-control" name="within_km" onclick="addCoordinate('new')">
                                                    <option>Within Kilometer</option>
                                                    <option value="10" @if(isset($within_km) && $within_km == '10') selected @endif>Within 10Km</option>
                                                    <option value="20" @if(isset($within_km) && $within_km == '20') selected @endif>Within 20Km</option>
                                                    <option value="50" @if(isset($within_km) && $within_km == '50') selected @endif>Within 50Km</option>
                                                    <option value="100" @if(isset($within_km) && $within_km == '100') selected @endif>Within 100Km</option>
                                                    <option value="300" @if(isset($within_km) && $within_km == '300') selected @endif>Within 300Km</option>
                                                    <option value="600" @if(isset($within_km) && $within_km == '600') selected @endif>Within 600Km</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 col-sm-6">
                                            <div class="select">
                                                <select class="form-control" name="brand" id="brand-advance">
                                                    <option>All Brands</option>
                                                    @foreach($brands as $b)
                                                    <option value="{{ $b->name }}" @if(isset($brand) && $brand == $b->name) selected @endif>{{ $b->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3 col-sm-6">
                                            <div class="select">
                                                <select class="form-control" name="model" id="model-advance" derive-from="brand-advance">
                                                    <option>All Models</option>
                                                    @foreach($models as $m)
                                                    <option value="{{ $m->name }}" @if(isset($model) && $model == $m->name) selected @endif derive-parent="{{ $m->brand->name }}">{{ $m->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 col-sm-6">
                                            <div class="select">
                                                <select class="form-control" id="bicycle-type" name="bicycle_type">
                                                    <option>All Bike Types</option>
                                                    @foreach($bicycle_types as $b)
                                                    <option value="{{ $b->name }}" @if(isset($bicycle_type) && $bicycle_type == $b->name) selected @endif>{{ $b->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 col-sm-6">
                                            <div class="select">
                                                <select class="form-control" id="frame-size" name="frame_size">
                                                    <option>Any Frame Size</option>
                                                    <option value="40-50" @if(isset($price) && $price == '40-50') selected @endif>Less than 50cm</option>
                                                    <option value="51-55" @if(isset($price) && $price == '51-55') selected @endif>51 - 55cm</option>
                                                    <option value="56-60" @if(isset($price) && $price == '56-60') selected @endif>56 - 60cm</option>
                                                    <option value="61-65" @if(isset($price) && $price == '61-65') selected @endif>61 - 65cm</option>
                                                    <option value="66-100" @if(isset($price) && $price == '66-100') selected @endif>Above 65cm</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 col-sm-6">
                                            <div class="select">
                                                <select class="form-control" id="price" name="price">
                                                    <option>Any Price</option>
                                                    <option value="0-5000" @if(isset($price) && $price == '0-5000') selected @endif>Less than BDT 5,000</option>
                                                    <option value="5000-10000" @if(isset($price) && $price == '5000-10000') selected @endif>BDT 5,000 - 10,000</option>
                                                    <option value="10000-15000" @if(isset($price) && $price == '10000-15000') selected @endif>BDT 10,000 - 15,000</option>
                                                    <option value="15000-20000" @if(isset($price) && $price == '15000-20000') selected @endif>BDT 15,000 - 20,000</option>
                                                    <option value="20000-30000" @if(isset($price) && $price == '20000-30000') selected @endif>BDT 20,000 - 30,000</option>
                                                    <option value="30000-50000" @if(isset($price) && $price == '30000-50000') selected @endif>BDT 30,000 - 50,000</option>
                                                    <option value="50000-70000" @if(isset($price) && $price == '50000-70000') selected @endif>BDT 50,000 - 70,000</option>
                                                    <option value="70000-100000" @if(isset($price) && $price == '70000-100000') selected @endif>BDT 70,000 - 1,00,000</option>
                                                    <option value="100000-500000" @if(isset($price) && $price == '100000-500000') selected @endif>Above BDT 1,00,000</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 col-sm-6">
                                            <div class="select">
                                                <select class="form-control" id="biker-gender" name="biker_gender">
                                                    <option>All Genders</option>
                                                    @foreach($biker_genders as $g)
                                                    <option value="{{ $g->name }}" @if(isset($biker_gender) && $biker_gender == $g->name) selected @endif>{{ $g->name }}</option>
                                                    @endforeach
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
            <div class="tab-pane fade" id="tab-used" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="sms-bg">
                    <h3 class="Bicycle-title">Find Your Dream Bicycle</h3>
                    <div class="row">
                        <form id="filter-new" action="{{ route('bicycles.index') }}" method="get">
                            <input type="hidden" name="condition" value="used"/>
                            <div class="form-group col-md-3 col-sm-6">
                                <input type="text" class="form-control" name="location" value="{{ $location ?? '' }}" placeholder="Search location" v-model="input" autocomplete="off" data-toggle="modal" data-target="#location-modal" />
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <div class="select">
                                    <select class="form-control" name="brand" id="brand" onchange="setDropdown(this, 'brand-advance')">
                                        <option>All Brands</option>
                                        @foreach($brands as $b)
                                        <option value="{{ $b->name }}" @if(isset($brand) && $brand == $b->name) selected @endif>{{ $b->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <div class="select">
                                    <select class="form-control" name="model" id="model" derive-from="brand" onchange="setDropdown(this, 'model-advance')">
                                        <option>All Models</option>
                                        @foreach($models as $m)
                                        <option value="{{ $m->name }}" @if(isset($model) && $model == $m->name) selected @endif derive-parent="{{ $m->brand->name }}">{{ $m->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <button type="submit" class="btn btn-dark w-100"><i class="fa fa-search" aria-hidden="true"></i> Search Bicycle</button>
                            </div>
                            <div class="form-group col-md-12 col-sm-6">
                                <div class="sms-advance">Advanced Search</div>
                            </div>
                            <div class="sms-toggle-content">
                                <div class="container px-0">
                                    <div class="row">
                                        <div class="form-group col-md-3 col-sm-6">
                                            <a class="btn btn-light border w-100" @click.prevent="getCurrentLocation()" href="#">Current Location</a>
                                        </div>
                                        <div class="form-group col-md-3 col-sm-6">
                                            <div class="select">
                                                <select class="form-control" name="within_km" onclick="addCoordinate('new')">
                                                    <option>Within Kilometer</option>
                                                    <option value="10" @if(isset($within_km) && $within_km == '10') selected @endif>Within 10Km</option>
                                                    <option value="20" @if(isset($within_km) && $within_km == '20') selected @endif>Within 20Km</option>
                                                    <option value="50" @if(isset($within_km) && $within_km == '50') selected @endif>Within 50Km</option>
                                                    <option value="100" @if(isset($within_km) && $within_km == '100') selected @endif>Within 100Km</option>
                                                    <option value="300" @if(isset($within_km) && $within_km == '300') selected @endif>Within 300Km</option>
                                                    <option value="600" @if(isset($within_km) && $within_km == '600') selected @endif>Within 600Km</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 col-sm-6">
                                            <div class="select">
                                                <select class="form-control" name="brand" id="brand-advance">
                                                    <option>All Brands</option>
                                                    @foreach($brands as $b)
                                                    <option value="{{ $b->name }}" @if(isset($brand) && $brand == $b->name) selected @endif>{{ $b->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3 col-sm-6">
                                            <div class="select">
                                                <select class="form-control" name="model" id="model-advance" derive-from="brand-advance">
                                                    <option>All Models</option>
                                                    @foreach($models as $m)
                                                    <option value="{{ $m->name }}" @if(isset($model) && $model == $m->name) selected @endif derive-parent="{{ $m->brand->name }}">{{ $m->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 col-sm-6">
                                            <div class="select">
                                                <select class="form-control" id="bicycle-type" name="bicycle_type">
                                                    <option>All Bike Types</option>
                                                    @foreach($bicycle_types as $b)
                                                    <option value="{{ $b->name }}" @if(isset($bicycle_type) && $bicycle_type == $b->name) selected @endif>{{ $b->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 col-sm-6">
                                            <div class="select">
                                                <select class="form-control" id="frame-size" name="frame_size">
                                                    <option>Any Frame Size</option>
                                                    <option value="40-50" @if(isset($price) && $price == '40-50') selected @endif>Less than 50cm</option>
                                                    <option value="51-55" @if(isset($price) && $price == '51-55') selected @endif>51 - 55cm</option>
                                                    <option value="56-60" @if(isset($price) && $price == '56-60') selected @endif>56 - 60cm</option>
                                                    <option value="61-65" @if(isset($price) && $price == '61-65') selected @endif>61 - 65cm</option>
                                                    <option value="66-100" @if(isset($price) && $price == '66-100') selected @endif>Above 65cm</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 col-sm-6">
                                            <div class="select">
                                                <select class="form-control" id="price" name="price">
                                                    <option>Any Price</option>
                                                    <option value="0-5000" @if(isset($price) && $price == '0-5000') selected @endif>Less than BDT 5,000</option>
                                                    <option value="5000-10000" @if(isset($price) && $price == '5000-10000') selected @endif>BDT 5,000 - 10,000</option>
                                                    <option value="10000-15000" @if(isset($price) && $price == '10000-15000') selected @endif>BDT 10,000 - 15,000</option>
                                                    <option value="15000-20000" @if(isset($price) && $price == '15000-20000') selected @endif>BDT 15,000 - 20,000</option>
                                                    <option value="20000-30000" @if(isset($price) && $price == '20000-30000') selected @endif>BDT 20,000 - 30,000</option>
                                                    <option value="30000-50000" @if(isset($price) && $price == '30000-50000') selected @endif>BDT 30,000 - 50,000</option>
                                                    <option value="50000-70000" @if(isset($price) && $price == '50000-70000') selected @endif>BDT 50,000 - 70,000</option>
                                                    <option value="70000-100000" @if(isset($price) && $price == '70000-100000') selected @endif>BDT 70,000 - 1,00,000</option>
                                                    <option value="100000-500000" @if(isset($price) && $price == '100000-500000') selected @endif>Above BDT 1,00,000</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 col-sm-6">
                                            <div class="select">
                                                <select class="form-control" id="biker-gender" name="biker_gender">
                                                    <option>All Genders</option>
                                                    @foreach($biker_genders as $g)
                                                    <option value="{{ $g->name }}" @if(isset($biker_gender) && $biker_gender == $g->name) selected @endif>{{ $g->name }}</option>
                                                    @endforeach
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
    <!-- The Modal -->
    <div class="modal" id="location-modal">
        <div class="modal-dialog">
            <div class="modal-content mb-5">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="text-center w-100">Select Location</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body mb-5">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text fa fa-search"></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Write Region Name" v-model="input">

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <ul class="list-group w-100 position-absolute" style="padding-right: 30px; z-index: 1;">
                                <li v-for="region in response" class="list-group-item list-group-item-action py-1" v-if="input.toLowerCase() != region.name.toLowerCase()"><a href="#" @click.prevent="input=region.name">@{{ region.name }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <hr class="border-light">
                    <div class="input-group my-3">
                        <span class="input-group-text fa fa-map-marker rounded-circle text-danger"></span><a class="btn btn-link text-dark" href="#" @click.prevent="getCurrentLocation()" class="close" data-dismiss="modal">Current Location</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!--=================================
End Form -->
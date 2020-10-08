<!--=================================
Start Form -->


<section id="filter-form">
    <div class="container px-0">
        <nav>
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#tab-new" role="tab" aria-controls="nav-home" aria-selected="true">New</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#tab-used" role="tab" aria-controls="nav-profile" aria-selected="false">Used</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#tab-recondition" role="tab" aria-controls="nav-contact" aria-selected="false">Recondition</a>
            </div>
        </nav>

        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
            <div class="tab-pane fade show active" id="tab-new" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="sms-bg">
                    <h3 class="car-title">Find Your Dream Car</h3>
                    <div class="row">
                        <form id="filter-new" action="{{ route('cars.index') }}" method="get">
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
                                <button type="submit" class="btn btn-dark w-100"><i class="fa fa-search" aria-hidden="true"></i> Search Car</button>
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
                                                <select class="form-control" id="body-type" name="body_type">
                                                    <option>All Body Types</option>
                                                    @foreach($body_types as $b)
                                                    <option value="{{ $b->name }}" @if(isset($body_type) && $body_type == $b->name) selected @endif>{{ $b->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
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
                                                <select class="form-control" id="price" name="price">
                                                    <option>Any Price</option>
                                                    <option value="50000-500000" @if(isset($price) && $price == '50000-100000') selected @endif>Less than BDT 5,00,000</option>
                                                    <option value="500000-1000000" @if(isset($price) && $price == '100000-1000000') selected @endif>BDT 5,00,000 - 10,00,000</option>
                                                    <option value="1000000-2000000" @if(isset($price) && $price == '1000000-2000000') selected @endif>BDT 10,00,000 - 20,00,000</option>
                                                    <option value="2000000-5000000" @if(isset($price) && $price == '2000000-5000000') selected @endif>BDT 20,00,000 - 50,00,000</option>
                                                    <option value="5000000-7000000" @if(isset($price) && $price == '5000000-7000000') selected @endif>BDT 50,00,000 - 70,00,000</option>
                                                    <option value="7000000-10000000" @if(isset($price) && $price == '7000000-10000000') selected @endif>BDT 70,00,000 - 1,00,00,000</option>
                                                    <option value="10000000-50000000" @if(isset($price) && $price == '10000000-50000000') selected @endif>Above BDT 1,00,00,000</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 col-sm-6">
                                            <div class="select">
                                                <select class="form-control" id="fuel-type" name="fuel_type">
                                                    <option>All Fuel Types</option>
                                                    @foreach($fuel_types as $f)
                                                    <option value="{{ $f->name }}" @if(isset($fuel_type) && $fuel_type == $f->name) selected @endif>{{ $f->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 col-sm-6">
                                            <div class="select">
                                                <select class="form-control" id="package" name="package" derive-from="model-advance">
                                                    <option>All Packages</option>
                                                    @foreach($packages as $p)
                                                    <option value="{{ $p->name }}" @if(isset($package) && $package == $p->name) selected @endif derive-parent="{{ $p->model->name }}">{{ $p->name }}</option>
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
            <div class="tab-pane fade" id="tab-used" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="sms-bg" class="main_bg white-text">
                    <h3>Find Your Dream Car</h3>
                    <div class="row">
                        <form id="filter-used" action="{{ route('cars.index') }}" method="get">
                            <input type="hidden" name="condition" value="used"/>
                            <div class="form-group col-md-3 col-sm-6">
                                <input type="text" class="form-control" name="location" value="{{ $location ?? '' }}" placeholder="Search location" v-model="input" autocomplete="off" data-toggle="modal" data-target="#location-modal" />
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <div class="select">
                                    <select class="form-control" name="brand" id="used-brand" onchange="setDropdown(this, 'used-brand-advance')">
                                        <option>All Brands</option>
                                        @foreach($brands as $b)
                                        <option value="{{ $b->name }}" @if(isset($brand) && $brand == $b->name) selected @endif>{{ $b->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <div class="select">
                                    <select class="form-control" name="model" id="used-model" derive-from="used-brand" onchange="setDropdown(this, 'used-model-advance')">
                                        <option>All Models</option>
                                        @foreach($models as $m)
                                        <option value="{{ $m->name }}" @if(isset($model) && $model == $m->name) selected @endif derive-parent="{{ $m->brand->name }}">{{ $m->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <button type="submit" class="btn btn-dark w-100"><i class="fa fa-search" aria-hidden="true"></i> Search Car</button>
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
                                                <select class="form-control" id="used-body-type" name="body_type">
                                                    <option>All Body Types</option>
                                                    @foreach($body_types as $b)
                                                    <option value="{{ $b->name }}" @if(isset($body_type) && $body_type == $b->name) selected @endif>{{ $b->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 col-sm-6">
                                            <div class="select">
                                                <select class="form-control" name="within_km" onclick="addCoordinate('used')">
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
                                                <select class="form-control" name="brand" id="used-brand-advance">
                                                    <option>All Brands</option>
                                                    @foreach($brands as $b)
                                                    <option value="{{ $b->name }}" @if(isset($brand) && $brand == $b->name) selected @endif>{{ $b->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3 col-sm-6">
                                            <div class="select">
                                                <select class="form-control" name="model" id="used-model-advance" derive-from="brand-advance">
                                                    <option>All Models</option>
                                                    @foreach($models as $m)
                                                    <option value="{{ $m->name }}" @if(isset($model) && $model == $m->name) selected @endif derive-parent="{{ $m->brand->name }}">{{ $m->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3 col-sm-6">
                                            <div class="select">
                                                <select class="form-control" id="price" name="price">
                                                    <option>Any Price</option>
                                                    <option value="50000-500000" @if(isset($price) && $price == '50000-100000') selected @endif>Less than BDT 5,00,000</option>
                                                    <option value="500000-1000000" @if(isset($price) && $price == '100000-1000000') selected @endif>BDT 5,00,000 - 10,00,000</option>
                                                    <option value="1000000-2000000" @if(isset($price) && $price == '1000000-2000000') selected @endif>BDT 10,00,000 - 20,00,000</option>
                                                    <option value="2000000-5000000" @if(isset($price) && $price == '2000000-5000000') selected @endif>BDT 20,00,000 - 50,00,000</option>
                                                    <option value="5000000-7000000" @if(isset($price) && $price == '5000000-7000000') selected @endif>BDT 50,00,000 - 70,00,000</option>
                                                    <option value="7000000-10000000" @if(isset($price) && $price == '7000000-10000000') selected @endif>BDT 70,00,000 - 1,00,00,000</option>
                                                    <option value="10000000-50000000" @if(isset($price) && $price == '10000000-50000000') selected @endif>Above BDT 1,00,00,000</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 col-sm-6">
                                            <div class="select">
                                                <input type="text" class="form-control" name="kms_driven" value="{{ $kms_driven ?? '' }}" placeholder="Search by kms driven" />
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 col-sm-6">
                                            <div class="select">
                                                <input type="text" class="form-control" name="registration_year" value="{{ $registration_year ?? '' }}" placeholder="Search by Registration year" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tab-recondition" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="sms-bg" class="main_bg white-text">
                    <h3>Find Your Dream Car</h3>
                    <div class="row">
                        <form id="filter-new" action="{{ route('cars.index') }}" method="get">
                            <input type="hidden" name="condition" value="reconditioned"/>
                            <div class="form-group col-md-3 col-sm-6">
                                <input type="text" class="form-control" name="location" value="{{ $location ?? '' }}" placeholder="Search location" v-model="input" autocomplete="off" data-toggle="modal" data-target="#location-modal" />
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <div class="select">
                                    <select class="form-control" name="brand" id="recondition-brand" onchange="setDropdown(this, 'recondition-brand-advance')">
                                        <option>All Brands</option>
                                        @foreach($brands as $b)
                                        <option value="{{ $b->name }}" @if(isset($brand) && $brand == $b->name) selected @endif>{{ $b->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <div class="select">
                                    <select class="form-control" name="model" id="model" derive-from="recondition-brand" onchange="setDropdown(this, 'recondition-model-advance')">
                                        <option>All Models</option>
                                        @foreach($models as $m)
                                        <option value="{{ $m->name }}" @if(isset($model) && $model == $m->name) selected @endif derive-parent="{{ $m->brand->name }}">{{ $m->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <button type="submit" class="btn btn-dark w-100"><i class="fa fa-search" aria-hidden="true"></i> Search Car</button>
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
                                                <select class="form-control" id="recondition-body-type" name="body_type">
                                                    <option>All Body Types</option>
                                                    @foreach($body_types as $b)
                                                    <option value="{{ $b->name }}" @if(isset($body_type) && $body_type == $b->name) selected @endif>{{ $b->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 col-sm-6">
                                            <div class="select">
                                                <select class="form-control" name="within_km" onclick="addCoordinate('recondition')">
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
                                                <select class="form-control" name="brand" id="recondition-brand-advance">
                                                    <option>All Brands</option>
                                                    @foreach($brands as $b)
                                                    <option value="{{ $b->name }}" @if(isset($brand) && $brand == $b->name) selected @endif>{{ $b->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3 col-sm-6">
                                            <div class="select">
                                                <select class="form-control" name="model" id="recondition-model-advance" derive-from="brand-advance">
                                                    <option>All Models</option>
                                                    @foreach($models as $m)
                                                    <option value="{{ $m->name }}" @if(isset($model) && $model == $m->name) selected @endif derive-parent="{{ $m->brand->name }}">{{ $m->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3 col-sm-6">
                                            <div class="select">
                                                <input type="text" class="form-control" name="msrp" value="{{ $msrp ?? '' }}" placeholder="Search by price" />
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 col-sm-6">
                                            <div class="select">
                                                <select class="form-control" id="recondition-fuel-type" name="fuel_type">
                                                    <option>All Fuel Types</option>
                                                    @foreach($fuel_types as $f)
                                                    <option value="{{ $f->name }}" @if(isset($fuel_type) && $fuel_type == $f->name) selected @endif>{{ $f->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 col-sm-6">
                                            <div class="select">
                                                <input type="text" class="form-control" name="kms_driven" value="{{ $kms_driven ?? '' }}" placeholder="Search by kms driven" />
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
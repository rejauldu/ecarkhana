@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif
@include('layouts.frontend.bicycle-background')


<!--=================================Start Post Your Ad-->

<section class="page-section-ptb" id="sell-bicycle">
    <form action="{{ route('products.store') }}" method="post" class="d-block" @submit="isSubmitable" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12">
                @if($errors->any())
                {!! implode('', $errors->all('<div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert">&times;</button>:message</div>')) !!}
                @endif
            </div>
            <div class="col-12 col-md-2 col-lg-3 col-xl-4"></div>
            <div class="col-12 col-md-8 col-lg-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-3">Sell your bike in a click!</h4>
                        <div class="form-group form-label-group">
                            <input type="text" class="form-control bg-light" id="bicycle" placeholder="Select Bike" readonly="" v-model="bicycle" @click.prevent="openModal(1)" />
                            <label for="bicycle" class=" cursor-pointer">Select Bike</label>
                        </div>
                        <div class="form-group form-label-group">
                            <input type="text" class="form-control bg-light" id="ownership" placeholder="Select Ownership" readonly="" v-model="ownership.name" @click.prevent="openModal(3)" />
                            <label for="ownership" class=" cursor-pointer">Ownership</label>
                        </div>
                        <div class="form-group form-label-group">
                            <input type="text" class="form-control bg-light" id="region" placeholder="Select Area" readonly="" v-model="region.name" @click.prevent="openModal(4)" />
                            <label for="region" class=" cursor-pointer">Area</label>
                        </div>
                        <div class="form-group form-label-group">
                            <input type="text" class="form-control bg-light" id="price" placeholder="Select Price" readonly="" v-model="price" @click.prevent="openModal(5)" />
                            <label for="price" class=" cursor-pointer">Expected Price</label>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <h4 class="mb-0">Upload Photos</h4>
                                <div class="text-secondary"><small>More photos give 6x more verified buyers</small></div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4 col-md-2">
                                <div class="size-11 cursor-pointer bg-light border">
                                    <div class="size-child" @click.prevent="openModal(6)" v-if="images[0]">
                                        <img :src="images[0].src" class="rounded w-100 h-100" />
                                    </div>
                                    <div class="size-child" @click.prevent="openModal(6)" v-else>
                                        <i class="fa fa-plus position-center"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col-md-2">
                                <div class="size-11 cursor-pointer bg-light border">
                                    <div class="size-child" @click.prevent="openModal(6)" v-if="images[1]">
                                        <img :src="images[1].src" class="rounded w-100 h-100" />
                                    </div>
                                    <div class="size-child" @click.prevent="openModal(6)" v-else>
                                        <i class="fa fa-plus position-center"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col-md-2">
                                <div class="size-11 cursor-pointer bg-light border">
                                    <div class="size-child" @click.prevent="openModal(6)" v-if="images[2]">
                                        <img :src="images[2].src" class="rounded w-100 h-100" />
                                    </div>
                                    <div class="size-child" @click.prevent="openModal(6)" v-else>
                                        <i class="fa fa-plus position-center"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col-md-2">
                                <div class="size-11 cursor-pointer bg-light border">
                                    <div class="size-child" @click.prevent="openModal(6)" v-if="images[3]">
                                        <img :src="images[3].src" class="rounded w-100 h-100" />
                                    </div>
                                    <div class="size-child" @click.prevent="openModal(6)" v-else>
                                        <i class="fa fa-plus position-center"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col-md-2">
                                <div class="size-11 cursor-pointer bg-light border">
                                    <div class="size-child" @click.prevent="openModal(6)" v-if="images[4]">
                                        <img :src="images[4].src" class="rounded w-100 h-100" />
                                    </div>
                                    <div class="size-child" @click.prevent="openModal(6)" v-else>
                                        <i class="fa fa-plus position-center"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col-md-2">
                                <div class="size-11 cursor-pointer bg-light border">
                                    <div class="size-child" @click.prevent="openModal(6)" v-if="images[5]">
                                        <img :src="images[5].src" class="rounded w-100 h-100" />
                                    </div>
                                    <div class="size-child" @click.prevent="openModal(6)" v-else>
                                        <i class="fa fa-plus position-center"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-right"><button type="submit" class="btn button red"  :disabled="!isSubmitable()"><span class="mr-3">Continue</span> <i class="fa fa-arrow-right"></i></button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- The Modal -->
        <div class="modal fullscreen-md modal-scrollable" id="sell-bicycle-modal">
            <div class="modal-dialog modal-dialog-center">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header flex-md-row flex-column justify-content-between" :class="{'border-bottom-0': page != 5}">
                        <i class="fa fa-arrow-left cursor-pointer height-30 line-height-30" data-dismiss="modal" v-if="page == 1"></i>
                        <span class="fa fa-close cursor-pointer height-30 line-height-30" v-else-if="page == 6" @click.prevent="page--"></span>
                        <span class="fa fa-arrow-left cursor-pointer height-30 line-height-30" v-else @click.prevent="page--"></span>
                        <div class="flex-grow-1 px-5 container" v-if="page == 5">
                            <div class="row">
                                <div class="col-4 col-md-3">
                                    <div class="size-11 cursor-pointer bg-light border">
                                        <div class="size-child" @click.prevent="page = 6" v-if="images[0]">
                                            <img :src="images[0].src" class="w-100 h-100" />
                                        </div>
                                        <div class="size-child" @click.prevent="selectImage()" v-else>
                                            <i class="fa fa-plus position-center"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 col-md-3">
                                    <div class="size-11 cursor-pointer bg-light border">
                                        <div class="size-child" @click.prevent="page = 6" v-if="images[1]">
                                            <img :src="images[1].src" class="w-100 h-100" />
                                        </div>
                                        <div class="size-child" @click.prevent="selectImage()" v-else>
                                            <i class="fa fa-plus position-center"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 col-md-3">
                                    <div class="size-11 cursor-pointer bg-light border">
                                        <div class="size-child" @click.prevent="page = 6" v-if="images[2]">
                                            <img :src="images[2].src" class="w-100 h-100" />
                                        </div>
                                        <div class="size-child" @click.prevent="selectImage()" v-else>
                                            <i class="fa fa-plus position-center"></i>
                                        </div>
                                    </div>
                                </div>
                                @computer
                                <div class="col-4 col-md-3">
                                    <div class="size-11 cursor-pointer bg-light border">
                                        <div class="size-child" @click.prevent="page = 6" v-if="images[3]">
                                            <img :src="images[3].src" class="w-100 h-100" />
                                        </div>
                                        <div class="size-child" @click.prevent="selectImage()" v-else>
                                            <i class="fa fa-plus position-center"></i>
                                        </div>
                                    </div>
                                </div>
                                @endcomputer
                                <div class="col-12"><hr></div>
                                <div class="col-12">
                                    <div class="text-dark">@{{ brand.name }} @{{ model.name }}</div>
                                    <small class="text-secondary">@{{ ownership.name }} <i class="fa fa-angle-double-right"></i> @{{ region.name }}, @{{ division.name }}</small><br/>
                                    <a href="#" class="btn btn-link text-danger pl-0" data-dismiss="modal">Edit details</a>
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1 px-3 overflow-hidden" v-else-if="page != 6">
                            <div class="horizontal-scroll py-1">
                                <span class="border rounded cursor-pointer width-100 text-center d-inline-block overflow-hidden" v-if="!isEmpty(brand)" @click.prevent="brandSelected(brand)">@{{ brand.name }}</span>
                                <span class="border rounded cursor-pointer width-100 text-center d-inline-block overflow-hidden" v-if="!isEmpty(model)" @click.prevent="modelSelected(model)">@{{ model.name }}</span>
                                <span class="border rounded cursor-pointer width-100 text-center d-inline-block overflow-hidden" v-if="!isEmpty(ownership)" @click.prevent="ownershipSelected(ownership)">@{{ ownership.name }}</span>
                                <span class="border rounded cursor-pointer width-100 text-center d-inline-block overflow-hidden" v-if="!isEmpty(region)" @click.prevent="divisionSelected(division)"> @{{ region.name }}, @{{ division.name }}</span>
                                <span class="border rounded cursor-pointer width-100 text-center d-inline-block overflow-hidden" v-if="price" @click.prevent="priceSelected(price)">৳@{{ price }}</span>
                            </div>
                        </div>
                        <span v-if="page != 6" class="float-right nowrap height-30  width-40"><i class="fa fa-angle-left cursor-pointer width-20 height-30 line-height-30 text-center border" @click.prevent="scrollLeft()" v-if="!scrolledLeft"></i><i class="fa fa-angle-right cursor-pointer width-20 height-30 line-height-30 text-center border" @click.prevent="scrollRight()" v-if="!scrolledRight"></i></span>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <h4 class="mx-5" v-if="page==1">Bicycle Brand</h4>
                        <h4 class="mx-5" v-else-if="page==2">Bicycle Model</h4>
                        <h4 class="mx-5" v-else-if="page==3">Bicycle Ownership</h4>
                        <div class="form-group mx-5" v-if="page != 4 && page != 5 && page != 6">
                            <input class="form-control" placeholder="Search..." v-model="search" />
                        </div>
                        <ul class="list-group list-group-flush mx-5" v-if="page == 1">
                            <li class="list-group-item list-group-item-action py-1 cursor-pointer" v-for="b in filteredBrands" @click.prevent="brandSelected(b)" :class="{'text-danger': b.id == brand.id}"><i class="fa fa-check" v-if="b.id == brand.id"></i> @{{ b.name }}</li>
                        </ul>
                        <ul class="list-group list-group-flush mx-5" v-else-if="page == 2">
                            <li class="list-group-item list-group-item-action py-1 cursor-pointer" v-for="m in filteredModels" @click.prevent="modelSelected(m)" :class="{'text-danger': m.id == model.id}" v-if="brand.id == m.brand_id"><i class="fa fa-check" v-if="m.id == model.id"></i> @{{ m.name }}</li>
                        </ul>
                        <div v-else-if="page == 3" class="container">
                            <div class="row mx-0">
                                <div class="col-3" v-for="m in filteredOwnerships">
                                    <button class="btn btn-light m-1" @click.prevent="ownershipSelected(m)" :class="{'text-danger': m.id == ownership.id}">@{{ m.name }}</button>
                                </div>
                            </div>
                        </div>
                        <div v-else-if="page == 4" class="mx-5">
                            <h4 class="">Bicycle Area</h4>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text fa fa-map-marker text-danger bg-white"></span>
                                    </div>
                                    <input class="form-control" placeholder="Region" v-model="region.name" disabled="" v-if="!isEmpty(region)"/>
                                    <input class="form-control" placeholder="Search City" v-model="search" v-else />
                                    <div class="input-group-append" v-if="!isEmpty(region)">
                                        <span class="input-group-text btn-danger cursor-pointer text-white bg-danger" @click.prevent="regionSelected(region)">Continue</span>
                                    </div>
                                </div>
                            </div>
                            <div v-if="!isEmpty(region)" class="list-group-item-danger mb-3 px-3">Select Region to change</div>
                            <ul class="list-group list-group-flush" id="cities">
                                <li class="list-group-item list-group-item-action py-1 cursor-pointer" v-for="d in filteredDivisions" @click.prevent="regionsByDivision(d.name); division = d" :class="{'text-danger': d.id == division.id}">
                                    <div>@{{ d.name }}</div>
                                    <div :id="'regions-'+d.id">
                                        <ul class="list-group list-group-flush">
                                            <li v-for="r in filteredRegions" v-if="r.division_id == d.id" @click.prevent="regionSelected(r)" class="list-group-item list-group-item-action py-0 cursor-pointer border-0"  :class="{'text-info': r.id == region.id}"><i class="fa fa-check" v-if="r.id == region.id"></i> <small>@{{ r.name }}</small></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div v-else-if="page == 5" class="mx-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="note">Bicycle Frame Size</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-danger bg-white fa fa-bicycle"></span>
                                            </div>
                                            <input class="form-control" placeholder="Enter Frame Size" v-model="frame_size" />
                                            <div class="input-group-append" v-if="frameSizeValidate">
                                                <span class="input-group-text text-danger bg-white">Invalid</span>
                                            </div>
                                            <div class="input-group-append" v-else>
                                                <span class="input-group-text bg-white">Centimeter</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="note">Bicycle Price</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-danger bg-white">৳</span>
                                            </div>
                                            <input class="form-control" placeholder="Enter Price" v-model="price" />
                                            <div class="input-group-append" v-if="priceValidate">
                                                <span class="input-group-text text-danger bg-white">Invalid</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="note">Bicycle Description</label>
                                        <textarea class="form-control" rows="5" id="note" placeholder="Description" v-model="note"></textarea>
                                    </div>
                                    <hr/>
                                    <div class="form-group form-label-group">
                                        <input class="form-control" placeholder="Enter Price" id="name" v-model="name" />
                                        <label for="name">Your Name</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone Number:</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text btn btn-link bg-white border-right-0 text-dark">+88</span>
                                            </div>
                                            <input type="text" class="form-control" :class="{'opacity-5': otp_sent}" placeholder="phone" id="phone" v-model="phone" @keyup="isPhoneValid" :disabled="otp_sent || otp_verified">
                                            <div class="input-group-append">
                                                <a class="input-group-text btn btn-link bg-white border-left-0 text-success" href="#" v-if="isPhoneValid() && !otp_sent" @click.prevent="sendOtp">Verify Now</a>
                                                <span class="input-group-text btn bg-white border-left-0 text-secondary" v-else-if="!otp_sent">Invalid</span>
                                                <a class="input-group-text btn bg-white border-left-0 text-danger" href="#" v-else-if="!otp_verified">@{{ countDown }}</a>
                                                <span class="input-group-text btn bg-white border-left-0 text-success" v-else>Verified</span>
                                            </div>
                                            <div class="position-center" v-if="otp_sent"><i class="fa fa-spinner fa-spin text-dark"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group" v-if="otp_sent">
                                        <label for="otp">OTP:</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" :class="{'opacity-5': otp.length == 4}" placeholder="OTP" id="otp" v-model="otp" :disabled="otp.length == 4 || otp_verified">
                                            <div class="input-group-append">
                                                <span class="input-group-text btn bg-white border-left-0 text-danger" v-if="otp.length != 4 && !otp_verified">Must be 4 digit</span>
                                                <span class="input-group-text btn bg-white border-left-0 text-success" v-else-if="otp_verified">OTP Verified</span>
                                            </div>
                                            <div class="position-center" v-if="otp.length == 4"><i class="fa fa-spinner fa-spin text-dark"></i></div>
                                        </div>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="terms" v-model="terms">
                                        <label class="custom-control-label" for="terms">I agree to the <a class="btn btn-link text-primary py-0" href="#">Terms of Service</a> and <a class="btn btn-link text-primary py-0" href="#">Privacy Policy</a></label>
                                    </div>
                                    <input type="hidden" name="category_id" value="3" />
                                    <input type="hidden" name="condition_id" value="3" />
                                    <input type="hidden" name="brand_id" v-model="brand.id" />
                                    <input type="hidden" name="model_id" v-model="model.id" />
                                    <input type="hidden" name="ownership_id" v-model="ownership.id" />
                                    <input type="hidden" name="region_id" v-model="region.id" />
                                    <input type="hidden" name="frame_size" v-model="frame_size" />
                                    <input type="hidden" name="msrp" v-model="price" />
                                    <input type="hidden" name="note" v-model="note" />
                                    <input type="hidden" name="dealer_name" v-model="name" />
                                    <input type="hidden" name="phone" v-model="phone" />
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <div class="input-group my-3">
                                        <input type="submit" class="form-control border-right-0 btn btn-danger" value="List my bicycle" :disabled="!isSubmitable()">
                                        <div class="input-group-append">
                                            <span class="input-group-text border-0 bg-danger text-white"><i class="fa fa-arrow-right"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-else-if="page == 6" class="mx-5">
                            <div class="size-53 mb-3 position-relative">
                                <div class="size-child">
                                    <img :src="images[cover_image].src" class="img-fluid position-center" v-if="images[cover_image]" />
                                </div>
                                <i class="fa fa-trash position-absolute top-5 right-5 display-6 text-danger cursor-pointer" @click.prevent="deleteImage()" v-if="images.length>0"></i>
                            </div>
                            <div class="text-secondary"><small>Maximum 36 Photos</small></div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="size-11 cursor-pointer bg-light border">
                                        <div class="size-child" @click.prevent="cover_image = 0" v-if="images[0]">
                                            <img :src="images[0].src" class="w-100 h-100" />
                                            <div class="caption" v-if="cover_image == 0">Cover</div>
                                        </div>
                                        <div class="size-child" @click.prevent="selectImage()" v-else>
                                            <i class="fa fa-plus position-center"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="size-11 cursor-pointer bg-light border">
                                        <div class="size-child" @click.prevent="cover_image = 1" v-if="images[1]">
                                            <img :src="images[1].src" class="w-100 h-100" />
                                            <div class="caption" v-if="cover_image == 1">Cover</div>
                                        </div>
                                        <div class="size-child" @click.prevent="selectImage()" v-else>
                                            <i class="fa fa-plus position-center"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="size-11 cursor-pointer bg-light border">
                                        <div class="size-child" @click.prevent="cover_image = 2" v-if="images[2]">
                                            <img :src="images[2].src" class="w-100 h-100" />
                                            <div class="caption" v-if="cover_image == 2">Cover</div>
                                        </div>
                                        <div class="size-child" @click.prevent="selectImage()" v-else>
                                            <i class="fa fa-plus position-center"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="size-11 cursor-pointer bg-light border">
                                        <div class="size-child" @click.prevent="cover_image = 3" v-if="images[3]">
                                            <img :src="images[3].src" class="w-100 h-100" />
                                            <div class="caption" v-if="cover_image == 3">Cover</div>
                                        </div>
                                        <div class="size-child" @click.prevent="selectImage()" v-else>
                                            <i class="fa fa-plus position-center"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-3 text-center">
                                    <button class="btn btn-light border-dashed" @click.prevent="selectImage()"><i class="fa fa-plus"></i> Select More Photo</button>
                                </div>
                            </div>
                            <hr/>
                            <div class="row mt-4">
                                <div class="col-2">
                                    <i class="fa fa-lightbulb-o display-5 text-danger"></i>
                                </div>
                                <div class="col-10 text-secondary">
                                    <div class="cursor-pointer" data-toggle="collapse" data-target="#photo-tips">
                                        <div>Tips for photos</div>
                                        <small>More photos gives 5x more verified buyer <i class="fa"></i></small>
                                    </div>
                                    <div id="photo-tips" class="collapse">
                                        <ul class="list-group list-group-flush bullet">
                                            <li class="list-group-item py-1">A bicycle with 5+ photos gives you 5 times response</li>
                                            <li class="list-group-item py-1">Bicycle photo format - .JPG / .PNG</li>
                                            <li class="list-group-item py-1">Click image in landscape mode (recommended)</li>
                                            <li class="list-group-item py-1">Upload high resolution images up to 5 MB</li>
                                            <li class="list-group-item py-1">Upload clear bicycle images without including owner and contact details.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="col-12">
                                <div class="text-dark">@{{ brand.name }} @{{ model.name }}</div>
                                <small class="text-secondary"></i> @{{ ownership.name }} <i class="fa fa-angle-double-right"></i>  @{{ region.name }}, @{{ division.name }}</small><br/>
                                <a href="#" class="btn btn-link text-danger pl-0" data-dismiss="modal">Edit details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="file" class="d-none" name="images[]" v-for="i in 36" :key="i" :id="'file-input-'+(i-1)" @change="processFile($event)" v-if="photo>=(i-1)" accept="image/*" />
    </form>
</section>

<!--=================================
End  Post Your Ad -->

@endsection
@section('script')
<script>
    var vuejs = new Vue({
        el: '#sell-bicycle',
        data: {
            search: '',
            page: 1,
            brand: {},
            brands: @json($brands),
            model: {},
            models: @json($models),
            ownership: {},
            ownerships: @json($ownerships),
            division: {},
            divisions: @json($divisions),
            region:{},
            regions: [],
            frame_size:'',
            price: '',
            prices: [5000, 10000, 15000, 20000, 25000, 30000, 35000, 40000, 50000, 60000, 70000, 80000, 90000, 100000, 110000, 120000],
            scrolledLeft: true,
            scrolledRight: true,
            images: [],
            cover_image: 0,
            photo: 0,
            name: '{{ $user->name ?? "" }}',
            phone: '{{ $user->phone ?? "" }}',
            note: '',
            terms: '',
            otp: '',
            otp_sent: false,
            otp_verified: @auth true @else false @endauth,
            countDown: 60
        },
        methods: {
            brandSelected: function (b) {
                this.brand = b;
                this.page = 2;
                this.reset('model', 'model', 'ownership', 'region', 'division', 'price', 'frame_size');
            },
            modelSelected: function (m) {
                this.model = m;
                this.page = 3;
                this.reset('ownership', 'region', 'division', 'price', 'frame_size');
            },
            ownershipSelected: function (m) {
                this.ownership = m;
                this.page = 4;
                this.reset('division', 'price', 'frame_size');
            },
            divisionSelected: function (m) {
                this.division = m;
                this.page = 5;
                this.reset('price', 'frame_size');
            },
            regionSelected: function (m) {
                this.region = m;
                this.page = 5;
                this.reset('price', 'frame_size');
            },
            priceSelected: function (m) {
                this.price = m;
            },
            photoSelected: function (m) {
                this.photo = m;
            },
            reset: function (...args) {
                for (var i = 0; i < args.length; i++) {
                    if (args[i] == 'brand') {
                        this.brand = {};
                    } else if (args[i] == 'model') {
                        this.model = {};
                    } else if (args[i] == 'ownership') {
                        this.ownership = {};
                    } else if (args[i] == 'division') {
                        this.division = {};
                    } else if (args[i] == 'region') {
                        this.region = {};
                    } else if (args[i] == 'price') {
                        this.price = '';
                    } else if (args[i] == 'frame_size') {
                        this.price = '';
                    }
                }
                this.search = '';
                var e = document.querySelector('.horizontal-scroll');
                var _this = this;
                if(e)
                    setTimeout(function() {
                        if (e.offsetWidth < e.scrollWidth)
                            _this.scrolledRight = false;
                        else {
                            _this.scrolledLeft = true;
                            _this.scrolledRight = true;
                        }
                    }, 0);
            },
            scrollLeft: function () {
                var e = document.querySelector('.horizontal-scroll');
                e.scrollBy( - 102, 0);
                var _this = this;
                setTimeout(function(){
                if (e.scrollLeft == 0)
                    _this.scrolledLeft = true;
                if (e.scrollLeft < (e.scrollWidth - e.offsetWidth))
                    _this.scrolledRight = false;
                }, 0);
            },
            scrollRight: function () {
                var e = document.querySelector('.horizontal-scroll');
                e.scrollBy(102, 0);
                var _this = this;
                setTimeout(function() {
                    if (e.scrollLeft == (e.scrollWidth - e.offsetWidth))
                        _this.scrolledRight = true;
                    if (e.scrollLeft > 0)
                        _this.scrolledLeft = false;
                }, 0);
            },
            openModal: function (p) {
                if (p == 1) {
                    this.page = 1;
                } else if (p == 3) {
                    if (this.ownership)
                        this.page = 3;
                } else if (p == 4) {
                    if (!this.isEmpty(this.division))
                        this.page = 4;
                } else if (p == 5) {
                    if (this.price)
                        this.page = 5;
                } else if (p == 6) {
                    if (this.images.length > 0)
                        this.page = 6;
                }
                $('#sell-bicycle-modal').modal('show');
            },
            processFile: function(event) {
                var f = event.target.files[0];
                f.src = URL.createObjectURL(event.target.files[0]);
                this.images.push(f);
                this.photo++;
                this.page = 6;
            },
            selectImage: function() {
                document.getElementById('file-input-'+this.photo).click();
            },
            isPhoneValid: function () {
                var pattern = /(^(\+88|0088)?(01){1}[356789]{1}(\d){8,9})$/;
                return pattern.test(this.phone);
            },
            sendOtp: function () {
                var _this = this;
                this.countDown = 60;
                this.countDownTimer();
                $.ajax({
                    url: "{{ route('send-otp') }}",
                    data: {"name":this.name, "phone":this.phone, "_token":"{{ csrf_token() }}"},
                    type: "post",
                    success: function(result){
                        _this.otp = '';
                        _this.otp_sent = true;
                    }
                });
            },
            countDownTimer() {
                if (this.countDown > 0) {
                    setTimeout(() => {
                        this.countDown -= 1;
                        this.countDownTimer();
                    }, 1000)
                } else {
                    this.otp_sent = false;
                }
            },
            verifyOtp: function() {
                var _this = this;
                $.ajax({
                    url: "{{ route('verify-otp') }}",
                    data: {"phone":this.phone, "otp":this.otp, "_token":"{{ csrf_token() }}"},
                    type: "post",
                    success: function(result) {
                        if (result == 'success') {
                            _this.otp_verified = true;
                            _this.otp = '';
                            localStorage.phone_verified = 1;
                            localStorage.verified_phone = _this.phone;
                        }
                    }
                });
            },
            deleteImage() {
                if (this.cover_image > 0)
                    this.cover_image--;
                this.images.splice(this.cover_image, 1);
                if (this.photo > 0)
                    this.photo--;
            },
            getFromStorage: function() {
                if (localStorage.brand)
                    this.brand = JSON.parse(localStorage.brand);
                if (localStorage.model)
                    this.model = JSON.parse(localStorage.model);
                if (localStorage.ownership)
                    this.ownership = JSON.parse(localStorage.ownership);
                if (localStorage.division)
                    this.division = JSON.parse(localStorage.division);
                if (localStorage.region)
                    this.region = JSON.parse(localStorage.region);
                if (localStorage.price)
                    this.price = localStorage.price;
                if (localStorage.frame_size)
                    this.price = localStorage.frame_size;
                if (localStorage.note)
                    this.note = localStorage.note;
                if (localStorage.name)
                    this.name = localStorage.name;
                if (localStorage.phone)
                    this.phone = localStorage.phone;
                if (localStorage.phone_verified)
                    this.otp_verified = localStorage.phone_verified;
                if (localStorage.verified_phone)
                    this.phone = localStorage.verified_phone;
            },
            getCurrentLocation: function () {
                var _this = this;
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(p) {
                        _this.regionByPosition(p);
                    });
                }
            },
            regionByPosition: function(p) {
                var _this = this;
                $.ajax({
                    url: "{{ route('get-region') }}?lat=" + p.coords.latitude + "&lon=" + p.coords.longitude,
                    dataType: "json",
                    success: function(result){
                        _this.region = result;
                    }
                });
            },
            regionsByDivision: function(d) {
                var _this = this;
                $.ajax({
                    url: "{{ route('get-regions') }}?division=" + d,
                    dataType: "json",
                    success: function(result){
                        _this.regions = result;
                    }
                });
            },
            isSubmitable: function(e = null) {
                var s = !(!this.photo || !this.price || !this.name || !this.otp_verified || !this.terms);
                if(!s && e) {
                    e.preventDefault();
                }
                return s;
            },
            isEmpty: function(obj) {
                return Object.keys(obj).length === 0;
            }
        },
        computed: {
            filteredBrands() {
                return this.brands.filter(item => {
                    return item.name.toLowerCase().startsWith(this.search.toLowerCase());
                })
            },
            filteredModels() {
                return this.models.filter(item => {
                    return item.name.toLowerCase().startsWith(this.search.toLowerCase());
                })
            },
            filteredOwnerships() {
                return this.ownerships.filter(item => {
                    return item.name.toLowerCase().startsWith(this.search.toLowerCase());
                })
            },
            filteredDivisions() {
                return this.divisions.filter(item => {
                    return item.name.toLowerCase().startsWith(this.search.toLowerCase());
                })
            },
            filteredRegions() {
                return this.regions.filter(item => {
                    return item.name.toLowerCase().startsWith(this.search.toLowerCase());
                })
            },
            filteredPrices() {
                return this.prices.filter(item => {
                    return item.toString().startsWith(this.search);
                })
            },
            bicycle() {
                var bicycle = '';
                if (!this.isEmpty(this.brand))
                    bicycle += this.brand.name;
                if (!this.isEmpty(this.model))
                    bicycle += ' '+this.model.name;
                return bicycle;
            },
            priceValidate() {
                if (this.price.length == 0)
                    return false;
                return this.price.length < 4 || this.price.length > 8;
            },
            frameSizeValidate() {
                if (this.frame_size < 10)
                    return false;
                return this.frame_size < 30 || this.frame_size > 100;
            }
        },
        watch: {
            otp: function (val) {
                if (val.length == 4)
                    this.verifyOtp();
            },
            brand: function(v) {
                localStorage.brand = JSON.stringify(v);
            },
            model: function(v) {
                localStorage.model = JSON.stringify(v);
            },
            ownership: function(v) {
                localStorage.ownership = JSON.stringify(v);
            },
            division: function(v) {
                localStorage.division = JSON.stringify(v);
            },
            region: function(v) {
                localStorage.region = JSON.stringify(v);
            },
            price: function(v) {
                localStorage.price = v;
            },
            frame_size: function(v) {
                localStorage.frame_size = v;
            },
            note: function(v) {
                localStorage.note = v;
            },
            name: function(v) {
                localStorage.name = v;
            },
            phone: function(v) {
                localStorage.phone = v;
            }
        },
        mounted:function(){
            this.getFromStorage();
            this.getCurrentLocation();
        },
    })
</script>
@endsection

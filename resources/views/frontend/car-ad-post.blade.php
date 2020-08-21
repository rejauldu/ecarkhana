@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif
@include('layouts.frontend.car-background')


<!--=================================Start Post Your Ad-->

<section class="page-section-ptb" id="sell-car">
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
                        <h4 class="mb-3">Sell your car in a click!</h4>
                        <div class="form-group form-label-group">
                            <input type="text" class="form-control bg-light" id="car" placeholder="Select Car" readonly="" v-model="car" @click.prevent="openModal(1)" />
                            <label for="car" class=" cursor-pointer">Select Car</label>
                        </div>
                        <div class="form-group form-label-group">
                            <input type="text" class="form-control bg-light" id="kms-driven" placeholder="Select Kms driven" readonly="" v-model="kms_driven" @click.prevent="openModal(5)" />
                            <label for="kms-driven" class=" cursor-pointer">Kms driven</label>
                        </div>
                        <div class="form-group form-label-group">
                            <input type="text" class="form-control bg-light" id="ownership" placeholder="Select Ownership" readonly="" v-model="ownership.name" @click.prevent="openModal(6)" />
                            <label for="ownership" class=" cursor-pointer">Ownership</label>
                        </div>
                        <div class="form-group form-label-group">
                            <input type="text" class="form-control bg-light" id="city" placeholder="Select Area" readonly="" v-model="region.name" @click.prevent="openModal(7)" />
                            <label for="city" class=" cursor-pointer">Area</label>
                        </div>
                        <div class="form-group form-label-group">
                            <input type="text" class="form-control bg-light" id="registration_year" placeholder="Select Registration Year" readonly="" v-model="registration_year" @click.prevent="openModal(8)" />
                            <label for="registration_year" class=" cursor-pointer">Registration Year</label>
                        </div>
                        <div class="form-group form-label-group">
                            <input type="text" class="form-control bg-light" id="price" placeholder="Select Car" readonly="" v-model="price" @click.prevent="openModal(9)" />
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
                                    <div class="size-child" @click.prevent="openModal(10)" v-if="images[0]">
                                        <img :src="images[0].src" class="rounded" />
                                    </div>
                                    <div class="size-child" @click.prevent="openModal(10)" v-else>
                                        <i class="fa fa-plus position-center"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col-md-2">
                                <div class="size-11 cursor-pointer bg-light border">
                                    <div class="size-child" @click.prevent="openModal(10)" v-if="images[1]">
                                        <img :src="images[1].src" class="rounded" />
                                    </div>
                                    <div class="size-child" @click.prevent="openModal(10)" v-else>
                                        <i class="fa fa-plus position-center"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col-md-2">
                                <div class="size-11 cursor-pointer bg-light border">
                                    <div class="size-child" @click.prevent="openModal(10)" v-if="images[2]">
                                        <img :src="images[2].src" class="rounded" />
                                    </div>
                                    <div class="size-child" @click.prevent="openModal(10)" v-else>
                                        <i class="fa fa-plus position-center"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col-md-2">
                                <div class="size-11 cursor-pointer bg-light border">
                                    <div class="size-child" @click.prevent="openModal(10)" v-if="images[3]">
                                        <img :src="images[3].src" class="rounded" />
                                    </div>
                                    <div class="size-child" @click.prevent="openModal(10)" v-else>
                                        <i class="fa fa-plus position-center"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col-md-2">
                                <div class="size-11 cursor-pointer bg-light border">
                                    <div class="size-child" @click.prevent="openModal(10)" v-if="images[4]">
                                        <img :src="images[4].src" class="rounded" />
                                    </div>
                                    <div class="size-child" @click.prevent="openModal(10)" v-else>
                                        <i class="fa fa-plus position-center"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col-md-2">
                                <div class="size-11 cursor-pointer bg-light border">
                                    <div class="size-child" @click.prevent="openModal(10)" v-if="images[5]">
                                        <img :src="images[5].src" class="rounded" />
                                    </div>
                                    <div class="size-child" @click.prevent="openModal(10)" v-else>
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
        <div class="modal fullscreen-md modal-scrollable" id="sell-car-modal">
            <div class="modal-dialog modal-dialog-center">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header flex-md-row flex-column justify-content-between" :class="{'border-bottom-0': page != 9}">
                        <i class="fa fa-arrow-left cursor-pointer height-30 line-height-30" data-dismiss="modal" v-if="page == 1"></i>
                        <span class="fa fa-close cursor-pointer height-30 line-height-30" v-else-if="page == 10" @click.prevent="page--"></span>
                        <span class="fa fa-arrow-left cursor-pointer height-30 line-height-30" v-else @click.prevent="page--"></span>
                        <div class="flex-grow-1 px-5 container" v-if="page == 9">
                            <div class="row">
                                <div class="col-4 col-md-3">
                                    <div class="size-11 cursor-pointer bg-light border">
                                        <div class="size-child" @click.prevent="page = 10" v-if="images[0]">
                                            <img :src="images[0].src" class="" />
                                        </div>
                                        <div class="size-child" @click.prevent="selectImage()" v-else>
                                            <i class="fa fa-plus position-center"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 col-md-3">
                                    <div class="size-11 cursor-pointer bg-light border">
                                        <div class="size-child" @click.prevent="page = 10" v-if="images[1]">
                                            <img :src="images[1].src" class="" />
                                        </div>
                                        <div class="size-child" @click.prevent="selectImage()" v-else>
                                            <i class="fa fa-plus position-center"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 col-md-3">
                                    <div class="size-11 cursor-pointer bg-light border">
                                        <div class="size-child" @click.prevent="page = 10" v-if="images[2]">
                                            <img :src="images[2].src" class="" />
                                        </div>
                                        <div class="size-child" @click.prevent="selectImage()" v-else>
                                            <i class="fa fa-plus position-center"></i>
                                        </div>
                                    </div>
                                </div>
                                @computer
                                <div class="col-4 col-md-3">
                                    <div class="size-11 cursor-pointer bg-light border">
                                        <div class="size-child" @click.prevent="page = 10" v-if="images[3]">
                                            <img :src="images[3].src" class="" />
                                        </div>
                                        <div class="size-child" @click.prevent="selectImage()" v-else>
                                            <i class="fa fa-plus position-center"></i>
                                        </div>
                                    </div>
                                </div>
                                @endcomputer
                                <div class="col-12"><hr></div>
                                <div class="col-12">
                                    <div class="text-dark">@{{ brand.name }} @{{ model.name }} @{{ manufacturing_year }}, @{{ package.name }}</div>
                                    <small class="text-secondary">@{{ kms_driven }}km <i class="fa fa-angle-double-right"></i> @{{ ownership.name }} <i class="fa fa-angle-double-right"></i> @{{ region.name }}, @{{ division.name }} <i class="fa fa-angle-double-right"></i> @{{ registration_year }}</small><br/>
                                    <a href="#" class="btn btn-link text-danger pl-0" data-dismiss="modal">Edit details</a>
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1 px-3 overflow-hidden" v-else-if="page != 10">
                            <div class="horizontal-scroll py-1">
                                <span class="border rounded cursor-pointer width-100 text-center d-inline-block overflow-hidden" v-if="!isEmpty(brand)" @click.prevent="brandSelected(brand)">@{{ brand.name }}</span>
                                <span class="border rounded cursor-pointer width-100 text-center d-inline-block overflow-hidden" v-if="!isEmpty(model)" @click.prevent="modelSelected(model)">@{{ model.name }}</span>
                                <span class="border rounded cursor-pointer width-100 text-center d-inline-block overflow-hidden" v-if="manufacturing_year" @click.prevent="manufacturingYearSelected(manufacturing_year)">@{{ manufacturing_year }}</span>
                                <span class="border rounded cursor-pointer width-100 text-center d-inline-block overflow-hidden" v-if="!isEmpty(package)" @click.prevent="packageSelected(package)">@{{ package.name }}</span>
                                <span class="border rounded cursor-pointer width-100 text-center d-inline-block overflow-hidden" v-if="kms_driven" @click.prevent="kmsDrivenSelected(kms_driven)">@{{ kms_driven }}</span>
                                <span class="border rounded cursor-pointer width-100 text-center d-inline-block overflow-hidden" v-if="!isEmpty(ownership)" @click.prevent="ownershipSelected(ownership)">@{{ ownership.name }}</span>
                                <span class="border rounded cursor-pointer width-100 text-center d-inline-block overflow-hidden" v-if="!isEmpty(region)" @click.prevent="divisionSelected(division)"> @{{ region.name }}, @{{ division.name }}</span>
                                <span class="border rounded cursor-pointer width-100 text-center d-inline-block overflow-hidden" v-if="registration_year" @click.prevent="registrationYearSelected(registration_year)">@{{ registration_year }}</span>
                                <span class="border rounded cursor-pointer width-100 text-center d-inline-block overflow-hidden" v-if="price" @click.prevent="priceSelected(price)">৳@{{ price }}</span>
                            </div>
                        </div>
                        <span v-if="page != 10" class="float-right nowrap height-30 width-40"><i class="fa fa-angle-left cursor-pointer width-20 height-30 text-center border" @click.prevent="scrollLeft()" v-if="!scrolledLeft"></i><i class="fa fa-angle-right cursor-pointer width-20 height-30 text-center border" @click.prevent="scrollRight()" v-if="!scrolledRight"></i></span>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <h4 class="mx-5" v-if="page==1">Car Brand</h4>
                        <h4 class="mx-5" v-else-if="page==2">Car Model</h4>
                        <h4 class="mx-5" v-else-if="page==3">Car Make Year</h4>
                        <h4 class="mx-5" v-else-if="page==4">Car Variant</h4>
                        <h4 class="mx-5" v-else-if="page==5">Car Kms Driven</h4>
                        <h4 class="mx-5" v-else-if="page==6">Car Ownership</h4>
                        <h4 class="mx-5" v-else-if="page==8">Registration Year</h4>

                        <div class="form-group mx-5" v-if="page != 5 && page != 7 && page != 9 && page != 10">
                            <input class="form-control" placeholder="Search..." v-model="search" />
                        </div>
                        <ul class="list-group list-group-flush mx-5" v-if="page == 1">
                            <li class="list-group-item list-group-item-action py-1 cursor-pointer" v-for="b in filteredBrands" @click.prevent="brandSelected(b)" :class="{'text-danger': b.id == brand.id}"><i class="fa fa-check" v-if="b.id == brand.id"></i> @{{ b.name }}</li>
                        </ul>
                        <ul class="list-group list-group-flush mx-5" v-else-if="page == 2">
                            <li class="list-group-item list-group-item-action py-1 cursor-pointer" v-for="m in filteredModels" @click.prevent="modelSelected(m)" :class="{'text-danger': m.id == model.id}"><i class="fa fa-check" v-if="m.id == model.id"></i> @{{ m.name }}</li>
                        </ul>
                        <ul class="list-group list-group-flush mx-5" v-else-if="page == 3">
                            <li class="list-group-item list-group-item-action py-1 cursor-pointer" v-for="m in filteredManufacturingYears" @click.prevent="manufacturingYearSelected(m)" :class="{'text-danger': m == manufacturing_year}"><i class="fa fa-check" v-if="m == manufacturing_year"></i> @{{ m }}</li>
                        </ul>
                        <ul class="list-group list-group-flush mx-5" v-else-if="page == 4">
                            <li class="list-group-item list-group-item-action py-1 cursor-pointer" v-for="m in filteredPackages" @click.prevent="packageSelected(m)" :class="{'text-danger': m.id == package.id}"><i class="fa fa-check" v-if="m.id == package.id"></i> @{{ m.name }}</li>
                        </ul>
                        <div v-else-if="page == 5" class="container">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input class="form-control" placeholder="Search Area" v-model="search" />
                                    <div class="input-group-append">
                                        <span v-if="search.length" class="input-group-text btn-danger cursor-pointer" @click.prevent="kmsDrivenSelected(search)">Continue</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3" v-for="m in filteredKmsDrivens">
                                    <button class="btn btn-light m-1" @click.prevent="kmsDrivenSelected(m)" :class="{'text-danger': m == kms_driven}">@{{ m }}</button>
                                </div>
                            </div>
                        </div>
                        <div v-else-if="page == 6" class="container">
                            <div class="row mx-0">
                                <div class="col-3" v-for="m in filteredOwnerships">
                                    <button class="btn btn-light m-1" @click.prevent="ownershipSelected(m)" :class="{'text-danger': m.id == ownership.id}">@{{ m.name }}</button>
                                </div>
                            </div>
                        </div>
                        <div v-else-if="page == 7" class="mx-5">
                            <h4 class="">Car Area</h4>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text fa fa-map-marker text-danger bg-white"></span>
                                    </div>
                                    <input class="form-control" placeholder="Search Area" v-model="search" />
                                </div>
                            </div>
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
                        <ul class="list-group list-group-flush mx-5" v-else-if="page == 8">
                            <li class="list-group-item list-group-item-action py-1 cursor-pointer" v-for="m in filteredRegistrationYears" @click.prevent="registrationYearSelected(m)" :class="{'text-danger': m == registration_year}"><i class="fa fa-check" v-if="m == registration_year"></i> @{{ m }}</li>
                        </ul>
                        <div v-else-if="page == 9" class="mx-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="note">Car Price</label>
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
                                        <label for="note">Car Description</label>
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
                                    <input type="hidden" name="category_id" value="1" />
                                    <input type="hidden" name="condition_id" value="3" />
                                    <input type="hidden" name="brand_id" v-model="brand.id" />
                                    <input type="hidden" name="model_id" v-model="model.id" />
                                    <input type="hidden" name="manufacturing_year" v-model="manufacturing_year" />
                                    <input type="hidden" name="package_id" v-model="package.id" />
                                    <input type="hidden" name="kms_driven" v-model="kms_driven" />
                                    <input type="hidden" name="ownership_id" v-model="ownership.id" />
                                    <input type="hidden" name="region_id" v-model="region.id" />
                                    <input type="hidden" name="registration_year" v-model="registration_year" />
                                    <input type="hidden" name="msrp" v-model="price" />
                                    <input type="hidden" name="note" v-model="note" />
                                    <input type="hidden" name="dealer_name" v-model="name" />
                                    <input type="hidden" name="phone" v-model="phone" />
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <div class="input-group my-3">
                                        <input type="submit" class="form-control border-right-0 btn btn-danger" value="List my car" :disabled="!isSubmitable()">
                                        <div class="input-group-append">
                                            <span class="input-group-text border-0 bg-danger text-white"><i class="fa fa-arrow-right"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-else-if="page == 10" class="mx-5">
                            <div class="size-21 mb-3">
                                <img :src="images[cover_image].src" class="img-fluid" v-if="images[cover_image]" />
                                <i class="fa fa-trash position-absolute top-0 right-0 display-6 text-danger cursor-pointer" @click.prevent="deleteImage()" v-if="images.length>0"></i>
                            </div>
                            <div class="text-secondary"><small>Maximum 36 Photos</small></div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="size-11 cursor-pointer bg-light border">
                                        <div class="size-child" @click.prevent="cover_image = 0" v-if="images[0]">
                                            <img :src="images[0].src" class="" />
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
                                            <img :src="images[1].src" class="" />
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
                                            <img :src="images[2].src" class="" />
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
                                            <img :src="images[3].src" class="" />
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
                                            <li class="list-group-item py-1">A car with 5+ photos gives you 5 times response</li>
                                            <li class="list-group-item py-1">Car photo format - .JPG / .PNG</li>
                                            <li class="list-group-item py-1">Click image in landscape mode (recommended)</li>
                                            <li class="list-group-item py-1">Upload high resolution images up to 5 MB</li>
                                            <li class="list-group-item py-1">Upload clear car images without including owner and contact details.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="col-12">
                                <div class="text-dark">@{{ brand.name }} @{{ model.name }} @{{ manufacturing_year }}, @{{ package.name }}</div>
                                <small class="text-secondary">@{{ kms_driven }}km <i class="fa fa-angle-double-right"></i> @{{ ownership.name }} <i class="fa fa-angle-double-right"></i>  @{{ region.name }}, @{{ division.name }} <i class="fa fa-angle-double-right"></i> @{{ registration_year }}</small><br/>
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

@endsection                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
@section('script')
<script>
    var vuejs = new Vue({
        el: '#sell-car',
        data: {
            search: '',
            page: 1,
            brand: {},
            brands: @json($brands),
            model: {},
            models: @json($models),
            package: {},
            packages: @json($packages),
            manufacturing_year: '',
            manufacturing_years: [2020, 2019, 2018, 2017, 2016, 2015, 2014, 2013, 2012, 2011, 2010, 2009, 2008, 2007, 2006, 2005, 2004, 2003, 2002, 2001, 2000, 1999, 1998, 1997, 1996, 1995,
                    1994, 1993, 1992, 1991, 1990, 1989, 1988, 1987, 1986, 1985, 1984, 1983, 1982, 1981, 1980],
            kms_driven: '',
            kms_drivens: [5000, 10000, 15000, 20000, 25000, 30000, 35000, 40000, 50000, 60000, 70000, 80000, 90000, 100000, 110000, 120000],
            ownership: {},
            ownerships: @json($ownerships),
            division: {},
            divisions: @json($divisions),
            region:{},
            regions: [],
            registration_year: '',
            registration_years: [2020, 2019, 2018, 2017, 2016, 2015, 2014, 2013, 2012, 2011, 2010, 2009, 2008, 2007, 2006, 2005, 2004, 2003, 2002, 2001, 2000, 1999, 1998, 1997, 1996, 1995,
                    1994, 1993, 1992, 1991, 1990, 1989, 1988, 1987, 1986, 1985, 1984, 1983, 1982, 1981, 1980],
            price: '',
            prices: [5000, 10000, 15000, 20000, 25000, 30000, 35000, 40000, 50000, 60000, 70000, 80000, 90000, 100000, 110000, 120000],
            scrolledLeft: true,
            scrolledRight: true,
            images: [],
            cover_image: 0,
            photo: 0,
            name: '',
            phone: '',
            note: '',
            terms: '',
            otp: '',
            otp_sent: false,
            otp_verified: false,
            countDown: 60
        },
        methods: {
            brandSelected: function (b) {
                this.brand = b;
                this.page = 2;
                this.reset('model', 'manufacturing_year', 'package', 'kms_driven', 'ownership', 'division', 'region', 'registration_year', 'price');
            },
            modelSelected: function (m) {
                this.model = m;
                this.page = 3;
                this.reset('manufacturing_year', 'package', 'kms_driven', 'ownership', 'division', 'region', 'registration_year', 'price');
            },
            manufacturingYearSelected: function (m) {
                this.manufacturing_year = m;
                this.page = 4;
                this.reset('package', 'kms_driven', 'ownership', 'division', 'region', 'registration_year', 'price');
            },
            packageSelected: function (m) {
                this.package = m;
                this.page = 5;
                this.reset('kms_driven', 'ownership', 'division', 'region', 'registration_year', 'price');
            },
            kmsDrivenSelected: function (m) {
                this.kms_driven = m;
                this.page = 6;
                this.reset('ownership', 'division', 'region', 'registration_year', 'price');
            },
            ownershipSelected: function (m) {
                this.ownership = m;
                this.page = 7;
                this.reset('division', 'region', 'registration_year', 'price');
            },
            divisionSelected: function (m) {
                this.division = m;
                this.page = 8;
                this.reset('region', 'registration_year', 'price');
            },
            regionSelected: function (m) {
                this.region = m;
                this.page = 8;
                this.reset('registration_year', 'price');
            },
            registrationYearSelected: function (m) {
                this.registration_year = m;
                this.page = 9;
                this.reset('price');
            },
            priceSelected: function (m) {
                this.price = m;
                //this.page = 10;
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
                    } else if (args[i] == 'manufacturing_year') {
                        this.manufacturing_year = '';
                    } else if (args[i] == 'package') {
                        this.package = {};
                    } else if (args[i] == 'kms_driven') {
                        this.kms_driven = '';
                    } else if (args[i] == 'ownership') {
                        this.ownership = {};
                    } else if (args[i] == 'division') {
                        this.division = {};
                    } else if (args[i] == 'region') {
                        this.region = {};
                    } else if (args[i] == 'registration_year') {
                        this.registration_year = '';
                    } else if (args[i] == 'price') {
                        this.price = '';
                    }
                }
                this.search = '';
                var e = document.querySelector('.horizontal-scroll');
                var _this = this;
                setTimeout(function() {
                    if (e.offsetWidth < e.scrollWidth)
                        _this.scrolledRight = false;
                    else {
                        _this.scrolledLeft = true;
                        _this.scrolledRight = true;
                    }
                }, 1000);
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
                }, 1000);
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
                }, 1000);
            },
            openModal: function (p) {
                if (p == 1) {
                    this.page = 1;
                } else if (p == 5) {
                    if (this.kms_driven)
                        this.page = 5;
                } else if (p == 6) {
                    if (this.ownership)
                        this.page = 6;
                } else if (p == 7) {
                    if (!this.isEmpty(this.division))
                        this.page = 7;
                } else if (p == 8) {
                    if (this.registration_year)
                        this.page = 8;
                } else if (p == 9) {
                    if (this.price)
                        this.page = 9;
                } else if (p == 10) {
                    if (this.images.length > 0)
                        this.page = 10;
                }

                $('#sell-car-modal').modal('show');
            },
            processFile: function(event) {
                var f = event.target.files[0];
                f.src = URL.createObjectURL(event.target.files[0]);
                this.images.push(f);
                this.photo++;
                this.page = 10;
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
                if (localStorage.manufacturing_year)
                    this.manufacturing_year = localStorage.manufacturing_year;
                if (localStorage.package)
                    this.package = JSON.parse(localStorage.package);
                if (localStorage.kms_driven)
                    this.kms_driven = localStorage.kms_driven;
                if (localStorage.ownership)
                    this.ownership = JSON.parse(localStorage.ownership);
                if (localStorage.city)
                    this.city = JSON.parse(localStorage.city);
                if (localStorage.region)
                    this.region = JSON.parse(localStorage.region);
                if (localStorage.registration_year)
                    this.registration_year = localStorage.registration_year;
                if (localStorage.price)
                    this.price = localStorage.price;
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
                        _this.city = result;
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
                $s = !(!this.photo || !this.price || !this.name || !this.otp_verified || !this.terms);
                if(!$s && e)
                    e.preventDefault();
                return $s;
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
            filteredManufacturingYears() {
                return this.manufacturing_years.filter(item => {
                    return item.toString().startsWith(this.search);
                })
            },
            filteredPackages() {
                return this.packages.filter(item => {
                    return item.name.toLowerCase().startsWith(this.search.toLowerCase());
                })
            },
            filteredKmsDrivens() {
                return this.kms_drivens.filter(item => {
                    return item.toString().startsWith(this.search);
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
            filteredRegistrationYears() {
                return this.registration_years.filter(item => {
                    return item.toString().startsWith(this.search);
                })
            },
            car() {
                var car = '';
                if (!this.isEmpty(this.brand))
                    car += this.brand.name + ' ' + this.model.name + ' ' + this.manufacturing_year;
                else
                    return '';
                if (!this.isEmpty(this.package))
                    car += ', ' + this.package.name;
                return car;
            },
            priceValidate() {
                if (this.price.length == 0)
                    return false;
                return this.price.length < 4 || this.price.length > 8;
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
            manufacturing_year: function(v) {
                localStorage.manufacturing_year = v;
            },
            package: function(v) {
                localStorage.package = JSON.stringify(v);
            },
            kms_driven: function(v) {
                localStorage.kms_driven = v;
            },
            ownership: function(v) {
                localStorage.ownership = JSON.stringify(v);
            },
            city: function(v) {
                localStorage.city = JSON.stringify(v);
            },
            region: function(v) {
                localStorage.region = JSON.stringify(v);
            },
            registration_year: function(v) {
                localStorage.registration_year = v;
            },
            price: function(v) {
                localStorage.price = v;
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
        },
    })
</script>
@endsection
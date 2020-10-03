@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.bicycle-background')
<section class="section-full content-inner-2 text-dark" id="compare">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="m-b30">
                    <h4 class="h4 m-t0">Compare to choose the right Bicycle!</h4>
                </div>
            </div>
        </div>
        <div class="row">
            @include('frontend.compares.configuration-bicycle')
            @php($total = 0)
            @if(isset($products))
            @php($total = count($products))
            @mobile
            @php($total = $total>2?2:$total)
            @endmobile
            @endif
            @if($total>0)
            <div class="col-12 bg-white shadow-sm alert alert-dismissible m-0 py-1 sticky-top">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <div class="row">
                            <div class="col-6 @mobile px-0 @endmobile"><div class="size-32 position-relative"><img src="{{ url('/') }}/assets/products/{{ $products[0]->id }}/{{ $products[0]->image1 ?? 'not-found.jpg'}}" class="img-fluid" /></div></div>
                            <div class="col-6 @mobile px-0 @endmobile overflow-hidden">
                                <div class="text-dark @mobile text-small @endmobile">{{ $products[0]->name }}</div>
                                <div class="text-secondary"><small>TK.{{ $products[0]->msrp }}</small></div>
                            </div>
                        </div>
                    </div>
                    @if($total>1)
                    <div class="col">
                        <div class="row">
                            <div class="col-6 @mobile px-0 @endmobile"><div class="size-32 position-relative"><img src="{{ url('/') }}/assets/products/{{ $products[1]->id }}/{{ $products[1]->image1 ?? 'not-found.jpg'}}" class="img-fluid" /></div></div>
                            <div class="col-6 @mobile px-0 @endmobile overflow-hidden">
                                <div class="text-dark @mobile text-small @endmobile">{{ $products[1]->name }}</div>
                                <div class="text-secondary"><small>TK.{{ $products[1]->msrp }}</small></div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($total>2)
                    <div class="col d-none d-md-block">
                        <div class="row">
                            <div class="col-6 @mobile px-0 @endmobile"><div class="size-32 position-relative"><img src="{{ url('/') }}/assets/products/{{ $products[2]->id }}/{{ $products[2]->image1 ?? 'not-found.jpg'}}" class="img-fluid" /></div></div>
                            <div class="col-6 @mobile px-0 @endmobile overflow-hidden">
                                <div class="text-dark @mobile text-small @endmobile">{{ $products[2]->name }}</div>
                                <div class="text-secondary"><small>TK.{{ $products[2]->msrp }}</small></div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @endif
            @if($total>0)
            @php($category = strtolower($type))
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="row mx-0 list-group-item-danger border border-light">
                            <div class="col py-2"><strong>General Specification</strong></div>
                            <div class="col py-2"></div>
                            @if($total>1)
                            <div class="col py-2"></div>
                            @endif
                            @if($total>2)
                            <div class="col py-2"></div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 striped" id="general-specification">
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Brand</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->brand->name ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Model</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->model->name ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Frame Size</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->frame_size ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Frame Materials</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->frame_material ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Fork</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->fork ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>No of gears</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->gear_no ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Wheel Size</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->wheel_size ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Shifter</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->shifter ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Made Origin</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->made_origin->name ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Weight</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->weight ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Price</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    Tk.{{ $products[$i]->msrp ?? '' }}
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 cursor-pointer collapsed" data-toggle="collapse" data-target="#key-feature">
                        <div class="row mx-0 list-group-item-danger border border-light">
                            <div class="col py-2"><strong>Feature</strong></div>
                            <div class="col py-2"></div>
                            @if($total>1)
                            <div class="col py-2"></div>
                            @endif
                            @if($total>2)
                            <div class="col py-2"></div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 striped collapse show" id="key-feature" data-parent="#compare">
                        @foreach($key_features as $key_feature)
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>{{ ucwords($key_feature->name) }}</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    @if($products[$i]->$category->key_feature && in_array($key_feature->id, $products[$i]->$category->key_feature)) <i class="fa fa-check text-success"></i> @else <i class="fa fa-close text-danger"></i> @endif
                                </div>
                            @endfor
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 cursor-pointer collapsed" data-toggle="collapse" data-target="#frame-suspension">
                        <div class="row mx-0 list-group-item-danger border border-light">
                            <div class="col py-2"><strong>Frame & Suspension</strong></div>
                            <div class="col py-2"></div>
                            @if($total>1)
                            <div class="col py-2"></div>
                            @endif
                            @if($total>2)
                            <div class="col py-2"></div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 collapse striped" id="frame-suspension" data-parent="#compare">
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Frame size</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->frame_size ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Frame metarials</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->frame_material ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Recommended biker height</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->recommended_biker_height ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Fork rear</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->fork_rear ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Fork front</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->fork_front ?? '' }}
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 cursor-pointer collapsed" data-toggle="collapse" data-target="#wheels-tyres">
                        <div class="row mx-0 list-group-item-danger border border-light">
                            <div class="col py-2"><strong>Wheels & Tyres</strong></div>
                            <div class="col py-2"></div>
                            @if($total>1)
                            <div class="col py-2"></div>
                            @endif
                            @if($total>2)
                            <div class="col py-2"></div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 collapse striped" id="wheels-tyres" data-parent="#compare">
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Wheels</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->wheel_type->name ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Wheel size</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->wheel_size ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Tyre type</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->tyre_type->name ?? '' }} kmpl
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Tyre size</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->tyre_size ?? '' }}
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 cursor-pointer collapsed" data-toggle="collapse" data-target="#drivetrain">
                        <div class="row mx-0 list-group-item-danger border border-light">
                            <div class="col py-2"><strong>Drivetrain</strong></div>
                            <div class="col py-2"></div>
                            @if($total>1)
                            <div class="col py-2"></div>
                            @endif
                            @if($total>2)
                            <div class="col py-2"></div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 collapse striped" id="drivetrain" data-parent="#compare">
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Shifters</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->shifter ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Front derailleur</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->front_derailleur ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Rear derailleur</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->rear_derailleur ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Crank</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->crank ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Freewheel</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->freewheel ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Seat post</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->seat_post ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Chain</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->chain ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Pedals</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->pedal ?? '' }}
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 cursor-pointer collapsed" data-toggle="collapse" data-target="#component">
                        <div class="row mx-0 list-group-item-danger border border-light">
                            <div class="col py-2"><strong>Component</strong></div>
                            <div class="col py-2"></div>
                            @if($total>1)
                            <div class="col py-2"></div>
                            @endif
                            @if($total>2)
                            <div class="col py-2"></div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 collapse striped" id="component" data-parent="#compare">
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Saddle</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->saddle ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Headset</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->headset ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Handlebar</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->handlebar ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Grips</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->grip ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Stem</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->stem ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Brake set</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->brake_system ?? '' }}
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 cursor-pointer collapsed" data-toggle="collapse" data-target="#weight">
                        <div class="row mx-0 list-group-item-danger border border-light">
                            <div class="col py-2"><strong>Weight & Limit</strong></div>
                            <div class="col py-2"></div>
                            @if($total>1)
                            <div class="col py-2"></div>
                            @endif
                            @if($total>2)
                            <div class="col py-2"></div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 collapse striped" id="weight" data-parent="#compare">
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Bike weight</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->weight ?? '' }}
                                </div>
                            @endfor
                        </div>
                        <div class="row mx-0">
                            <div class="col py-2">
                                <div>Biker weight limit</div>
                            </div>
                            @for ($i = 0; $i < $total; $i++)
                                <div class="col px-3 py-2 text-center @if($i==2) d-none d-md-block @endif">
                                    {{ $products[$i]->$category->biker_weight ?? '' }}
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

@endsection
@section('script')
<script>
    var vuejs = new Vue({
        el: '#compare',
        data: {
            configuration: @if(isset($products)) {{ $total+1 }} @endif,
            products: @json($products),
            search:"",
            brand: {},
            brands: @json($brands),
            model:  {},
            models: @json($models),
            package: {},
            packages: @json($packages),
            page: 1,
            loading: 0,
            category_id: 1
        },
        methods: {
            openModal: function (p) {
                if (p == 1) {
                    this.page = 1;
                } else if (p == 2) {
                    this.page = 2;
                } else if (p == 3) {
                    if (this.model)
                        this.page = 3;
                }

                $('#sell-car-modal').modal('show');
            },
            modelSelected: function (b, m, i=0) {
                this.brand = b;
                this.model = m;
                this.search = '';
                this.page = 2;
                this.loading = i+1;
                Vue.nextTick(function() {
                    setParentsHeight();
                });
                this.getProduct(i);
                
            },
            isEmpty: function(obj) {
                if(obj)
                    return Object.keys(obj).length === 0;
                return true;
            },
            getProduct: function(i) {
                var _this = this;
                var u = "{{ route('get-product') }}?brand_id=" + _this.brand.id + "&model_id=" + _this.model.id;
                $.ajax({
                    url: u,
                    dataType: "json",
                    success: function(result){
                        _this.page = 1;
                        _this.products[i] = result;
                        _this.configuration = _this.products.length+1;
                        _this.reset('brand', 'model');
                        _this.loading = 0;
                    }
                });
            },
            removeProduct: function(i) {
                this.reset('brand', 'model');
            },
            reset: function (...args) {
                for (var i = 0; i < args.length; i++) {
                    if (args[i] == 'brand') {
                        this.brand = {};
                    } else if (args[i] == 'model') {
                        this.model = {};
                    }
                }
                this.search = '';
            },
            compare: function() {
                var url = '{{ route("compare") }}/';
                for(let i=0; i<this.products.length; i++) {
                    if(i != 0)
                        url += '-and-';
                    url += this.products[i].brand.name + '-' + this.products[i].model.name;
                }
                window.location = url;
            },
            getFromStorage: function() {
                if(localStorage.category_id)
                    this.category_id = localStorage.category_id;
            }
        },
        computed: {
            filteredBrands() {
                var _this = this;
                return this.brands.filter(item => {
                    if(item.category_id == _this.category_id)
                        return item.name.toLowerCase().startsWith(this.search.toLowerCase());
                    else
                        return false;
                });
            },
            filteredModels() {
                return this.models.filter(item => {
                    return item.name.toLowerCase().startsWith(this.search.toLowerCase());
                })
            }
        },
        watch: {
        },
        created: function() {
        },
        mounted: function() {
            this.getFromStorage();
        },
    });
    (function() {
        var e = document.querySelector('.sticky-top');
        if(e)
            window.observer.observe(e);
    })();
</script>
@endsection
@section('style')
<style>
    .sticky-top {
       visibility: hidden;
       height:0px;
       overflow: hidden;
    }
    .sticky-top.stuck {
       visibility: visible;
       height:auto;
       min-height: 86px;
       border-radius: 0;
    }
</style>
@endsection
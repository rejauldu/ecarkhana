<div class="col-12 bg-white">
    <div class="row">
        <div class="col">
            <div class="card" @click.prevent="openModal(2)" v-if="page == 1 && configuration == 1">
                <div class="size-53">
                    <div class="size-child">
                        <img class="card-img-top img-fluid cursor-pointer hover-opacity-5" src="{{ url('/') }}/images/add-bicycle.jpg" alt="Card image">
                    </div>
                </div>
                <div class="card-body">
                    <div class="input-group rounded-0 rounded-top" @click.prevent="openModal(2)">
                        <input type="text" class="form-control border-right-0 rounded-0" placeholder="Select Brand/Model">
                        <div class="input-group-append">
                            <span class="input-group-text bg-white border-left-0  rounded-0"><i class="fa fa-caret-down"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" v-else-if="page == 2 && configuration == 1">
                <div class="card-header bg-white">
                    <a class="btn btn-link text-danger" href="#" @click.prevent="page=2">Brand/Modal</a>
                    <i class="fa fa-close position-absolute right-10 top-10 cursor-pointer btn-light text-danger" @click.prevent="page=1"></i>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Select Brand/Model" v-model="search">
                    </div>
                    <ul class="list-group compare-scroll" v-if="filteredBrands.length">
                        <li class="list-group-item py-1 cursor-pointer border-0" v-for="b in filteredBrands" :class="{'text-danger': b.id == brand.id}">
                            <strong><i class="fa fa-check" v-if="b.id == brand.id"></i> @{{ b.name }}</strong>
                            <ul class="list-group list-group-flush border-left">
                                <li class="list-group-item list-group-item-action py-1 cursor-pointer border-0" v-for="m in models" @click.prevent="modelSelected(b, m, 0)" :class="{'text-danger': m.id == model.id}" v-if="b.id == m.brand_id"><i class="fa fa-check" v-if="m.id == model.id"></i> @{{ m.name }}</li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="list-group compare-scroll" v-else>
                        <li class="list-group-item py-1 cursor-pointer border-0" v-for="b in brands" :class="{'text-danger': b.id == brand.id}">
                            <strong><i class="fa fa-check" v-if="b.id == brand.id"></i> @{{ b.name }}</strong>
                            <ul class="list-group list-group-flush border-left">
                                <li class="list-group-item list-group-item-action py-1 cursor-pointer border-0" v-for="m in filteredModels" @click.prevent="modelSelected(b, m, 0)" :class="{'text-danger': m.id == model.id}" v-if="b.id == m.brand_id"><i class="fa fa-check" v-if="m.id == model.id"></i> @{{ m.name }}</li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card" v-else-if="configuration > 1 || products.length > 0">
                <div class="size-53 position-relative">
                    <div class="size-child">
                        <img class="card-img-top img-fluid position-center" :src="'{{ url('/') }}/assets/products/'+products[0].id+'/'+products[0].image1" alt="Product Image">
                    </div>
                </div>
                <div class="card-body">
                    <i class="fa fa-close position-absolute right-10 top-10 cursor-pointer btn-light text-danger" @click.prevent="page=1; configuration=1; removeProduct(0)"></i>
                    <div><span>@{{ products[0].brand.name }} @{{ products[0].model.name }} @{{ products[0].manufacturing_year }}</span> <i class="fa fa-pencil cursor-pointer btn-light text-danger" @click.prevent="page=1; configuration=1; removeProduct(0)"></i></div>
                    <div class="display-6 text-dark">Tk. @{{ products[0].msrp }}</div>
                </div>
            </div>
        </div>
        <!-- Side bar start -->
        <div class="col">
            <div class="card opacity-5" v-if="configuration < 2 && products.length < 2">
                <div class="size-53 position-relative">
                    <div class="size-child">
                        <img class="card-img-top img-fluid position-center" src="{{ url('/') }}/images/add-bicycle.jpg" alt="Card image">
                    </div>
                </div>
                <div class="card-body">
                    <div class="input-group rounded-0 rounded-top">
                        <input type="text" class="form-control border-right-0 rounded-0 bg-white" placeholder="Select Brand/Model" disabled="">
                        <div class="input-group-append">
                            <span class="input-group-text bg-white border-left-0  rounded-0"><i class="fa fa-caret-down"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" @click.prevent="openModal(2)" v-else-if="page == 1 && configuration == 2">
                <div class="size-53 position-relative">
                    <div class="size-child">
                        <img class="card-img-top img-fluid  cursor-pointer hover-opacity-5 position-center" src="{{ url('/') }}/images/add-bicycle.jpg" alt="Card image">
                    </div>
                </div>
                <div class="card-body">
                    <div class="input-group rounded-0 rounded-top" @click.prevent="openModal(2)">
                        <input type="text" class="form-control border-right-0 rounded-0" placeholder="Select Brand/Model">
                        <div class="input-group-append">
                            <span class="input-group-text bg-white border-left-0  rounded-0"><i class="fa fa-caret-down"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" v-else-if="page == 2 && configuration == 2">
                <div class="card-header bg-white">
                    <a class="btn btn-link text-danger" href="#" @click.prevent="page=2">Brand/Modal</a>
                    <i class="fa fa-close position-absolute right-10 top-10 cursor-pointer btn-light text-danger" @click.prevent="page=1"></i>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Select Brand/Model" v-model="search">
                    </div>
                    <ul class="list-group compare-scroll" v-if="filteredBrands.length">
                        <li class="list-group-item py-1 cursor-pointer border-0" v-for="b in filteredBrands" :class="{'text-danger': b.id == brand.id}">
                            <strong><i class="fa fa-check" v-if="b.id == brand.id"></i> @{{ b.name }}</strong>
                            <ul class="list-group list-group-flush border-left">
                                <li class="list-group-item list-group-item-action py-1 cursor-pointer border-0" v-for="m in models" @click.prevent="modelSelected(b, m, 1)" :class="{'text-danger': m.id == model.id}" v-if="b.id == m.brand_id"><i class="fa fa-check" v-if="m.id == model.id"></i> @{{ m.name }}</li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="list-group compare-scroll" v-else>
                        <li class="list-group-item py-1 cursor-pointer border-0" v-for="b in brands" :class="{'text-danger': b.id == brand.id}">
                            <strong><i class="fa fa-check" v-if="b.id == brand.id"></i> @{{ b.name }}</strong>
                            <ul class="list-group list-group-flush border-left">
                                <li class="list-group-item list-group-item-action py-1 cursor-pointer border-0" v-for="m in filteredModels" @click.prevent="modelSelected(b, m, 1)" :class="{'text-danger': m.id == model.id}" v-if="b.id == m.brand_id"><i class="fa fa-check" v-if="m.id == model.id"></i> @{{ m.name }}</li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card" v-else-if="configuration > 2 || products.length > 1">
                <div class="size-53 position-relative">
                    <div class="size-child">
                        <img class="card-img-top img-fluid position-center" :src="'{{ url('/') }}/assets/products/'+products[1].id+'/'+products[1].image1" alt="Product Image">
                    </div>
                </div>
                <div class="card-body">
                    <i class="fa fa-close position-absolute right-10 top-10 cursor-pointer btn-light text-danger" @click.prevent="page=1; configuration = 2; removeProduct(1)"></i>
                    <div><span>@{{ products[1].brand.name }} @{{ products[1].model.name }} @{{ products[1].manufacturing_year }}</span> <i class="fa fa-pencil cursor-pointer btn-light text-danger" @click.prevent="page=1; configuration = 2; removeProduct(1)"></i></div>
                    <div class="display-6 text-dark">Tk. @{{ products[1].msrp }}</div>
                </div>
            </div>
        </div>
        <div class="col d-none d-md-block">
            <div class="card opacity-5" v-if="configuration < 3 && products.length < 3">
                <div class="size-53 position-relative">
                    <div class="size-child">
                        <img class="card-img-top img-fluid position-center" src="{{ url('/') }}/images/add-bicycle.jpg" alt="Card image">
                    </div>
                </div>
                <div class="card-body">
                    <div class="input-group rounded-0 rounded-top">
                        <input type="text" class="form-control border-right-0 rounded-0 bg-white" placeholder="Select Brand/Model" disabled="">
                        <div class="input-group-append">
                            <span class="input-group-text bg-white border-left-0  rounded-0"><i class="fa fa-caret-down"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" @click.prevent="openModal(2)" v-else-if="page == 1 && configuration == 3">
                <div class="size-53 position-relative">
                    <div class="size-child">
                        <img class="card-img-top img-fluid cursor-pointer hover-opacity-5 position-center" src="{{ url('/') }}/images/add-bicycle.jpg" alt="Card image">
                    </div>
                </div>
                <div class="card-body">
                    <div class="input-group rounded-0 rounded-top" @click.prevent="openModal(2)">
                        <input type="text" class="form-control border-right-0 rounded-0" placeholder="Select Brand/Model">
                        <div class="input-group-append">
                            <span class="input-group-text bg-white border-left-0  rounded-0"><i class="fa fa-caret-down"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" v-else-if="page == 2 && configuration == 3">
                <div class="card-header bg-white">
                    <a class="btn btn-link text-danger" href="#" @click.prevent="page=2">Brand/Modal</a>
                    <i class="fa fa-close position-absolute right-10 top-10 cursor-pointer btn-light text-danger" @click.prevent="page=1"></i>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Select Brand/Model" v-model="search">
                    </div>
                    <ul class="list-group compare-scroll" v-if="filteredBrands.length">
                        <li class="list-group-item py-1 cursor-pointer border-0" v-for="b in filteredBrands" :class="{'text-danger': b.id == brand.id}">
                            <strong><i class="fa fa-check" v-if="b.id == brand.id"></i> @{{ b.name }}</strong>
                            <ul class="list-group list-group-flush border-left">
                                <li class="list-group-item list-group-item-action py-1 cursor-pointer border-0" v-for="m in models" @click.prevent="modelSelected(b, m, 2)" :class="{'text-danger': m.id == model.id}" v-if="b.id == m.brand_id"><i class="fa fa-check" v-if="m.id == model.id"></i> @{{ m.name }}</li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="list-group compare-scroll" v-else>
                        <li class="list-group-item py-1 cursor-pointer border-0" v-for="b in brands" :class="{'text-danger': b.id == brand.id}">
                            <strong><i class="fa fa-check" v-if="b.id == brand.id"></i> @{{ b.name }}</strong>
                            <ul class="list-group list-group-flush border-left">
                                <li class="list-group-item list-group-item-action py-1 cursor-pointer border-0" v-for="m in filteredModels" @click.prevent="modelSelected(b, m, 2)" :class="{'text-danger': m.id == model.id}" v-if="b.id == m.brand_id"><i class="fa fa-check" v-if="m.id == model.id"></i> @{{ m.name }}</li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card" v-else-if="configuration > 3 || products.length > 2">
                <div class="size-53 position-relative">
                    <div class="size-child">
                        <img class="card-img-top img-fluid position-center" :src="'{{ url('/') }}/assets/products/'+products[2].id+'/'+products[2].image1" alt="Product Image">
                    </div>
                </div>
                <div class="card-body">
                    <i class="fa fa-close position-absolute right-10 top-10 cursor-pointer btn-light text-danger" @click.prevent="page=1; configuration = 3; removeProduct(2)"></i>
                    <div><span>@{{ products[2].brand.name }} @{{ products[2].model.name }} @{{ products[2].manufacturing_year }}</span> <i class="fa fa-pencil cursor-pointer btn-light text-danger" @click.prevent="page=1; configuration = 3; removeProduct(2)"></i></div>
                    <div class="display-6 text-dark">Tk. @{{ products[2].msrp }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center py-4">
            <a class="btn btn-danger" href="#" @click.prevent="compare()">Compare Now</a>
        </div>
    </div>
</div>
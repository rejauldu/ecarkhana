<div class="row">
    @foreach($products as $product)
    <div class="col-12 col-md-6 col-lg-4 px-2">
        <div class="bg-white product-hover-effect shadow-sm mb-3">
            <div class="size-53">
                <div class="size-child overflow-hidden">
                    <a href="{{ route('products.show', $product->id) }}" class="w-100 h-100 d-inline-block">
                        <img class="position-center h-auto w-100" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image1 ?? 'not-found.jpg' }}" alt="{{ $product->name }}">
                    </a>
                </div>
                <div class="size-child product-hover-show">
                    <a href="{{ route('products.show', $product->id) }}" class="w-100 h-100 d-inline-block">
                        <div class="float-left form-control bg-dark text-white text-left border-0 d-inline-block w-auto position-relative py-1 height-30">
                            <input type="checkbox" id="new-{{ $product->id }}" class="compare-checkbox" product-id="{{ $product->id }}">
                            <label for="new-{{ $product->id }}">Compare</label>
                        </div>
                    </a>
                </div>
                <div class="bg-white product-hover-show2 position-absolute height-30 w-100 line-height-30 bottom-0">
                    <a class="btn btn-link border text-dark py-1" href="#"  @click.prevent='openWhatsappModal({{ $product->id }})'>Dealer Detail</a>
                    <a class="btn btn-link border float-right text-dark py-1" href="#" @click.prevent='openWhatsappModal({{ $product->id }})'><i class="fa fa-whatsapp text-success"></i> Chat</a>
                </div>
            </div>
            <div class="text-dark clearfix px-3 py-1">
                <div class="text-left clearfix">
                    <span><i class="fa fa-map-marker text-danger"></i> {{ $product->supplier->region->name ?? ''}}</span>
                    <span class="float-right"><i class="fa fa-industry text-warning"></i> {{ $product->brand->name ?? ''}}</span>
                </div>
                <div class="display-6 my-0 owl-heading"><a href="{{ route('products.show', $product->id) }}" class="">{{ $product->name }}</a></div>
                <div class="separator"></div>
                <div class="text-center font-16">Tk.{{ $product->msrp }}</div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="row">
    @foreach($products as $product)
    <div class="col-12 col-md-6 col-lg-4 px-2">
        <div class="bg-white shadow-sm mx-2 mb-3 zoom-parent overflow-hidden shadow-hover-10">
            <div class="size-53 clearfix">
                <div class="size-child zoom-target-1">
                    <img class="position-center w-100" src="{{ url('/') }}/assets/products/{{ $product->id }}/{{ $product->image1 ?? 'not-found.jpg' }}" alt="{{ $product->name }}">
                </div>
                <div class="float-left form-control bg-dark text-white text-left border-0 d-inline-block w-auto position-relative height-30 py-1">
                    <input type="checkbox" id="used-{{ $product->id }}" class="compare-checkbox" product-id="{{ $product->id }}">
                    <label for="used-{{ $product->id }}">Compare</label>
                </div>
            </div>
            <div class="text-dark clearfix px-3 py-1">
                <div>
                    <i class="fa @if($product->rating > 0) fa-star @else fa-star-o @endif orange-color"></i>
                    <i class="fa @if($product->rating > 1) fa-star @else fa-star-o @endif orange-color"></i>
                    <i class="fa @if($product->rating > 2) fa-star @else fa-star-o @endif orange-color"></i>
                    <i class="fa @if($product->rating > 3) fa-star @else fa-star-o @endif orange-color"></i>
                    <i class="fa @if($product->rating > 4) fa-star @else fa-star-o @endif orange-color"></i>
                </div>
                <div class="text-left clearfix">
                    <span><i class="fa fa-map-marker text-danger"></i> {{ $product->supplier->region->name ?? ''}}, {{ $product->supplier->division->name ?? ''}}</span>
                    <span class="float-right"><i class="fa fa-industry text-warning"></i> {{ $product->category->name ?? ''}}</span>
                </div>
                <div class="display-6 my-2 owl-heading"><a href="{{ route('products.show', $product->id) }}" class="">{{ $product->name }}</a></div>
                <div class="separator"></div>
                <h3 class="owl-heading">Tk.{{ $product->msrp }}</h3>
                <div class="row text-left">
                    <div class="col-6 my-1">
                        <i class="fa fa-road"></i> {{ $product->brand->name ?? ''}}
                    </div>
                    <div class="col-6 my-1">
                        <i class="fa fa-calendar"></i> {{ $product->model->name ?? ''}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
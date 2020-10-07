<div class="card">
  <div class="card-header bg-white font-16 font-weight-bold position-relative p-0 border-bottom-0">
    <a class="card-link text-dark d-block p-2" data-toggle="collapse" href="#left-filter-price" aria-expanded="true">
      <i class="fa fa-collapse-icon"></i>
      Price
    </a>
  </div>
  <div id="left-filter-price" class="collapse show" data-parent="#left-filter">
    <div class="card-body">
      @if(isset($url))
      <div id="price-show" class="text-center mb-3">BDT 0 - BDT 5 Crore</div>
      <div class="multi-handle-slider" data-min="1000" data-max="10000000" data-handle-1="{{ $minimum_price ?? 1000 }}" data-handle-2="{{ $maximum_price ?? 10000000 }}" data-updated="priceUpdate" data-onchange="priceOnchange" data-logarithm="true">
        <span class="handle-1"></span>
        <span class="highlight"></span>
        <span class="handle-2"></span>
        <input type="hidden" id="minimum-price" class="minimum" value="1000">
        <input type="hidden" id="maximum-price" class="maximum" value="10000000">
      </div>
      @elseif($type == 'Car')
      <div id="price-show" class="text-center mb-3">BDT 0 Lakh - BDT 10 Crore</div>
      <div class="multi-handle-slider" data-min="50000" data-max="50000000" data-handle-1="{{ $minimum_price ?? 50000 }}" data-handle-2="{{ $maximum_price ?? 50000000 }}" data-updated="priceUpdate" data-onchange="priceOnchange" data-logarithm="true">
        <span class="handle-1"></span>
        <span class="highlight"></span>
        <span class="handle-2"></span>
        <input type="hidden" id="minimum-price" class="minimum" value="50000">
        <input type="hidden" id="maximum-price" class="maximum" value="50000000">
      </div>
      @elseif($type == 'Motorcycle')
      <div id="price-show" class="text-center mb-3">BDT 0 K - BDT 50 Lakh</div>
      <div class="multi-handle-slider" data-min="0" data-max="5000000" data-handle-1="{{ $minimum_price ?? 0 }}" data-handle-2="{{ $maximum_price ?? 5000000 }}" data-updated="priceUpdate" data-onchange="priceOnchange" data-logarithm="true">
        <span class="handle-1"></span>
        <span class="highlight"></span>
        <span class="handle-2"></span>
        <input type="hidden" id="minimum-price" class="minimum" value="0">
        <input type="hidden" id="maximum-price" class="maximum" value="5000000">
      </div>
      @else
      <div id="price-show" class="text-center mb-3">BDT 0 K - BDT 5 Lakh</div>
      <div class="multi-handle-slider" data-min="0" data-max="500000" data-handle-1="{{ $minimum_price ?? 0 }}" data-handle-2="{{ $maximum_price ?? 500000 }}" data-updated="priceUpdate" data-onchange="priceOnchange" data-logarithm="true">
        <span class="handle-1"></span>
        <span class="highlight"></span>
        <span class="handle-2"></span>
        <input type="hidden" id="minimum-price" class="minimum" value="0">
        <input type="hidden" id="maximum-price" class="maximum" value="500000">
      </div>
      @endif
    </div>
  </div>
</div>
<div class="card">
  <div class="card-header bg-white font-16 font-weight-bold position-relative p-0 border-bottom-0">
    <a class="card-link text-dark d-block p-2" data-toggle="collapse" href="#left-filter-brand" aria-expanded="true">
      <i class="fa fa-collapse-icon"></i>
      Brand & Model
    </a>
  </div>
  <div id="left-filter-brand" class="collapse show" data-parent="#left-filter">
    <div class="card-body py-1 text-dark">
      <ul class="list-group list-group-flush">
        @foreach($brands as $brand)
        <li class="list-group-item py-1">
          <a href="#" class="font-weight-normal">{{ $brand->name ?? 'Unnamed' }}</a>
          <ul class="list-group list-group-flush">
            @foreach($brand->models as $model)
            @php($m = str_replace(' ', '-', $model->name))
            <li class="list-group-item py-1">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="model-{{ $model->id }}" onclick="products.updateModels('{{ $m }}')" @if(isset($model_search) && strpos($model_search, $m) !== false) checked @endif>
                <label class="custom-control-label" for="model-{{ $model->id }}">{{ $model->name ?? 'Unnamed' }}</label>
              </div>
            </li>
            @endforeach
          </ul>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
@if(!isset($url))
<div class="card">
  <div class="card-header bg-white font-16 font-weight-bold position-relative p-0 border-bottom-0">
    <a class="card-link text-dark d-block p-2" data-toggle="collapse" href="#left-filter-make-year" aria-expanded="true">
      <i class="fa fa-collapse-icon"></i>
      Model year
    </a>
  </div>
  <div id="left-filter-make-year" class="collapse show" data-parent="#left-filter">
    <div class="card-body">
      <div id="make-year-show" class="text-center mb-3">1980 - 2020</div>
      <div class="multi-handle-slider" data-min="1980" data-max="2020" data-handle-1="{{ $minimum_make_year ?? 1980 }}" data-handle-2="{{ $maximum_make_year ?? 2020 }}" data-updated="makeYearUpdate" data-onchange="makeYearOnchange">
        <span class="handle-1"></span>
        <span class="highlight"></span>
        <span class="handle-2"></span>
        <input type="hidden" id="minimum-make-year" class="minimum" value="1980">
        <input type="hidden" id="maximum-make-year" class="maximum" value="2020">
      </div>
    </div>
  </div>
</div>
@if($category == 'Car')
<div class="card">
  <div class="card-header bg-white font-16 font-weight-bold position-relative p-0 border-bottom-0">
    <a class="card-link text-dark d-block p-2" data-toggle="collapse" href="#left-filter-body-type" @if(isset($body_type_search)) aria-expanded="true" @endif>
      <i class="fa fa-collapse-icon"></i>
      Body Type
    </a>
  </div>
  <div id="left-filter-body-type" class="collapse @if(isset($body_type_search)) show @endif" data-parent="#left-filter">
    <div class="card-body py-1 text-dark">
      <ul class="list-group list-group-flush">
        @foreach($body_types as $body_type)
        @php($body = str_replace(' ', '-', $body_type->name))
        <li class="list-group-item py-1">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="body-type-{{ $body_type->id }}" onclick="products.updateBodyType('{{ $body }}')" @if(isset($body_type_search) && strpos($body_type_search, $body) !== false) checked @endif>
            <label class="custom-control-label" for="body-type-{{ $body_type->id }}">{{ $body_type->name ?? 'Unnamed' }}</label>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
@endif
@if($category != 'Bicycle')
<div class="card">
  <div class="card-header bg-white font-16 font-weight-bold position-relative p-0 border-bottom-0">
    <a class="card-link text-dark d-block p-2" data-toggle="collapse" href="#left-filter-kms-driven" aria-expanded="true">
      <i class="fa fa-collapse-icon"></i>
      Kilometers Driven
    </a>
  </div>
  <div id="left-filter-kms-driven" class="collapse show" data-parent="#left-filter">
    <div class="card-body">
      <div id="kms-driven-show" class="text-center mb-3">5,000 kms - 2,00,000 kms</div>
      <div class="multi-handle-slider" data-min="5000" data-max="200000" data-handle-1="{{ $minimum_kms_driven ?? 5000 }}" data-handle-2="{{ $maximum_kms_driven ?? 200000 }}" data-updated="kmsDrivenUpdate" data-onchange="kmsDrivenOnchange" data-logarithm="true">
        <span class="handle-1"></span>
        <span class="highlight"></span>
        <span class="handle-2"></span>
        <input type="hidden" id="minimum-kms-driven" class="minimum" value="5000">
        <input type="hidden" id="maximum-kms-driven" class="maximum" value="200000">
      </div>
    </div>
  </div>
</div>
@endif
@endif
<div class="card">
  <div class="card-header bg-white font-16 font-weight-bold position-relative p-0 border-bottom-0">
    <a class="card-link text-dark d-block p-2" data-toggle="collapse" href="#left-filter-condition" @if(isset($condition_search)) aria-expanded="true" @endif>
      <i class="fa fa-collapse-icon"></i>
      Condition
    </a>
  </div>
  <div id="left-filter-condition" class="collapse @if(isset($condition_search)) show @endif" data-parent="#left-filter">
    <div class="card-body py-1 text-dark">
      <ul class="list-group list-group-flush">
        @foreach($conditions as $condition)
        <li class="list-group-item py-1">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="condition-{{ $condition->id }}" onclick="products.updateCondition('{{ $condition->name }}')" @if(isset($condition_search) && strpos(strtolower($condition_search), strtolower($condition->name)) !== false) checked @endif>
            <label class="custom-control-label" for="condition-{{ $condition->id }}">{{ $condition->name ?? 'Unnamed' }}</label>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
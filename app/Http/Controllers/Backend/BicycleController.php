<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Product;
use App\Bicycle;
use App\Dropdowns\Brand;
use App\Dropdowns\Model;
use App\Dropdowns\BicycleType;
use App\Dropdowns\BikerGender;
use App\Dropdowns\Condition;
use App\Dropdowns\WheelType;
use App\Dropdowns\MadeOrigin;
use App\Dropdowns\TyreType;
use App\Dropdowns\KeyFeature;
use App\Dropdowns\WhatANew;
use App\Dropdowns\ProsCons;
use App\Dropdowns\AfterSellService;
use App\User;
use App\Dropdowns\Ownership;
use App\Locations\Division;

class BicycleController extends Controller {

    public function __construct() {
        $this->middleware('moderator:Product', ['except' => ['index', 'show', 'sell']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $products = Product::select('products.*')->where('category_id', 3)->with('bicycle', 'brand', 'supplier.region');
        $filters = [];
        if ($request->condition) {
            $products = $products->whereHas('condition', function (Builder $q) use($request) {
                $q->whereRaw('lower(name) like "%' . strtolower($request->condition) . '%"');
            });
            $data['condition'] = $request->condition;
            $data['condition_search'] = $request->condition;
        }
        if ($request->location) {
            $products = $products->whereHas('supplier.region', function (Builder $q) use($request) {
                $q->where('name', 'like', '%' . $request->location . '%');
            });
            $data['location'] = $request->location;
        }
        if ($request->brand && $request->brand != 'All Brands') {
            $products = $products->whereHas('brand', function(Builder $q) use($request) {
                $q->whereRaw("upper(name) like '%" . strtoupper($request->brand) . "%'");
            });
            $data['brand'] = $request->brand;
        }
        if ($request->model && $request->model != 'All Models') {
            $products = $products->whereHas('model', function(Builder $q) use($request) {
                $q->whereRaw("upper(name) like '%" . strtoupper($request->model) . "%'");
            });
            $data['model'] = $request->model;
            $data['model_search'] = $request->model;
        }
        if ($request->bicycle_type && $request->bicycle_type != 'All Bike Types') {
            $products = $products->whereHas('bicycle.bicycle_type', function(Builder $q) use($request) {
                $q->whereRaw("upper(name) like '%" . strtoupper($request->bicycle_type) . "%'");
            });
            $data['bicycle_type'] = $request->bicycle_type;
        }
        if ($request->frame_size && $request->frame_size != 'Any Frame Size') {
            $frame_sizes = explode("-", $request->frame_size);
            $products = $products->whereHas('bicycle', function(Builder $q) use($frame_sizes) {
                $q->where('frame_size', '>', $frame_sizes[0])->where('frame_size', '<', $frame_sizes[1]);
            });
            $data['frame_size'] = $request->frame_size;
        }
        if ($request->price && $request->price != 'Any Price') {
            $prices = explode("-", $request->price);
            $products = $products->where('msrp', '>', $prices[0])->where('msrp', '<', $prices[1]);
            $data['price'] = $request->price;
            $data['minimum_price'] = $prices[0];
            $data['maximum_price'] = $prices[1];
        }
        if ($request->biker_gender && $request->biker_gender != 'All Genders') {
            $products = $products->whereHas('bicycle.biker_gender', function(Builder $q) use($request) {
                $q->whereRaw("upper(name) like '%" . strtoupper($request->biker_gender) . "%'");
            });
            $data['biker_gender'] = $request->biker_gender;
        }
        /* Bicycle list left filter */
        if (Input::get('conditions')) {
            $conditions = explode('-and-', Input::get('conditions'));
            $conditions = str_replace('-', ' ', $conditions);
            $products = $products->whereHas('condition', function($q) use($conditions) {
                $q->whereIn('name', $conditions);
            });
            $data['condition_search'] = Input::get('conditions');
        }
        if (Input::get('body-types')) {
            $body_types = explode('-and-', Input::get('body-types'));
            $body_types = str_replace('-', ' ', $body_types);
            $products = $products->whereHas('bicycle.body_type', function($q) use($body_types) {
                $q->whereIn('name', $body_types);
            });
            $data['body_type_search'] = Input::get('body-types');
        }
        if (Input::get('minimum-price')) {
            $products = $products->where('msrp', '>=', Input::get('minimum-price'));
            $data['minimum_price'] = Input::get('minimum-price');
        }
        if (Input::get('maximum-price')) {
            $products = $products->where('msrp', '<=', Input::get('maximum-price'));
            $data['maximum_price'] = Input::get('maximum-price');
        }
        if (Input::get('minimum-make-year')) {
            $products = $products->where('manufacturing_year', '>=', Input::get('minimum-make-year'));
            $data['minimum_make_year'] = Input::get('minimum-make-year');
        }
        if (Input::get('maximum-make-year')) {
            $products = $products->where('manufacturing_year', '<=', Input::get('maximum-make-year'));
            $data['maximum_make_year'] = Input::get('maximum-make-year');
        }
        if (Input::get('models')) {
            $models = explode('-and-', Input::get('models'));
            $models = str_replace('-', ' ', $models);
            $products = $products->whereHas('model', function($q) use($models) {
                $q->whereIn('name', $models);
            });
            $data['model_search'] = Input::get('models');
        }
        if (Input::get('minimum-kms-driven')) {
            $products = $products->where('kms_driven', '>=', Input::get('minimum-kms-driven'));
            $data['minimum_kms_driven'] = Input::get('minimum-kms-driven');
        }
        if (Input::get('maximum-kms-driven')) {
            $products = $products->where('kms_driven', '<=', Input::get('maximum-kms-driven'));
            $data['maximum_kms_driven'] = Input::get('maximum-kms-driven');
        }
        /* Bicycle list left filter ends */
        if ($request->lat && $request->lon) {
            $products = $products->join('users', 'products.supplier_id', '=', 'users.id')
                    ->selectRaw('ROUND(('
                            . '6371'
                            . '* acos( cos( radians(lat) )'
                            . '* cos( radians(' . $request->lat . ') )'
                            . '* cos( radians(' . $request->lon . ') - radians(lon)) + sin(radians(lat))'
                            . '* sin( radians(' . $request->lat . ')))'
                            . '), 3) AS distance')
                    ->orderBy('distance', 'ASC');
            if ($request->within_km) {
                $products = $products->join('users', 'products.supplier_id', '=', 'users.id')
                        ->whereRaw('(ROUND(('
                        . '6371'
                        . '* acos( cos( radians(lat) )'
                        . '* cos( radians(' . $request->lat . ') )'
                        . '* cos( radians(' . $request->lon . ') - radians(lon)) + sin(radians(lat))'
                        . '* sin( radians(' . $request->lat . ')))'
                        . '), 3)) < ?', ['distance' => $request->within_km]);
                $data['within_km'] = $request->within_km;
            }
        }
        $products = $products->paginate(12);
        $products = $products->appends($request->except('page'));
        $data['products'] = $products;
        $data['conditions'] = Condition::all();
        $data['brands'] = Brand::where('category_id', 3)->with('models')->get();
        $data['models'] = Model::where('category_id', 3)->with('brand')->get();
        $data['bicycle_types'] = BicycleType::all();
        $data['biker_genders'] = BikerGender::all();
        $data['suppliers'] = User::where('user_type_id', 2)->orWhere('user_type_id', 3)->take(15)->get();
        $data['type'] = 'Bicycle';
        return view('backend.products.bicycles.index', $data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manageIndex() {
        $bicycles = Bicycle::with('condition', 'brand', 'model')->orderBy('id', 'desc')->get();
        return view('backend.products.bicycles.manage-index', compact('bicycles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $dropdowns['brands'] = Brand::where('category_id', 3)->get();
        $dropdowns['models'] = Model::where('category_id', 3)->get();
        $dropdowns['conditions'] = Condition::where('category_id', 3)->get();
        $dropdowns['wheel_types'] = WheelType::where('category_id', 3)->get();
        $dropdowns['made_origins'] = MadeOrigin::where('category_id', 3)->get();
        $dropdowns['tyre_types'] = TyreType::where('category_id', 3)->get();
        $dropdowns['key_features'] = KeyFeature::where('category_id', 3)->get();
        $dropdowns['what_a_news'] = WhatANew::all();
        $dropdowns['pros_conses'] = ProsCons::all();
        $dropdowns['bicycle_types'] = BicycleType::all();
        $dropdowns['biker_genders'] = BikerGender::all();
        return view('backend.products.bicycles.create', $dropdowns);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $data = $request->except('_token', '_method');
        if (isset($data['key_feature']))
            $data['key_feature'] = implode(',', $data['key_feature']);
        $bicycle = Bicycle::create($data);
        $files = $request->file('360');
        if($files)
        for ($i = 0; $i < count($files); $i++) {
            $file = $files[$i];
            if ($file) {
                $destination_path = 'assets/products/bicycles/'.$bicycle->id;
                $new_name = ($i+1) . '.' . $file->getClientOriginalExtension();
                $file->move($destination_path, $new_name);
            }
        }
        
        return redirect(route('bicycles.manage-bicycles'))->with('message', 'Bicycle created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $product = Product::with('condition', 'brand', 'model', 'bicycle.wheel_type', 'bicycle.made_origin', 'bicycle.tyre_type', 'supplier.region', 'supplier.division', 'comments.sub_comments', 'comments.user', 'comments.sub_comments.user', 'reviews')
                ->where('id', $id)
                ->first();
        $key_features = KeyFeature::where('category_id', 3)->get();
        $after_sell_services = AfterSellService::where('category_id', 3)->get();
        $related_products = Product::whereHas('bicycle', function($q) use($product) {
                    $q->where('brand_id', $product->bicycle->brand_id);
                })
                ->with('bicycle', 'brand', 'model', 'supplier.region')
                ->take(10)
                ->get();
        $product->after_sell_service = explode(',', $product->after_sell_service);
        $today = strtotime(date("Y-m-d"));
        $from = strtotime($product->auction_from);
        $to = strtotime($product->auction_to);
        $auction = false;
        if ($from <= $today && $to >= $today)
            $auction = true;
        $type = 'Bicycle';
        return view('backend.products.bicycles.show', compact('product', 'key_features', 'after_sell_services', 'related_products', 'type', 'auction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $dropdowns['brands'] = Brand::where('category_id', 3)->get();
        $dropdowns['models'] = Model::where('category_id', 3)->get();
        $dropdowns['conditions'] = Condition::where('category_id', 3)->get();
        $dropdowns['wheel_types'] = WheelType::where('category_id', 3)->get();
        $dropdowns['made_origins'] = MadeOrigin::where('category_id', 3)->get();
        $dropdowns['tyre_types'] = TyreType::where('category_id', 3)->get();
        $dropdowns['key_features'] = KeyFeature::where('category_id', 3)->get();
        $dropdowns['what_a_news'] = WhatANew::all();
        $dropdowns['pros_conses'] = ProsCons::all();
        $dropdowns['bicycle_types'] = BicycleType::all();
        $dropdowns['biker_genders'] = BikerGender::all();
        $bicycle = Bicycle::find($id);
        $dropdowns['bicycle'] = $bicycle;
        if (isset($bicycle->key_feature))
            $bicycle->key_feature = explode(',', $bicycle->key_feature);
        return view('backend.products.bicycles.create', $dropdowns);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $data = $request->except('_token', '_method');
        if (isset($data['key_feature']))
            $data['key_feature'] = implode(',', $data['key_feature']);
        if (!isset($data['loan_availability']))
            $data['loan_availability'] = 0;
        $files = $request->file('360');
        if($files)
        for ($i = 0; $i < count($files); $i++) {
            $file = $files[$i];
            if ($file) {
                $destination_path = 'assets/products/bicycles/'.$id;
                $new_name = ($i+1) . '.' . $file->getClientOriginalExtension();
                $file->move($destination_path, $new_name);
            }
        }
        Bicycle::find($id)->update($data);
        return redirect(route('bicycles.manage-bicycles'))->with('message', 'Bicycle updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
    public function sell() {
        $brands = Brand::where('category_id', 3)->get();
        $models = Model::where('category_id', 3)->get();
        $divisions = Division::all();
        $ownerships = Ownership::all();
        $type = "Bicycle";
        return view('backend.products.bicycles.sell', compact('brands', 'models', 'divisions', 'ownerships', 'type'));
    }
}

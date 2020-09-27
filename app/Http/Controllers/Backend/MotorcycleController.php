<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Motorcycle;
use App\Dropdowns\Brand;
use App\Dropdowns\Model;
use App\Dropdowns\BodyType;
use App\Dropdowns\Displacement;
use App\Dropdowns\GroundClearance;
use App\Dropdowns\EngineType;
use App\Dropdowns\MadeIn;
use App\Dropdowns\MadeOrigin;
use App\Dropdowns\Condition;
use App\Dropdowns\TyreType;
use App\Dropdowns\StartingSystem;
use App\Dropdowns\CoolingSystem;
use App\Dropdowns\FrontBrake;
use App\Dropdowns\RearBrake;
use App\Dropdowns\KeyFeature;
use App\Dropdowns\WhatANew;
use App\Dropdowns\ProsCons;
use App\Dropdowns\AfterSellService;
use App\User;

class MotorcycleController extends Controller {

    public function __construct() {
        $this->middleware('moderator:Product', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $products = Product::has('motorcycle')->with('brand', 'model')->paginate(20);
        $suppliers = User::where('user_type_id', 2)->orWhere('user_type_id', 3)->take(15)->get();
        $type = 'Motorcycle';
        return view('backend.products.motorcycles.index', compact('products', 'suppliers', 'type'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manageIndex() {
        $motorcycles = Motorcycle::with('condition', 'brand', 'model')->orderBy('id', 'desc')->get();
        return view('backend.products.motorcycles.manage-index', compact('motorcycles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $dropdowns['brands'] = Brand::where('category_id', 2)->get();
        $dropdowns['models'] = Model::where('category_id', 2)->get();
        $dropdowns['body_types'] = BodyType::where('category_id', 2)->get();
        $dropdowns['displacements'] = Displacement::where('category_id', 2)->get();
        $dropdowns['ground_clearances'] = GroundClearance::where('category_id', 2)->get();
        $dropdowns['engine_types'] = EngineType::where('category_id', 2)->get();
        $dropdowns['made_ins'] = MadeIn::where('category_id', 2)->get();
        $dropdowns['made_origins'] = MadeOrigin::where('category_id', 2)->get();
        $dropdowns['conditions'] = Condition::where('category_id', 2)->get();
        $dropdowns['tyre_types'] = TyreType::where('category_id', 2)->get();
        $dropdowns['starting_systems'] = StartingSystem::where('category_id', 2)->get();
        $dropdowns['cooling_systems'] = CoolingSystem::where('category_id', 2)->get();
        $dropdowns['front_brakes'] = FrontBrake::where('category_id', 2)->get();
        $dropdowns['rear_brakes'] = RearBrake::where('category_id', 2)->get();
        $dropdowns['key_features'] = KeyFeature::where('category_id', 1)->get();
        $dropdowns['what_a_news'] = WhatANew::all();
        $dropdowns['pros_conses'] = ProsCons::all();
        return view('backend.products.motorcycles.create', $dropdowns);
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
        $motorcycle = Motorcycle::create($data);
        $files = $request->file('360');
        if($files)
        for ($i = 0; $i < count($files); $i++) {
            $file = $files[$i];
            if ($file) {
                $destination_path = 'assets/products/motorcycles/'.$motorcycle->id;
                $new_name = ($i+1) . '.' . $file->getClientOriginalExtension();
                $file->move($destination_path, $new_name);
            }
        }
        
        return redirect(route('motorcycles.manage-motorcycles'))->with('message', 'Motorcycle created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $product = Product::has('motorcycle')
                ->with('auction_grade', 'brand', 'model', 'motorcycle.displacement', 'motorcycle.ground_clearance', 'motorcycle.engine_type', 'motorcycle.condition', 'motorcycle.front_brake', 'motorcycle.rear_brake', 'supplier', 'comments.sub_comments', 'comments.user', 'comments.sub_comments.user', 'reviews')
                ->where('id', $id)
                ->first();
        $key_features = KeyFeature::where('category_id', 2)->get();
        $after_sell_services = AfterSellService::where('category_id', 2)->get();
        $related_products = Product::whereHas('motorcycle', function($q) use($product) {
                    $q->where('brand_id', $product->motorcycle->brand_id);
                })
                ->with('motorcycle', 'motorcycle.brand', 'motorcycle.model', 'supplier.region')
                ->get();
        $product->after_sell_service = explode(',', $product->after_sell_service);
        $type = 'Motorcycle';
        $today = strtotime(date("Y-m-d"));
        $from = strtotime($product->auction_from);
        $to = strtotime($product->auction_to);
        $auction = false;
        if ($from <= $today && $to >= $today)
            $auction = true;
        return view('backend.products.motorcycles.show', compact('product', 'key_features', 'after_sell_services', 'related_products', 'type', 'auction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $dropdowns['brands'] = Brand::where('category_id', 2)->get();
        $dropdowns['models'] = Model::where('category_id', 2)->get();
        $dropdowns['body_types'] = BodyType::where('category_id', 2)->get();
        $dropdowns['displacements'] = Displacement::where('category_id', 2)->get();
        $dropdowns['ground_clearances'] = GroundClearance::where('category_id', 2)->get();
        $dropdowns['engine_types'] = EngineType::where('category_id', 2)->get();
        $dropdowns['made_ins'] = MadeIn::where('category_id', 2)->get();
        $dropdowns['made_origins'] = MadeOrigin::where('category_id', 2)->get();
        $dropdowns['conditions'] = Condition::where('category_id', 2)->get();
        $dropdowns['tyre_types'] = TyreType::where('category_id', 2)->get();
        $dropdowns['starting_systems'] = StartingSystem::where('category_id', 2)->get();
        $dropdowns['cooling_systems'] = CoolingSystem::where('category_id', 2)->get();
        $dropdowns['front_brakes'] = FrontBrake::where('category_id', 2)->get();
        $dropdowns['key_features'] = KeyFeature::where('category_id', 1)->get();
        $dropdowns['rear_brakes'] = RearBrake::where('category_id', 2)->get();
        $dropdowns['key_features'] = KeyFeature::where('category_id', 2)->get();
        $motorcycle = Motorcycle::find($id);
        if (isset($motorcycle->key_feature))
            $motorcycle->key_feature = explode(',', $motorcycle->key_feature);
        $dropdowns['motorcycle'] = $motorcycle;
        $dropdowns['what_a_news'] = WhatANew::all();
        $dropdowns['pros_conses'] = ProsCons::all();

        return view('backend.products.motorcycles.create', $dropdowns);
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
        if (!isset($data['abs']))
            $data['abs'] = 0;
        $files = $request->file('360');
        if($files)
        for ($i = 0; $i < count($files); $i++) {
            $file = $files[$i];
            if ($file) {
                $destination_path = 'assets/products/motorcycles/'.$id;
                $new_name = ($i+1) . '.' . $file->getClientOriginalExtension();
                $file->move($destination_path, $new_name);
            }
        }
        Motorcycle::find($id)->update($data);
        return redirect(route('motorcycles.index'))->with('message', 'Motorcycle updated successfully');
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

}

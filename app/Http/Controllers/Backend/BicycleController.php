<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Bicycle;
use App\Dropdowns\Brand;
use App\Dropdowns\Model;
use App\Dropdowns\Condition;
use App\Dropdowns\WheelType;
use App\Dropdowns\MadeOrigin;
use App\Dropdowns\TyreType;
use App\Dropdowns\KeyFeature;
use App\Dropdowns\WhatANew;
use App\Dropdowns\ProsCons;
use App\Dropdowns\AfterSellService;
use App\User;

class BicycleController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $products = Product::has('bicycle')->with('brand', 'model')->paginate(20);
        $suppliers = User::where('user_type_id', 2)->orWhere('user_type_id', 3)->take(15)->get();
        $type = 'Bicycle';
        return view('backend.products.bicycles.index', compact('products', 'suppliers', 'type'));
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
        $product = Product::has('bicycle')
                ->with('bicycle.brand', 'bicycle.model', 'bicycle.wheel_type', 'bicycle.made_origin', 'bicycle.tyre_type', 'supplier', 'comments.sub_comments', 'comments.user', 'comments.sub_comments.user', 'reviews')
                ->where('id', $id)
                ->first();
        $key_features = KeyFeature::where('category_id', 3)->get();
        $after_sell_services = AfterSellService::where('category_id', 3)->get();
        $related_products = Product::whereHas('bicycle', function($q) use($product) {
                    $q->where('brand_id', $product->bicycle->brand_id);
                })
                ->with('bicycle', 'bicycle.brand', 'bicycle.model', 'supplier.region')
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

}

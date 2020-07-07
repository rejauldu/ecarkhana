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

class BicycleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$bicycles = Bicycle::with('condition', 'brand', 'model')->orderBy('id', 'desc')->get();
        return view('backend.products.bicycles.index', compact('bicycles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
    public function store(Request $request)
    {
        $data = $request->except('_token', '_method');
		if(isset($data['key_feature']))
			$data['key_feature'] = implode(',', $data['key_feature']);
		for($i=1; $i<=10; $i++) {
			$file = $request->file('image'.$i);
			if($file) {
				$destination_path = 'assets/products/bicycles';
				$new_name = time().'-image'.$i.'.'.$file->getClientOriginalExtension();
				$file->move($destination_path, $new_name);
				$data['image'.$i] = $new_name;
			}
		}
		Bicycle::create($data);
		return redirect(route('bicycles.index'))->with('message', 'Bicycle created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
		if(isset($bicycle->key_feature))
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
    public function update(Request $request, $id)
    {
        $data = $request->except('_token', '_method');
		if(isset($data['key_feature']))
			$data['key_feature'] = implode(',', $data['key_feature']);
		if(!isset($data['loan_availability']))
			$data['loan_availability'] = 0;
		for($i=1; $i<=10; $i++) {
			$file = $request->file('image'.$i);
			if($file) {
				$destination_path = 'assets/products/bicycles';
				$new_name = $id.'-image'.$i.'.'.$file->getClientOriginalExtension();
				$file->move($destination_path, $new_name);
				$data['image'.$i] = $new_name;
			}
		}
		Bicycle::find($id)->update($data);
		return redirect(route('bicycles.index'))->with('message', 'Bicycle updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

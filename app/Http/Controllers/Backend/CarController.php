<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Car;
use App\Dropdowns\Brand;
use App\Dropdowns\Model;
use App\Dropdowns\BodyType;
use App\Dropdowns\Package;
use App\Dropdowns\Displacement;
use App\Dropdowns\GroundClearance;
use App\Dropdowns\DriveType;
use App\Dropdowns\EngineType;
use App\Dropdowns\FuelType;
use App\Dropdowns\Condition;
use App\Dropdowns\Transmission;
use App\Dropdowns\SellingCapacity;
use App\Dropdowns\GearBox;
use App\Dropdowns\WheelBase;
use App\Dropdowns\Cylinder;
use App\Dropdowns\WheelType;
use App\Dropdowns\TyreType;
use App\Dropdowns\FrontBrake;
use App\Dropdowns\RearBrake;
use App\Dropdowns\KeyFeature;
use App\Dropdowns\InteriorFeature;
use App\Dropdowns\ExteriorFeature;
use App\Dropdowns\SafetySecurity;
use App\Dropdowns\AdditionalFeature;
use App\Dropdowns\WhatANew;
use App\Dropdowns\ProsCons;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$cars = Car::with('brand', 'model', 'package')->orderBy('id', 'desc')->get();
        return view('backend.products.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$dropdowns['brands'] = Brand::where('category_id', 1)->get();
		$dropdowns['models'] = Model::where('category_id', 1)->get();
		$dropdowns['body_types'] = BodyType::where('category_id', 1)->get();
		$dropdowns['packages'] = Package::where('category_id', 1)->get();
		$dropdowns['displacements'] = Displacement::where('category_id', 1)->get();
		$dropdowns['ground_clearances'] = GroundClearance::where('category_id', 1)->get();
		$dropdowns['drive_types'] = DriveType::where('category_id', 1)->get();
		$dropdowns['engine_types'] = EngineType::where('category_id', 1)->get();
		$dropdowns['fuel_types'] = FuelType::where('category_id', 1)->get();
		$dropdowns['conditions'] = Condition::where('category_id', 1)->get();
		$dropdowns['transmissions'] = Transmission::where('category_id', 1)->get();
		$dropdowns['selling_capacities'] = SellingCapacity::where('category_id', 1)->get();
		$dropdowns['gear_boxes'] = GearBox::where('category_id', 1)->get();
		$dropdowns['wheel_bases'] = WheelBase::where('category_id', 1)->get();
		$dropdowns['cylinders'] = Cylinder::where('category_id', 1)->get();
		$dropdowns['wheel_types'] = WheelType::where('category_id', 1)->get();
		$dropdowns['tyre_types'] = TyreType::where('category_id', 1)->get();
		$dropdowns['front_brakes'] = FrontBrake::where('category_id', 1)->get();
		$dropdowns['rear_brakes'] = RearBrake::where('category_id', 1)->get();
		$dropdowns['key_features'] = KeyFeature::where('category_id', 1)->get();
		$dropdowns['interior_features'] = InteriorFeature::all();
		$dropdowns['exterior_features'] = ExteriorFeature::all();
		$dropdowns['safety_securities'] = SafetySecurity::all();
		$dropdowns['additional_features'] = AdditionalFeature::all();
		$dropdowns['what_a_news'] = WhatANew::all();
		$dropdowns['pros_conses'] = ProsCons::all();
        return view('backend.products.cars.create', $dropdowns);
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
		if(isset($data['exterior_feature']))
			$data['exterior_feature'] = implode(',', $data['exterior_feature']);
		if(isset($data['interior_feature']))
			$data['interior_feature'] = implode(',', $data['interior_feature']);
		if(isset($data['safety_security']))
			$data['safety_security'] = implode(',', $data['safety_security']);
		if(isset($data['additional_feature']))
			$data['additional_feature'] = implode(',', $data['additional_feature']);
		if(isset($data['what_a_new']))
			$data['what_a_new'] = implode(',', $data['what_a_new']);
		if(isset($data['pros_cons']))
			$data['pros_cons'] = implode(',', $data['pros_cons']);
		for($i=1; $i<=10; $i++) {
			$file = $request->file('image'.$i);
			if($file) {
				$destination_path = 'assets/products/cars';
				$new_name = time().'-image'.$i.'.'.$file->getClientOriginalExtension();
				$file->move($destination_path, $new_name);
				$data['image'.$i] = $new_name;
			}
		}
		Car::create($data);
		return redirect(route('cars.index'))->with('message', 'Car created successfully');
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
		$dropdowns['brands'] = Brand::where('category_id', 1)->get();
		$dropdowns['models'] = Model::where('category_id', 1)->get();
		$dropdowns['body_types'] = BodyType::where('category_id', 1)->get();
		$dropdowns['packages'] = Package::where('category_id', 1)->get();
		$dropdowns['displacements'] = Displacement::where('category_id', 1)->get();
		$dropdowns['ground_clearances'] = GroundClearance::where('category_id', 1)->get();
		$dropdowns['drive_types'] = DriveType::where('category_id', 1)->get();
		$dropdowns['engine_types'] = EngineType::where('category_id', 1)->get();
		$dropdowns['fuel_types'] = FuelType::where('category_id', 1)->get();
		$dropdowns['conditions'] = Condition::where('category_id', 1)->get();
		$dropdowns['transmissions'] = Transmission::where('category_id', 1)->get();
		$dropdowns['selling_capacities'] = SellingCapacity::where('category_id', 1)->get();
		$dropdowns['gear_boxes'] = GearBox::where('category_id', 1)->get();
		$dropdowns['wheel_bases'] = WheelBase::where('category_id', 1)->get();
		$dropdowns['cylinders'] = Cylinder::where('category_id', 1)->get();
		$dropdowns['wheel_types'] = WheelType::where('category_id', 1)->get();
		$dropdowns['tyre_types'] = TyreType::where('category_id', 1)->get();
		$dropdowns['front_brakes'] = FrontBrake::where('category_id', 1)->get();
		$dropdowns['rear_brakes'] = RearBrake::where('category_id', 1)->get();
		$dropdowns['key_features'] = KeyFeature::where('category_id', 1)->get();
		$dropdowns['interior_features'] = InteriorFeature::all();
		$dropdowns['exterior_features'] = ExteriorFeature::all();
		$dropdowns['safety_securities'] = SafetySecurity::all();
		$dropdowns['additional_features'] = AdditionalFeature::all();
		$dropdowns['what_a_news'] = WhatANew::all();
		$dropdowns['pros_conses'] = ProsCons::all();
		$car = Car::find($id);
		$dropdowns['car'] = $car;
		if(isset($car->key_feature))
			$car->key_feature = explode(',', $car->key_feature);
		if(isset($car->exterior_feature))
			$car->exterior_feature = explode(',', $car->exterior_feature);
		if(isset($car->interior_feature))
			$car->interior_feature = explode(',', $car->interior_feature);
		if(isset($car->safety_security))
			$car->safety_security = explode(',', $car->safety_security);
		if(isset($car->additional_feature))
			$car->additional_feature = explode(',', $car->additional_feature);
        return view('backend.products.cars.create', $dropdowns);
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
		if(isset($data['exterior_feature']))
			$data['exterior_feature'] = implode(',', $data['exterior_feature']);
		if(isset($data['interior_feature']))
			$data['interior_feature'] = implode(',', $data['interior_feature']);
		if(isset($data['safety_security']))
			$data['safety_security'] = implode(',', $data['safety_security']);
		if(isset($data['additional_feature']))
			$data['additional_feature'] = implode(',', $data['additional_feature']);
		if(!isset($data['loan_availability']))
			$data['loan_availability'] = 0;
		for($i=1; $i<=10; $i++) {
			$file = $request->file('image'.$i);
			if($file) {
				$destination_path = 'assets/products/cars';
				$new_name = $id.'-image'.$i.'.'.$file->getClientOriginalExtension();
				$file->move($destination_path, $new_name);
				$data['image'.$i] = $new_name;
			}
		}
		Car::find($id)->update($data);
		return redirect(route('cars.index'))->with('message', 'Car updated successfully');
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

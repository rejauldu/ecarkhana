<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Product;
use App\Color;
use App\Car;
use App\User;
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
use App\Dropdowns\AfterSellService;
use App\Dropdowns\Ownership;
use App\Locations\Division;

class CarController extends Controller {

    public function __construct() {
        $this->middleware('moderator:Product', ['except' => ['index', 'show', 'sell']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $products = Product::select('products.*')->has('car')->with('car', 'brand', 'supplier.region');
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
        if ($request->body_type && $request->body_type != 'All Bike Types') {
            $products = $products->whereHas('car.body_type', function(Builder $q) use($request) {
                $q->whereRaw("upper(name) like '%" . strtoupper($request->body_type) . "%'");
            });
            $data['body_type'] = $request->body_type;
        }
        if ($request->msrp) {
            $products = $products->where('msrp', $request->msrp);
            $data['msrp'] = $request->msrp;
        }
        /* Car list left filter */
        if (Input::get('conditions')) {
            $conditions = explode('-and-', Input::get('conditions'));
            $condition = array_shift($conditions);
            $products = $products->whereHas('condition', function($q) use($condition) {
                $q->where('name', str_replace('-', ' ', $condition));
            });
            foreach ($conditions as $condition) {
                $products = $products->orWhereHas('condition', function($q) use($condition) {
                    $q->where('name', str_replace('-', ' ', $condition));
                });
            }
            $data['condition_search'] = Input::get('conditions');
        }
        if (Input::get('body-types')) {
            $body_types = explode('-and-', Input::get('body-types'));
            $body_type = array_shift($body_types);
            $products = $products->whereHas('car', function($q) use($body_type) {
                $q->whereHas('body_type', function($query) use($body_type) {
                    $query->where('name', str_replace('-', ' ', $body_type));
                });
            });
            foreach ($body_types as $body_type) {
                $products = $products->orWhereHas('car', function($q) use($body_type) {
                    $q->whereHas('body_type', function($query) use($body_type) {
                        $query->where('name', str_replace('-', ' ', $body_type));
                    });
                });
            }
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
            $model = array_shift($models);
            $products = $products->whereHas('model', function($q) use($model) {
                $q->where('name', str_replace('-', ' ', $model));
            });
            foreach ($models as $model) {
                $products = $products->orWhereHas('model', function($q) use($model) {
                    $q->where('name', str_replace('-', ' ', $model));
                });
            }
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
        /* Car list left filter ends */
        if ($request->fuel_type && $request->fuel_type != 'All Fuel Types') {
            $products = $products->whereHas('car.fuel_type', function(Builder $q) use($request) {
                $q->whereRaw("upper(name) like '%" . strtoupper($request->fuel_type) . "%'");
            });
            $data['fuel_type'] = $request->fuel_type;
        }
        if ($request->price && $request->price != 'Any Price') {
            $prices = explode("-", $request->price);
            $products = $products->where('msrp', '>', $prices[0])->where('msrp', '<', $prices[1]);
            $data['price'] = $request->price;
            $data['minimum_price'] = $prices[0];
            $data['maximum_price'] = $prices[1];
        }
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
        $data['brands'] = Brand::where('category_id', 1)->with('models')->get();
        $data['models'] = Model::where('category_id', 1)->with('brand')->get();
        $data['body_types'] = BodyType::where('category_id', 1)->get();
        $data['fuel_types'] = FuelType::where('category_id', 1)->get();
        $data['packages'] = Package::where('category_id', 1)->with('model')->get();
        $data['suppliers'] = User::where('user_type_id', 2)->orWhere('user_type_id', 3)->take(15)->get();
        $data['type'] = 'Car';
        return view('backend.products.cars.index', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manageIndex() {
        $cars = Car::with('brand', 'model', 'package')->orderBy('id', 'desc')->get();
        return view('backend.products.cars.manage-index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $dropdowns['colors'] = Color::all();
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
    public function store(Request $request) {
        $data = $request->except('_token', '_method');
        if (isset($data['key_feature']))
            $data['key_feature'] = implode(',', $data['key_feature']);
        if (isset($data['exterior_feature']))
            $data['exterior_feature'] = implode(',', $data['exterior_feature']);
        if (isset($data['interior_feature']))
            $data['interior_feature'] = implode(',', $data['interior_feature']);
        if (isset($data['safety_security']))
            $data['safety_security'] = implode(',', $data['safety_security']);
        if (isset($data['additional_feature']))
            $data['additional_feature'] = implode(',', $data['additional_feature']);
        if (isset($data['what_a_new']))
            $data['what_a_new'] = implode(',', $data['what_a_new']);
        if (isset($data['pros_cons']))
            $data['pros_cons'] = implode(',', $data['pros_cons']);
        $car = Car::create($data);
        $panorama = $request->file('panorama');
        if ($panorama) {
            $destination_path = 'assets/products/cars/'.$car->id;
            $new_name = 'panorama' . '.jpg';
            $panorama->move($destination_path, $new_name);
        }
        $files = $request->file('360');
        for ($i = 0; $i < count($files); $i++) {
            $file = $files[$i];
            if ($file) {
                $destination_path = 'assets/products/cars/'.$car->id;
                $new_name = ($i+1) . '.' . $file->getClientOriginalExtension();
                $file->move($destination_path, $new_name);
            }
        }
        
        return redirect(route('cars.manage-cars'))->with('message', 'Car created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $product = Product::has('car')
                ->with('condition', 'auction_grade', 'brand', 'model', 'car.body_type', 'car.package', 'car.displacement', 'car.ground_clearance', 'car.drive_type', 'car.engine_type', 'car.fuel_type', 'car.condition', 'car.transmission', 'car.selling_capacity', 'car.gear_box', 'car.wheel_base', 'car.cylinder', 'car.wheel_type', 'car.tyre_type', 'car.front_brake', 'car.rear_brake', 'supplier', 'comments.sub_comments', 'comments.user', 'comments.sub_comments.user', 'reviews', 'supplier.region', 'supplier.division', 'supplier.user_type')
                ->where('id', $id)
                ->first();
        $key_features = KeyFeature::where('category_id', 1)->get();
        $interior_features = InteriorFeature::all();
        $exterior_features = ExteriorFeature::all();
        $safety_securities = SafetySecurity::all();
        $additional_features = AdditionalFeature::all();
        $after_sell_services = AfterSellService::where('category_id', 1)->get();
        $related_products = Product::whereHas('car', function($q) use($product) {
                    $q->where('brand_id', $product->car->brand_id);
                })
                ->with('car', 'brand', 'model', 'car.displacement', 'car.fuel_type', 'supplier.region', 'supplier.division')
                ->take(10)
                ->get();
        $product->after_sell_service = explode(',', $product->after_sell_service);
        return view('backend.products.cars.show', compact('product', 'key_features', 'interior_features', 'exterior_features', 'safety_securities', 'additional_features', 'after_sell_services', 'related_products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $dropdowns['colors'] = Color::all();
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
        if (isset($car->key_feature))
            $car->key_feature = explode(',', $car->key_feature);
        if (isset($car->exterior_feature))
            $car->exterior_feature = explode(',', $car->exterior_feature);
        if (isset($car->interior_feature))
            $car->interior_feature = explode(',', $car->interior_feature);
        if (isset($car->safety_security))
            $car->safety_security = explode(',', $car->safety_security);
        if (isset($car->additional_feature))
            $car->additional_feature = explode(',', $car->additional_feature);
        if (isset($car->what_a_new))
            $car->what_a_new = explode(',', $car->what_a_new);
        if (isset($car->pros_cons))
            $car->pros_cons = explode(',', $car->pros_cons);
        return view('backend.products.cars.create', $dropdowns);
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
        if (isset($data['exterior_feature']))
            $data['exterior_feature'] = implode(',', $data['exterior_feature']);
        if (isset($data['interior_feature']))
            $data['interior_feature'] = implode(',', $data['interior_feature']);
        if (isset($data['safety_security']))
            $data['safety_security'] = implode(',', $data['safety_security']);
        if (isset($data['additional_feature']))
            $data['additional_feature'] = implode(',', $data['additional_feature']);
        if (!isset($data['loan_availability']))
            $data['loan_availability'] = 0;
        if (isset($data['what_a_new']))
            $data['what_a_new'] = implode(',', $data['what_a_new']);
        if (isset($data['pros_cons']))
            $data['pros_cons'] = implode(',', $data['pros_cons']);
        $panorama = $request->file('panorama');
        if ($panorama) {
            $destination_path = 'assets/products/cars/'.$id;
            $new_name = 'panorama' . '.jpg';
            $panorama->move($destination_path, $new_name);
        }
        $files = $request->file('360');
        for ($i = 0; $i < count($files); $i++) {
            $file = $files[$i];
            if ($file) {
                $destination_path = 'assets/products/cars/'.$id;
                $new_name = ($i+1) . '.' . $file->getClientOriginalExtension();
                $file->move($destination_path, $new_name);
            }
        }
        Car::find($id)->update($data);
        return redirect(route('cars.manage-cars'))->with('message', 'Car updated successfully');
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
        $brands = Brand::where('category_id', 1)->get();
        $models = Model::where('category_id', 1)->get();
        $packages = Package::where('category_id', 1)->get();
        $divisions = Division::all();
        $ownerships = Ownership::all();
        return view('backend.products.cars.sell', compact('brands', 'models', 'packages', 'divisions', 'ownerships'));
    }

}
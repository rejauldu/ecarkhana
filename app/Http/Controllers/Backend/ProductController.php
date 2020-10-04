<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Auth;
use App\Product;
use App\Dropdowns\Ownership;
use App\Car;
use App\Motorcycle;
use App\Bicycle;
use App\Category;
use App\Dropdowns\AuctionGrade;
use App\Dropdowns\Brand;
use App\Dropdowns\Model;
use App\Dropdowns\BodyType;
use App\Dropdowns\FuelType;
use App\Dropdowns\Package;
use App\Dropdowns\Condition;
use App\Color;
use App\Size;
use App\Dropdowns\AfterSellService;
use App\Http\Requests\ProductRequest;
use App\User;
use App\Http\Controllers\Backend\CarController;
use App\Http\Controllers\Backend\MotorcycleController;
use App\Http\Controllers\Backend\BicycleController;

class ProductController extends Controller {

    public function __construct() {
        $this->middleware('moderator:Product', ['except' => ['store', 'getProduct', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $products = Product::with('brand', 'supplier.region');
        $filters = [];
        if ($request->condition) {
            $products = $products->whereHas('condition', function (Builder $q) use($request) {
                $q->whereRaw('lower(name) like "%' . strtolower($request->condition) . '%"');
            });
            $data['condition'] = $request->condition;
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
        }
        if ($request->body_type && $request->body_type != 'All Body Types') {
            $products = $products->whereHas('car.body_type', function(Builder $query) use($request) {
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
                $q->whereHas('body_type', function($q) use($body_type) {
                    $q->where('name', str_replace('-', ' ', $body_type));
                });
            });
            foreach ($body_types as $body_type) {
                $products = $products->orWhereHas('car', function($q) use($body_type) {
                    $q->whereHas('body_type', function($q) use($body_type) {
                        $q->where('name', str_replace('-', ' ', $body_type));
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
            $products = $products->whereHas('car.fuel_type', function(Builder $query) use($request) {
                $q->whereRaw("upper(name) like '%" . strtoupper($request->fuel_type) . "%'");
            });
            $data['fuel_type'] = $request->fuel_type;
        }
        if ($request->package && $request->package != 'All Packages') {
            $products = $products->whereHas('car.package', function(Builder $query) use($request) {
                $q->whereRaw("upper(name) like '%" . strtoupper($request->package) . "%'");
            });
            $data['package'] = $request->package;
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
        return view('backend.products.index', $data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manageIndex() {
        $products = Product::with('category')->orderBy('id', 'desc')->get();
        return view('backend.products.manage-index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $dropdowns['categories'] = Category::all();
        $dropdowns['brands'] = Brand::all();
        $dropdowns['models'] = Model::all();
        $dropdowns['packages'] = Package::all();
        $dropdowns['conditions'] = Condition::all();
        $dropdowns['colors'] = Color::all();
        $dropdowns['sizes'] = Size::all();
        $dropdowns['after_sell_services'] = AfterSellService::with('category')->get();
        $dropdowns['auction_grades'] = AuctionGrade::all();
        $dropdowns['ownerships'] = Ownership::all();

        return view('backend.products.create', $dropdowns);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request) {
        $data = $request->except('_token', '_method');
        if ($request->after_sell_service)
            $data['after_sell_service'] = implode(',', $data['after_sell_service']);
        if (Auth::check())
            $data['user_id'] = Auth::user()->id;
        if (!$request->name) {
            $brand = Brand::find($request->brand_id);
            $model = Model::find($request->brand_id);
            $data['name'] = $brand->name . ' ' . $model->name . ' ' . $request->manufacturing_year;
        }
        $product = Product::create($data);
        $data = $this->handleImage($request, $data, $product->id);
        $id = $this->getProductDetailId($data);
        $category = Category::find($request->category_id);
        $data[strtolower($category->name) . '_id'] = $id;

        Product::find($product->id)->update($data);
        return redirect(route('products.manage-index'))->with('message', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $product = Product::find($id);
        if($product->category_id == 1) {
            return (new CarController)->show($id);
        } elseif ($product->category_id == 2) {
            return (new MotorcycleController)->show($id);
        } elseif ($product->category_id == 3) {
            return (new BicycleController)->show($id);
        }
        return redirect(route('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $dropdowns['categories'] = Category::all();
        $dropdowns['brands'] = Brand::all();
        $dropdowns['models'] = Model::all();
        $dropdowns['packages'] = Package::all();
        $dropdowns['conditions'] = Condition::all();
        $dropdowns['colors'] = Color::all();
        $dropdowns['sizes'] = Size::all();
        $dropdowns['after_sell_services'] = AfterSellService::all();
        $dropdowns['auction_grades'] = AuctionGrade::all();
        $dropdowns['ownerships'] = Ownership::all();
        $product = Product::with('condition', 'brand', 'model', 'package')->where('id', $id)->first();
        if (isset($product->after_sell_service))
            $product->after_sell_service = explode(',', $product->after_sell_service);
        $dropdowns['product'] = $product;

        $images = [];
        for ($i = 0; $i < 36; $i++) {
            $j = $i + 1;
            $object = new \stdClass();
            $name = 'image' . $j;
            $object->src = url('/') . '/assets/products/' . $product->id . '/' . $product->$name;
            if ($product->$name)
                $images[] = $object;
        }
        $dropdowns['images'] = json_encode($images);


        return view('backend.products.create', $dropdowns);
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
        $data = $this->handleImage($request, $data, $id);
        $id = $this->getProductDetailId($data);
        $category = Category::find($request->category_id);
        $data[strtolower($category->name) . '_id'] = $id;

        $product = Product::find($request->id);
        if (isset($data['after_sell_service']))
            $data['after_sell_service'] = implode(',', $data['after_sell_service']);
        $product->update($data);
        return redirect()->back();
        //return redirect(route('products.index'))->with('message', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $product = Product::find($id);
        $request->delete();
        return redirect()->back()->with('message', 'Product has been deleted');
    }

    public function handleImage($request, $data, $id) {
        //Upload new image to server
        $serial = explode(',', $request->image_serial);
        $image_names = [];
        for ($i = 0; $i < 36; $i++) {
            if (isset($request->images[$i]) && $request->images[$i]) {
                $image = $request->file('images.' . $i);
                $main_img = ($i + 1) . '.' . $image->getClientOriginalExtension();

                $image->move(public_path('assets/products/' . $id), $main_img);
                $image_names[] = $main_img;
            }
        }
        //if images deleted
        $exist = 0;
        for ($i = 0; $i < 36; $i++) {
            $j = $i + 1;
            $name = 'image' . $j;
            if (isset($request->img[$i])) {
                $array = explode('/', $request->img[$i]);
                $data[$name] = end($array);
                $exist = $j;
            } else {
                @unlink(public_path('assets/products/' . $id . '/') . $request->$name);
                $data[$name] = null;
            }
        }
        //Save image name to database
        for ($i = 0; $i < count($image_names); $i++) {
            $j = $i + $exist + 1;
            $name = 'image' . $j;
            $data[$name] = $image_names[$i];
        }
        return $data;
    }

    public function getProductDetailId($data) {
        if ($data['category_id'] == 1) {
            $product = Car::where('brand_id', $data['brand_id'])
                    ->where('model_id', $data['model_id'])
                    ->where('manufacturing_year', $data['manufacturing_year']);
            if ($data['package_id'])
                $product = $product->where('package_id', $data['package_id']);
            $product = $product->first();
        } elseif ($data['category_id'] == 2) {
            $product = Motorcycle::where('brand_id', $data['brand_id'])
                    ->where('model_id', $data['model_id'])
                    // ->where('manufacturing_year', $data['manufacturing_year'])
                    ->first();
        } elseif ($data['category_id'] == 3) {
            $product = Bicycle::where('brand_id', $data['brand_id'])
                    ->where('model_id', $data['model_id'])
                    // ->where('manufacturing_year', $data['manufacturing_year'])
                    ->first();
        }
        if ($product)
            return $product->id;
        return 0;
    }

    public function auction($id) {
        $product = Product::find($id);
        return view('backend.auctions.create', compact('product'));
    }

    public function auctionStore(Request $request, $id) {
        $data = $request->except('_token', '_method');
        $product = Product::find($id);
        $product->update($data);
        return redirect()->route('products.index')->with('message', 'This product has been added to auction');
    }
    public function getProduct(Request $request) {
        $product = Product::where('brand_id', $request->brand_id)->where('model_id', $request->model_id)->where('package_id', $request->package_id)->with('brand', 'model', 'package')->first();
        return $product;
    }

}

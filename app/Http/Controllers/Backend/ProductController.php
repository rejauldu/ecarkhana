<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
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
use App\Dropdowns\Package;
use App\Dropdowns\Condition;
use App\Color;
use App\Size;
use App\Dropdowns\AfterSellService;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller {

    public function __construct() {
        $this->middleware('moderator:Product', ['except' => ['store', 'getProduct']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $products = Product::with('category')->orderBy('id', 'desc')->get();
        return view('backend.products.index', compact('products'));
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
        $dropdowns['after_sell_services'] = AfterSellService::all();
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
        return redirect(route('products.index'))->with('message', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $product = Product::find($id);
        return view('backend.products.show', compact('product'));
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
        $product = Product::where('category_id', $request->category_id)->where('brand_id', $request->brand_id)->where('model_id', $request->model_id)->where('package_id', $request->package_id)->with('brand', 'model', 'package')->first();
        return $product;
    }

}

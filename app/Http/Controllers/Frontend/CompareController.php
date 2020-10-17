<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Dropdowns\KeyFeature;
use App\Dropdowns\InteriorFeature;
use App\Dropdowns\ExteriorFeature;
use App\Dropdowns\SafetySecurity;
use App\Dropdowns\AdditionalFeature;
use App\Dropdowns\Brand;
use App\Dropdowns\Model;
use App\Dropdowns\Package;

class CompareController extends Controller
{
    public function addToCompare() {
        $brands = Brand::select('id', 'name')->where('category_id', 1)->get();
        $models = Model::select('id', 'brand_id', 'name')->where('category_id', 1)->get();
        $packages = Package::select('id', 'model_id', 'name')->where('category_id', 1)->get();
        $type = 'Car';
        $products = [];
        $key_features = [];
        return view('frontend.compares.compare-car', compact('brands', 'models', 'packages', 'type', 'products', 'key_features'));
    }
    public function addMotorcycleToCompare() {
        $brands = Brand::select('id', 'name')->where('category_id', 2)->get();
        $models = Model::select('id', 'brand_id', 'name')->where('category_id', 2)->get();
        $packages = Package::select('id', 'model_id', 'name')->where('category_id', 2)->get();
        $type = 'Motorcycle';
        $products = [];
        $key_features = [];
        return view('frontend.compares.compare-motorcycle', compact('brands', 'models', 'packages', 'type', 'products', 'key_features'));
    }
    public function addBicycleToCompare() {
        $brands = Brand::select('id', 'name')->where('category_id', 3)->get();
        $models = Model::select('id', 'brand_id', 'name')->where('category_id', 3)->get();
        $type = 'Bicycle';
        $products = [];
        $key_features = [];
        return view('frontend.compares.compare-bicycle', compact('brands', 'models', 'products', 'type', 'key_features', 'packages'));
    }
    public function compare(Request $request, $url = null) {
        $brands = Brand::select('id', 'category_id', 'name')->get();
        $models = Model::select('id', 'category_id', 'brand_id', 'name')->get();
        $packages = Package::select('id', 'category_id', 'model_id', 'name')->get();
        $data = array_filter(explode("-and-", $url));
        $vehicles = [];
        foreach ($data as $d) {
            $temp = array_filter(explode('-', $d));
            array_push($vehicles, $temp);
        }
        $products = [];
        $category = 'car';
        if (isset($request->category))
            $category = strtolower($request->category);
        $type = ucfirst($category);

        foreach ($vehicles as $vehicle) {

            $v = Product::whereHas('brand', function (Builder $query) use($vehicle) {
                        $query->where('name', $vehicle[0]);
                    });
            if (isset($vehicle[1]))
                $v = $v->whereHas('model', function (Builder $query) use($vehicle) {
                    $query->where('name', $vehicle[1]);
                });
            if (isset($vehicle[2]))
                $v = $v->whereHas('package', function (Builder $query) use($vehicle) {
                    $query->where('name', $vehicle[2]);
                });
            $p = $v->first();
            if ($p->category_id == 1) {
                $v = $v->with('brand', 'model', 'package', $category . '.package', $category . '.body_type', $category . '.displacement', $category . '.ground_clearance', $category . '.drive_type', $category . '.engine_type', $category . '.fuel_type', $category . '.gear_box', $category . '.transmission', $category . '.cylinder', $category . '.wheel_type', $category . '.tyre_type', $category . '.front_brake', $category . '.rear_brake');
            } elseif ($p->category_id == 2) {
                $category = 'motorcycle';
                $v = $v->with('brand', 'model', $category . '.displacement', $category . '.ground_clearance', $category . '.engine_type', $category . '.made_in', $category . '.made_origin', $category . '.starting_system', $category . '.cooling_system', $category . '.condition', $category . '.tyre_type', $category . '.front_brake', $category . '.rear_brake');
            } elseif ($p->category_id == 3) {
                $category = 'bicycle';
                $v = $v->with('brand', 'model', $category . '.wheel_type', $category . '.made_origin', $category . '.tyre_type');
            }
            $v = $v->first();
            if (isset($v->$category->key_feature))
                $v->$category->key_feature = explode(',', $v->$category->key_feature);
            if($category == 'car') {
                if (isset($v->$category->interior_feature))
                    $v->$category->interior_feature = explode(',', $v->$category->interior_feature);
                if (isset($v->$category->exterior_feature))
                    $v->$category->exterior_feature = explode(',', $v->$category->exterior_feature);
                if (isset($v->$category->safety_security))
                    $v->$category->safety_security = explode(',', $v->$category->safety_security);
                if (isset($v->$category->additional_feature))
                    $v->$category->additional_feature = explode(',', $v->$category->additional_feature);
            }
            array_push($products, $v);
        }
        if (isset($p)) {
            $type = ucfirst($category);
            $key_features = KeyFeature::where('category_id', $p->category_id)->get();
            
            if ($p->category_id == 1) {
                $interior_features = InteriorFeature::all();
                $exterior_features = ExteriorFeature::all();
                $safety_securities = SafetySecurity::all();
                $additional_features = AdditionalFeature::all();
                return view('frontend.compares.compare-car', compact('brands', 'models', 'packages', 'products', 'type', 'key_features', 'interior_features', 'exterior_features', 'safety_securities', 'additional_features'));
            } elseif ($p->category_id == 2) {
                return view('frontend.compares.compare-motorcycle', compact('brands', 'models', 'packages', 'products', 'type', 'key_features'));
            } elseif ($p->category_id == 3) {
                return view('frontend.compares.compare-bicycle', compact('brands', 'models', 'products', 'type', 'key_features'));
            }
        }
        return view('frontend.compares.compare-car', compact('brands', 'models', 'packages', 'products', 'type'));
    }
    public function compareProduct(Request $request) {
        $data = $request->except('_token', '_method');
        $product[] = Product::where('id', $data['products'][0])->with('brand', 'model', 'package')->first();
        $product[] = Product::where('id', $data['products'][1])->with('brand', 'model', 'package')->first();
        $product[] = Product::where('id', $data['products'][2])->with('brand', 'model', 'package')->first();
        if(($product[0]->category_id == 1 && $product[1]->category_id == 1 && $product[2]->category_id == 1) || ($product[0]->category_id == 2 && $product[1]->category_id == 2 && $product[2]->category_id == 2) || ($product[0]->category_id == 3 && $product[1]->category_id == 3 && $product[2]->category_id == 3)) {
            if($product[0]->category_id == 3) {
                $path = $product[0]->brand->name.'-'.$product[0]->model->name.'-and-'.$product[1]->brand->name.'-'.$product[1]->model->name.'-and-'.$product[2]->brand->name.'-'.$product[2]->model->name;
                return redirect()->route("compare", $path);
            }

            $path = $product[0]->brand->name.'-'.$product[0]->model->name.'-'.$product[0]->package->name.'-and-'.$product[1]->brand->name.'-'.$product[1]->model->name.'-'.$product[1]->package->name.'-and-'.$product[2]->brand->name.'-'.$product[2]->model->name.'-'.$product[2]->package->name;
            return redirect()->route("compare", $path);
        }
        else {
            return redirect()->route("compare");
        }
    }
}

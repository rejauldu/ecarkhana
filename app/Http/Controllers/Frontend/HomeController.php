<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HomeSlider;
use App\Product;
use App\Car;
use App\Dropdowns\UserType;
use App\Dropdowns\KeyFeature;
use App\Dropdowns\InteriorFeature;
use App\Dropdowns\ExteriorFeature;
use App\Dropdowns\SafetySecurity;
use App\Dropdowns\AdditionalFeature;
use App\Dropdowns\AfterSellService;
use App\Dropdowns\Condition;
use App\LoanApplication;
use App\Comment;
use App\User;
use Carbon\Carbon;
use App\Locations\Division;
use App\Locations\Region;
use Auth;
use App\OrderDetail;
use App\Dropdowns\Brand;
use App\Dropdowns\Model;
use App\Dropdowns\BodyType;
use App\Dropdowns\FuelType;
use App\Dropdowns\Package;
use App\Blog;

class HomeController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $home_sliders = HomeSlider::where('type', 'Car')->get();
        $new_products = Product::has('car')->where('condition_id', 1)->with('car')->take(10)->get();
        $recondition_products = Product::has('car')->where('condition_id', 2)->with('car')->take(10)->get();
        $used_products = Product::has('car')->where('condition_id', 3)->with('car')->take(10)->get();
        $popular_products = Product::has('car')->with('car')->orderBy('view', 'desc')->take(10)->get();
        $suppliers = User::where('user_type_id', 2)->orWhere('user_type_id', 3)->take(15)->get();
        $brands = Brand::where('category_id', 1)->get();
        $models = Model::where('category_id', 1)->get();
        $body_types = BodyType::where('category_id', 1)->get();
        $fuel_types = FuelType::where('category_id', 1)->get();
        $packages = Package::where('category_id', 1)->get();
        $posts = Blog::with('user')->take(2)->get();
        $type = 'Car';
        return view('frontend.index', compact('home_sliders', 'new_products', 'recondition_products', 'used_products', 'popular_products', 'type', 'suppliers', 'brands', 'models', 'body_types', 'fuel_types', 'packages', 'posts'));
    }

    public function motorcycleIndex() {
        $home_sliders = HomeSlider::where('type', 'Motorcycle')->get();
        $new_products = Product::has('motorcycle')->where('condition_id', 1)->with('motorcycle')->take(10)->get();
        $used_products = Product::has('motorcycle')->where('condition_id', 3)->with('motorcycle')->take(10)->get();
        $popular_products = Product::has('motorcycle')->with('motorcycle')->orderBy('view', 'desc')->take(10)->get();
        $suppliers = User::where('user_type_id', 2)->orWhere('user_type_id', 3)->take(15)->get();
        $posts = Blog::with('user')->take(2)->get();
        $type = 'Motorcycle';
        return view('frontend.motorcycle-index', compact('home_sliders', 'new_products', 'used_products', 'popular_products', 'type', 'suppliers', 'posts'));
    }

    public function bicycleIndex() {
        $home_sliders = HomeSlider::where('type', 'Bicycle')->get();
        $new_products = Product::has('bicycle')->where('condition_id', 1)->with('bicycle')->take(10)->get();
        $popular_products = Product::has('bicycle')->with('bicycle')->orderBy('view', 'desc')->take(10)->get();
        $used_products = Product::has('bicycle')->where('condition_id', 3)->with('bicycle', 'bicycle.model', 'bicycle.brand', 'bicycle.fuel_type', 'supplier.division', 'supplier.region')->take(10)->get();
        $suppliers = User::where('user_type_id', 2)->orWhere('user_type_id', 3)->take(15)->get();
        $posts = Blog::with('user')->take(2)->get();
        $type = 'Bicycle';
        return view('frontend.bicycle-index', compact('home_sliders', 'new_products', 'used_products', 'popular_products', 'used_products', 'suppliers', 'type', 'posts'));
    }
    public function aboutUs() {
        return view('frontend.about-us');
    }
    public function addToCompare() {
        return view('frontend.add-to-compare');
    }
    public function auctionBiddingList($id) {
        $product = Product::with(['bids' => function($q) {
                        $q->with('user')->where('valid_until', '<=', Carbon::now())->latest();
                    }])->where('id', $id)->first();

        $bidder_product = Product::with(['bids' => function($q) {
                        $q->where('valid_until', '<=', Carbon::now())->groupBy('user_id')->latest();
                    }])->where('id', $id)->first();
        $remaining = $this->getRemaining($product->auction_to);
        return view('frontend.auction-bidding-list', compact('product', 'bidder_product', 'remaining'));
    }

    public function auctionProductList(Request $request) {
        $products = Product::has('car')->with('car', 'supplier', 'bids');
        if ($request->region_id) {
            $products = $products->whereHas('supplier', function (Builder $query) {
                $query->where('region_id', $request->region_id);
            });
        }
        if ($request->brand_id) {
            $products = $products->whereHas('car', function (Builder $query) {
                $query->where('brand_id', $request->brand_id);
            });
        }
        if ($request->model_id) {
            $products = $products->whereHas('car', function (Builder $query) {
                $query->where('model_id', $request->model_id);
            });
        }
        $products = $products->where('auction_from', '<=', Carbon::now())->where('auction_to', '>=', Carbon::now())->paginate(9);

        $suppliers = User::where('user_type_id', 2)->orWhere('user_type_id', 3)->take(15)->get();
        $type = 'Car';
        $brands = Brand::where('category_id', 1)->get();
        $models = Model::where('category_id', 1)->get();
        $body_types = BodyType::where('category_id', 1)->get();
        $fuel_types = FuelType::where('category_id', 1)->get();
        $packages = Package::where('category_id', 1)->get();
        return view('frontend.auction-product-list', compact('products', 'suppliers', 'type', 'brands', 'models', 'body_types', 'fuel_types', 'packages'));
    }

    public function bicycleCompare() {
        return view('frontend.bicycle-compare');
    }

    public function bicycleFitCalculator() {
        return view('frontend.bicycle-fit-calculator');
    }

    public function carAdPost() {
        return view('frontend.car-ad-post');
    }

    public function carInsurance() {
        return view('frontend.car-insurance');
    }

    public function carListing(Request $request) {
        $products = Product::has('car')->with('car');
        $filters = [];
        if ($request->location) {
            $products = $products->whereHas('supplier', function (Builder $query) use($request) {
                $query->whereHas('region', function(Builder $q) use ($request) {
                    $q->where('name', 'like', '"%' . $request->location . '%"');
                });
            });
            $data['location'] = $request->location;
        }
        if ($request->brand) {
            $products = $products->whereHas('brand', function(Builder $q) use($request) {
                $q->whereRaw("upper(name) like '%" . strtoupper($request->brand) . "%'");
            });
            $data['brand'] = $request->brand;
        }
        if ($request->model) {
            $products = $products->whereHas('model', function(Builder $q) use($request) {
                $q->whereRaw("upper(name) like '%" . strtoupper($request->model) . "%'");
            });
            $data['model'] = $request->model;
        }
        if ($request->body_type) {
            $products = $products->whereHas('body_type', function(Builder $q) use($request) {
                $q->whereRaw("upper(name) like '%" . strtoupper($request->body_type) . "%'");
            });
            $data['body_type'] = $request->body_type;
        }
        if ($request->within_km) {
            $data['within_km'] = $request->within_km;
        }
        if ($request->msrp) {
            $products = $products->where('msrp', $request->msrp);
            $data['msrp'] = $request->msrp;
        }
        if ($request->fuel_type) {
            $products = $products->whereHas('fuel_type', function(Builder $q) use($request) {
                $q->whereRaw("upper(name) like '%" . strtoupper($request->fuel_type) . "%'");
            });
            $data['fuel_type'] = $request->fuel_type;
        }
        if ($request->package) {
            $products = $products->whereHas('package', function(Builder $q) use($request) {
                $q->whereRaw("upper(name) like '%" . strtoupper($request->package) . "%'");
            });
            $data['package'] = $request->package;
        }
	if($request->lat & $request->lon) {
            $products = $products->with(['supplier' => function($q) {
                $q->selectRaw('ROUND(('
                        . '6371'
                        . '* acos( cos( radians(lat) )'
                        . '* cos( radians(23.01) )'
                        . '* cos( radians(90.01) - radians(lon)) + sin(radians(lat))'
                        . '* sin( radians(23.01)))'
                        . '), 3) AS distance');
            }]);
            echo 'hi';
        } else {
            $products = $products->with('supplier');
            echo 'hie';
        }
        $data['products'] = $products->paginate(12);
        dd($data['products'][0]);
        $data['brands'] = Brand::where('category_id', 1)->get();
        $data['models'] = Model::where('category_id', 1)->with('brand')->get();
        $data['body_types'] = BodyType::where('category_id', 1)->get();
        $data['fuel_types'] = FuelType::where('category_id', 1)->get();
        $data['packages'] = Package::where('category_id', 1)->with('model')->get();
        $data['suppliers'] = User::where('user_type_id', 2)->orWhere('user_type_id', 3)->take(15)->get();
        $data['type'] = 'Car';
        return view('frontend.car-listing', $data);
    }

    public function carLoan() {
        $conditions = Condition::all();
        return view('frontend.car-loan', compact('conditions'));
    }

    public function carLoanStore(Request $request) {
        $data = $request->except('_token', '_method');
        LoanApplication::create($data);
        return 'Thank you for your loan application';
    }

    public function carLoanEligibility() {
        return view('frontend.car-loan-eligibility');
    }

    public function carLoanInsuranceCheck() {
        return view('frontend.car-loan-insurance-check');
    }

    public function compareCar(Request $request) {
        $data = $request->except('_token', '_method');
        $product[] = Product::where('id', $data['products'][0])->with('car.brand', 'car.model', 'car.package')->first();
        $product[] = Product::where('id', $data['products'][1])->with('car.brand', 'car.model', 'car.package')->first();
        $product[] = Product::where('id', $data['products'][2])->with('car.brand', 'car.model', 'car.package')->first();
        $product[0]->car->key_feature = explode(',', $product[0]->car->key_feature);
        $product[1]->car->key_feature = explode(',', $product[1]->car->key_feature);
        $product[2]->car->key_feature = explode(',', $product[2]->car->key_feature);
        $key_features = KeyFeature::where('category_id', 1)->get();
        $interior_features = InteriorFeature::all();
        $exterior_features = ExteriorFeature::all();
        $safety_securities = SafetySecurity::all();
        $additional_features = AdditionalFeature::all();
        return view('frontend.compare-car', compact('product', 'key_features'));
    }

    public function contactUs() {
        return view('frontend.contact-us');
    }

    public function dealerDetail($id) {
        $u = User::find($id);
        $related_products = Product::where('supplier_id', $id)
                ->whereNotNull('car_id')
                ->with('car', 'car.brand', 'car.model', 'car.fuel_type', 'supplier.region')
                ->get();
        return view('frontend.dealer-detail', compact('u', 'related_products'));
    }

    public function dealerList() {
        $users = User::where('user_type_id', 2)
                ->with('products')
                ->paginate(10);
        return view('frontend.dealer-list', compact('users'));
    }

    public function groupBuyingList() {
        return view('frontend.group-buying-list');
    }

    public function motorcycleCart() {
        $type = 'Motorcycle';
        return view('frontend.motorcycle-cart', compact('type'));
    }

    public function motorcycleCheckout() {
        $divisions = Division::all();
        $regions = Region::all();
        $type = 'Motorcycle';
        if (Auth::check()) {
            $profile = User::with('billing_division', 'billing_region', 'shipping_division', 'shipping_region')->where('id', Auth::user()->id)->first();
            return view('frontend.motorcycle-checkout', compact('divisions', 'regions', 'type', 'profile'));
        }
        return view('frontend.motorcycle-checkout', compact('divisions', 'regions', 'type'));
    }

    public function motorcycleCompare() {
        return view('frontend.motorcycle-compare');
    }

    public function motorcycleListing() {
        $products = Product::has('motorcycle')->with('brand', 'model')->paginate(20);
        $suppliers = User::where('user_type_id', 2)->orWhere('user_type_id', 3)->take(15)->get();
        $type = 'Motorcycle';
        return view('frontend.motorcycle-listing', compact('products', 'suppliers', 'type'));
    }

    public function motorcycleWishlist() {
        return view('frontend.motorcycle-wishlist');
    }

    public function nationalDistributorDetail($id) {
        $u = User::find($id);
        $related_products = Product::where('supplier_id', $id)
                ->whereNotNull('car_id')
                ->with('car', 'car.brand', 'car.model', 'car.fuel_type', 'supplier.region')
                ->get();
        return view('frontend.national-distributor-detail', compact('u', 'related_products'));
    }

    public function nationalDistributorList() {
        $users = User::where('user_type_id', 3)
                ->with('products')
                ->paginate(10);
        return view('frontend.national-distributor-list', compact('users'));
    }

    public function orderComplete() {
        return view('frontend.order-complete');
    }

    public function privacyPolicy() {
        return view('frontend.privacy-policy');
    }

    public function searchPage(Request $request) {
        $search = '';
        $products = Product::has('car')->with('car', 'supplier');
        if ($request->region_id) {
            $products = $products->whereHas('supplier', function (Builder $query) {
                $query->where('region_id', $request->region_id);
            });
        }
        if ($request->brand_id) {
            $products = $products->whereHas('car', function (Builder $query) {
                $query->where('brand_id', $request->brand_id);
            });
        }
        if ($request->model_id) {
            $products = $products->whereHas('car', function (Builder $query) {
                $query->where('model_id', $request->model_id);
            });
        }
        if ($request->search) {
            $search = $request->search;
            $products = $products->whereHas('car', function (Builder $query) use($search) {
                $query->whereHas('brand', function (Builder $q) use($search) {
                            $q->where('name', $search);
                        })
                        ->orWhereHas('model', function (Builder $q) use($search) {
                            $q->where('name', $search);
                        })
                        ->orWhereHas('package', function (Builder $q) use($search) {
                            $q->where('name', $search);
                        });
            });
        }
        $products = $products->paginate(9);
        $suppliers = User::where('user_type_id', 2)->orWhere('user_type_id', 3)->take(15)->get();
        $type = 'Car';
        return view('frontend.car-listing', compact('products', 'type', 'search', 'suppliers'));
    }

    public function sellerMessage($id) {
        return view('frontend.seller-message');
    }

    public function sellerMyAd($id) {
        $user = User::with('orders.status', 'orders.order_details.product', 'role', 'products.brand', 'products.model', 'products.supplier.region', 'products.supplier.division')->where('id', $id)->first();
        $sell = OrderDetail::whereHas('product', function($q) use($id) {
                            $q->where('supplier_id', $id);
                        })
                        ->whereHas('order', function($q) {
                            $q->where('order_status_id', 4);
                        })
                        ->get()->count();
        return view('frontend.seller-my-ad', compact('user', 'sell'));
    }

    public function sellerProfile($id) {
        $user = User::with('orders.status', 'orders.order_details.product', 'role', 'products', 'division', 'region', 'billing_division', 'billing_region', 'shipping_division', 'shipping_region')->where('id', $id)->first();
        $sell = OrderDetail::whereHas('product', function($q) use($id) {
                            $q->where('supplier_id', $id);
                        })
                        ->whereHas('order', function($q) {
                            $q->where('order_status_id', 4);
                        })
                        ->get()->count();
        $divisions = Division::all();
        $regions = Region::all();
        return view('frontend.seller-profile', compact('user', 'sell', 'divisions', 'regions'));
    }

    public function sellProductList() {
        return view('frontend.sell-product-list');
    }

    public function singleAccessories() {
        return view('frontend.single-accessories');
    }

    public function singleBicycleProduct($id) {
        $product = Product::has('bicycle')
                ->with('bicycle.brand', 'bicycle.model', 'bicycle.wheel_type', 'bicycle.made_origin', 'bicycle.tyre_type', 'supplier', 'comments.sub_comments', 'comments.user', 'comments.sub_comments.user', 'reviews')
                ->where('id', $id)
                ->first();
        $key_features = KeyFeature::where('category_id', 3)->get();
        $after_sell_services = AfterSellService::where('category_id', 3)->get();
        $related_products = Product::whereHas('bicycle', function($q) use($product) {
                    $q->where('brand_id', $product->bicycle->brand_id);
                    //->where('model_id', $product->model_id);
                })
                ->with('bicycle', 'bicycle.brand', 'bicycle.model', 'supplier.region')
                ->get();
        $product->after_sell_service = explode(',', $product->after_sell_service);
        return view('frontend.single-bicycle-product', compact('product', 'key_features', 'after_sell_services', 'related_products'));
    }

    public function singleMotorcycleProduct($id) {
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
        return view('frontend.single-motorcycle-product', compact('product', 'key_features', 'after_sell_services', 'related_products', 'type'));
    }

    public function singleBlog() {
        return view('frontend.single-blog');
    }

    public function singleCarProduct($id) {
        $product = Product::has('car')
                ->with('auction_grade', 'car.brand', 'car.model', 'car.body_type', 'car.package', 'car.displacement', 'car.ground_clearance', 'car.drive_type', 'car.engine_type', 'car.fuel_type', 'car.condition', 'car.transmission', 'car.selling_capacity', 'car.gear_box', 'car.wheel_base', 'car.cylinder', 'car.wheel_type', 'car.tyre_type', 'car.front_brake', 'car.rear_brake', 'supplier', 'comments.sub_comments', 'comments.user', 'comments.sub_comments.user', 'reviews')
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
                    //->where('model_id', $product->model_id);
                })
                ->with('car', 'car.brand', 'car.model', 'car.fuel_type', 'supplier.region')
                ->get();
        $product->after_sell_service = explode(',', $product->after_sell_service);
        return view('frontend.single-car-product', compact('product', 'key_features', 'interior_features', 'exterior_features', 'safety_securities', 'additional_features', 'after_sell_services', 'related_products'));
    }

    public function singleSellProduct($id) {
        $product = Product::has('car')
                ->with('auction_grade', 'car.brand', 'car.model', 'car.body_type', 'car.package', 'car.displacement', 'car.ground_clearance', 'car.drive_type', 'car.engine_type', 'car.fuel_type', 'car.condition', 'car.transmission', 'car.selling_capacity', 'car.gear_box', 'car.wheel_base', 'car.cylinder', 'car.wheel_type', 'car.tyre_type', 'car.front_brake', 'car.rear_brake', 'supplier', 'comments.sub_comments', 'comments.user', 'comments.sub_comments.user', 'reviews')
                ->where('id', $id)
                ->first();
        $key_features = KeyFeature::where('category_id', 1)->get();
        $interior_features = InteriorFeature::all();
        $exterior_features = ExteriorFeature::all();
        $safety_securities = SafetySecurity::all();
        $additional_features = AdditionalFeature::all();
        $after_sell_services = AfterSellService::all();
        $related_products = Product::whereHas('car', function($q) use($product) {
                    $q->where('brand_id', $product->car->brand_id);
                    //->where('model_id', $product->model_id);
                })
                ->with('car', 'car.brand', 'car.model', 'car.fuel_type', 'supplier.region')
                ->get();
        $product->after_sell_service = explode(',', $product->after_sell_service);
        $today = strtotime(date("Y-m-d"));
        $from = strtotime($product->auction_from);
        $to = strtotime($product->auction_to);
        $auction = false;
        if ($from <= $today && $to >= $today)
            $auction = true;
        return view('frontend.single-car-product', compact('product', 'key_features', 'interior_features', 'exterior_features', 'safety_securities', 'additional_features', 'after_sell_services', 'related_products', 'auction'));
    }

    public function termAndCondition() {
        return view('frontend.term-and-condition');
    }

    private function getRemaining($datestr = 0) {
        //Convert to date
        $date = strtotime($datestr); //Converted to a PHP date (a second count)
        //Calculate difference
        $diff = $date - time(); //time returns current time in seconds
        $days = floor($diff / (60 * 60 * 24)); //seconds/minute*minutes/hour*hours/day)
        $hours = floor(($diff - $days * 60 * 60 * 24) / (60 * 60));
        $minutes = floor(($diff - $days * 60 * 60 * 24 - $hours * 60 * 60) / 60);
        $seconds = $diff - $days * 60 * 60 * 24 - $hours * 60 * 60 - $minutes * 60;

        //Report
        return [$days, $hours, $minutes, $seconds];
    }

}
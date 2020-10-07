<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HomeSlider;
use App\VersusSlider;
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
use App\Dropdowns\BicycleType;
use App\Dropdowns\BikerGender;
use App\Dropdowns\FuelType;
use App\Dropdowns\Package;
use App\Dropdowns\Displacement;
use App\Dropdowns\Ownership;
use App\Blog;
use App\Otp;
use App\Advertisement;

class HomeController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $home_sliders = HomeSlider::where('type', 'Car')->get();
        $versus_sliders = VersusSlider::where('category_id', 1)->with('product1.brand', 'product2.brand')->get();
        $advertisements = Advertisement::where('category_id', 1)->with('category')->get();
        $new_products = Product::has('car')->where('condition_id', 1)->with('brand', 'car', 'supplier.region')->take(10)->get();
        $recondition_products = Product::has('car')->where('condition_id', 2)->with('brand', 'car', 'supplier.region', 'supplier.division')->take(10)->get();
        $used_products = Product::has('car')->where('condition_id', 3)->with('brand', 'model', 'car.fuel_type', 'supplier.region', 'supplier.division')->take(10)->get();
        $popular_products = Product::has('car')->with('brand', 'car', 'supplier.region')->orderBy('view', 'desc')->take(10)->get();
        $suppliers = User::where('user_type_id', 2)->orWhere('user_type_id', 3)->take(15)->get();
        $brands = Brand::where('category_id', 1)->get();
        $models = Model::where('category_id', 1)->with('brand')->get();
        $body_types = BodyType::where('category_id', 1)->get();
        $fuel_types = FuelType::where('category_id', 1)->get();
        $packages = Package::where('category_id', 1)->with('model')->get();
        $posts = Blog::with('user')->take(2)->get();
        $type = 'Car';
        return view('frontend.index', compact('home_sliders', 'versus_sliders', 'advertisements', 'new_products', 'recondition_products', 'used_products', 'popular_products', 'type', 'suppliers', 'brands', 'models', 'body_types', 'fuel_types', 'packages', 'posts'));
    }

    public function motorcycleIndex() {
        $home_sliders = HomeSlider::where('type', 'Motorcycle')->get();
        $versus_sliders = VersusSlider::where('category_id', 2)->with('product1.brand', 'product2.brand')->get();
        $advertisements = Advertisement::where('category_id', 2)->with('category')->get();
        $new_products = Product::has('motorcycle')->where('condition_id', 1)->with('brand', 'motorcycle.displacement', 'supplier.region', 'supplier.division')->take(10)->get();
        $used_products = Product::has('motorcycle')->where('condition_id', 3)->with('brand', 'model', 'motorcycle.made_origin', 'supplier.region', 'supplier.division')->take(10)->get();
        $popular_products = Product::has('motorcycle')->with('brand', 'motorcycle', 'supplier.region')->orderBy('view', 'desc')->take(10)->get();
        $suppliers = User::where('user_type_id', 2)->orWhere('user_type_id', 3)->take(15)->get();
        $brands = Brand::where('category_id', 2)->get();
        $models = Model::where('category_id', 2)->with('brand')->get();
        $body_types = BodyType::where('category_id', 2)->get();
        $displacements = Displacement::where('category_id', 2)->get();
        $packages = Package::where('category_id', 2)->with('model')->get();
        $posts = Blog::with('user')->take(2)->get();
        $type = 'Motorcycle';
        return view('frontend.motorcycle-index', compact('home_sliders', 'versus_sliders', 'advertisements', 'new_products', 'used_products', 'popular_products', 'type', 'suppliers', 'brands', 'models', 'body_types', 'displacements', 'packages', 'posts'));
    }

    public function bicycleIndex() {
        $home_sliders = HomeSlider::where('type', 'Bicycle')->get();
        $versus_sliders = VersusSlider::where('category_id', 3)->with('product1.brand', 'product2.brand')->get();
        $advertisements = Advertisement::where('category_id', 3)->with('category')->get();
        $new_products = Product::has('bicycle')->where('condition_id', 1)->with('brand', 'bicycle.made_origin', 'supplier.region', 'supplier.division')->take(10)->get();
        $popular_products = Product::has('bicycle')->with('brand', 'bicycle', 'supplier.region')->orderBy('view', 'desc')->take(10)->get();
        $used_products = Product::has('bicycle')->where('condition_id', 3)->with('brand', 'model', 'bicycle.made_origin', 'supplier.region', 'supplier.division')->take(10)->get();
        $suppliers = User::where('user_type_id', 2)->orWhere('user_type_id', 3)->take(15)->get();
        $brands = Brand::where('category_id', 3)->get();
        $models = Model::where('category_id', 3)->with('brand')->get();
        $bicycle_types = BicycleType::all();
        $biker_genders = BikerGender::all();
        $posts = Blog::with('user')->take(2)->get();
        $type = 'Bicycle';
        return view('frontend.bicycle-index', compact('home_sliders', 'versus_sliders', 'advertisements', 'new_products', 'used_products', 'popular_products', 'used_products', 'suppliers', 'brands', 'models', 'bicycle_types', 'biker_genders', 'type', 'posts'));
    }

    public function aboutUs() {
        return view('frontend.about-us');
    }

    public function insuranceList() {
        return view('frontend.insurance-list');
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

    public function bicycleCompare() {
        return view('frontend.bicycle-compare');
    }

    public function bicycleFitCalculator() {
        return view('frontend.bicycle-fit-calculator');
    }

    public function carLoan() {
        $conditions = Condition::all();
        $divisions = Division::all();
        $regions = Region::all();
        return view('frontend.car-loan', compact('conditions', 'divisions', 'regions'));
    }

    public function carLoanStore(Request $request) {
        $data = $request->except('_token', '_method');
        LoanApplication::create($data);
        return 'Thank you for your loan application';
    }

    public function carLoanEligibility() {
        return view('frontend.car-loan-eligibility');
    }
    public function contactUs() {
        return view('frontend.contact-us');
    }
    public function faq() {
        return view('frontend.faq');
    }
    public function groupBuyingList() {
        return view('frontend.group-buying-list');
    }

    public function cart() {
        $type = 'Motorcycle';
        return view('frontend.cart', compact('type'));
    }

    public function checkout() {
        $divisions = Division::all();
        $regions = Region::all();
        $type = 'Motorcycle';
        if (Auth::check()) {
            $profile = User::with('billing_division', 'billing_region', 'shipping_division', 'shipping_region')->where('id', Auth::user()->id)->first();
            return view('frontend.motorcycle-checkout', compact('divisions', 'regions', 'type', 'profile'));
        }
        return view('frontend.checkout', compact('divisions', 'regions', 'type'));
    }

    public function motorcycleCompare() {
        return view('frontend.motorcycle-compare');
    }

    public function motorcycleWishlist() {
        return view('frontend.motorcycle-wishlist');
    }
    public function orderComplete() {
        return view('frontend.order-complete');
    }

    public function privacyPolicy() {
        return view('frontend.privacy-policy');
    }
    public function promotion() {
        return view('frontend.promotion');
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

    

    public function sellProductList() {
        $search = '';
        $products = Product::has('motorcycle')->orHas('bicycle')->with('motorcycle', 'bicycle', 'supplier');
        $products = $products->paginate(9);
        $suppliers = User::where('user_type_id', 2)->orWhere('user_type_id', 3)->take(15)->get();
        $type = 'Motorcycle';
        return view('frontend.sell-product-list', compact('products', 'suppliers', 'type'));
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
        $today = strtotime(date("Y-m-d"));
        $from = strtotime($product->auction_from);
        $to = strtotime($product->auction_to);
        $auction = false;
        if ($from <= $today && $to >= $today)
            $auction = true;
        return view('frontend.single-bicycle-product', compact('product', 'key_features', 'after_sell_services', 'related_products', 'auction'));
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
        $today = strtotime(date("Y-m-d"));
        $from = strtotime($product->auction_from);
        $to = strtotime($product->auction_to);
        $auction = false;
        if ($from <= $today && $to >= $today)
            $auction = true;
        return view('frontend.single-motorcycle-product', compact('product', 'key_features', 'after_sell_services', 'related_products', 'type', 'auction'));
    }

    public function singleBlog() {
        return view('frontend.single-blog');
    }

    public function singleCarProduct($id) {
        $product = Product::has('car')
                ->with('auction_grade', 'car.brand', 'car.model', 'car.body_type', 'car.package', 'car.displacement', 'car.ground_clearance', 'car.drive_type', 'car.engine_type', 'car.fuel_type', 'car.condition', 'car.transmission', 'car.selling_capacity', 'car.gear_box', 'car.wheel_base', 'car.cylinder', 'car.wheel_type', 'car.tyre_type', 'car.front_brake', 'car.rear_brake', 'supplier', 'comments.sub_comments', 'comments.user', 'comments.sub_comments.user', 'reviews', 'region.division')
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

    public function product($id) {
        $product = Product::find($id);
        if($product->category_id == 1)
            return $this->singleCarProduct($id);
        elseif($product->category_id == 2)
            return $this->singleMotorcycleProduct($id);
        elseif($product->category_id == 3)
            return $this->singleBicycleProduct($id);
    }

    public function termAndCondition() {
        return view('frontend.term-and-condition');
    }

    public function getRegions(Request $request) {
        $regions = '';
        if ($request->division)
            $regions = Region::select('id', 'name', 'division_id')->whereHas('division', function($q) use($request) {
                        $q->where('name', $request->division);
                    })->get();
        else
            $regions = Region::select('id', 'name')->where('name', 'like', '%' . $request->q . '%')->take(10)->get();
        return (string) $regions;
    }

    public function getRegion(Request $request) {
        $regions = Region::with('division')->selectRaw('*, ROUND(('
                        . '6371'
                        . '* acos( cos( radians(lat) )'
                        . '* cos( radians(' . $request->lat . ') )'
                        . '* cos( radians(' . $request->lon . ') - radians(lon)) + sin(radians(lat))'
                        . '* sin( radians(' . $request->lat . ')))'
                        . '), 3) AS distance')
                ->orderBy('distance', 'ASC');
        $region = $regions->first();
        return (string) $region;
    }

    

    public function sendOtp(Request $request) {
        $data = $request->except('_token', '_method');
        $otp = $this->getOtp();
        $data['otp'] = $otp;
        $this->curlSms($request->phone, $otp);
        Otp::create($data);
        return 'success';
    }

    public function verifyOtp(Request $request) {
        $otp = Otp::where('phone', $request->phone)->where('otp', $request->otp)->where('created_at', '>', Carbon::now()->subSeconds(60)->toDateTimeString())->first();

        if ($otp) {
            $otp->update(['is_verified' => 1]);
            return 'success';
        } else
            return 'error';
    }

    private function getOtp() {
        $digits = 4;
        return rand(pow(10, $digits - 1), pow(10, $digits) - 1);
    }

    private function curlSms($phone, $otp) {
        $m = $otp . ' is your Ecarkhana Phone number verification code.';
        // create curl resource
        $ch = curl_init();
        // set url
        curl_setopt($ch, CURLOPT_URL, "http://sms.storerepublic.com/smsapi?api_key=C20064485f2f9445414b55.34412796&type=text&contacts='.$phone.'&senderid=8809612446209&msg=" . $this->myUrlEncode($m));
        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // $output contains the output string
        $output = curl_exec($ch);
        // close curl resource to free up system resources
        curl_close($ch);
    }

    private function myUrlEncode($string) {
        $entities = array('%21', '%2A', '%27', '%28', '%29', '%3B', '%3A', '%40', '%26', '%3D', '%2B', '%24', '%2C', '%2F', '%3F', '%25', '%23', '%5B', '%5D');
        $replacements = array('!', '*', "'", "(", ")", ";", ":", "@", "&", "=", "+", "$", ",", "/", "?", "%", "#", "[", "]");
        return str_replace($entities, $replacements, urlencode($string));
    }

}

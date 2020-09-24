<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bid as Auction;
use Auth;
use App\Product;
use App\Http\Requests\AuctionRequest;
use Carbon\Carbon;
use App\User;
use App\Dropdowns\Brand;
use App\Dropdowns\Model;
use App\Dropdowns\BodyType;
use App\Dropdowns\FuelType;
use App\Dropdowns\Package;

class AuctionController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $products = Product::with('supplier', 'bids');
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
        $type = 'Motorcycle';
        $brands = Brand::where('category_id', 2)->orWhere('category_id', 3)->get();
        $models = Model::where('category_id', 2)->orWhere('category_id', 3)->get();
        $body_types = BodyType::where('category_id', 2)->orWhere('category_id', 3)->get();
        $packages = Package::where('category_id', 2)->orWhere('category_id', 3)->get();
        $fuel_types = FuelType::where('category_id', 2)->orWhere('category_id', 3)->get();
        return view('backend.auctions.index', compact('products', 'suppliers', 'type', 'brands', 'models', 'body_types', 'fuel_types', 'packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('backend.auctions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $data = $request->except('_token', '_method');
        $data['user_id'] = Auth::user()->id;
        $product = Product::with(['bids' => function($q) {
                        $q->with('user')->where('valid_until', '<=', Carbon::now())->orderBy('amount', 'desc');
                    }])->where('id', $request->product_id)->first();
        if ($product->auction_amount >= $request->amount)
            return redirect()->back()->with('amount', 'Bidding amount must be greater than Tk.' . $product->auction_amount);
        if($product->bids[0]->type == 'bid') {
            $this->smsNotify($product);
        } elseif($request->amount > $product->bids[0]->amount) {
            $this->smsNotify($product);
        }

        $product->update(['auction_amount' => $request->amount]);
        Auction::create($data);
        return redirect(route('bids.show', $request->product_id))->with('message', 'Auction created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $auction = Auction::find($id);
        return view('backend.auctions.show', compact('auction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $auction = Auction::find($id);
        return view('backend.auctions.create', compact('auction'));
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
        $auction = Auction::find($id);
        $auction->update($data);

        return redirect(route('auctions.index'))->with('message', 'Auction updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $auction = Auction::find($id);
        $auction->delete();
        return redirect()->back()->with('message', 'Auction has been deleted');
    }

    private function smsNotify($product) {
        $this->curlSms($product);
    }
    private function curlSms($product) {
        $m = 'Another interested buyer has placed a bid at BDT '.$product->bids[0]->amount.' at '.url('/').'/bids/'.$product->id;
        // create curl resource
        $ch = curl_init();
        // set url
        curl_setopt($ch, CURLOPT_URL, "http://sms.storerepublic.com/smsapi?api_key=C20064485f2f9445414b55.34412796&type=text&contacts=".$product->bids[0]->user->phone."&senderid=8809612446209&msg=" . $this->myUrlEncode($m));
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

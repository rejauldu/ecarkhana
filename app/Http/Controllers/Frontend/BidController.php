<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Bid;
use App\Product;
use Carbon\Carbon;

class BidController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $bids = Bid::all();
        return view('frontend.bids.index', compact('bids'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('frontend.bids.create');
    }

    /**
     * This method is called during highest bids but not the normal bids
     */
    public function store(Request $request) {
        $data = $request->except('_token', '_method');
        $data['user_id'] = Auth::user()->id;
        $product = Product::with(['bids' => function($q) {
                        $q->with('user')->where('valid_until', '<=', Carbon::now())->orderBy('amount', 'desc');
                    }])->where('id', $request->product_id)->first();
        if ($product->auction_amount >= $request->amount)
            return redirect()->back()->with('amount', 'Max bidding amount must be greater than Tk.' . $product->auction_amount);
        if($product->bids->count()) {
            if($request->amount > $product->bids[0]->amount) {
                $product->update(['auction_amount' => $product->bids[0]->amount + 1]);
            } elseif($product->bids[0]->type == 'upto' && $request->amount > $product->auction_amount) {
                $product->update(['auction_amount' => $request->amount]);
            }
        }
        $data['type'] = 'upto';
        Bid::create($data);
        return redirect(route('bids.show', $request->product_id))->with('message', 'Auction created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $product = Product::with(['bids' => function($q) {
                        $q->with('user')->where('valid_until', '<=', Carbon::now())->orderBy('amount', 'desc');
                    }])->where('id', $id)->first();
        if($product->bids->count()>1) {
            if($product->bids[0]->type == 'upto' && $product->bids[0]->amount > $product->bids[1]->amount) {
                $product->bids[0]->amount = $product->bids[1]->amount + 1;
            }
        }

        $bidder_product = Product::with(['bids' => function($q) {
                        $q->where('valid_until', '<=', Carbon::now())->groupBy('user_id')->latest();
                    }])->where('id', $id)->first();
        $upto = 0;
        if(Auth::check()) {
            $bid_product = Product::with(['bids' => function($q) {
                        $q->where('valid_until', '<=', Carbon::now())->where('user_id', Auth::user()->id)->where('type', 'upto')->first();
                    }])->where('id', $id)->first();
            $upto = $bid_product->bids[0]->amount;
        }
        
        $remaining = $this->getRemaining($product->auction_to);
        return view('frontend.bids.show', compact('product', 'bidder_product', 'remaining', 'upto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $bid = Bid::find($id);
        return view('frontend.bids.create', compact('bid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $bid = Bid::find($id);
        $bid->delete();
        return redirect()->back()->with('message', 'Bid has been deleted');
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

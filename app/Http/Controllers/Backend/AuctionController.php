<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bid as Auction;
use Auth;
use App\Product;
use App\Http\Requests\AuctionRequest;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$auctions = Auction::orderBy('id', 'desc')->get();
		return view('backend.auctions.index', compact('auctions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('backend.auctions.create');
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
		$data['user_id'] = Auth::user()->id;
		$product = Product::find($request->product_id);
		if($product->auction_amount>=$request->amount)
			return redirect()->back()->with('amount', 'Bidding amount must be greater than ৳ '.$product->auction_amount);
		$product->update(['auction_amount' => $request->amount]);
		Auction::create($data);
		return redirect(route('auction-bidding-list', $request->product_id))->with('message', 'Auction created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $auction = Auction::find($id);
		return view('backend.auctions.show', compact('auction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
    public function update(Request $request, $id)
    {
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
    public function destroy($id)
    {
		$auction = Auction::find($id);
		$auction->delete();
		return redirect()->back()->with('message', 'Auction has been deleted');
    }
}

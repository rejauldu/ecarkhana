<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MakeAnOffer;
use Auth;
use Carbon\Carbon;

class MakeAnOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$user = Auth::user();
		if($user->role_id>1)
			$offers = MakeAnOffer::latest()->get();
		else {
			$offers = MakeAnOffer::where(function($q) use($user) {
				$q->whereHas('product', function (Builder $query) use($user) {
					$query->where('supplier_id', $user->id);
				})
				->orWhere('user_id', $user->id);
			})
			->latest()->get();
		}
		return view('backend.make-an-offers.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
		MakeAnOffer::create($data);
		return 'Offer has been created successfully';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offer = MakeAnOffer::find($id);
		$offer->update(['viewed_at' => Carbon::now()]);
		return view('backend.make-an-offers.show', compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
	public function unviewed()
    {
		$user = Auth::user();
		if($user->role_id>1)
			$offers = MakeAnOffer::whereNull('viewed_at')->latest()->get();
		else {
			$offers = MakeAnOffer::where(function($q) use($user) {
				$q->whereHas('product', function (Builder $query) use($user) {
					$query->where('supplier_id', $user->id);
				})
				->orWhere('user_id', $user->id);
			})
			->whereNull('viewed_at')
			->latest()->get();
		}
		return view('backend.make-an-offers.index', compact('offers'));
    }
}

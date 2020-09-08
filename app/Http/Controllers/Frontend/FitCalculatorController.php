<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\FitCalculator;
use App\FitCalculatorContent;

class FitCalculatorController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('frontend.fit-calculators.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('frontend.fit-calculators.create');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fitCalculator($url = null) {
        if($url) {
            $exploded = array_filter(explode("-and-", $url));
            if(count($exploded) == 5) {
                $contents = FitCalculatorContent::all();
                $data=[];
                $data['gender'] = $exploded[0];
                $data['type'] = $exploded[1];
                $data['measurement'] = $exploded[2];
                $data['discomfort'] = $exploded[3];
                $data['pain'] = $exploded[4];
                $data['contents'] = $contents;
                return view('frontend.fit-calculators.fit-calculator', $data);
            } elseif(count($exploded) == 8) {
                
            } elseif(count($exploded) == 13) {
                
            }
        }
        return view('frontend.fit-calculators.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $user_id = Auth::user()->id;
        $review = Review::where('product_id', $request->product_id)->where('user_id', $user_id)->first();
        if ($review)
            return redirect()->back()->with('message', 'Sorry. We have received your review before.');
        $data = $request->except('_token', '_method');
        $data['user_id'] = $user_id;
        Review::create($data);
        return redirect()->back()->with('message', 'Thank you for your review');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
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
        $review = Review::find($id);
        $review->delete();
        return redirect()->back()->with('message', 'Review has been deleted');
    }

}

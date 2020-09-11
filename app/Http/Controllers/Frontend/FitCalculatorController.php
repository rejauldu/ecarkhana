<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\FitCalculator;
use App\FitCalculatorContent;
use PDF;
use App\Discomfort;

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
        $discomforts = Discomfort::all();
        return view('frontend.fit-calculators.create', compact('discomforts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fitCalculator($url = null) {
        $data=[];
        $data['type'] = 'Bicycle';
        if($url) {
            $exploded = array_filter(explode("-and-", $url));
            if(count($exploded) >= 5) {
                $data['gender'] = $exploded[0];
                $data['bicycle_type'] = $exploded[1];
                $data['measurement'] = $exploded[2];
                $data['discomfort'] = $exploded[3];
                $data['pain'] = $exploded[4];
                if(count($exploded) == 5) {
                    $contents = FitCalculatorContent::all();
                    $data['contents'] = $contents;
                    return view('frontend.fit-calculators.fit-calculator', $data);
                } elseif(count($exploded) == 8) {
                    $data['inseam'] = $exploded[5];
                    $data['arm'] = $exploded[6];
                    $data['height'] = $exploded[7];
                    $data['tab'] = 'basic';
                    return view('frontend.fit-calculators.result', $data);
                } elseif(count($exploded) == 13) {
                    $data['inseam'] = $exploded[5];
                    $data['trunk'] = $exploded[6];
                    $data['forearm'] = $exploded[7];
                    $data['arm'] = $exploded[8];
                    $data['thigh'] = $exploded[9];
                    $data['leg'] = $exploded[10];
                    $data['sternal_notch'] = $exploded[11];
                    $data['height'] = $exploded[12];
                    $data['tab'] = 'advance';
                    return view('frontend.fit-calculators.result', $data);
                }
            }
        }
        $data['discomforts'] = Discomfort::all();
        return view('frontend.fit-calculators.create', $data);
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
    
    public function download($url = null) {
        $data=[];
        if($url) {
            $url = substr($url, 0, -4);
            $exploded = array_filter(explode("-and-", $url));
            if(count($exploded) >= 5) {
                $data['gender'] = $exploded[0];
                $data['bicycle_type'] = $exploded[1];
                $data['measurement'] = $exploded[2];
                $data['discomfort'] = $exploded[3];
                $data['pain'] = $exploded[4];
                $pdf = PDF::loadView('frontend.fit-calculators.fit-result', $data);
                if(count($exploded) == 8) {
                    $data['inseam'] = $exploded[5];
                    $data['arm'] = $exploded[6];
                    $data['height'] = $exploded[7];
                    $data['tab'] = 'basic';
                    return $pdf->download('ecarkhana-bicycle-fit.pdf');
                } elseif(count($exploded) == 13) {
                    $data['inseam'] = $exploded[5];
                    $data['trunk'] = $exploded[6];
                    $data['forearm'] = $exploded[7];
                    $data['arm'] = $exploded[8];
                    $data['thigh'] = $exploded[9];
                    $data['leg'] = $exploded[10];
                    $data['sternal_notch'] = $exploded[11];
                    $data['height'] = $exploded[12];
                    $data['tab'] = 'advance';
                    return $pdf->download('ecarkhana-bicycle-fit.pdf');
                }
            }
        }
        return view('frontend.fit-calculators.create');
    }

}

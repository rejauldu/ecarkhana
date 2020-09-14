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
        $data = [];
        $data['type'] = 'Bicycle';
        $discomforts = Discomfort::all();
        if ($url) {
            $exploded = explode("-and-", $url);
            if (count($exploded) >= 6) {
                $data['gender'] = $exploded[0];
                $data['bicycle_type'] = $exploded[1];
                $data['measurement'] = $exploded[2];
                $data['position'] = $exploded[3];
                $data['discomfort'] = $exploded[4];
                $data['pain'] = $exploded[5];
                if ($data['discomfort'] == 'yes') {
                    foreach ($discomforts as $discomfort) {
                        if (strpos(strtoupper($data['pain']), strtoupper(str_replace(" ", "", $discomfort->name))) !== false) {
                            $data['pain_detail'] = $discomfort;
                            break;
                        }
                    }
                }
                if (count($exploded) == 6) {
                    $contents = FitCalculatorContent::all();
                    $data['contents'] = $contents;
                    return view('frontend.fit-calculators.fit-calculator', $data);
                } elseif (count($exploded) == 9) {
                    $data['inseam'] = $exploded[6];
                    $data['arm'] = $exploded[7];
                    $data['sternal_notch'] = $exploded[8];
                    $data['tab'] = 'basic';
                    $data = $this->getResult($data);
                    return view('frontend.fit-calculators.result', $data);
                } elseif (count($exploded) == 14) {
                    $data['inseam'] = $exploded[6];
                    $data['trunk'] = $exploded[7];
                    $data['forearm'] = $exploded[8];
                    $data['arm'] = $exploded[9];
                    $data['thigh'] = $exploded[10];
                    $data['leg'] = $exploded[11];
                    $data['sternal_notch'] = $exploded[12];
                    $data['height'] = $exploded[13];
                    $data['tab'] = 'advance';
                    $data = $this->getResult($data);
                    return view('frontend.fit-calculators.result', $data);
                }
            }
        }
        $data['discomforts'] = $discomforts;
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
        $data = [];
        $data['type'] = 'Bicycle';
        if ($url) {
            $url = substr($url, 0, -4);
            $exploded = explode("-and-", $url);
            if (count($exploded) >= 6) {
                $data['gender'] = $exploded[0];
                $data['bicycle_type'] = $exploded[1];
                $data['measurement'] = $exploded[2];
                $data['position'] = $exploded[3];
                $data['discomfort'] = $exploded[4];
                $data['pain'] = $exploded[5];
                $pdf = PDF::loadView('frontend.fit-calculators.fit-result', $data);
                if (count($exploded) == 9) {
                    $data['inseam'] = $exploded[6];
                    $data['arm'] = $exploded[7];
                    $data['sternal_notch'] = $exploded[8];
                    $data['tab'] = 'basic';
                    return $pdf->download('ecarkhana-bicycle-fit.pdf');
                } elseif (count($exploded) == 14) {
                    $data['inseam'] = $exploded[6];
                    $data['trunk'] = $exploded[7];
                    $data['forearm'] = $exploded[8];
                    $data['arm'] = $exploded[9];
                    $data['thigh'] = $exploded[10];
                    $data['leg'] = $exploded[11];
                    $data['sternal_notch'] = $exploded[12];
                    $data['height'] = $exploded[13];
                    $data['tab'] = 'advance';
                    return $pdf->download('ecarkhana-bicycle-fit.pdf');
                }
            }
        }
        $discomforts = Discomfort::all();
        $data['discomforts'] = $discomforts;
        return view('frontend.fit-calculators.create', $data);
    }
    private function getResult($data) {
        $total = ($data['sternal_notch'] - $data['inseam'] + $data['arm'])/2+4;
        $data['top_tube'] = $total * 0.63;
        $data['seat_tube_cc'] = $data['inseam'] * 0.65;
        $data['seat_tube_ct'] = $data['inseam'] * 0.67;
        $data['stem'] = $data['inseam'] * 0.37;
        $data['bb_saddle'] = $data['inseam'] *0.883;
        $data['saddle_handlebar'] = $data['inseam'];
        $data['saddle_seatback'] = $data['inseam'];
        $data['seatpost_type'] = $data['inseam'];
        return $data;
    }

}

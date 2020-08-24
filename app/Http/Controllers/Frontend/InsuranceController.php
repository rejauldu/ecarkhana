<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Insurance;
use App\Category;
use App\Dropdowns\Brand;
use App\Dropdowns\Model;
use App\Dropdowns\DisplacementRange;


class InsuranceController extends Controller {

    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'create']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $insurances = Insurance::all();
        return view('frontend.insurances.index', compact('insurances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categories = Category::all();
        $brands = Brand::all();
        $models = Model::all();
        $displacement_ranges = DisplacementRange::all();
        return view('frontend.insurances.create', compact('categories', 'brands', 'models', 'displacement_ranges'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        dd($request->all());
        $data = $request->except('_token', '_method');
        $data['user_id'] = Auth::user()->id;
        Insurance::create($data);
        return redirect()->back()->with('message', 'Thank you! We have received your application');
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

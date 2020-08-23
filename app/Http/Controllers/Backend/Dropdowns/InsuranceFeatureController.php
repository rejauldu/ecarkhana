<?php

namespace App\Http\Controllers\Backend\Dropdowns;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dropdowns\InsuranceFeature;

class InsuranceFeatureController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $insurance_features = InsuranceFeature::all();
        return view('backend.dropdowns.insurance-features.index', compact('insurance_features'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('backend.dropdowns.insurance-features.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $data = $request->except('_token', '_method');
        InsuranceFeature::create($data);
        return redirect(route('insurance-features.index'))->with('message', 'Insurance Feature created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $insurance_feature = InsuranceFeature::find($id);
        return view('backend.dropdowns.insurance-features.show', compact('insurance_feature'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $insurance_feature = InsuranceFeature::find($id);
        return view('backend.dropdowns.insurance-features.create', compact('insurance_feature'));
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
        $insurance_feature = InsuranceFeature::find($id);
        $insurance_feature->update($data);

        return redirect(route('insurance-features.index'))->with('message', 'Insurance Feature updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $insurance_feature = InsuranceFeature::find($id);
        $insurance_feature->delete();
        return redirect()->back()->with('message', 'Insurance Feature has been deleted');
    }

}

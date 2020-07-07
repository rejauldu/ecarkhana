<?php

namespace App\Http\Controllers\Backend\Dropdowns;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dropdowns\AdditionalFeature;

class AdditionalFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$additional_features = AdditionalFeature::all();
        return view('backend.dropdowns.additional-features.index', compact('additional_features'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.dropdowns.additional-features.create');
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
		AdditionalFeature::create($data);
		return redirect(route('additional-features.index'))->with('message', 'Additional Feature created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $additional_feature = AdditionalFeature::find($id);
		return view('backend.dropdowns.additional-features.show', compact('additional_feature'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $additional_feature = AdditionalFeature::find($id);
		return view('backend.dropdowns.additional-features.create', compact('additional_feature'));
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
		$additional_feature = AdditionalFeature::find($id);
		$additional_feature->update($data);
		
		return redirect(route('additional-features.index'))->with('message', 'Additional Feature updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $additional_feature = AdditionalFeature::find($id);
		$additional_feature->delete();
		return redirect()->back()->with('message', 'Additional Feature has been deleted');
    }
}

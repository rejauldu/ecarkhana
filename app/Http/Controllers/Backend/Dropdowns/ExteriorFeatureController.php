<?php

namespace App\Http\Controllers\Backend\Dropdowns;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dropdowns\ExteriorFeature;

class ExteriorFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$exterior_features = ExteriorFeature::all();
        return view('backend.dropdowns.exterior-features.index', compact('exterior_features'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.dropdowns.exterior-features.create');
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
		ExteriorFeature::create($data);
		return redirect(route('exterior-features.index'))->with('message', 'Exterior Feature created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exterior_feature = ExteriorFeature::find($id);
		return view('backend.dropdowns.exterior-features.show', compact('exterior_feature'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exterior_feature = ExteriorFeature::find($id);
		return view('backend.dropdowns.exterior-features.create', compact('exterior_feature'));
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
		$exterior_feature = ExteriorFeature::find($id);
		$exterior_feature->update($data);
		
		return redirect(route('exterior-features.index'))->with('message', 'Exterior Feature updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exterior_feature = ExteriorFeature::find($id);
		$exterior_feature->delete();
		return redirect()->back()->with('message', 'Exterior Feature has been deleted');
    }
}

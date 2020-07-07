<?php

namespace App\Http\Controllers\Backend\Dropdowns;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dropdowns\InteriorFeature;

class InteriorFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$interior_features = InteriorFeature::all();
        return view('backend.dropdowns.interior-features.index', compact('interior_features'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.dropdowns.interior-features.create');
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
		InteriorFeature::create($data);
		return redirect(route('interior-features.index'))->with('message', 'Interior Feature created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $interior_feature = InteriorFeature::find($id);
		return view('backend.dropdowns.interior-features.show', compact('interior_feature'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $interior_feature = InteriorFeature::find($id);
		return view('backend.dropdowns.interior-features.create', compact('interior_feature'));
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
		$interior_feature = InteriorFeature::find($id);
		$interior_feature->update($data);
		
		return redirect(route('interior-features.index'))->with('message', 'Interior Feature updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $interior_feature = InteriorFeature::find($id);
		$interior_feature->delete();
		return redirect()->back()->with('message', 'Interior Feature has been deleted');
    }
}

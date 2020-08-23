<?php

namespace App\Http\Controllers\Backend\Dropdowns;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Dropdowns\KeyFeature;

class KeyFeatureController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $key_features = KeyFeature::with('category')->get();
        return view('backend.dropdowns.key-features.index', compact('key_features'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categories = Category::all();
        return view('backend.dropdowns.key-features.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $data = $request->except('_token', '_method');
        KeyFeature::create($data);
        return redirect(route('key-features.index'))->with('message', 'Key Feature created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $categories = Category::all();
        $key_feature = KeyFeature::find($id);
        return view('backend.dropdowns.key-features.show', compact('categories', 'key_feature'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $categories = Category::all();
        $key_feature = KeyFeature::find($id);
        return view('backend.dropdowns.key-features.create', compact('categories', 'key_feature'));
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
        $key_feature = KeyFeature::find($id);
        $key_feature->update($data);

        return redirect(route('key-features.index'))->with('message', 'Key Feature updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $key_feature = KeyFeature::find($id);
        $key_feature->delete();
        return redirect()->back()->with('message', 'Key Feature has been deleted');
    }

}

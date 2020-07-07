<?php

namespace App\Http\Controllers\Backend\Dropdowns;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Dropdowns\Brand;
use App\Dropdowns\MadeOrigin;

class MadeOriginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$made_origins = MadeOrigin::with('category', 'brand')->get();
        return view('backend.dropdowns.made-origins.index', compact('made_origins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categories = Category::all();
		$brands = Brand::all();
        return view('backend.dropdowns.made-origins.create', compact('categories', 'brands'));
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
		MadeOrigin::create($data);
		return redirect(route('made-origins.index'))->with('message', 'Made Origin created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$categories = Category::all();
        $made_origin = MadeOrigin::find($id);
		return view('backend.dropdowns.made-origins.show', compact('categories', 'made_origin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$categories = Category::all();
		$brands = Brand::all();
        $made_origin = MadeOrigin::find($id);
		return view('backend.dropdowns.made-origins.create', compact('categories', 'brands', 'made_origin'));
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
		$made_origin = MadeOrigin::find($id);
		$made_origin->update($data);
		
		return redirect(route('made-origins.index'))->with('message', 'Made Origin updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $made_origin = MadeOrigin::find($id);
		$made_origin->delete();
		return redirect()->back()->with('message', 'Made Origin has been deleted');
    }
}

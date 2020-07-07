<?php

namespace App\Http\Controllers\Backend\Dropdowns;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Dropdowns\Model;
use App\Dropdowns\WheelBase;

class WheelBaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$wheel_bases = WheelBase::with('category', 'model')->get();
        return view('backend.dropdowns.wheel-bases.index', compact('wheel_bases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categories = Category::all();
		$models = Model::all();
        return view('backend.dropdowns.wheel-bases.create', compact('categories', 'models'));
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
		WheelBase::create($data);
		return redirect(route('wheel-bases.index'))->with('message', 'Wheel Base created successfully');
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
        $wheel_base = WheelBase::find($id);
		return view('backend.dropdowns.wheel-bases.show', compact('categories', 'wheel_base'));
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
		$models = Model::all();
        $wheel_base = WheelBase::find($id);
		return view('backend.dropdowns.wheel-bases.create', compact('categories', 'models', 'wheel_base'));
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
		$wheel_base = WheelBase::find($id);
		$wheel_base->update($data);
		
		return redirect(route('wheel-bases.index'))->with('message', 'Wheel Base updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wheel_base = WheelBase::find($id);
		$wheel_base->delete();
		return redirect()->back()->with('message', 'Wheel Base has been deleted');
    }
}

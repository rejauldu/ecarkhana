<?php

namespace App\Http\Controllers\Backend\Dropdowns;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Dropdowns\WheelType;

class WheelTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$wheel_types = WheelType::with('category')->get();
        return view('backend.dropdowns.wheel-types.index', compact('wheel_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categories = Category::all();
        return view('backend.dropdowns.wheel-types.create', compact('categories'));
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
		WheelType::create($data);
		return redirect(route('wheel-types.index'))->with('message', 'Wheel Type created successfully');
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
        $wheel_type = WheelType::find($id);
		return view('backend.dropdowns.wheel-types.show', compact('categories', 'wheel_type'));
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
        $wheel_type = WheelType::find($id);
		return view('backend.dropdowns.wheel-types.create', compact('categories', 'wheel_type'));
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
		$wheel_type = WheelType::find($id);
		$wheel_type->update($data);
		
		return redirect(route('wheel-types.index'))->with('message', 'Wheel Type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wheel_type = WheelType::find($id);
		$wheel_type->delete();
		return redirect()->back()->with('message', 'Wheel Type has been deleted');
    }
}

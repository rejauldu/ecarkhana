<?php

namespace App\Http\Controllers\Backend\Dropdowns;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Dropdowns\SellingCapacity;

class SellingCapacityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$selling_capacities = SellingCapacity::with('category')->get();
        return view('backend.dropdowns.selling-capacities.index', compact('selling_capacities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categories = Category::all();
        return view('backend.dropdowns.selling-capacities.create', compact('categories'));
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
		SellingCapacity::create($data);
		return redirect(route('selling-capacities.index'))->with('message', 'Selling Capacity created successfully');
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
        $selling_capacity = SellingCapacity::find($id);
		return view('backend.dropdowns.selling-capacities.show', compact('categories', 'selling_capacity'));
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
        $selling_capacity = SellingCapacity::find($id);
		return view('backend.dropdowns.selling-capacities.create', compact('categories', 'selling_capacity'));
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
		$selling_capacity = SellingCapacity::find($id);
		$selling_capacity->update($data);
		
		return redirect(route('selling-capacities.index'))->with('message', 'Selling Capacity updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $selling_capacity = SellingCapacity::find($id);
		$selling_capacity->delete();
		return redirect()->back()->with('message', 'Selling Capacity has been deleted');
    }
}

<?php

namespace App\Http\Controllers\Backend\Dropdowns;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Dropdowns\BicycleType;

class BicycleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bicycle_types = BicycleType::all();
        return view('backend.dropdowns.bicycle-types.index', compact('bicycle_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.dropdowns.bicycle-types.create');
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
		BicycleType::create($data);
		return redirect(route('bicycle-types.index'))->with('message', 'Bicycle Type created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bicycle_type = BicycleType::find($id);
		return view('backend.dropdowns.bicycle-types.show', compact('bicycle_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bicycle_type = BicycleType::find($id);
		return view('backend.dropdowns.bicycle-types.create', compact('bicycle_type'));
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
		$bicycle_type = BicycleType::find($id);
		$bicycle_type->update($data);
		
		return redirect(route('bicycle-types.index'))->with('message', 'Bicycle Type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bicycle_type = BicycleType::find($id);
		$bicycle_type->delete();
		return redirect()->back()->with('message', 'Bicycle Type has been deleted');
    }
}

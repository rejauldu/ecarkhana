<?php

namespace App\Http\Controllers\Backend\Dropdowns;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Dropdowns\Model;
use App\Dropdowns\GroundClearance;

class GroundClearanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$ground_clearances = GroundClearance::with('category', 'model')->get();
        return view('backend.dropdowns.ground-clearances.index', compact('ground_clearances'));
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
        return view('backend.dropdowns.ground-clearances.create', compact('categories', 'models'));
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
		GroundClearance::create($data);
		return redirect(route('ground-clearances.index'))->with('message', 'Ground Clearance created successfully');
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
        $ground_clearance = GroundClearance::find($id);
		return view('backend.dropdowns.ground-clearances.show', compact('categories', 'ground_clearance'));
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
        $ground_clearance = GroundClearance::find($id);
		return view('backend.dropdowns.ground-clearances.create', compact('categories', 'models', 'ground_clearance'));
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
		$ground_clearance = GroundClearance::find($id);
		$ground_clearance->update($data);
		
		return redirect(route('ground-clearances.index'))->with('message', 'Ground Clearance updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ground_clearance = GroundClearance::find($id);
		$ground_clearance->delete();
		return redirect()->back()->with('message', 'Ground Clearance has been deleted');
    }
}

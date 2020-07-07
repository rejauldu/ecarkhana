<?php

namespace App\Http\Controllers\Backend\Dropdowns;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Dropdowns\Model;
use App\Dropdowns\Displacement;

class DisplacementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$displacements = Displacement::with('category', 'model')->get();
        return view('backend.dropdowns.displacements.index', compact('displacements'));
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
        return view('backend.dropdowns.displacements.create', compact('categories', 'models'));
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
		Displacement::create($data);
		return redirect(route('displacements.index'))->with('message', 'Displacement created successfully');
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
        $displacement = Displacement::find($id);
		return view('backend.dropdowns.displacements.show', compact('categories', 'displacement'));
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
        $displacement = Displacement::find($id);
		return view('backend.dropdowns.displacements.create', compact('categories', 'models', 'displacement'));
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
		$displacement = Displacement::find($id);
		$displacement->update($data);
		
		return redirect(route('displacements.index'))->with('message', 'Displacement updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $displacement = Displacement::find($id);
		$displacement->delete();
		return redirect()->back()->with('message', 'Displacement has been deleted');
    }
}

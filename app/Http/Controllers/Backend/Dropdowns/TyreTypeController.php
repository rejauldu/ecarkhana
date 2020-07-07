<?php

namespace App\Http\Controllers\Backend\Dropdowns;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Dropdowns\TyreType;

class TyreTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$tyre_types = TyreType::with('category')->get();
        return view('backend.dropdowns.tyre-types.index', compact('tyre_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categories = Category::all();
        return view('backend.dropdowns.tyre-types.create', compact('categories'));
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
		TyreType::create($data);
		return redirect(route('tyre-types.index'))->with('message', 'Tyre Type created successfully');
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
        $tyre_type = TyreType::find($id);
		return view('backend.dropdowns.tyre-types.show', compact('categories', 'tyre_type'));
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
        $tyre_type = TyreType::find($id);
		return view('backend.dropdowns.tyre-types.create', compact('categories', 'tyre_type'));
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
		$tyre_type = TyreType::find($id);
		$tyre_type->update($data);
		
		return redirect(route('tyre-types.index'))->with('message', 'Tyre Type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tyre_type = TyreType::find($id);
		$tyre_type->delete();
		return redirect()->back()->with('message', 'Tyre Type has been deleted');
    }
}

<?php

namespace App\Http\Controllers\Backend\Dropdowns;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Dropdowns\GearBox;

class GearBoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$gear_boxes = GearBox::with('category')->get();
        return view('backend.dropdowns.gear-boxes.index', compact('gear_boxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categories = Category::all();
        return view('backend.dropdowns.gear-boxes.create', compact('categories'));
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
		GearBox::create($data);
		return redirect(route('gear-boxes.index'))->with('message', 'Gear Box created successfully');
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
        $gear_box = GearBox::find($id);
		return view('backend.dropdowns.gear-boxes.show', compact('categories', 'gear_box'));
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
        $gear_box = GearBox::find($id);
		return view('backend.dropdowns.gear-boxes.create', compact('categories', 'gear_box'));
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
		$gear_box = GearBox::find($id);
		$gear_box->update($data);
		
		return redirect(route('gear-boxes.index'))->with('message', 'Gear Box updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gear_box = GearBox::find($id);
		$gear_box->delete();
		return redirect()->back()->with('message', 'Gear Box has been deleted');
    }
}

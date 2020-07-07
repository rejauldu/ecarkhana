<?php

namespace App\Http\Controllers\Backend\Dropdowns;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Dropdowns\FrontBrake;

class FrontBrakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$front_brakes = FrontBrake::with('category')->get();
        return view('backend.dropdowns.front-brakes.index', compact('front_brakes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categories = Category::all();
        return view('backend.dropdowns.front-brakes.create', compact('categories'));
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
		FrontBrake::create($data);
		return redirect(route('front-brakes.index'))->with('message', 'Front Brake created successfully');
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
        $front_brake = FrontBrake::find($id);
		return view('backend.dropdowns.front-brakes.show', compact('categories', 'front_brake'));
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
        $front_brake = FrontBrake::find($id);
		return view('backend.dropdowns.front-brakes.create', compact('categories', 'front_brake'));
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
		$front_brake = FrontBrake::find($id);
		$front_brake->update($data);
		
		return redirect(route('front-brakes.index'))->with('message', 'Front Brake updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $front_brake = FrontBrake::find($id);
		$front_brake->delete();
		return redirect()->back()->with('message', 'Front Brake has been deleted');
    }
}

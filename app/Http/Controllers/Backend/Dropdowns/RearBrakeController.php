<?php

namespace App\Http\Controllers\Backend\Dropdowns;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Dropdowns\RearBrake;

class RearBrakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$rear_brakes = RearBrake::with('category')->get();
        return view('backend.dropdowns.rear-brakes.index', compact('rear_brakes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categories = Category::all();
        return view('backend.dropdowns.rear-brakes.create', compact('categories'));
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
		RearBrake::create($data);
		return redirect(route('rear-brakes.index'))->with('message', 'Rear Brake created successfully');
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
        $rear_brake = RearBrake::find($id);
		return view('backend.dropdowns.rear-brakes.show', compact('categories', 'rear_brake'));
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
        $rear_brake = RearBrake::find($id);
		return view('backend.dropdowns.rear-brakes.create', compact('categories', 'rear_brake'));
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
		$rear_brake = RearBrake::find($id);
		$rear_brake->update($data);
		
		return redirect(route('rear-brakes.index'))->with('message', 'Rear Brake updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rear_brake = RearBrake::find($id);
		$rear_brake->delete();
		return redirect()->back()->with('message', 'Rear Brake has been deleted');
    }
}

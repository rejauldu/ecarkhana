<?php

namespace App\Http\Controllers\Backend\Dropdowns;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Dropdowns\CoolingSystem;

class CoolingSystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$cooling_systems = CoolingSystem::with('category')->get();
        return view('backend.dropdowns.cooling-systems.index', compact('cooling_systems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categories = Category::all();
        return view('backend.dropdowns.cooling-systems.create', compact('categories'));
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
		CoolingSystem::create($data);
		return redirect(route('cooling-systems.index'))->with('message', 'Cooling System created successfully');
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
        $cooling_system = CoolingSystem::find($id);
		return view('backend.dropdowns.cooling-systems.show', compact('categories', 'cooling_system'));
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
        $cooling_system = CoolingSystem::find($id);
		return view('backend.dropdowns.cooling-systems.create', compact('categories', 'cooling_system'));
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
		$cooling_system = CoolingSystem::find($id);
		$cooling_system->update($data);
		
		return redirect(route('cooling-systems.index'))->with('message', 'Cooling System updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cooling_system = CoolingSystem::find($id);
		$cooling_system->delete();
		return redirect()->back()->with('message', 'Cooling System has been deleted');
    }
}

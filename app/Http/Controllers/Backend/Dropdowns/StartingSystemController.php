<?php

namespace App\Http\Controllers\Backend\Dropdowns;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Dropdowns\StartingSystem;

class StartingSystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$starting_systems = StartingSystem::with('category')->get();
        return view('backend.dropdowns.starting-systems.index', compact('starting_systems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categories = Category::all();
        return view('backend.dropdowns.starting-systems.create', compact('categories'));
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
		StartingSystem::create($data);
		return redirect(route('starting-systems.index'))->with('message', 'Starting System created successfully');
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
        $starting_system = StartingSystem::find($id);
		return view('backend.dropdowns.starting-systems.show', compact('categories', 'starting_system'));
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
        $starting_system = StartingSystem::find($id);
		return view('backend.dropdowns.starting-systems.create', compact('categories', 'starting_system'));
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
		$starting_system = StartingSystem::find($id);
		$starting_system->update($data);
		
		return redirect(route('starting-systems.index'))->with('message', 'Starting System updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $starting_system = StartingSystem::find($id);
		$starting_system->delete();
		return redirect()->back()->with('message', 'Starting System has been deleted');
    }
}

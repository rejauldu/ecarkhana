<?php

namespace App\Http\Controllers\Backend\Dropdowns;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Dropdowns\DriveType;

class DriveTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$drive_types = DriveType::with('category')->get();
        return view('backend.dropdowns.drive-types.index', compact('drive_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categories = Category::all();
        return view('backend.dropdowns.drive-types.create', compact('categories'));
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
		DriveType::create($data);
		return redirect(route('drive-types.index'))->with('message', 'Drive Type created successfully');
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
        $drive_type = DriveType::find($id);
		return view('backend.dropdowns.drive-types.show', compact('categories', 'drive_type'));
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
        $drive_type = DriveType::find($id);
		return view('backend.dropdowns.drive-types.create', compact('categories', 'drive_type'));
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
		$drive_type = DriveType::find($id);
		$drive_type->update($data);
		
		return redirect(route('drive-types.index'))->with('message', 'Drive Type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $drive_type = DriveType::find($id);
		$drive_type->delete();
		return redirect()->back()->with('message', 'Drive Type has been deleted');
    }
}

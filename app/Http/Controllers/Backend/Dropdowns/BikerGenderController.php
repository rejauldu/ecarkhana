<?php

namespace App\Http\Controllers\Backend\Dropdowns;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Dropdowns\BikerGender;

class BikerGenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.dropdowns.biker-genders.index', compact('biker_genders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.dropdowns.biker-genders.create', compact('categories'));
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
		BikerGender::create($data);
		return redirect(route('biker-genders.index'))->with('message', 'Bicycle Type created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $biker_gender = BikerGender::find($id);
		return view('backend.dropdowns.biker-genders.show', compact('categories', 'biker_gender'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $biker_gender = BikerGender::find($id);
		return view('backend.dropdowns.biker-genders.create', compact('categories', 'biker_gender'));
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
		$biker_gender = BikerGender::find($id);
		$biker_gender->update($data);
		
		return redirect(route('biker-genders.index'))->with('message', 'Bicycle Type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $biker_gender = BikerGender::find($id);
		$biker_gender->delete();
		return redirect()->back()->with('message', 'Bicycle Type has been deleted');
    }
}

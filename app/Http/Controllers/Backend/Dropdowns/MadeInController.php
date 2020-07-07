<?php

namespace App\Http\Controllers\Backend\Dropdowns;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Dropdowns\MadeIn;

class MadeInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$made_ins = MadeIn::with('category')->get();
        return view('backend.dropdowns.made-ins.index', compact('made_ins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categories = Category::all();
        return view('backend.dropdowns.made-ins.create', compact('categories'));
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
		MadeIn::create($data);
		return redirect(route('made-ins.index'))->with('message', 'Made In created successfully');
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
        $made_in = MadeIn::find($id);
		return view('backend.dropdowns.made-ins.show', compact('categories', 'made_in'));
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
        $made_in = MadeIn::find($id);
		return view('backend.dropdowns.made-ins.create', compact('categories', 'made_in'));
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
		$made_in = MadeIn::find($id);
		$made_in->update($data);
		
		return redirect(route('made-ins.index'))->with('message', 'Made In updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $made_in = MadeIn::find($id);
		$made_in->delete();
		return redirect()->back()->with('message', 'Made In has been deleted');
    }
}

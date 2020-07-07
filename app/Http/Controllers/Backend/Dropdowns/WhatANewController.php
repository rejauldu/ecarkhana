<?php

namespace App\Http\Controllers\Backend\Dropdowns;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Dropdowns\WhatANew;

class WhatANewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$what_a_news = WhatANew::with('category')->get();
        return view('backend.dropdowns.what-a-news.index', compact('what_a_news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categories = Category::all();
        return view('backend.dropdowns.what-a-news.create', compact('categories'));
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
		WhatANew::create($data);
		return redirect(route('what-a-news.index'))->with('message', 'What A New created successfully');
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
        $what_a_new = WhatANew::find($id);
		return view('backend.dropdowns.what-a-news.show', compact('categories', 'what_a_new'));
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
        $what_a_new = WhatANew::find($id);
		return view('backend.dropdowns.what-a-news.create', compact('categories', 'what_a_new'));
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
		$what_a_new = WhatANew::find($id);
		$what_a_new->update($data);
		
		return redirect(route('what-a-news.index'))->with('message', 'What A New updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $what_a_new = WhatANew::find($id);
		$what_a_new->delete();
		return redirect()->back()->with('message', 'What A New has been deleted');
    }
}

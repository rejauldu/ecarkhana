<?php

namespace App\Http\Controllers\Backend\Dropdowns;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Dropdowns\ProsCons;

class ProsConsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$pros_conses = ProsCons::with('category')->get();
        return view('backend.dropdowns.pros-conses.index', compact('pros_conses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categories = Category::all();
        return view('backend.dropdowns.pros-conses.create', compact('categories'));
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
		ProsCons::create($data);
		return redirect(route('pros-conses.index'))->with('message', 'What A New created successfully');
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
        $pros_cons = ProsCons::find($id);
		return view('backend.dropdowns.pros-conses.show', compact('categories', 'pros_cons'));
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
        $pros_cons = ProsCons::find($id);
		return view('backend.dropdowns.pros-conses.create', compact('categories', 'pros_cons'));
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
		$pros_cons = ProsCons::find($id);
		$pros_cons->update($data);
		
		return redirect(route('pros-conses.index'))->with('message', 'What A New updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pros_cons = ProsCons::find($id);
		$pros_cons->delete();
		return redirect()->back()->with('message', 'What A New has been deleted');
    }
}

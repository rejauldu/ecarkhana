<?php

namespace App\Http\Controllers\Backend\Dropdowns;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dropdowns\Ownership;

class OwnershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$ownerships = Ownership::all();
        return view('backend.dropdowns.ownerships.index', compact('ownerships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.dropdowns.ownerships.create');
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
		Ownership::create($data);
		return redirect(route('ownerships.index'))->with('message', 'Ownership created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ownership = Ownership::find($id);
		return view('backend.dropdowns.ownerships.show', compact('ownership'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ownership = Ownership::find($id);
		return view('backend.dropdowns.ownerships.create', compact('ownership'));
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
		$ownership = Ownership::find($id);
		$ownership->update($data);
		
		return redirect(route('ownerships.index'))->with('message', 'Ownership updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ownership = Ownership::find($id);
		$ownership->delete();
		return redirect()->back()->with('message', 'Ownership has been deleted');
    }
}

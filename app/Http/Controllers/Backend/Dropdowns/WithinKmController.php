<?php

namespace App\Http\Controllers\Backend\Dropdowns;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dropdowns\WithinKm;

class WithinKmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$within_kms = WithinKm::all();
        return view('backend.dropdowns.within-kms.index', compact('within_kms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.dropdowns.within-kms.create');
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
		WithinKm::create($data);
		return redirect(route('within-kms.index'))->with('message', 'Exterior Feature created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $within_km = WithinKm::find($id);
		return view('backend.dropdowns.within-kms.show', compact('within_km'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $within_km = WithinKm::find($id);
		return view('backend.dropdowns.within-kms.create', compact('within_km'));
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
		$within_km = WithinKm::find($id);
		$within_km->update($data);
		
		return redirect(route('within-kms.index'))->with('message', 'Exterior Feature updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $within_km = WithinKm::find($id);
		$within_km->delete();
		return redirect()->back()->with('message', 'Exterior Feature has been deleted');
    }
}

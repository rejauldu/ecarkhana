<?php

namespace App\Http\Controllers\Backend\Dropdowns;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Dropdowns\SafetySecurity;

class SafetySecurityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$safety_securities = SafetySecurity::all();
        return view('backend.dropdowns.safety-securities.index', compact('safety_securities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.dropdowns.safety-securities.create');
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
		SafetySecurity::create($data);
		return redirect(route('safety-securities.index'))->with('message', 'Safety Security created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $safety_security = SafetySecurity::find($id);
		return view('backend.dropdowns.safety-securities.show', compact('safety_security'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $safety_security = SafetySecurity::find($id);
		return view('backend.dropdowns.safety-securities.create', compact('safety_security'));
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
		$safety_security = SafetySecurity::find($id);
		$safety_security->update($data);
		
		return redirect(route('safety-securities.index'))->with('message', 'Safety Security updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $safety_security = SafetySecurity::find($id);
		$safety_security->delete();
		return redirect()->back()->with('message', 'Safety Security has been deleted');
    }
}

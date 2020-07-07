<?php

namespace App\Http\Controllers\Backend\Dropdowns;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dropdowns\AuctionGrade;

class AuctionGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$auction_grades = AuctionGrade::all();
        return view('backend.dropdowns.auction-grades.index', compact('auction_grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.dropdowns.auction-grades.create');
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
		AuctionGrade::create($data);
		return redirect(route('auction-grades.index'))->with('message', 'Exterior Feature created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $auction_grade = AuctionGrade::find($id);
		return view('backend.dropdowns.auction-grades.show', compact('auction_grade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $auction_grade = AuctionGrade::find($id);
		return view('backend.dropdowns.auction-grades.create', compact('auction_grade'));
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
		$auction_grade = AuctionGrade::find($id);
		$auction_grade->update($data);
		
		return redirect(route('auction-grades.index'))->with('message', 'Exterior Feature updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $auction_grade = AuctionGrade::find($id);
		$auction_grade->delete();
		return redirect()->back()->with('message', 'Exterior Feature has been deleted');
    }
}

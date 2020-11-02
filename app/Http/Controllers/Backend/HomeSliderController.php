<?php

namespace App\Http\Controllers\Backend;

use App\HomeSlider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeSliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		
		$home_sliders = HomeSlider::orderBy('id', 'desc')->get();
		return view('backend.home-sliders.index', compact('home_sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
		return view('backend.home-sliders.create');
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
		$home_slider = HomeSlider::create($data);
		for($i=1; $i<=6; $i++) {
			$file = $request->file('image'.$i);
			if($file) {
				$destination_path = 'assets/home-sliders';
				$new_name = $home_slider->id.'-image'.$i.'.'.$file->getClientOriginalExtension();
				$file->move($destination_path, $new_name);
				$data['image'.$i] = $new_name;
				$home_slider->update($data);
			}
		}
		return redirect(route('home-sliders.index'))->with('message', 'Home Slider created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		
        $home_slider = HomeSlider::find($id);
		return view('backend.home-sliders.show', compact('home_slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		
        $home_slider = HomeSlider::find($id);
		return view('backend.home-sliders.create', compact('home_slider'));
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
		$home_slider = HomeSlider::find($id);
		for($i=1; $i<=6; $i++) {
			$file = $request->file('image'.$i);
			if($file) {
				$destination_path = 'assets/home-sliders';
				$new_name = $home_slider->id.'-image'.$i.'.'.$file->getClientOriginalExtension();
				$file->move($destination_path, $new_name);
				$data['image'.$i] = $new_name;
			}
		}
        $home_slider->update($data);
		return redirect(route('home-sliders.index'))->with('message', 'Home Slider updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$home_slider = HomeSlider::find($id);
		$home_slider->delete();
		return redirect()->back()->with('message', 'HomeSlider has been deleted');
    }
}

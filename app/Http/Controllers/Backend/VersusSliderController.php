<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\VersusSlider;
use App\Category;

class VersusSliderController extends Controller
{
    public function __construct() {
        // $this->middleware('moderator:Product', ['except' => ['store', 'getProduct']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$versus_sliders = VersusSlider::with('product1', 'product2', 'category')->orderBy('id', 'desc')->get();
		return view('backend.versus-sliders.index', compact('versus_sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
		return view('backend.versus-sliders.create', compact('categories'));
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
        $file = $request->file('product1_image');
        if ($file) {
            $destination_path = 'assets/versus-sliders';
            $new_name = time() . '.'. $file->getClientOriginalExtension();
            $file->move($destination_path, $new_name);
            $data['product1_image'] = $new_name;
        }
        $file = $request->file('product2_image');
        if ($file) {
            $destination_path = 'assets/versus-sliders';
            $new_name = time() . '.'. $file->getClientOriginalExtension();
            $file->move($destination_path, $new_name);
            $data['product2_image'] = $new_name;
        }
		VersusSlider::create($data);
		return redirect(route('versus-sliders.index'))->with('message', 'VersusSlider created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $versus_slider = VersusSlider::find($id);
		return view('backend.versus-sliders.show', compact('versus_slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $versus_slider = VersusSlider::find($id);
        $categories = Category::all();
		return view('backend.versus-sliders.create', compact('categories', 'versus_slider'));
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
		$file = $request->file('product1_image');
        if ($file) {
            $destination_path = 'assets/versus-sliders';
            $new_name = time() . '.'. $file->getClientOriginalExtension();
            $file->move($destination_path, $new_name);
            $data['product1_image'] = $new_name;
        }
        $file = $request->file('product2_image');
        if ($file) {
            $destination_path = 'assets/versus-sliders';
            $new_name = time() . '.'. $file->getClientOriginalExtension();
            $file->move($destination_path, $new_name);
            $data['product2_image'] = $new_name;
        }
		$versus_slider = VersusSlider::find($id);
		$versus_slider->update($data);
		
		return redirect(route('versus-sliders.index'))->with('message', 'VersusSlider updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$versus_slider = VersusSlider::find($id);
		$versus_slider->delete();
		return redirect()->back()->with('message', 'VersusSlider has been deleted');
    }
}

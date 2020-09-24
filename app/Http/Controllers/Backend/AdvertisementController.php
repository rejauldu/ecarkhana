<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Advertisement;
use App\Category;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$advertisements = Advertisement::orderBy('id', 'desc')->get();
		return view('backend.advertisements.index', compact('advertisements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
		return view('backend.advertisements.create', compact('categories'));
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
        $file = $request->file('image');
        if ($file) {
            $destination_path = 'assets/advertisements';
            $new_name = time() . '.'. $file->getClientOriginalExtension();
            $file->move($destination_path, $new_name);
            $data['image'] = $new_name;
        }
		Advertisement::create($data);
		return redirect(route('advertisements.index'))->with('message', 'Advertisement created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advertisement = Advertisement::find($id);
		return view('backend.advertisements.show', compact('advertisement'));
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
        $advertisement = Advertisement::find($id);
		return view('backend.advertisements.create', compact('categories', 'advertisement'));
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
		$file = $request->file('image');
        if ($file) {
            $destination_path = 'assets/advertisements';
            $new_name = time() . '.'. $file->getClientOriginalExtension();
            $file->move($destination_path, $new_name);
            $data['image'] = $new_name;
        }
		$advertisement = Advertisement::find($id);
		$advertisement->update($data);
		
		return redirect(route('advertisements.index'))->with('message', 'Advertisement updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$advertisement = Advertisement::find($id);
		$advertisement->delete();
		return redirect()->back()->with('message', 'Advertisement has been deleted');
    }
}

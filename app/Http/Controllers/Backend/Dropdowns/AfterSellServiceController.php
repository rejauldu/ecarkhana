<?php

namespace App\Http\Controllers\Backend\Dropdowns;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Dropdowns\AfterSellService;

class AfterSellServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$after_sell_services = AfterSellService::with('category')->get();
        return view('backend.dropdowns.after-sell-services.index', compact('after_sell_services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categories = Category::all();
        return view('backend.dropdowns.after-sell-services.create', compact('categories'));
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
		AfterSellService::create($data);
		return redirect(route('after-sell-services.index'))->with('message', 'After Sell Service created successfully');
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
        $after_sell_service = AfterSellService::find($id);
		return view('backend.dropdowns.after-sell-services.show', compact('categories', 'after_sell_service'));
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
        $after_sell_service = AfterSellService::find($id);
		return view('backend.dropdowns.after-sell-services.create', compact('categories', 'after_sell_service'));
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
		$after_sell_service = AfterSellService::find($id);
		$after_sell_service->update($data);
		
		return redirect(route('after-sell-services.index'))->with('message', 'After Sell Service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $after_sell_service = AfterSellService::find($id);
		$after_sell_service->delete();
		return redirect()->back()->with('message', 'After Sell Service has been deleted');
    }
}

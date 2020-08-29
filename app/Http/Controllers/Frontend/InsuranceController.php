<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Insurance;
use App\Category;
use App\Dropdowns\Brand;
use App\Dropdowns\Model;
use App\Dropdowns\DisplacementRange;
use App\Dropdowns\Coverage;
use App\InsuranceCompany;
use App\Dropdowns\InsuranceFeature;
use App\Locations\Division;
use App\Locations\Region;
use App\User;


class InsuranceController extends Controller {

    public function __construct() {
        $this->middleware('auth', ['except' => ['create']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $insurances = Insurance::with('category', 'displacement', 'company')->latest()->get();
        return view('backend.insurances.index', compact('insurances'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function incompleteIndex() {
        $insurances = Insurance::with('category', 'displacement', 'company')->latest()->get();
        return view('backend.insurances.index', compact('insurances'));
    }
	
    public function photos() {
        $insurance_companies = InsuranceCompany::select('id', 'name', 'logo', 'insurance_feature', 'basic_coverage')->get();
        $coverages = Coverage::select('id', 'name', 'rate')->get();
        $insurance_features = InsuranceFeature::select('id', 'name')->get();
        return view('backend.insurances.photos', compact('insurance_companies', 'coverages', 'insurance_features'));
    }
    public function checkoutStore(Request $request) {
        $inputs = ['name' => $request->name, 'billing_division_id' => $request->billing_division_id, 'billing_region_id' => $request->billing_region_id, 'billing_address' => $request->billing_address, 'phone' => $request->phone];
        if ($request->different_shipping == 'true') {
            $inputs['shipping_division_id'] = $request->shipping_division_id;
            $inputs['shipping_region_id'] = $request->shipping_region_id;
            $inputs['shipping_address'] = $request->shipping_address;
        } else {
            $inputs['shipping_division_id'] = $request->billing_division_id;
            $inputs['shipping_region_id'] = $request->billing_region_id;
            $inputs['shipping_address'] = $request->billing_address;
        }
        Auth::user()->update($inputs);
            
        return redirect()->route('order-complete')->with('message', 'Order created successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categories = Category::all();
        $brands = Brand::all();
        $models = Model::all();
        $displacement_ranges = DisplacementRange::all();
        return view('backend.insurances.create', compact('categories', 'brands', 'models', 'displacement_ranges'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $data = $request->except('_token', '_method');
        $data['user_id'] = Auth::user()->id;
        $insurance = Insurance::create($data);
        $insurance_companies = InsuranceCompany::select('id', 'name', 'logo', 'insurance_feature', 'basic_coverage')->get();
        $coverages = Coverage::select('id', 'name', 'rate')->get();
        $insurance_features = InsuranceFeature::select('id', 'name')->get();
        return view('backend.insurances.photos', compact('insurance_companies', 'coverages', 'insurance_features', 'insurance'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $insurance = Insurance::with('category', 'brand', 'model', 'displacement', 'company')->where('id', $id)->first();
        $coverages = Coverage::all();
        return view('backend.insurances.show', compact('insurance', 'coverages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $data = $request->except('_token', '_method');
        $insurance = Insurance::find($id);
//        $complete = 0;
//        if($request->is_complete)
//            $complete = $request->is_complete;
//        if(isset($request->is_complete))
//            $insurance->update(['is_complete' => $complete]);
        $file = $request->file('registration_copy_front');
        if ($file) {
            $destination_path = 'assets/insurances';
            $new_name = time() . '-front.'. $file->getClientOriginalExtension();
            $file->move($destination_path, $new_name);
            $data['registration_copy_front'] = $new_name;
        }
        $file = $request->file('registration_copy_back');
        if ($file) {
            $destination_path = 'assets/insurances';
            $new_name = time() . '-back.'. $file->getClientOriginalExtension();
            $file->move($destination_path, $new_name);
            $data['registration_copy_back'] = $new_name;
        }
        $file = $request->file('previous_copy');
        if ($file) {
            $destination_path = 'assets/insurances';
            $new_name = time() . '-previous.'. $file->getClientOriginalExtension();
            $file->move($destination_path, $new_name);
            $data['previous_copy'] = $new_name;
        }
        $insurance->update($data);
        $divisions = Division::all();
        $regions = Region::all();
        $type = 'Car';
        $profile = User::with('billing_division', 'billing_region', 'shipping_division', 'shipping_region')->where('id', Auth::user()->id)->first();
        $insurance_companies = InsuranceCompany::select('id', 'name', 'logo', 'insurance_feature', 'basic_coverage')->get();
        $coverages = Coverage::select('id', 'name', 'rate')->get();
        $insurance_features = InsuranceFeature::select('id', 'name')->get();
        return view('backend.insurances.checkout', compact('divisions', 'regions', 'type', 'profile', 'insurance_companies', 'coverages', 'insurance_features', 'insurance'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $insurance = Insurance::find($id);
        $insurance->delete();
        return redirect()->back()->with('message', 'Insurance has been deleted');
    }

}

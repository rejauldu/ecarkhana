<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\InsuranceCompany;
use App\Dropdowns\InsuranceFeature;
use App\Dropdowns\Coverage;

class InsuranceCompanyController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $insurance_companies = InsuranceCompany::all();
        $coverages = Coverage::select('id', 'name', 'rate')->get();
        $insurance_features = InsuranceFeature::select('id', 'name')->get();
        return view('backend.insurance-companies.index', compact('insurance_companies', 'coverages', 'insurance_features'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manageIndex() {
        $insurance_companies = InsuranceCompany::orderBy('id', 'desc')->get();
        return view('backend.insurance-companies.manage-index', compact('insurance_companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $insurance_features = InsuranceFeature::all();
        $coverages = Coverage::select('id', 'name')->get();
        return view('backend.insurance-companies.create', compact('insurance_features', 'coverages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $data = $request->except('_token', '_method');
        if (isset($data['insurance_feature']))
            $data['insurance_feature'] = implode(',', $data['insurance_feature']);
        if (isset($data['supported_type']))
            $data['supported_type'] = implode(',', $data['supported_type']);
        if (isset($data['basic_coverage']))
            $data['basic_coverage'] = implode(',', $data['basic_coverage']);
        $file = $request->file('logo');
        if ($file) {
            $destination_path = 'assets/insurance-company';
            $new_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move($destination_path, $new_name);
            $data['logo'] = $new_name;
        }
        InsuranceCompany::create($data);
        return redirect(route('insurance-companies.index'))->with('message', 'InsuranceCompany created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        
        $insurance_company = InsuranceCompany::find($id);
        return view('backend.insurance-companies.show', compact('insurance_company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        
        $insurance_company = InsuranceCompany::find($id);
        if(isset($insurance_company->insurance_feature))
            $insurance_company->insurance_feature = explode(',', $insurance_company->insurance_feature);
        if(isset($insurance_company->supported_type))
            $insurance_company->supported_type = explode(',', $insurance_company->supported_type);
        if(isset($insurance_company->basic_coverage))
            $insurance_company->basic_coverage = explode(',', $insurance_company->basic_coverage);
        $insurance_features = InsuranceFeature::all();
        $coverages = Coverage::select('id', 'name')->get();
        return view('backend.insurance-companies.create', compact('insurance_company', 'insurance_features', 'coverages'));
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
        $insurance_company = InsuranceCompany::find($id);
        if (isset($data['insurance_feature']))
            $data['insurance_feature'] = implode(',', $data['insurance_feature']);
        if (isset($data['supported_type']))
            $data['supported_type'] = implode(',', $data['supported_type']);
        if (isset($data['basic_coverage']))
            $data['basic_coverage'] = implode(',', $data['basic_coverage']);
        $file = $request->file('logo');
        if ($file) {
            $destination_path = 'assets/insurance-company';
            $new_name = time() . '.' . $file->getClientOriginalExtension();
            @unlink(public_path('assets/insurance-company/' . $insurance_company->logo));
            $file->move($destination_path, $new_name);
            $data['logo'] = $new_name;
        }
        $insurance_company->update($data);

        return redirect(route('insurance-companies.index'))->with('message', 'InsuranceCompany updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $insurance_company = InsuranceCompany::find($id);
        @unlink(public_path('assets/insurance-company/' . $insurance_company->logo));
        $insurance_company->delete();
        return redirect()->back()->with('message', 'InsuranceCompany has been deleted');
    }

}

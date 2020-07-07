<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LoanApplication;
use Auth;
use Carbon\Carbon;

class LoanApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$user = Auth::user();
		if(!Auth::check() || $user->role_id==1)
			return;
		$loan_applications = LoanApplication::latest()->get();
		return view('backend.loan-applications.index', compact('loan_applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
		LoanApplication::create($data);
		return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $loan_application = LoanApplication::with('condition')->where('id', $id)->first();
		$loan_application->update(['viewed_at' => Carbon::now()]);
		return view('backend.loan-applications.show', compact('loan_application'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	public function unviewed()
    {
		$user = Auth::user();
		// if(!Auth::check() || $user->role_id==1)
			// return;
		$loan_applications = LoanApplication::whereNull('viewed_at')->latest()->get();
		return view('backend.loan-applications.index', compact('loan_applications'));
    }
}

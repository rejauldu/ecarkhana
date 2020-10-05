<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\LoanInfo;
use App\Bank;
use App\Dropdowns\Condition;
use App\Locations\Division;

class LoanInfoController extends Controller {

    public function __construct() {
        $this->middleware('moderator:Product', ['only' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $loan_infos = LoanInfo::all();
        return view('frontend.loan-infos.index', compact('loan_infos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $conditions = Condition::all();
        $divisions = Division::all();
        $data_type = 'eligibility';
        return view('frontend.loan-infos.create', compact('conditions', 'divisions', 'data_type'));
    }

    public function carLoan($bank = null) {
        $conditions = Condition::all();
        $divisions = Division::all();
        $data_type = 'application';
        return view('frontend.loan-infos.create', compact('conditions', 'divisions', 'data_type'));
    }
    public function carLoanTo($bank, $info) {
        $loan_info = LoanInfo::find($info);
        $loan_info->update(['bank_id' => $bank, 'data_type' => 'application']);
        return redirect()->route('loan-infos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $data = $request->except('_token', '_method');
        $data['dob'] = date('Y-m-d', strtotime($request->dob));
        if(Auth::check()) {
            $data['user_id'] = Auth::user()->id;
        }
        $loan_info = LoanInfo::where('email', $request->email)->first();
        
        if($loan_info)
            $loan_info->update($data);
        else
            $loan_info = LoanInfo::create($data);
        if($request->data_type != 'eligibility') {
            return redirect()->route('loan-infos.create');
        }
        $profession = '';
        if($request->profession_id == 1) {
            $profession = 'salaried';
        } elseif($request->profession_id == 2) {
            $profession = 'business';
        } else {
            $profession = 'land_lord';
        }
        
        $age = $this->age($request->dob);
        $banks = Bank::where($profession.'_income', '<=', $request->salary)
                ->where($profession.'_duration', '<=', $request->experience)
                ->where('age_min', '<=', $age)
                ->where('age_max', '>=', $age)
                ->get();
        $profession = '';
        if($request->profession_id == 1)
            $profession = 'salaried';
        elseif($request->profession_id == 2)
            $profession = 'business';
        else
            $profession = 'land_lord';
        $data['id'] = $loan_info->id;
        $loan_info = (object) $data;
        $loan_info->profession = $profession;
        if($banks->count()) {
            return view('frontend.loan-infos.index', compact('banks', 'loan_info'));
        }
        return redirect()->back()->with('message', 'Sorry! your are not eligible for loan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $loan_info = LoanInfo::find($id);
        return view('frontend.loan-infos.index', compact('loan_info'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $loan_info = LoanInfo::find($id);
        return view('frontend.loan-infos.create', compact('loan_info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $loan_info = LoanInfo::find($id);
        $loan_info->delete();
        return redirect()->back()->with('message', 'Loan Info has been deleted');
    }
    
    private function age($birthDate) {
        //date in mm/dd/yyyy format; or it can be in other formats as well
        //$birthDate = "12/17/1983";
        //explode the date to get month, day and year
        $birthDate = explode("/", $birthDate);
        //get age from date or birthdate
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2]));
        return $age;
    }

}

<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Bank;

class BankController extends Controller {

    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $banks = Bank::orderBy('id', 'desc')->get();
        return view('backend.banks.index', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('backend.banks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $data = $request->except('_token', '_method', 'is_new', 'is_reconditioned', 'is_used');
        $file = $request->file('photo');
        if ($file) {
            $destination_path = 'assets/banks';
            $new_name = time() . '.'. $file->getClientOriginalExtension();
            $file->move($destination_path, $new_name);
            $data['photo'] = $new_name;
        }
        Bank::create($data);
        return redirect(route('banks.index'))->with('message', 'Bank created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $bank = Bank::find($id);
        return view('backend.banks.show', compact('bank'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $bank = Bank::find($id);
        return view('backend.banks.create', compact('bank'));
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
        if (!isset($data['is_active'])) {
            $data['is_active'] = 0;
        }
        $bank = Bank::find($id);
        $bank->update($data);

        return redirect(route('banks.index'))->with('message', 'Bank updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $bank = Bank::find($id);
        $bank->delete();
        return redirect()->back()->with('message', 'Bank has been deleted');
    }

}

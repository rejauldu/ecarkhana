<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\User;
use App\Payment;
use App\Locations\Division;
use App\Locations\District;
use App\Locations\Upazila;
use App\Locations\Union;
use App\Locations\Region;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Product;
use App\OrderDetail;

class UserController extends Controller {

    public function __construct() {
        $this->middleware('moderatorOrOwner:User', ['except' => ['dealerDetail', 'dealers', 'nationalDistributorDetail', 'nationalDistributorList', 'profile', 'ads']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::with('district', 'role')->orderBy('users.id', 'desc')->paginate(50);
        return view('backend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('backend.emails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $profile = User::with('payment', 'division', 'district', 'upazila', 'union', 'region', 'billing_division', 'billing_district', 'billing_upazila', 'billing_union', 'billing_region', 'shipping_division', 'shipping_district', 'shipping_upazila', 'shipping_union', 'shipping_region')->where('id', $id)->first();
        $payments = Payment::all();
        $divisions = Division::all();
        $districts = District::all();
        $upazilas = Upazila::all();
        $unions = Union::all();
        $regions = Region::all();
        return view('backend.users.show', compact('profile', 'payments', 'divisions', 'districts', 'upazilas', 'unions', 'regions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $profile = User::with('payment', 'division', 'district', 'upazila', 'union', 'region', 'billing_division', 'billing_district', 'billing_upazila', 'billing_union', 'billing_region', 'shipping_division', 'shipping_district', 'shipping_upazila', 'shipping_union', 'shipping_region')->where('id', $id)->first();
        $payments = Payment::all();
        $divisions = Division::all();
        $districts = District::all();
        $upazilas = Upazila::all();
        $unions = Union::all();
        $regions = Region::all();
        return view('backend.users.edit', compact('profile', 'payments', 'divisions', 'districts', 'upazilas', 'unions', 'regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id) {
        $file = $request->file('photo');
        if ($file) {
            $destination_path = 'assets/profile';
            $new_name = $id . '.' . $file->getClientOriginalExtension();
            $file->move($destination_path, $new_name);
            User::where('id', $id)->update(['photo' => $new_name]);
            if ($request->data_source && $request->data_source == 'frontend') {
                User::where('id', $id)->update($request->except('_token', '_method', 'data_source', 'photo'));
            }
        } elseif ($request->password_old) {
            $user = User::find($id);
            if (Hash::check($request->password_old, $user->password)) {
                $user->fill([
                    'password' => Hash::make($request->password)
                ])->save();
            } else {
                return 'Password did not match';
            }
        } else {
            User::where('id', $id)->update($request->except('_token', '_method', 'password_old', 'password', 'password_confirmation', 'data_source', 'photo'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('message', 'User has been deleted');
    }

    public function dealerDetail($id) {
        $u = User::with('region', 'division')->where('id', $id)->first();
        $related_products = Product::where('supplier_id', $id)
                ->whereNotNull('car_id')
                ->with('brand', 'model', 'car.fuel_type', 'supplier.region', 'category')
                ->get();
        return view('frontend.dealer-detail', compact('u', 'related_products'));
    }

    public function dealers() {
        $users = User::where('user_type_id', 2)
                ->with('products', 'division')
                ->paginate(10);
        return view('frontend.dealers', compact('users'));
    }

    public function nationalDistributorDetail($id) {
        $u = User::with('division')->where('id', $id)->first();
        $related_products = Product::where('supplier_id', $id)
                ->whereNotNull('car_id')
                ->with('car', 'brand', 'model', 'car.fuel_type', 'supplier.region', 'category')
                ->get();
        return view('frontend.national-distributor-detail', compact('u', 'related_products'));
    }

    public function nationalDistributorList() {
        $users = User::where('user_type_id', 3)
                ->with('products', 'division')
                ->paginate(10);
        return view('frontend.national-distributor-list', compact('users'));
    }

    public function profile() {
        $id = Auth::user()->id;
        $user = User::with('orders.status', 'orders.order_details.product', 'role', 'products', 'division', 'region', 'billing_division', 'billing_region', 'shipping_division', 'shipping_region')->where('id', $id)->first();
        $sell = OrderDetail::whereHas('product', function($q) use($id) {
                            $q->where('supplier_id', $id);
                        })
                        ->whereHas('order', function($q) {
                            $q->where('order_status_id', 4);
                        })
                        ->get()->count();
        $divisions = Division::all();
        $regions = Region::all();
        return view('backend.users.profile', compact('user', 'sell', 'divisions', 'regions'));
    }

    public function ads() {
        $id = Auth::user()->id;
        $user = User::with('orders.status', 'orders.order_details.product', 'role', 'products.brand', 'products.model', 'products.category', 'products.order_details', 'products.supplier.region', 'products.supplier.division')->where('id', $id)->first();
        $sell = OrderDetail::whereHas('product', function($q) use($id) {
            $q->where('supplier_id', $id);
        })
        ->whereHas('order', function($q) {
            $q->where('order_status_id', 4);
        })
        ->get()->count();
        return view('backend.users.ads', compact('user', 'sell'));
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'payment_method', 'customer_id', 'guest_id', 'shipper_id', 'order_status_id', 'required_at', 'shipping_date', 'paid_at', 'discount', 'updated_at', 'created_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

	protected $dates = ['required_at', 'paid_at', 'updated_at', 'created_at'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
		'required_at' => 'datetime',
		'paid_at' => 'datetime',
        'updated_at' => 'datetime',
		'created_at' => 'datetime',
    ];
	public function details() {
		$user = Auth::user();
		$details = $this->hasMany('App\OrderDetail');
		if($user->role_id == 1)
			$details = $details->whereHas('product', function($query) use($user) {
				$query->where('supplier_id', $user->id);
			});
		return $details;
	}
	public function order_details() {
		return $this->hasMany('App\OrderDetail')->with('product');
	}
	public function customer() {
		return $this->belongsTo('App\User', 'customer_id', 'id');
	}
	public function guest() {
		return $this->belongsTo('App\Guest');
	}
	public function status() {
		return $this->belongsTo('App\OrderStatus', 'order_status_id', 'id');
	}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Guest extends Model
{

	use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'billing_address', 'billing_region_id', 'billing_division_id', 'shipping_address', 'shipping_region_id', 'shipping_division_id', 'about', 'updated_at', 'created_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

	protected $dates = ['updated_at', 'created_at'];



	/**
	 * Send the email verification notification.
	 *
	 * @return void
	 */

	public function getDateAttribute() {
		return $this->created_at->format('M Y');
	}
	public function getTimeAttribute() {
		return $this->updated_at->format('i:H');
	}
	public function billing_division() {
		return $this->belongsTo('App\Locations\Division');
	}
	public function billing_region() {
		return $this->belongsTo('App\Locations\Region');
	}
	public function shipping_division() {
		return $this->belongsTo('App\Locations\Division');
	}
	public function shipping_region() {
		return $this->belongsTo('App\Locations\Region');
	}
}

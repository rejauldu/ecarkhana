<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MakeAnOffer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'offer_price', 'financing_required', 'message', 'product_id', 'user_id', 'viewed_at', 'updated_at', 'created_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'updated_at' => 'datetime',
		'created_at' => 'datetime',
		'viewed_at' => 'datetime',
    ];

	public function product() {
		return $this->belongsTo('App\Product');
	}
	public function user() {
		return $this->belongsTo('App\User');
	}
}

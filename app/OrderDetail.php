<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ybaruchel\DisableLazyLoad\DisableLazyLoad;

class OrderDetail extends Model
{
    use DisableLazyLoad;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id', 'product_id', 'quantity', 'updated_at', 'created_at'
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
    ];
	
	public function order() {
		return $this->belongsTo('App\Order');
	}
	public function product() {
		return $this->belongsTo('App\Product');
	}
	public function getTotalPriceAttribute() {
		return $this->product->sum('msrp');
	}
}

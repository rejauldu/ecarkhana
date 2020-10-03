<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ybaruchel\DisableLazyLoad\DisableLazyLoad;

class VersusSlider extends Model
{
    use DisableLazyLoad;
/**
 * The attributes that are mass assignable.
 *
 * @var array
 */
    protected $fillable = [
        'category_id', 'product1_image', 'product2_image', 'product1_id', 'product2_id', 'updated_at', 'created_at',
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
    public function category() {
		return $this->belongsTo('App\Category');
	}
	public function product1() {
		return $this->belongsTo('App\Product', 'product1_id', 'id');
	}
	public function product2() {
		return $this->belongsTo('App\Product', 'product2_id', 'id');
	}
}
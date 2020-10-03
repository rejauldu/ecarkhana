<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ybaruchel\DisableLazyLoad\DisableLazyLoad;

class Review extends Model
{
    use DisableLazyLoad;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'product_id', 'score',  'message', 'updated_at', 'created_at'
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
	
	public function user() {
		return $this->belongsTo('App\User');
	}
	public function product() {
		return $this->belongsTo('App\Product');
	}
}

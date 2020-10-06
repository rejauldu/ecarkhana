<?php

namespace App\Dropdowns;

use Illuminate\Database\Eloquent\Model as Mod;

class Model extends Mod
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'brand_id', 'name', 'updated_at', 'created_at'
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
	
	public function brand() {
		return $this->belongsTo('App\Dropdowns\Brand');
	}
}

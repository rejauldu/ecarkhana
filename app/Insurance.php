<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'insurance_id', 'type', 'displacement_id', 'passengers', 'brand_id', 'model_id', 'vehicle_type', 'coverages', 'price', 'registration_year', 'extra_policy', 'claim', 'insurance_company_id', 'user_id', 'updated_at', 'created_at'
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
	public function brand() {
		return $this->belongsTo('App\Brand');
	}
	public function model() {
		return $this->belongsTo('App\Model');
	}
	public function insurance_company() {
		return $this->belongsTo('App\InsuranceCompany');
	}
	public function user() {
		return $this->belongsTo('App\User');
	}
}

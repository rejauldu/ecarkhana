<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'type', 'displacement_range_id', 'passengers', 'brand_id', 'model_id', 'vehicle_type', 'coverages', 'price', 'registration_year', 'extra_policy', 'claim', 'insurance_company_id', 'registration_copy_front', 'registration_copy_back', 'previous_copy', 'note', 'starting_date', 'user_id', 'is_complete', 'updated_at', 'created_at'
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

    public function displacement() {
        return $this->belongsTo('App\Dropdowns\DisplacementRange', 'displacement_range_id', 'id');
    }

    public function brand() {
        return $this->belongsTo('App\Dropdowns\Brand');
    }

    public function model() {
        return $this->belongsTo('App\Dropdowns\Model');
    }

    public function company() {
        return $this->belongsTo('App\InsuranceCompany', 'insurance_company_id', 'id');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

}

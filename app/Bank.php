<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ybaruchel\DisableLazyLoad\DisableLazyLoad;

class Bank extends Model
{
    use DisableLazyLoad;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'photo', 'salaried_income', 'business_income', 'land_lord_income', 'salaried_duration', 'business_duration', 'land_lord_duration', 'age_min', 'age_max', 'loan_tenure_min', 'loan_tenure_max', 'salaried_loan_min', 'salaried_loan_max', 'business_loan_min', 'business_loan_max', 'land_lord_loan_min', 'land_lord_loan_max', 'loan_percentage', 'is_new', 'is_used', 'is_reconditioned', 'updated_at', 'created_at'
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
}

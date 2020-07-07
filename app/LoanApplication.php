<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanApplication extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'amount', 'condition_id', 'dependant', 'dob', 'marital_status', 'city', 'address', 'house_number', 'monthly_income', 'gender', 'employment_industry', 'employment_name', 'work_phone', 'viewed_at', 'updated_at', 'created_at'
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
		'dob' => 'datetime',
    ];
	
	public function condition() {
		return $this->belongsTo('App\Dropdowns\Condition');
	}
}

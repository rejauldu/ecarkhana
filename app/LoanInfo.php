<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ybaruchel\DisableLazyLoad\DisableLazyLoad;

class LoanInfo extends Model
{
    use DisableLazyLoad;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'gender_id', 'dob', 'residance_type_id', 'residence_since_id', 'condition_id', 'have_choice', 'price', 'profession_id', 'division_id', 'job_status_id', 'experience', 'salary', 'emi', 'have_loan', 'type', 'share', 'last_year_transaction', 'trade_license', 'have_other_income', 'have_tin', 'user_id', 'bank_id', 'data_type', 'updated_at', 'created_at'
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
	public function condition() {
		return $this->belongsTo('App\Condition');
	}
	public function division() {
		return $this->belongsTo('App\Division');
	}
    public function bank() {
        return $this->belongsTo('App\Bank');
    }
}

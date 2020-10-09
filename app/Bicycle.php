<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bicycle extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand_id', 'model_id', 'bicycle_type_id', 'frame_material', 'suspension', 'gear_no', 'wheel_type_id', 'wheel_size', 'shifter', 'made_origin_id', 'weight', 'image1', 'image2', 'image3', 'image4', 'image5', 'image6', 'image7', 'image8', 'image9', 'image10', 'after_sell_service', 'shifter_lever', 'front_derailleur', 'rear_derailleur', 'rims', 'hub_quality', 'cassette', 'recommended_biker_height', 'tyre_type_id', 'tyre_size', 'crank', 'seat_post', 'chain', 'pedal', 'saddle', 'headset', 'handlebar', 'grip', 'stem', 'brake_system', 'key_feature', 'fork', 'brake_type', 'rim', 'gear', 'freewheel', 'biker_weight', 'biker_gender_id', 'created_at', 'updated_at'
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
		return $this->belongsTo('App\Dropdowns\Brand');
	}
	public function model() {
		return $this->belongsTo('App\Dropdowns\Model');
	}
	public function condition() {
		return $this->belongsTo('App\Dropdowns\Condition');
	}
	public function wheel_type() {
		return $this->belongsTo('App\Dropdowns\WheelType');
	}
    public function bicycle_type() {
        return $this->belongsTo('App\Dropdowns\BicycleType');
    }
	public function made_origin() {
		return $this->belongsTo('App\Dropdowns\MadeOrigin');
	}
	public function tyre_type() {
		return $this->belongsTo('App\Dropdowns\TyreType');
	}
    public function biker_gender() {
        return $this->belongsTo('App\Dropdowns\BikerGender');
    }
}

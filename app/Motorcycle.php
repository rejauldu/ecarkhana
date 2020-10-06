<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motorcycle extends Model
{
	use DisableLazyLoad;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand_id', 'model_id', 'manufacturing_year', 'body_type_id', 'displacement_id', 'engine_type_id', 'maximum_power', 'maximum_torque', 'maximum_speed', 'milage', 'made_origin_id', 'made_in_id', 'image1', 'image2', 'image3', 'image4', 'image5', 'image6', 'image7', 'image8', 'image9', 'image10', 'after_sell_service', 'ground_clearance_id', 'suspension', 'fuel_supply_system', 'fuel_tank_capacity', 'brake_system', 'kerb_weight', 'wheel_base', 'gear_no', 'bore', 'stroke', 'cylinder_no', 'comparison_ratio', 'clutch_type', 'starting_system_id', 'cooling_system_id', 'ignition', 'riding_range', 'length', 'height', 'width', 'seat_height', 'door_no', 'chassis_type', 'front_brake_id', 'rear_brake_id', 'abs', 'registration_cost', 'tyre_type_id', 'battery_type', 'battery_voltage', 'after_sell_service', 'key_feature', 'created_at', 'updated_at'
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
	public function displacement() {
		return $this->belongsTo('App\Dropdowns\Displacement');
	}
	public function ground_clearance() {
		return $this->belongsTo('App\Dropdowns\GroundClearance');
	}
	public function engine_type() {
		return $this->belongsTo('App\Dropdowns\EngineType');
	}
	public function made_in() {
		return $this->belongsTo('App\Dropdowns\MadeIn');
	}
	public function made_origin() {
		return $this->belongsTo('App\Dropdowns\MadeOrigin');
	}
	public function starting_system() {
		return $this->belongsTo('App\Dropdowns\StartingSystem');
	}
	public function cooling_system() {
		return $this->belongsTo('App\Dropdowns\CoolingSystem');
	}
	public function condition() {
		return $this->belongsTo('App\Dropdowns\Condition');
	}
	public function tyre_type() {
		return $this->belongsTo('App\Dropdowns\TyreType');
	}
	public function front_brake() {
		return $this->belongsTo('App\Dropdowns\FrontBrake');
	}
	public function rear_brake() {
		return $this->belongsTo('App\Dropdowns\RearBrake');
	}
}

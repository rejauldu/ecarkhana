<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand_id', 'model_id', 'body_type_id', 'package_id', 'displacement_id', 'manufacturing_year', 'ground_clearance_id', 'drive_type_id', 'engine_type_id', 'engine_capacity', 'fuel_type_id', 'image1', 'image2', 'image3', 'image4', 'image5', 'image6', 'image7', 'image8', 'image9', 'image10', 'transmission_id', 'seating_capacity', 'weight', 'maximum_power', 'maximum_torque', 'emi_star_from', 'gear_box_id', 'loan_upto', 'engine_check_warning', 'wheel_base_id', 'mild_hybrid', 'cylinder_id', 'boot_space', 'front_suspension', 'wheel_type_id', 'wheel_size', 'turning_radius', 'tyre_type_id', 'front_tyre_size', 'rear_tyre_size', 'steering_type', 'steering_column', 'steering_gear_type', 'front_brake_id', 'rear_brake_id', 'fuel_tank_capacity', 'milage', 'airbag', 'wheel_base', 'finance_upto', 'auction_grade', 'no_of_door', 'length', 'width', 'height', 'dashboard_color_id', 'rear_suspension', 'what_a_new', 'pros_cons', 'registration_cost', 'key_feature', 'interior_feature', 'exterior_feature', 'safety_security', 'additional_feature', 'after_sell_service', 'created_at', 'updated_at'
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

    public function body_type() {
        return $this->belongsTo('App\Dropdowns\BodyType');
    }

    public function package() {
        return $this->belongsTo('App\Dropdowns\Package');
    }

    public function displacement() {
        return $this->belongsTo('App\Dropdowns\Displacement');
    }

    public function ground_clearance() {
        return $this->belongsTo('App\Dropdowns\GroundClearance');
    }

    public function drive_type() {
        return $this->belongsTo('App\Dropdowns\DriveType');
    }

    public function engine_type() {
        return $this->belongsTo('App\Dropdowns\EngineType');
    }

    public function fuel_type() {
        return $this->belongsTo('App\Dropdowns\FuelType');
    }

    public function condition() {
        return $this->belongsTo('App\Dropdowns\Condition');
    }

    public function transmission() {
        return $this->belongsTo('App\Dropdowns\Transmission');
    }

    public function selling_capacity() {
        return $this->belongsTo('App\Dropdowns\SellingCapacity');
    }

    public function gear_box() {
        return $this->belongsTo('App\Dropdowns\GearBox');
    }

    public function wheel_base() {
        return $this->belongsTo('App\Dropdowns\WheelBase');
    }

    public function cylinder() {
        return $this->belongsTo('App\Dropdowns\Cylinder');
    }

    public function wheel_type() {
        return $this->belongsTo('App\Dropdowns\WheelType');
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

    public function auction_grade() {
        return $this->belongsTo('App\Dropdowns\AuctionGrade');
    }

}

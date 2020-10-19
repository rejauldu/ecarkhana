<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {

        //return $comment && $this->user()->can('update', $comment);
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name' => 'required',
            'billing_division_id' => 'required|digits_between:1,3',
            'billing_region_id' => 'required|digits_between:1,4',
            'billing_address' => 'required',
            'email' => 'sometimes|required|email',
            'phone' => 'required|digits_between:11,12',
            'product_id.*' => 'required|digits_between:1,4',
            'quantity.*' => 'required|digits_between:1,2',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes() {
        return [
            'name' => 'Name',
            'billing_division_id' => 'City',
            'billing_region_id' => 'Region',
            'billing_address' => 'Address',
            'email' => 'Email Address',
            'phone' => 'Phone Number',
            'product_id.*' => 'Product',
            'quantity.*' => 'Product Quantity',
        ];
    }

}

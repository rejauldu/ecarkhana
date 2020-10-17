<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Product;

class ProductRequest extends FormRequest {

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
            'brand_id' => 'required|digits_between:1,3',
            'model_id' => 'required|digits_between:1,3',
            'category_id' => 'required|digits_between:1,2',
            'condition_id' => 'required|digits_between:1,2',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'msrp' => 'required|digits_between:4,8',
            'region_id' => 'required',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes() {
        return [
            'brand_id' => 'Brand',
            'model_id' => 'Model',
            'category_id' => 'Category',
            'condition_id' => 'Condition',
            'images' => 'Product photo',
            'images.*' => 'Product photo',
            'msrp' => 'Price',
            'region_id' => 'Region',
        ];
    }

}

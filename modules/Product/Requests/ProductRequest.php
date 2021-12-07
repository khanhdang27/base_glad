<?php

namespace Modules\Product\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name'    => 'required',
            'price'   => 'required',
            'status'  => 'required',
            'cate_id' => 'required',
            'image'   => 'image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }

    /**
     * @return array
     */
    public function messages() {
        return [
            'required'         => ':attribute' . trans(' can not be empty.'),
            'cate_id.required' => trans('Please select ') . ':attribute',
            'image'            => ':attribute' . trans(' must be an image.'),
            'mimes'            => ':attribute' .
                trans(' extention must be one of the following: jpeg, png, jpg, gif, svg.'),
        ];
    }

    /**
     * @return array
     */
    public function attributes() {
        return [
            'name'    => 'Name',
            'price'   => 'Price',
            'status'  => 'Status',
            'cate_id' => 'Category',
            'image'   => 'Image'
        ];
    }
}

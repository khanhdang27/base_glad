<?php

namespace Modules\Page\Requests;

use App\AppHelpers\Helper;
use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'    => 'required',
            'status'  => 'required',
            'page_id' => 'required',
            'image'   => 'image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }

    public function messages()
    {
        return [
            'required'         => ':attribute' . trans(' can not be empty.'),
            'page_id.required' => trans('Please select ') . ':attribute',
            'image'            => ':attribute' . trans(' must be an image.'),
            'mimes'            => ':attribute' .
                trans(' extention must be one of the following: jpeg, png, jpg, gif, svg.'),
        ];
    }

    public function attributes()
    {
        return [
            'name'    => trans('Name'),
            'status'  => trans('Status'),
            'page_id' => trans('Page'),
            'image'   => trans('Image'),
        ];
    }
}

<?php

namespace Modules\PaymentMethod\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\PaymentMethod\Models\PaymentMethod;

class PaymentMethodRequest extends FormRequest {
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
        $method = segmentUrl(2);
        $model  = new PaymentMethod();
        switch ($method) {
            default:
                return [
                    'name'   => 'required|validate_unique:' . $model->getTable(),
                    'status' => 'required'
                ];
                break;
            case "update":
                return [
                    'name'   => 'required|validate_unique:' . $model->getTable() . ',' . $this->id,
                    'status' => 'required',
                ];
                break;
        }
    }

    public function messages() {
        return [
            'required'        => ':attribute' . trans(' can not be empty.'),
            'validate_unique' => ':attribute' . trans(' was exist.')
        ];
    }

    public function attributes() {
        return [
            'name'        => trans('Name'),
            'status'      => trans('Status'),
            'description' => trans('Description'),
        ];
    }
}

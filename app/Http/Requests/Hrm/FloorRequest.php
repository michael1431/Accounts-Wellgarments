<?php

namespace App\Http\Requests\Hrm;

use Illuminate\Foundation\Http\FormRequest;

class FloorRequest extends FormRequest
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
            'name'      => 'required', //this field is validated from controller .....
            'unit_id' => 'integer',
            'description' => 'nullable|string'
        ];
    }


    public function messages()
    {
        return [
            'unit_id.required' => 'Please select the unit first first',
            'unit_id.integer' => 'Please select the unit first'
        ];
    }

}

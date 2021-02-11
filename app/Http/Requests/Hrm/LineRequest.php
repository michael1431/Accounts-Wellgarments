<?php

namespace App\Http\Requests\Hrm;

use Illuminate\Foundation\Http\FormRequest;

class LineRequest extends FormRequest
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
            'unit_id'  => 'required|integer',
            'section_id'  => 'required|integer',
            'name'     => 'required',
            'description' => 'nullable|string'
        ];
    }

    public function messages()
    {
        return [
            'unit_id.required' => 'Please select the unit first',
            'section_id.required' => 'Please select the Section first',
        ];
    }




}

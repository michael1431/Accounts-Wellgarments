<?php

namespace App\Http\Requests\Hrm;

use Illuminate\Foundation\Http\FormRequest;

class GradeRequest extends FormRequest
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
            'eName' => 'required',
            'bName' => 'required',
            'description' => 'nullable|string'
        ];
    }


    public function messages()
    {
        return [
            'eName.required'=>'Grade name in english is required',
            'bName.required'=>'Grade name in bengali is required'
        ];
    }
}

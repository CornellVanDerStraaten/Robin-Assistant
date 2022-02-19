<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientValidationRequest extends FormRequest
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
            'name' => 'string|required',
            'date_of_birth' => 'before:today|required',
            'language' => 'required',
            'gender' => 'required',
            'relation' => 'required',
            'color' => 'required'
        ];
    }
}

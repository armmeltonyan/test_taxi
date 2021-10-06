<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDriverRequest extends FormRequest
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
            'full_name' => 'min:3',
            'birthdate' => 'date|date_format:Y-m-d',
            'license_serial' => 'min:3',
            'license_expires_at' => 'date|date_format:Y-m-d'
        ];
    }
}

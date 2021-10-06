<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDriverRequest extends FormRequest
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
            'full_name' => 'required|min:3',
            'birthdate' => 'required|date|date_format:Y-m-d',
            'license_serial' => 'required',
            'license_expires_at' => 'required|date|date_format:Y-m-d'
        ];
    }
}

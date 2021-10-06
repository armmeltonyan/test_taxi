<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTarifRequest extends FormRequest
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
            'title' => 'string|min:3',
            'min_price' => 'numeric',
            'price_per_km' => 'numeric',
            'price_per_minute' => 'numeric',
            'free_km_count' => 'integer',
            'free_minute_count' => 'integer',
        ];
    }
}

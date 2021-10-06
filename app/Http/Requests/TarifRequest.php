<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarifRequest extends FormRequest
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
            'title' => 'required|string|min:3',
            'min_price' => 'required|numeric',
            'price_per_km' => 'required|numeric',
            'price_per_minute' => 'required|numeric',
            'free_km_count' => 'required|integer',
            'free_minute_count' => 'required|integer',
        ];
    }
}

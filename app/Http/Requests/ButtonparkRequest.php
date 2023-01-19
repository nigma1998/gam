<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ButtonparkRequest extends FormRequest
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
            'product_name' => ['sometimes'],
            'total_time' => ['sometimes'],
            'exp' => ['sometimes'],
            'coins' => ['sometimes'],
            'image_url' => ['sometimes'],
            'dat' => ['sometimes'],
            'identifier' => ['sometimes'],
            'complaint_button' => ['sometimes'],
            'inspection_button' => ['sometimes'],
            'button_treatment' => ['sometimes'],
            'drink_button' => ['sometimes'],
        ];
    }
}

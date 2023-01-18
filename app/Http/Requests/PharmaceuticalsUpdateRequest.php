<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PharmaceuticalsUpdateRequest extends FormRequest
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
          'exp' => ['sometimes'],
          'total_time' => ['sometimes'],
          'price' => ['sometimes'],
          'image_url' => ['sometimes'],
          'amount' => ['sometimes'],
          'income' => ['sometimes'],
        ];
    }
}

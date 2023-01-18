<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NpsUpdateRequest extends FormRequest
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
          'product_name' => ['required', 'string'],
          'exp' => ['required', 'string'],
          'total_time' => ['required', 'string'],
          'description' => ['sometimes'],
          'image_url' => ['sometimes'],
          'drug_one' => ['sometimes'],
          'amount_one' => ['sometimes'],
          'drug_two' => ['sometimes'],
          'amount_two' => ['sometimes'],
          'drug_three' => ['sometimes'],
          'amount_three' => ['sometimes'],
          'drug_four' => ['sometimes'],
          'amount_four' => ['sometimes'],
          'drug_five' => ['sometimes'],
          'amount_five' => ['sometimes'],
          'drug_six' => ['sometimes'],
          'amount_six' => ['sometimes'],
          'complaint_button' => ['sometimes'],
          'inspection_button' => ['sometimes'],
          'button_treatment' => ['sometimes'],
          'drink_button' => ['sometimes'],
        ];
    }
}

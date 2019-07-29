<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddBookRequest extends FormRequest
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
            'name' => 'required',
            'price' => 'required',
            'amount' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'name is required',
            'price.required' => 'price is required',
            'amount.required' => 'amount is required',
            'price.numeric' => 'price is number only',
            'amount.numeric' => 'amount is number only',
        ];
    }
}

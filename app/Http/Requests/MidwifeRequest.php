<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MidwifeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required',
            'midwife_name' => 'required|max:128',
            'midwife_gender' => 'required',
            'midwife_brithday' => 'required',
            'midwife_address' => 'required',
            'midwife_specialization' => 'required',
            'midwife_image' => 'image',
        ];
    }
}

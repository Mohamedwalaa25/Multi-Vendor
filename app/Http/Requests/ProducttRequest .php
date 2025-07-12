<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProducttRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'brand' => ['required', 'string', 'max:255'],
            'details' => ['required', 'string', 'max:255'],
            'price' => ['required', "numeric"],
            'category_id' => ['required', 'exists:categories,id' ],
            'image' => ['nullable', 'image'],
        ];


    }

    public function messages()
    {
        return [
            'category_id.exists' => 'The selected category does not exist.',
            'category_id.required' => 'The category field is required.',
        ];

    }
}
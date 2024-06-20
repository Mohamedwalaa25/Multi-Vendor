<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|min:3|max:255',
            'parent_id' => 'nullable', "int" | "exists:categories,id",
            'description' => 'nullable',
            'image' => 'nullable', 'image', 'max:1048576',
            'status' => "required|in:active,archived",
        ];
    }
    public function attributes(): array
    {
        return [
            'parent_id' => 'Parent Category',
        ];
    }

    public function messages()
    {
        return [
            "parent_id.exists"=>'Parent Category Error'
        ];
    }
}

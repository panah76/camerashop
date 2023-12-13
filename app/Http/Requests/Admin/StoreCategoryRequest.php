<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'unique:categories'],
            'parent_id' => ['nullable', 'numeric', 'exists:categories,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

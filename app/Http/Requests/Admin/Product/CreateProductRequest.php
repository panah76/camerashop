<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'unique:products', 'max:256'],
            'price' => ['required', 'numeric'],
            'size' => ['required', 'string'],
            'width' => ['required', 'numeric'],
            'height' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric'],
            'product_short_des' => ['nullable', 'string'],
            'product_long_des' => ['nullable', 'string'],
            'artist_id' => ['required', 'int', 'exists:artists,id'],
            'category_id' => ['required', 'int', 'exists:categories,id'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,svg'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

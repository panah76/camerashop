<?php

namespace App\Http\Requests\Admin\Artist;

use Illuminate\Foundation\Http\FormRequest;

class CreateArtistRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'city' => ['required', 'string'],
            'phone' => ['required', 'string'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

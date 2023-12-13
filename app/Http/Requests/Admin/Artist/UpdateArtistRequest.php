<?php

namespace App\Http\Requests\Admin\Artist;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArtistRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => ['string'],
            'last_name' => ['string'],
            'email' => ['string', 'email'],
            'city' => ['string'],
            'phone' => ['string'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

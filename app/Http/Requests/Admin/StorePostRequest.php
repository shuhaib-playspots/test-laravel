<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'image'   => ['required', 'image', 'mimes:webp,jpeg,jpg,png', 'max:4096'],
            'caption' => ['nullable', 'string', 'max:500'],
        ];
    }
}

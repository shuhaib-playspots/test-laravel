<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreGalleryImageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'      => ['nullable', 'string', 'max:255'],
            'caption'    => ['nullable', 'string', 'max:500'],
            'image'      => ['required', 'image', 'mimes:webp,jpeg,jpg,png', 'max:4096'],
            'order'      => ['nullable', 'integer', 'min:0'],
            'is_active'  => ['sometimes', 'boolean'],
        ];
    }
}

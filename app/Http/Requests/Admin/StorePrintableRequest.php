<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StorePrintableRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'       => ['required', 'string', 'max:255'],
            'subject'     => ['nullable', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
            'cover_image' => ['nullable', 'image', 'mimes:webp,jpeg,jpg,png', 'max:2048'],
            'pdf_file'    => ['required', 'file', 'mimes:pdf', 'max:20480'],
            'is_active'   => ['sometimes', 'boolean'],
        ];
    }
}

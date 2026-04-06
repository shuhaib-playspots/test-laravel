<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'         => ['required', 'string', 'max:150'],
            'slug'         => ['nullable', 'string', 'max:150', 'unique:courses,slug'],
            'tagline'      => ['required', 'string', 'max:255'],
            'description'  => ['required', 'string'],
            'icon'         => ['required', 'string', 'max:50'],
            'level'        => ['required', 'string', 'max:50'],
            'duration'     => ['required', 'string', 'max:50'],
            'age_group'    => ['required', 'string', 'max:50'],
            'class_types'  => ['required', 'array', 'min:1'],
            'class_types.*'=> ['in:one_on_one,group,online'],
            'highlights'   => ['required', 'array', 'min:1'],
            'highlights.*' => ['string', 'max:255'],
            'order'        => ['required', 'integer', 'min:1'],
            'is_active'    => ['boolean'],
            'cover_image'  => ['nullable', 'image', 'mimes:webp,jpg,jpeg,png', 'max:2048'],
        ];
    }
}

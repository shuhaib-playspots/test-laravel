<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreCareerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'        => ['required', 'string', 'max:255'],
            'department'   => ['nullable', 'string', 'max:100'],
            'location'     => ['nullable', 'string', 'max:100'],
            'type'         => ['required', 'in:full-time,part-time,contract,volunteer'],
            'description'  => ['required', 'string'],
            'requirements' => ['nullable', 'string'],
            'deadline'     => ['nullable', 'date', 'after:today'],
            'is_active'    => ['sometimes', 'boolean'],
        ];
    }
}

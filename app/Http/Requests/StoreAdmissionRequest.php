<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdmissionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'parent_name'    => ['required', 'string', 'max:150'],
            'parent_email'   => ['required', 'email', 'max:150'],
            'parent_phone'   => ['required', 'string', 'max:20'],
            'student_name'   => ['required', 'string', 'max:150'],
            'student_dob'    => ['required', 'date', 'before:today'],
            'student_gender' => ['required', 'in:male,female'],
            'program'        => ['required', 'string', 'max:100'],
            'class_type'     => ['required', 'in:one_on_one,group,online'],
            'message'        => ['nullable', 'string', 'max:1000'],
        ];
    }
}

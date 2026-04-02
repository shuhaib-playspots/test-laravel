<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    protected $fillable = [
        'parent_name',
        'parent_email',
        'parent_phone',
        'student_name',
        'student_dob',
        'student_gender',
        'program',
        'class_type',
        'message',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'student_dob' => 'date',
        ];
    }
}

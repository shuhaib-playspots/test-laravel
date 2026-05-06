<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable = [
        'application_type',
        'career_id',
        'name',
        'age',
        'education_qualification',
        'college_university',
        'position_type',
        'subjects',
        'language_medium',
        'available_days',
        'teaching_hours',
        'preferred_time',
        'email',
        'phone',
        'whatsapp',
        'city',
        'photograph_path',
        'resume_path',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'subjects'        => 'array',
            'language_medium' => 'array',
            'available_days'  => 'array',
        ];
    }

    public function career()
    {
        return $this->belongsTo(Career::class);
    }
}

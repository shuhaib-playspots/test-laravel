<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'tagline',
        'description',
        'icon',
        'cover_image',
        'level',
        'duration',
        'age_group',
        'class_types',
        'highlights',
        'order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'class_types' => 'array',
            'highlights'  => 'array',
            'is_active'   => 'boolean',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Printable extends Model
{
    protected $fillable = [
        'title',
        'subject',
        'description',
        'cover_image',
        'pdf_file',
        'download_count',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active'      => 'boolean',
            'download_count' => 'integer',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('created_at', 'desc');
    }
}

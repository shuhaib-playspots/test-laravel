<?php

namespace App\Repositories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Collection;

class CourseRepository
{
    public function allActive(): Collection
    {
        return Course::active()->get();
    }

    public function findBySlug(string $slug): Course
    {
        return Course::where('slug', $slug)->where('is_active', true)->firstOrFail();
    }
}

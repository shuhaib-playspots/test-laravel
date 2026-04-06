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

    public function allForAdmin(): Collection
    {
        return Course::orderBy('order')->get();
    }

    public function findBySlug(string $slug): Course
    {
        return Course::where('slug', $slug)->where('is_active', true)->firstOrFail();
    }

    public function findById(int $id): Course
    {
        return Course::findOrFail($id);
    }

    public function create(array $data): Course
    {
        return Course::create($data);
    }

    public function update(Course $course, array $data): void
    {
        $course->update($data);
    }

    public function delete(Course $course): void
    {
        $course->delete();
    }
}

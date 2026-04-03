<?php

namespace App\Services;

use App\Models\Course;
use App\Repositories\CourseRepository;
use Illuminate\Database\Eloquent\Collection;

class CourseService
{
    public function __construct(
        private CourseRepository $repository
    ) {}

    public function all(): Collection
    {
        return $this->repository->allActive();
    }

    public function findBySlug(string $slug): Course
    {
        return $this->repository->findBySlug($slug);
    }
}

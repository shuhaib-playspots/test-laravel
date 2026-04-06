<?php

namespace App\Services;

use App\Models\Course;
use App\Repositories\CourseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CourseService
{
    public function __construct(
        private CourseRepository $repository
    ) {}

    public function all(): Collection
    {
        return $this->repository->allActive();
    }

    public function allForAdmin(): Collection
    {
        return $this->repository->allForAdmin();
    }

    public function findBySlug(string $slug): Course
    {
        return $this->repository->findBySlug($slug);
    }

    public function findById(int $id): Course
    {
        return $this->repository->findById($id);
    }

    public function create(array $data, ?UploadedFile $image): Course
    {
        $data['slug']       = $data['slug'] ?: Str::slug($data['name']);
        $data['highlights'] = $this->parseHighlights($data['highlights'] ?? []);

        if ($image) {
            $data['cover_image'] = $image->store('courses', 'public');
        }

        return $this->repository->create($data);
    }

    public function update(int $id, array $data, ?UploadedFile $image): void
    {
        $course = $this->repository->findById($id);

        $data['slug']       = $data['slug'] ?: Str::slug($data['name']);
        $data['highlights'] = $this->parseHighlights($data['highlights'] ?? []);

        if ($image) {
            if ($course->cover_image) {
                Storage::disk('public')->delete($course->cover_image);
            }
            $data['cover_image'] = $image->store('courses', 'public');
        }

        $this->repository->update($course, $data);
    }

    public function delete(int $id): void
    {
        $course = $this->repository->findById($id);

        if ($course->cover_image) {
            Storage::disk('public')->delete($course->cover_image);
        }

        $this->repository->delete($course);
    }

    private function parseHighlights(array $highlights): array
    {
        return array_values(array_filter($highlights, fn($h) => trim($h) !== ''));
    }
}

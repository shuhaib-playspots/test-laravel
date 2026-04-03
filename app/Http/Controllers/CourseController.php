<?php

namespace App\Http\Controllers;

use App\Services\CourseService;

class CourseController extends Controller
{
    public function __construct(
        private CourseService $service
    ) {}

    public function index()
    {
        $courses = $this->service->all();

        return view('courses.index', compact('courses'));
    }

    public function show(string $slug)
    {
        $course = $this->service->findBySlug($slug);

        return view('courses.show', compact('course'));
    }
}

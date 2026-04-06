<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCourseRequest;
use App\Http\Requests\Admin\UpdateCourseRequest;
use App\Services\CourseService;

class CourseController extends Controller
{
    public function __construct(
        private CourseService $service
    ) {}

    public function index()
    {
        $courses = $this->service->allForAdmin();

        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(StoreCourseRequest $request)
    {
        $this->service->create(
            $request->except('cover_image'),
            $request->file('cover_image')
        );

        return redirect()->route('admin.courses.index')
            ->with('success', 'Course created successfully.');
    }

    public function edit(int $course)
    {
        $course = $this->service->findById($course);

        return view('admin.courses.edit', compact('course'));
    }

    public function update(UpdateCourseRequest $request, int $course)
    {
        $this->service->update(
            $course,
            $request->except('cover_image'),
            $request->file('cover_image')
        );

        return redirect()->route('admin.courses.index')
            ->with('success', 'Course updated successfully.');
    }

    public function destroy(int $course)
    {
        $this->service->delete($course);

        return redirect()->route('admin.courses.index')
            ->with('success', 'Course deleted successfully.');
    }
}

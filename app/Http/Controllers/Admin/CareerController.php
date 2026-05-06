<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCareerRequest;
use App\Http\Requests\Admin\UpdateCareerRequest;
use App\Services\CareerService;

class CareerController extends Controller
{
    public function __construct(
        private CareerService $service
    ) {}

    public function index()
    {
        $careers = $this->service->allForAdmin();

        return view('admin.jobs.index', compact('careers'));
    }

    public function create()
    {
        return view('admin.jobs.create');
    }

    public function store(StoreCareerRequest $request)
    {
        $this->service->create($request->validated());

        return redirect()->route('admin.jobs.index')
            ->with('success', 'Job listing created successfully.');
    }

    public function edit(int $career)
    {
        $career = $this->service->findById($career);

        return view('admin.jobs.edit', compact('career'));
    }

    public function update(UpdateCareerRequest $request, int $career)
    {
        $this->service->update($career, $request->validated());

        return redirect()->route('admin.jobs.index')
            ->with('success', 'Job listing updated successfully.');
    }

    public function destroy(int $career)
    {
        $this->service->delete($career);

        return redirect()->route('admin.jobs.index')
            ->with('success', 'Job listing deleted successfully.');
    }
}

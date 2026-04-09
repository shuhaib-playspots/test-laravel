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

        return view('admin.careers.index', compact('careers'));
    }

    public function create()
    {
        return view('admin.careers.create');
    }

    public function store(StoreCareerRequest $request)
    {
        $this->service->create($request->validated());

        return redirect()->route('admin.careers.index')
            ->with('success', 'Career listing created successfully.');
    }

    public function edit(int $career)
    {
        $career = $this->service->findById($career);

        return view('admin.careers.edit', compact('career'));
    }

    public function update(UpdateCareerRequest $request, int $career)
    {
        $this->service->update($career, $request->validated());

        return redirect()->route('admin.careers.index')
            ->with('success', 'Career listing updated successfully.');
    }

    public function destroy(int $career)
    {
        $this->service->delete($career);

        return redirect()->route('admin.careers.index')
            ->with('success', 'Career listing deleted successfully.');
    }
}

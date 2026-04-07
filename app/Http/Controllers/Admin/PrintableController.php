<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePrintableRequest;
use App\Http\Requests\Admin\UpdatePrintableRequest;
use App\Services\PrintableService;

class PrintableController extends Controller
{
    public function __construct(
        private PrintableService $service
    ) {}

    public function index()
    {
        $printables = $this->service->allForAdmin();

        return view('admin.printables.index', compact('printables'));
    }

    public function create()
    {
        return view('admin.printables.create');
    }

    public function store(StorePrintableRequest $request)
    {
        $this->service->create(
            $request->except(['cover_image', 'pdf_file']),
            $request->file('cover_image'),
            $request->file('pdf_file')
        );

        return redirect()->route('admin.printables.index')
            ->with('success', 'Study material uploaded successfully.');
    }

    public function edit(int $printable)
    {
        $printable = $this->service->findById($printable);

        return view('admin.printables.edit', compact('printable'));
    }

    public function update(UpdatePrintableRequest $request, int $printable)
    {
        $this->service->update(
            $printable,
            $request->except(['cover_image', 'pdf_file']),
            $request->file('cover_image'),
            $request->file('pdf_file')
        );

        return redirect()->route('admin.printables.index')
            ->with('success', 'Study material updated successfully.');
    }

    public function destroy(int $printable)
    {
        $this->service->delete($printable);

        return redirect()->route('admin.printables.index')
            ->with('success', 'Study material deleted successfully.');
    }
}

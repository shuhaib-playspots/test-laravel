<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGalleryImageRequest;
use App\Http\Requests\Admin\UpdateGalleryImageRequest;
use App\Services\GalleryImageService;

class GalleryController extends Controller
{
    public function __construct(
        private GalleryImageService $service
    ) {}

    public function index()
    {
        $images = $this->service->allForAdmin();

        return view('admin.gallery.index', compact('images'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(StoreGalleryImageRequest $request)
    {
        $this->service->create(
            $request->except('image'),
            $request->file('image')
        );

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Image uploaded to gallery successfully.');
    }

    public function edit(int $gallery)
    {
        $image = $this->service->findById($gallery);

        return view('admin.gallery.edit', compact('image'));
    }

    public function update(UpdateGalleryImageRequest $request, int $gallery)
    {
        $this->service->update(
            $gallery,
            $request->except('image'),
            $request->file('image')
        );

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery image updated successfully.');
    }

    public function destroy(int $gallery)
    {
        $this->service->delete($gallery);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery image deleted successfully.');
    }
}

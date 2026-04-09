<?php

namespace App\Http\Controllers;

use App\Services\GalleryImageService;

class GalleryController extends Controller
{
    public function __construct(
        private GalleryImageService $service
    ) {}

    public function index()
    {
        $images = $this->service->all();

        return view('gallery.index', compact('images'));
    }
}

<?php

namespace App\Repositories;

use App\Models\GalleryImage;
use Illuminate\Database\Eloquent\Collection;

class GalleryImageRepository
{
    public function allActive(): Collection
    {
        return GalleryImage::active()->get();
    }

    public function allForAdmin(): Collection
    {
        return GalleryImage::orderBy('order')->orderBy('created_at', 'desc')->get();
    }

    public function findById(int $id): GalleryImage
    {
        return GalleryImage::findOrFail($id);
    }

    public function create(array $data): GalleryImage
    {
        return GalleryImage::create($data);
    }

    public function update(GalleryImage $image, array $data): void
    {
        $image->update($data);
    }

    public function delete(GalleryImage $image): void
    {
        $image->delete();
    }
}

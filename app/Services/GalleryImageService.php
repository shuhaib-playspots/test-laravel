<?php

namespace App\Services;

use App\Models\GalleryImage;
use App\Repositories\GalleryImageRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class GalleryImageService
{
    public function __construct(
        private GalleryImageRepository $repository
    ) {}

    public function all(): Collection
    {
        return $this->repository->allActive();
    }

    public function allForAdmin(): Collection
    {
        return $this->repository->allForAdmin();
    }

    public function findById(int $id): GalleryImage
    {
        return $this->repository->findById($id);
    }

    public function create(array $data, UploadedFile $image): GalleryImage
    {
        $data['image_path'] = $image->store('gallery', 'public');

        return $this->repository->create($data);
    }

    public function update(int $id, array $data, ?UploadedFile $image): void
    {
        $galleryImage = $this->repository->findById($id);

        if ($image) {
            Storage::disk('public')->delete($galleryImage->image_path);
            $data['image_path'] = $image->store('gallery', 'public');
        }

        $this->repository->update($galleryImage, $data);
    }

    public function delete(int $id): void
    {
        $galleryImage = $this->repository->findById($id);

        Storage::disk('public')->delete($galleryImage->image_path);

        $this->repository->delete($galleryImage);
    }
}

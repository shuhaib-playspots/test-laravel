<?php

namespace App\Services;

use App\Models\Printable;
use App\Repositories\PrintableRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PrintableService
{
    public function __construct(
        private PrintableRepository $repository
    ) {}

    public function all(): Collection
    {
        return $this->repository->allActive();
    }

    public function allForAdmin(): Collection
    {
        return $this->repository->allForAdmin();
    }

    public function findById(int $id): Printable
    {
        return $this->repository->findById($id);
    }

    public function create(array $data, ?UploadedFile $cover, ?UploadedFile $pdf): Printable
    {
        if ($cover) {
            $data['cover_image'] = $cover->store('printables/covers', 'public');
        }

        if ($pdf) {
            $data['pdf_file'] = $pdf->store('printables/pdfs', 'public');
        }

        return $this->repository->create($data);
    }

    public function update(int $id, array $data, ?UploadedFile $cover, ?UploadedFile $pdf): void
    {
        $printable = $this->repository->findById($id);

        if ($cover) {
            if ($printable->cover_image) {
                Storage::disk('public')->delete($printable->cover_image);
            }
            $data['cover_image'] = $cover->store('printables/covers', 'public');
        }

        if ($pdf) {
            if ($printable->pdf_file) {
                Storage::disk('public')->delete($printable->pdf_file);
            }
            $data['pdf_file'] = $pdf->store('printables/pdfs', 'public');
        }

        $this->repository->update($printable, $data);
    }

    public function delete(int $id): void
    {
        $printable = $this->repository->findById($id);

        if ($printable->cover_image) {
            Storage::disk('public')->delete($printable->cover_image);
        }

        if ($printable->pdf_file) {
            Storage::disk('public')->delete($printable->pdf_file);
        }

        $this->repository->delete($printable);
    }

    public function download(int $id): Printable
    {
        $printable = $this->repository->findById($id);
        $this->repository->incrementDownload($printable);
        return $printable;
    }
}

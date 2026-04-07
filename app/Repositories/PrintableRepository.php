<?php

namespace App\Repositories;

use App\Models\Printable;
use Illuminate\Database\Eloquent\Collection;

class PrintableRepository
{
    public function allActive(): Collection
    {
        return Printable::active()->get();
    }

    public function allForAdmin(): Collection
    {
        return Printable::orderBy('created_at', 'desc')->get();
    }

    public function findById(int $id): Printable
    {
        return Printable::findOrFail($id);
    }

    public function create(array $data): Printable
    {
        return Printable::create($data);
    }

    public function update(Printable $printable, array $data): void
    {
        $printable->update($data);
    }

    public function delete(Printable $printable): void
    {
        $printable->delete();
    }

    public function incrementDownload(Printable $printable): void
    {
        $printable->increment('download_count');
    }
}

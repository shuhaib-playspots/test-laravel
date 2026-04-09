<?php

namespace App\Repositories;

use App\Models\Career;
use Illuminate\Database\Eloquent\Collection;

class CareerRepository
{
    public function allActive(): Collection
    {
        return Career::active()->get();
    }

    public function allForAdmin(): Collection
    {
        return Career::orderBy('created_at', 'desc')->get();
    }

    public function findById(int $id): Career
    {
        return Career::findOrFail($id);
    }

    public function create(array $data): Career
    {
        return Career::create($data);
    }

    public function update(Career $career, array $data): void
    {
        $career->update($data);
    }

    public function delete(Career $career): void
    {
        $career->delete();
    }
}

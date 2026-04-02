<?php

namespace App\Repositories;

use App\Models\Admission;
use Illuminate\Pagination\LengthAwarePaginator;

class AdmissionRepository
{
    public function create(array $data): Admission
    {
        return Admission::create($data);
    }

    public function paginate(int $perPage = 15, ?string $status = null): LengthAwarePaginator
    {
        return Admission::latest()
            ->when($status, fn ($q) => $q->where('status', $status))
            ->paginate($perPage)
            ->withQueryString();
    }

    public function find(int $id): Admission
    {
        return Admission::findOrFail($id);
    }

    public function updateStatus(Admission $admission, string $status): void
    {
        $admission->update(['status' => $status]);
    }

    public function countByStatus(): array
    {
        return Admission::selectRaw('status, count(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();
    }
}

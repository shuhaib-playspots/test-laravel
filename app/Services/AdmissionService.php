<?php

namespace App\Services;

use App\Models\Admission;
use App\Repositories\AdmissionRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class AdmissionService
{
    public function __construct(
        private AdmissionRepository $repository
    ) {}

    public function store(array $data): Admission
    {
        return $this->repository->create($data);
    }

    public function list(int $perPage = 15, ?string $status = null): LengthAwarePaginator
    {
        return $this->repository->paginate($perPage, $status);
    }

    public function stats(): array
    {
        $counts = $this->repository->countByStatus();

        return [
            'total'    => array_sum($counts),
            'pending'  => $counts['pending']  ?? 0,
            'reviewed' => $counts['reviewed'] ?? 0,
            'approved' => $counts['approved'] ?? 0,
            'rejected' => $counts['rejected'] ?? 0,
        ];
    }

    public function updateStatus(int $id, string $status): void
    {
        $admission = $this->repository->find($id);
        $this->repository->updateStatus($admission, $status);
    }
}

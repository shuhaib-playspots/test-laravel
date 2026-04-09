<?php

namespace App\Services;

use App\Models\Career;
use App\Repositories\CareerRepository;
use Illuminate\Database\Eloquent\Collection;

class CareerService
{
    public function __construct(
        private CareerRepository $repository
    ) {}

    public function all(): Collection
    {
        return $this->repository->allActive();
    }

    public function allForAdmin(): Collection
    {
        return $this->repository->allForAdmin();
    }

    public function findById(int $id): Career
    {
        return $this->repository->findById($id);
    }

    public function create(array $data): Career
    {
        return $this->repository->create($data);
    }

    public function update(int $id, array $data): void
    {
        $career = $this->repository->findById($id);
        $this->repository->update($career, $data);
    }

    public function delete(int $id): void
    {
        $career = $this->repository->findById($id);
        $this->repository->delete($career);
    }
}

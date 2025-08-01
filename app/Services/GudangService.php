<?php

namespace App\Services;

use App\Models\Gudang;
use App\Repositories\GudangRepository;

class GudangService
{
    protected GudangRepository $repository;

    public function __construct(GudangRepository $repository)
    {
        $this->repository = $repository;
    }

    public function list(array $filters = [], int $perPage = 10)
    {
        return $this->repository->getAll($filters, $perPage);
    }

    public function detail($id)
    {
        return $this->repository->getById($id);
    }

    public function create(array $data): Gudang
    {
        return $this->repository->create($data);
    }

    public function update(Gudang $gudang, array $data): Gudang
    {
        return $this->repository->update($gudang, $data);
    }

    public function delete(Gudang $gudang): bool
    {
        return $this->repository->delete($gudang);
    }
}

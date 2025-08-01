<?php

namespace App\Services;

use App\Models\Supplier;
use App\Repositories\SupplierRepository;

class SupplierService
{
    protected SupplierRepository $repo;

    public function __construct(SupplierRepository $repo)
    {
        $this->repo = $repo;
    }

    public function list(array $filters = [], int $perPage = 10)
    {
        return $this->repo->getAll($filters, $perPage);
    }

    public function detail($id, int $perPage = 10)
    {
        return $this->repo->getById($id, $perPage);
    }

    public function create(array $data): Supplier
    {
        return $this->repo->create($data);
    }

    public function update(Supplier $supplier, array $data): Supplier
    {
        return $this->repo->update($supplier, $data);
    }

    public function delete(Supplier $supplier): bool
    {
        return $this->repo->delete($supplier);
    }
}

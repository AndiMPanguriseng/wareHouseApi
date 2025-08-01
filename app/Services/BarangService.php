<?php

namespace App\Services;

use App\Models\Barang;
use App\Repositories\BarangRepository;

class BarangService
{
    protected BarangRepository $repo;

    public function __construct(BarangRepository $repo)
    {
        $this->repo = $repo;
    }

    public function list(array $filters , int $perPage = 10)
    {
        return $this->repo->getAll($filters, $perPage);
    }

    public function getDetailById($id)
    {
        return $this->repo->getByIdWithRelations($id);
    }

    public function create(array $data): Barang
    {
        return $this->repo->create($data);
    }

    public function update(Barang $barang, array $data): Barang
    {
        return $this->repo->update($barang, $data);
    }

    public function delete(Barang $barang): bool
    {
        return $this->repo->delete($barang);
    }
}

<?php

namespace App\Services;

use App\Models\Kategori;
use App\Repositories\KategoriRepository;

class KategoriService
{
    protected KategoriRepository $repository;

    public function __construct(KategoriRepository $repository)
    {
        $this->repository = $repository;
    }

    public function list(array $filters = [], int $perPage = 10)
    {
        return $this->repository->getAll($filters, $perPage);
    }

    public function detail(int $id, int $perPage = 10)
    {
        return $this->repository->getById($id, $perPage);
    }

    public function create(array $data): Kategori
    {
        return $this->repository->create($data);
    }

    public function update(Kategori $kategori, array $data): Kategori
    {
        return $this->repository->update($kategori, $data);
    }

    public function delete(Kategori $kategori): bool
    {
        return $this->repository->delete($kategori);
    }
}

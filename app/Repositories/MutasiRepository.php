<?php

namespace App\Repositories;

use App\Models\Mutasi;

class MutasiRepository
{
    public function getAll(array $filters = [], int $perPage = 10)
    {
        return Mutasi::with('barang:id,nama')
            ->when($filters['search'] ?? null, function ($q, $search) {
                $q->where('barang_id', 'like', "%$search%");
            })
            ->latest()
            ->paginate($perPage);
    }

    public function getById($id): Mutasi
    {
        return Mutasi::with('barang:id,nama')->findOrFail($id);
    }

    public function create(array $data): Mutasi
    {
        return Mutasi::create($data);
    }

    public function update(Mutasi $mutasi, array $data): Mutasi
    {
        $mutasi->update($data);
        return $mutasi;
    }

    public function delete(Mutasi $mutasi): bool
    {
        return $mutasi->delete();
    }
}

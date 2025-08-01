<?php

namespace App\Repositories;

use App\Models\Supplier;

class SupplierRepository
{
    public function getAll(array $filters = [], int $perPage = 10)
    {
        return Supplier::select('id', 'nama', 'alamat', 'telepon')
            ->when($filters['search'] ?? null, fn($q, $search) =>
                $q->where('nama', 'like', "%$search%")
            )
            ->paginate($perPage);
    }

    public function getById($id, int $perPage = 10)
    {
        $supplier = Supplier::findOrFail($id);
        $barang   = $supplier->barang()->select('id','nama')->paginate($perPage);

        return [
            'supplier' => $supplier,
            'barang'   => $barang
        ];
    }

    public function create(array $data): Supplier
    {
        return Supplier::create($data);
    }

    public function update(Supplier $supplier, array $data): Supplier
    {
        $supplier->update($data);
        return $supplier;
    }

    public function delete(Supplier $supplier): bool
    {
        return $supplier->delete();
    }
}

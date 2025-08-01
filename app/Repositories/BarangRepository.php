<?php

namespace App\Repositories;

use App\Models\Barang;

class BarangRepository
{
    public function getAll($filters = [], int $perPage = 10)
    {
        return Barang::select('id', 'nama', 'stok', 'deskripsi')
            ->when($filters['search'] ?? null, fn($q, $search) => $q->where('nama', 'like', "%$search%"))
            ->latest()
            ->paginate($perPage);
    }

    public function getByIdWithRelations($id)
    {
        return Barang::with(['kategori', 'supplier', 'gudang']) // contoh relasi
            ->findOrFail($id);
    }

    public function create(array $data): Barang
    {
        $barang = Barang::create($data);

        // reload dengan relasi agar langsung bisa dipakai di BarangDetailResource
        return $barang->load(['kategori', 'supplier', 'gudang']);
    }

    public function update(Barang $barang, array $data): Barang
    {
        $barang->update($data);

        // reload dengan relasi agar response update juga lengkap
        return $barang->load(['kategori', 'supplier', 'gudang']);
    }

    public function delete(Barang $barang): bool
    {
        return $barang->delete();
    }
}

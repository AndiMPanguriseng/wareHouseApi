<?php

namespace App\Repositories;

use App\Models\Gudang;

class GudangRepository
{
    public function getAll(array $filters = [], int $perPage = 10)
    {
        return Gudang::select('id', 'nama', 'lokasi')
            ->when(
                $filters['search'] ?? null,
                fn($q, $search) =>
                $q->where('nama', 'like', "%$search%")
                    ->orWhere('lokasi', 'like', "%$search%")
            )
            ->paginate($perPage);
    }

    public function getById($id)
    {
        // ambil detail kategori dengan relasi barang
        $gudang = Gudang::with('barang')->findOrFail($id);

        // gabungkan kategori + barang_paginate
        return [
            'gudang' => $gudang,
        ];
    }

    public function create(array $data): Gudang
    {
        return Gudang::create($data);
    }

    public function update(Gudang $gudang, array $data): Gudang
    {
        $gudang->update($data);
        return $gudang;
    }

    public function delete(Gudang $gudang): bool
    {
        return $gudang->delete();
    }
}

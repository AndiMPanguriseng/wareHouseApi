<?php 

namespace App\Repositories;

use App\Models\Kategori;

class KategoriRepository
{
    public function getAll(array $filters = [], int $perPage = 10)
    {
        // eager load relasi barang agar Resource bisa pakai whenLoaded()
        return Kategori::select('id', 'nama')
        ->paginate($perPage);
    }

    public function getById(int $id, int $perPage = 10)
    {
        // ambil detail kategori dengan relasi barang
        $kategori = Kategori::with('barang')->findOrFail($id);

        $barang = $kategori->barang()->paginate($perPage);

        // gabungkan kategori + barang_paginate
        return [
            'kategori' => $kategori,
            'barang'   => $barang,
        ];
    }

    public function create(array $data): Kategori
    {
        $kategori = Kategori::create($data);

        // reload dengan relasi barang biar bisa langsung dipakai di Resource
        return $kategori;
    }

    public function update(Kategori $kategori, array $data): Kategori
    {
        $kategori->update($data);

        // reload dengan relasi barang
        return $kategori->load('barang');
    }

    public function delete(Kategori $kategori): bool
    {
        return $kategori->delete();
    }
}

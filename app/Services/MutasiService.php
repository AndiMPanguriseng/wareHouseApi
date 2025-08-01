<?php

namespace App\Services;

use App\Models\barang;
use App\Models\Mutasi;
use App\Repositories\MutasiRepository;
use Illuminate\Support\Facades\DB;

class MutasiService
{
    protected MutasiRepository $repo;

    public function __construct(MutasiRepository $repo)
    {
        $this->repo = $repo;
    }

    public function list($filters, $perPage = 10)
    {
        return $this->repo->getAll($filters, $perPage);
    }

    public function detail($id)
    {
        return $this->repo->getById($id);
    }

    public function create(array $data): Mutasi
    {
        return $this->repo->create($data);
    }

    public function update(Mutasi $mutasi, array $data): Mutasi
    {
        return $this->repo->update($mutasi, $data);
    }

    public function delete(Mutasi $mutasi): bool
    {
        return $this->repo->delete($mutasi);
    }

    public function mutasiMasuk(array $data): Mutasi
    {
        return DB::transaction(function () use ($data) {
            $barang = barang::findOrFail($data['barang_id']);
            $barang->increment('stok', $data['jumlah']);

            return $this->repo->create($data + ['jenis_mutasi' => 'masuk']);
        });
    }

    public function mutasiKeluar(array $data): Mutasi
    {
        return DB::transaction(function () use ($data) {
            $barang = Barang::findOrFail($data['barang_id']);

            if ($barang->stok < $data['jumlah']) {
                throw new \Exception("Stok barang tidak mencukupi");
            }

            $barang->decrement('stok', $data['jumlah']);

            return $this->repo->create($data + ['jenis_mutasi' => 'keluar']);
        });
    }

    public function stokBarang()
    {
        return Barang::select('id', 'nama', 'stok')->get();
    }
}

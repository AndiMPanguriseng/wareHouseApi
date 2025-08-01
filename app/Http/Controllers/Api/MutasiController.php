<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MutasiRequest;
use App\Http\Resources\MutasiResource;
use App\Models\Mutasi;
use App\Services\MutasiService;
use Illuminate\Http\Request;

class MutasiController extends Controller
{
    protected MutasiService $service;

    public function __construct(MutasiService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $mutasi = $this->service->list(
            $request->only(['barang_id', 'jenis_mutasi']),
            (int) $request->get('per_page', 10)
        );
        return apiResponse($mutasi, 'Daftar mutasi berhasil diambil');
    }

    public function store(MutasiRequest $request)
    {
         $data = $request->validated();

        if ($data['jenis_mutasi'] === 'masuk') {
            $mutasi = $this->service->mutasiMasuk($data);
        } else {
            $mutasi = $this->service->mutasiKeluar($data);
        }

        return apiResponse($mutasi, "Mutasi {$data['jenis_mutasi']} berhasil disimpan");
    }

    public function show($id)
    {
        $mutasi = $this->service->detail($id);
        return apiResponse(new MutasiResource($mutasi), "Detail mutasi dengan id {$id}");
    }

    public function update(MutasiRequest $request, Mutasi $mutasi)
    {
        $mutasi = $this->service->update($mutasi, $request->validated());
        return apiResponse(new MutasiResource($mutasi), 'Mutasi berhasil diperbarui');
    }

    public function destroy(Mutasi $mutasi)
    {
        $this->service->delete($mutasi);
        return apiResponse(null, 'Mutasi berhasil dihapus');
    }

     public function stok()
    {
        $stok = $this->service->stokBarang();
        return apiResponse($stok, 'Data stok barang berhasil diambil');
    }
}

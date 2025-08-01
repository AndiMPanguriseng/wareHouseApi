<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\KategoriRequest;
use App\Http\Resources\KategoriResource;
use App\Models\Kategori;
use App\Services\KategoriService;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    protected KategoriService $service;

    public function __construct(KategoriService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $kategori = $this->service->list(
            $request->only('search'),       // argumen pertama = filters (array)
            (int) $request->get('per_page', 10) // argumen kedua = perPage (int)
        );
        return apiResponse($kategori, 'Data kategori berhasil diambil');
    }

    public function store(KategoriRequest $request)
    {
        $kategori = $this->service->create($request->validated());
        return apiResponse(new KategoriResource($kategori), 'Kategori berhasil ditambahkan', true, 201);
    }

    public function show(Request $request, $id)
    {
        $kategori = $this->service->detail($id, (int) $request->get('per_page', 10));
        return apiResponse(new KategoriResource($kategori['kategori']->load('barang')), sprintf("Detail kategori dengan id %d berhasil diambil", $id));
    }

    public function update(KategoriRequest $request, Kategori $kategori)
    {
        $kategori = $this->service->update($kategori, $request->validated());
        return apiResponse(new KategoriResource($kategori), 'Kategori berhasil diperbarui');
    }

    public function destroy(Kategori $kategori)
    {
        $this->service->delete($kategori);
        return apiResponse(null, 'Kategori berhasil dihapus');
    }
}

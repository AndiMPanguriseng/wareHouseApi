<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Http\Resources\BarangResource;
use App\Http\Resources\DetailBarangResource;
use App\Models\Barang;
use App\Services\BarangService;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    protected BarangService $service;

    public function __construct(BarangService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $barang = $this->service->list(
            $request->only('search'),       // argumen pertama = filters (array)
            (int) $request->get('per_page', 10) // argumen kedua = perPage (int)
        );
        return apiResponse($barang, 'Data barang berhasil diambil');
    }

    public function store(StoreBarangRequest $request)
    {
        $barang = $this->service->create($request->validated());
        return apiResponse(new DetailBarangResource($barang), 'Barang berhasil ditambahkan', true, 201);
    }

    public function show($id)
    {
        $barang = $this->service->getDetailById($id); // eager load di sini
        return apiResponse(new DetailBarangResource($barang), 'Detail barang');
    }

    public function update(UpdateBarangRequest $request, Barang $barang)
    {
        $barang = $this->service->update($barang, $request->validated());
        return apiResponse(new DetailBarangResource($barang), 'Barang berhasil diperbarui');
    }

    public function destroy(Barang $barang)
    {
        $this->service->delete($barang);
        return apiResponse(null, 'Barang berhasil dihapus');
    }
}

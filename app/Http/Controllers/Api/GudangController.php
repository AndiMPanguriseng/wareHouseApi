<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GudangRequest;
use App\Http\Resources\GudangResource;
use App\Models\Gudang;
use App\Services\GudangService;
use Illuminate\Http\Request;

class GudangController extends Controller
{
    protected GudangService $service;

    public function __construct(GudangService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $gudangs = $this->service->list(
            $request->only('search'),
            (int) $request->get('per_page', 10)
        );

        return apiResponse(GudangResource::collection($gudangs), 'Data gudang berhasil diambil');
    }

    public function store(GudangRequest $request)
    {
        $gudang = $this->service->create($request->validated());
        return apiResponse(new GudangResource($gudang), 'Gudang berhasil ditambahkan', true, 201);
    }

    public function show($id)
    {
        $gudang = $this->service->detail($id);
        return apiResponse(new GudangResource($gudang['gudang']->load('barang')), "Detail gudang dengan id {$id} berhasil diambil");
    }

    public function update(GudangRequest $request, Gudang $gudang)
    {
        $gudang = $this->service->update($gudang, $request->validated());
        return apiResponse(new GudangResource($gudang), 'Gudang berhasil diperbarui');
    }

    public function destroy(Gudang $gudang)
    {
        $this->service->delete($gudang);
        return apiResponse(null, 'Gudang berhasil dihapus');
    }
}

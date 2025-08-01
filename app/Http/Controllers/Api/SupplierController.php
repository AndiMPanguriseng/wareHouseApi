<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Http\Resources\SupplierResource;
use App\Models\Supplier;
use App\Services\SupplierService;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    protected SupplierService $service;

    public function __construct(SupplierService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $suppliers = $this->service->list(
            $request->only('search'),
            (int) $request->get('per_page', 10)
        );

        return apiResponse($suppliers, 'Data supplier berhasil diambil');
    }

    public function store(SupplierRequest $request)
    {
        $supplier = $this->service->create($request->validated());
        return apiResponse(new SupplierResource($supplier), 'Supplier berhasil ditambahkan', true, 201);
    }

    public function show($id)
    {
        $supplier = $this->service->detail($id);
        return apiResponse(new SupplierResource($supplier['supplier']->load('barang')), "Detail supplier dengan id {$id} berhasil diambil");
    }

    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        $supplier = $this->service->update($supplier, $request->validated());
        return apiResponse(new SupplierResource($supplier), 'Supplier berhasil diperbarui');
    }

    public function destroy(Supplier $supplier)
    {
        $this->service->delete($supplier);
        return apiResponse(null, 'Supplier berhasil dihapus');
    }
}

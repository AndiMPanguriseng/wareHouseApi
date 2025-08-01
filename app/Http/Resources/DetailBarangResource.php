<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailBarangResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'deskripsi' => $this->deskripsi,
            'stok' => $this->stok,
            'kategori' => $this->whenLoaded('kategori', function () {
                return $this->kategori->nama ?? null;
            }),
            'gudang' => $this->whenLoaded('gudang', function(){
                return $this->gudang->nama ?? null;
            }),
            'supplier' => $this->whenLoaded('supplier', function(){
                return $this->supplier->nama ?? null;
            }),
            'createdAt' => $this->created_at->toDateTimeString(),
        ];
    }
}

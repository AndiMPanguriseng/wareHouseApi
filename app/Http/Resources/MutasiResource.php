<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MutasiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'jenisMutasi'       => $this->jenis_mutasi,
            'jumlah'     => $this->jumlah,
            'keterangan' => $this->keterangan,
            'barang'     => [
                'id'   => $this->barang->id,
                'nama' => $this->barang->nama,
            ],
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}

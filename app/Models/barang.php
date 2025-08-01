<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kategori_id',
        'gudang_id',
        'supplier_id',
        'deskripsi',
        'stok'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function gudang()
    {
        return $this->belongsTo(Gudang::class);
    }

    public function mutasi()
    {
        return $this->hasMany(Mutasi::class);
    }

}

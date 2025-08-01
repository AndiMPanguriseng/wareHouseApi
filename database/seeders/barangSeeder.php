<?php

namespace Database\Seeders;

use App\Models\barang;
use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class barangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoriIds = Kategori::pluck('id')->toArray();

        for ($i = 0; $i < 50; $i++) {
            barang::create([
                'nama' => 'Barang ' . Str::random(5),
                'kategori_id' => $kategoriIds[array_rand($kategoriIds)],
                'deskripsi' => 'Deskripsi ' . Str::random(20),
                'stok' => rand(1, 100),
            ]);
        }
    }
}

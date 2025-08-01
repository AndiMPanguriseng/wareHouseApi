<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Kategori::factory(10)->create();
        \App\Models\Supplier::factory(10)->create();
        \App\Models\Gudang::factory(3)->create();
        \App\Models\Barang::factory(100)->create();
        \App\Models\Mutasi::factory(50)->create();
    }
}

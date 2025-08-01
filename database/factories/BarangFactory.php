<?php

namespace Database\Factories;

use App\Models\barang;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->word(),
            'deskripsi' => $this->faker->text(),
            'stok' => $this->faker->numberBetween(10, 100),
            'kategori_id' => \App\Models\Kategori::inRandomOrder()->first()->id,
            'supplier_id' => \App\Models\Supplier::inRandomOrder()->first()->id,
            'gudang_id' => \App\Models\Gudang::inRandomOrder()->first()->id,
        ];
    }

    protected $model = barang::class;
}

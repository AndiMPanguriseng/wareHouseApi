<?php

namespace Database\Factories;

use App\Models\barang;
use App\Models\Mutasi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mutasi>
 */
class MutasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'barang_id' => barang::inRandomOrder()->first()->id,
            'jenis_mutasi' => $this->faker->randomElement(['masuk', 'keluar']),
            'jumlah' => $this->faker->numberBetween(1, 50),
            'keterangan' => $this->faker->sentence(),
        ];
    }

    protected $model = Mutasi::class;
}

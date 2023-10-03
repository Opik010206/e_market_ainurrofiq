<?php

namespace Database\Factories;

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
            'kode_barang' => fake()->unique()->randomNumber(5),
            'nama_barang' => fake()->word(),
            'satuan' => fake()->randomElement(['Pcs', 'Kg', 'Meter']),
            'user_id' => fake()->randomElement(),
            'produk_id' => fake()->randomElement(),
            'ditarik' => fake()->numberBetween(1000, 10000),
            'harga_jual' => fake()->numberBetween(1000, 10000),
            'stok' => fake()->numberBetween(1, 100)
        ];
    }
}

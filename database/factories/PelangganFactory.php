<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelanggan>
 */
class PelangganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_pelanggan' => fake()->unique()->numberBetween(1000, 9999),
            'nama_pelanggan' => fake()->name(),
            'alamat' => fake()->streetAddress(),
            'no_telp' => fake()->numerify('08##########'),
            'email' => fake()->unique()->safeEmail()
        ];
    }
}

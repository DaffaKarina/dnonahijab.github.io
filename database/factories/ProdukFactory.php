<?php

namespace Database\Factories;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => ucfirst($this->faker->word()),
            'deskripsi' => ucfirst($this->faker->sentence(3)),
            'harga' =>  $this->faker->numberBetween($min = 5000, $max = 20000),
            'kategori_id' => $this->faker->randomElement(Kategori::pluck('id', 'id')->toArray()),
        ];
    }
}
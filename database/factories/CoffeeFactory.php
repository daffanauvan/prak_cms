<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coffee>
 */
class CoffeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->sentence,
            'deskripsi'=> $this->faker->text(250),
            'harga'=> $this->faker->randomFloat(2, 10000, 1000000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

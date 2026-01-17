<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuari;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comentari>
 */
class ComentariFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'contingut' => fake()->text(),
            'usuari_id' => Usuari::inRandomOrder()->first()
        ];
    }
}

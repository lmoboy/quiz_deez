<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quiz>
 */
class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'owner_id' => random_int(1, 10),
            'qestion' => fake()->sentence(),
            'completione_count' => 0,
            'answers'=> json_encode([fake()->word(),fake()->word(),fake()->word()]),
            'correct_answer' => fake()->word(),
        ];
    }
}

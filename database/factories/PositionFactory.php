<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Position>
 */
class PositionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->randomElement(['Frontend Developer', 'Backend Developer', 'Tester', 'Full-stack Developer', 'UI/UX Designer']),
            'description' => $this->faker->text,
            'workload' => $this->faker->randomElement(['full-time', 'part-time']),
            'additional_info' => $this->faker->text(10),

            'team_id' => \App\Models\Team::inRandomOrder()->first()->id,
        ];
    }
}

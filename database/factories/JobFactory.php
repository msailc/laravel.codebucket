<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->randomElement(['Front end developer', 'Back end developer', 'Full stack developer', 'DevOps', 'QA']),
            'description' => $this->faker->text(30),
            'workload' => $this->faker->randomElement(['full-time', 'part-time']),
            'user_id' => User::all()->random()->id,
            'team_id' => Team::all()->random()->id,
            'stack_id' => $this->faker->randomElement([1, 2, 3, 4, 5]),
        ];
    }
}

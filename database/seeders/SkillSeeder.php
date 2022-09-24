<?php

namespace Database\Seeders;

use App\Models\Position;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skill::factory(5)->create();

        foreach (Skill::all() as $skill) {
            $users = User::inRandomOrder()->take(rand(1, 5))->pluck('id');
            $skill->users()->attach($users);
        }

        foreach (Skill::all() as $skill) {
            $positions = Position::inRandomOrder()->take(rand(1,5))->pluck('id');
            $skill->positions()->attach($positions);
        }
    }
}

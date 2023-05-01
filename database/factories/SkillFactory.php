<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Specialty;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Skill>
 */
class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         $doctors = User::role(['doctor'])->get('id');
        return [
            'title' => $this->faker->word(),
            'specialty' => Specialty::all()->random()->name,
            'description' => $this->faker->text(250),
            'user_id'=>$this->faker->randomElement($doctors),
        ];
    }
}

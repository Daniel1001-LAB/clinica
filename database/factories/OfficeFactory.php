<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Office>
 */
class OfficeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $doctors = User::role(['doctor'])->pluck('id');
        return [
            'local' => $this->faker->company(),
            'address' => $this->faker->streetAddress(),
            'email' => $this->faker->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'mobil' => $this->faker->phoneNumber(),
            'doctor_id' => $this->faker->randomElement($doctors),
            'lat' => $this->faker->latitude($min=-90, $max=90),
            'lgn' => $this->faker->longitude($min=-180, $max=180),

        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'class' => $this->faker->randomElement(['A', 'B', 'C']),
            'role' => $this->faker->randomElement(['teacher', 'student', 'admin']),
            'password' => bcrypt('password'), // Default password for all seeded users
        ];
    }
}


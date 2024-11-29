<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClassFactory extends Factory
{
    public function definition()
    {
        return [
            'teacherid' => \App\Models\User::where('role', 'teacher')->inRandomOrder()->first()->id,
            'credit_hours' => $this->faker->numberBetween(1, 4),
        ];
    }
}

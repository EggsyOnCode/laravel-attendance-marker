<?php

namespace Database\Factories;

use App\Models\ClassModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClassModelFactory extends Factory
{
    protected $model = ClassModel::class;

    public function definition()
    {
        return [
            'teacherid' => User::where('role', 'teacher')->inRandomOrder()->first()->id,
            'credit_hours' => $this->faker->numberBetween(1, 5),
        ];
    }
}

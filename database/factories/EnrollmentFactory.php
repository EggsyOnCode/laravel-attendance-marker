<?php

namespace Database\Factories;

use App\Models\Enrollment;
use App\Models\User;
use App\Models\ClassModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnrollmentFactory extends Factory
{
    protected $model = Enrollment::class;

    public function definition()
    {
        return [
            'studentid' => User::where('role', 'student')->inRandomOrder()->first()->id,
            'classid' => ClassModel::inRandomOrder()->first()->id,
        ];
    }
}

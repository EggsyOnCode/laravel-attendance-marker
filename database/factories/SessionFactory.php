<?php

namespace Database\Factories;

use App\Models\Session;
use App\Models\ClassModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class SessionFactory extends Factory
{
    protected $model = Session::class;

    public function definition()
    {
        return [
            'classid' => ClassModel::inRandomOrder()->first()->id,
            'starttime' => $this->faker->time(),
            'endtime' => $this->faker->time(),
            'session_date' => $this->faker->date(),
        ];
    }
}

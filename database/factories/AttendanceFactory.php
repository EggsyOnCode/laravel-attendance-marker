<?php

namespace Database\Factories;

use App\Models\Attendance;
use App\Models\Session;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceFactory extends Factory
{
    protected $model = Attendance::class;

    public function definition()
    {
        return [
            'classid' => Session::inRandomOrder()->first()->classid,
            'sessionid' => Session::inRandomOrder()->first()->id,
            'studentid' => User::where('role', 'student')->inRandomOrder()->first()->id,
            'isPresent' => $this->faker->boolean(75),
            'comments' => $this->faker->sentence(),
        ];
    }
}

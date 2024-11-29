<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\ClassModel;
use App\Models\Enrollment;
use App\Models\Session;
use App\Models\Attendance;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create 10 users (5 teachers, 5 students)
        User::factory(5)->create(['role' => 'teacher']);
        User::factory(5)->create(['role' => 'student']);

        // Create 3 classes with random teachers
        $classes = ClassModel::factory(3)->create();

        // Enroll students in random classes
        $students = User::where('role', 'student')->get();
        foreach ($students as $student) {
            Enrollment::create([
                'studentid' => $student->id,
                'classid' => $classes->random()->id,
            ]);
        }

        // Create 10 sessions for random classes
        $sessions = Session::factory(10)->create();

        // Create attendance records for each student in each session
        foreach ($sessions as $session) {
            $studentsInClass = Enrollment::where('classid', $session->classid)->pluck('studentid');
            foreach ($studentsInClass as $studentId) {
                Attendance::factory()->create([
                    'classid' => $session->classid,
                    'sessionid' => $session->id,
                    'studentid' => $studentId,
                ]);
            }
        }
    }
}

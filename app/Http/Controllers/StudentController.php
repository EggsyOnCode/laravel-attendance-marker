<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use Illuminate\Support\Facades\DB; 

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

 public function dashboard()
    {
        $studentId = auth()->user()->id; // Get the currently authenticated student's ID
        
        // Fetch the attendance data for the student
        $attendanceData = $this->getStudentAttendance($studentId);
        
        // Return the view with the attendance data
        return view('student.dashboard', compact('attendanceData'));
    }

    /**
     * Fetch the student's attendance for all enrolled classes
     *
     * @param int $studentId
     * @return array
     */
    private function getStudentAttendance($studentId)
    {
        // Fetch all enrollments for the student
        $enrollments = DB::table('enrollments')
                        ->join('class', 'enrollments.classid', '=', 'class.id')
                        ->where('enrollments.studentid', $studentId)
                        ->get(['class.id as classid']);

        $attendanceData = [];

        // Loop through all enrollments to fetch the attendance for each class
        foreach ($enrollments as $enrollment) {
            $attendance = DB::table('attendance')
                            ->join('sessions', 'attendance.sessionid', '=', 'sessions.id')
                            ->where('attendance.studentid', $studentId)
                            ->where('attendance.classid', $enrollment->classid)
                            ->get(['attendance.isPresent', 'sessions.session_date']);

            // Calculate total attendance and percentage
            $totalSessions = $attendance->count();
            $attendedSessions = $attendance->where('isPresent', 1)->count();
            $percentage = $totalSessions ? ($attendedSessions / $totalSessions) * 100 : 0;

            // Add color class based on attendance percentage
            $attendanceClass = 'green';  // Default green
            if ($percentage < 50) {
                $attendanceClass = 'red';
            } elseif ($percentage < 75) {
                $attendanceClass = 'yellow';
            }

            $attendanceData[] = [
                'classid' => $enrollment->classid,
                'total_sessions' => $totalSessions,
                'attended_sessions' => $attendedSessions,
                'percentage' => $percentage,
                'attendance_class' => $attendanceClass,
            ];
        }

        return $attendanceData;
    }
}

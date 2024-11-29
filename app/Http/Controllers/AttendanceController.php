<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Session;
use App\Models\Enrollment;

class AttendanceController extends Controller
{
    public function markAttendance(Request $request)
    {
        $request->validate([
            'classid' => 'required|integer',
            'sessionid' => 'required|integer',
            'studentid' => 'required|integer',
            'isPresent' => 'required|boolean'
        ]);

        Attendance::create([
            'classid' => $request->classid,
            'sessionid' => $request->sessionid,
            'studentid' => $request->studentid,
            'isPresent' => $request->isPresent,
            'comments' => $request->comments ?? null
        ]);

        return response()->json(['message' => 'Attendance marked successfully!']);
    }

    public function create($sessionId)
    {
        // Fetch session details
        $session = Session::findOrFail($sessionId);

        // Fetch students for the session by using the Enrollment model
        $students = Enrollment::where('classid', $session->classid)
            ->with('student') // Eager load the related student
            ->get()
            ->pluck('student'); // Extract the students

        return view('attendance.create', compact('session', 'students'));
    }


    public function store(Request $request, $sessionId)
    {
    // Fetch the class ID associated with the session
    $classId = Session::findOrFail($sessionId)->classid;

    // Get attendance data from the request
    $attendanceData = $request->input('attendance', []); // Checkboxes for attendance
    $statusData = $request->input('status', []);         // Dropdowns for status

    // Loop through all students in the attendance data
    foreach ($statusData as $studentId => $status) {
        // Determine if the student is present or absent
        $isPresent = isset($attendanceData[$studentId]) ? 1 : 0;

        // Check if an entry exists for this session, class, and student
        $attendance = Attendance::where([
            ['sessionid', '=', $sessionId],
            ['classid', '=', $classId],
            ['studentid', '=', $studentId],
        ])->first();

        if ($attendance) {
            // Update existing attendance record
            $attendance->update([
                'isPresent' => $isPresent,
                'comments' => $status,
            ]);
        } else {
            // Insert a new attendance record
            Attendance::create([
                'sessionid' => $sessionId,
                'classid' => $classId,
                'studentid' => $studentId,
                'isPresent' => $isPresent,
                'comments' => $status,
            ]);
        }
    }

    // Redirect back to the teacher dashboard with a success message
    return redirect()->route('teacher.dashboard')->with('success', 'Attendance has been recorded.');
    }


}


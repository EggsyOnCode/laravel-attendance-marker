<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Attendance;

class SessionController extends Controller
{
    public function create()
    {
        return view('sessions.create'); // Create a 'sessions.create' view for the form
    }

    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'classid' => 'required|integer',
            'starttime' => 'required|date_format:H:i',
            'endtime' => 'required|date_format:H:i',
            'session_date' => 'required|date',
        ]);

        // Store the session in the database
        Session::create([
            'classid' => $request->classid,
            'starttime' => $request->starttime,
            'endtime' => $request->endtime,
            'session_date' => $request->session_date,
        ]);

        // Redirect back to the teacher dashboard or another page
        return redirect()->route('teacher.dashboard')->with('success', 'Session created successfully.');
    }

    public function markAttendance($sessionId, $classId, $attendanceData)
    {
        foreach ($attendanceData as $studentId => $data) {
            $attendance = Attendance::updateOrCreate(
                [
                    'sessionid' => $sessionId,  // Use the correct column name
                    'classid' => $classId,      // Use the correct column name
                    'studentid' => $studentId,  // Use the correct column name
                ],
                [
                    'isPresent' => $data['is_present'], // Use the correct column name
                    'comments' => $data['status'],     // Map `comments` to `status`
                ]
            );
        }
    }

}

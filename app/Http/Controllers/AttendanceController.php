<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

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
}


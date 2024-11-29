<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Session;

class TeacherController extends Controller
{

    public function dashboard()
    {
        // Ensure the user is logged in and has the teacher role
        if (Auth::check() && Auth::user()->role === 'teacher') {
            $date = date('Y-m-d'); // Get today's date
            $sessions = Session::getTeacherSessionsForDay(Auth::id(), $date);
            return view('teacher.dashboard', compact('sessions', 'date'));
        }

        return redirect()->route('login');
    }
}

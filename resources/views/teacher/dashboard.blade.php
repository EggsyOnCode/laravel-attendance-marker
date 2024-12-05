<!-- resources/views/teacher/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher - NUST Attendance System (NAS)</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        NUST Attendance System
    </header>
    <main>
        <div class="container large">
            <h2>Welcome, {{ Auth::user()->fullname }}</h2>
            <h3>Sessions for {{ $date }}</h3>
            
            @if ($sessions->isEmpty())
                <p>No sessions scheduled for today.</p>
            @else
                <ul>
                    @foreach ($sessions as $session)
                        <li class="session">
                            <p>Class ID: {{ $session->class_id }}</p>
                            <p>Start: {{ $session->starttime }}</p>
                            <p>End: {{ $session->endtime }}</p>
                            <a href="{{ route('attendance.create', ['sessionid' => $session->session_id]) }}">Mark Attendance</a>
                        </li>
                    @endforeach
                </ul>
            @endif

            <div class="create-session">
                <a href="{{ route('create.session') }}" class="btn">Create New Session</a>
            </div>
        </div>
    </main>
    <footer>
        &copy; 2024 NUST Attendance System
    </footer>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance - NUST Attendance System (NAS)</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        NUST Attendance System
    </header>
    <main>
        <div class="container large">
            <h2>Mark Attendance for Session {{ $session->id }}</h2>
            <form action="{{ route('attendance.store', $session->id) }}" method="POST">
                @csrf
                <table class="table">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Present</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{ $student->fullname }}</td>
                                <td>
                                    <!-- Hidden input for default "absent" value -->
                                    <input type="hidden" name="attendance[{{ $student->id }}]" value="0" />
                                    <input type="checkbox" name="attendance[{{ $student->id }}]" value="1" />
                                </td>
                                <td>
                                    <select name="status[{{ $student->id }}]">
                                        <option value="Present">Present</option>
                                        <option value="Absent">Absent</option>
                                    </select>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary">Submit Attendance</button>
            </form>
        </div>
    </main>
    <footer>
        &copy; 2024 NUST Attendance System
    </footer>
</body>
</html>

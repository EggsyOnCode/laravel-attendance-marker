<!-- resources/views/sessions/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Session - NUST Attendance System (NAS)</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        NUST Attendance System
    </header>
    <main>
        <div class="container">
            <h2>Create New Session</h2>

            <form action="{{ route('store.session') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="classid">Class ID</label>
                    <input type="text" name="classid" id="classid" required>
                </div>

                <div class="form-group">
                    <label for="starttime">Start Time</label>
                    <input type="time" name="starttime" id="starttime" required>
                </div>

                <div class="form-group">
                    <label for="endtime">End Time</label>
                    <input type="time" name="endtime" id="endtime" required>
                </div>

                <div class="form-group">
                    <label for="session_date">Session Date</label>
                    <input type="date" name="session_date" id="session_date" required>
                </div>

                <button type="submit" class="btn btn-primary">Create Session</button>
            </form>
        </div>
    </main>
    <footer>
        &copy; 2024 NUST Attendance System
    </footer>
</body>
</html>

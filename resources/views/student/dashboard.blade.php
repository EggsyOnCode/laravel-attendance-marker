<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Student Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f8f8f8;
        }

        .red {
            color: white;
            background-color: #e74c3c;
        }

        .yellow {
            background-color: #f1c40f;
        }

        .green {
            background-color: #2ecc71;
            color: white;
        }

        .percentage {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Student Dashboard</h1>

        <table>
            <thead>
                <tr>
                    <th>Class</th>
                    <th>Total Sessions</th>
                    <th>Attended Sessions</th>
                    <th>Attendance (%)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attendanceData as $attendance)
                    <tr class="{{ $attendance['attendance_class'] }}">
                        <td>{{ $attendance['classid'] }}</td>
                        <td>{{ $attendance['total_sessions'] }}</td>
                        <td>{{ $attendance['attended_sessions'] }}</td>
                        <td class="percentage">{{ $attendance['percentage'] }}%</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <footer>
        &copy; 2024 NUST Attendance System
    </footer>
</body>
</html>

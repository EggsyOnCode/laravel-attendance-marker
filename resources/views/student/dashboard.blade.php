@extends('layouts.app')

@section('title', 'Student Dashboard')

@section('content')
<div class="container large">
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
@endsection
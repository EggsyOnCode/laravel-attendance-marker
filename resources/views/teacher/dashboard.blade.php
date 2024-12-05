<!-- resources/views/teacher/dashboard.blade.php -->

@extends('layouts.app')

@section('title', 'Teacher - NUST Attendance System (NAS)')

@section('content')
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

    <div class="create-session button">
        <a href="{{ route('create.session') }}" class="btn">Create New Session</a>
    </div>
</div>
@endsection
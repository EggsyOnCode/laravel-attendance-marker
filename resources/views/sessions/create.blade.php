<!-- resources/views/sessions/create.blade.php -->
@extends('layouts.app')

@section('title', 'Create Session - NUST Attendance System (NAS)')

@section('content')
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
@endsection
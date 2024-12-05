@extends('layouts.app')

@section('title', 'Login - NUST Attendance System (NAS)')

@section('content')
<div class="container">
    <h2>NAS</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Field -->
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password Field -->
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn">Login</button>
    </form>
</div>
@endsection
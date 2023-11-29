<!-- resources/views/auth/login.blade.php -->

@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('loginForm') }}">
        @csrf

        <div>
            <label for="username">Username</label>
            <input id="username" type="text" name="username" required autofocus>
        </div>

        <div>
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
        </div>

        <div>
            <button type="submit">Login</button>
        </div>
    </form>
@endsection

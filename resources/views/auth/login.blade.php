@extends('layouts.guest')

@section('content')
<div class="container mt-5" style="max-width:400px">
    <h2 class="mb-4">Sign In Masyarakat</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required autofocus>
            @error('username')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
            @error('password')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-primary w-100">Sign In</button>
    </form>
    <div class="mt-3 text-center">
        <small>Belum punya akun? <a href="#">Register</a></small>
    </div>
</div>
@endsection

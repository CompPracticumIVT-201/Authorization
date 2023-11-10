@extends('layouts.main')

@section('content')
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group">
            <label for="old_password">Old Password</label>
            <input type="password" name="old_password" class="form-control" id="old_password" placeholder="Enter your old password" required>
        </div>

        <div class="form-group">
            <label for="password">New Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Enter your new password" required>
        </div>

        <div class="form-group">
            <label for="password-confirm">Confirm New Password</label>
            <input type="password" name="password_confirmation" class="form-control" id="password-confirm" placeholder="Confirm your new password" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3 mb-3">Reset Password</button>
    </form>
@endsection

@extends('layouts.main')

@section('content')
    <form action="{{ route('login') }}" method="post">
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
            <label for="login">Login or Email</label>
            <input type="text" name="login" class="form-control" id="login" placeholder="Enter login or email"
                value="{{ old('login') }}">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        </div>

        <button type="submit" class="btn btn-primary mt-3 mb-3">Login</button>
    </form>
@endsection

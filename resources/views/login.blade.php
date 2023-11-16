@extends('layouts.main')

@section('content')
    <form action="{{ route('login') }}" method="post">
        @csrf

        @if ($errors->any())
<<<<<<< HEAD
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
=======
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
>>>>>>> b660dffaa6957ff367b848c293c400663f109bdb
        @endif

        <div class="form-group">
            <label for="login">Login or Email</label>
            <input type="text" name="login" class="form-control" id="login" placeholder="Enter login or email"
<<<<<<< HEAD
                   value="{{ old('login') }}">
=======
                value="{{ old('login') }}">
>>>>>>> b660dffaa6957ff367b848c293c400663f109bdb
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        </div>

        <button type="submit" class="btn btn-primary mt-3 mb-3">Login</button>
<<<<<<< HEAD

        <!-- Добавленная кнопка для перехода на другую страницу -->
        <a href="{{ route('password.request_email') }}" class="btn btn-secondary mt-3 mb-3">Забыли пароль?</a>
=======
>>>>>>> b660dffaa6957ff367b848c293c400663f109bdb
    </form>
@endsection

@extends('layouts.main')

@section('content')
    @if (auth()->check())
        <p>Hello, {{ auth()->user()->login }}</p>
        <p>Email: {{ auth()->user()->email }}</p>
        <p><a href="{{ route('password.request') }}">Сбросить пароль</a></p>
    @else
        <p>You are not logged in.</p>
    @endif

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Выход</button>
    </form>
@endsection

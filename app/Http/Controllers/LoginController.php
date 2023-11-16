<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        $login = request()->input('login');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'login';

        request()->merge([$field => $login]);

        return $field;
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login'); // Перенаправление на страницу входа (login)
    }
}

    
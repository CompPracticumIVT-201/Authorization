<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Controller;

class ForgotPasswordController extends Controller
{
    // Отображение формы запроса на сброс пароля
    public function showLinkRequestForm()
    {
        return view('email');
    }
ё
    // Отправка ссылки на сброс пароля
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? redirect()->route('login')->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
}

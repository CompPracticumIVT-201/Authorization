<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;


class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    public function showResetForm(Request $request)
    {
        return view('reset');
    }

    public function reset(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();

            // Пароль успешно изменен
            return redirect('/home')->with('success', 'Пароль успешно изменен.');
        } else {
            // Старый пароль введен неправильно
            return back()->withErrors(['old_password' => 'Старый пароль введен неправильно.']);
        }
    }
}
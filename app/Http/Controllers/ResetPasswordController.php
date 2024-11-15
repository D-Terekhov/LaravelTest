<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function create(Request $request) {
       return view('reset-password');
    }

    public function store(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:10|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user ->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60)
                ]) ->save();
            });

            if ($status === Password::PASSWORD_RESET) {
                return redirect() ->route('login') ->with('status', trans($status));
            }

            return back() ->withInput($request ->only('email')) ->withErrors(['email' => trans($status)]);
    }
}

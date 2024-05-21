<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password; // Sesuaikan use statement

class risetpw extends Controller
{
    public function showResetForm(Request $request,)
    {
        return view('reset-password', ['email' => $request->email, 'token' => $request->token]);
    }
    
    public function reset(Request $request)
{
    $token = $request->input('token');
    $request->validate([
        'token'=> 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->save();
        }
    );

    if ($status === Password::PASSWORD_RESET) {
        return redirect()->route('admin')->with('status', __($status));
    } else {
        return back()->withErrors(['email' => [__($status)]]);
    }
}
}

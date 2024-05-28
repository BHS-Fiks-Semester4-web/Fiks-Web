<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Password;

class LandingController extends Controller
{

    public function signin()
    {
        return view('signin', [
            'title' => 'Sign-in'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            if ($user->status === 'aktif') {
                if ($user->role === 'admin') {
                    $request->session()->regenerate();
            
                    return redirect()->intended('/dashboard');
                } else {
                    Auth::logout();
                    return back()->with('error', 'Anda tidak memiliki akses.');
                }
            } else {
                return back()->with('error', 'Akun Anda tidak aktif.');
            }            
        }
        return back()->withErrors(['email' => 'Kombinasi email dan password tidak valid.']);
    }    

    public function signout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

    // public function dashboard()
    // {
    //     return view('dashboard', [
    //         'title' => 'Dashboard',
    //     ]);
    // }
    public function ForgotPw()
    {
        return view('forgot_password', [
            'title' => 'Dashboard',
        ]);
    }
    public function sendResetLinkEmail(Request $request)
    {
        $email = $request->input('email');
        $request->validate([
            'email' => 'required|email',
        ]);
    
        // Generate OTP
        $otp = mt_rand(100000, 999999);
    
        // Save OTP in session
        $request->session()->put('otp', $otp);
    
        // Send email
        $mail = new PHPMailer(true);
    
        try {
            $mail->isSMTP();
            $mail->Host = env('MAIL_HOST');
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->SMTPSecure = env('MAIL_ENCRYPTION');
            $mail->Port = env('MAIL_PORT');
    
            $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $mail->addAddress($request->email);
    
            $mail->isHTML(true);
            $mail->Subject = 'Reset Password OTP';
            $mail->Body = 'Your OTP is: ' . $otp;
    
            $mail->send();
            return redirect()->route('password.verify')->with('success', 'OTP has been sent to your email.');
            
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Email could not be sent. Please try again later.');
        }
    }
    
    public function verifyOTP(Request $request)
    {
        $otpFromSession = $request->session()->get('otp');
        $enteredOTP = $request->input('otp');
    
        if ($otpFromSession == $enteredOTP) {
            // OTP cocok, lanjutkan ke halaman reset password
            $email = $request->input('email');
            $user = User::where('email', $email)->first();
            if ($email) {
                // Kirim email dengan tautan reset password dan token
                $token = Password::getRepository()->create($user);
    
                return redirect()->route('password.reset', ['token' => $token, 'email' => $email]);
            } else {
                return redirect()->back()->with('error', 'Email is missing. Please try again.');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid OTP. Please try again.');
        }
    }
    





    public function showVerifyOTPForm()
    {
    return view('verifyOtp');
    }

 

}

<?php

namespace App\Http\Controllers\Mobile;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class LupaPw extends Controller
{
    public function sendResetLinkEmail(Request $request)
    {
        $email = $request->input('email');
        $request->validate([
            'email' => 'required|email',
        ]);
    
        $otp = mt_rand(100000, 999999);
    
        $request->session()->put('otp', $otp);
    
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
            return response()->json([
                'success' => true,
                'message' => 'OTP Sudah Terkirim Ke Email Anda.'
            ]);
            
            
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Email could not be sent. Please try again later.');
        }
}

    }
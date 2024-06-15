<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class AuthController extends Controller
{
    public function loginMobile(Request $request)
    {
        try {
            // Validasi permintaan
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            // Coba melakukan autentikasi pengguna
            if (Auth::attempt($request->only('email', 'password'))) {
                // Autentikasi berhasil
                $user = Auth::user();

                // Generate and save API token if needed
                // $token = $user->createToken('token-name')->plainTextToken;
                // $user->api_token = $token;
                // $user->save();

                return response()->json([
                    'status' => 'success',
                    'id' => $user->id,
                    'user' => [
                        'username' => $user->username,
                        'name' => $user->name,
                        'email' => $user->email,
                        'alamat' => $user->alamat,
                        'agama' => $user->agama,
                        'tanggal_lahir' => $user->tanggal_lahir,
                        'no_hp' => $user->no_hp,
                        // 'token' => $token,
                    ],
                    'message' => 'Login berhasil'
                ], 200);
            } else {
                // Autentikasi gagal
                return response()->json([
                    'status' => 'error',
                    'message' => 'Email atau password salah'
                ], 401);
            }
        } catch (\Exception $e) {
            // Tangani kesalahan
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat melakukan login: ' . $e->getMessage()
            ], 500);
        }
    }

    public function registerMobile(Request $request)
    {
        try {
            // Validasi permintaan
            $request->validate([
                'username' => 'required',
                'email' => 'required|email|unique:users,email', // Validasi unique untuk email
                'password' => 'required',
                'alamat' => 'required',
                'tanggal_lahir' => 'required',
                'agama' => 'required',
                'name' => 'required',
                'no_hp' => 'required',
            ]);

            // Buat pengguna baru
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'name' => $request->name,
                'alamat' => $request->alamat,
                'agama' => $request->agama,
                'tanggal_lahir' => $request->tanggal_lahir,
                'no_hp' => $request->no_hp,
            ]);

            // Beri respons dengan sukses
            return response()->json([
                'status' => 'success',
                'message' => 'Registrasi berhasil',
                'user' => $user,
            ], 201);
        } catch (\Exception $e) {
            // Tangani kesalahan
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat melakukan registrasi: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Validasi permintaan
            $request->validate([
                'username' => 'required',
                'email' => 'required|email',
                'alamat' => 'required',
                'tanggal_lahir' => 'required',
                'agama' => 'required',
                'name' => 'required',
                'no_hp' => 'required',
            ]);

            // Cari pengguna berdasarkan ID
            $user = User::findOrFail($id);

            // Perbarui informasi pengguna
            $user->update([
                'username' => $request->username,
                'email' => $request->email,
                'name' => $request->name,
                'alamat' => $request->alamat,
                'agama' => $request->agama,
                'tanggal_lahir' => $request->tanggal_lahir,
                'no_hp' => $request->no_hp,
            ]);

            // Beri respons dengan sukses
            return response()->json([
                'status' => 'success',
                'message' => 'Profil pengguna berhasil diperbarui',
                'user' => $user,
            ], 200);
        } catch (\Exception $e) {
            // Tangani kesalahan
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat memperbarui profil pengguna: ' . $e->getMessage(),
            ], 500);
        }
    }
    public function lupa(Request $request)
    {
        $email = $request->input('email');
        $request->validate([
            'email' => 'required|email',
        ]);
    
        // Generate OTP
        $otp = mt_rand(100000, 999999);
    
        //save database otp
        $user = User::where('email', $request->email)->first();
        $user->update([
            'otp' => $otp
        ]);
        
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
            return response()->json([
                'success' => true,
                'message' => 'OTP Sudah Terkirim Ke Email Anda.'
            ]);
            
            
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Email could not be sent. Please try again later.');
        }
}

public function resetPassword(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users,email',
        'otp' => 'required',
        'password' => 'required',
    ]);

    // Query the user once
    $user = User::where('email', $request->email)->first();

    // Check if OTP matches
    if ($user->otp != $request->otp) {
        if ($user->otp == null) {
            return response()->json(['message' => 'OTP not sent'], 400);
        }
        return response()->json(['message' => 'Invalid OTP'], 400);
    }

    // Reset password and clear OTP
    $user->password = bcrypt($request->password);
    $user->otp = null; // Clear the OTP
    $user->save();

    return response()->json(['message' => 'Password reset successful'], 200);
}


    // Fungsi untuk mendapatkan data pengguna berdasarkan token
    // public function getUserByToken(Request $request)
    // {
    //     try {
    //         // Mendapatkan token dari header Authorization
    //         $token = $request->bearerToken();
    //         if (!$token) {
    //             return response()->json(['message' => 'Token tidak valid'], 401);
    //         }

    //         // Mengambil data pengguna berdasarkan token
    //         $user = Auth::user(
    //             'username',
    //         );

    //         // Periksa apakah pengguna ditemukan
    //         if (!$user) {
    //             return response()->json(['message' => 'Pengguna tidak ditemukan'], 404);
    //         }

    //         // Mengembalikan data pengguna
    //         return response()->json([
    //             'user' => $user->only(['username', 'email', 'alamat', 'agama', 'tanggal_lahir', 'no_hp']),
    //         ], 200);
    //     } catch (\Exception $e) {
    //         return response()->json(['message' => 'Terjadi kesalahan saat mengambil data pengguna'], 500);
    //     }
    // }
}
?>
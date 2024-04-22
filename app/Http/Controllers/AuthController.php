<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\User;
// use Illuminate\Support\Facades\Hash;


// class AuthController extends Controller
// {
//     public function loginMobile(Request $request){
//         $credentials = $request->only('email', 'password');

//         if (auth()->attempt($credentials)) {
//             $user = auth()->user();
//             return response()->json([
//                 'status' => 'success',
//                 'username' => $user->username,
//                 'name' => $user->name,
//                 'email' => $user->email,
//                 'alamat' => $user->alamat,
//                 'agama' => $user->agama,
//                 'tanggal_lahir' => $user->tanggal_lahir,
//                 'message' => 'Login berhasil'
//             ]);
//         } else {
//             return response()->json([
//                 'status' => 'error',
//                 'message' => 'Kredensial tidak valid'
//             ], 401);
//         }
//     }
//} 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

                return response()->json([
                    'status' => 'success',
                    'username' => $user->username,
                    'name' => $user->name,
                    'email' => $user->email,
                    'alamat' => $user->alamat,
                    'agama' => $user->agama,
                    'tanggal_lahir' => $user->tanggal_lahir,
                    'message' => 'Login berhasil',
                    'message' => 'Email atau password salah'

                ],200);
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
                'message' => 'Terjadi kesalahan saat melakukan login'
            ], 500);
        }
    }


}


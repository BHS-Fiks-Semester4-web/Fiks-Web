<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

    public function registerMobile(Request $request)
    {
        try {
            // Validasi permintaan
            $request->validate([
                'username' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'alamat' => 'required',
                'tanggal_lahir' => 'required',
                'agama' => 'required',
                'name' => 'required',
                'no_hp' => 'required',
                
                // Tambahkan validasi untuk bidang lainnya seperti alamat, agama, tanggal_lahir, dll. sesuai kebutuhan.
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
                // Tambahkan bidang lainnya sesuai kebutuhan.
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
                'message' => 'Terjadi kesalahan saat melakukan registrasi',
            ], 500);
        }
    }


}


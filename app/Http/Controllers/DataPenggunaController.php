<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DataPenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        return view('data_pengguna.index', [
            'title' => 'Data Pengguna',
            'data_penggunas' => User::getUser($search)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data_pengguna.data_pengguna_create', [
            'title'=>'Membuat Data Pengguna'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'alamat' => 'required|max:255',
            'agama' => 'required|max:255',
            'tanggal_lahir' => 'required|max:255',
            'no_hp' => 'required|max:255',
            'email' => 'required|email|max:255',
            'username' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'role' => 'required|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $foto = $request->file('foto');

        // Ubah foto menjadi blob
        $fotoBlob = file_get_contents($foto->getRealPath());
        // Proses penyimpanan data
        $user = new User();
        $user->name = $request->name;
        $user->alamat = $request->alamat;
        $user->agama = $request->agama;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->no_hp = $request->no_hp;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->foto = $fotoBlob;
        
        $user->save();

        return redirect('/data_pengguna')->with('create', 'Data pengguna berhasil dibuat.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengguna = User::findOrFail($id);
        return view('data_pengguna.data_pengguna_detail', [
            'title' => 'Detail',
            'data_pengguna' => $pengguna,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data_pengguna = User::findOrFail($id);
        $title = 'Detail';
        return view('data_pengguna.data_pengguna_edit', compact('data_pengguna', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'alamat' => 'required|max:255',
            'agama' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required|max:255',
            'email' => 'required|email|max:255',
            'username' => 'required|max:255|unique:users,username,' . $id,
            'password' => 'sometimes|max:255',
            'role' => 'required|max:255',
            'foto' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->alamat = $request->alamat;
        $user->agama = $request->agama;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->no_hp = $request->no_hp;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->role = $request->role;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoBlob = file_get_contents($foto->getRealPath());
            $user->foto = $fotoBlob;
        }

        $user->save();

        return redirect('/data_pengguna')->with('update', 'Data pengguna berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data_pengguna = User::findOrFail($id);
        $data_pengguna->status = 'tidak';
        $data_pengguna->save();
        return redirect('/data_pengguna')->with('delete', 'Data dihapus');
    }
        

    public function truncate()
    {
        User::query()->update(['status' => 'tidak']);
        return back()->with('delete', 'Data dihapus');
    }

    public function toggleRole($id)
    {
        // Temukan pengguna berdasarkan ID
        $user = User::findOrFail($id);
    
        // Toggle peran pengguna
        $user->role = ($user->role === 'admin') ? 'karyawan' : 'admin';
        
        // Simpan perubahan
        $user->save();
    
        return redirect()->route('data_pengguna.index')->with('success', 'Peran pengguna berhasil diperbarui.');
    }
    

}

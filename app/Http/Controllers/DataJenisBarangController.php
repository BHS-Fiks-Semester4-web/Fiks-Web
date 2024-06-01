<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisBarang;

class DataJenisBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        return view('data_jenis_barang.index', [
            'title' => 'Data Jenis Barang',
            'data_jenis_barangs' => JenisBarang::getJenisBarang($search)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data_jenis_barang.data_jenis_barang_create', [
            'title'=>'Data Jenis Barang Create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_jenis_barang' => 'required|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $foto = $request->file('foto');
        $fotoBlob = file_get_contents($foto->getRealPath());

        $cek = JenisBarang::where('nama_jenis_barang', $validated['nama_jenis_barang'])->first();

        if ($cek) {
            if ($cek->status == 'aktif') {
                return back()->with('message', 'Data sudah ada dan sudah aktif');
            } else {
                $cek->status = 'aktif';
                $cek->foto = $fotoBlob;
                $cek->save();

                return redirect('/data_jenis_barang')->with('update', 'Data diperbarui menjadi aktif');
            }
        } else {
            $jenisBarang = new JenisBarang();
            $jenisBarang->nama_jenis_barang = $validated['nama_jenis_barang'];
            $jenisBarang->foto = $fotoBlob;
            $jenisBarang->status = 'aktif'; 
            
            $jenisBarang->save();
            
            return redirect('/data_jenis_barang')->with('create', 'Data ditambahkan');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jenisBarang = JenisBarang::findOrFail($id);

        return view('data_jenis_barang.data_jenis_barang_edit', [
            'title' => 'Mengedit',
            'jenis_data_barang' => $jenisBarang,
        ]);
    }
    

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_jenis_barang' => 'required|max:255',
            'foto' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $jenisBarang = JenisBarang::findOrFail($id);
        $jenisBarang->update($validated);
        
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoBlob = file_get_contents($foto->getRealPath());
            $jenisBarang->foto = $fotoBlob;
        }
    
        return redirect('/data_jenis_barang')->with('update', 'Data diperbarui');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jenisBarang = JenisBarang::findOrFail($id);
        $jenisBarang->update(['status' => 'tidak']);
        return redirect('/data_jenis_barang')->with('delete', 'Data dihapus');
    }

    public function truncate()
    {
        JenisBarang::query()->update(['status' => 'tidak']);
        return back()->with('delete', 'Data dihapus');
    }
}

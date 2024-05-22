<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\JenisBarang;
use App\Models\Pemasok;

class DataBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $data_barangs = Barang::getBarang($search);

        return view('data_barang.index', [
            'title'=>'Data Barang',
            'barangs'=> $data_barangs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data_barang.data_barang_create', [
            'title' => 'Membuat',
            'suppliers' => Pemasok::where('status', 'aktif')->get(),
            'jenisBarangs' => JenisBarang::where('status', 'aktif')->get()
        ]);
    }

    // Metode store
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_supplier' => 'nullable|exists:supplier,id',
            'id_jenis_barang' => 'required|exists:jenis_barang,id',
            'nama_barang' => 'required|max:255',
            'stok_barang' => 'required|integer',
            'harga_beli_barang' => 'required|integer',
            'harga_sebelum_diskon_barang' => 'required|integer',
            'diskon_barang' => 'nullable|integer',
            'harga_setelah_diskon_barang' => 'required|integer',
            'exp_diskon_barang' => 'nullable|date',
            'garansi_barang' => 'nullable|string|max:255',
            'deskripsi_barang' => 'required|string',
            'foto_barang' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Jika ada file gambar yang diunggah, simpan sebagai blob
        if ($request->hasFile('foto_barang')) {
            $validated['foto_barang'] = file_get_contents($request->file('foto_barang')->getRealPath());
        }

        // Buat barang baru
        Barang::create($validated);

        return redirect('/data_barang')->with('create', 'Data ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data_barang = Barang::findOrFail($id);
        $data_barang->status = 'tidak';
        $data_barang->save();
        return redirect('/data_barang')->with('delete', 'Data dihapus');
    }

    public function truncate()
    {
        Barang::query()->update(['status' => 'tidak']);
        return back()->with('delete', 'Data dihapus');
    }

    public function createSupplier()
    {
        return view('data_barang.data_barang_create_pemasok', [
            'title' => 'Membuat Data Pemasok'
        ]);
    }
    
    public function createJenisBarang()
    {
        return view('data_barang.data_barang_create_jenis_barang', [
            'title' => 'Membuat Data Jenis Barang'
        ]);
    }
}

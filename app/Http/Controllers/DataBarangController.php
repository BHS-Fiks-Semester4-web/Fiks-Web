<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\JenisBarang;
use App\Models\Pemasok;
use App\Models\Pengeluaran;
use App\Models\DetailTransaksi;
use Illuminate\Support\Facades\DB;

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
            'harga_setelah_diskon_barang' => 'nullable|integer',
            'exp_diskon_barang' => 'nullable|date',
            'garansi_barang' => 'nullable|string|max:255',
            'deskripsi_barang' => 'required|string',
            'foto_barang' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'created_at' => now()
        ]);

        
        if ($request->hasFile('foto_barang')) {
            $validated['foto_barang'] = file_get_contents($request->file('foto_barang')->getRealPath());
        }

        
        $barang = Barang::create($validated);

        Pengeluaran::create([
            'id_barang' => $barang->id,
            'nama_pengeluaran' => $validated['nama_barang'],
            'total_pengeluaran' => $validated['stok_barang'] * $validated['harga_beli_barang'],
            'created_at' => now()
        ]);

        return redirect('/data_barang')->with('create', 'Data ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barang = Barang::with(['jenisBarang', 'supplier'])->findOrFail($id);
        return view('data_barang.data_barang_detail', [
            'title'         => 'Detail',
            'data_barang'   => $barang,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('data_barang.data_barang_edit', [
            'title' => 'Edit Data',
            'data_barang'=> Barang::findOrFail($id),
            'suppliers' => Pemasok::where('status', 'aktif')->get(),
            'jenisBarangs' => JenisBarang::where('status', 'aktif')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_supplier'                   => 'nullable|exists:supplier,id',
            'id_jenis_barang'               => 'required|exists:jenis_barang,id',
            'nama_barang'                   => 'required|max:255',
            'stok_barang'                   => 'required|integer',
            'harga_beli_barang'             => 'required|integer',
            'harga_sebelum_diskon_barang'   => 'required|integer',
            'diskon_barang'                 => 'nullable|integer',
            'harga_setelah_diskon_barang'   => 'nullable|integer',
            'exp_diskon_barang'             => 'nullable|date',
            'garansi_barang'                => 'nullable|string|max:255',
            'deskripsi_barang'              => 'required|string',
            'foto_barang'                   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data_barang = Barang::findOrFail($id);
        $data_barang->update($request->all());

        if ($request->hasFile('foto_barang')) {
            $foto = $request->file('foto_barang');
            $fotoBlob = file_get_contents($foto->getRealPath());
            $data_barang->foto_barang = $fotoBlob;
        }

        $stok_awal = $data_barang->stok_barang;
        if ($stok_awal == 0) {
            $data_barang->status = 'tidak';
            $data_barang->save();
        }

        $qty_detail_transaksi = DetailTransaksi::where('id_barang', $id)->sum('qty');
        $total_pengeluaran = ($qty_detail_transaksi + $stok_awal) * $data_barang->harga_beli_barang;

        Pengeluaran::where('id_barang', $id)->update([
            'nama_pengeluaran' => $data_barang->nama_barang,    
            'total_pengeluaran' => $total_pengeluaran,
        ]);

        return redirect('data_barang/'.$id)->with('update', 'Data barang berhasil diupdate.');
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
        // Barang::query()->update(['status' => 'tidak']);
        // return back()->with('delete', 'Data dihapus');
        Barang::query()->update(['status' => 'tidak']);
        
        DB::statement('SET FOREIGN_KEY_CHECKS = 0'); 
        DB::table('barang')->truncate(); 
        DB::statement('SET FOREIGN_KEY_CHECKS = 1'); 

        return back()->with('delete', 'Data dihapus');
    }
}

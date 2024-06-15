<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        return view('data_pengeluaran.index', [
            'title' => 'Data Pengeluaran',
            'data_pengeluarans' => Pengeluaran::getPengeluaran($search)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data_pengeluaran.data_pengeluaran_create', [
            'title' => 'Membuat',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_barang' => 'nullable|exists:barang,id',
            'nama_pengeluaran' => 'required|max:255',
            'total_pengeluaran' => 'required|integer',
            'created_at' => now()
        ]);

        Pengeluaran::create($validated);

        return redirect('/data_pengeluaran')->with('create', 'Data ditambahkan');
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
        return view('data_pengeluaran.data_pengeluaran_edit', [
            'title' => 'Edit Data',
            'pengeluaran'=> Pengeluaran::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_pengeluaran' => 'required|max:255',
            'total_pengeluaran' => 'required|integer',

        ]);

        $data_pengeluaran = Pengeluaran::findOrFail($id);

        $data_pengeluaran->nama_pengeluaran                   = $request->nama_pengeluaran;
        $data_pengeluaran->total_pengeluaran                  = $request->total_pengeluaran;

        $data_pengeluaran->save();

        return redirect('data_pengeluaran/')->with('update', 'Data barang berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $pengeluaran->status = 'tidak';
        $pengeluaran->save();
        return redirect('/data_pengeluaran')->with('delete', 'Data dihapus');
    }

    public function truncate()
    {
        Pengeluaran::query()->update(['status' => 'tidak']);
        
        DB::statement('SET FOREIGN_KEY_CHECKS = 0'); 
        DB::table('pengeluaran')->truncate(); 
        DB::statement('SET FOREIGN_KEY_CHECKS = 1'); 

        return back()->with('delete', 'Data dihapus');
    }
}

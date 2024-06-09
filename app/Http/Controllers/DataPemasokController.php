<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemasok;
use Illuminate\Support\Facades\DB;

class DataPemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        return view('data_pemasok.index', [
            'title' => 'Data Pemasok',
            'data_pemasoks' => Pemasok::getPemasok($search)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data_pemasok.data_pemasok_create', [
            'title'=>'Data Pemasok Create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_supplier' => 'required|max:255',
            'alamat_supplier' => 'required|max:255',
            'no_hp_supplier' => 'required|max:255',
            'created_at' => now()
        ]);

        $cek = Pemasok::where('nama_supplier', $validated['nama_supplier'])->get();
        if ($cek->isNotEmpty()) {
            return back()->with('message', 'Data sudah ada');
        } else {
            Pemasok::create($validated);
            return redirect('/data_pemasok')->with('create', 'Data ditambahkan');
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
    public function edit(string $id)
    {
        $pemasok = Pemasok::findOrFail($id);

        return view('data_pemasok.data_pemasok_edit', [
            'title' => 'Mengedit',
            'data_supplier' => $pemasok,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama_supplier' => 'required|max:255',
            'alamat_supplier' => 'required|max:255',
            'no_hp_supplier' => 'required|max:255',
        ]);
    
        $pemasok = Pemasok::findOrFail($id);
        $pemasok->update($validated);
    
        return redirect('/data_pemasok')->with('update', 'Data diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pemasok = Pemasok::findOrFail($id);
        $pemasok->status = 'tidak';
        $pemasok->save();
        return redirect('/data_pemasok')->with('delete', 'Data dihapus');
    }

    public function truncate()
    {
        // Pemasok::query()->update(['status' => 'tidak']);
        // return back()->with('delete', 'Data dihapus');

        Pemasok::query()->update(['status' => 'tidak']);
        
        DB::statement('SET FOREIGN_KEY_CHECKS = 0'); 
        DB::table('supplier')->truncate(); 
        DB::statement('SET FOREIGN_KEY_CHECKS = 1'); 

        return back()->with('delete', 'Data dihapus');
    }
}

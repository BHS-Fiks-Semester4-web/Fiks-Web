<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        return view('data_service.index', [
            'title' => 'Data Layanan',
            'data_services' => Service::getService($search)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data_service.data_service_create', [
            'title'=>'Data Layanan Create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_service' => 'required|max:255',
            'deskripsi_service' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif',
            'created_at' => now()
        ]);

        $foto = $request->file('foto');
        $fotoBlob = file_get_contents($foto->getRealPath());

        $cek = Service::where('nama_service', $validated['nama_service'])->first();

        if ($cek) {
            if ($cek->status == 'aktif') {
                return back()->with('message', 'Data sudah ada dan sudah aktif');
            } else {
                $cek->status = 'aktif';
                $cek->foto = $fotoBlob;
                $cek->save();

                return redirect('/data_service')->with('update', 'Data diperbarui menjadi aktif');
            }
        } else {
            $service = new Service();
            $service->nama_service = $validated['nama_service'];
            $service->deskripsi_service = $validated['deskripsi_service'];
            $service->foto = $fotoBlob;
            $service->status = 'aktif'; 
            
            $service->save();
            
            return redirect('/data_service')->with('create', 'Data ditambahkan');
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
        $service = Service::findOrFail($id);

        return view('data_service.data_service_edit', [
            'title' => 'Mengedit',
            'service' => $service,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama_service' => 'required|max:255',
            'deskripsi_service' => 'required|string',
            'foto' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $service = Service::findOrFail($id);
        $service->update($validated);
        
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoBlob = file_get_contents($foto->getRealPath());
            $service->foto = $fotoBlob;
        }
    
        return redirect('/data_service')->with('update', 'Data diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->update(['status' => 'tidak']);
        return redirect('/data_service')->with('delete', 'Data dihapus');
    }

    public function truncate()
    {
        Service::query()->update(['status' => 'tidak']);
        return back()->with('delete', 'Data dihapus');
    }
}

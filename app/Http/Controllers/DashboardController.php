<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\User;
use App\Models\Pemasok;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Barang::where('diskon_barang', '>', 0)->get();
        $jenisBarang = Barang::where('status', 'aktif');
        $jumlahBarang = Barang::where('status', 'aktif')->sum('stok_barang'); // Menghitung jumlah total stok barang
        $jumlahKaryawan = User::where('status', 'aktif')->where('role', 'karyawan')->count();
        $jumlahAdmin = User::where('status', 'aktif')->where('role', 'admin')->count();
        $jumlahSupplier = Pemasok::where('status', 'aktif')->count();
        
        return view('dashboard', [
            'title' => 'Dashboard',
            'items' => $items,
            'jenisBarang' => $jenisBarang,
            'jumlahBarang' => $jumlahBarang, // Menggunakan jumlah total stok barang
            'jumlahKaryawan' => $jumlahKaryawan,
            'jumlahAdmin' => $jumlahAdmin,
            'jumlahSupplier' => $jumlahSupplier
        ]);
    }

    public function indexDataBarang(Request $request)
    {
        $search = $request->input('search');
        $barang = Barang::getBarangForDashboard($search);

        return view('dashboard.detail_data_barang',[
            'title' => 'Data Barang',
            'data_barangs' => $barang
        ]);
    }

    // public function indexDataKaryawan()
    // {
    //     $karyawan = User::where('status', 'aktif')->where('role', 'karyawan');

    //     return view('dashboard.detail_data_karyawan',[
    //         'title' => 'Data Karyawan',
    //         'karyawans' => $karyawan
    //     ]);
    // }

    // public function indexDataAdmin()
    // {
    //     $admin = User::where('status', 'aktif')->where('role', 'admin');

    //     return view('dashboard.detail_data_admin',[
    //         'title' => 'Data Admin',
    //         'admins' => $admin
    //     ]);
    // }
    
    // public function indexDataPemasok()
    // {
    //     $supplier = Pemasok::where('status', 'aktif');

    //     return view('dashboard.detail_data_supplier',[
    //         'title' => 'Data Supplier',
    //         'suppliers' => $supplier
    //     ]);
    // }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}

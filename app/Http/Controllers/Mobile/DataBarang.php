<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mobile\Barang;

class DataBarang extends Controller
{
    public function index()
    {
        $barangs = Barang::all();

        foreach ($barangs as $barang) {
            $barang->foto_barang = base64_encode($barang->foto_barang); // Konversi BLOB ke base64
        }

        $response = [
            'status' => 'success',
            'message' => 'Data barang berhasil dimuat',
            'barangs' => $barangs
        ];

        return response()->json($response, 200);
    }

    public function show(string $id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return response()->json(['status' => 'error', 'message' => 'Barang tidak ditemukan'], 404);
        }

        $barang->foto_barang = base64_encode($barang->foto_barang); // Konversi BLOB ke base64

        return response()->json(['status' => 'success', 'message' => 'Data barang berhasil dimuat', 'barang' => $barang], 200);
    }

    public function getBarangByIdJenis(Request $request, $id_jenis_barang)
    {
        $barangs = Barang::where('id_jenis_barang', $id_jenis_barang)->get();

        if ($barangs->isEmpty()) {
            return response()->json(['status' => 'error', 'message' => 'Tidak ada barang yang sesuai dengan id jenis barang tersebut'], 404);
        }

        foreach ($barangs as $barang) {
            $barang->foto_barang = base64_encode($barang->foto_barang); // Konversi BLOB ke base64
        }

        $response = [
            'status' => 'success',
            'message' => 'Data barang berhasil dimuat berdasarkan id jenis barang',
            'barangs' => $barangs
        ];

        return response()->json($response, 200);
    }
}

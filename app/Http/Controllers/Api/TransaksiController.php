<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mobile\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with('karyawan')->get();
        return response()->json($transaksi);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_karyawan' => 'required|exists:users,id',
            'total_harga' => 'required|numeric',
            'bayar' => 'required|numeric',
            'kembalian' => 'required|numeric',
        ]);

        $transaksi = Transaksi::create($validatedData);
        return response()->json($transaksi, 201);
    }

    public function show($id)
    {
        $transaksi = Transaksi::with('karyawan')->findOrFail($id);
        return response()->json($transaksi);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_karyawan' => 'exists:users,id',
            'total_harga' => 'numeric',
            'bayar' => 'numeric',
            'kembalian' => 'numeric',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($validatedData);
        return response()->json($transaksi);
    }

    public function destroy($id)
    {
        Transaksi::destroy($id);
        return response()->json(null, 204);
    }
}
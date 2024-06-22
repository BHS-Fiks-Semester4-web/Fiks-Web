<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mobile\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();

        foreach($kategoris as $kategori){
            $kategori->foto = base64_encode($kategori->foto);
        }

        $response = [
            'status' => 'success',
            'message' => 'Data kategori berhasil dimuat',
            'kategoris' => $kategoris
        ];

        return response()->json($response, 200);
    }

    public function show($id)
    {
        $kategori = Kategori::find($id);

        if (!$kategori) {
            return response()->json(['status' => 'error', 'message' => 'Kategori tidak ditemukan'], 404);
        }

        array_walk_recursive($kategori, function (&$value) {
            if (is_string($value)) {
                $value = mb_convert_encoding($value, 'UTF-8', 'UTF-8');
            }
        });

        return response()->json(['status' => 'success', 'message' => 'Data kategori berhasil dimuat', 'kategori' => $kategori], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_barang' => 'required|string|max:255',
        ]);

        $kategori = Kategori::create([
            'jenis_barang' => $request->jenis_barang,
        ]);

        return response()->json($kategori, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_barang' => 'required|string|max:255',
        ]);

        $kategori = Kategori::find($id);

        if (!$kategori) {
            return response()->json(['status' => 'error', 'message' => 'Kategori tidak ditemukan'], 404);
        }

        $kategori->update([
            'jenis_barang' => $request->jenis_barang,
        ]);

        return response()->json(['status' => 'success', 'message' => 'Kategori berhasil diperbarui', 'kategori' => $kategori], 200);
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);

        if (!$kategori) {
            return response()->json(['status' => 'error', 'message' => 'Kategori tidak ditemukan'], 404);
        }

        $kategori->delete();

        return response()->json(['status' => 'success', 'message' => 'Kategori berhasil dihapus'], 200);
    }
}

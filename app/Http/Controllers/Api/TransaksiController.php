<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mobile\Transaksi;
use Illuminate\Http\Request;

use App\Models\Mobile\DetailTransaksi;
use App\Models\Barang;
class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with('karyawan')->get();
        return response()->json($transaksi);
    }

    
    public function store(Request $request)
    {
        // Validate the request...
        $validatedData = $request->validate([
            'id_karyawan' => 'required',
            'total_harga' => 'required|numeric',
            'bayar' => 'required|numeric',
            'kembalian' => 'required|numeric',
            'detail_transaksi.*.id_barang' => 'required|integer',
            'detail_transaksi.*.qty' => 'required|integer',
            'detail_transaksi.*.sub_total' => 'required|numeric',
        ]);
    
        // Membuat transaksi
        $transaksi = Transaksi::create([
            'id_karyawan' => $validatedData['id_karyawan'],
            'total_harga' => $validatedData['total_harga'],
            'bayar' => $validatedData['bayar'],
            'kembalian' => $validatedData['kembalian'],
        ]);
    
        // Check if detail_transaksi is provided and is an array
        if (isset($request->detail_transaksi) && is_array($request->detail_transaksi)) {
            foreach ($request->detail_transaksi as $detail) {
                DetailTransaksi::create([
                    'id_transaksi' => $transaksi->id, // Correct foreign key column name
                    'id_barang' => $detail['id_barang'],
                    'qty' => $detail['qty'],
                    'sub_total' => $detail['sub_total'],
                    // Ensure all necessary fields are included
                ]);
                $barang = Barang::find($detail['id_barang']);
                if ($barang) {
                    $test = $barang->stok_barang;
                    $barang->stok_barang -= $detail['qty']; // Assuming 'stok_barang' is the column name for stock in Barang table
                    $barang->save(); // Save the updated Barang record
                    $tes2 = $barang->stok_barang;
                    $idbr = $barang->id;
                } else {
                    dd('Barang not found');
                }
            }
            
        } else {
            print_r('detail_transaksi is not provided or not an array');

        }
    
        return response()->json(['message' => 'Transaction created successfully', $test, $tes2, $idbr]);
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
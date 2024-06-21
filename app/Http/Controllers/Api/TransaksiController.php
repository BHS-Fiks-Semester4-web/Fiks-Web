<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mobile\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\Mobile\DetailTransaksi;
use Illuminate\Support\Facades\DB;
use App\Models\Pengeluaran;
use Illuminate\Support\Facades\Log;


class TransaksiController extends Controller
{
   
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_karyawan' => 'required|integer',
            'total_harga' => 'required|numeric',
            'bayar' => 'required|numeric',
            'kembalian' => 'required|numeric',
            // Asumsikan detail_transaksi sekarang hanya membutuhkan id_barang, qty, dan sub_total tanpa array
            'id_barang' => 'required|integer',
            'qty' => 'required|integer',
            'sub_total' => 'required|numeric',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
    
        // Proses penyimpanan transaksi
        $transaksi = new Transaksi([
            'id_karyawan' => $request->id_karyawan,
            'total_harga' => $request->total_harga,
            'bayar' => $request->bayar,
            'kembalian' => $request->kembalian,
        ]);
        
        if ($transaksi->save()) {
            // Transaksi saved successfully, proceed with DetailTransaksi
            $detailTransaksi = new DetailTransaksi([
                'id_transaksi' => $transaksi->id,
                'id_barang' => $request->id_barang,
                'qty' => $request->qty,
                'sub_total' => $request->sub_total,
            ]);
        
            $detailTransaksi->save();

            // Update stok_barang in barang table
            // Correcting the property name from 'stok' to 'stok_barang'
            $barang = DB::table('barang')->where('id', $request->id_barang)->first();
            $stok = $barang->stok_barang - $request->qty; // Adjusted property name here
            DB::table('barang')->where('id', $request->id_barang)->update(['stok_barang' => $stok]);

            return response()->json(['message' => 'Transaksi berhasil dibuat'], 200);
        } else {
            // Handle the error, Transaksi save failed
            return response()->json(['error' => 'Failed to save Transaksi'], 500);
        }
    }


        public function show($month)
        {
            // Check if $month format is correct (1-12)
            if ($month >= 1 && $month <= 12) {
                // Fetch transactions for the given month with their detail transactions
                $transaksi = Transaksi::with('detailTransaksi')
                    ->whereMonth('created_at', $month)
                    ->orderBy('created_at', 'desc')
                    ->get();

                // Fetch expenses for the given month
                $pengeluaran = Pengeluaran::whereMonth('created_at', $month)
                    ->orderBy('created_at', 'desc')
                    ->get();

                // Optionally, you can format the response here if needed

                return response()->json([
                    'transaksi' => $transaksi,
                    'pengeluaran' => $pengeluaran
                ]);
            } else {
                // Handle the case where $month is not in the correct range
                return response()->json(['error' => 'Invalid month. Please use a value between 1 and 12.'], 400);
            }
        }
    // public function show($month)
    // {
    //     //panggil transaksi sesuai dengan bulan dimana bulan nya diambil dari parameter $month
    //     $transaksi = Transaksi::whereMonth('created_at', $month)->get();
    //     $detailTransaksi = DetailTransaksi::all();
    //     $transaksi = $transaksi->map(function($item) use ($detailTransaksi) {
    //         $item->detail_transaksi = $detailTransaksi->where('id_transaksi', $item->id);
    //         return $item;
    //     });
        
    //     $transaksi = Transaksi::orderBy('created_at', 'desc')->get();
    //     $transaksi = $transaksi->groupBy(function($date) {
    //         return \Carbon\Carbon::parse($date->created_at)->format('m');
    //     });

    //     $detailTransaksi = DetailTransaksi::all();
    //     foreach ($transaksi as $key => $value) {
    //         $transaksi[$key] = $value->map(function($item) use ($detailTransaksi) {
    //             $item->detail_transaksi = $detailTransaksi->where('id_transaksi', $item->id);
    //             return $item;
    //         });
    //     }
    //     return response()->json($transaksi, 200,);


        
    // }

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
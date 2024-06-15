<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mobile\Transaksi;
use Illuminate\Http\Request;

use App\Models\Mobile\DetailTransaksi;
use App\Models\Barang;
use App\Models\Pengeluaran;


class TransaksiController extends Controller
{
   

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_karyawan' => 'required',
            'total_harga' => 'required|numeric',
            'bayar' => 'required|numeric',
            'kembalian' => 'required|numeric',
            'detail_transaksi.*.id_barang' => 'required|integer',
            'detail_transaksi.*.qty' => 'required|integer',
            'detail_transaksi.*.sub_total' => 'required|numeric',
        ]);
    
        $transaksi = Transaksi::create([
            'id_karyawan' => $validatedData['id_karyawan'],
            'total_harga' => $validatedData['total_harga'],
            'bayar' => $validatedData['bayar'],
            'kembalian' => $validatedData['kembalian'],
        ]);
    
        if (isset($request->detail_transaksi) && is_array($request->detail_transaksi)) {
            foreach ($request->detail_transaksi as $detail) {
                DetailTransaksi::create([
                    'id_transaksi' => $transaksi->id, 
                    'id_barang' => $detail['id_barang'],
                    'qty' => $detail['qty'],
                    'sub_total' => $detail['sub_total'],
                ]);
                $barang = Barang::find($detail['id_barang']);
                if ($barang) {
                    $barang->stok_barang -= $detail['qty']; 
                    $barang->save(); 
                    
                } else {
                    dd('Barang not found');
                }
            }
            
        } else {
            print_r('detail_transaksi is not provided or not an array');

        }
    
        return response()->json(['message' => 'Transaction created successfully']);
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
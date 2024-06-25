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

public function index()
    {
        $transaksi = Transaksi::all();
        return response()->json($transaksi);
    }

    public function store(Request $request)
{
    // Validate the incoming request
    $validated = $request->validate([
        'id_karyawan' => 'required|integer',
        'total_harga' => 'required|numeric',
        'bayar' => 'required|numeric',
        'kembalian' => 'required|numeric',  
        'detail_transaksi' => 'required|array',
        'detail_transaksi.*.id_barang' => 'required|integer',
        'detail_transaksi.*.qty' => 'required|integer',
        'detail_transaksi.*.sub_total' => 'required|numeric',
    ]);

    // Begin database transaction
    DB::beginTransaction();
    try {
        // Create the transaction
        $transaksi = new Transaksi([
            'id_karyawan' => $validated['id_karyawan'],
            'total_harga' => $validated['total_harga'],
            'bayar' => $validated['bayar'],
            'kembalian' => $validated['kembalian'],
        ]);
        $transaksi->save();

        foreach ($validated['detail_transaksi'] as $detail) {
            $transaksiDetail = new DetailTransaksi([
                'id_transaksi' => $transaksi->id, // Ensure this matches the field name in your database
                'id_barang' => $detail['id_barang'],
                'qty' => $detail['qty'],
                'sub_total' => $detail['sub_total'],
            ]);
            $transaksiDetail->save();
        }

        // Commit the transaction
        DB::commit();

        // Return a successful response
        return response()->json(['message' => 'Transaction created successfully', 'transaksi' => $transaksi], 201);
    } catch (\Exception $e) {
        // Rollback the transaction in case of error
        DB::rollback();
        return response()->json(['message' => 'Failed to create transaction', 'error' => $e->getMessage()], 500);
    }
}

        public function show($month)
        {
            // Check if $month format is correct (1-12)
            if ($month >= 1 && $month <= 12) {
                // Fetch transactions for the given month with their detail transactions
                $transaksi = Transaksi::with(['detailTransaksi.barang' => function($query) {
                    $query->select('id', 'nama_barang'); // Assuming 'id' is the foreign key in detailTransaksi
                }])
                    ->whereMonth('created_at', $month)
                    ->orderBy('created_at', 'desc')
                    ->get();


                    $transaksi->transform(function ($transaksi) {
                        $transaksi->detailTransaksi->transform(function ($detail) {
                            if (isset($detail->barang)) {
                                $detail->nama_barang = $detail->barang->nama_barang;
                                unset($detail->barang); // Remove the barang object
                            }
                            return $detail;
                        });
                        return $transaksi;
                    });
                // Fetch expenses for the given month
                $pengeluaran = Pengeluaran::with(['barang' => function($query) {
                    $query->select('id', 'nama_barang'); // Assuming 'id' is the foreign key in pengeluaran
                }])
                ->whereMonth('created_at', $month)
                    ->orderBy('created_at', 'desc')
                    ->get();

                // Optionally, you can format the response here if needed
                $pengeluaran->transform(function ($pengeluaran) {
                    if (isset($pengeluaran->barang)) {
                        $pengeluaran->nama_barang = $pengeluaran->barang->nama_barang;
                        unset($pengeluaran->barang); // Remove the barang object
                    }
                    return $pengeluaran;
                });





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
//     public function getPenghasilanBersihPerBulan($month)
// {
//     // Validate month input
//     if ($month < 1 || $month > 12) {
//         return response()->json(['error' => 'Invalid month. Please use a value between 1 and 12.'], 400);
//     }

//     // Fetch total transaksi for the given month
//     $totalTransaksi = Transaksi::whereMonth('created_at', $month)
//         ->sum('total_harga');

//     // Fetch total pengeluaran for the given month
//     $totalPengeluaran = Pengeluaran::whereMonth('created_at', $month)
//         ->sum('total_pengeluaran'); // Assuming 'jumlah' is the column for the amount in Pengeluaran

//     // Calculate penghasilan bersih
//     $penghasilanBersih = $totalTransaksi - $totalPengeluaran;

//     // Return the result as JSON
//     return response()->json([
//         'month' => $month,
//         'total_transaksi' => $totalTransaksi,
//         'total_pengeluaran' => $totalPengeluaran,
//         'penghasilan_bersih' => $penghasilanBersih
//     ]);
// }
// public function getPenghasilanHarian(Request $request)
// {
//     // Validate the incoming request
//     $validated = $request->validate([
//         'month' => 'required|integer|between:1,12',
//         'day' => 'required|integer|between:1,31', // Assuming days are between 1 and 31
//     ]);

//     // Extract month and day from validated data
//     $month = $validated['month'];
//     $day = $validated['day'];

//     try {
//         // Fetch total transaksi for the given month and day
//         $totalTransaksi = Transaksi::whereMonth('created_at', $month)
//             ->whereDay('created_at', $day)
//             ->sum('total_harga');

//         // Fetch total pengeluaran for the given month and day
//         $totalPengeluaran = Pengeluaran::whereMonth('created_at', $month)
//             ->whereDay('created_at', $day)
//             ->sum('total_pengeluaran'); // Assuming 'jumlah' is the column for the amount in Pengeluaran

//         // Calculate penghasilan bersih
//         $penghasilanHarian = $totalTransaksi - $totalPengeluaran;

//         // Return the result as JSON
//         return response()->json([
//             'month' => $month,
//             'day' => $day,
//             'total_transaksi' => $totalTransaksi,
//             'total_pengeluaran' => $totalPengeluaran,
//             'penghasilan_harian' => $penghasilanHarian
//         ]);
//     } catch (\Exception $e) {
//         // Handle any errors that occur during the process
//         return response()->json(['error' => 'Failed to fetch daily income', 'message' => $e->getMessage()], 500);
//     }
// }

public function getPenghasilanDanPengeluaran($month)
    {
        try {
            // Mendapatkan tanggal hari ini
            $today = now();
            $tahun = now()->year;
            if (!is_numeric($month) || $month < 1 || $month > 12) {
                return response()->json(['error' => 'Invalid month. Please use a value between 1 and 12.'], 400);
            }
            // Mendapatkan bulan dan hari dari tanggal hari ini

            $day = $today->day;

            // Menghitung penghasilan bulanan
            $totalTransaksiBulanan = Transaksi::whereYear('created_at', $tahun)
            ->whereMonth('created_at', $month)
            ->sum('total_harga');

            // Menghitung pengeluaran bulanan
            $totalPengeluaranBulanan = Pengeluaran::whereYear('created_at', $tahun)
            ->whereMonth('created_at', $month)
            ->sum('total_pengeluaran');

            // Menghitung penghasilan harian
            $totalTransaksiHarian = Transaksi::whereDate('created_at', $today)
                ->sum('total_harga');

            // Menghitung pengeluaran harian
            $totalPengeluaranHarian = Pengeluaran::whereDate('created_at', $today)
                ->sum('total_pengeluaran');

            // Format response
            $response = [
                'penghasilan' => [
                    'bulanan' => 'Rp ' . number_format($totalTransaksiBulanan - $totalPengeluaranBulanan),
                    'harian' => 'Rp ' . number_format($totalTransaksiHarian - $totalPengeluaranHarian),
                ],
                'pengeluaran' => [
                    'bulanan' => 'Rp ' . number_format($totalPengeluaranBulanan),
                    'harian' => 'Rp ' . number_format($totalPengeluaranHarian),
                ],
            ];

            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch income and expenses', 'message' => $e->getMessage()], 500);
        }
    }
}

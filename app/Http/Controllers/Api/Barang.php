<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Mobile\Barang;


class BarangController extends Controller
{
public function someMethod(Request $request)
{
    // Assuming $request->detail_transaksi is an array of details
    if (isset($request->detail_transaksi) && is_array($request->detail_transaksi)) {
        foreach ($request->detail_transaksi as $detail) {
            // Now $detail is defined and can be used within this loop
            $barang = Barang::find($detail['id_barang']);
            if ($barang) {
                $barang->stok_barang -= $detail['qty'];
                $barang->save();
            } else {
                // Handle the case where the barang is not found
            }
        }
    } else {
        // Handle the case where detail_transaksi is not provided or not an array
    }
    // Rest of your method...
}
}
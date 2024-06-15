<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Mobile\Barang;


class BarangController extends Controller
{
public function someMethod(Request $request)
{
    if (isset($request->detail_transaksi) && is_array($request->detail_transaksi)) {
        foreach ($request->detail_transaksi as $detail) {
            $barang = Barang::find($detail['id_barang']);
            if ($barang) {
                $barang->stok_barang -= $detail['qty'];
                $barang->save();
            } 
    }}
}
}
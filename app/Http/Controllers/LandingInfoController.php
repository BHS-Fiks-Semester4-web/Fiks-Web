<?php

namespace App\Http\Controllers;
use App\Models\Barang;

class LandingInfoController extends Controller
{
    public function index(){
        $items = Barang::where('id_jenis_barang', 2)->get();
        $items1 = Barang::where('diskon_barang', '>', 0)->get();
        return view('landing', [
            'title' => 'Dashboard',
            'items' => $items1,
            'itemss' => $items,
           
           
          
        ]);
    }

    public function discount(){
        $items = Barang::where('id_jenis_barang', 2)->get();
        $items1 = Barang::where('diskon_barang', '>', 0)->get();
        return view('landing', [
            'title' => 'Dashboard',
            'items' => $items1,
            'itemss' => $items,
           
           
          
        ]);
    }
   
    public function barang()
    {
        $barangs = Barang::all();
        return view('semuaproduk', compact('barangs'));
    }

    public function getDetail($id){
        $product = Barang::select('nama_barang', 'deskripsi_barang', 'harga_sebelum_diskon_barang','foto_barang')
                          ->find($id);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        $productArray = [
            'nama_barang' => utf8_encode($product->nama_barang),
            'deskripsi_barang' => utf8_encode($product->deskripsi_barang),
            'harga_sebelum_diskon_barang' => utf8_encode($product->harga_sebelum_diskon_barang),
            'foto_barang' => $product->foto_barang = base64_encode($product->foto_barang), // Konversi BLOB ke base64
        ];
       return response()->json($productArray);
    }
    public function home()
    {
        return view('home');
    }

    public function product()
    {
        return view('product');
    }

    public function contact()
    {
        return view('contact');
    }
}

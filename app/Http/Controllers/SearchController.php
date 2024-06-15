<?php

namespace App\Http\Controllers;
use App\Models\Barang;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        // Implementasikan logika pencarian sesuai kebutuhan
        $results = Barang::where('nama_barang', 'LIKE', "%{$query}%")->get();

        return view('results', compact('results'));
    }
}

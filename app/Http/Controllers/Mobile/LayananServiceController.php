<?php

namespace App\Http\Controllers\mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mobile\Kategori;
use App\Models\mobile\LayananService;

class LayananServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $layananServicePending = LayananService::where('status_service', 'pending')->take(4)->get();
            $layananServiceInProgress = LayananService::where('status_service', 'in_progress')->take(4)->get();
            $layananServiceDoneUnpaid = LayananService::where('status_service', 'done')->where('status_bayar', 'belum')->take(4)->get();
            $layananServiceDonePaid = LayananService::where('status_service', 'done')->where('status_bayar', 'sudah')->take(4)->get();

            $response = [
                'status' => 'success',
                'message' => 'Data kategori berhasil dimuat',
                'pendings' => $layananServicePending,
                'in_progress' => $layananServiceInProgress,
                'done_unpaids' => $layananServiceDoneUnpaid,
                'done_paids' => $layananServiceDonePaid
            ];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat memuat data kategori: ' . $e->getMessage(),
            ], 500);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_customer' => 'required',
            'no_hp_customer' => 'required',
            'alamat_customer' => 'required',
            'id_jenis_service' => 'nullable',
            'status_service' => 'required',
            'total_bayar_service' => 'nullable',
            'status_bayar' => 'required',
            'bayar' => 'nullable',
            'kembalian' => 'nullable',
            'tanggal_penerimaan' => 'required|date',
            'tanggal_selesai' => 'nullable|date',
        ]);
        
        $layananService = LayananService::create($validated);

        if ($layananService) {
            return response()->json([
                'status' => 'success',
                'message' => 'Tambah layanan service berhasil',
                'layanan_service' => $layananService,
            ], 201);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat melakukan create layanan service',
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

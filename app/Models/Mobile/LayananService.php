<?php

namespace App\Models\mobile;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananService extends Model
{
    use HasFactory;

    protected $table = 'layanan_service';

    protected $fillable = [
        'nama_customer',
        'no_hp_customer',
        'alamat_customer',
        'id_jenis_service',
        'status_service',
        'total_bayar_service',
        'status_bayar',
        'bayar',
        'kembalian',
        'tanggal_penerimaan',
        'tanggal_selesai'
    ];

    // public static function getLayananServicePending($search = null)
    // {
    //     $query = LayananService::where('status', 'aktif')->latest();

    //     if ($search) {
    //         $query->where('nama_barang', 'LIKE', "%$search%");
    //     }

    //     return $query->paginate(4)->withQueryString();
    // }

    public function service()
    {
        return $this->belongsTo(Service::class, 'id_jenis_service');
    }

    public $timestamps = false;
}

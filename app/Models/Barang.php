<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    
    protected $fillable = [
        'id_supplier',
        'id_jenis_barang',
        'nama_barang',
        'stok_barang',
        'harga_beli_barang',
        'harga_sebelum_diskon_barang',
        'diskon_barang',
        'harga_setelah_diskon_barang',
        'exp_diskon_barang',
        'garansi_barang',
        'deskripsi_barang',
        'foto_barang',
    ];

    public function jenisBarang()
    {
        return $this->belongsTo(JenisBarang::class, 'id_jenis_barang');
    }
    
    public function supplier()
    {
        return $this->belongsTo(Pemasok::class, 'id_supplier');
    }

    public static function getBarang($search = null)
    {
        $query = Barang::where('status', 'aktif')->latest();

        if ($search) {
            $query->where('nama_barang', 'LIKE', "%$search%");
        }

        return $query->paginate(4)->withQueryString();
    }

    public static function getBarangForDashboard($search = null)
    {
        $query = Barang::where('status', 'aktif')->latest();

        if ($search) {
            $query->where('nama_barang', 'LIKE', "%$search%");
        }

        return $query->get();
    }
}

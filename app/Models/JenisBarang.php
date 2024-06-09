<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'jenis_barang';
    protected $guarded = ['id'];

    public static function getJenisBarang($search = null)
    {
        $query = JenisBarang::where('status', 'aktif')->latest();
    
        if ($search) {
            $query->where('nama_jenis_barang', 'LIKE', "%$search%");
        }
    
        return $query->paginate(4)->withQueryString();
    }

    public function barang()
    {
        return $this->hasMany(Barang::class, 'id_jenis_barang');
    }
}

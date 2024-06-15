<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'pengeluaran';
    
    protected $fillable = [
        'id_barang',
        'nama_pengeluaran',
        'total_pengeluaran',
    ];

    public static function getPengeluaran($search = null)
    {
        $query = Pengeluaran::where('status', 'aktif')->latest();

        if ($search) {
            $query->where('nama_pengeluaran', 'LIKE', "%$search%");
        }

        return $query->paginate(4)->withQueryString();
    }
}

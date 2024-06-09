<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasok extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'supplier';
    protected $guarded = ['id'];

    public static function getPemasok($search = null)
    {
        $query = Pemasok::where('status', 'aktif')->latest();
    
        if ($search) {
            $query->where('nama_supplier', 'LIKE', "%$search%");
        }
    
        return $query->paginate(4);
    }

    public function barang()
    {
        return $this->hasMany(Barang::class, 'id_supplier');
    }
}

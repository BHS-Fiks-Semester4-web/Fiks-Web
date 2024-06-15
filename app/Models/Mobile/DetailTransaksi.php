<?php

namespace App\Models\Mobile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;
use App\Models\Mobile\Transaksi;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi'; // Optional if following Laravel's naming conventions

    protected $fillable = [
        'id_transaksi',
        'id_barang',
        'qty',
        'sub_total',
    ];
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }
}
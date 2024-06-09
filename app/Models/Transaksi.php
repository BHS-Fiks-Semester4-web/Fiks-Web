<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'transaksi';

    protected $fillable = [
        'id_karyawan',
        'total_harga',
        'bayar',
        'kembalian'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_karyawan');
    }

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_transaksi');
    }
}

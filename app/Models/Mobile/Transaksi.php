<?php

namespace App\Models\Mobile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi'; // Optional if following Laravel's naming conventions

    protected $fillable = [
        'id',
        'id_karyawan',

        'total_harga',
        'bayar',
        'kembalian',
    ];

    public function karyawan()
    {
        return $this->belongsTo(User::class, 'id_karyawan');
    }
    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_transaksi');
    }
}

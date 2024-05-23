<?php

namespace App\Models\Mobile;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $fillable = [
        'id',
        'id_jenis_barang',
        'id_supplier',
        'nama_barang',
        'stok_barang',
        'harga_beli_barang',
        'harga_sebelum_diskon_barang',
        'diskon_barang',
        'harga_setelah_diskon_barang',
        'exp_diskon_barang',
        'garansi_barang',
        'deskripsi_barang',
        'foto_barang', // Ini adalah kolom BLOB
        'status',
        'created_at',
        'updated_at',
    ];

}

<?php

namespace App\Models\Mobile;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'jenis_barang';
    protected $fillable = [
        'id',
        'nama_jenis_barang',
        'foto',
        'status',
        'created_at',
        'updated_at',
    ];
}

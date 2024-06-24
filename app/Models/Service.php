<?php

namespace App\Models;

use App\Models\mobile\LayananService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'service';
    protected $guarded = ['id'];

    public static function getService($search = null)
    {
        $query = Service::where('status', 'aktif')->latest();
    
        if ($search) {
            $query->where('nama_service', 'LIKE', "%$search%");
        }
    
        return $query->paginate(4)->withQueryString();
    }

    public function layananService()
    {
        return $this->hasMany(LayananService::class, 'id_jenis_service');
    }
}

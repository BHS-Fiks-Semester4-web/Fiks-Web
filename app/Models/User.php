<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\CanResetPassword;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'alamat',
        'username',
        'no_hp',
        'agama',
        'tanggal_lahir',
        'role',
        'foto',
        'otp'
        
    ];

    public static function getUser($search = null)
    {
        $query = User::where('status', 'aktif')->latest();
    
        if ($search) {
            $query->where('name', 'LIKE', "%$search%");
        }
    
        return $query->paginate(4)->withQueryString();
    }

    public static function getUserAdmin($search = null)
    {
        $query = User::where('status', 'aktif')->where('role', 'admin');

        if($search)
        {
            $query->where('name', 'LIKE', "%$search%");
        }

        return $query->get();
    }
    
    public static function getUserKaryawan($search = null)
    {
        $query = User::where('status', 'aktif')->where('role', 'karyawan');

        if($search)
        {
            $query->where('name', 'LIKE', "%$search%");
        }

        return $query->get();
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_karyawan');
    }

    public $timestamps = true;


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'otp',
        'remember_token',
    ];

    
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

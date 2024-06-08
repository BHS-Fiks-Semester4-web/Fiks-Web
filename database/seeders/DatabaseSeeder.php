<?php

namespace Database\Seeders;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Pemasok;
use App\Models\User;
use App\Models\JenisBarang;




class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this -> UserSeeder();
        $this -> PemasokSeeder();
        $this -> JenisBarangSeeder();
    }

    public function UserSeeder()
    {
        
        DB::table('users')->insert([
            [
            'name'          => 'Ilham Nugroho',
            'email'         => 'ilhamisdarmawan@gmail.com',
            'password'      => Hash::make('ilham'),
            'alamat'        => 'Jember',
            'username'      => 'Ilham Gokil',
            'no_hp'         => '085156915879',
            'agama'         => 'Islam',
            'tanggal_lahir' => '12/04/2024',
            'role'          => 'Admin',
            'status'        => 'aktif'
        ],
        [
            'name'          => 'Rizal Mahendra',
            'email'         => 'rizalmahendra@gmail.com',
            'password'      => Hash::make('rizal'),
            'alamat'        => 'Jember',
            'username'      => 'Rizal Gokil',
            'no_hp'         => '085156915879',
            'agama'         => 'Islam',
            'tanggal_lahir' => '12/04/2024',
            'role'          => 'Admin',
            'status'        => 'aktif'
        ],
        [
            'name'          => 'Vebri Ariadi Regar',
            'email'         => 'vebriariadi2@gmail.com',
            'password'      => Hash::make('vebri'),
            'alamat'        => 'Jember',
            'username'      => 'Vebri Gokil',
            'no_hp'         => '085156915879',
            'agama'         => 'Islam',
            'tanggal_lahir' => '12/04/2024',
            'role'          => 'Karyawan',
            'status'        => 'aktif',
        ]
    ]);
    }

    public function PemasokSeeder()
    {
        DB::table('supplier')->insert([
            [
            'nama_supplier'     => 'Ilham Nugroho',
            'alamat_supplier'   => 'Jember',
            'no_hp_supplier'    => '085156915879',
            'status'            => 'aktif',
            
        ],
        [
            'nama_supplier'     => 'Wahyu Isdarmawan',
            'alamat_supplier'   => 'Jember',
            'no_hp_supplier'    => '085156915878',
            'status'            => 'aktif',
        ],
        [
            'nama_supplier'     => 'Elok Pangestu',
            'alamat_supplier'   => 'Jember',
            'no_hp_supplier'    => '085156915877',
            'status'            => 'aktif',
        ],
        [
            'nama_supplier'     => 'Putri Kinasih',
            'alamat_supplier'   => 'Jember',
            'no_hp_supplier'    => '085156915876',
            'status'            => 'aktif',
        ]
    
    ]);
    }

    public function JenisBarangSeeder()
    {
        $imagePath = public_path('image\jenis_barang_seed\test.jpeg');

        $imageBlob = file_get_contents($imagePath);
        DB::table('jenis_barang')->insert([
            [
                'nama_jenis_barang' => 'Laptop',
                'foto' => $imageBlob,
                'status' => 'aktif',
                'deskripsi_jenis_barang' => 'Baru'
            ],
            [
                'nama_jenis_barang' => 'Computer',
                'foto' => $imageBlob,
                'status' => 'aktif',
                'deskripsi_jenis_barang' => 'Baru'
            ],
            [
                'nama_jenis_barang' => 'CCTV',
                'foto' => $imageBlob,
                'status' => 'aktif',
                'deskripsi_jenis_barang' => 'Baru'
            ],
            [
                'nama_jenis_barang' => 'Perangkat Lainnya',
                'foto' => $imageBlob,
                'status' => 'aktif',
                'deskripsi_jenis_barang' => 'Baru'
            ]
        ]);
    }
}
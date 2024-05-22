<?php

namespace Database\Seeders;

use App\Models\JenisBarang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imagePath = storage_path('app/public/image/jenis_barang_seed/test.jpeg');

        $imageBlob = file_get_contents($imagePath);

        JenisBarang::create([
            'nama_jenis_barang'     => 'Laptop',
            'foto'                  => $imageBlob,
            'status'                => 'aktif',
        ]);
        JenisBarang::create([
            'nama_jenis_barang'     => 'Computer',
            'foto'                  => $imageBlob,
            'status'                => 'aktif',
        ]);
        JenisBarang::create([
            'nama_jenis_barang'     => 'CCTV',
            'foto'                  => $imageBlob,
            'status'                => 'aktif',
        ]);
        JenisBarang::create([
            'nama_jenis_barang'     => 'Perangkat Lainnya',
            'foto'                  => $imageBlob,
            'status'                => 'aktif',
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pemasok;

class PemasokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pemasok::create([
            'nama_supplier'     => 'Ilham Nugroho',
            'alamat_supplier'   => 'Jember',
            'no_hp_supplier'    => '085156915879',
            'status'            => 'aktif',
        ]);
        Pemasok::create([
            'nama_supplier'     => 'Wahyu Isdarmawan',
            'alamat_supplier'   => 'Jember',
            'no_hp_supplier'    => '085156915878',
            'status'            => 'aktif',
        ]);
        Pemasok::create([
            'nama_supplier'     => 'Elok Pangestu',
            'alamat_supplier'   => 'Jember',
            'no_hp_supplier'    => '085156915877',
            'status'            => 'aktif',
        ]);
        Pemasok::create([
            'nama_supplier'     => 'Putri Kinasih',
            'alamat_supplier'   => 'Jember',
            'no_hp_supplier'    => '085156915876',
            'status'            => 'aktif',
        ]);
    }
}

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
        $this -> ServiceSeeder();
        $this -> BarangSeeder();
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
        $cctvPath = public_path('image\jenis_barang_seed\foto_cctv.png');
        $computerPath = public_path('image\jenis_barang_seed\foto_computer.png');
        $laptopPath = public_path('image\jenis_barang_seed\foto_laptop.png');
        $perangkatLainPath = public_path('image\jenis_barang_seed\foto_perangkat_lain.png');

        $cctv = file_get_contents($cctvPath);
        $computer = file_get_contents($computerPath);
        $laptop = file_get_contents($laptopPath);
        $perangkatLain = file_get_contents($perangkatLainPath);

        DB::table('jenis_barang')->insert([
            [
                'nama_jenis_barang' => 'Laptop',
                'deskripsi_jenis_barang' => 'Menjual laptop dari berbagai macam model, merek, dan jenis yang berbeda, termasuk ultrabook, gaming laptop, dan laptop bisnis, dengan spesifikasi dan harga yang beragam sesuai kebutuhan Anda.',
                'foto' => $laptop,
                'status' => 'aktif',
            ],
            [
                'nama_jenis_barang' => 'Computer',
                'deskripsi_jenis_barang' => 'Menjual komputer beserta komponen dari berbagai macam model, merek, dan jenis yang berbeda, termasuk desktop, workstation, dan komputer all-in-one, dengan berbagai konfigurasi untuk memenuhi kebutuhan pekerjaan dan hiburan Anda.',
                'foto' => $computer,
                'status' => 'aktif',
            ],
            [
                'nama_jenis_barang' => 'CCTV',
                'deskripsi_jenis_barang' => 'Menjual CCTV dan sistem pengawasan dari berbagai macam model, merek, dan jenis yang berbeda, termasuk kamera indoor, outdoor, dan sistem DVR/NVR, untuk keamanan rumah dan bisnis Anda.',
                'foto' => $cctv,
                'status' => 'aktif',
            ],
            [
                'nama_jenis_barang' => 'Perangkat Lainnya',
                'deskripsi_jenis_barang' => 'Menjual berbagai perangkat teknologi lainnya dari berbagai macam model, merek, dan jenis yang berbeda, termasuk printer, scanner, router, dan aksesori komputer untuk melengkapi kebutuhan teknologi Anda.',
                'foto' => $perangkatLain,
                'status' => 'aktif',
            ]
        ]);
    }

    public function ServiceSeeder()
    {
        $cctvPath = public_path('image\service_seed\cctv_setting.png');
        $computerPath = public_path('image\service_seed\computer_setting.png');
        $laptopPath = public_path('image\service_seed\laptop_setting.png');
        $perangkatLainPath = public_path('image\service_seed\electronic_setting.png');

        $cctv = file_get_contents($cctvPath);
        $computer = file_get_contents($computerPath);
        $laptop = file_get_contents($laptopPath);
        $perangkatLain = file_get_contents($perangkatLainPath);

        DB::table('service')->insert([
            [
                'nama_service' => 'Service Laptop',
                'deskripsi_service' => 'Menawarkan jasa perbaikan dan pemeliharaan laptop dari berbagai macam model, merek, dan jenis yang berbeda. Termasuk perbaikan hardware, instalasi software, peningkatan performa, dan layanan pembersihan.',
                'foto' => $laptop,
                'status' => 'aktif',
            ],
            [
                'nama_service' => 'Service Komputer',
                'deskripsi_service' => 'Menawarkan jasa perbaikan dan pemeliharaan komputer beserta komponen dari berbagai macam model, merek, dan jenis yang berbeda. Termasuk perbaikan hardware, instalasi software, peningkatan komponen, dan perawatan rutin.',
                'foto' => $computer,
                'status' => 'aktif',
            ],
            [
                'nama_service' => 'Service Cctv',
                'deskripsi_service' => 'Menawarkan jasa instalasi, perbaikan, dan pemeliharaan CCTV dari berbagai macam model, merek, dan jenis yang berbeda. Termasuk pemasangan kamera, konfigurasi sistem pengawasan, dan perbaikan perangkat rekaman.',
                'foto' => $cctv,
                'status' => 'aktif',
            ],
            [
                'nama_service' => 'Service Lainnya',
                'deskripsi_service' => 'Menawarkan jasa perbaikan dan pemeliharaan untuk berbagai perangkat teknologi lainnya dari berbagai macam model, merek, dan jenis yang berbeda. Termasuk service printer, scanner, router, dan berbagai aksesori teknologi.',
                'foto' => $perangkatLain,
                'status' => 'aktif',
            ],
            
        ]);
    }

    public function BarangSeeder()
    {
        $asusTufPath = public_path('image\barang_seed\asus_tuf_gaming_f15_fx506.png');
        $HpE27uPath = public_path('image\barang_seed\HP E27u G5 27 inch QHD Monitor.png');
        $laptopAcerA3Path = public_path('image\barang_seed\laptop_acer_aspire_3_spin_14.png');
        $laptopAcerA5Path = public_path('image\barang_seed\laptop_acer_aspire_5_spin_14.png');
        $legion5iPath = public_path('image\barang_seed\Legion 5i (16, Gen 9).png');
        $thinkPadPath = public_path('image\barang_seed\ThinkPad X1 Carbon Gen 11 (14″ Intel).png');
        $victusPath = public_path('image\barang_seed\victus_16_inch.png');

        $asusTuf = file_get_contents($asusTufPath);
        $HpE27u = file_get_contents($HpE27uPath);
        $laptopAcerA3 = file_get_contents($laptopAcerA3Path);
        $laptopAcerA5 = file_get_contents($laptopAcerA5Path);
        $legion5i = file_get_contents($legion5iPath);
        $thinkPad = file_get_contents($thinkPadPath);
        $victus = file_get_contents($victusPath);

        DB::table('barang')->insert([
            [
                'id_jenis_barang'               => 1,
                'nama_barang'                   => 'Asus Tuf Gaming',
                'stok_barang'                   => 3,
                'harga_beli_barang'             => 8000000,
                'harga_sebelum_diskon_barang'   => 10000000,
                'harga_setelah_diskon_barang'   => 10000000,
                'garansi_barang'                => '1 Tahun',
                'deskripsi_barang'              => 'Windows 11, AMD Ryzen, GeForce RTX',
                'foto_barang'                   => $asusTuf,
                'status'                        => 'aktif',
            ],
            [
                'id_jenis_barang'               => 2,
                'nama_barang'                   => 'HP E27u G5 27 inch QHD Monitor',
                'stok_barang'                   => 3,
                'harga_beli_barang'             => 4000000,
                'harga_sebelum_diskon_barang'   => 6000000,
                'harga_setelah_diskon_barang'   => 6000000,
                'garansi_barang'                => '1 Tahun',
                'deskripsi_barang'              => '27 inch QHD (2560 x 1440), Flat IPS with Edge-lit, HDMI,USB-C,DisplayPort',
                'foto_barang'                   => $HpE27u,
                'status'                        => 'aktif',
            ],
            [
                'id_jenis_barang'               => 1,
                'nama_barang'                   => 'Aspire 3 Spin 14',
                'stok_barang'                   => 3,
                'harga_beli_barang'             => 5000000,
                'harga_sebelum_diskon_barang'   => 8000000,
                'harga_setelah_diskon_barang'   => 8000000,
                'garansi_barang'                => '1 Tahun',
                'deskripsi_barang'              => 'Windows 11 Home Single Language 64-bit, 8GB, LPDDR5',
                'foto_barang'                   => $laptopAcerA3,
                'status'                        => 'aktif',
            ],
            [
                'id_jenis_barang'               => 1,
                'nama_barang'                   => 'Aspire 5 Spin 14',
                'stok_barang'                   => 3,
                'harga_beli_barang'             => 10000000,
                'harga_sebelum_diskon_barang'   => 12000000,
                'harga_setelah_diskon_barang'   => 12000000,
                'garansi_barang'                => '1 Tahun',
                'deskripsi_barang'              => '35.6cm (14 inch), 16GB, Iris Xe Graphics eligible',
                'foto_barang'                   => $laptopAcerA5,
                'status'                        => 'aktif',
            ],
            [
                'id_jenis_barang'               => 1,
                'nama_barang'                   => 'Legion 5i (16 inch, Gen 9)',
                'stok_barang'                   => 3,
                'harga_beli_barang'             => 9000000,
                'harga_sebelum_diskon_barang'   => 11000000,
                'harga_setelah_diskon_barang'   => 11000000,
                'garansi_barang'                => '1 Tahun',
                'deskripsi_barang'              => 'Up to Windows 11 Pro, Up to 32GB 5600MHz DDR5',
                'foto_barang'                   => $legion5i,
                'status'                        => 'aktif',
            ],
            [
                'id_jenis_barang'               => 1,
                'nama_barang'                   => 'ThinkPad X1 Carbon Gen 11 (14 inch Intel)',
                'stok_barang'                   => 3,
                'harga_beli_barang'             => 8000000,
                'harga_sebelum_diskon_barang'   => 10000000,
                'harga_setelah_diskon_barang'   => 10000000,
                'garansi_barang'                => '1 Tahun',
                'deskripsi_barang'              => 'Up to Windows 11 Pro, Up to 64GB LPDDR5',
                'foto_barang'                   => $thinkPad,
                'status'                        => 'aktif',
            ],
            [
                'id_jenis_barang'               => 1,
                'nama_barang'                   => 'HP Victus 16 inch Gaming Laptop 16-r1012TX',
                'stok_barang'                   => 3,
                'harga_beli_barang'             => 25000000,
                'harga_sebelum_diskon_barang'   => 30000000,
                'harga_setelah_diskon_barang'   => 30000000,
                'garansi_barang'                => '1 Tahun',
                'deskripsi_barang'              => 'Windows 11 Home Single Language, 32 GB DDR5 RAM',
                'foto_barang'                   => $victus,
                'status'                        => 'aktif',
            ],
        ]);
    }
}
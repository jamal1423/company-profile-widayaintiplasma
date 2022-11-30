<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_profil')->insert([
            'nama_perusahaan' => 'PT. Widaya Inti Plasma',
            'lokasi' => 'Jl. Industri Bringin Bendo No. 8, Taman, Sidoarjo',
            'kodepos' => '61257',
            'provinsi' => 'Jawa Timur',
            'negara' => 'Indonesia',
            'telp' => '+6281 651 0992, +6285 101 538209',
            'fax' => '+62 31 7886584',
            'website' => 'www.widayaintiplasma.com',
            'email' => 'marketing@widayaintiplasma.com',
            'kontak' => 'Vincent B Soetanto (Marketing) (+6281 651 0992 , +6285 101 538209)',
            'tahun_didirikan' => 'Tahun 1994, Milik Pribadi, Terdaftar',
            'sektor_bisnis' => 'Produsen Sepatu dan Ekspotir',
            'bahasa' => 'Indonesia dan Inggris',
            'produk_utama' => 'Sepatu dan Sandal',
            'merek' => 'Trekkers dan Berdasarkan Penyelidikan',
            'volume' => '1 Juta Pasang / Tahun',
            'spesifikasi' => 'Sepatu Injeksi, Sepatu Semen, PVC dan Sandal Eva',
            'komposisi_bahan' => 'PVC, PC, Kanvas dan Mesh',
            'harga_jangka' => 'Kurang lebih 3.50 - 5.00 / Pasang. FOB Surabaya - Indonesia',
            'minimum_order' => '6000 Pasang',
            'validitas_harga' => 'Nego',
            'proses_manufaktur' => 'Pemotongan, Jahitan, Suntik dan Perakitan',
            'tenaga_kerja' => '200 - 300 orang',
            'pendapatan_ekspor' => '20%',
            'tujuan_ekspor' => 'Eropa, Timur Tengah, Asia Pasifik, Afrika',
            'jns_bisnis_lain' => 'Ekspor Impor'
        ]);
    }
}
